<?php 
session_start();
require_once('connection.php');
if(isset($_SESSION['username_id']))
{
$user_info = $_SESSION['username_id'];
}
else
{
  header("Location:index.php");
  die();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">



<link rel="stylesheet" href="//cdn.jsdelivr.net/pure/0.6.0/pure-min.css">

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet"><!--for addin fonticons -->

<script src = "//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
<script src = "//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src='js/jquery.drag-n-crop.js'></script>
<link rel="stylesheet" href="css/jquery.drag-n-crop.css">


  <!--for ie standards-->
    <!--[if lte IE 8]>
        <link rel="stylesheet" href="css/layouts/post-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->        <link rel="stylesheet" href="css/post.css">
    <!--<![endif]-->
  

<!--popup-->

<link rel="stylesheet" href="jAlert-master/src/jAlert-v3.css" />

<link rel="stylesheet" type="text/css" href="css/prof.css"><link rel="stylesheet" type="text/css" href="css/demo.css">


<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/popup.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
<script src="jAlert-master/src/jAlert-v3.js"></script>
<script src="jAlert-master/src/jAlert-functions.js"> //optional!!</script>




    <title></title>
</head>
<body>




        

            







    
<?php 
$user_query = $db->prepare("SELECT * FROM LOGIN WHERE USERNAME = ?");
$user_query->bindParam(1,$user_info);
$user_query->execute();
$row = $user_query->fetch();
$user_name = $row['USERNAME'];
$firstname = $row['FIRSTNAME'];
$lname = $row['LASTNAME'];
$about =$row['USER_ABOUT'];
$user_email = $row['EMAIL'];
$user_dob = $row['DOB'];
$image = $row['IMAGE'];
$post_count = $row['POSTS_COUNT'];//storing the image in db is comparatively slower , so we use the column to access location 
                        //of the profile pic
?>


<?php


if(empty($image)===true)
{ ?>
<div class="author-header">
<a class="codrops-icon " href="../home.php"><i class="fa fa-arrow-left"></i>
<span>Go Back</span></a>
<div id="author-name">
<h2>
<?php echo ucfirst($firstname)." ".ucfirst($lname);?></h2>
</div>
<div class ="profile_pic " >

 <div class ="edit_image">

<p id="icon"><i class ="fa fa-camera-retro fa-lg"></i></p>
</div>
<a  class="update_yourpic"  id="update_default">Update picture</p>
</a>
<div class = "default_image updated_user_image"  style="background-image: url('../img/default.png'); position: absolute;"></div>
</div>
</div>
</div>


<?php }
else

{?> 
<div>
    <a class="button-x large button-error pure-button" id = "delete_img">Delete Image</a>
    </div>
<div class = "author-header">
<a class="codrops-icon " href="../home.php"><i class="fa fa-arrow-left"></i>
<span>Go Back</span></a>
<div id="author-name">
<h2>
<?php echo ucfirst($firstname)." ".ucfirst($lname);?></h2>
</div>
<div class ="profile_pic " >

<div class ="edit_image">


</div>
<a  class="update_yourpic"  id="update_picture">Update picture</p>
</a>
<div class = "default_image updated_user_image"  style="background-image: url('<?php echo $image;?>'); position: absolute;"></div>
</div>

<?php
}?>
  

</div>
<div id = "post-count">

<p id="header-posts">POSTS</p>
<p id ="num"><?php echo $post_count ?></p>

</div>



    <div class ="profile_details ">
<div class = "panel-heading">
<p class = "edit" id="edit"><i class ="fa fa-pencil fa-lg"></i></p>
<p class = "edit" id= "close"><i class = "fa fa-times fa-lg"></i></p>
<h3 class = "about">About</h3>
</div>

<p>Username :
<?php echo ucfirst($user_name) ?></p>

<span id = "email_upd" contenteditable = "false">Email : <?php echo "$user_email"?></span><form class = "pure-form" id = "form_email">Email : <input type ="text"  name = "email" id="email"  placeholder="Email" value = "<?php echo "$user_email"?>"></form><input type="submit" class="pure-button save-changes" id="update_email" value ="Save Changes" >
</br></br>

<span id = "dob_upd" contenteditable = "false">Born on : <?php echo date('F jS Y', strtotime($user_dob)); ?></span><form class = "pure-form" id = "form_dob">Born on : <input type ="date"  name = "dob" id="dob"  placeholder="DOB" value = "<?php echo "$user_dob"?>"></form><input type="submit" class="pure-button save-changes" id="update_dob" value ="Save Changes" >


</div>

  </div>





<script>

 $("#delete_img").on('click',function(e){
        
  e.preventDefault();
  var del = $.ajax({
    url: 'delete_img.php',
     
     type: 'post',
     
     async:true,
     cache:false,
     
     });
   del.done(function(data){

    console.log('done');
    $('#update_picture').css("margin-top","260px");
    
    
    if (window.matchMedia('(max-width: 768px)').matches)
{
    // do functionality on screens smaller than 768px
  $('.updated_user_image').replaceWith(data);
    }
  
  
  
   else{
      
     $('.updated_user_image').replaceWith('<div class = "default_image updated_user_image"  ><img src = "../img/default.png"  style = "position : absolute;"</div>')
   }
    successAlert('Success!', 'The image has been deleted successfully .'); 
    $('#delete_img').hide();            
        
 
   });
  });

 $(".updated_user_image").click(function(){
        

   $('#delete_img').show();
     
    
     
});
  

  $("#update_email").click(function(){
        
   var email = $("#email").val();
  $.ajax({ url: 'changes.php',
     data: {'email' : email , 'update' : 'email'},
     type: 'post',
 
     cache:false,
     success: function(data) {
                  
                  $('#email_upd').replaceWith('<span id = "email_upd">Email : '+data+'</span>');
                  $('#email,#form_email').hide();
                  $('#email_upd').show();
                  $('#update_email').hide();
                  
              }
     
});});




$("#update_dob").click(function(){
        
   var dob = $("#dob").val();
  $.ajax({ url: 'changes.php',
     data: {'update' : 'dob','dob' : dob},
     type: 'post',
 
     cache:false,
     success: function(data) {
            $('#dob_upd').replaceWith('<span id = "dob_upd">Born on : '+data+'</span>');
                  $('#dob,#form_dob').hide();
                  $('#dob_upd').show();
                  $('#update_dob').hide();
                  
              }
     
});});

</script>
<?php 

function change_profile_image($user_info,$file_temp,$file_extn)
{
//upload file
    $file_path = 'img/profile/'.substr(md5(time()),0,20) . '.' . $file_extn;
  $file_path_resized = 'img/profile/resized'.substr(md5(time()),0,10) . '.' . $file_extn;

    $move_result = move_uploaded_file($file_temp, $file_path_resized);
    
try {


define('DB_HOST', getenv('OPENSHIFT_MYSQL_DB_HOST')); //ENSURES THE DB CONNECTION//
define('DB_PORT',getenv('OPENSHIFT_MYSQL_DB_PORT')); 
define('DB_USER',getenv('OPENSHIFT_MYSQL_DB_USERNAME'));
define('DB_PASS',getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));
define('DB_NAME',getenv('OPENSHIFT_GEAR_NAME'));

$dsn = 'mysql:dbname='.DB_NAME.';host='.DB_HOST.';port='.DB_PORT;
$db = new PDO($dsn, DB_USER, DB_PASS);
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
{?>
    <script> successAlert('Success!', 'The image has been uploaded successfully . Please refresh to view changes.'); </script>

<?php
}
}
else{
    ?>
    <script> errorAlert('Oops!', 'The file format is not supported . Please upload image in either jpg , jpeg or png format with a maximum resolution of 800x800 .'); </script>
<?php
}}}?>
   <script type="text/javascript">


