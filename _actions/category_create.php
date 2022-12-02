<?php 
include('../vendor/autoload.php');

use Libs\Database\MySQL;
use Libs\Database\CategoryTable;

$data = [
 'category_name' => $_POST['category_name']
];

$table = new CategoryTable(new MySQL());

if($table)
{
 //echo $table->addAuthor($data);
 $table->addCategory($data);
 header('Location: ../admin/category_index.php');
}else{
 echo "Error";
}