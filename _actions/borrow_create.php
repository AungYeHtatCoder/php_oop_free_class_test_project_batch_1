<?php 
include('../vendor/autoload.php');
use Libs\Database\MySQL;
use Libs\Database\BorrowTable;

$data = [
 'book_id' => $_POST['book_id'],
 'user_id' => $_POST['user_id'],
 'borrow_date' => date('Y-m-d'),
 'return_date' => date('Y-m-d', strtotime('+7 days'))
];

// echo "<pre>";
// print_r($data);
// echo "</pre>";

$table = new BorrowTable(new MySQL());

// multiple insert book_id
if (is_array($_POST['book_id'])) {
 foreach ($_POST['book_id'] as $key => $value) {
  $data = [
   'book_id' => $value,
   'user_id' => $_POST['user_id'],
   'borrow_date' => date('Y-m-d'),
   'return_date' => date('Y-m-d', strtotime('+7 days'))
  ];
  $result =$table->addBorrowBook($data, $value);
// echo "<pre>";
// print_r($result);
// echo "</pre>";
// die();
  header('location: ../admin/book_index.php');
 }
} else {
 $table->addBorrowBook($data, $_POST['book_id']);
 header('location: ../admin/book_index.php');
}

// $result = $table->addBorrow($data);

// echo "<pre>";
// print_r($result);
// echo "</pre>";
// die();