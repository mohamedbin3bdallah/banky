<?php

function getRowFromTable($cols,$table,$where,$limit)
{
	include("libs/config.php");
	include("libs/opendb.php");
	$result = mysql_query("select $cols from {$table} $where $limit");
	if(!empty($result))
	{
		$row = mysql_fetch_array($result);
	}
	include("libs/closedb.php");
	return $row;
}

function getClickkAndBalanceByUser($uid)
{
	include("libs/config.php");
	include("libs/opendb.php");	
	$result = mysql_query("select rearray,repay,refpayendtime,clicks,balance from users where id = '$uid'");
	$row = mysql_fetch_array($result);
	include("libs/closedb.php");
	return $row;
}

function getNoOfAllUserAdTasks($where)
{
	include("libs/config.php");
	include("libs/opendb.php");
	$allrows = array();
	//$result = $dbh->query("select date,count(*) as count from viewadvertisements $where");
	$result = mysql_query("select viewadvertisements.date as date,count(viewadvertisements.id) as count,plans.id as id,plans.title as title from viewadvertisements inner join advertisements on viewadvertisements.adid = advertisements.id inner join userpayads on advertisements.plan = userpayads.id inner join plans on userpayads.planid = plans.id $where");
	for($i=0;$row = mysql_fetch_array($result);$i++)
	{
		$allrows['title'][$row['id']] = $row['title'];
		/*$allrows['rows'][$row['date']][$row['id']]['id'] = $row['id'];
		$allrows['rows'][$row['date']][$row['id']]['date'] = $row['date'];*/
		$allrows['rows'][$row['date']][$row['id']] = $row['count'];
	}
	include("libs/closedb.php");
	return $allrows;
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
	//include("libs/closedb.php");
}

function getAllDataFromTable($select,$table,$where,$limit)
{
	include("libs/config.php");
	include("libs/opendb.php");
	$result = mysql_query("select $select from {$table} $where $limit");
	$allrows = array();	
	if(!empty($result))
	{
		for($i=0; $row = mysql_fetch_array($result); $i++)
		{
			$allrows[$i] = $row['username'];
		}
	}
	include("libs/closedb.php");
	return $allrows;
}

?>