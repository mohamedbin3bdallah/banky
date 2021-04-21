<?php
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

function update($table,$set,$where)
{
	include("libs/config.php");
	include("libs/opendb.php");	
	$stmt = mysql_query("update {$table} $set $where");
	include("libs/closedb.php");
}

$data = getAllDataFromTable('users',' where refpayendtime <> '' and refpayendtime < '.time(),'');
if(!empty($data))
{
	for($u=0;$u<count($data);$u++)
	{
		update('users',' set repay = 0 , refpayendtime = ""',' where id = '.$data[$u]['id']);
	}
}
?>