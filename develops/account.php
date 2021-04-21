<?php
include('libs/account.php');
$user = getUserByID($_SESSION['uid']);

if(isset($_POST['settingssubmit']))
{
	unset($_POST['settingssubmit']);
	$set =  ' set ';
	if($_POST['password'] == $_POST['cmfpassword'])
	{
		$set .=  ' bankaccount = "'.$_POST['bankaccount'].'"';
		if(!filter_var($_POST['paypalemail'], FILTER_VALIDATE_EMAIL) === false) $set .=  ' , paypalemail = "'.$_POST['paypalemail'].'"';
		if($_POST['password'] != '') 
		{
			$_POST['password'] = hash('sha256', $_POST['password'], FALSE);
			$set .= ' , password = "'.$_POST['password'].'"';
		}
		//if($_POST['birthdate'] != '') $set .= ' , birthdate = "'.$_POST['birthdate'].'"';
		if(update('users',$set,' where id = '.$_SESSION['uid'])) header('Location: page.php?c=account&message=m1');
		else header('Location: page.php?c=account&message=m2');
	}
	else header('Location: page.php?c=account&message=m6');
}
?>