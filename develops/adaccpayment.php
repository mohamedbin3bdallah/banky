<?php
include('libs/adaccpayment.php');
if(isset($_GET['id'],$_GET['userid'],$_GET['num']))
{
	if($_GET['id'] != ''&& $_GET['userid'] != '')
	{	
		if(deleterow('userpayads','where id = '.$_GET['id']) && update('users','set addads= addads-'.$_GET['num'],'where id = '.$_GET['userid'])) header('Location: admin.php?c=adaccpayment');
		else header('Location: admin.php?c=adaccpayment');
	}
	else header('Location: admin.php?c=adaccpayment');
}
?>