<?php 
include("../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\Auth;
$auth = Auth::check();
$table = new UsersTable(new MySQL());

// profile image upload
$filename = $_FILES['profile_image']['name'];
$error = $_FILES['profile_image']['error'];
$tmp = $_FILES['profile_image']['tmp_name'];
$type = $_FILES['profile_image']['type'];

if($error)
{
    header("Location: ../admin/admin_profile.php?=error");
}
if($type === "image/jpeg" or $type === "image/png")
{
    $table->ProfileUpdate($auth->id, $filename);
    move_uploaded_file($tmp, "profile/$filename");
    $auth->profile_image = $filename;
    if($table)
{
    $table->ProfileUpdate($auth->id, $filename);
    $auth->$filename = $filename;
    //header("Location: ../admin/admin_profile.php?success_phone=update");
    if($auth->value === 1)
    {
        header("Location: ../admin/admin_profile.php?success_name=update");
    }elseif($auth->value === 2)
    {
        header("Location: ../admin/lb_profile.php?success_name=update");
    }elseif($auth->value === 3)
    {
        header("Location: ../admin/tr_profile.php?success_name=update");
    }elseif($auth->value === 4)
    {
        header("Location: ../admin/st_profile.php?success_name=update");
    }elseif($auth->value === 5)
    {
        header("Location: ../admin/user_profile.php?success_name=update");
    }
}else{
    header("Location: ../admin/admin_profile.php?error_phone=update");
}
}else{
    header("Location: ../admin/admin_profile.php?=error");
}