<?php
include('libs/paypalemail.php');

if(isset($_POST['settingssubmit']))
{
	unset($_POST['settingssubmit']);
	if(!filter_var($_POST['paypalemail'], FILTER_VALIDATE_EMAIL) === false)
	{
		if(update('users','set paypalemail = "'.$_POST['paypalemail'].'"','where id = '.$_SESSION['uid'])) header('Location: page.php?c=statistics');
		else header('Location: page.php?c=paypalemail&message=m2');
	}
	else header('Location: page.php?c=paypalemail&message=m2');
}
?>