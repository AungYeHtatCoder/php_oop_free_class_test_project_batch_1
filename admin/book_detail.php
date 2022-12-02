<?php 
include('layouts/head.php');
include('auth.php');
include('../vendor/autoload.php');
use Libs\Database\MySQL;
use Libs\Database\BookTable;
$id = $_GET['id'];
$table = new BookTable(new MySQL());

$book_detail = $table->getBookById($id);
// echo "<pre>";
// print_r($book_detail);
// echo "</pre>";
?>

<body class="">
 <div class="wrapper ">
  <?php include('layouts/sidebar.php'); ?>
  <div class="main-panel">
   <!-- Navbar -->
   <?php include('layouts/navbar.php') ?>
   <!-- End Navbar -->
   <div class="content">
    <div class="content">
     <div class="container-fluid">
      <div class="row">
       <div class="col-md-12">
        <div class="card ">
         <div class="card-header card-header-rose card-header-text">
          <div class="card-text">
           <h4 class="card-title">Book Detail <span><a href="book_index.php"
              class="btn btn-primary btn-round">Back</a></span></h4>
          </div>
         </div>
         <div class="card-body ">
          <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%"
           style="width:100%">
           <tr>
            <th>ID</th>
            <td><?php echo $book_detail->id; ?></td>
           </tr>
           <tr>
            <th>Title</th>
            <td><?php echo $book_detail->title; ?></td>
           </tr>
           <tr>
            <th>Category</th>
            <td><?php echo $book_detail->category_name; ?></td>
           </tr>
           <tr>
            <th>Author</th>
            <td><?php echo $book_detail->author_name; ?></td>
           </tr>
           <tr>
            <th>Publisher</th>
            <td><?php echo $book_detail->publisher_name; ?></td>
           </tr>
           <tr>
            <th>Cover</th>
            <td><img src="../_actions/book_cover/<?php echo $book_detail->cover_image; ?>" alt="" width="100"></td>
           </tr>
           <tr>
            <th>Price</th>
            <td><?php echo $book_detail->price; ?></td>
           </tr>
           <tr>
            <th>Description</th>
            <td><?php echo $book_detail->description; ?></td>
           </tr>
           <tr>
            <th>Created At</th>
            <td><?php echo $book_detail->created_at; ?></td>
           </tr>
           <tr>
            <th>Updated At</th>
            <td><?php echo $book_detail->updated_at; ?></td>
           </tr>
          </table>
         </div>
        </div>
       </div>
      </div>
     </div>
    </div>
   </div>
   <?php include('layouts/footer.php') ?>
  </div>
 </div>
 <?php include('layouts/right_sidebar.php') ?>
 <!--   Core JS Files   -->
 <?php include('layouts/script.php') ?>