<?php
session_start();
if(isset($_SESSION['lang'])) $lang = $_SESSION['lang'];
else $lang = 'en';
include('languages/'.$lang.'.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Banky Contact</title>
<?php include('designs/head.php'); ?>
<!-- start-smoth-scrolling -->
</head>
	
<body>
	<div class="psd">
	<div class="container">
<!-- header -->
		<div class="header">
			<?php include('designs/header.php'); ?>
		</div>
<!-- //header -->
<!-- contact -->
	<div class="contact">
		<h3>HOW TO FIND US</h3>
		<div class="car">
			<span> </span>
		</div>
		<!--<div class="map">
			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3672.1128867728276!2d72.558466!3d23.019626999999996!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e84fc8c21ce9f%3A0xff8f15bb6f07fe29!2sWorld+Business+House!5e0!3m2!1sen!2sin!4v1429268030186" frameborder="0" style="border:0"></iframe>
		</div>-->
		<div class="paragraph">
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. 
			Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. 
			Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus 
			et magnis dis parturient montes, nascetur ridiculus mus. Nulla dui.
			Fusce feugiat malesuada odio. Morbi nunc odio, gravida at, cursus nec, 
			luctus a, lorem. Maecenas tristique orci ac sem. Duis ultricies pharetra magna. 
			Donec accumsan malesuada orci. Donec sit amet eros. Lorem ipsum dolor sit amet, 
			consectetuer adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leo. 
			Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi
			et urna. Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante eu lacus.</p>
		</div>
		<div class="contact-grids">
			<div class="contact-grid">
				<h4>LOCATION</h4>
				<p class="dot">8901 MARMORA ROAD,
					<span>GLASGOW, DO4 89GR.</span>
			</div>
			<div class="contact-grid">
				<h4>CONTACT INFO</h4>
				<p class="phone">+9100 2478 0954.
					<span>+9100 2478 7854.</span>
			</div>
			<div class="contact-grid">
				<h4>MAIL US</h4>
				<p class="message"><a href="mailto:info@example.com">@http://t.co/9vslJFpW</a></p>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<div class="contact-form">
		<h3>CONTCT FORM</h3>
		<div class="mes-fig">
			<span> </span>
		</div>
		<?php if(isset($_GET['message'])) { echo '<center style="color: red;"><h4>'; language($_GET['message']); echo '</h4></center>'; } ?>
		<form action="develops/message.php" method="POST">
			<input type="text" name="name" placeholder="Name" required=" ">
			<input type="email" name="email" placeholder="Email" required=" ">
			<input type="text" name="subject" placeholder="Subject" required=" ">
			<div class="clearfix"> </div>
			<textarea name="message" placeholder="Message" required=" "></textarea>
			<input type="submit" name="sendmessage" value="SEND">
		</form>
	</div>
<!-- //contact -->
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