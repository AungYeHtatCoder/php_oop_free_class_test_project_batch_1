<?php include('includes/head.php') ?>

<body class="off-canvas-sidebar">
 <!-- Navbar -->
 <?php include('includes/navbar.php') ?>
 <!-- End Navbar -->
 <div class="wrapper wrapper-full-page">
  <div class="page-header lock-page header-filter" style="background-image: url('assets/img/lock.jpg')">
   <!--   you can change the color of the filter page using: data-color="blue | green | orange | red | purple" -->

   <div class="container">
    <div class="row">


     <div class="col-md-4 ml-auto mr-auto">
      <div class="card card-profile text-center card-hidden">
       <div class="card-header ">
        <div class="card-avatar">
         <a href="#pablo">
          <img class="img" src="assets/img/faces/avatar.jpg">
         </a>
        </div>
       </div>
       <div class="card-body ">
        <h4 class="card-title">Login Page</h4>
        <form action="_actions/login.php" method="POST">
         <div class="form-group">
          <label for="email" class="bmd-label-floating">Email</label>
          <input type="text" name="email" class="form-control" id="email">
         </div>

         <div class="form-group">
          <label for="password" class="bmd-label-floating">Enter Password</label>
          <input type="password" name="password" class="form-control" id="password">
         </div>

       </div>
       <div class="card-footer justify-content-center">
        <input type="submit" class="btn btn-rose btn-round" value="Login">
       </div>
       </form>
      </div>
      <?php if(isset($_GET['msg']) && $_GET['msg'] == true){ ?>
      <div class="alert alert-success">
       <strong>Success!</strong> You are registered successfully.
      </div>
      <?php } else if(isset($_GET['error']) && $_GET['error'] == true){ ?>
      <div class="alert alert-danger">
       <strong>Error!</strong> You are not registered successfully.
      </div>
      <?php } ?>
     </div>
    </div>
   </div>
   <?php include('includes/footer.php') ?>
  </div>
 </div>
 <!--   Core JS Files   -->
 <?php include('includes/script.php') ?>