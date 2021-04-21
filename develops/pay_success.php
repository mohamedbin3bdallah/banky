<?php
include('libs/pay_success.php');

if(isset($_SESSION['uid'],$_GET['c']))
{
	$arr = getAllDataFromTable('userpayads',' where payed = 0 and id = '.$_GET['c'].' and uid = '.$_SESSION['uid'],'');
	if(!empty($arr))
	{
		$adnumber = $arr[0]['adnumber'];
		if(update('userpayads',' set payed = 1 ',' where id = '.$_GET['c'].' and uid = '.$_SESSION['uid']))	update('users',' set addads = addads+'.$adnumber,' where id = '.$_SESSION['uid']);
	}
}
header('Location: ?c=profile');