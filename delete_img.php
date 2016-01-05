<?php
require_once('connection.php');
session_start();
$user_info = $_SESSION['username_id'];
$query_lname = $db->prepare("UPDATE login set IMAGE = '' WHERE  USERNAME = ?");
$query_lname->bindParam(1,$user_info);
$query_lname->execute();

$data= 'div class="default_image updated_user_image"><img src = "../img/default.png" style= "margin-left: 260px; background-size: 200px auto; width: 200px; height: 200px; margin-top: -100px; border: 3px outset black;"  > </div>';

echo $data;
?>