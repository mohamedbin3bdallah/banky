<?php
session_start();
if(!isset($_SESSION['uid']))
{
	include('libs/lang.php');
function login($myusername,$passw0rd)
{
	include("libs/config.php");
	include("libs/opendb.php");
	$passw0rd = hash('sha256', $passw0rd, FALSE);
	$query1 = mysql_query("select id,advertiser,active,count(*) as count from  users where username = '$myusername' and password = '$passw0rd'");
	$row = mysql_fetch_array($result);
	if($row['count'] == 1)
	{
		if($row['active'] == 1)
		{
			$_SESSION['uid'] = $row['id'];
			$_SESSION['advertiser'] = $row['advertiser'];
			return 1;
		}
		else return 2;
    }
	else return 0;
}
	//include('develops/register.php');
	/*if($lang_file == "ar")
	echo '<html xml:lang="ar" lang="ar" dir=rtl xmlns="http://www.w3.org/1999/xhtml">';*/
?>
<!DOCTYPE html>
<html lang="en" >
<head>
<title>banky Login</title>
<?php include('designs/head.php'); ?>
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

		<!-- body -->
		<div id="login-form" class="work">
		<?php
			include('designs/forms/login.php');
		?>
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
<?php } else echo header('location: page.php?c=advertisements'); ?>