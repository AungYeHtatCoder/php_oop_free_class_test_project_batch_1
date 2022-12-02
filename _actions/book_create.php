<?php 
include('../vendor/autoload.php');
use Libs\Database\MySQL;
use Libs\Database\BookTable;
use Helpers\Auth;
$auth = Auth::check();

$filename = $_FILES['cover_image']['name'];
$error = $_FILES['cover_image']['error'];
$tmp = $_FILES['cover_image']['tmp_name'];
$type = $_FILES['cover_image']['type'];

$data = [
 'title' => $_POST['title'],
 'category_id' => $_POST['category_id'],
 'author_id' => $_POST['author_id'],
 'publisher_id' => $_POST['publisher_id'],
 'publish_date' => date("Y-m-d", strtotime($_POST['publish_date'])),
 'edition' => $_POST['edition'],
 'volume' => $_POST['volume'],
 'isnb' => $_POST['isnb'],
 'price' => $_POST['price'],
 'description' => $_POST['description'],
 'cover_image' => $filename,
 'user_id' => $auth->id,
 'book_status' => 1,
];

// echo "<pre>";
// print_r($data);
// echo "</pre>";
// $table = new BookTable(new MySQL());
//   $book_data = $table->addBook($data);
  // echo "<pre>";
  // print_r($book_data);
  // echo "</pre>";
  // die();
if($error)
{
    header("Location: ../admin/book_create_form.php?=error");
}
if($type === "image/jpeg" or $type === "image/png")
{
    $table = new BookTable(new MySQL());
   $table->addBook($data);
    // echo "<pre>";
    // print_r($book);
    // echo "</pre>";
    // die();
    move_uploaded_file($tmp, "book_cover/$filename");

    header("Location: ../admin/book_index.php?success_book=created");
    
}