<?php 
session_start();
require_once('connection.php');

if(isset($_SESSION['username_id']))
{
$user_info = $_SESSION['username_id'];
$check = $db->prepare("SELECT * FROM LOGIN WHERE USERNAME = ?");
$check->bindParam(1,$user_info);
$check->execute();
$temp = $check->fetch();
$logged_in = $temp['FIRSTNAME'];
$image = $temp['IMAGE'];
}
else
{
  header("Location:index.php");
  exit();
}
?>
  <!DOCTYPE html>
<!-- saved from url=(0033)userprofile.php# -->
<html lang="en" style = "overflow-x : hidden;"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">






<link rel="stylesheet" href="//cdn.jsdelivr.net/pure/0.6.0/pure-min.css">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet"><!--for addin fonticons -->





  <!--for ie standards-->
    <!--[if lte IE 8]>
        <link rel="stylesheet" href="css/layouts/post-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->        <link rel="stylesheet" href="css/post.css">
    <!--<![endif]-->
  

<!--popup-->


<link rel="stylesheet" type="text/css" href="css/poopup.css">
<script src="js/jquery-2.1.4.min.js"></script>

<script src="js/classie.js"></script>

<script src= "js/loadmore.js"></script>
    <link rel="stylesheet" type="text/css" href="css/loading.css" />

  
    <!--[if lte IE 8]>
        <link rel="stylesheet" href="css/layouts/side-menu-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="css/side-menu.css">
    <!--<![endif]-->
  


    

    

</head>
<body cz-shortcut-listen="true">





<div id = "fullpage">
<div id="layout">
    <!-- Menu toggle -->
    <a href="#menu" id="menuLink" class="menu-link">
        <!-- Hamburger icon -->
        <span></span>
    </a>

    <div id="menu">
          

        <div class="nav-inner">
            <button class="primary-button pure-button">On The Go</button>

        <div class="pure-menu">
        

            <ul class="pure-menu-list">
                <li class="pure-menu-heading">Categories:</li>
                     <span class="all_icon"><i class="fa fa-globe fa-lg"></i></span> 
                    <li class="pure-menu-item"><a href = "home.php" id="all" class="pure-menu-link">All</a></li>
                    <span class="tech_icon"><i class="fa fa-rocket fa-lg"></i></span> 
                    <li class="pure-menu-item"><a class="pure-menu-link" id="tech" data-anim="la-anim-1">Technology</a></li>
 
   <span class="design_icon"><i class="fa fa-cubes fa-lg"></i></span> 
                    <li class="pure-menu-item"><a  id = "design"class="pure-menu-link" data-anim="la-anim-1">Design</a></li>
                  
                    <span class="ent_icon"><i class="fa fa-music fa-lg"></i></span> 
                    <li class="pure-menu-item"><a id="ent" class="pure-menu-link" data-anim="la-anim-1">Entertainment</a></li>
                    
                    <span class="travel_icon"><i class="fa fa-automobile fa-lg "></i></span> 
                    <li class="pure-menu-item"><a id="travel" class="pure-menu-link"data-anim="la-anim-1">Travel</a></li>
                    
                    <span class="fashion_icon"><i class="fa fa-star fa-lg "></i></span> 
                    <li class="pure-menu-item"><a id="fashion" class="pure-menu-link" data-anim="la-anim-1">Fashion</a></li>
                    
                   <li class="pure-menu-heading">Account</li>
                   <li class="pure-menu-item">
                   <span class="profile_icon"><i class="fa fa-user fa-lg"></i></span>
                   <a href="userprofile.php" class="pure-menu-link">Profile</a></li>                                  
<span class="settings_icon"><i class="fa fa-cog fa-spin fa-lg"></i></span> 
                    <li class="pure-menu-item"><a href="settings.php" class="pure-menu-link">Settings</a></li>
                    <span class="logout_icon"><i class="fa fa-power-off fa-lg"></i></span> 
                    <li class="pure-menu-item"><a href="logout.php" class="pure-menu-link">Logout</a></li>
                    
