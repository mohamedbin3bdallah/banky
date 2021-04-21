<?php
include('libs/statistics.php');
if(isset($_GET['type']) && $_GET['type'] != ' ')
{
	$level4types = array(30=>10, 60=>20, 90=>30);
	if(array_key_exists($_GET['type'], $level4types) && in_array($level4types[$_GET['type']],$level4types))
	{
		if(exist('users','where repay = 0 and balance >= '.$level4types[$_GET['type']].' and id = '.$_SESSION['uid']))
		{
			$time = strtotime(date('Y-m-d',time()))+(60*60*24*$_GET['type']);
			if(update('users','set repay = 1 , refpayendtime = '.$time.' , balance = ROUND(balance-'.$level4types[$_GET['type']].',2)','where id = '.$_SESSION['uid'])) header('Location: page.php?c=statistics&message=m1');
			else header('Location: page.php?c=statistics&message=m2');
		}
		else header('Location: page.php?c=statistics&message=m20');
	}
	else header('Location: page.php?c=statistics&message=m19');
}
?>