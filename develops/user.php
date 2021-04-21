<?php
include('libs/user.php');

if(isset($_POST['usersubmit']))
{
	unset($_POST['usersubmit']);
	$set = '';
	if($_POST['password'] != '')
	{
		if(strlen($_POST['password']) > 7)	$set = ',password = "'.hash('sha256', $_POST['password'], FALSE).'"';
		else header('Location: admin.php?c=user&id='.$_GET['id'].'&message=m7');
	}
	
	if(isset($_POST['active']) && $_POST['active'] == 'on') $_POST['active'] = 1;
	else $_POST['active'] = 0;
	
	//if(isset($_POST['repay']) && $_POST['repay'] == 'on') { $_POST['repay'] = 1; $_POST['refpayendtime'] = strtotime("+1 month", strtotime(date('Y-m-d',time()))); }
	if(isset($_POST['repay']) && $_POST['repay'] == 'on') { $_POST['repay'] = 1; $_POST['refpayendtime'] = strtotime(date('Y-m-d',time()))+(60*60*24*30); }
	else { $_POST['repay'] = 0; $_POST['refpayendtime'] = ''; }
	
	if(!exist('users',' where username = "'.$_POST['username'].'" and id <> '.$_GET['id']))
	{
		if(!exist('users',' where email = "'.$_POST['email'].'" and id <> '.$_GET['id']))
		{
			if(update('users',' set username = "'.$_POST['username'].'",email = "'.$_POST['email'].'",paypalemail = "'.$_POST['paypalemail'].'",country = "'.$_POST['country'].'",balance = '.$_POST['balance'].',clicks = '.$_POST['clicks'].',addads = '.$_POST['addads'].',refpayendtime = "'.$_POST['refpayendtime'].'",repay = '.$_POST['repay'].',active = '.$_POST['active'].$set,' where id = '.$_GET['id'])) header('Location: admin.php?c=user&id='.$_GET['id'].'&message=m1');
			else header('Location: admin.php?c=user&id='.$_GET['id'].'&message=m2');
		}
		else header('Location: admin.php?c=user&id='.$_GET['id'].'&message=m13');
	}
	else header('Location: admin.php?c=user&id='.$_GET['id'].'&message=m9');
	//print_r($_POST);
}
elseif(isset($_GET['id']) && is_numeric($_GET['id']))
{
	$user = getRowFromTable('users',' where id = '.$_GET['id'],'');
}
else header('Location: index.php');
?>