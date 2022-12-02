<?php 
include('../vendor/autoload.php');
include('auth.php');

//use Helpers\Auth;
use Libs\Database\MySQL;
use Libs\Database\FriendTable;

//$auth = Auth::check();

$user_id = $auth->id;

$friend_data = new FriendTable(new MySQL());
//$friends = $friend_data->getPendingFriendRequests($user_id);

$friend_lists = $friend_data->getAcceptedFriendRequests($user_id);

echo "<pre>";
print_r($friend_lists);
echo "</pre>";