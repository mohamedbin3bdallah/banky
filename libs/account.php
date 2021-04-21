<?php

function getUserByID($uid)
{
	include("libs/config.php");
	include("libs/opendb.php");
	$result = mysql_query("select email,bankaccount,paypalemail from users where id = '$uid'");
	$row = mysql_fetch_array($result);	
	include("libs/closedb.php");
	return $row;
}

function update($table,$set,$where)
{
	include("libs/config.php");
	include("libs/opendb.php");	
	$stmt = mysql_query("update {$table} $set $where");
	if($stmt) return 1;
	else return 0;
	include("libs/closedb.php");
}

?>