
<?php 
session_start();
require_once('password.php');
require_once('connection.php');

 ?>
<!DOCTYPE html>
<html>
<!--Copyright 2015
Credit:
Shriram Balaji   Nadeem Shaik
St. Joseph's College Of Engineering
-->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
<meta name="viewport" content=" width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">



<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<meta charset="UTF-8">


<title>On The Go Blog &copy;</title>

<!--Import Google Icon Font-->
      <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      
      <link type="text/css" rel="stylesheet" href="css/login-materialize.css"  media="screen,projection"/>
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />

    <link rel="stylesheet" type="text/css" href="css/loading.css" />
    <script src="js/modernizr.custom.js"></script>
    <script src="js/classie.js"></script>

<style>
@import "//fonts.googleapis.com/css?family=Montserrat:400,300,800|Lora:400italic|Playfair+Display:700";

body {
    font-family: 'Montserrat',sans-serif;
    position: relative;
}

.bg-img
{
    min-height: 100%;
  min-width: 1024px;
  
  /* Set up proportionate scaling */
  width: 100%;
  height: auto;
  
  /* Set up positioning */
  position: fixed;
  top: 0;
  left: 0;
    background-image: url("../img/bg.jpg");
    background-size: cover;
}
.loading {
   position: absolute;
    z-index: 9999;
    left: 50%;
    top: 500px;
    height: 100px;
    width: 100px;
    margin: 0px auto;
   -webkit-animation: rotation .7s infinite linear;
   -moz-animation: rotation .7s infinite linear;
   -o-animation: rotation .7s infinite linear;
   animation: rotation .7s infinite linear;
   border-left:6px solid rgba(0,174,239,.15);
   border-right:6px solid rgba(0,174,239,.15);
   border-bottom:6px solid rgba(0,174,239,.15);
   border-top:6px solid rgba(0,174,239,.8);
   border-radius:100%;
   display: none;
}

@-webkit-keyframes rotation {
   from {-webkit-transform: rotate(0deg);}
   to {-webkit-transform: rotate(359deg);}
}
@-moz-keyframes rotation {
   from {-moz-transform: rotate(0deg);}
   to {-moz-transform: rotate(359deg);}
}
@-o-keyframes rotation {
   from {-o-transform: rotate(0deg);}
   to {-o-transform: rotate(359deg);}
}
@keyframes rotation {
   from {transform: rotate(0deg);}
   to {transform: rotate(359deg);}
}
.welcome-text{
position: absolute;
top: 424px;
right: 240px;
z-index: -1;
color:white;
text-shadow: 1px 1px 2px #039be5, 0 0 1px white, 0 0 5px #1b73f8;


}


.logo {
    width: 213px;
    height: 36px;
    position: absolute;
    top: 100px;
    left: 55px;
    z-index: 2;
    font-size: 18px;
    color:white;
    text-shadow: 1px 1px 2px #039be5, 0 0 2px white, 0 0 5px #1b73f8;
    font-style: bold;
    font-family: 'Montserrat' !important;

}
.logo-title{

  background-image: url("../img/logo.png");

}

.footer button{

    position:relative;
    color: white;
    background:white;
    bottom: 0px;
    width: 100%;
    height: 100%;
    cursor: none;
    box-shadow: 0 1px 5px 0 black;
}
.login-block {

     width: 400px;
padding: 20px;
border-radius: 3px;
position: absolute;
right: 200px;
top: 100px;
background: transparent none repeat scroll 0% 0%;
box-shadow: 2px 3px #050404;
border-right: 2px solid #000;
border-top: 1px solid #FFF;
border-left: 1px solid #FFF;
color: white;

}

.tabs{
  background-color: transparent !important;

}
.tabs .tab a {
  color: #fff !important;
}
.login-block input {
    width: 100%;
    height: 42px;
    box-sizing: border-box;
    color:#fff;
    margin-bottom: 20px;
    font-size: 14px;
    font-family: Montserrat;
    padding: -1px 0px 0 50px;
    outline: none
    color:white;
  }









