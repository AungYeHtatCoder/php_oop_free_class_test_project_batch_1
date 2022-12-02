<?php 
namespace Libs\Database;
use PDO;
use PDOException;

class PostTable
{
 private $db = null;

 public function __construct($db)
 {
  $this->db = $db->connect();
 }

 // add new posts to the database
 public function InsertPost($data)
 {
  try {
   $query = "INSERT INTO posts (title, post_text, file_name, post_status, user_id, created_at) VALUES (:title, :post_text, :file_name, :post_status, :user_id, NOW())";
   $statement = $this->db->prepare($query);
   $statement->execute($data);
   return $this->db->lastInsertId();
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }

 // get all posts from the database join with users table
 public function getAllPost()
 {
  try {
   $query = "SELECT posts.*, users.name FROM posts INNER JOIN users ON posts.user_id = users.id ORDER BY posts.id DESC";
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

 // get all posts from the database join with users table and role table no parameter
 public function getAllPostNoParam()
 {
  try {
   $query = "SELECT posts.*, users.name, users.role_id, roles.name as role_name, roles.value FROM posts INNER JOIN users ON posts.user_id = users.id INNER JOIN roles ON users.role_id = roles.id ORDER BY posts.id DESC";
   $statement = $this->db->prepare($query);
   $statement->execute();
   return $statement->fetchAll(PDO::FETCH_OBJ);
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }

 // posts by id 
 public function getPostById($id)
 {
  try {
   $query = "SELECT posts.*, users.name, users.role_id, roles.name as role_name, roles.value FROM posts INNER JOIN users ON posts.user_id = users.id INNER JOIN roles ON users.role_id = roles.id WHERE posts.id = :id";
   $statement = $this->db->prepare($query);
   $statement->execute(['id' => $id]);
   return $statement->fetch(PDO::FETCH_OBJ);
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }
 
  
}