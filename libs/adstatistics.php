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

function getNoOfAllUserAdTasks($select,$where)
{
	include("libs/config.php");
	include("libs/opendb.php");
	$allrows = array();
	//$result = $dbh->query("select date,count(*) as count from viewadvertisements $where");
	$result = mysql_query("select $select,count(viewadvertisements.id) as count,plans.id as id,plans.title as title,plans.pay as pay from viewadvertisements inner join advertisements on viewadvertisements.adid = advertisements.id inner join userpayads on advertisements.plan = userpayads.id inner join plans on userpayads.planid = plans.id $where");
	for($i=0;$row = mysql_fetch_array($result);$i++)
	{
		$allrows['title'][$row['id']] = $row['title'];
		/*$allrows['rows'][$row['date']][$row['id']]['id'] = $row['id'];
		$allrows['rows'][$row['date']][$row['id']]['date'] = $row['date'];*/
		$allrows['rows'][$row['date']][$row['id']]['count'] = $row['count'];
		$allrows['rows'][$row['date']][$row['id']]['pay'] = $row['pay']*$row['count'];
	}
	include("libs/closedb.php");
	return $allrows;
}

?>