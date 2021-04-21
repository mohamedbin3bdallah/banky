<?php
include('libs/forgotpassword.php');
if(isset($_POST['submit']))
{
	unset($_POST['submit']);
	
	if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) header('Location: forgotpassword.php?message=1');
	else
	{
		if(exist('users','email',$_POST['email']))
		{
			$password = randomCode(9);
			$hashpassword = hash('sha256', $password, FALSE);
			if(update('users','set password = "'.$hashpassword.'"','where email like "'.$_POST['email'].'"') && sendemail(array('email'=>$_POST['email'],'password'=>$password))) header('Location: forgotpassword.php?message=2');
			else header('Location: forgotpassword.php?message=3');
		}
		else header('Location: forgotpassword.php?message=4');
	}
}
?>