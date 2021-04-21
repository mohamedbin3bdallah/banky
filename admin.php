<?php
session_start();
$pages = array('adspagead','system','users','user','plans','adstatistics','balances','adaccpayment','search','adoffers','adaccount','adadvertisement','adadvertisements','adaddadvertisement','adbuyadvertisements','adadviewers');
if(isset($_SESSION['admin'],$_GET['c']) && in_array($_GET['c'], $pages))
{
if(isset($_SESSION['lang'])) $lang = $_SESSION['lang'];
else $lang = 'en';
include('languages/'.$lang.'.php');
include('develops/'.$_GET['c'].'.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Banky Admin</title>
<?php include('designs/head.php'); ?>
<script type="text/javascript" src="js/<?php echo $_GET['c']; ?>.js"></script>
<!-- start-smoth-scrolling -->
</head>
<body>
	<div class="psd">
	<div class="container">
		
		<!-- body -->
		<div id="<?php echo $_GET['c']; ?>" class="">
			<div class="buy row">
				<h3>
					<?php language($_GET['c']); ?>
				</h3>
				<?php include('designs/adminsidebar.php'); ?>
				<div class="col-sm-8">
					<?php include('designs/containers/'.$_GET['c'].'.php'); ?>
				</div>
			</div>
		</div>
		<!-- //body -->
		
	</div>
	</div>
</body>
</html>
<?php } else header('Location: index.php'); ?>