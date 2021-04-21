<?php
include('libs/bankaccount.php');

if(isset($_POST['settingssubmit']))
{
	unset($_POST['settingssubmit']);
	if($_POST['bankaccount'] != '')
	{
		if(update('users','set bankaccount = "'.$_POST['bankaccount'].'"','where id = '.$_SESSION['uid'])) header('Location: page.php?c=statistics');
		else header('Location: page.php?c=bankaccount&message=m2');
	}
	else header('Location: page.php?c=bankaccount&message=m2');
}
?>