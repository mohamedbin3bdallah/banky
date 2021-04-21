<?php
	require_once('PHPMailer/class.phpmailer.php');
	require_once('PHPMailer/class.smtp.php');
	require_once('PHPMailer/PHPMailerAutoload.php');
	$mail             = new PHPMailer(); // defaults to using php "mail()"
	$mail->IsSMTP(); // telling the class to use SMTP
	//$mail->Host       = "localhost";
	//	$mail->Host       = "smtpout.secureserver.net";      // sets GMAIL as the SMTP server
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->SMTPSecure = 'SSL';
	$mail->Host       = "smtp.gmail.com";
	$mail->Port = 465;
	$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
	$mail->Username   = "companytest52016@gmail.com";  // GMAIL username
	$mail->Password   = "companytest52016";					
	//$mail->AddReplyTo("name@yourdomain.com","First Last");
	$address = "info@upurincome.net";
	$mail->SetFrom($address, 'INFO');
	$mail->AddAddress('abuhozifah@gmail.com');
	$mail->Subject    = 'Activation';
	//$mail->AltBody    = "You can active your account on : "; // optional, comment out and test
	$mail->Body    = 'Activation link: http://www.upurincome.net/active.php?email=abuhozifah@gmail.com&code=asdadasd2312sfsf';
	if(!$mail->Send()) {
		echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
		echo "Message sent!";
	}
?>