<?php
include('libs/register.php');
if(isset($_POST['registersubmit']))
{
	if(!exist('users','username',$_COOKIE['username']))
	{
	if(!exist('users','email',$_COOKIE['email']))
	{
	unset($_POST['registersubmit']);
	 $url = '';
	if(isset($_GET['referral']) && $_GET['referral'] != '') $url .= 'referral='.$_GET['referral'].'&';
	
	if(isset($_POST['referral']) && $_POST['referral'] != '')
	{
		$user = getRow('users','id,referral,childs,rearray,repay,username',' where advertiser = 0 and username like "'.$_POST['referral'].'"');
		if($user == 0)
		{
			header('Location: register.php?'.$url.'message=m5');
			exit;
		}
		else
		{
			if($user['rearray'] == '')
			{
				if($user['referral'] == '') $user['referral'] = "['".$_COOKIE['username']."','".$user['username']."']";
				else $user['referral'] = $user['referral'].",['".$_COOKIE['username']."','".$user['username']."']";
				if($user['childs'] == '') $user['childs'] = $_COOKIE['username'];
				else $user['childs'] = $user['childs'].','.$_COOKIE['username'];
				update('users','set referral = "'.$user['referral'].'" , childs = "'.$user['childs'].'" , totalreff = totalreff+1','where id = '.$user['id']);
				$newuser['rearray'] = $user['username'];
			}
			elseif(substr_count($user['rearray'],',') >= 0)
			{
				$level4 = '';
				if($user['referral'] == '') $user['referral'] = "['".$_COOKIE['username']."','".$user['username']."']";
				else $user['referral'] = $user['referral'].",['".$_COOKIE['username']."','".$user['username']."']";
				if($user['childs'] == '') $user['childs'] = $_COOKIE['username'];
				else $user['childs'] = $user['childs'].','.$_COOKIE['username'];
				update('users','set referral = "'.$user['referral'].'" , childs = "'.$user['childs'].'"  , totalreff = totalreff+1','where id = '.$user['id']);
				
				if(substr_count($user['rearray'],',') < 3)
				{
					$newuser['rearray'] = $user['rearray'].','.$user['username'];
					$rearray = str_replace(',','","',$user['rearray']);
					if(substr_count($user['rearray'],',') == 2) $level4 = substr($user['rearray'], 0, strpos($user['rearray'], ','));
				}
				else
				{
					$newuser['rearray'] = substr($user['rearray'], (strpos($user['rearray'], ','))+1).','.$user['username'];
					$rearray = str_replace(',','","',substr($user['rearray'], (strpos($user['rearray'], ','))+1));
					$level4 = substr($newuser['rearray'], 0, strpos($newuser['rearray'], ','));
				}
				
				if(substr_count($newuser['rearray'],',') == 3) $level4 = substr($newuser['rearray'], 0, strpos($newuser['rearray'], ','));
				
				$data = getAllDataFromTable('id,referral,childs,level4,username','users','where username in ("'.$rearray.'")','');
				count($data);
				for($i=0;$i<count($data);$i++)
				{
					if($data[$i]['referral'] == '') $data[$i]['referral'] = "['".$_COOKIE['username']."','".$user['username']."']";
					else $data[$i]['referral'] = $data[$i]['referral'].",['".$_COOKIE['username']."','".$user['username']."']";
					if($level4 != '' && $data[$i]['username'] == $level4)
					{
						$data[$i]['childs'] = $data[$i]['childs'];
						if($data[$i]['level4'] == '') $data[$i]['level4'] = $_COOKIE['username'];
						else $data[$i]['level4'] = $data[$i]['level4'].','.$_COOKIE['username'];
					}
					else
					{
						$data[$i]['level4'] = $data[$i]['level4'];
						if($data[$i]['childs'] == '') $data[$i]['childs'] = $_COOKIE['username'];
						else $data[$i]['childs'] = $data[$i]['childs'].','.$_COOKIE['username'];
					}
					update('users','set referral = "'.$data[$i]['referral'].'" , childs = "'.$data[$i]['childs'].'" , level4 = "'.$data[$i]['level4'].'" , totalreff = totalreff+1','where id = '.$data[$i]['id']);
				}
			}
			else header('Location: register.php?'.$url.'message=0');
		}
	}
	
	if(isset($_POST['advertiser']) && $_POST['advertiser'] == 'on') $newuser['advertiser'] = '1';
	
	//$ip = '156.204.161.141';
	$ip = $_SERVER['REMOTE_ADDR']?:($_SERVER['HTTP_X_FORWARDED_FOR']?:$_SERVER['HTTP_CLIENT_IP']);
	$details = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip={$ip}"));
	//print_r($details->geoplugin_countryName);
	$newuser['country'] = $details->geoplugin_countryName;

	$newuser['time'] = time();
	$newuser['username'] = $_COOKIE['username'];
	$newuser['email'] = $_COOKIE['email'];
	$newuser['birthdate'] = $_COOKIE['birthdate'];
	$newuser['age'] = floor((time() - strtotime($_COOKIE['birthdate'])) / 31556926);
	$newuser['password'] = hash('sha256', $_COOKIE['password'], FALSE);
	$newuser['code'] = uniqid(mt_rand(111111111,999999999));
	unset($_COOKIE);
	//print_r($newuser);
	$return = insertuser($newuser);
	if($return) sendemail($newuser);
	//print_r($return);
	header('Location: register.php?'.$url.'message='.$return);
	}
	else header('Location: register.php?'.$url.'message=2');
	}
	else header('Location: register.php?'.$url.'message=3');
}
?>