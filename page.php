<?php
session_start();
$pages = array('advertisements','advertisement','myadvertisements','myadvertisement','adviewers','addadvertisement','buyadvertisements','offers','statistics','getbalance','account','adveraccount','bankaccount','paypalemail','tree','referral');
$privs = array('0','0','1','1','1','1','1','0','0','0','0','1','0','0','0','0');
/*echo $_SESSION['uid'].'<br>';
echo '<br>'.$_COOKIE['uid'];*/
if(!isset($_SESSION['uid']) && isset($_GET['c'],$_COOKIE['uid']) && in_array($_GET['c'], $pages))
{
	$_SESSION['uid'] = $_COOKIE['uid'];
	$_SESSION['advertiser'] = $_COOKIE['advertiser'];
	header('Location: page.php?c='.$_GET['c']);
}
elseif(isset($_SESSION['uid'],$_GET['c']) && in_array($_GET['c'], $pages) && ($_SESSION['advertiser'] == $privs[array_search($_GET['c'],$pages)]))
{
if(isset($_SESSION['lang'])) $lang = $_SESSION['lang'];
else $lang = 'en';
include('languages/'.$lang.'.php');
include('develops/'.$_GET['c'].'.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>company banky</title>
<?php include('designs/head.php'); ?>
<script type="text/javascript" src="js/<?php echo $_GET['c']; ?>.js"></script>
<!-- start-smoth-scrolling -->
</head>
<body>
	<div class="<?php if($_GET['c'] != 'advertisement') echo 'psd'; ?>">
	<div class="<?php if($_GET['c'] != 'advertisement') echo 'container'; ?>">
		
		<!-- header -->
		<?php if($_GET['c'] != 'advertisement') { ?>
		<div class="header">
			<?php include('designs/header.php'); ?>
		</div>
		<?php } ?>
		<!-- //header -->
		
		<!-- body -->
		<div id="<?php echo $_GET['c']; ?>" class="<?php if($_GET['c'] != 'advertisement') echo 'work'; ?>">
			<?php if($_GET['c'] != 'advertisement') { ?>
			<?php 
				if($_SESSION['advertiser'] == 0) 
				{
					include("libs/config.php");
					include("libs/opendb.php");
					$query1 = mysql_query("select username,balance,totalreff from users where id = '".$_SESSION['uid']."'");
					$row = mysql_fetch_array($query1);
			?>
			<div class="buy row" style="text-align:center;">
				<div class="col-sm-4">
					<h4>User: <?php echo $row['username']; ?></h4>
				</div>
				<div class="col-sm-4">
					<h4>Balance: <?php echo $row['balance']; ?> EGP</h4>
				</div>
				<div class="col-sm-4">
					<h4>Total Referrals: <?php echo $row['totalreff']; ?></h4>
				</div>
			</div>
			<?php } ?>
			<?php } ?>
			<div class="buy row">
				<?php if($_GET['c'] != 'advertisement') { ?>
				<h3>
					<?php language($_GET['c']); ?>
				</h3>
				<?php } ?>
				<?php if($_GET['c'] != 'advertisement') { include('designs/sidebar.php'); ?>
				<div class="col-sm-8">
				<?php } else { ?>
				<div class="col-sm-12">
				<?php } ?>
					<?php include('designs/containers/'.$_GET['c'].'.php'); ?>
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
<?php } else header('Location: index.php'); ?>