<?php 
include("../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\Auth;
$auth = Auth::check();
$name = $_POST['name'];
$table = new UsersTable(new MySQL());

if($table)
{
    $table->ChangeName($auth->id, $name);
    $auth->name = $name;
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