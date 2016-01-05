<?php 
session_start();
require_once 'connection.php';

?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<meta name="keywords" content="title, header, effect, scroll, inspiration, medium, web design" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/article/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/article/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/article/component.css" />
	    <link rel="stylesheet" type="text/css" href="css/heart.css" />
            <script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet"><!--for addin fonticons -->

		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body class="demo-2">

	<?php
        try{
$user_info = $_SESSION['username_id'];
$article_id = $_GET['article_id'];
$query = $db->prepare("SELECT * FROM BLOGCONTENT WHERE ARTICLE_ID = '$article_id'");
$query->execute();
$results_article = $query->fetch();
$title = $results_article['TITLE'];
$category = $results_article['CATEGORY'];
$description = $results_article['DESCRIPTION'];
$article = $results_article['ARTICLE'];
$author = $results_article['AUTHOR'];
$time = $results_article['USERTIME'];
$like = $results_article['LIKE_COUNT'];



}
catch(Exception $e){
	$e->getMessage();
}

	?>
	<div id = "data" style="display:none !important;"><?php echo $user_info;?>
	</div>
		<div id="container" class="container intro-effect-fadeout">
			<!-- Top Navigation -->
			<div class="codrops-top clearfix">
				<a class="codrops-icon " href="../home.php"><i class="fa fa-arrow-left"></i>
<span>Go Back</span></a>
			</div>
			<span id = "hidden"><?php echo $article_id;?></span>
			<header class="header">
			<!--Cheacking fr indiv categories and changing image accordingly-->
				<?php 
			if($category == "Travel")
			{?>
				<div class="bg-img"><img src="img/travel.jpg" alt="Background Image" /></div>

			<?php 
		     }
			else if ($category == "Technology")
			{?>
								<div class="bg-img"><img src="img/tech.jpg" alt="Background Image" /></div>

			<?php
			}
			else if ($category == "Fashion"){
			?>
										<div class="bg-img"><img src="img/fashion.jpg" alt="Background Image" /></div>

         <?php
			}
			else if ($category == "Design"){
			?>
										<div class="bg-img"><img src="img/design.jpg" alt="Background Image" /></div>
<?php
			}
			else if ($category == "Entertainment"){
			?>
												<div class="bg-img"><img src="img/ent.jpg" alt="Background Image" /></div>


<?php
			}
			?>

				<div class="title">
				
					<h1><?php echo $title; ?></h1>
					<p>By <strong><span id = "author"><?php echo $author; ?></span></strong> &#8212; Posted in <strong><span id = "category"><?php echo $category; ?></span></strong> on <strong><?php echo date('F jS Y', strtotime($time)); ?></strong></p>
				</div>
			</header>
			<button class="trigger" ><span>Trigger</span></button>

			
			<article class="content" >
				<div>
					<p><?php echo $description; ?> </p>

				<p><?php echo $article; ?></p>
				
				</div>
		
			</article>
	
	<!--Like button-->
		<div class="heart " id="like" rel="like"></div> 
        <div class="likeCount" id="likeCount"><?php echo $like;?></div>
		</div>

		<!--Checking if post is already liked by user and changing css accordingly -->
		<?php
$check = $db->prepare("SELECT ID FROM LIKES WHERE AUTHOR = '$user_info' AND ARTICLE_ID = '$article_id'");
$check->execute();
$rows = $check->fetch(PDO::FETCH_NUM);