<span class="about_icon"><i class="fa fa-hand-peace-o fa-lg"></i></span> 
                    <li class="pure-menu-item"><a href="aboutus.html" class="pure-menu-link" style="opacity:0.9;" id="about_us">About Us</a></li>

            </ul>
        </div>
    </div>

   
        </div>
    </div>






<script src="js/ui.js"></script>







<div id="top" class="nav-header">
<div class="pure-menu pure-menu-horizontal">
    <ul class="pure-menu-list">
        <li class="pure-menu-item"><a href="home.php"  class="pure-menu-link top" id="recent_post">Recent</a></li>
        <li class="pure-menu-item"><a id="popular"  data-anim = "la-anim-1"class="pure-menu-link top">Popular</a></li>
        <li class="pure-menu-item"><a href="new-post.php" class="pure-menu-link top">New Post</a></li>
        
        <li class="pure-menu-item">
        <div class="box">
             <div class="container-1">
              <span class="icon"><i class="fa fa-search"></i></span>
               <input type="text" id="search" name = "search" placeholder="Search "/>
             </div>
        </div>  
        
        </li>
<li class = "pure-menu-item " id="login_username">
<a href = "userprofile.php">
<?php 

$logged_in = ucwords($logged_in);
echo $logged_in;?>
</li>
</a>
<li class="pure-menu-item" id ="user_image">

<?php if(empty($image)==true)
{?>
<div class="post-avatar" style="background-image: url("../img/default.png"); position: fixed; left: 373px; border-radius: 50%; height: 45px; margin-bottom: -160px; margin-left: 925px; width: 49px; z-index: 3; background-size: 48px auto; margin-top: 10px;"></div>
<?php }
else
{?>
<div class="post-avatar" style="background-image: url('<?php echo $image;?>');  position: fixed; left: 373px; border-radius: 50%; height: 45px; margin-bottom: -160px; margin-left: 925px; width: 49px; z-index: 3; background-size: 48px auto; margin-top: 10px;"></div>

  <?php
  }
  ?>



</li>    
</ul>


</div>

</div>

<!--pop up ends-->
    

  <?php
require_once('connection.php');

ini_set("display_errors", TRUE);

try
{
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
$title = ($_POST["title"]);
$username_id= $_SESSION['username_id'];

$time = date("Y-m-d H:i:s"); 

//$category = category_hash('$_POST["category"]', category_BCRYPT);

$category =($_POST["category"]);
$description=($_POST["description"]);
$article =($_POST["article"]);  



 
 
        /*$existsQuery = $db->prepare('SELECT title FROM LOGIN WHERE title = ?');
        $existsQuery->bindValue(1, $title);
  
            $existsQuery->execute();
            if ($existsQuery->fetchColumn() === $title) 
               { echo "ID exists";
           }
            

else{*/
  ?>
    
<?php
$article_id = uniqid();
$query = $db -> prepare('INSERT INTO BLOGCONTENT VALUES(?,?,?,?,?,?,?)');
        $query -> bindParam(1,$title);
        $query->bindParam(2,$category);
        $query->bindParam(3,$description);
        $query->bindParam(4,$article);
        $query-> bindParam(5,$time);
        $query-> bindParam(6,$username_id);
        $query-> bindParam(7,$article_id);
        $resultset = $query->execute();

 $row_count = $query->rowCount();
 
       if($row_count > 0)  { 

$query_postcount=$db->prepare('UPDATE LOGIN SET POSTS_COUNT = POSTS_COUNT+1 WHERE USERNAME = ?');
$query_postcount->bindParam(1,$username_id);
$query_postcount->execute();




?>
<script type="text/javascript">
alert("thanks for blogging")!
</script>
        

      
        <?php 
}
   else
{ 
?>
         <h2> Sorry, Due to certain technical circumstances , your blog couldnt be updated. </h2> 
      
        <?php
}
   
   
          return true;

}}

