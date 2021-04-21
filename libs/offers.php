<?php

function getNoOfRowsFromTable($table,$where)
{
	include("libs/config.php");
	include("libs/opendb.php");
	$row['count'] = 0;
	$result = mysql_query("select count(*) as count from {$table} $where");
	if(!empty($result)) $row = mysql_fetch_array($result);
	include("libs/closedb.php");
	return $row['count'];
}

function getUsernameFromID($table,$id)
{
	include("libs/config.php");
	include("libs/opendb.php");
	$result = mysql_query("select username from {$table} where id = '$id'");
	$row = mysql_fetch_array($result);
	include("libs/closedb.php");
	return $row['username'];
}

function getAllDataFromTable($table,$where,$limit)
{
	include("libs/config.php");
	include("libs/opendb.php");
	$result = mysql_query("select * from {$table} $where $limit");
	$allrows = array();	
	if(!empty($result))
	{
		for($i=0; $row = mysql_fetch_array($result); $i++)
		{
			$allrows[$i] = $row;
		}
	}
	include("libs/closedb.php");
	return $allrows;
}

?>