<?php 
session_start();
require_once('connection.php');
$user_info = $_SESSION['username_id'];

function change_profile_image($user_info,$file_temp,$file_extn)
{
//upload file
    $file_path = 'img/profile/'.substr(md5(time()),0,20) . '.' . $file_extn;
  $file_path_resized = 'img/profile/resized'.substr(md5(time()),0,10) . '.' . $file_extn;

    $move_result = move_uploaded_file($file_temp, $file_path_resized);
    
try {

$db = new PDO('mysql:host=localhost;dbname=LOGIN','root','');// USED FOR LOGIN AND SIGNUP
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$query_updatepic = $db->prepare("UPDATE LOGIN SET IMAGE = ? WHERE  USERNAME = ?");
    $query_updatepic->bindParam(1,$file_path_resized);
    $query_updatepic->bindParam(2,$user_info);
    $query_updatepic->execute();

}       
    
    catch (Exception $e) {

        $e->getMessage();
        
    }   
    include_once("img_resize.php");
$target_file = "$file_path_resized";
$resized_file = "$file_path_resized";
$wmax = 300;
$hmax = 300;
img_resize($target_file, $resized_file, $wmax, $hmax, $file_extn);
// ----------- End Universal Image Resizing Function -----------
// Display things to the page so you can see what is happening for testing purposes





}
if(isset($_FILES['profile'])===true)
{
    if(empty($_FILES['profile']['name'])===true)
       
   {

    echo 'Please choose a file';
   }
 
 else{

    //array of extensions of files allowed

    $allowed = array('jpg','jpeg','gif','png');
 
    $file_name = $_FILES['profile']['name'];//indicates file name
  
  //validation for file extensions and allowed file formats starts here.
    $temp = explode('.',$file_name);
    $file_extn = strtolower(end($temp));
     //explode is used to split the string based on the specified charachter (.) into array elements.
//end is used to access the last element reated as an array from explode .


    $file_temp = $_FILES['profile']['tmp_name']; //indicates the temporary location of file

if(in_array($file_extn, $allowed)==true)
{
 //upload file
change_profile_image($user_info,$file_temp,$file_extn);
{ $query_image = $db->prepare("SELECT IMAGE FROM LOGIN WHERE USERNAME=?");

    $query_image->bindParam(1,$user_info);
    $query_image->execute();
    $rows = $query_image->fetch();
    $image = $rows['IMAGE'];


$data= '<div class = "updated_user_image"  style="background-image: url( "'.$image.'"); position: absolute;"></div>';
echo $data;


}
}
else{
    
 
}}}
?>