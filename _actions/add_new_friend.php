<?php 
include('../vendor/autoload.php');
use Helpers\Auth;
use Libs\Database\MySQL;
use Libs\Database\FriendTable;
$auth = Auth::check();

$data = [
 'user_id' => $auth->id,
 'friend_id' => $_POST['friend_id'],
 'status' => 0,
];


// echo "<pre>";
// print_r($data);
// echo "</pre>";
// die();
$table = new FriendTable(new MySQL());

if($table)
{
 //echo $table->addAuthor($data);
 $table->AddFriend($data);
 //header('Location: ../admin/admin_profile.php');
 if($auth->value === 1)
 {
  header('Location: ../admin/admin_profile.php');
 }elseif($auth->value === 2)
 {
  header('Location: ../admin/lb_profile.php');
 }elseif($auth->value === 3)
 {
  header('Location: ../admin/tr_profile.php');
 }elseif($auth->value === 4)
 {
  header('Location: ../admin/st_profile.php');
 }elseif($auth->value === 5)

 {
  header('Location: ../admin/user_profile.php');
 }
}else{
 echo "Error";
}