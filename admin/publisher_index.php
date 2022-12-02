<?php 
include('layouts/head.php');
include('../vendor/autoload.php');
use Libs\Database\MySQL;
use Libs\Database\PublisherTable;
$table = new PublisherTable(new MySQL());
$publishers = $table->getAllPublisher();
// echo "<pre>";
// print_r($authors);
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
        <div class="card">
         <div class="card-header card-header-success card-header-icon">
          <div class="card-icon">
           <i class="material-icons">person_add_alt</i>
          </div>
          <h4 class="card-title">Publishers Dashboard <span class="btn btn-outline-primary" data-toggle="modal"
            data-target="#exampleModal">+ New Publishers</span></h4>
         </div>
         <div class="card-body">
          <div class="material-datatables">
           <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%"
            style="width:100%">
            <thead>
             <tr>
              <th>ID</th>
              <th>Publisher Name</th>
              <th>Created At</th>
              <th class="disabled-sorting text-right">Actions</th>
             </tr>
            </thead>
            <tbody>
             <tr>
              <?php foreach($publishers as $publisher): ?>
              <td><?= $publisher->id; ?></td>
              <td><?= $publisher->publisher_name; ?></td>
              <!-- strtotime  -->
              <td><?= date('d-m-Y', strtotime($publisher->created_at)); ?></td>
              <td class="text-right">
               <a href="#" class="btn btn-link btn-info btn-just-icon like"><i class="material-icons">favorite</i></a>
               <a href="#" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">dvr</i></a>
               <a href="#" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">close</i></a>
              </td>
             </tr>
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
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
    <div class="modal-content">
     <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Add New Publisher</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
       <span aria-hidden="true">&times;</span>
      </button>
     </div>
     <div class="modal-body">
      <form action="../_actions/publisher_create.php" method="POST">
       <div class="row">
        <div class="col-md-12">
         <div class="form-group">
          <label for="publisher_name" class="bmd-label-floating">Publisher Name</label>
          <input type="text" class="form-control" name="publisher_name" id="publisher_name">
         </div>
        </div>
       </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add New Publishers </button>
       </div>
       <div class="clearfix"></div>
      </form>
     </div>

    </div>
   </div>
  </div>

 </div>
 <?php include('layouts/right_sidebar.php') ?>
 <!--   Core JS Files   -->
 <?php include('layouts/script.php') ?>