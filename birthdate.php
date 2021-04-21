<?php
function getRowFromTable($select,$table,$where,$limit)
{
	include("libs/config.php");
	include("libs/opendb.php");
	$result = mysql_query("select $select from {$table} $where $limit");
	$row = mysql_fetch_array($result);
	include("libs/closedb.php");
	return $row;
}
if(isset($_GET['excode']) && hash('sha256', $_GET['excode'], FALSE) == getRowFromTable('excode','system','where id = 1','')['excode'])
{
function getAllDataFromTable($table,$where,$limit)
{
	include("libs/config.php");
	include("libs/opendb.php");
	$result = mysql_query("select * from {$table} $where $limit");
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
	include("libs/closedb.php");
}

$data = getAllDataFromTable('users',' where day(birthdate) = '.date('j').' and month(birthdate) = '.date('m'),'');
//print_r($data);
if(!empty($data))
{
	require_once('../PHPMailer/class.phpmailer.php');
	require_once('../PHPMailer/class.smtp.php');
	require_once('../PHPMailer/PHPMailerAutoload.php');
	for($u=0;$u<count($data);$u++)
	{
		//update('users',' set age = age+1 ',' where id = '.$data[$u]['id']);
		$add = 60*60*24*10;
		if($data[$u]['repay'] == 1 && $data[$u]['refpayendtime'] != '') update('users',' set age = age+1 , refpayendtime = refpayendtime+'.$add,' where id = '.$data[$u]['id']);
		else update('users',' set age = age+1 , repay = 1 , refpayendtime = '.strtotime(date('Y-m-d',time()))+$add,' where id = '.$data[$u]['id']);
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
		$mail->SetFrom('info@banky.com', 'INFO');
		$mail->AddAddress($data[$u]['email']);
		$mail->Subject    = 'Birthday';
		//$mail->AltBody    = "You can active your account on : "; // optional, comment out and test
		//$mail->Body    = 'Happy Birthday '.$data[$u]['username'];
		$mail->Body    = 'Happy Birthday, up your income gives you a free 4th line for 10 days';
		$mail->Send();
	}
}
}
?>