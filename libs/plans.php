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

function getRowFromTable($table,$where,$limit)
{
	include("libs/config.php");
	include("libs/opendb.php");
	$result = mysql_query("select * from {$table} $where $limit");
	$row = mysql_fetch_array($result);
	include("libs/closedb.php");
	return $row;
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

function insertRow($table,$row)
{
	include("libs/config.php");
	include("libs/opendb.php");
	$fquery = "insert into {$table} (";
	$lquery = " values (";
	foreach ($row as $key => $value)
	{
		$fquery .= $key;
		$lquery .= "'".$value."'";
		$data  = array_keys($row);
		$lastkey = array_pop($data);
		if($key != $lastkey) 
		{	
			$fquery .= ",";
			$lquery .= ",";
		}	
	}
	$fquery .= ")";
	$lquery .= ")";
	$query = $fquery.$lquery;
	$result = mysql_query($query);
	if($result) return 1;
	else return 0;
    /*include("libs/closedb.php");
	unset($data,$lastkey,$row,$fquery,$lquery,$query,$result);*/
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