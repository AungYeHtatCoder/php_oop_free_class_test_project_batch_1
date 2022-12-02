<?php 
include('../vendor/autoload.php');
include('auth.php');
use Libs\Database\MySQL;
use Libs\Database\PostTable;
$table = new PostTable(new MySQL());
$posts = $table->getPostById($_GET['id']);
?>
<?php 
include('layouts/head.php');
?>

<body class="">
 <div class="wrapper ">
  <?php include('layouts/sidebar.php'); ?>
  <div class="main-panel">
   <!-- Navbar -->
   <?php include('layouts/navbar.php') ?>
   <!-- End Navbar -->
   <div class="content">
    <div class="container-fluid">
     <div class="row">
      <div class="col-md-8">
       <div class="card">
        <div class="card-header">
         <h4 class="card-title">Manage Post <span class="btn btn-primary" data-toggle="modal"
           data-target="#exampleModal">Create Post</span></h4>
        </div>
       </div>
       <div class="row">
        <div class="col-md-4">
         <div class="card card-product">
          <div class="card-header card-header-image" data-header-animation="true">
           <a href="#pablo">
            <img class="img" src="../_actions/post_img/<?= $posts->file_name; ?>">
           </a>
          </div>
          <div class="card-body">

           <h4 class="card-title">
            <a href="#pablo"><?= $posts->title ?></a>
           </h4>
           <div class="card-description">
            <?= $posts->post_text; ?>
           </div>
          </div>
          <div class="card-footer">
           <div class="price">
            <h4><?= date('F j, Y', strtotime($posts->created_at))?></h4>
           </div>
           <div class="stats">
            <p class="card-category"><i class="material-icons">place</i> Posted By <?= $posts->name ?></p>
           </div>
          </div>
         </div>
        </div>
       </div>
       <div class="col-md-4">
        <div class="card card-profile">
         <div class="card-header">
          <h4 class="card-title">Post Details</h4>
         </div>
        </div>
       </div>
      </div> <!-- col-md-8 end -->

     </div>
    </div>
   </div>
   <?php include('layouts/footer.php') ?>
  </div>
 </div>
 <?php include('layouts/right_sidebar.php') ?>
 <!--   Core JS Files   -->
 <?php include('layouts/script.php') ?>