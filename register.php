<?php
session_start();
if(isset($_SESSION['uid']) || isset($_COOKIE['uid'])) header('Location: index.php');
else
{
if(isset($_SESSION['lang'])) $lang = $_SESSION['lang'];
else $lang = 'en';
include('languages/'.$lang.'.php');
include('develops/register.php');
$scode = randomCode(5);
?>
<!DOCTYPE html>
<html>
<head>
<title>banky Register</title>
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
				<?php language('registration'); ?>
			</h3>
			<div class="col-md-6 col-md-offset-3">
				<form class="form-horizontal" action="" method="POST" autocomplete="off">
				<?php
					if(isset($_GET['message']) && $_GET['message'] == 1) echo '<h2 style="text-align:center; color: green;">Please Check Your Email For Confirmation (Check Junk Mail)</h2>'; 
					elseif(isset($_GET['message']) && $_GET['message'] == 0) echo '<h2 style="text-align:center; color: red;">Somthing Wrong</h2>'; 
					elseif(isset($_GET['message']) && $_GET['message'] == 2) echo '<h2 style="text-align:center; color: red;">Email is invalid</h2>'; 
					elseif(isset($_GET['message']) && $_GET['message'] == 3) echo '<h2 style="text-align:center; color: red;">Username is invalid</h2>'; 
				?>
					<div class="form-group">
						<label for="Username" class="col-sm-2 control-label"><?php language('username'); ?></label>
						<div class="col-sm-10">
							<input type="text" name="username" id="username" class="form-control" id="inputEmail3" placeholder="<?php language('username'); ?>">
							<div id="username-validation"></div>
							<input type="hidden" name="username-hidden" id="username-hidden" value="0">
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label"><?php language('password'); ?></label>
						<div class="col-sm-10">
							<input type="password" name="password" id="password" class="form-control" id="inputEmail3" placeholder="<?php language('password'); ?>">
							<div id="password-validation"></div>
							<input type="hidden" name="password-hidden" id="password-hidden" value="0">
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label"><?php language('cmfpassword'); ?></label>
						<div class="col-sm-10">
							<input type="password" name="cmfpassword" id="cmfpassword" class="form-control" id="inputEmail3" placeholder="<?php language('cmfpassword'); ?>">
							<div id="cmfpassword-validation"></div>
							<input type="hidden" name="cmfpassword-hidden" id="cmfpassword-hidden" value="0">
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-2 control-label"><?php language('email'); ?></label>
						<div class="col-sm-10">
							<input type="email" name="email" id="email" class="form-control" id="inputEmail3" placeholder="<?php language('email'); ?>">
							<div id="email-validation"></div>
							<input type="hidden" name="email-hidden" id="email-hidden" value="0">
						</div>
					</div>
					<div class="form-group">
					<label for="birthdate" class="col-sm-2 control-label"><?php language('birthdate'); ?></label>
						<div class="col-sm-10" id="jsadvertisement">
							<input type="date" class="form-control" name="birthdate" id="birthdate" placeholder="<?php language("birthdate"); ?>" required/>
							<div id="birthdate-validation"></div>
							<input type="hidden" name="birthdate-hidden" id="birthdate-hidden" value="0">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						<div class="checkbox">
							<label>
								<input type="checkbox" name="advertiser" id="advertiser" ><?php language('advertiser'); ?>
							</label>
						</div>
						</div>
					</div>
					<div class="form-group">
						<label for="referral" class="col-sm-2 control-label"><?php language('referral'); ?></label>
						<div class="col-sm-10">
							<input type="text" name="referral" id="referral" class="form-control" id="inputEmail3" value="<?php if(isset($_GET['referral']) && $_GET['referral'] != '') echo $_GET['referral']; ?>" placeholder="<?php language('referral'); ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="paypalemail" class="col-sm-2 control-label"><?php //language('valcode'); ?></label>
						<div class="col-sm-5">
							<input type="text" name="valcode" id="valcode" class="form-control" id="inputPassword3" placeholder="<?php //language('valcode'); ?>">
							<div id="valcode-validation"></div>
							<input type="hidden" name="valcode-hidden" id="valcode-hidden" value="0">
						</div>
						<div class="col-sm-5">
							<div id="scode" value="<?php echo $scode; ?>" style="height:30px; width:85px; text-align:center; line-height: 30px; background-color: #D3D3D3;"><?php echo $scode; ?></div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						<div class="checkbox">
							<label>
								<input type="checkbox" name="checkterms" id="checkterms" required ><?php language('acceptterms'); ?>
							</label>
						</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" name="registersubmit" id="registersubmit" class="btn btn-default" disabled><?php language('register'); ?></button>
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
<?php } ?>