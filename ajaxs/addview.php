<?php
session_start();
if(isset($_POST['adid'],$_POST['viewid']))
{	
	$uid = $_SESSION['uid'];
	$adid = $_POST['adid'];
	$viewid = $_POST['viewid'];
	$where = 'where viewad = 0 and id = '.$viewid.' and uid = '.$uid;
	include("../libs/config.php");
	include("../libs/opendb.php");
	$date = date('Y-m-d');
	$time = time();
	$stmt = mysql_query("update viewadvertisements set date = '$date' , time = '$time' ,viewad = '1' $where");
	if($stmt)
	{
		$stmt1 = mysql_query("update advertisements set views = views+1 where id = '$adid'");
		
		$result = mysql_query("select pay from plans inner join userpayads on plans.id = userpayads.planid inner join advertisements on userpayads.id = advertisements.plan where advertisements.id = '$adid'");
		$row = mysql_fetch_array($result);
		$balance = $row['pay'];
		
		/*$result2 = mysql_query("select rearray from users where id = '$uid'");
		$row2 = mysql_fetch_array($result2);
		if(isset($row2['rearray']) && $row2['rearray'] != '')
		{
			$result4 = mysql_query("select id,repay,refpayendtime from users where id in (".$row2['rearray'].")");
			$allrows = array();
			if(!empty($result4))
			{
				for($i=0; $row4 = mysql_fetch_array($result4); $i++)
				{
					if($i==0 && substr_count($row2['rearray'],',') == 3)
					{
						if($row4['repay'] == '1' && $row4['refpayendtime'] != '') { mysql_query("update users set balance = balance+$balance,total = total+$balance where id = '".$row4['id']."'"); }
						else {}
					}
					else
					{
						mysql_query("update users set balance = balance+$balance,total = total+$balance where id = '".$row4['id']."'");
					}
				}
			}	
		}*/
		
		$stmt2 = mysql_query("update users set daybalance = ROUND(daybalance+$balance,2),balance = ROUND(balance+$balance,2),total = ROUND(total+$balance,2),clicks = clicks+1 where id = '$uid'");
		if($stmt2) echo 'Done';
		else echo 'SORRY';
	}
	else echo 'SORRY';
	include("../libs/closedb.php");
   exit;
}
?>