<?php
include('libs/register.php');
$user = getRow('users','id,referral,rearray,username',' where username like "'.$_POST['referral'].'"');
		if($user == 0) header('Location: register.php?message=m5');
		else
		{
			if(substr_count($user['rearray'],',') = 3)
			{
				header('Location: register.php?message=0');
			}
			elseif(substr_count($user['rearray'],',') = 0)
			{
				if($user['referral'] == '') $user['referral'] = "['".$_COOKIE['username']."','".$user['username']."']";
				else $user['referral'] = $user['referral'].",['".$_COOKIE['username']."','".$user['username']."']";
				update('users','set referral = "'.$user['referral'].'"','where id = '.$user['id']);
			}
			elseif(substr_count($user['rearray'],',') = 1)
			{
				$data = getAllDataFromTable('id,referral,username','users','where id in ('.$user['rearray'].')','')
				for($i=0;$i<count($data);$i++)
				{
					if($data[$i]['referral'] == '') $data[$i]['referral'] = "['".$_COOKIE['username']."','".$data[$i]['username']."']";
					else $data[$i]['referral'] = $data[$i]['referral'].",['".$_COOKIE['username']."','".$data[$i]['username']."']";
					update('users','set referral = "'.$data[$i]['referral'].'"','where id = '.$data[$i]['id']);
				}
			}
			elseif(substr_count($user['rearray'],',') = 2)
			{
				$data = getAllDataFromTable('id,referral,repay,refpayendtime,username','users','where id in ('.$user['rearray'].')','')
				for($i=0;$i<count($data);$i++)
				{
					if($i == 0)
					{
						if($data[$i]['repay'] == 1 && $data[$i]['refpayendtime'] != '' && $data[$i]['refpayendtime'] < time())
						{
							if($data[$i]['referral'] == '') $data[$i]['referral'] = "['".$_COOKIE['username']."','".$data[$i]['username']."']";
							else $data[$i]['referral'] = $data[$i]['referral'].",['".$_COOKIE['username']."','".$data[$i]['username']."']";
							update('users','set referral = "'.$data[$i]['referral'].'"','where id = '.$data[$i]['id']);
							insertwaiting(array('refid'=>,'sonid'=>,'title'=>"['".$_COOKIE['username']."','".$data[$i]['useername']."']"));
						}
						header('Location: register.php?message=0');
					}
					else
					{
						if($data[$i]['referral'] == '') $data[$i]['referral'] = "['".$_COOKIE['username']."','".$data[$i]['username']."']";
						else $data[$i]['referral'] = $data[$i]['referral'].",['".$_COOKIE['username']."','".$data[$i]['username']."']";
						update('users','set referral = "'.$data[$i]['referral'].'"','where id = '.$data[$i]['id']);
					}
				}
			}
		}
?>