.login-block button {
    width: 100%;
    height: 40px;
    box-sizing: border-box;
    border-radius: 5px;
    border: 0px solid #0277bd;
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
    font-size: 14px;
    font-family: Montserrat;
    outline: none;
    cursor: pointer;
    box-shadow: 0 1px 3px 0 #039be5;
}
#fblogin
{

    margin-top: 20px;
    width: 355px;
    background-color: #3b5998;
    border-radius: 5px;

}

/* Media Queries start here for 960,484,768,640,480 and 320 */

@media screen and (max-width:960px){

.logo{
left:100px;

}

}
@media screen and (max-width:848px){

.login-block{
right:0px;
left: 270px;

}

.welcome-text{

right:0px;
left: 290px

}
}
@media screen and (max-width:786px){

.logo{
    left: 20px;
    top: 5px;

}

.login-block{

top:120px;
right:0px;
left: 300px;
width:400px;

}
.welcome-text{

top:440px;
right:0px;
left: 340px

}

}
@media screen and (max-width:640px){

.logo{
position: relative;
top:120px;
text-align: none;
font-size: 16px;
left:120px;

}

.logo-title{
left:120px;
}

.login-block{

top:280px;
right:0px;
left: 100px;
width:370px;


}
    #fblogin{
        width:325px
    }
.welcome-text{

top:420px;
right:0px;
left:260px

}
}

@media (max-width:480px){

.logo{
position: absolute;
top:30px;
text-align: none;
font-size: 14px;
left:110px;

}

.logo-title{

font-size: 26px;
display: none;
}

.login-block{

top:30px;
right:0px;
left: 15px;
width:320px !important;

}

#fblogin
{

margin-top: 20px;
width: 277px;


}
.welcome-text{

top:515px;
right:0px;
left: 25px;
font-size: 120%;

}

.logo{

left:120px;

}
}

 @media (max-height:320px){
.logo{
position: absolute;
top:10px;
text-align: none;
font-size: 16px;


}
#otglogo
{
  display: none;
}
.footer{

display: none;
}

.logo-title{

font-size: 26px;
display: block;

}

.login-block{

    width: 320px;
    top: 115px;
    left: 0px;
    right: 0px;
    /*Testing widths*/
    border-radius: 3px;
    border-top: 4px solid #039BE5;
    border-right: 0px none;
    border-bottom: 0px none;
    box-shadow: none;
}

.welcome-text{

top:450px;
right:0px;
left: 15px

}

.logo{

left:100px;

}
}

/* End of Media Queries */

</style>
</head>

<body>
<script type="text/javascript">
	
//init code for facebook login starts here
 (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));


 window.fbAsyncInit = function() {
  FB.init({
    appId      : '799680073475396',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.0' // use version 2.2
  });


 FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });
};

</script>

      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>

<script type="text/javascript">

//login with facebook starts here

 
  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.



  // Load the SDK asynchronously


function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
     testAPI();

    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
    
    }
  
}
  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.

  
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }


$(document).ready(function(){
$('#fblogin').click(function(){
 FB.login(function(response) {
         if (response.authResponse) 
         {
             testAPI(); //Get User Information.
              

          } else
          {
           alert('Authorization failed.');
          }
      },{scope: 'public_profile,email,user_birthday'});

});
  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
});
   function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
FB.api('/me?fields=id,name,email,picture,first_name,birthday,last_name', function(response) {
	
	 var fblogin = $.ajax({
    type : "POST",
   data: response,
   dataType : 'json',
   url : 'facebook_login.php',
   
   cache : false,


});
	fblogin.done(function(data){
     window.top.location = "../home.php";


	});


      console.log('Successful login for: ' + response.name);
      
  
    });



  }

//


</script>
<div class="bg-img">

</div>

<div class="logo"> 

<div class = "logo-title"><img src = "../img/logo.png" id = "otglogo"/></div> <br>

</div>
    <!-- Divisions for loading effects -->
    <div class="la-anim-1"></div>
    <!-- main container -->
<div class="login-block" id="log">

