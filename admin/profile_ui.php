<?php 
include('../vendor/autoload.php');
// use Helpers\Auth;

// $auth = Auth::check();

// echo "<pre>";
// print_r($auth);
// echo "</pre>";

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

     <?php if(isset($_GET['success_name']) && $_GET['success_name'] == true){ ?>
     <div class="alert alert-success">
      <strong>Success!</strong> Name has been updated.
     </div>
     <?php } else if(isset($_GET['error_name']) && $_GET['error_name'] == true){ ?>
     <div class="alert alert-danger">
      <strong>Error!</strong> Name has not been updated.
     </div>
     <?php } ?>


     <?php if(isset($_GET['success_password']) && $_GET['success_password'] == true){ ?>
     <div class="alert alert-info">
      <strong>Success!</strong> Password has been updated.
     </div>
     <?php } else if(isset($_GET['error_password']) && $_GET['error_password'] == true){ ?>
     <div class="alert alert-danger">
      <strong>Error!</strong> Password has not been updated.
     </div>
     <?php } ?>


     <?php if(isset($_GET['success_phone']) && $_GET['success_phone'] == true){ ?>
     <div class="alert alert-info">
      <strong>Success!</strong> Phone has been created.
     </div>
     <?php } else if(isset($_GET['error_phone']) && $_GET['error_phone'] == true){ ?>
     <div class="alert alert-danger">
      <strong>Error!</strong> Phone has not been created.
     </div>
     <?php } ?>

     <div class="row">
      <div class="col-md-8">
       <div class="card">
        <div class="card-header card-header-icon card-header-rose">
         <div class="card-icon">
          <i class="material-icons">manage_accounts</i>
         </div>
         <h4 class="card-title">Edit Profile -
          <small class="category">Complete your profile</small>
         </h4>
        </div>
        <div class="card-body">
         <form action="../_actions/name_change.php" method="post">
          <div class="row">
           <div class="col-md-12">
            <div class="form-group">
             <label class="bmd-label-floating">User Name</label>
             <input type="text" class="form-control" name="name" value="<?= $auth->name ?>">
            </div>
           </div>
          </div>
          <input type="submit" class="btn btn-rose pull-right" value="Update UserName">
          <div class="clearfix"></div>
         </form>
        </div>
       </div>

       <div class="card">
        <div class="card-header card-header-icon card-header-rose">
         <div class="card-icon">
          <i class="material-icons">phonelink_lock</i>
         </div>
         <h4 class="card-title">Change Password -
          <small class="category">Complete your profile</small>
         </h4>
        </div>
        <div class="card-body">
         <form action="../_actions/pw_change.php" method="post">
          <div class="row">
           <div class="col-md-12">
            <div class="form-group">
             <label class="bmd-label-floating">Password</label>
             <input type="text" class="form-control" name="password">
            </div>
           </div>
          </div>
          <input type="submit" class="btn btn-rose pull-right" value="Update Password">
          <div class="clearfix"></div>
         </form>
        </div>
       </div>

       <!-- add phone start -->
       <div class="card">
        <div class="card-header card-header-icon card-header-rose">
         <div class="card-icon">
          <i class="material-icons">add_ic_call</i>
         </div>
         <h4 class="card-title">Add Phone No -
          <small class="category">Complete your profile</small>
         </h4>
        </div>
        <div class="card-body">
         <form action="../_actions/phone_create.php" method="post">
          <div class="row">
           <div class="col-md-12">
            <div class="form-group">
             <label class="bmd-label-floating">Phone</label>
             <input type="text" class="form-control" name="phone">
            </div>
           </div>
          </div>
          <input type="submit" class="btn btn-rose pull-right" value="+ Add Phone No">
          <div class="clearfix"></div>
         </form>
        </div>
       </div>
       <!-- add phone end -->
      </div>
      <div class="col-md-4">
       <div class="card card-profile">
        <div class="card-avatar">
         <a href="#pablo">
          <img class="img" src="../_actions/profile/<?= $auth->profile ?>" />
         </a>
        </div>
        <div class="card-body">
         <h4 class="card-category text-gray">User Name : &nbsp; &nbsp; <span
           class="badge badge-primary"><?= $auth->name ?></span></h4>
         <h4 class="card-title">User Role : &nbsp; &nbsp; <span class="badge badge-info"><?= $auth->role ?></span></h4>
         <h4 class="card-description">
          User Email : &nbsp; &nbsp; <span class="badge badge-warning"><?= $auth->email ?></span>
         </h4>

         <h4 class="card-description">
          User Phone : &nbsp; &nbsp; <span class="badge badge-warning"><?= $auth->phone ?></span>
         </h4>
         <a href="#pablo" class="btn btn-rose btn-round">Follow</a>
        </div>
       </div>




       <!-- profile update start -->

       <div class="card card-profile mt-5">
        <div class="col-md-4 col-sm-4">
         <h4 class="title text-center">Profile Update</h4>
         <form action="../_actions/admin_profile_update.php" method="POST" enctype="multipart/form-data">
          <div class="fileinput fileinput-new text-center" data-provides="fileinput">
           <div class="fileinput-new thumbnail">
            <img src="../../assets/img/image_placeholder.jpg" alt="...">
           </div>
           <div class="fileinput-preview fileinput-exists thumbnail"></div>
           <div>
            <span class="btn btn-rose btn-round btn-file">
             <span class="fileinput-new">Select image</span>
             <span class="fileinput-exists">Change</span>
             <input type="file" name="profile" />
            </span>
            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i
              class="fa fa-times"></i> Remove</a>
           </div>

           <div class="mb-3">
            <input type="submit" class="btn btn-primary btn-round" value="Profile Update">
           </div>
          </div>
         </form>
        </div>
       </div>
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