catch(Exception $e)
{

  $e->getMessage();
}




?>
<script type="text/javascript">

</script>
<!--preoadin screen -->
<div class = "loading">
</div>
<!--end preloading screen-->
<script type="text/javascript">
  
document.documentElement.style.overflowX = 'hidden';


</script>
                       <h1 id="category_heading">Most Recent Uploads</h1>

<div class = "articles" >
<div class = "items">


  
</script>
   <div class="posts" >
                


                <!-- A single blog post -->
             
                      <h2 class = "post-title"><span data-field = "post-title"></span></h2>

                            By <a class="post-author"  href = "javascript:openProfile()" data-field="post-author" ></a> under <a class="post-category post-category-pure" id="category" data-field = "post-category"></a>

                      <p class="post-description"><span data-field = "post-description"></span>
 <a class =  "continue-reading" href="javascript:openArticle()" >. . .Read More <span id = "data" data-field = "article_id"></span><i class="fa fa-long-arrow-right"></i></a>
                      </p>

             

  </div>


</div>

        <div id="la-buttons" class="column">
          <button class="btn btn-info pure-button load-more" id = "all-load" data-anim="la-anim-1">Show Older Posts <i class="fa fa-caret-down"></i></button>
          </div>
    
</div>

<!--hidden divs for each category bgins here-->

<div class = "tech" >
<div class = "items">
   <div class="posts" >
                


                <!-- A single blog post -->
             
                      <h2 class = "post-title"><span data-field = "post-title"></span></h2>

                            By <a class="post-author"  href = 'profile.php' href = "javascript:openProfile()" data-field="post-author"></a> under <a class="post-category post-category-pure" id="category" data-field = "post-category"></a>

                      <p class="post-description"><span data-field = "post-description"></span>
                       <a class =  "continue-reading" href="javascript:openArticle()" >. . .Read More <span id = "data" data-field = "article_id"></span><i class="fa fa-long-arrow-right"></i></a>
</p>

  </div>
</div>
<div id="la-buttons" class="column">
<button  class="btn btn-info pure-button load-more" id = "tech-load" data-anim="la-anim-1">Show Older posts <i class="fa fa-caret-down"></i>
</button>
</div>
</div>

<!--Design div starts here-->
<div class = "design">
<div class = "items">
   <div class="posts" >
                


                <!-- A single blog post -->
             
                      <h2 class = "post-title"><span data-field = "post-title"></span></h2>

                            By <a class="post-author" id = "design-author" data-field="post-author" href = "javascript:openProfile()"></a> under <a class="post-category post-category-pure" id="category" data-field = "post-category"></a>

                      <p class = "post-author" data-field = "post-author"></p>
                      <p class="post-description"><span data-field = "post-description"></span>
                       <a class =  "continue-reading" href="javascript:openArticle()" >. . .Read More <span id = "data" data-field = "article_id"></span><i class="fa fa-long-arrow-right"></i></a>
</p>

  </div>
</div>
<div id="la-buttons" class="column">
<button  class="btn btn-info pure-button load-more" id = "design-load" data-anim = "la-anim-1">Show Older posts <i class="fa fa-caret-down"></i>
</button>
</div>
</div>

<!--Design div ends here-->

<!--ent div starts here-->
<div class = "ent">
<div class = "items">
   <div class="posts" >
                


                <!-- A single blog post -->
             
                      <h2 class = "post-title"><span data-field = "post-title"></span></h2>

                            By <a class="post-author" href = "javascript:openProfile()" data-field="post-author"></a> under <a class="post-category post-category-pure" id="category" data-field = "post-category"></a>

                      <p class="post-description"><span data-field = "post-description"></span>
                       <a class =  "continue-reading" href="javascript:openArticle()" >. . .Read More <span id = "data" data-field = "article_id"></span><i class="fa fa-long-arrow-right"></i></a>
</p>

  </div>
