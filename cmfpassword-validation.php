<?php
if(isset($_POST['cmfpassword']))
{
	if(empty($_POST['cmfpassword'])) { echo 0; }
	//elseif(preg_match('/[^a-z]/',$_POST['cmfpassword'])) { echo 1; }
	//elseif(strlen($_POST['cmfpassword']) < 8) { echo 2; }
	//elseif(strlen($_POST['cmfpassword']) > 250) { echo 3; }
	//elseif(exist('users','cmfpassword',$_POST['cmfpassword'])) { echo 4; }
	elseif($_POST['password'] != '' && $_POST['password'] != $_POST['cmfpassword']) { echo 4; }
	else  { echo 5; }
	exit;
}
?>