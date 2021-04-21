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

?>