</div>
<div id="la-buttons" class="column">
<button  class="btn btn-info pure-button load-more" id = "ent-load" data-anim="la-anim-1">Show Older posts <i class="fa fa-caret-down"></i>
</button>
</div>

</div>

<!--ent div ends here-->
<!--trav div starts here-->
<div class = "trav">
<div class = "items">
   <div class="posts" >
                


                <!-- A single blog post -->
             
                      <h2 class = "post-title"><span data-field = "post-title"></span></h2>

                            By <a class="post-author" href = "javascript:openProfile()" data-field="post-author"></a> under <a class="post-category post-category-pure" id="category" data-field = "post-category"></a>

                      <p class="post-description"><span data-field = "post-description"></span>
                       <a class =  "continue-reading" href="javascript:openArticle()" >. . .Read More <span id = "data" data-field = "article_id"></span><i class="fa fa-long-arrow-right"></i></a>
</p>

  </div>
</div>
<div id="la-buttons" class="column">
<button  class="btn btn-info pure-button load-more" id = "trav-load"  data-anim= "la-anim-1">Show Older posts <i class="fa fa-caret-down"></i></button>
</div>
</div>

<!--trav div ends here-->
<!--fash div starts here-->
<div class = "fash">
<div class = "items">
   <div class="posts" >
                


                <!-- A single blog post -->
             
                      <h2 class = "post-title"><span data-field = "post-title"></span></h2>

                            By <a class="post-author" href = "javascript:openProfile()" data-field="post-author" href = "profile.php?user_name=" ></a> under <a class="post-category post-category-pure" id="category" data-field = "post-category"></a>

                      <p class="post-description"><span data-field = "post-description"></span>
                       <a class =  "continue-reading" href="javascript:openArticle()" >. . .Read More <span id = "data" data-field = "article_id"></span><i class="fa fa-long-arrow-right"></i></a>
</p>

  </div>
</div>
<div id="la-buttons" class="column">
<button  class="btn btn-info pure-button load-more" id = "fash-load" data-anim="la-anim-1">Show Older posts <i class="fa fa-caret-down"></i></button>
</div>
</div>
<!--popular starts here-->
<div class = "popular">
<div class = "items">
   <div class="posts" >
                


                <!-- A single blog post -->
             
                      <h2 class = "post-title"><span data-field = "post-title"></span></h2>

                            By <a class="post-author" href = "javascript:openProfile()" data-field="post-author" href = "profile.php?user_name=" ></a> under <a class="post-category post-category-pure" id="category" data-field = "post-category"></a>

                      <p class="post-description"><span data-field = "post-description"></span>
                       <a class =  "continue-reading" href="javascript:openArticle()" >. . .Read More <span id = "data" data-field = "article_id"></span><i class="fa fa-long-arrow-right"></i></a>
</p>

  </div>
</div>
<!--popular ends here-->

<div id="la-buttons" class="column">
<button  class="btn btn-info pure-button load-more" id = "popular-load" data-anim="la-anim-1">Show Older posts <i class="fa fa-caret-down"></i></button>
</div>
</div>

<!--preloader topbar-->
  <div class="la-anim-1"></div>
    <!-- main container -->
 
 <div id = "output"></div>
<script type="text/javascript">

//search starts here

function searchq(){

  var searchTxt = $("input[name = 'search']").val();

  $.ajax({

url : 'search.php',
type : 'POST',
data : {'search' : searchTxt},
success : function(output)
{
  if (!$.trim(output)) {
      $('#output').html('<div> No results found </div>');

  }
    else{
  $('#output').html(output);
}
}
  });
}

$('#search').keyup(function(event) {
  /* Act on the event */
  searchq();
  $('#output').delay(1000, 'queueName').show(0).fadeIn(500)
});

$('#search').on('mouseleave touchend',function(event) {
  
  $('#output').on('mouseleave touchend',function(event) {
     $('#output').hide(0); /* Act on the event */
  });


          setTimeout( function() {
             $('#output').hide(0); /* Act on the event */

          }, 10000*3 );



});

