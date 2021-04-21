<?php
session_start();
if(isset($_SESSION['uid'],$_GET['c']) && ($_GET['c'] != 0 || $_GET['c'] != ''))
{
if(isset($_SESSION['lang'])) $lang = $_SESSION['lang'];
else $lang = 'en';
include('languages/'.$lang.'.php');
include('develops/pay_success.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Banky Success Pay</title>
<?php include('designs/head.php'); ?>
<script type="text/javascript" src="js/pay_success.js"></script>
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
		
		<!-- body -->
		<div id="pay_success" class="work">
			<div class="buy" style="min-height: 750px;">
				<h3>
					<?php language(' '); ?>
				</h3>
				<?php include('designs/sidebar.php'); ?>
				<div class="col-sm-8">
					<?php include('designs/containers/pay_success.php'); ?>
				</div>
			</div>
		</div>
		<!-- //body -->
		
		<!-- footer -->
		<div class="footer">
			<?php include('designs/footer.php'); ?>
		</div>
		<!-- //footer -->
		
	</div>
	</div>
</body>
</html>
<?php } else header('Location: login.php?c='.$_GET['c']); ?>