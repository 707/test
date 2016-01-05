<?php 

session_start();
require_once 'connection.php';
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
  die();
}
?>

<!doctype html>
<html>
  
   <head>



      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
          
    <meta charset="utf-8">
    <meta name="description" content="grande.js: a way for you to express yourself">


    <link href = "css/article-editor.css" rel="stylesheet">
       <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      
      <link type="text/css" rel="stylesheet" href="css/login-materialize.css"  media="screen,projection"/>

    <link href="css/menu.css" rel="stylesheet"/>
    <link href="css/editor.css" rel="stylesheet"/>
            <script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
  </head>

  <body class="g-body">
        <a class = "close btn tooltipped" href = "home.php"id = "discard" data-position="left" data-delay="50" data-tooltip="Discard"> <i class="material-icons">close</i></a>

    <section>

    <form class = "new-article" method="POST">
  
     <div class="input-field col s12 ">
    <select class="browser-default" id = "category" name="category" required> 

      <option value="1">Technology</option>
      <option value="2">Design</option>
      <option value="3">Entertainment</option>
      <option value="4">Travel</option>
      <option value="5">Fashion</option>
   </select>

  </div>
<div class="row">
        <div class="input-field col s12">
          <input type = "text" id="title"  name = "title" class="materialize-textarea" required />
          <label for="description">Title</label>
        </div>
      </div>
       <div class="row">
        <div class="input-field col s12">
          <textarea input type = "text" id="description"  name = "description" class="materialize-textarea" length = "400" required></textarea>
          <label for="description">Description</label>
        </div>
      </div>
      <article class="content" name = "article">
       <div> <p class="welcome-text">Welcome! Please read the <b>instructions below</b> and start typing your article highlighted below .</p></div>
       <p class="focus" > </p>

     

       </article>
       </form>
      <a class="waves-effect waves-light btn" id = "submit">Publish</a>
    </section>

<div class = "instructions">
<h4>INSTRUCTIONS</h4>
<p>Select or highlight text to change formatting, add headers.</p>
        <ul>
          <li>Create a bulleted list simply by typing "- " or "* " and hitting enter</li>
        
          <hr contenteditable="false">
          <li><i>Press Enter Twice </i> to create a divider to separate your content.</li>
        <hr contenteditable="false">
        </ul>

</div>
    <script type="text/javascript" src="js/grande.js"></script>
    <script type="text/javascript">
      grande.bind(document.querySelectorAll(".focus"));

  $(document).ready(function() {
    $('select').material_select();
  });

$(".content").mouseenter(function(event) {
  $('span').removeAttr('style');
  /* Act on the event */
  $('.focus').focus();
});

$(".focus").bind('paste input' , function(e) {
  /* Act on the event */
$('*').removeAttr('style');



});
$("#submit").one('click',function(){

  
    console.log('done');

$('.welcome-text').remove();
var category = $('#category option:selected').text();
var description = $('#description').val();
var title = $('#title').val();
var article = $('.content').html();
console.log(article);
  
   var submit = $.ajax({ 
     url: "publish_article.php",
     data :{'category': category,'description': description,'title' : title,'article' : article},
     type: "POST",
    
});

submit.done(function(){

console.log('blogged in');
 Materialize.toast('Your Article has been published!', 2000);


  setTimeout(function(){


window.location.href = "../home.php";

  },1000*3);
});
});

document.documentElement.style.overflowX = 'hidden !important';
    </script>

  </body>

</html>
