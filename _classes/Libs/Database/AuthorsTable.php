<?php 
namespace Libs\Database;
use PDO;
use PDOException;

class AuthorsTable
{
 private $db = null;

 public function __construct($db)
 {
  $this->db = $db->connect();
 }

 // add new program to the database
 public function addAuthor($data)
 {
  try {
   $query = "INSERT INTO authors (author_name, created_at) VALUES (:author_name, NOW())";
   $statement = $this->db->prepare($query);
   $statement->execute($data);
   return $this->db->lastInsertId();
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }

 // get all programs from the database
 public function getAllAuthor()
 {
  try {
   $query = "SELECT * FROM authors";
   $statement = $this->db->prepare($query);
   $statement->execute();
   return $statement->fetchAll(PDO::FETCH_OBJ);
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }

 // get program by id
 public function getAuthorById($id)
 {
  try {
   $query = "SELECT * FROM authors WHERE id = :id";
   $statement = $this->db->prepare($query);
   $statement->execute(['id' => $id]);
   return $statement->fetch(PDO::FETCH_OBJ);
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }

 // update program by id
 public function AuthorUpdate($data)
 {
  try {
   $query = "UPDATE authors SET author_name = :author_name WHERE id = :id";
   $statement = $this->db->prepare($query);
   $statement->execute($data);
   return $statement->rowCount();
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }

 // delete program by id
 public function AuthorDelete($id)
 {
  try {
   $query = "DELETE FROM authors WHERE id = :id";
   $statement = $this->db->prepare($query);
   $statement->execute(['id' => $id]);
   return $statement->rowCount();
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }
}