<?php include('includes/head.php') ?>

<body class="off-canvas-sidebar">
 <!-- Navbar -->
 <?php include('includes/navbar.php') ?>
 <!-- End Navbar -->
 <div class="wrapper wrapper-full-page">
  <div class="page-header lock-page header-filter" style="background-image: url('../../assets/img/lock.jpg')">
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
        <h4 class="card-title">Librian Registeration page</h4>
        <form action="_actions/lb_create.php" method="POST">
         <div class="form-group">
          <label for="exampleInput1" class="bmd-label-floating">User Name</label>
          <input type="text" class="form-control" id="exampleInput1" name="name">
         </div>
         <div class="form-group">
          <label for="exampleInput1" class="bmd-label-floating">Enter Email</label>
          <input type="text" name="email" class="form-control" id="exampleInput1" required>
         </div>
         <div class="form-group">
          <label for="exampleInput1" class="bmd-label-floating">Enter Password</label>
          <input type="password" class="form-control" id="exampleInput1" name="password">
         </div>
         <div class="card-footer justify-content-center">
          <input type="submit" class="btn btn-rose btn-round" value="Create New Account">
         </div>
        </form>
       </div>
      </div>
     </div>
    </div>
   </div>
   <?php include('includes/footer.php') ?>
  </div>
 </div>
 <!--   Core JS Files   -->
 <?php include('includes/script.php') ?>