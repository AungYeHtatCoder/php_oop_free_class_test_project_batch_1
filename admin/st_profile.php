<?php 
include('../vendor/autoload.php');
include('auth.php');
use Libs\Database\MySQL;
use Libs\Database\PostTable;
use Libs\Database\UsersTable;
use Libs\Database\FriendTable;
// use Helpers\Auth;
// $auth = Auth::check();
//  echo "<pre>";
//   print_r($auth);
//   echo "</pre>";
$user_id = $auth->id;
$table = new PostTable(new MySQL());
$posts = $table->getAllPostNoParam();
// echo "<pre>";
// print_r($posts);
// echo "</pre>";
$user_data = new UsersTable(new MySQL());
$users = $user_data->getAllUsers();

$friend_data = new FriendTable(new MySQL());
$friends = $friend_data->getPendingFriendRequests($user_id);

$friend_lists = $friend_data->getAcceptedFriendRequests($user_id);

// echo "<pre>";
// print_r($friend_lists);
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
     <div class="row">
      <div class="col-md-8">
       <div class="card">
        <div class="card-header card-header-success card-header-icon">
         <div class="card-icon">
          <i class="material-icons">post_add</i>
         </div>
         <h4 class="card-title">Manage Post <span class="btn btn-primary" data-toggle="modal"
           data-target="#exampleModal">Create Post</span></h4>
        </div>
       </div>
       <!-- add form -->
       <div class="col-md-4 mt-5">
        <div class="card card-product">
         <?php foreach($posts as $post) : ?>
         <?php if($post->post_status === 1) : ?>
         <?php if($post->value === 1) : ?>
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
           <a href="#pablo"><?= $post->title; ?></a>
          </h4>
          <div class="card-description">
           <?= $post->post_text; ?>
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
         <?php endif; ?>
         <?php endif; ?>
         <?php endforeach; ?>
        </div>
       </div>
      </div>



      <div class="col-md-4">


       <div class="card card-profile">
        <div class="card-avatar">
         <a href="#pablo">
          <img class="img" src="../_actions/profile/<?= $auth->profile?>" />
         </a>
        </div>
        <div class="card-body">
         <h4 class="card-category text-gray text-left"> &nbsp;User Name : <span class="badge badge-info">
           <?= $auth->name ?></span> </h4>
         <h4 class="card-title text-left"> &nbsp; &nbsp; User Role : <span
           class="badge badge-success"><?= $auth->role ?></span></h4>
         <h4 class="card-description text-left">
          &nbsp; User Email : <span class="badge badge-primary text-sm"> <?= $auth->email ?></span>
         </h4>

         <h4 class="card-description text-left">
          &nbsp; User Phone : <span class="badge badge-primary text-sm"> <?= $auth->phone ?></span>
         </h4>
         <!-- <a href="#pablo" class="btn btn-rose btn-round">Follow</a> -->
        </div>

       </div>

       <div class="card card-profile">
        <div class="card-header">
         <h6> <i class="material-icons text-left">favorite</i> &nbsp; &nbsp; <span>Bio</span></h6>
        </div>
        <div class="card-body">
         <p class="card-description text-left">
          <?= $auth->bio ?>
         </p>
         <form action="../_actions/create_bio.php" method="post">
          <div class="form-group">
           <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="bio"></textarea>
          </div>
          <input type="submit" class="btn btn-rose pull-right" value="Update Bio">
         </form>
        </div>
       </div>

       <!-- accept friend request start -->
       <div class="card">
        <div class="card-header card-header-icon card-header-info">
         <div class="card-icon">
          <i class="material-icons">group_add</i>
         </div>
         <h4 class="card-title">
          <small class="category">Find Your New Friends</small>
         </h4>
        </div>
        <div class="card-body">
         <form action="../_actions/add_new_friend.php" method="POST">
          <div class="row">

           <div class="col-md-3">
            <div class="form-group">
             <select name="friend_id" class="selectpicker" data-size="7" data-style="btn btn-primary"
              title="Single Select">
              <option disabled selected>Find New Friend</option>
              <?php foreach($users as $user) : ?>
              <?php if($user->id !== $auth->id) : ?>
              <option value="<?= $user->id; ?>"><?= $user->name; ?></option>
              <?php endif; ?>
              <?php endforeach; ?>
             </select>
            </div>
           </div>

          </div>
          <input type="submit" class="btn btn-rose pull-right" value="Add New Friend">
          <div class="clearfix"></div>
         </form>
        </div>

       </div>

       <!-- accept friend request end -->

       <!-- add friend start -->

       <div class="card">
        <div class="card-header card-header-icon card-header-warning">
         <div class="card-icon">
          <i class="material-icons">group_add</i>
         </div>
         <h4 class="card-title">
          <small class="category">Pending New Friends</small>
         </h4>
        </div>
        <div class="card-body">
         <!-- <form action="../_actions/add_new_friend.php" method="POST"> -->
         <div class="row">

          <div class="col-md-3">
           <table class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%"
            style="width:100%">
            <thead>
             <tr>
              <th>Name</th>
              <th>Profile</th>
              <th>Accept</th>
             </tr>
            </thead>
            <tbody>
             <tr>
              <?php foreach($friends as $friend) : ?>
              <?php if($friend->id !== $auth->id) : ?>
              <td><?= $friend->name; ?></td>
              <td><img src="../_actions/profile/<?= $friend->profile; ?>" alt="" width="50px" height="50px"></td>
              <td>
               <form action="../_actions/accept_new_friend.php" method="POST">
                <input type="hidden" name="user_id" value="<?= $friend->user_id; ?>">
                <input type="hidden" name="friend_id" value="<?= $friend->friend_id; ?>">
                <input type="submit" class="btn btn-warning btn-sm pull-right" value="Accept">
               </form>
              </td>
              <?php endif; ?>
              <?php endforeach; ?>
             </tr>
            </tbody>
           </table>
          </div>

         </div>
         <!-- <input type="submit" class="btn btn-rose pull-right" value="Add New Friend"> -->
         <div class="clear-fix"></div>
         <!-- </form> -->
        </div>
       </div>
       <!-- add friend end -->
       <!-- Friend list start -->
       <div class="card">
        <div class="card-header card-header-icon card-header-success">
         <div class="card-icon">
          <i class="material-icons">group_add</i>
         </div>
         <h4 class="card-title">
          <small class="category">Friend Lists</small>
         </h4>
        </div>
        <div class="card-body">
         <div class="row">
          <div class="col-md-3">
           <table class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%"
            style="width:100%">
            <thead>
             <tr>
              <th>Name</th>
              <th>Profile</th>
             </tr>
            </thead>
            <tbody>
             <tr>
              <?php foreach($friend_lists as $list) : ?>
              <td><?= $list->name; ?></td>
              <td><img src="../_actions/profile/<?= $list->profile; ?>" alt="" width="50px" height="50px"></td>
             </tr>
             <?php endforeach; ?>
            </tbody>
           </table>
          </div>

         </div>
         <!-- <input type="submit" class="btn btn-rose pull-right" value="Add New Friend"> -->
         <div class="clear-fix"></div>

        </div>

       </div>
       <!-- Friend list end -->
       <!-- profile update start -->
       <div class="card card-profile mt-5">

        <h4 class="title text-center">Profile Update</h4>
        <form action="../_actions/admin_profile_update.php" method="POST" enctype="multipart/form-data">
         <div class="fileinput fileinput-new text-center" data-provides="fileinput">
          <div class="fileinput-new thumbnail img-circle">
           <img src="../../assets/img/placeholder.jpg" alt="...">
          </div>
          <div class="fileinput-preview fileinput-exists thumbnail"></div>

          <div class="mb-3">
           <div>
            <span class="btn btn-rose btn-round btn-file">
             <span class="fileinput-new">Select image</span>
             <span class="fileinput-exists">Change</span>
             <input type="file" name="profile_image" />
            </span>
            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i
              class="fa fa-times"></i> Remove</a>
           </div>
           <input type="submit" class="btn btn-primary btn-round float-left" value="Update Profile">
          </div>
         </div>
        </form>
       </div>



       <!-- profile update end -->
       <div class="clear-fix"></div>
       <!-- name change and pw , add phone start -->
       <div class="card">
        <div class="card-header card-header-icon card-header-rose">
         <div class="card-icon">
          <i class="material-icons">perm_identity</i>
         </div>
         <h4 class="card-title">Edit Profile -
          <small class="category">Name Change</small>
         </h4>
        </div>
        <div class="card-body">
         <form action="../_actions/change_name.php" method="POST">
          <div class="row">

           <div class="col-md-3">
            <div class="form-group">
             <label class="bmd-label-floating">Username</label>
             <input type="text" class="form-control" name="name" value="<?= $auth->name ?>">
            </div>
           </div>
           <!-- <div class="col-md-4">
            <div class="form-group">
             <label class="bmd-label-floating">Email address</label>
             <input type="email" class="form-control">
            </div>
           </div> -->
          </div>
          <input type="submit" class="btn btn-rose pull-right" value="Change Name">
          <div class="clearfix"></div>
         </form>
        </div>

       </div>
       <!-- add phone start -->
       <div class="card">
        <div class="card-header card-header-icon card-header-rose">
         <div class="card-icon">
          <i class="material-icons">perm_identity</i>
         </div>
         <h4 class="card-title">Edit Profile -
          <small class="category">Password Change</small>
         </h4>
        </div>
        <div class="card-body">
         <form action="../_actions/pw_change.php" method="POST">
          <div class="row">

           <div class="col-md-3">
            <div class="form-group">
             <label class="bmd-label-floating">Password</label>
             <input type="text" class="form-control" name="password">
            </div>
           </div>
           <!-- <div class="col-md-4">
            <div class="form-group">
             <label class="bmd-label-floating">Email address</label>
             <input type="email" class="form-control">
            </div>
           </div> -->
          </div>
          <input type="submit" class="btn btn-rose pull-right" value="Change Password">
          <div class="clearfix"></div>
         </form>
        </div>

       </div>
       <!-- add phone end -->

       <div class="card">
        <div class="card-header card-header-icon card-header-rose">
         <div class="card-icon">
          <i class="material-icons">perm_identity</i>
         </div>
         <h4 class="card-title">Edit Profile -
          <small class="category">Add Phone</small>
         </h4>
        </div>
        <div class="card-body">
         <form action="../_actions/phone_create.php" method="POST">
          <div class="row">

           <div class="col-md-3">
            <div class="form-group">
             <label class="bmd-label-floating">Phone</label>
             <input type="text" class="form-control" name="phone">
            </div>
           </div>
           <!-- <div class="col-md-4">
            <div class="form-group">
             <label class="bmd-label-floating">Email address</label>
             <input type="email" class="form-control">
            </div>
           </div> -->
          </div>
          <input type="submit" class="btn btn-rose pull-right" value="+ Add Pnone No">
          <div class="clearfix"></div>
         </form>
        </div>

       </div>
       <!-- pw end -->
      </div>
     </div>

     <!-- post modal start  -->

     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
       <div class="modal-content">
        <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">+ Add New Post</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
         </button>
        </div>
        <div class="modal-body">
         <div class="card ">
          <div class="card-header card-header-rose card-header-icon">
           <div class="card-icon">
            <i class="material-icons">post_add</i>
           </div>
           <h4 class="card-title">New Post Create</h4>
          </div>
          <div class="card-body ">
           <form method="post" action="../_actions/post_create.php" enctype="multipart/form-data">
            <div class="form-group">
             <label for="post_title" class="bmd-label-floating">Post Title</label>
             <input type="test" class="form-control" id="post_title" name="title">
            </div>
            <div class="form-group">
             <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="post_text"
              placeholder="Enter Your Post Description"></textarea>
            </div>
            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
             <div class="fileinput-new thumbnail">
              <img src="../../assets/img/image_placeholder.jpg" alt="...">
             </div>
             <div class="fileinput-preview fileinput-exists thumbnail"></div>
             <div>
              <span class="btn btn-rose btn-round btn-file">
               <span class="fileinput-new">Select image</span>
               <span class="fileinput-exists">Change</span>
               <input type="file" name="file_name" />
              </span>
              <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i
                class="fa fa-times"></i> Remove</a>
             </div>

            </div>
            <!-- post status -->
            <div class="form-group">
             <select name="post_status" class="selectpicker" data-size="7" data-style="btn btn-primary btn-round"
              title="Single Select">
              <option disabled selected>Post Status</option>
              <option value="1">Public</option>
              <option value="0">Only Me</option>
             </select>
             <div class="mb-3">
              <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <input type="submit" class="btn btn-primary" value="Create New Post">
              </div>
             </div>
           </form>
          </div>
          <!-- <div class="card-footer ">
           <button type="submit" class="btn btn-fill btn-rose">Submit</button>
          </div> -->
         </div>
        </div>

       </div>
      </div>
     </div>
     <!-- post modal end -->
    </div>
   </div>
   <?php include('layouts/footer.php') ?>
  </div>
 </div>
 <?php include('layouts/right_sidebar.php') ?>
 <!--   Core JS Files   -->
 <?php include('layouts/script.php') ?>