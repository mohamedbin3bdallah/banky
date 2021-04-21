<?php
if(isset($_POST['sendmessage']))
{
	unset($_POST['sendmessage']);
	if($_POST['message'] != '')
	{
		if($_POST['email'] != '' && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
		{
			if($_POST['name'] != '' &&  preg_match("/^[a-zA-Z ]*$/",$_POST['name']))
			{
				if($_POST['subject'] != '' && preg_match("/^[a-zA-Z ]*$/",$_POST['subject']))
				{
					require_once('../../PHPMailer/class.phpmailer.php');
					require_once('../../PHPMailer/class.smtp.php');
					require_once('../../PHPMailer/PHPMailerAutoload.php');
					$mail             = new PHPMailer(); // defaults to using php "mail()"
					$mail->IsSMTP(); // telling the class to use SMTP
					//$mail->Host       = "smtp.secureserver.net";
					$mail->Host       = "localhost";
					//	$mail->Host       = "smtpout.secureserver.net";      // sets GMAIL as the SMTP server
					//	$mail->SMTPAuth   = true;                  // enable SMTP authentication
					//	$mail->SMTPSecure = 'ssl';
					//	$mail->Port = 465;
					//$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
					//$mail->Username   = "";  // GMAIL username
					//$mail->Password   = "";					
					//$mail->AddReplyTo("name@yourdomain.com","First Last");
					/*if(isset($_POST['contactemail']) && preg_match("/^[0-9]*$/",$_POST['contactemail'])) $address = $_POST['contactemail'];
					else $address = "info@banky.com";*/
					$mail->SetFrom($address, 'INFO');
					$mail->AddAddress('info@banky.com');
					$mail->Subject    = $_POST['subject'];
					//$mail->AltBody    = "You can active your account on : "; // optional, comment out and test
					$mail->Body    = '
						Name: '.$_POST['name'].'
						Email: '.$_POST['email'].'
						Message: '.nl2br($_POST['message']);
					if($mail->Send()) header('location: ../contact.php?message=m11');
					else header('location: ../contact.php?message=m2');
				}
				else header('location: ../contact.php?message=m12');
			}
			else header('location: ../contact.php?message=m12');
		}
		else header('location: ../contact.php?message=m12');
	}
	else header('location: ../contact.php?message=m12');
}
else header('location: ../contact.php?message=m2');
?>