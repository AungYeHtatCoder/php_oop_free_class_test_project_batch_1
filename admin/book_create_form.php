<?php 
include('layouts/head.php');
include('auth.php');
include('../vendor/autoload.php');
use Libs\Database\MySQL;
use Libs\Database\PublisherTable;
use Libs\Database\CategoryTable;
use Libs\Database\AuthorsTable;
$table = new PublisherTable(new MySQL());
$publishers = $table->getAllPublisher();
$category_data = new CategoryTable(new MySQL());
$categories = $category_data->getAllCategory();
$author_data = new AuthorsTable(new MySQL());
$authors = $author_data->getAllAuthor();
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
           <h4 class="card-title">Create New Book <span><a href="book_index.php"
              class="btn btn-info btn-round">Back</a></span></h4>
          </div>
         </div>
         <div class="card-body ">
          <form method="post" action="../_actions/book_create.php" class="form-horizontal"
           enctype="multipart/form-data">
           <div class="row">
            <label class="col-sm-2 col-form-label">Book Title</label>
            <div class="col-sm-10">
             <div class="form-group">
              <input type="text" class="form-control" name="title" placeholder="Enter Book Title">
             </div>
            </div>
           </div>
           <div class="row">
            <label class="col-sm-2 col-form-label">Category Name</label>
            <div class="col-sm-10">
             <div class="form-group">
              <select name="category_id" class="selectpicker col-md-12" data-style="btn btn-success" multiple
               title="Choose Category" data-size="7">
               <?php foreach($categories as $category): ?>
               <option value="<?= $category->id; ?>"><?= $category->category_name; ?></option>
               <?php endforeach; ?>
              </select>
             </div>
            </div>
           </div>
           <div class="row">
            <label class="col-sm-2 col-form-label">Author Name</label>
            <div class="col-sm-10">
             <div class="form-group">
              <select name="author_id" class="selectpicker col-md-12" data-style="btn btn-primary" multiple
               title="Choose Author" data-size="7">
               <?php foreach($authors as $author): ?>
               <option value="<?= $author->id; ?>"><?= $author->author_name; ?></option>
               <?php endforeach; ?>
              </select>
             </div>
            </div>
           </div>
           <div class="row">
            <label class="col-sm-2 col-form-label">Publisher Name</label>
            <div class="col-sm-10">
             <div class="form-group">
              <select name="publisher_id" class="selectpicker col-md-12" data-style="btn btn-info" multiple
               title="Choose Publisher" data-size="7">
               <?php foreach($publishers as $publisher): ?>
               <option value="<?= $publisher->id; ?>"><?= $publisher->publisher_name; ?></option>
               <?php endforeach; ?>
              </select>
             </div>
            </div>
           </div>
           <div class="row">
            <label class="col-sm-2 col-form-label">Publisher Date</label>
            <div class="col-sm-10">
             <div class="form-group">
              <input type="text" class="form-control datepicker" name="publish_date" value="10/06/2018">
             </div>
            </div>
           </div>
           <div class="row">
            <label class="col-sm-2 col-form-label">Edition</label>
            <div class="col-sm-10">
             <div class="form-group">
              <input type="text" class="form-control" placeholder="Enter Edition" name="edition">
             </div>
            </div>
           </div>
           <div class="row">
            <label class="col-sm-2 col-form-label">Volume</label>
            <div class="col-sm-10">
             <div class="form-group">
              <input type="text" class="form-control" placeholder="Enter Volume" name="volume">
             </div>
            </div>
           </div>
           <div class="row">
            <label class="col-sm-2 col-form-label">ISBN</label>
            <div class="col-sm-10">
             <div class="form-group">
              <input type="text" class="form-control" placeholder="Enter ISBN Number" name="isnb">
             </div>
            </div>
           </div>
           <div class="row">
            <label class="col-sm-2 col-form-label">Price</label>
            <div class="col-sm-10">
             <div class="form-group">
              <input type="text" class="form-control" placeholder="Enter Price" name="price">
             </div>
            </div>
           </div>
           <!-- description -->
           <div class="row">
            <label class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
             <div class="form-group">
              <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
             </div>
            </div>
           </div>
           <!-- cover_image -->
           <div class="row">
            <div class="col-sm-10">
             <div class="col-md-4 col-sm-4">
              <h4 class="title">Cover Image</h4>
              <div class="fileinput fileinput-new text-center" data-provides="fileinput">
               <div class="fileinput-new thumbnail">
                <img src="../../assets/img/image_placeholder.jpg" alt="...">
               </div>
               <div class="fileinput-preview fileinput-exists thumbnail"></div>
               <div>
                <span class="btn btn-rose btn-round btn-file">
                 <span class="fileinput-new">Select image</span>
                 <span class="fileinput-exists">Change</span>
                 <input type="file" name="cover_image" />
                </span>
                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i
                  class="fa fa-times"></i> Remove</a>
               </div>
              </div>
             </div>
            </div>
           </div>
           <div class="row">
            <div class="col-sm-10">
             <div class="form-group">
              <input type="submit" class="btn btn-primary btn-round float-right" value="Create New Book">
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