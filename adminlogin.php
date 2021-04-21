<?php
session_start();
if(!isset($_SESSION['admin']))
{
	include('libs/lang.php');
function login($myusername,$passw0rd)
{
	include("libs/config.php");
	include("libs/opendb.php");
	$passw0rd = hash('sha256', $passw0rd, FALSE);
	$query1 = mysql_query("select id,super from  admins where username = '$myusername' and password = '$passw0rd' and active = 1");
	$row = mysql_fetch_array($query1);
	if(!empty($row))
	{
		$_SESSION['admin'] = $row['id'];
		$_SESSION['super'] = $row['super'];
		return 1;
    }
	else return 0;
}

if(isset($_POST['loginsubmit'])) 
{
	unset($_POST['loginsubmit']);
	if($_POST['myusername'] != '' && $_POST['passw0rd'] != '')
	{
		$loginOp = login($_POST['myusername'],$_POST['passw0rd']);		
		if($loginOp == 1) echo header('location: admin.php?c=adstatistics');
		elseif($loginOp == 0) echo '<div id="wrongaccount"></div>';
	}
}
	//include('develops/register.php');
	/*if($lang_file == "ar")
	echo '<html xml:lang="ar" lang="ar" dir=rtl xmlns="http://www.w3.org/1999/xhtml">';*/
?>
<!DOCTYPE html>
<html lang="en" >
<head>
<?php include('designs/head.php'); ?>
<script type="text/javascript" src="js/registeren.js"></script>
<script language="JavaScript">
$(document).ready(function(){
    $('#wrongaccount').show(function(){
        $('#wrongaccount').append('<br><h4 style="color:red;text-align:center;"><?php language('wronglogin');?></h4>');
	});
});
</script>
</head>
<body>
<div class="psd">
<div class="container">
<?php 
include('designs/headers/index.php');
?>
</div>
</div>
</body>
</html>
<?php } else echo header('location: admin.php?c=adstatistics'); ?>