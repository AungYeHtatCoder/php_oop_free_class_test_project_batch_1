<?php 
include("../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\FriendTable;
use Helpers\Auth;

$auth = Auth::check();

$friend_id = $_POST['user_id'];
$id = $_POST['friend_id'];


// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// die();

$table = new FriendTable(new MySQL());

$accetpt_friend = $table->AcceptFriend($friend_id, $id);

// echo "<pre>";
// print_r($accetpt_friend);
// echo "</pre>";
// die();

if($accetpt_friend)
{
 if($auth->value === 1)
 {
  header("Location: ../admin/admin_profile.php?success_name=update");
 }elseif($auth->value === 2)
 {
  header("Location: ../admin/lb_profile.php?success_name=update");
 }elseif($auth->value === 3)
 {
  header("Location: ../admin/tr_profile.php?success_name=update");
 }elseif($auth->value === 4)
 {
  header("Location: ../admin/st_profile.php?success_name=update");
 }elseif($auth->value === 5)
 {
  header("Location: ../admin/user_profile.php?success_name=update");
 }
}else{
    header("Location: ../admin/lb_profile.php?error_accept=request");
}