<?php 
include('layouts/head.php');
include('auth.php');
include('../vendor/autoload.php');
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Libs\Database\BorrowTable;
use Libs\Database\BookTable;
$table = new UsersTable(new MySQL());
$users = $table->getAllUsers();

$book_table = new BookTable(new MySQL());
$books = $book_table->getAllBook();
$borrow_table = new BorrowTable(new MySQL());
$borrows = $borrow_table->getAllBorrow();

// echo "<pre>";
// print_r($borrows);
// echo "</pre>";
// die();
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
        <div class="card">
         <div class="card-header card-header-success card-header-icon">
          <div class="card-icon">
           <i class="material-icons">person_add_alt</i>
          </div>
          <h4 class="card-title">BooK Borrow Dashboard <span><a href="borrow_create_form.php"
             class="btn btn-primary btn-round">+ New Book Borrow</a></span> <span><a href="borrow_all_record_index.php"
             class="btn btn-warning btn-round">View Borrow All Record</a></span></h4>
         </div>
         <div class="card-body">
          <div class="material-datatables">
           <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%"
            style="width:100%">
            <thead>
             <tr>
              <th>ID</th>
              <th>Book Name</th>
              <th>UserName </th>
              <th>Borrow Date</th>
              <th>Return Date</th>
              <th>Return Book</th>
              <th class="disabled-sorting text-right">Actions</th>
             </tr>
            </thead>
            <tbody>
             <tr>
              <?php foreach($borrows as $book) : ?>
              <?php 
              // only show book_status == 0 and last borrow book
              if($book->book_status == 0) : 
                //if($book->id == $borrow_table->getLastBorrowId($book->book_id)) :
              //  if return date is grade than today, show red color
              $return_date = $book->return_date;
              $today = date("Y-m-d");
              $date1 = strtotime($return_date);
              $date2 = strtotime($today);
              $diff = $date1 - $date2;
              $days = floor($diff / (60 * 60 * 24));
              ?>
              <?php // not show returned date 
              //$book->return_date = "Not Returned Yet"; 
              ?>
              <td><?= $book->id; ?></td>
              <td><?= $book->title; ?></td>
              <td><?= $book->name; ?></td>
              <td><?= $book->borrow_date; ?></td>
              <td><?php if($days < 0) : ?>
               <span style="color:red;">
                <del><?= $book->return_date; ?></del>
               </span>
               <?php else : ?>
               <?= $book->return_date; ?>
               <?php endif; ?>
              </td>
              <td>
               <form action="../_actions/return_book.php" method="POST">
                <input type="hidden" name="book_id" value="<?= $book->book_id; ?>">
                <?php if($days < 0) : ?>
                <input type="submit" class="btn btn-white btn-round" value="Return Book" disabled>
                <?php else : ?>
                <input type="submit" class="btn btn-success" value="Return Book">
                <?php endif; ?>
               </form>
              </td>
              <td>
               <a href="borrow_edit_form.php?id=<?= $book->id; ?>"
                class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">edit</i></a>
              </td>
             </tr>
             <?php endif; ?>
             <?php //endif; ?>
             <?php endforeach; ?>
            </tbody>
           </table>
          </div>
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