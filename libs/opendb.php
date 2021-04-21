<?php
$connect = mysql_connect($server, $usrnm, $pwd);
if (!$connect)
{
	die('Could not connect: ' . mysql_error());
}
mysql_set_charset('utf8',$connect);
mysql_select_db($db, $connect) or die('Could not select database.');
?>