<?php
include('libs/balances.php');
if(isset($_GET['type']) && $_GET['type'] == 1)
{
	$user = getRow('users','email',' where id = '.$_GET['uid']);
	require_once('PHPMailer/class.phpmailer.php');
	require_once('PHPMailer/class.smtp.php');
	require_once('PHPMailer/PHPMailerAutoload.php');
	$mail             = new PHPMailer(); // defaults to using php "mail()"
	$mail->IsSMTP(); // telling the class to use SMTP
	//$mail->Host       = "smtp.secureserver.net";
	$mail->Host       = "mail.elzainygroup.com";
	//	$mail->Host       = "smtpout.secureserver.net";      // sets GMAIL as the SMTP server
        $mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->SMTPSecure = 'TLS';
	$mail->Port = 25;
	//$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
	$mail->Username   = "info@elzainygroup.com";  // GMAIL username
	$mail->Password   = "info123";					
	//$mail->AddReplyTo("name@yourdomain.com","First Last");
	/*if(isset($_POST['contactemail']) && preg_match("/^[0-9]*$/",$_POST['contactemail'])) $address = $_POST['contactemail'];
	else $address = "info@elzainygroup.com";*/
	$mail->SetFrom('info@elzainygroup.com', 'INFO');
	$mail->AddAddress($user['email']);
	$mail->Subject    = 'Account Balance';
	//$mail->AltBody    = "You can active your account on : "; // optional, comment out and test
	$mail->Body    = 'Your Balance Was Transferred Successfylly';
	$mail->Send();
	header('Location: admin.php?c=balances');
}
?>