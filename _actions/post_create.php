<?php 
include('../vendor/autoload.php');
use Helpers\Auth;

use Libs\Database\MySQL;
use Libs\Database\PostTable;
$auth = Auth::check();

// profile image upload
$filename = $_FILES['file_name']['name'];
$error = $_FILES['file_name']['error'];
$tmp = $_FILES['file_name']['tmp_name'];
$type = $_FILES['file_name']['type'];
$data = [
    'title' => $_POST['title'],
    'post_text' => $_POST['post_text'],
    'file_name' => $filename,
    'post_status' => $_POST['post_status'],
    'user_id' => $auth->id,
    
];
// echo "<pre>";
// print_r($data);
// echo "</pre>";
// die();

if($error)
{
    header("Location: ../admin/admin_profile.php?=error");
}
if($type === "image/jpeg" or $type === "image/png")
{
    $table = new PostTable(new MySQL());
    $table->InsertPost($data);
    move_uploaded_file($tmp, "post_img/$filename");
    if($table)
    {
        
        //header("Location: ../admin/admin_profile.php?success=update");
        if($auth->value === 1)
        {
            header("Location: ../admin/admin_profile.php?success=update");
        }
        else if($auth->value === 2)
        {
            header("Location: ../admin/lb_profile.php?success=update");
        }
        else if($auth->value === 3)
        {
            header("Location: ../admin/tr_profile.php?success=update");
        }
        elseif($auth->value === 4)
        {
            header("Location: ../admin/st_profile.php?success=update");
        }
        elseif($auth->value === 5)
        {
            header("Location: ../admin/st_profile.php?success=update");
        }
        else
        {
            header("Location: ../admin/admin_profile.php?success=update");
        }
    }else{
        header("Location: ../admin/admin_profile.php?error=update");
    }
}else{
    header("Location: ../admin/admin_profile.php?=error");
}