$('.primary-button').on('click touchstart',function(event) {
  window.location.href = "../aboutus.html";
});
//functionality for the technology category starts here.
$("#tech").one('click',function(){
$('.la-anim-1').show();
  $('.tech').delay(500).fadeIn(500).show(0);
  $('#tech-load').delay(1000, 'queueName').show(0).fadeIn(500)

  window.location.hash = "category=Technology";
$('.articles,.design,.trav,.fash,.ent').hide(0);

$('.tech').loadmore({

source : 'categories.php',
step : 10,
category : 'Technology',

});        


$('#category_heading').replaceWith('<h1 id="category_heading">Technology</h1>')

//Redirections from tech
$("#travel").on('click',function(){ 
  $('#category_heading').replaceWith('<h1 id="category_heading">Travel</h1>')
$('.tech,#tech-load').hide();
$('.trav,#trav-load').delay(1000, 'queueName').show(0).fadeIn(500)

});

$("#ent").on('click',function(){
  $('#category_heading').replaceWith('<h1 id="category_heading">Entertainment</h1>')
$('.tech,#tech-load').hide();
$('.ent,#ent-load').delay(1000, 'queueName').show(0).fadeIn(500)


});

$("#design").on('click',function(){
$('.tech,#tech-load').hide();
$('#category_heading').replaceWith('<h1 id="category_heading">Design</h1>')
$('.design,#design-load').delay(1000, 'queueName').show(0).fadeIn(500)

});



$("#fashion").on('click',function(){
$('.tech,#tech-load').hide();
$('#category_heading').replaceWith('<h1 id="category_heading">Fashion</h1>')
$('.fash,#fash-load').delay(1000, 'queueName').show(0).fadeIn(500)

});

$("#popular").click(function(event) {
  /* Act on the event */
$('.tech,#tech-load').hide();
$('#category_heading').replaceWith('<h1 id="category_heading">Popular</h1>')
$('.popular,#popular-load').delay(1000, 'queueName').show(0).fadeIn(500)


});

//End Redirections
   
});//end tech

//for design
$("#design").one('click',function(){
$('.la-anim-1').show();
  window.location.hash = "category=Design";

  $('.design').delay(500).fadeIn(500).show(0);
   $('#design-load').delay(1000, 'queueName').show(0).fadeIn(500)

$('.articles,.tech,.trav,.fash').hide(0);

$('.design').loadmore({

source : 'categories.php',
step : 10,
category : 'Design',

});        
//if we click technology again, another ajax request will be appended so we avoid using  one click . But if user wants to go back to same category it can be done in once click . So on click is written for evry page from evry oher page.
$('#category_heading').replaceWith('<h1 id="category_heading">Design</h1>')

//Redirections from Design
$("#tech").on('click',function(){ 
  $('#category_heading').replaceWith('<h1 id="category_heading">Technology</h1>')
$('.design,#design-load').hide();
$('.tech,#tech-load').delay(1000, 'queueName').show(0).fadeIn(500)

});

$("#ent").on('click',function(){
  $('#category_heading').replaceWith('<h1 id="category_heading">Entertainment</h1>')
$('.design,#design-load').hide();
$('.ent,#ent-load').delay(1000, 'queueName').show(0).fadeIn(500)


});

$("#trav").on('click',function(){
$('.design,#design-load').hide();
$('#category_heading').replaceWith('<h1 id="category_heading">Travel</h1>')
$('.trav,#trav-load').delay(1000, 'queueName').show(0).fadeIn(500)

});



$("#fashion").on('click',function(){
$('.design,#design-load').hide();
$('#category_heading').replaceWith('<h1 id="category_heading">Fashion</h1>')
$('.fash,#fash-load').delay(1000, 'queueName').show(0).fadeIn(500)

});


$("#popular").click(function(event) {
  /* Act on the event */
$('.design,#design-load').hide();
$('#category_heading').replaceWith('<h1 id="category_heading">Popular</h1>')
$('.popular,#popular-load').delay(1000, 'queueName').show(0).fadeIn(500)


});
//End Redirections
   
   
});//end clik
//end of design


