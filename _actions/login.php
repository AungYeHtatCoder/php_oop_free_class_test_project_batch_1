<?php 
session_start();
include('../vendor/autoload.php');
use Libs\Database\MySQL;
use Libs\Database\UsersTable;

$email = $_POST['email'];
$password = md5($_POST['password']);

$table = new UsersTable(new MySQL());
$user = $table->UserLogin($email, $password);

// echo "<pre>";
// print_r($user);
// echo "</pre>";
// die();

if($user->value == "1"){
 $_SESSION['user'] = $user;
 header('location: ../admin/admin_profile.php?msg=You are logged in as admin');
}elseif($user->value === 2){
    $_SESSION['user'] = $user;
    header('location: ../admin/lb_profile.php');
}elseif($user->value === 3){
    $_SESSION['user'] = $user;
    header('location: ../admin/tr_profile.php');
}elseif($user->value === 4){
    $_SESSION['user'] = $user;
    header('location: ../admin/st_profile.php');
}elseif($user->value === 5){
    $_SESSION['user'] = $user;
    header('location: ../admin/user_profile.php');
}else{
 
 header('location: ../login_form.php');
}