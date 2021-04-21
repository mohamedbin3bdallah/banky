<?php
session_start();
if(isset($_SESSION['lang'])) $lang = $_SESSION['lang'];
else $lang = 'en';
include('languages/'.$lang.'.php');
include('develops/forgotpassword.php');
//$scode = randomCode(5);
?>
<!DOCTYPE html>
<html>
<head>
<title>banky Forgot Password</title>
<?php include('designs/head.php'); ?>
<script type="text/javascript" src="js/registeren.js"></script>
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
		<div id="register-form" class="work">
		<div class="buy row">
			<h3>
				<?php echo 'Forgot Password'; ?>
			</h3>
			<div class="col-md-6 col-md-offset-3">
				<form class="form-horizontal" action="" method="POST" autocomplete="off">
				<?php
					if(isset($_GET['message']) && $_GET['message'] == 1) echo '<h2 style="text-align:center; color: red;">Please Enter your Email Correctly</h2>'; 
					elseif(isset($_GET['message']) && $_GET['message'] == 2) echo '<h2 style="text-align:center; color: green;">Please Check your Email for the New Password</h2>'; 
					elseif(isset($_GET['message']) && $_GET['message'] == 3) echo '<h2 style="text-align:center; color: red;">Somthing Wrong</h2>'; 
					elseif(isset($_GET['message']) && $_GET['message'] == 4) echo '<h2 style="text-align:center; color: red;">Invalid Email</h2>'; 
				?>
					<div class="form-group">
						<label for="email" class="col-sm-2 control-label"><?php language('email'); ?></label>
						<div class="col-sm-10">
							<input type="text" name="email" class="form-control" placeholder="<?php language('email'); ?>" required>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" name="submit" id="submit" class="btn btn-default"><?php language('send'); ?></button>
						</div>
					</div>
				</form>
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