//Entertainment click starts here
$("#ent").one('click',function(){
        $('.la-anim-1').show();

 window.location.hash = "category=Entertainment";

    $('.ent').delay(500).fadeIn(500).show(0);
   $('#ent-load').delay(1000, 'queueName').show(0).fadeIn(500)

 
$('.articles,.tech,.design,.trav,.fash,#all-load,#tech-load,#design-load').hide(0);

$('.ent').loadmore({

source : 'categories.php',
step : 10,
category : 'Entertainment',
});


$('#category_heading').replaceWith('<h1 id="category_heading">Entertainment</h1>')
//Redirections from entertainment 

$("#tech").on('click',function(){
$('.ent,#ent-load').hide();
$('.tech,#tech-load').delay(1000, 'queueName').show(0).fadeIn(500)
$('#category_heading').replaceWith('<h1 id="category_heading">Technology</h1>')

});

$("#design").on('click',function(){
$('.ent,#ent-load').hide();
$('#category_heading').replaceWith('<h1 id="category_heading">Design</h1>')
$('.design,#design-load').delay(1000, 'queueName').show(0).fadeIn(500)

});


$("#travel").on('click',function(){
$('.ent,#ent-load').hide();
$('#category_heading').replaceWith('<h1 id="category_heading">Travel</h1>')
$('.trav,#trav-load').delay(1000, 'queueName').show(0).fadeIn(500)

});


$("#fashion").on('click',function(){
$('.ent,#ent-load').hide();
$('#category_heading').replaceWith('<h1 id="category_heading">Fashion</h1>')
$('.fash,#fash-load').delay(1000, 'queueName').show(0).fadeIn(500)

});

$("#popular").click(function(event) {
  /* Act on the event */
$('.ent,#ent-load').hide();
$('#category_heading').replaceWith('<h1 id="category_heading">Popular</h1>')
$('.popular,#popular-load').delay(1000, 'queueName').show(0).fadeIn(500)


});

});

//end clik

//Entertainmnt click ends here .

