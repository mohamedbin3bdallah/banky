<?php

function randomCode($length=9)
{
   $characters = "23456789ABCDEFHJKLMNPRTVWXYZabcdefghijklmnopqrstuvwxyz";
   $string = '';
   for ($p = 0; $p < $length; $p++) 
   {
       $string .= $characters[mt_rand(0, strlen($characters)-1)];
   }
   return $string;
}

function exist($table,$field,$value)
{
	include("libs/config.php");
	include("libs/opendb.php");
	$result = mysql_query("select id from {$table} where {$field} = '$value'");
	$row = mysql_fetch_array($result);
	include("libs/closedb.php");
	if(empty($row)) return 0;
	else return 1;
}

function update($table,$set,$where)
{
	include("libs/config.php");
	include("libs/opendb.php");	
	$stmt = mysql_query("update {$table} $set $where");
	if($stmt) return 1;
	else return 0;
	//include("libs/closedb.php");
}

function sendemail($person)
{
	require_once('PHPMailer/class.phpmailer.php');
	require_once('PHPMailer/class.smtp.php');
	require_once('PHPMailer/PHPMailerAutoload.php');
	$mail             = new PHPMailer(); // defaults to using php "mail()"
	$mail->IsSMTP(); // telling the class to use SMTP
	//$mail->Host       = "smtp.gmail.com";
	//$mail->Host       = "localhost";
	$mail->Host       = "mail.elzainygroup.com";      // sets GMAIL as the SMTP server
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->SMTPSecure = 'TLS';
	$mail->Port = 25;
	//$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
	$mail->Username   = "info@elzainygroup.com";  // GMAIL username
	$mail->Password   = "info123";					
	//$mail->AddReplyTo("name@yourdomain.com","First Last");
	$address = "info@elzainygroup.com";
	$mail->SetFrom($address, 'INFO');
	$mail->AddAddress($person['email']);
	$mail->Subject    = 'Activation';
	//$mail->AltBody    = "You can active your account on : "; // optional, comment out and test
	$mail->Body    = 'Your new password is : '.$person['password'];
	if($mail->Send()) return 1;
	else return 0;
}

?>