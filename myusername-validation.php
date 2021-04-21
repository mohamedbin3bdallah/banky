<?php
if(isset($_POST['myusername']))
{
	if(empty($_POST['myusername'])) { setcookie('myusername', ''); echo 0; }
	//elseif(preg_match('/[^a-z]/',$_POST['myusername'])) { setcookie('myusername', ''); echo 1; }
	//elseif(strlen($_POST['myusername']) < 5) { setcookie('myusername', ''); echo 2; }
	//elseif(strlen($_POST['myusername']) > 250) { setcookie('myusername', ''); echo 3; }
	//elseif(exist('users','myusername',$_POST['myusername'])) { setcookie('myusername', ''); echo 4; }
	else  { setcookie('myusername', $_POST['myusername']); echo 5; }
	exit;
}
?>