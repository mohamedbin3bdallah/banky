<?php
if(isset($_POST['id']))
{	
	$id = $_POST['id'];
	include("../libs/config.php");
	include("../libs/opendb.php");
	$stmt = mysql_query("delete from admins where id = '$id'");
	if($stmt) echo 1;
	else echo 'Somthing Wrong';
	include("../libs/closedb.php");
   exit;
}
?>