//Travel click starts here.
$("#travel").one('click',function(){
  
window.location.hash = "category=travel";


$('.la-anim-1').show();

  
  $('.trav').delay(500).fadeIn(500).show(0);
   $('#trav-load').delay(1000, 'queueName').show(0).fadeIn(500)

 
$('.articles,.tech,.ent,.fash,.design').hide(0);

$('.trav').loadmore({

source : 'categories.php',
step : 10,
category : 'Travel',

});        
//if we click technology again, another ajax request will be appended so we avoid using  one click . But if user wants to go back to same category it can be done in once click . So on click is written for evry page from evry oher page.
$('#category_heading').replaceWith('<h1 id="category_heading">Travel</h1>')

//Redirections from travel 
$("#tech").on('click',function(){ 
  $('#category_heading').replaceWith('<h1 id="category_heading">Technology</h1>')
$('.trav,#trav-load').hide();
$('.tech,#tech-load').delay(1000, 'queueName').show(0).fadeIn(500)

});

$("#ent").on('click',function(){

$('.trav,#trav-load').hide();
  $('#category_heading').replaceWith('<h1 id="category_heading">Entertainment</h1>');
$('.ent,#ent-load').delay(1000, 'queueName').show(0).fadeIn(500)


});

$("#design").on('click',function(){
$('.trav,#trav-load').hide();
$('#category_heading').replaceWith('<h1 id="category_heading">Design</h1>')
$('.design,#design-load').delay(1000, 'queueName').show(0).fadeIn(500)

});



$("#fashion").on('click',function(){
$('.trav,#trav-load').hide();
$('#category_heading').replaceWith('<h1 id="category_heading">Fashion</h1>')
$('.fash,#fash-load').delay(1000, 'queueName').show(0).fadeIn(500)

});

$("#popular").click(function(event) {
  /* Act on the event */
$('.trav,#trav-load').hide();
$('#category_heading').replaceWith('<h1 id="category_heading">Popular</h1>')
$('.popular,#popular-load').delay(1000, 'queueName').show(0).fadeIn(500)


});

//End Redirections
   
});//end clik
//
$("#fashion").one('click',function(){
        $('.la-anim-1').show();

 window.location.hash = "category=Fashion";
  $('.fash').delay(500).fadeIn(500).show(0);
   $('#fash-load').delay(1000, 'queueName').show(0).fadeIn(500)
 
$('.articles,.tech,.ent,.trav,.design').hide(0);

$('.fash').loadmore({

source : 'categories.php',
step : 10,
category : 'Fashion',

});        
//if we click technology again, another ajax request will be appended so we avoid using  one click . But if user wants to go back to same category it can be done in once click . So on click is written for evry page from evry oher page.
$('#category_heading').replaceWith('<h1 id="category_heading">Fashion</h1>')

//Redirections from fashion 
$("#tech").on('click',function(){ 
$('.fash,#fash-load').hide();
  $('#category_heading').replaceWith('<h1 id="category_heading">Technology</h1>');

$('.tech,#tech-load').delay(1000, 'queueName').show(0).fadeIn(500)

});

$("#ent").on('click',function(){

$('.fash,#fash-load').hide();
  $('#category_heading').replaceWith('<h1 id="category_heading">Entertainment</h1>');
$('.ent,#ent-load').delay(1000, 'queueName').show(0).fadeIn(500)


});

$("#design").on('click',function(){
$('.fash,#fash-load').hide();
$('#category_heading').replaceWith('<h1 id="category_heading">Design</h1>');
$('.design,#design-load').delay(1000, 'queueName').show(0).fadeIn(500)

});



$("#travel").on('click',function(){
$('.fash,#fash-load').hide();
$('#category_heading').replaceWith('<h1 id="category_heading">Travel</h1>')
$('.trav,#trav-load').delay(1000, 'queueName').show(0).fadeIn(500)

});

$("#popular").click(function(event) {
  /* Act on the event */
$('.fash,#fash-load').hide();
$('#category_heading').replaceWith('<h1 id="category_heading">Popular</h1>')
$('.popular,#popular-load').delay(1000, 'queueName').show(0).fadeIn(500)


});
//End Redirections
});//end clik

//Popular click starts here.
$("#popular").one('click',function(){
  $('.la-anim-1').show();
window.location.hash = "Popular";
  $('.popular').delay(500).fadeIn(500).show(0);
   $('#popular-load').delay(1000, 'queueName').show(0).fadeIn(500)
 
$('.articles,.tech,.ent,.fash,.design,.trav').hide(0);

$('.popular').loadmore({

source : 'categories.php',
step : 10,
category : 'Popular',

});        
//if we click technology again, another ajax request will be appended so we avoid using  one click . But if user wants to go back to same category it can be done in once click . So on click is written for evry page from evry oher page.
$('#category_heading').replaceWith('<h1 id="category_heading">Popular</h1>')

//Redirections from Popular 
$("#tech").on('click',function(){ 
  $('#category_heading').replaceWith('<h1 id="category_heading">Technology</h1>')
$('.popular,#popular-load').hide(0);
$('.tech,#tech-load').delay(500).fadeIn(500).show(0);

});

$("#ent").on('click',function(){
  $('#category_heading').replaceWith('<h1 id="category_heading">Entertainment</h1>')
$('.popular,#popular-load').hide(0);
$('.ent,#ent-load').delay(500).fadeIn(500).show(0);


});

$("#design").on('click',function(){
$('.popular,#popular-load').hide(0);
$('#category_heading').replaceWith('<h1 id="category_heading">Design</h1>')
$('.design,#design-load').delay(500).fadeIn(500).show(0);

});



$("#fashion").on('click',function(){
$('.popular,#popular-load').hide(0);
$('#category_heading').replaceWith('<h1 id="category_heading">Fashion</h1>')
$('.fash,#fash-load').delay(500).fadeIn(500).show(0);

});


$("#trav").on('click',function(){
$('.popular,#popular-load').hide(0);
$('#category_heading').replaceWith('<h1 id="category_heading">Travel</h1>')
$('.trav,#trav-load').delay(500).fadeIn(500).show(0);

//End Redirections
   });
});//end clik
//
//load more begins here.
 
