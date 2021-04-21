<?php

function getNoOfAllUserAdTasks($where)
{
	include("libs/config.php");
	include("libs/opendb.php");	
	$result = mysql_query("select count(*) as count from viewadvertisements inner join advertisements on viewadvertisements.adid = advertisements.id inner join userpayads on advertisements.plan = userpayads.id $where");
	$row = mysql_fetch_array($result);
	include("libs/closedb.php");
	return $row['count'];
}

function getAllUserAdTasks($where,$limit)
{
	include("libs/config.php");
	include("libs/opendb.php");
	$result = mysql_query("select viewadvertisements.id as viewid,viewadvertisements.viewad as viewad,advertisements.id as id,advertisements.title as title,advertisements.description as description,userpayads.title as plan from viewadvertisements inner join advertisements on viewadvertisements.adid = advertisements.id inner join userpayads on advertisements.plan = userpayads.id $where $limit");
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

function exist($table,$where)
{
	include("libs/config.php");
	include("libs/opendb.php");
	$result = mysql_query("select count(id) as count from {$table} $where");
	$row = mysql_fetch_array($result);
	include("libs/closedb.php");
	if(isset($row['count']) && $row['count'] > 0) return 1;
	else return 0;
}

?>