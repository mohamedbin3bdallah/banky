<?php
include('libs/register.php');
if(isset($_POST['email']))
{
	if(empty($_POST['email'])) { setcookie('email', ''); echo 0; }
	elseif(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) { setcookie('email', ''); echo 1; }
	elseif(exist('users','email',$_POST['email'])) { setcookie('email', ''); echo 2; }
	else  { setcookie('email', $_POST['email']); echo 5; }
	exit;
}
?>