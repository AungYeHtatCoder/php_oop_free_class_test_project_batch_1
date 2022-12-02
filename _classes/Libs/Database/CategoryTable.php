<?php 
namespace Libs\Database;
use PDO;
use PDOException;

class CategoryTable
{
 private $db = null;

 public function __construct($db)
 {
  $this->db = $db->connect();
 }

 // add new program to the database
 public function addCategory($data)
 {
  try {
   $query = "INSERT INTO categories (category_name, created_at) VALUES (:category_name, NOW())";
   $statement = $this->db->prepare($query);
   $statement->execute($data);
   return $this->db->lastInsertId();
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }

 // get all programs from the database
 public function getAllCategory()
 {
  try {
   $query = "SELECT * FROM categories ORDER BY id DESC";
   $statement = $this->db->prepare($query);
   $statement->execute();
   return $statement->fetchAll(PDO::FETCH_OBJ);
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }

 // get program by id
 public function getCategoryById($id)
 {
  try {
   $query = "SELECT * FROM categories WHERE id = :id";
   $statement = $this->db->prepare($query);
   $statement->execute(['id' => $id]);
   return $statement->fetch(PDO::FETCH_OBJ);
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }

 // update program by id
 public function CategoryUpdate($data)
 {
  try {
   $query = "UPDATE categories SET category_name = :category_name WHERE id = :id";
   $statement = $this->db->prepare($query);
   $statement->execute($data);
   return $statement->rowCount();
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }

 // delete program by id
 public function CategoryDelete($id)
 {
  try {
   $query = "DELETE FROM categories WHERE id = :id";
   $statement = $this->db->prepare($query);
   $statement->execute(['id' => $id]);
   return $statement->rowCount();
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }
}