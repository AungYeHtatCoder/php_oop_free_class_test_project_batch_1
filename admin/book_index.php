<?php 
include('layouts/head.php');
include('auth.php');
include('../vendor/autoload.php');
use Libs\Database\MySQL;
use Libs\Database\BookTable;

$table = new BookTable(new MySQL());
$books = $table->getAllBook();
// echo "<pre>";
// print_r($books);
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
           <h6 class="card-title">Create New Book <span><a href="book_create_form.php"
              class="btn btn-primary btn-round">+ Add New Book</a></span> <span><a href="borrow_create_form.php"
              class="btn btn-info">Borrow Book</a></span> <span><a href="borrow_index.php" class="btn btn-dark">View
              Borrow Record</a></span></h6>
          </div>
         </div>
         <div class="card-body ">
          <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%"
           style="width:100%">
           <thead>
            <tr>
             <th>ID</th>
             <th>Title</th>
             <th>Category</th>
             <th>Author</th>
             <th>Publisher</th>
             <th>Cover</th>
             <th>Status</th>
             <th>Action</th>
            </tr>
           </thead>
           <tbody>
            <tr>
             <?php foreach ($books as $book) : ?>
             <td><?php echo $book->id; ?></td>
             <td><?php echo $book->title; ?></td>
             <td><?php echo $book->category_name; ?></td>
             <td><?php echo $book->author_name; ?></td>
             <td><?php echo $book->publisher_name; ?></td>
             <td><img src="../_actions/book_cover/<?php echo $book->cover_image; ?>" alt="" width="100"></td>
             <td><?php 
                if($book->book_status == 1) : ?>
              <span class="badge badge-warning">Available</span>
              <?php else : ?>
              <span class="badge badge-danger">Not Available</span>
              <?php endif; ?>
             </td>
             <td>
              <a href="book_edit_form.php?id=<?php echo $book->id; ?>" class="btn btn-success btn-sm">Edit</a>
              <a href="book_detail.php?id=<?php echo $book->id; ?>" class="btn btn-success btn-sm">Detail</a>
              <a href="book_delete.php?id=<?php echo $book->id; ?>" class="btn btn-danger btn-sm">Delete</a>
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

 <script>
 $(document).ready(function() {
  $('#datatables').DataTable({
   "pagingType": "full_numbers",
   "lengthMenu": [
    [10, 25, 50, -1],
    [10, 25, 50, "All"]
   ],
   responsive: true,
   language: {
    search: "_INPUT_",
    searchPlaceholder: "Search records",
   }
  });

  var table = $('#datatable').DataTable();

  // Edit record
  table.on('click', '.edit', function() {
   $tr = $(this).closest('tr');
   var data = table.row($tr).data();
   alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
  });

  // Delete a record
  table.on('click', '.remove', function(e) {
   $tr = $(this).closest('tr');
   table.row($tr).remove().draw();
   e.preventDefault();
  });

  //Like record
  table.on('click', '.like', function() {
   alert('You clicked on Like button');
  });
 });
 </script>