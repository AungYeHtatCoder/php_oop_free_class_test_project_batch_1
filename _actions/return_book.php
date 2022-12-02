<?php 
include('../vendor/autoload.php');
use Libs\Database\MySQL;
use Libs\Database\BookTable;
use Libs\Database\BorrowTable;

$book_id = $_POST['book_id'];

$table = new BorrowTable(new MySQL());

// returnBorrowBook
$result = $table->returnBorrowBook($book_id);

if($result) {
    header('location: ../admin/borrow_index.php');
} else {
    echo "Error";
}