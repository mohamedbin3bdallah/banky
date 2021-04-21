<?php
if(isset($_POST['valcode'],$_POST['scode']))
{
	if(empty($_POST['valcode'])) { setcookie('code', ''); echo 0; }
	elseif($_POST['valcode'] != '' && strcasecmp($_POST['scode'], $_POST['valcode']) != 0) { setcookie('code', ''); echo 1; }
	else  { setcookie('code', ''); echo 5; }
	exit;
}
?>