$(document).ready(function() {

  $('.articles').loadmore({

source : 'categories.php',
step : 10,
category : 'all',
});
$('.articles,#all-load').hide();
$('.articles,#all-load').delay(500).fadeIn(500);
$('#tech-load,.tech').hide(0);

$('#design-load,.design').hide(0);

$('#ent-load,.ent').hide(0);
$('#trav-load,.trav').hide(0);

$('#fash-load,.fash').hide(0);

$('#popular-load,.popular').hide(0);

$('.load-more').click(function(){
       $('.la-anim-1').show();

      });
});


  $(document).ajaxComplete(function() {

$('.post-author').click(function(){
   var user_name = $(this).text();
   console.log(user_name);
   openProfile = function() {
location.href = "profile.php?user_name="+user_name;
}
  /* executes whenever an AJAX request completes */
  });


$('.continue-reading').click(function(event) {
  /* Act on the event */
  var article_id = $(this).find('#data').text();
console.log(article_id);
openArticle = function(){

  location.href = "articles.php?article_id="+article_id;
}

});


$('.search').on('click touchstart',function(event) {
  var article = $(this).attr("id");
  location.href = "articles.php?article_id="+article;/* Act on the event */
});

$('#tech,#travel,#ent,#design,#fashion,#popular').click(function(event) {
  /* Act on the event */
  $('.la-anim-1').show();

});
});


//like button

//preloading top bar
  var inProgress = false;

      Array.prototype.slice.call( document.querySelectorAll( '.load-more,#tech,#ent,#travel,#design,#fashion,#popular' ) ).forEach( function( el, i ) {
        var anim = el.getAttribute( 'data-anim' ),
          animEl = document.querySelector( '.' + anim );

        el.addEventListener( 'click', function() {
          if( inProgress ) return false;
          
          classie.add( animEl, 'la-animate' );

        

          setTimeout( function() {
            classie.remove( animEl, 'la-animate' );
            inProgress = false;
          }, 10000 );
        } );
      } );



    var layout   = document.getElementById('layout'),
        menu     = document.getElementById('menu'),
        menuLink = document.getElementById('menuLink');

    function toggleClass(element, className) {
        var classes = element.className.split(/\s+/),
            length = classes.length,
            i = 0;

        for(; i < length; i++) {
          if (classes[i] === className) {
            classes.splice(i, 1);
            break;
          }
        }
        // The className is not found
        if (length === classes.length) {
            classes.push(className);
        }

        element.className = classes.join(' ');
    }

    menuLink.onclick = function (e) {
        var active = 'active';

        e.preventDefault();
        toggleClass(layout, active);
        toggleClass(menu, active);
        toggleClass(menuLink, active);
    };

if (window.matchMedia('(max-width: 55em)').matches)
{

$('#tech,#travel,#ent,#fashion,#design').on('click',function(e){

  var active = 'active';

        e.preventDefault();
        toggleClass(layout, active);
        toggleClass(menu, active);
        toggleClass(menuLink, active);


});


}
   
</script>
<link rel="stylesheet" href="jAlert-master/src/jAlert-v3.css" />

<script src="jAlert-master/src/jAlert-v3.js"></script>

<script src="jAlert-master/src/jAlert-functions.js"> //optional!!</script>
</body>
</html>
