<?php

function randomCode($length=9)
{
   $characters = "23456789ABCDEFHJKLMNPRTVWXYZ";
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

function getRow($table,$fields,$where)
{
	include("libs/config.php");
	include("libs/opendb.php");
	$result = mysql_query("select $fields from {$table} $where");
	$row = mysql_fetch_array($result);
	include("libs/closedb.php");
	if(empty($row)) return 0;
	else return $row;
}

function getAllDataFromTable($cols,$table,$where,$limit)
{
	include("libs/config.php");
	include("libs/opendb.php");
	$result = mysql_query("select $cols from {$table} $where $limit");
	$allrows = array();	
	if(!empty($result))
	{
		for($i=0; $row = mysql_fetch_array($result); $i++)
		{
			$allrows[$i] = $row;
		}
	}
	include("libs/closedb.php");
	return $allrows;
}

function update($table,$set,$where)
{
	include("libs/config.php");
	include("libs/opendb.php");	
	$stmt = mysql_query("update {$table} $set $where");
	/*if($stmt) return 1;
	else return 0;*/
	include("libs/closedb.php");
}

function insertuser($person)
{
	include("libs/config.php");
	include("libs/opendb.php");
	$fquery = "insert into users (";
	$lquery = " values (";
	foreach ($person as $key => $value)
	{
		$fquery .= "`".$key."`";
		$lquery .= '"'.$value.'"';
		$data  = array_keys($person);
		$lastkey = array_pop($data);
		if($key != $lastkey) 
		{	
			$fquery .= ",";
			$lquery .= ",";
		}	
	}
	$fquery .= ")";
	$lquery .= ")";
	$query = $fquery.$lquery;
	$result = mysql_query($query);
	if($result) return 1;
	else return 0;
    /*include("../libs/closedb.php");
	unset($data,$lastkey,$person,$fquery,$lquery,$query,$result);*/
}

function insertwaiting($person)
{
	include("libs/config.php");
	include("libs/opendb.php");
	$fquery = "insert into waitings (";
	$lquery = " values (";
	foreach ($person as $key => $value)
	{
		$fquery .= "`".$key."`";
		$lquery .= '"'.$value.'"';
		$data  = array_keys($person);
		$lastkey = array_pop($data);
		if($key != $lastkey) 
		{	
			$fquery .= ",";
			$lquery .= ",";
		}	
	}
	$fquery .= ")";
	$lquery .= ")";
	$query = $fquery.$lquery;
	$result = mysql_query($query);
	if($result) return 1;
	else return 0;
    /*include("../libs/closedb.php");
	unset($data,$lastkey,$person,$fquery,$lquery,$query,$result);*/
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
	$mail->Body    = 'Thank you for Subscribing to up your income, this is your activation link: http://www.elzainygroup.com/active.php?email='.$person['email'].'&code='.$person['code'];
	if($mail->Send()) return 1;
	else return 0;
}

?>