<div class="row tab-header">
      
      <ul class="tabs">

        <li class="tab col s6 light"><a  class="active " href="#login">Login</a></li>
        <li class="tab col s6" class = "active"id="signup-tab"><a href="#signup">Sign Up</a></li>
      
      </ul>

</div>

<div id="login" class="col s12">
<form class="loginform"  method="post" action ="user_login.php"  >
                   
                    <p>
                        <input type="text" name="username"id="username" placeholder="Username or email" required >
                    </p>
                    <p>
                        <input type="password" name="password"   placeholder="Password" required id ="password"> 
                    </p>

    <button class="btn waves-effect light-blue " id="login_submit" type="submit" name="action" data-anim="la-anim-1">Log In</button>

        <div id="la-buttons" class="column">

<a class="waves-effect waves-light btn-large" id = "fblogin" data-anim="la-anim-1" >Log in with Facebook!</a>

</div>


    <br> <small> <a style = " opacity:1.0; color:#fff;" class=" modal-trigger" href="#recovery"> Forgot Password? Recover by Email.</a> </small>
</form>
</div>


<div id="signup" class="col s12">
<form class="signup_form"  method="post" name = "signup_form" id = "signup_form"   >
  
    <input type="text" value="" placeholder="Username" id="user-name" name="user-name" />

    <input type="password" value="" placeholder="Password" id="passwd" name="passwd" />

    <input type="email" value="" placeholder="Email" id="email" class="validate" name="email" />

    <input type="text" value="" placeholder="First Name" id="first-name" name="first-name" />

    <input type="text" value="" placeholder="Last Name" id="last-name" name = "last-name"/>



    <button class="btn waves-effect light-blue darken-1 " type="submit" id="signup-submit">Sign Up</button>


</div>
</form>

</div>

<div class= "modal" id = "recovery">
<div class="modal-content" ="rcvr_email">
<p > Please enter your registered email. We'll send the credentials required.</p>
    <form>
      EMAIL : <input type="email" name="frgt_mail" id="frgt_mail">
    </form>

</div>
<a href="#!" id ="send" class="modal-action btn modal-close waves-effect waves">SEND</a>
</div>
<script type="text/javascript">

$('#send').click(function(event) {
  /* Act on the event */

        
   var email = $("#frgt_mail").val();
  $.ajax({ url: 'recovery.php',
     data: {'email' : email , 'update' : 'password'},
     type: 'post',
 
     cache:false,
     success: function(data) {
                  
  Materialize.toast('Your details have been sent. Please check your mail!', 3000);
                  
              }
     
});

});
 $("#signup-tab").click(function(e){   
 $("#signup-submit").click(function(e){
    console.log('done');
      e.preventDefault();  

var dataString = $("#signup_form").serialize();

  
   var login = $.ajax({ 
     url: "hello.php",
     data : dataString,
     type: "POST",
     dataType:'json',
    
});

login.done(function(){
console.log('logged in');

window.location.href = "index.php";


});

});  


});


$('#login_submit').click(function(event) {
 var username = $('#username').val();
var password = $('#password').val();

if(username.length<=0 && password.length<=0)
{
  
alert("empty");
    
}
 /* Act on the event */
});


$('#fblogin').click(function(){

 
$(document).ajaxComplete(function(){
$('.la-anim-1').show();

setTimeout(function(){


$('.la-anim-1').hide();
window.location.href = "home.php";
},1000*0.5);

});
});
//frgt passwd

$('.modal-trigger').leanModal();

//preloading top bar
var inProgress = false;

      Array.prototype.slice.call( document.querySelectorAll( '#la-buttons > a' ) ).forEach( function( el, i ) {
        var anim = el.getAttribute( 'data-anim' ),
          animEl = document.querySelector( '.' + anim );

        el.addEventListener( 'click', function() {
          if( inProgress ) return false;
          inProgress = true;
          classie.add( animEl, 'la-animate' );

        

          setTimeout( function() {
            classie.remove( animEl, 'la-animate' );
            inProgress = false;
          }, 6000 );
        } );
      } );

</script>

</body>

</html>