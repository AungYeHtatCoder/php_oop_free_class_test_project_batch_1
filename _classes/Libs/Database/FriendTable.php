<?php 
namespace Libs\Database;

use PDO;
use PDOException;
class FriendTable
{
 private $db = null;

 public function __construct($db)
 {
  $this->db = $db->connect();
 }

 public function AddFriend($data)
 {
  try {
   $query = "INSERT INTO friends (user_id, friend_id, status, created_at) VALUES (:user_id, :friend_id, :status, NOW())";
   $statement = $this->db->prepare($query);
   $statement->execute($data);
   return $this->db->lastInsertId();
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }

 // get all pending friend requests join with users table
 public function getPendingFriendRequests($user_id)
 {
  try {
   $query = "SELECT * FROM friends JOIN users ON friends.user_id = users.id WHERE friends.friend_id = :user_id AND friends.status = 0";
   $statement = $this->db->prepare($query);
   $statement->execute(['user_id' => $user_id]);
   return $statement->fetchAll(PDO::FETCH_OBJ);
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }


 // accept friend request
 public function AcceptFriend($id, $friend_id)
 {
  $statement = $this->db->prepare(
   "UPDATE friends SET status=1 WHERE user_id = :id AND friend_id = :friend_id"
  );
  $statement->execute([':id' => $id, ':friend_id' => $friend_id]);

  return $statement->rowCount();
 }

 // get all accepted friend requests join with users table
 public function getAcceptedFriendRequests($user_id)
 {
  try {
   $query = "SELECT * FROM friends JOIN users ON friends.user_id = users.id WHERE friends.friend_id = :user_id AND friends.status = 1";
   $statement = $this->db->prepare($query);
   $statement->execute(['user_id' => $user_id]);
   return $statement->fetchAll(PDO::FETCH_OBJ);
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }

 public function FriendList($id)
 {
  $statement = $this->db->prepare("SELECT friends.*, users.name, users.profile FROM friends LEFT JOIN users ON friends.friend_id = users.id WHERE friends.user_id = :id");
  $statement->execute([
   ':id' => $id
  ]);
  $row = $statement->fetchAll();
  return $row ?? false;
 }

 public function FriendRequest($id)
 {
  $statement = $this->db->prepare("SELECT friends.*, users.name, users.profile FROM friends LEFT JOIN users ON friends.user_id = users.id WHERE friends.friend_id = :id");
  $statement->execute([
   ':id' => $id
  ]);
  $row = $statement->fetchAll();
  return $row ?? false;
 }

 public function FriendRequestAccept($id, $friend_id)
 {
  $statement = $this->db->prepare(
   "UPDATE friends SET status = 1 WHERE user_id = :id AND friend_id = :friend_id"
  );
  $statement->execute([':id' => $id, ':friend_id' => $friend_id]);

  return $statement->rowCount();
 }

 public function FriendRequestReject($id, $friend_id)
 {
  $statement = $this->db->prepare(
   "DELETE FROM friends WHERE user_id = :id AND friend_id = :friend_id"
  );
  $statement->execute([':id' => $id, ':friend_id' => $friend_id]);

  return $statement->rowCount();
 }

 
 }