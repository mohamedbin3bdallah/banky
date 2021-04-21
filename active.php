<?php
if(isset($_GET['code'],$_GET['email']) && $_GET['code'] != '')
{
	$code = $_GET['code'];
	$email = $_GET['email'];
	include("libs/config.php");
	include("libs/opendb.php");
	$result = mysql_query("select * , count(*) as count from users where email = '$email'");
	$row = mysql_fetch_array($result);
	//print_r($row);
	if($row['count'] == 1)
	{
		if($row['code'] == $code && $row['active'] == 0)
		{
			$stmt = mysql_query("update users set active = '1',code = '' where code = '$code' and email = '$email' and active = 0");
			if($stmt) $message = 1;
			else $message = 0;
		}
		elseif($row['active'] == 1) $message = 3;
		elseif($row['code'] != $code) $message = 4;
		else $message = 5;
	}
	else $message = 2;
	include("libs/closedb.php");
	header('Location: index.php?message='.$message);
}
?>