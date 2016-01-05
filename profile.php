<?php 
session_start();
require_once('connection.php');
if(isset($_GET['user_name']))
{
$user_info = $_GET['user_name'];;
}
else
{
    header('Location:home.php');
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

<script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
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

<link rel="stylesheet" type="text/css" href="css/prof.css">
<link rel="stylesheet" type="text/css" href="css/demo.css">
<link rel="stylesheet" type="text/css" href="css/poopup.css">
<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/popup.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
<script src="jAlert-master/src/jAlert-v3.js"></script>
<script src="jAlert-master/src/jAlert-functions.js"> //optional!!</script>





  
    <!--[if lte IE 8]>
        <link rel="stylesheet" href="css/layouts/side-menu-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="css/side-menu.css">
    <!--<![endif]-->
  


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
<div id="author-name">
<h2>
<?php echo ucfirst($firstname)." ".ucfirst($lname);?></h2>
</div>
<div class ="profile_pic " >

 <div class ="edit_image">

</div>

<div class = "default_image updated_user_image"  style="background-image: url('../img/default.png'); position: absolute;"></div>
</div>
</div>
</div>
<a class="codrops-icon " href="../home.php"><i class="fa fa-arrow-left"></i>
<span>Go Back</span></a>

<?php }
else

{?> 
<div>
    </div>
<div class = "author-header">

<div id="author-name">
<h2>
<?php echo ucfirst($firstname)." ".ucfirst($lname);?></h2>
</div>
<div class ="profile_pic " >

<div class ="edit_image">


</div>

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
<h3 class = "about">About</h3>
</div>

<p>Username :
<?php echo ucfirst($user_name) ?></p>

<p>Email : <?php echo "$user_email"?></p>

<p>D.O.B : <?php echo date('F jS Y', strtotime($user_dob)); ?></p>


</div>

  </div>





</form>




</div>









</body>
</html>