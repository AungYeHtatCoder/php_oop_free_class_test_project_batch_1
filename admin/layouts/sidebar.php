<div class="sidebar" data-color="rose" data-background-color="black" data-image="assets/img/sidebar-1.jpg">
 <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
 <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-mini">
   CT
  </a>
  <a href="http://www.creative-tim.com" class="simple-text logo-normal">
   Creative Tim
  </a>
 </div>
 <div class="sidebar-wrapper">
  <div class="user">
   <div class="photo">
    <img src="../_actions/profile/<?= $auth->profile ?>" />
   </div>
   <div class="user-info">
    <a data-toggle="collapse" href="#collapseExample" class="username">
     <span>
      <?= $auth->name ?>
      <b class="caret"></b>
     </span>
    </a>
    <div class="collapse" id="collapseExample">
     <ul class="nav">
      <?php if($auth->value === 1) : ?>
      <li class="nav-item">
       <a class="nav-link" href="admin_profile.php">
        <span class="sidebar-mini"> AP </span>
        <span class="sidebar-normal"> Admin Profile </span>
       </a>
      </li>
      <?php endif; ?>
      <?php if($auth->value === 2) : ?>
      <li class="nav-item">
       <a class="nav-link" href="lb_profile.php">
        <span class="sidebar-mini"> LP </span>
        <span class="sidebar-normal"> Librian Profile </span>
       </a>
      </li>
      <?php endif; ?>
      <?php if($auth->value === 3) : ?>
      <li class="nav-item">
       <a class="nav-link" href="tr_profile.php">
        <span class="sidebar-mini"> TP </span>
        <span class="sidebar-normal"> Teacher Profile </span>
       </a>
      </li>
      <?php endif; ?>
      <?php if($auth->value === 4) : ?>
      <li class="nav-item">
       <a class="nav-link" href="st_profile.php">
        <span class="sidebar-mini"> SP </span>
        <span class="sidebar-normal"> Student Profile </span>
       </a>
      </li>
      <?php endif; ?>
      <?php if($auth->value === 5) : ?>
      <li class="nav-item">
       <a class="nav-link" href="user_profile.php">
        <span class="sidebar-mini"> UP </span>
        <span class="sidebar-normal"> User Profile </span>
       </a>
      </li>
      <?php endif; ?>
      <li class="nav-item">
       <a class="nav-link" href="#">
        <span class="sidebar-mini"> EP </span>
        <span class="sidebar-normal"> Edit Profile </span>
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link" href="#">
        <span class="sidebar-mini"> S </span>
        <span class="sidebar-normal"> Settings </span>
       </a>
      </li>
     </ul>
    </div>
   </div>
  </div>
  <ul class="nav">
   <li class="nav-item active ">
    <a class="nav-link" href="../examples/dashboard.html">
     <i class="material-icons">dashboard</i>
     <p> UserManagement </p>
    </a>
   </li>
   <li class="nav-item ">
    <a class="nav-link" data-toggle="collapse" href="#pagesExamples">
     <i class="material-icons">image</i>
     <p> Pages
      <b class="caret"></b>
     </p>
    </a>
    <div class="collapse" id="pagesExamples">
     <ul class="nav">
      <li class="nav-item ">
       <a class="nav-link" href="../examples/pages/pricing.html">
        <span class="sidebar-mini"> P </span>
        <span class="sidebar-normal"> Pricing </span>
       </a>
      </li>
      <li class="nav-item ">
       <a class="nav-link" href="../examples/pages/rtl.html">
        <span class="sidebar-mini"> RS </span>
        <span class="sidebar-normal"> RTL Support </span>
       </a>
      </li>
      <li class="nav-item ">
       <a class="nav-link" href="../examples/pages/timeline.html">
        <span class="sidebar-mini"> T </span>
        <span class="sidebar-normal"> Timeline </span>
       </a>
      </li>
      <li class="nav-item ">
       <a class="nav-link" href="../examples/pages/login.html">
        <span class="sidebar-mini"> LP </span>
        <span class="sidebar-normal"> Login Page </span>
       </a>
      </li>
      <li class="nav-item ">
       <a class="nav-link" href="../examples/pages/register.html">
        <span class="sidebar-mini"> RP </span>
        <span class="sidebar-normal"> Register Page </span>
       </a>
      </li>
      <li class="nav-item ">
       <a class="nav-link" href="../examples/pages/lock.html">
        <span class="sidebar-mini"> LSP </span>
        <span class="sidebar-normal"> Lock Screen Page </span>
       </a>
      </li>
      <li class="nav-item ">
       <a class="nav-link" href="../examples/pages/user.html">
        <span class="sidebar-mini"> UP </span>
        <span class="sidebar-normal"> User Profile </span>
       </a>
      </li>
      <li class="nav-item ">
       <a class="nav-link" href="../examples/pages/error.html">
        <span class="sidebar-mini"> E </span>
        <span class="sidebar-normal"> Error Page </span>
       </a>
      </li>
     </ul>
    </div>
   </li>
   <li class="nav-item ">
    <a class="nav-link" data-toggle="collapse" href="#componentsExamples">
     <i class="material-icons">apps</i>
     <p> LibraryManagement
      <b class="caret"></b>
     </p>
    </a>
    <div class="collapse" id="componentsExamples">
     <ul class="nav">
      <li class="nav-item ">
       <a class="nav-link" data-toggle="collapse" href="#componentsCollapse">
        <span class="sidebar-mini"> MLT </span>
        <span class="sidebar-normal"> Library
         <b class="caret"></b>
        </span>
       </a>
       <div class="collapse" id="componentsCollapse">
        <ul class="nav">
         <li class="nav-item ">
          <a class="nav-link" href="author_index.php">
           <span class="sidebar-mini"> A </span>
           <span class="sidebar-normal"> Author </span>
          </a>
         </li>
        </ul>
       </div>
      </li>
      <li class="nav-item ">
       <a class="nav-link" href="category_index.php">
        <span class="sidebar-mini"> B C </span>
        <span class="sidebar-normal"> Book Category </span>
       </a>
      </li>
      <li class="nav-item ">
       <a class="nav-link" href="publisher_index.php">
        <span class="sidebar-mini"> P </span>
        <span class="sidebar-normal"> Publishers </span>
       </a>
      </li>
      <li class="nav-item ">
       <a class="nav-link" href="book_index.php">
        <span class="sidebar-mini"> B </span>
        <span class="sidebar-normal"> Book </span>
       </a>
      </li>
      <li class="nav-item ">
       <a class="nav-link" href="borrow_index.php">
        <span class="sidebar-mini"> B I </span>
        <span class="sidebar-normal"> Book Issue </span>
       </a>
      </li>
      <li class="nav-item ">
       <a class="nav-link" href="../examples/components/notifications.html">
        <span class="sidebar-mini"> N </span>
        <span class="sidebar-normal"> Notifications </span>
       </a>
      </li>
      <li class="nav-item ">
       <a class="nav-link" href="../examples/components/icons.html">
        <span class="sidebar-mini"> I </span>
        <span class="sidebar-normal"> Icons </span>
       </a>
      </li>
      <li class="nav-item ">
       <a class="nav-link" href="../examples/components/typography.html">
        <span class="sidebar-mini"> T </span>
        <span class="sidebar-normal"> Typography </span>
       </a>
      </li>
     </ul>
    </div>
   </li>
   <li class="nav-item ">
    <a class="nav-link" data-toggle="collapse" href="#formsExamples">
     <i class="material-icons">content_paste</i>
     <p> Forms
      <b class="caret"></b>
     </p>
    </a>
    <div class="collapse" id="formsExamples">
     <ul class="nav">
      <li class="nav-item ">
       <a class="nav-link" href="../examples/forms/regular.html">
        <span class="sidebar-mini"> RF </span>
        <span class="sidebar-normal"> Regular Forms </span>
       </a>
      </li>
      <li class="nav-item ">
       <a class="nav-link" href="../examples/forms/extended.html">
        <span class="sidebar-mini"> EF </span>
        <span class="sidebar-normal"> Extended Forms </span>
       </a>
      </li>
      <li class="nav-item ">
       <a class="nav-link" href="../examples/forms/validation.html">
        <span class="sidebar-mini"> VF </span>
        <span class="sidebar-normal"> Validation Forms </span>
       </a>
      </li>
      <li class="nav-item ">
       <a class="nav-link" href="../examples/forms/wizard.html">
        <span class="sidebar-mini"> W </span>
        <span class="sidebar-normal"> Wizard </span>
       </a>
      </li>
     </ul>
    </div>
   </li>
   <li class="nav-item ">
    <a class="nav-link" data-toggle="collapse" href="#tablesExamples">
     <i class="material-icons">grid_on</i>
     <p> Tables
      <b class="caret"></b>
     </p>
    </a>
    <div class="collapse" id="tablesExamples">
     <ul class="nav">
      <li class="nav-item ">
       <a class="nav-link" href="../examples/tables/regular.html">
        <span class="sidebar-mini"> RT </span>
        <span class="sidebar-normal"> Regular Tables </span>
       </a>
      </li>
      <li class="nav-item ">
       <a class="nav-link" href="../examples/tables/extended.html">
        <span class="sidebar-mini"> ET </span>
        <span class="sidebar-normal"> Extended Tables </span>
       </a>
      </li>
      <li class="nav-item ">
       <a class="nav-link" href="../examples/tables/datatables.net.html">
        <span class="sidebar-mini"> DT </span>
        <span class="sidebar-normal"> DataTables.net </span>
       </a>
      </li>
     </ul>
    </div>
   </li>
   <li class="nav-item ">
    <a class="nav-link" data-toggle="collapse" href="#mapsExamples">
     <i class="material-icons">place</i>
     <p> Maps
      <b class="caret"></b>
     </p>
    </a>
    <div class="collapse" id="mapsExamples">
     <ul class="nav">
      <li class="nav-item ">
       <a class="nav-link" href="../examples/maps/google.html">
        <span class="sidebar-mini"> GM </span>
        <span class="sidebar-normal"> Google Maps </span>
       </a>
      </li>
      <li class="nav-item ">
       <a class="nav-link" href="../examples/maps/fullscreen.html">
        <span class="sidebar-mini"> FSM </span>
        <span class="sidebar-normal"> Full Screen Map </span>
       </a>
      </li>
      <li class="nav-item ">
       <a class="nav-link" href="../examples/maps/vector.html">
        <span class="sidebar-mini"> VM </span>
        <span class="sidebar-normal"> Vector Map </span>
       </a>
      </li>
     </ul>
    </div>
   </li>
   <li class="nav-item ">
    <a class="nav-link" href="../examples/widgets.html">
     <i class="material-icons">widgets</i>
     <p> Widgets </p>
    </a>
   </li>
   <li class="nav-item ">
    <a class="nav-link" href="../examples/charts.html">
     <i class="material-icons">timeline</i>
     <p> Charts </p>
    </a>
   </li>
   <li class="nav-item ">
    <a class="nav-link" href="../examples/calendar.html">
     <i class="material-icons">date_range</i>
     <p> Calendar </p>
    </a>
   </li>
  </ul>
 </div>
</div>