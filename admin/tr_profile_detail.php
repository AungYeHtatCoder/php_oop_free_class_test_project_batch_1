<?php 
include('../vendor/autoload.php');
include('auth.php');
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Libs\Database\PostTable;
$table = new PostTable(new MySQL());
$posts = $table->getAllPostNoParam();
$user_data = new UsersTable(new MySQL());
$get_no_auth_profile = $user_data->getNoAuthProfile($_GET['id']);
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
        <?php foreach($posts as $post) : ?>
        <?php if($post->post_status === 1) : ?>
        <?php if($post->role_id === 3) : ?>
        <div class="col-md-4">

         <div class="card card-product">
          <div class="card-header card-header-image" data-header-animation="true">
           <a href="#pablo">
            <img class="img" src="../_actions/post_img/<?= $post->file_name; ?>">
           </a>
          </div>
          <div class="card-body">
           <div class="card-actions text-center">
            <button type="button" class="btn btn-danger btn-link fix-broken-card">
             <i class="material-icons">build</i> Fix Header!
            </button>
            <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="View">
             <i class="material-icons">art_track</i>
            </button>
            <button type="button" class="btn btn-success btn-link" rel="tooltip" data-placement="bottom" title="Edit">
             <i class="material-icons">edit</i>
            </button>
            <button type="button" class="btn btn-danger btn-link" rel="tooltip" data-placement="bottom" title="Remove">
             <i class="material-icons">close</i>
            </button>
           </div>
           <h4 class="card-title">
            <a href="#pablo"><?= $post->title ?></a>
           </h4>
           <div class="card-description">
            <?= substr($post->post_text, 0, 100); ?>
           </div>
          </div>
          <div class="card-footer">
           <div class="price">
            <h4>$899/night</h4>
           </div>
           <div class="stats">
            <p class="card-category"><i class="material-icons">place</i> Barcelona, Spain</p>
           </div>
          </div>
         </div>

        </div>
        <?php endif; ?>
        <?php endif; ?>
        <?php endforeach; ?>

       </div>



       <!-- add phone start -->

       <!-- add phone end -->
      </div> <!-- col-md-8 end -->
      <div class="col-md-4">
       <div class="card card-profile">
        <div class="card-avatar">
         <a href="#pablo">
          <img class="img" src="../_actions/profile/<?= $get_no_auth_profile->profile ?>" />
         </a>
        </div>
        <div class="card-body">
         <h4 class="card-category text-gray">User Name : &nbsp; &nbsp; <span
           class="badge badge-primary"><?= $get_no_auth_profile->name ?></span></h4>
         <h4 class="card-title">User Role : &nbsp; &nbsp; <span
           class="badge badge-info"><?= $get_no_auth_profile->role ?></span></h4>
         <h4 class="card-description">
          User Email : &nbsp; &nbsp; <span class="badge badge-warning"><?= $get_no_auth_profile->email ?></span>
         </h4>

         <h4 class="card-description">
          User Phone : &nbsp; &nbsp; <span class="badge badge-warning"><?= $get_no_auth_profile->phone ?></span>
         </h4>
         <a href="#pablo" class="btn btn-rose btn-round">Follow</a>
        </div>
       </div>




       <!-- profile update start -->


       <!-- profile udate end -->
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