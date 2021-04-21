<?php
if(isset($_POST['passw0rd']))
{
	if(empty($_POST['passw0rd'])) { setcookie('passw0rd', ''); echo 0; }
	//elseif(preg_match('/[^a-z]/',$_POST['cmfpassword'])) { setcookie('cmfpassword', ''); echo 1; }
	//elseif(strlen($_POST['cmfpassword']) < 8) { setcookie('cmfpassword', ''); echo 2; }
	//elseif(strlen($_POST['cmfpassword']) > 250) { setcookie('cmfpassword', ''); echo 3; }
	//elseif(exist('users','cmfpassword',$_POST['cmfpassword'])) { setcookie('cmfpassword', ''); echo 4; }
	//elseif($_POST['password'] != '' && $_POST['password'] != $_POST['cmfpassword']) { setcookie('cmfpassword', ''); echo 4; }
	else  { setcookie('passw0rd', $_POST['passw0rd']); echo 5; }
	exit;
}
?>