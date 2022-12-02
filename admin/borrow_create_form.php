<?php 
include('layouts/head.php');
include('auth.php');
include('../vendor/autoload.php');
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Libs\Database\BookTable;

$table = new UsersTable(new MySQL());
$users = $table->getAllUsers();
$book_table = new BookTable(new MySQL());
$books = $book_table->getAllBook();
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
           <h4 class="card-title">Create New Book Borrow User <span><a href="borrow_index.php"
              class="btn btn-info btn-round">Back</a></span></h4>
          </div>
         </div>
         <div class="card-body ">
          <form method="post" action="../_actions/borrow_create.php" class="form-horizontal"
           enctype="multipart/form-data">
           <div class="row">
            <label class="col-sm-2 col-form-label">Choose Book Title</label>
            <div class="col-sm-10">
             <div class="form-group">
              <select name="book_id[]" class="selectpicker col-md-12" data-style="btn btn-rose" multiple
               title="Choose Book" data-size="7">
               <?php foreach($books as $book): ?>
               <?php if($book->book_status === 1): ?>
               <option value="<?= $book->id; ?>"><?= $book->title; ?></option>
               <?php endif; ?>
               <?php endforeach; ?>
              </select>
             </div>
            </div>
           </div>
           <div class="row">
            <label class="col-sm-2 col-form-label">Borrow UserName</label>
            <div class="col-sm-10">
             <div class="form-group">
              <select name="user_id" class="selectpicker col-md-12" data-style="btn btn-primary" multiple
               title="Choose Borrow UserName" data-size="7">
               <?php foreach($users as $user): ?>
               <option value="<?= $user->id; ?>"><?= $user->name; ?></option>
               <?php endforeach; ?>
              </select>
             </div>
            </div>
           </div>

           <div class="row">
            <label class="col-sm-2 col-form-label">Borrow Start Date</label>
            <div class="col-sm-10">
             <div class="form-group">
              <input type="text" class="form-control datepicker" name="borrow_date" value="20/11/2022">
             </div>
            </div>
           </div>

           <div class="row">
            <label class="col-sm-2 col-form-label">Borrow Return Date</label>
            <div class="col-sm-10">
             <div class="form-group">
              <input type="text" class="form-control datepicker" name="return_date" value="20/11/2022">
             </div>
            </div>
           </div>
           <div class="row">
            <div class="col-sm-10">
             <div class="form-group">
              <input type="submit" class="btn btn-primary btn-round float-right" value="Create New Book Borrow User">
             </div>
            </div>
           </div>
          </form>
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

 <script>
 $(document).ready(function() {
  // initialise Datetimepicker and Sliders
  md.initFormExtendedDatetimepickers();
  if ($('.slider').length != 0) {
   md.initSliders();
  }
 });
 </script>