if(!empty($rows)){?>
<script>
$('.heart').css("background-position","right");
</script>
<?php
}
else if(empty($rows) or $rows == 0)
{?>
	<script>
$('.heart').css("background-position","left");
</script>
<?php }
?>




		<!-- /container -->
		<script src="js/classie.js"></script>
		<script>
			(function() {

				// detect if IE : from http://stackoverflow.com/a/16657946		
				var ie = (function(){
					var undef,rv = -1; // Return value assumes failure.
					var ua = window.navigator.userAgent;
					var msie = ua.indexOf('MSIE ');
					var trident = ua.indexOf('Trident/');

					if (msie > 0) {
						// IE 10 or older => return version number
						rv = parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
					} else if (trident > 0) {
						// IE 11 (or newer) => return version number
						var rvNum = ua.indexOf('rv:');
						rv = parseInt(ua.substring(rvNum + 3, ua.indexOf('.', rvNum)), 10);
					}

					return ((rv > -1) ? rv : undef);
				}());


				// disable/enable scroll (mousewheel and keys) from http://stackoverflow.com/a/4770179					
				// left: 37, up: 38, right: 39, down: 40,
				// spacebar: 32, pageup: 33, pagedown: 34, end: 35, home: 36
				var keys = [32, 37, 38, 39, 40], wheelIter = 0;

				function preventDefault(e) {
					e = e || window.event;
					if (e.preventDefault)
					e.preventDefault();
					e.returnValue = false;  
				}

				function keydown(e) {
					for (var i = keys.length; i--;) {
						if (e.keyCode === keys[i]) {
							preventDefault(e);
							return;
						}
					}
				}

				function touchmove(e) {
					preventDefault(e);
				}

				function wheel(e) {
					// for IE 
					//if( ie ) {
						//preventDefault(e);
					//}
				}

				function disable_scroll() {
					window.onmousewheel = document.onmousewheel = wheel;
					document.onkeydown = keydown;
					document.body.ontouchmove = touchmove;
				}

				function enable_scroll() {
					window.onmousewheel = document.onmousewheel = document.onkeydown = document.body.ontouchmove = null;  
				}

				var docElem = window.document.documentElement,
					scrollVal,
					isRevealed, 
					noscroll, 
					isAnimating,
					container = document.getElementById( 'container' ),
					trigger = container.querySelector( 'button.trigger' );

				function scrollY() {
					return window.pageYOffset || docElem.scrollTop;
				}
				
				function scrollPage() {
					scrollVal = scrollY();
					
					if( noscroll && !ie ) {
						if( scrollVal < 0 ) return false;
						// keep it that way
						window.scrollTo( 0, 0 );
					}

					if( classie.has( container, 'notrans' ) ) {
						classie.remove( container, 'notrans' );
						return false;
					}

					if( isAnimating ) {
						return false;
					}
					
					if( scrollVal <= 0 && isRevealed ) {
						toggle(0);
					}
					else if( scrollVal > 0 && !isRevealed ){
						toggle(1);
					}
				}

				function toggle( reveal ) {
					isAnimating = true;
					
					if( reveal ) {
						classie.add( container, 'modify' );
					}
					else {
						noscroll = true;
						disable_scroll();
						classie.remove( container, 'modify' );
					}

					// simulating the end of the transition:
					setTimeout( function() {
						isRevealed = !isRevealed;
						isAnimating = false;
						if( reveal ) {
							noscroll = false;
							enable_scroll();
						}
					}, 600 );
				}

				// refreshing the page...
				var pageScroll = scrollY();
				noscroll = pageScroll === 0;
				
				disable_scroll();
				
				if( pageScroll ) {
					isRevealed = true;
					classie.add( container, 'notrans' );
					classie.add( container, 'modify' );
				}
				
				window.addEventListener( 'scroll', scrollPage );
				trigger.addEventListener( 'click', function() { toggle( 'reveal' ); } );
			})();

			//scrippt for like button starts here


//like button functionality.
$('body').on("click",'.heart',function()
{




var rel =$(this).attr("rel");
var article_id = $('#hidden').text();
var profile_name = $('#data').text();
$.ajax({
type: "POST",
url: "like.php",
data: {'article_id': article_id , 'profile_name' : profile_name , 'rel' : rel},
cache: false,
success: function(data)
{

$("#likeCount").html(data);
if(rel === 'like') 
{
$('.heart').attr("rel","unlike"); 
$('.heart').addClass('heartAnimation');
$('.heart').css("background-position","right");



}
else
{
	if(rel ==='unlike')
$('.heart').attr("rel","like");
$('.heart').css("background-position","left");
$('.heart').removeClass('heartAnimation');

}
}
}); //ajax end

});//heart click end.


		</script>
	</body>
</html>