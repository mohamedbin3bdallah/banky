<?php

function checkUserTaskAd($table,$where)
{
	include("libs/config.php");
	include("libs/opendb.php");	
	$result = mysql_query("select count(*) as count from {$table} $where");
	$row = mysql_fetch_array($result);
	include("libs/closedb.php");
	return $row['count'];
}

function addAdView($where,$adid,$uid)
{
	include("libs/config.php");
	include("libs/opendb.php");
	$date = date('Y-m-d');
	$time = time();
	$stmt = mysql_query("update viewadvertisements set date = '$date' , time = '$time' ,viewad = '1' $where");
	if($stmt)
	{
		$stmt1 = mysql_query("update advertisements set views = views+1 where id = '$adid'");
		
		$result = mysql_query("select pay from plans inner join userpayads on plans.id = userpayads.planid inner join advertisements on userpayads.id = advertisements.plan where advertisements.id = '$adid'");
		$row = mysql_fetch_array($result);
		$balance = $row['pay'];
		
		$stmt2 = mysql_query("update users set balance = balance+$balance,total = total+$balance,clicks = clicks+1 where id = '$uid'");
	}
	include("libs/closedb.php");
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
			$allrows[$i] = $row;
		}
	}
	include("libs/closedb.php");
	return $allrows;
}

?>