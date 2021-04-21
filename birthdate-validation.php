<?php
if(isset($_POST['birthdate']))
{
	if(empty($_POST['birthdate'])) { setcookie('birthdate', ''); echo 0; }
	elseif(date('Y', strtotime($_POST['birthdate'])) < '1950') { setcookie('birthdate', ''); echo 1; }
	elseif(date('Y', strtotime($_POST['birthdate'])) > date('Y')-1) { setcookie('birthdate', ''); echo 2; }
	else  { setcookie('birthdate', $_POST['birthdate']); echo 5; }
	exit;
}
?>