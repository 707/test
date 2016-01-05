<?php 
session_start();

require_once('connection.php');
try
{
$id = $_POST['id'];
$name = $_POST['name'];
$img = 'https://graph.facebook.com/'.$id.'/picture?width=300&height=300';
echo $img;


 $first_name = $_POST['first_name'];
 $last_name = $_POST['last_name'];
 $email = $_POST['email'];
$birthday = $_POST['birthday'];

$dob =  date('Y-m-d', strtotime($birthday));

$_SESSION['username_id'] = $name;

echo $id;
echo $name;
echo json_encode($_POST);

$fb_user = $db->prepare("SELECT * FROM LOGIN WHERE USER_ID= $id");
$fb_user->execute();
echo "hi";
if($fb_user->rowCount() > 0){
    echo "exists";

} else {

 echo "going to work";
ini_set("display_errors", TRUE);

$fb = $db -> prepare("INSERT INTO LOGIN SET USERNAME = '$name',EMAIL = '$email',USER_ID = '$id',FIRSTNAME = '$first_name',LASTNAME = '$last_name',DOB = '$dob',IMAGE = '$img'");

        $fb->execute();


echo "works";



// User is logged in with a long-lived access token.  
// You can redirect them to a members-only page.  



}

}



catch(Exception $e)
{
    $e->getMessage();
}

?>