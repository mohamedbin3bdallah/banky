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

function checkAddAdsByUser($uid)
{
	include("libs/config.php");
	include("libs/opendb.php");	
	$result = mysql_query("select addads from users where id = '$uid'");
	$row = mysql_fetch_array($result);
	include("libs/closedb.php");
	return $row['addads'];
}

function deleterow($table,$where)
{
	include("libs/config.php");
	include("libs/opendb.php");	
	$stmt = mysql_query("delete from {$table} $where");
	if($stmt) return 1;
	else return 0;
}
?>