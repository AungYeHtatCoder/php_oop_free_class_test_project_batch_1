<?php 

include('../vendor/autoload.php');

use Libs\Database\MySQL;
use Libs\Database\UsersTable;

$data = [
 'name' => $_POST['name'],
 'email' => $_POST['email'],
 'password' => md5($_POST['password']),
 'role_id' => 1,
];
// echo "<pre>";
// print_r($data);
// echo "</pre>";

$table = new UsersTable(new MySQL());

$result = $table->UserRegister($data);
// echo "<pre>";
// print_r($result);
// echo "</pre>";
if($result){
 header('location: ../login_form.php?msg=You are registered successfully');
}else{
 header('location: ../reg_form.php?msg=Something went wrong');
}