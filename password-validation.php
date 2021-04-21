<?php
if(isset($_POST['password']))
{
	if(empty($_POST['password'])) { setcookie('password', ''); echo 0; }
	//elseif(preg_match('/[^a-z]/',$_POST['password'])) { setcookie('password', ''); echo 1; }
	elseif(strlen($_POST['password']) < 8) { setcookie('password', ''); echo 2; }
	elseif(strlen($_POST['password']) > 250) { setcookie('password', ''); echo 3; }
	//elseif(exist('users','password',$_POST['password'])) { setcookie('password', ''); echo 4; }
	elseif($_POST['cmfpassword'] != '' && $_POST['cmfpassword'] != $_POST['password']) { setcookie('password', ''); echo 4; }
	else  { setcookie('password', $_POST['password']); echo 5; }
	exit;
}
?>