$('#edit').click(function(event) {
 
  $('#email_upd').attr("contenteditable","true"); 
  $('#email_upd,#dob_upd').hide();
 $('#email,#dob').show();
 $('#form_email,#form_dob').show();
  $('.save-changes').show();/* Act on the event */
  $('#edit').hide();
$('#close').show();
});

$('#close').click(function(event) {
  /* Act on the event */
    $('#email_upd').attr("contenteditable","true"); 
  $('#email_upd,#dob_upd').show();
 $('#email,#dob').hide();
 $('#form_email,#form_dob').hide();
  $('.save-changes').hide();/* Act on the event */
  $('#edit').hide();
$('#close').hide();
$('#edit').show();


});


$(function(){
  
/* Attach login handler */
$('#update_picture,#update_default').on('click', function(e){
    
    e.preventDefault();
    
    /* Popup an alert with the form */
    $.jAlert({
    'title': 'Update Profile Picture',
      'content': '<form method = "post" class="pure-form" enctype="multipart/form-data">'+'<p> Please select a file in common image formats like jpg or png with a maximum resolution of 800x800. </p>'+'<input type="file" name = "profile"><input type ="submit" id="propic_submit" class = "pure-button save-changes" value="Submit">',
    'autofocus': 'textarea',
    'theme': 'blue',
    'size' : 'lg',
  });
});
  
 

});



 

   </script>
</body>
</html>