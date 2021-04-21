<?php

function getAllDataFromTable($cols,$table,$where,$limit)
{
	include("libs/config.php");
	include("libs/opendb.php");
	$result = mysql_query("select $cols from {$table} $where $limit");
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

function getRow($table,$fields,$where)
{
	include("libs/config.php");
	include("libs/opendb.php");
	$result = mysql_query("select $fields from {$table} $where");
	$row = mysql_fetch_array($result);
	include("libs/closedb.php");
	if(empty($row)) return 0;
	else return $row;
}

?>