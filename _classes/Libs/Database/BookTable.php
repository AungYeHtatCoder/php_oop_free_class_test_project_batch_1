<?php 
namespace Libs\Database;
use PDO;
use PDOException;

class BookTable
{
 private $db = null;

 public function __construct($db)
 {
  $this->db = $db->connect();
 }

 // add new program to the database
 public function addBook($data)
 {
  try {
   $sql = "INSERT INTO books (title, category_id, author_id, publisher_id, publish_date, edition, volume, isnb, price, description, cover_image, user_id, book_status, created_at) VALUES (:title, :category_id, :author_id, :publisher_id, :publish_date, :edition, :volume, :isnb, :price, :description, :cover_image, :user_id, :book_status, :created_at)";
   $stmt = $this->db->prepare($sql);
   $stmt->bindParam(":title", $data['title']);
   $stmt->bindParam(":category_id", $data['category_id']);
   $stmt->bindParam(":author_id", $data['author_id']);
   $stmt->bindParam(":publisher_id", $data['publisher_id']);
   $stmt->bindParam(":publish_date", $data['publish_date']);
   $stmt->bindParam(":edition", $data['edition']);
   $stmt->bindParam(":volume", $data['volume']);
   $stmt->bindParam(":isnb", $data['isnb']);
   $stmt->bindParam(":price", $data['price']);
   $stmt->bindParam(":description", $data['description']);
   $stmt->bindParam(":cover_image", $data['cover_image']);
   $stmt->bindParam(":user_id", $data['user_id']);
   $stmt->bindParam(":book_status", $data['book_status']);
   $stmt->bindParam(":created_at", date('Y-m-d H:i:s'));
   $stmt->execute();
   return $stmt->rowCount();
  } catch (PDOException $e) {
   echo $e->getMessage();
  }
 }

 // get all books from the database with table join // author, category, publisher
 public function getAllBook()
 {
  try {
   $sql = "SELECT books.*, authors.author_name, categories.category_name, publishers.publisher_name FROM books INNER JOIN authors ON books.author_id = authors.id INNER JOIN categories ON books.category_id = categories.id INNER JOIN publishers ON books.publisher_id = publishers.id ORDER BY books.id DESC";
   $stmt = $this->db->prepare($sql);
   $stmt->execute();
   return $stmt->fetchAll(PDO::FETCH_OBJ);
  } catch (PDOException $e) {
   echo $e->getMessage();
  }
 }
 // show single book by id
 public function getBookById($id)
 {
  try {
   $sql = "SELECT books.*, authors.author_name, categories.category_name, publishers.publisher_name FROM books INNER JOIN authors ON books.author_id = authors.id INNER JOIN categories ON books.category_id = categories.id INNER JOIN publishers ON books.publisher_id = publishers.id WHERE books.id = :id";
   $stmt = $this->db->prepare($sql);
   $stmt->bindParam(":id", $id);
   $stmt->execute();
   return $stmt->fetch(PDO::FETCH_OBJ);
  } catch (PDOException $e) {
   echo $e->getMessage();
  }
 }
 
}