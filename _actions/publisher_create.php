<?php 
include('../vendor/autoload.php');

use Libs\Database\MySQL;

use Libs\Database\PublisherTable;

$data = [
 'publisher_name' => $_POST['publisher_name']
];

$table = new PublisherTable(new MySQL());

if($table)
{
 //echo $table->addAuthor($data);
 $table->addPublisher($data);
 header('Location: ../admin/publisher_index.php');
}else{
 echo "Error";
}