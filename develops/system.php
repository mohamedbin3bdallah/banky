<?php
include('libs/system.php');
if($_SESSION['admin'] == 1)
{
$system = getRowFromTable('system',' where id = 1 ','');

if(isset($_POST['systemsubmit']))
{
	unset($_POST['systemsubmit']); print_r($_POST);
	if($_POST['paypalemail'] != ' ' && $_POST['bankaccount'] != ' ')
	{
		if(!filter_var($_POST['paypalemail'], FILTER_VALIDATE_EMAIL) === false)
		{
			/*if(preg_match("/^[A-Z]*$/",$_POST['currency_code']))
			{*/
				if(update('system',' set bankaccount = "'.$_POST['bankaccount'].'" , paypalemail = "'.$_POST['paypalemail'].'"',' where id = 1')) header('Location: ?c=system&message=m1');
				else header('Location: ?c=system&message=m2');
			/*}
			else header('Location: ?c=system&message=m12');*/
		}
		else header('Location: ?c=system&message=m12');
	}
	else header('Location: ?c=system&message=m5');
}
}
else header('Location: ?c=adstatistics');
?>