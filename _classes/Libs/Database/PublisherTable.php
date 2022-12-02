<?php 
namespace Libs\Database;
use PDO;
use PDOException;

class PublisherTable
{
 private $db = null;

 public function __construct($db)
 {
  $this->db = $db->connect();
 }

 // add new program to the database
 public function addPublisher($data)
 {
  try {
   $query = "INSERT INTO publishers (publisher_name, created_at) VALUES (:publisher_name, NOW())";
   $statement = $this->db->prepare($query);
   $statement->execute($data);
   return $this->db->lastInsertId();
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }

 // get all programs from the database
 public function getAllPublisher()
 {
  try {
   $query = "SELECT * FROM publishers ORDER BY id DESC";
   $statement = $this->db->prepare($query);
   $statement->execute();
   return $statement->fetchAll(PDO::FETCH_OBJ);
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }

 // get program by id
 public function getPublisherById($id)
 {
  try {
   $query = "SELECT * FROM publishers WHERE id = :id";
   $statement = $this->db->prepare($query);
   $statement->execute(['id' => $id]);
   return $statement->fetch(PDO::FETCH_OBJ);
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }

 // update program by id
 public function PublisherUpdate($data)
 {
  try {
   $query = "UPDATE publishers SET publisher_name = :publisher_name WHERE id = :id";
   $statement = $this->db->prepare($query);
   $statement->execute($data);
   return $statement->rowCount();
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }

 // delete program by id
 public function PublisherDelete($id)
 {
  try {
   $query = "DELETE FROM publishers WHERE id = :id";
   $statement = $this->db->prepare($query);
   $statement->execute(['id' => $id]);
   return $statement->rowCount();
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }
}