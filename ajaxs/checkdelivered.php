<?php
if(isset($_POST['id']))
{	
	$id = $_POST['id'];
	$time = time();
	include("../libs/config.php");
	include("../libs/opendb.php");	
	$stmt = mysql_query("update deliveries set delivered = 1 , dtime = '$time' where id = '$id'");
	if($stmt) echo 1;	
	else echo 0;
	include("../libs/closedb.php");
   exit;
}
?>