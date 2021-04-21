<?php
session_start();
if(isset($_SESSION['uid']))
{
if(isset($_SESSION['lang'])) $lang = $_SESSION['lang'];
else $lang = 'en';
include('languages/'.$lang.'.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Banky Cancel Pay</title>
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
	<div id="pay_cancel" class="work">
		<div class="buy" style="min-height: 750px;">
			<h3>
				<?php language(' '); ?>
			</h3>
			<?php include('designs/sidebar.php'); ?>
			<div class="col-sm-8">
				<?php include('designs/containers/pay_cancel.php'); ?>
			</div>
		</div>
	</div>
<!-- //contact -->

<!-- footer -->
	<div class="footer">
		<?php include('designs/footer.php'); ?>
	</div>
<!-- //footer -->

	</div>
	</div>
</body>
</html>
<?php } else header('Location: login.php?'); ?>