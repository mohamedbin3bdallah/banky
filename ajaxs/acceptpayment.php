<?php
if(isset($_POST['id'],$_POST['user'],$_POST['number']))
{	
	$id = $_POST['id'];
	$user = $_POST['user'];
	$number = $_POST['number'];
	include("../libs/config.php");
	include("../libs/opendb.php");	
	$stmt = mysql_query("update userpayads set payed = 1 where id = '$id'");
	if($stmt)
	{
		$stmt1 = mysql_query("update users set addads = addads+$number where id = '$user'");
		if($stmt1) echo 1;
		else echo 0;
	}
	else echo 0;
	include("../libs/closedb.php");
   exit;
}
?>