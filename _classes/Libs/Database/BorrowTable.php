<?php 
namespace Libs\Database;
use PDO;
use PDOException;

class BorrowTable
{
 private $db = null;

 public function __construct($db)
 {
  $this->db = $db->connect();
 }

 // add new book borrow to the database
 public function addBorrow($data)
 {
  try {
   $query = "INSERT INTO book_borrow (book_id, user_id, borrow_date, return_date) VALUES (:book_id, :user_id, :borrow_date, :return_date)";
   $statement = $this->db->prepare($query);
   $statement->execute($data);
   return $this->db->lastInsertId();
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }

 // get all book borrow from the database
 public function getAllBorrow()
 {
  $statement = $this->db->prepare("SELECT book_borrow.*, books.title, book_status, users.name FROM book_borrow LEFT JOIN books ON book_borrow.book_id = books.id LEFT JOIN users ON book_borrow.user_id = users.id ORDER BY book_borrow.id DESC LIMIT 10");
  $statement->execute();
  $rows = $statement->fetchAll();
  return $rows ?? false;
 }

 // get all book borrow from the database
 public function getAllRecordBorrow()
 {
  $statement = $this->db->prepare("SELECT book_borrow.*, books.title, book_status, users.name FROM book_borrow LEFT JOIN books ON book_borrow.book_id = books.id LEFT JOIN users ON book_borrow.user_id = users.id ORDER BY book_borrow.id DESC");
  $statement->execute();
  $rows = $statement->fetchAll();
  return $rows ?? false;
 }

 // add borrow book and book status to the database
 public function addBorrowBook($data, $book_id)
 {
  try {
   $query = "INSERT INTO book_borrow (book_id, user_id, borrow_date, return_date) VALUES (:book_id, :user_id, :borrow_date, :return_date)";
   $statement = $this->db->prepare($query);
   $statement->execute($data);
   $borrow_id = $this->db->lastInsertId();
   $query = "UPDATE books SET book_status = 0 WHERE id = :book_id";
   $statement = $this->db->prepare($query);
   $statement->execute(['book_id' => $book_id]);
   return $borrow_id;
  } catch (PDOException $e) {
   return $e->getMessage();
  }
  
 }

 // borrow book return to the database
   public function returnBorrowBook($book_id)
   {
   try {
      $query = "UPDATE books SET book_status = 1 WHERE id = :book_id";
      $statement = $this->db->prepare($query);
      $statement->execute(['book_id' => $book_id]);
      return true;
   } catch (PDOException $e) {
      return $e->getMessage();
   }
   }
   // getLastBorrowId from the database join with book and user table
   public function getLastBorrowId()
   {
      $statement = $this->db->prepare("SELECT book_borrow.*, books.title, book_status, users.name FROM book_borrow LEFT JOIN books ON book_borrow.book_id = books.id LEFT JOIN users ON book_borrow.user_id = users.id ORDER BY book_borrow.id DESC LIMIT 5");
      $statement->execute();
      $row = $statement->fetch();
      return $row ?? false;
   }
   
   // notify due date from the database join with book and user table
   public function notifyDueDate()
   {
      $statement = $this->db->prepare("SELECT book_borrow.*, books.title, book_status, users.name FROM book_borrow LEFT JOIN books ON book_borrow.book_id = books.id LEFT JOIN users ON book_borrow.user_id = users.id WHERE book_borrow.return_date = CURDATE() ORDER BY book_borrow.id DESC LIMIT 5");
      $statement->execute();
      $rows = $statement->fetchAll();
      return $rows ?? false;
   }
  
 
}

/*
try {
   $query = "INSERT INTO book_borrow (book_id, user_id, borrow_date, return_date) VALUES (:book_id, :user_id, :borrow_date, :return_date)";
   $statement = $this->db->prepare($query);
   $statement->execute($data);
   $borrow_id = $this->db->lastInsertId();
   $query = "UPDATE books SET book_status = 0 WHERE id = :book_id";
   $statement = $this->db->prepare($query);
   $statement->execute([':book_id' => $data[':book_id']]);
   return $borrow_id;
  } catch (PDOException $e) {
   return $e->getMessage();
  }


  public function getLastBorrowId()
   {
      $statement = $this->db->prepare("SELECT * FROM book_borrow ORDER BY id DESC LIMIT 1");
      $statement->execute();
      $row = $statement->fetch();
      return $row ?? false;
   }
  */