<?php
session_start();
if(!isset($_SESSION['uid']) && isset($_COOKIE['uid']))
{
	$_SESSION['uid'] = $_COOKIE['uid'];
	$_SESSION['advertiser'] = $_COOKIE['advertiser'];
	header('Location: index.php');
}
	
include('libs/lang.php');
function login($myusername,$passw0rd,$rem)
{
	include("libs/config.php");
	include("libs/opendb.php");
	$passw0rd = hash('sha256', $passw0rd, FALSE);
	$query1 = mysql_query("select id,advertiser,active,count(*) as count from  users where username = '$myusername' and password = '$passw0rd'");
	$row = mysql_fetch_array($query1);
	if($row['count'] == 1)
	{
		if($row['active'] == 1)
		{
			if($rem)
			{
				setcookie('uid', $row['id'], time()+60*60*24*100, "");
				setcookie('advertiser', $row['advertiser'], time()+60*60*24*100, "");
				$_SESSION['uid'] = $row['id'];
				$_SESSION['advertiser'] = $row['advertiser'];
			}
			else
			{
				$_SESSION['uid'] = $row['id'];
				$_SESSION['advertiser'] = $row['advertiser'];
			}
			if($row['advertiser'] == '1') return 4;
			else return 1;
		}
		else return 2;
    }
	else return 0;
}
if(isset($_POST['loginsubmit'])) 
{
	unset($_POST['loginsubmit']);
	if($_POST['myusername'] != '' && $_POST['passw0rd'] != '')
	{
		if(isset($_POST['remember'])) { $rem = 1; unset($_POST['remember']); }
		else $rem = 0;
	
		$loginOp = login($_POST['myusername'],$_POST['passw0rd'],$rem);		
		if($loginOp == 1 && isset($_GET['c'])) echo header('location: pay_success.php?c='.$_GET['c']);
		//elseif($loginOp == 1) echo header('location: page.php?c=advertisements');
		elseif($loginOp == 1) echo "<script> window.location.href = 'page.php?c=advertisements'; </script>";
		elseif($loginOp == 4) echo "<script> window.location.href = 'page.php?c=myadvertisements'; </script>";
		elseif($loginOp == 0) header('Location: index.php?message=6');
		elseif($loginOp == 2) header('Location: index.php?message=7');
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>company banky</title>
<?php include('designs/head.php'); ?>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="js/jquery-1.11.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/registeren.js"></script>
<!-- start-smoth-scrolling -->
<?php //include('designs/heads/index.php'); ?>
<script language="JavaScript">
$(document).ready(function(){
    $('#wrongaccount').show(function(){
        $('#wrongaccount').append('<br><h4 style="color:red;text-align:center;"><?php language('wronglogin');?></h4>');
	});
});
$(document).ready(function(){
    $('#notactiveaccount').show(function(){
        $('#notactiveaccount').append('<br><h4 style="color:red;text-align:center;"><?php language('notactiveaccount');?></h4>');
	});
});
</script>
</head>	
<body>
	<div class="psd">
	<div class="container">
<!-- header -->
		<div class="header">
			<?php include('designs/header.php'); ?>
		</div>
<!-- //header -->
<!-- banner -->
	<div class="banner">
<!-- Slider-starts-Here -->
				<!--<script src="js/responsiveslides.min.js"></script>
				<script>
				    // You can also use "$(window).load(function() {"
				    $(function () {
				      // Slideshow 4
						$("#slider3").responsiveSlides({
						auto: true,
						pager: false,
						nav: true,
						speed: 500,
						namespace: "callbacks",
						before: function () {
						$('.events').append("<li>before event fired.</li>");
						},
						after: function () {
							$('.events').append("<li>after event fired.</li>");
						}
						});
					});
				</script>-->
			<!--//End-slider-script -->
			<div  id="top" class="callbacks_container wow fadeInUp" data-wow-delay="0.5s">
				<div class="col-sm-6">
					<div class="embed-responsive embed-responsive-4by3">
						<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/_dv155_BMs4" frameborder="0" allowfullscreen></iframe>							
					</div>
				<!--<ul class="rslides" id="slider3">
					<li>
						<div class="banner1">
							<div class="banner-info">
								<h3>SHOWCASE YOUR <span>WORK.</span></h3>
							</div>
						</div>
					</li>
					<li>
						<div class="banner2">
							<div class="banner-info">
								<h3>SHOWCASE YOUR <span>WEB</span></h3>
							</div>
						</div>
					</li>
					<li>
						<div class="banner1">
							<div class="banner-info">
								<h3>SHOWCASE YOUR <span>DESIGN.</span></h3>
							</div>
						</div>
					</li>
					<li>
						<div class="banner2">
							<div class="banner-info">
								<h3>SHOWCASE YOUR <span>WEB.</span></h3>
							</div>
						</div>
					</li>
				</ul>-->
				</div>
				<div class="col-sm-6">
<?php
	if(!isset($_SESSION['uid']) && !isset($_COOKIE['uid'])) include('designs/forms/login.php');
	elseif(isset($_SESSION['admin'])) echo '<div class="buy" style="min-height: 250px;"><a href="adminlogout.php" class="act4">LOGOUT</a></div>';
	else echo '<div class="buy" style="min-height: 250px;"><a href="logout.php" class="act4">LOGOUT</a></div>'
?>
				</div>
			</div>
	</div>
<!-- //banner -->
<!-- banner-bottom -->
	<div id="feature" class="banner-bottom">
		<div class="banner-bottom-grids">
			<div class="banner-bottom-grid">
				<div class="um-fig">
					<span> </span>
				</div>
				<div class="um-text">
					<h3>FOLD <span>PAPER.</span></h3>
					<p>A human being is a part of a whole, called by the magic and know universe.</p>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="banner-bottom-grid">
				<div class="t-fig">
					<span> </span>
				</div>
				<div class="um-text">
					<h3>TASTE <span>COFFEE.</span></h3>
					<p>A human being is a part of a whole, called by the magic and know universe.</p>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="banner-bottom-grids">
			<div class="banner-bottom-grid">
				<div class="toy-fig">
					<span> </span>
				</div>
				<div class="um-text">
					<h3>PLAY <span>HARD.</span></h3>
					<p>A human being is a part of a whole, called by the magic and know universe.</p>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="banner-bottom-grid">
				<div class="tie-fig">
					<span> </span>
				</div>
				<div class="um-text">
					<h3>WEAR <span>TIES.</span></h3>
					<p>A human being is a part of a whole, called by the magic and know universe.</p>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="banner-bottom-grids">
			<div class="banner-bottom-grid">
				<div class="arr-fig">
					<span> </span>
				</div>
				<div class="um-text">
					<h3>STRECH <span>THINGS.</span></h3>
					<p>A human being is a part of a whole, called by the magic and know universe.</p>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="banner-bottom-grid">
				<div class="graph-fig">
					<span> </span>
				</div>
				<div class="um-text">
					<h3>INCREASE <span>SALES.</span></h3>
					<p>A human being is a part of a whole, called by the magic and know universe.</p>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="banner-bottom-grids">
			<div class="banner-bottom-grid">
				<div class="box-fig">
					<span> </span>
				</div>
				<div class="um-text">
					<h3>MAXIMIZE <span>TASK.</span></h3>
					<p>A human being is a part of a whole, called by the magic and know universe.</p>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="banner-bottom-grid">
				<div class="rod-fig">
					<span> </span>
				</div>
				<div class="um-text">
					<h3>COMPLETE <span>JOB.</span></h3>
					<p>A human being is a part of a whole, called by the magic and know universe.</p>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="clearfix"> </div>
	</div>
<!-- //banner-bottom -->
<!-- work -->
	<div id="about" class="work">
		<div class="buy">
			<div class="buy-text">
				<h3>Hi there. I am a new theme, with attitude. I am also responsive and easy do edit. 
					Why don’t you try me ?</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque quis nulla vel
					dolor ultrices blandit nec sit amet. turpis it amet, consectetur adipiscing.</p>
			</div>
			<div class="buy-now">
				<a href="single.html" class="hvr-bounce-to-left">REGISTER Now!</a>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="line">
			<span> </span>
		</div>
		<div class="awesome">
			<div class="awesome-left">
				<h3>LATEST<span>OFFERS.</span></h3>
				<p>Too many of us look upon Americans as dollar chasers.
					This is a cruel libel, even if it is reiterated thoughtlessly.</p>
				<a href="single.html" class="hvr-bounce-to-left1">ALL OFFERS.</a>
			</div>
			<div class="awesome-right">
				<div class="awesome-right-grid">
					<a href="images/3-.jpg" class="b-link-stripe b-animate-go   swipebox"  title="">
						<img class="one" src="images/3.jpg" alt=" " title="Science Laboratory" />
						<div class="b-wrapper">
							<h2 class="b-animate b-from-left    b-delay03 ">
								<img class="img-responsive" src="images/plus.png" class="zoom" alt=""/>
							</h2>
						</div>
					</a>
					<h4>HAVING SOME LAUNCH</h4>
					<p>Webdesign // banky</p>				
					<div class="social">
						<ul>
							<li><a href="single.html" class="cam"> </a></li>
							<li><a href="single.html" class="gal"> </a></li>
							<li><a href="single.html" class="lin"> </a></li>
						</ul>
					</div>
				</div>
				<div class="awesome-right-grid">
					<a href="images/1-.jpg" class="b-link-stripe b-animate-go   swipebox"  title="">
						<img class="one" src="images/1.jpg" alt=" " title="Science Laboratory" />
						<div class="b-wrapper">
							<h2 class="b-animate b-from-left    b-delay03 ">
								<img class="img-responsive" src="images/plus.png" class="zoom" alt=""/>
							</h2>
						</div>
					</a>
					<h4>TAKE YOUR TIME AND RELAX</h4>
					<p>Webdesign // banky</p>				
					<div class="social">
						<ul>
							<li><a href="single.html" class="cam"> </a></li>
							<li><a href="single.html" class="gal"> </a></li>
							<li><a href="single.html" class="lin"> </a></li>
						</ul>
					</div>
				</div>
				<div class="awesome-right-grid">
					<a href="images/2-.jpg" class="b-link-stripe b-animate-go   swipebox"  title="">
						<img class="one" src="images/2.jpg" alt=" " title="Science Laboratory" />
						<div class="b-wrapper">
							<h2 class="b-animate b-from-left    b-delay03 ">
								<img class="img-responsive" src="images/plus.png" class="zoom" alt=""/>
							</h2>
						</div>
					</a>
					<h4>WIRES...WIRES EVERYWHERE</h4>
					<p>Webdesign // banky</p>				
					<div class="social">
						<ul>
							<li><a href="single.html" class="cam"> </a></li>
							<li><a href="single.html" class="gal"> </a></li>
							<li><a href="single.html" class="lin"> </a></li>
						</ul>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
	<link rel="stylesheet" href="css/swipebox.css">
				<script src="js/jquery.swipebox.min.js"></script> 
					<script type="text/javascript">
						jQuery(function($) {
							$(".swipebox").swipebox();
						});
					</script>
				<script type="text/javascript" src="js/jquery.mixitup.min.js"></script>
					<script type="text/javascript">
					$(function () {
						
						var filterList = {
						
							init: function () {
							
								// MixItUp plugin
								// http://mixitup.io
								$('#portfoliolist').mixitup({
									targetSelector: '.portfolio',
									filterSelector: '.filter',
									effects: ['fade'],
									easing: 'snap',
									// call the hover effect
									onMixEnd: filterList.hoverEffect()
								});				
							
							},	
							hoverEffect: function () {
							
								// Simple parallax effect
								$('#portfoliolist .portfolio').hover(
									function () {
										$(this).find('.label').stop().animate({bottom: 0}, 200, 'easeOutQuad');
										$(this).find('img').stop().animate({top: -30}, 500, 'easeOutQuad');				
									},
									function () {
										$(this).find('.label').stop().animate({bottom: -40}, 200, 'easeInQuad');
										$(this).find('img').stop().animate({top: 0}, 300, 'easeOutQuad');								
									}		
								);				

							}
				
						};		
						// Run the show!
						filterList.init();					
					});	
					</script>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //work -->
<!-- footer-top -->
	<div class="footer-top">
		<div class="footer-top-grid">
			<h3>ABOUT <span>banky</span></h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque 
				id arcu neque, at convallis est felis. 
				<span>Aliquam lacus ligula, consectetur vel egestas quis,
				tincidunt et massa. Mauris et lacus elit. Praesent hendrerit.</span></p>
		</div>
		<div class="footer-top-grid">
			<h3>THE <span>TAGS</span></h3>
			<div class="unorder">
				<ul class="tag2">
					<li><a href="#">awesome</a></li>
					<li><a href="#">strategy</a></li>
					<li><a href="#">development</a></li>
				</ul>
				<ul class="tag2">
					<li><a href="#">css</a></li>
					<li><a href="#">photoshop</a></li>
					<li><a href="#">banky</a></li>
					<li><a href="#">html</a></li>
				</ul>
				<ul class="tag2">
					<li><a href="#">awesome</a></li>
					<li><a href="#">strategy</a></li>
					<li><a href="#">development</a></li>
				</ul>
				<ul class="tag2">
					<li><a href="#">css</a></li>
					<li><a href="#">photoshop</a></li>
					<li><a href="#">banky</a></li>
					<li><a href="#">html</a></li>
				</ul>
				<ul class="tag2">
					<li><a href="#">awesome</a></li>
					<li><a href="#">strategy</a></li>
					<li><a href="#">development</a></li>
				</ul>
			</div>
		</div>
		<div class="footer-top-grid">
			<h3>LATEST <span>TWEETS</span></h3>
			<ul class="twi">
				<li>I like this awesome freebie. Check it out <a href="mailto:info@example.com" class="mail">
				@http://t.co/9vslJFpW</a> <span>ABOUT 15 MINS</span></li>
				<li>I like this awesome freebie. You can view it online here<a href="mailto:info@example.com" class="mail">
				@http://t.co/9vslJFpW</a> <span>ABOUT 2 HOURS AGO</span></li>
			</ul>
		</div>
		<div class="footer-top-grid">
			<h3>Best <span>member</span></h3>
			<div class="flickr-grids">
				<div class="flickr-grid">
					<img src="images/15.png" alt=" " title="CEO" />
				</div>
				<div class="flickr-grid">
					<img src="images/16.png" alt=" " title="GM" />
				</div>
				<div class="flickr-grid">
					<img src="images/17.png" alt=" " title="CEO" />
				</div>
				<div class="clearfix"> </div>
				
				<div class="flickr-grid">
					<img src="images/16.png" alt=" " title="GM" />
				</div>
				<div class="flickr-grid">
					<img src="images/17.png" alt=" " title="CEO" />
				</div>
				<div class="flickr-grid">
					<img src="images/15.png" alt=" " title="GM" />
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="clearfix"> </div>
	</div>
<!-- //footer-top -->
<!-- footer -->
	<div class="footer">
		<?php include('designs/footer.php'); ?>
	</div>
<!-- //footer -->
	</div>
	</div>
<!-- here stars scrolling icon -->
	<script type="text/javascript">
									$(document).ready(function() {
										/*
										var defaults = {
								  			containerID: 'toTop', // fading element id
											containerHoverID: 'toTopHover', // fading element hover id
											scrollSpeed: 1200,
											easingType: 'linear' 
								 		};
										*/
										
										$().UItoTop({ easingType: 'easeOutQuart' });
										
									});
	</script>
<!-- //here ends scrolling icon -->
</body>
</html>