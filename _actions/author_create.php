<?php 
include('../vendor/autoload.php');

use Libs\Database\MySQL;
use Libs\Database\AuthorsTable;

$data = [
 'author_name' => $_POST['author_name']
];

$table = new AuthorsTable(new MySQL());

if($table)
{
 //echo $table->addAuthor($data);
 $table->addAuthor($data);
 header('Location: ../admin/author_index.php');
}else{
 echo "Error";
}