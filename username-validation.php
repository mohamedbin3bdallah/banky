<?php
include('libs/register.php');
if(isset($_POST['username']))
{
	if(empty($_POST['username'])) { setcookie('username', ''); echo 0; }
	//elseif(preg_match('/[^a-z]/',$_POST['username'])) { setcookie('username', ''); echo 1; }
	elseif(strlen($_POST['username']) < 5) { setcookie('username', ''); echo 2; }
	elseif(strlen($_POST['username']) > 250) { setcookie('username', ''); echo 3; }
	elseif(exist('users','username',$_POST['username'])) { setcookie('username', ''); echo 4; }
	else  { setcookie('username', $_POST['username']); echo 5; }
	exit;
}
?>