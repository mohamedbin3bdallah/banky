<?php

function getRowFromTable($table,$where,$limit)
{
	include("libs/config.php");
	include("libs/opendb.php");
	$result = mysql_query("select * from {$table} $where $limit");
	if(!empty($result))
	{
		$row = mysql_fetch_array($result);
	}
	include("libs/closedb.php");
	return $row;
}

function exist($table,$where)
{
	include("libs/config.php");
	include("libs/opendb.php");
	$result = mysql_query("select id from {$table} $where");
	$row = mysql_fetch_array($result);
	include("libs/closedb.php");
	if(empty($row)) return 0;
	else return 1;
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