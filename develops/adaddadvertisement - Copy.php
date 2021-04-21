<?php
	include('libs/adaddadvertisement.php');
	
	if(isset($_POST['advertisementsubmit']))
	{
		unset($_POST['advertisementsubmit']);
		
		if($_POST['plan'] != '' && $_POST['category'] != '' && $_POST['title'] != '' && $_POST['description'] != '')
		{
			$where2 = '';
			$arr = explode("|",$_POST['plan']);
			$_POST['plan'] = $arr[0];
			$_POST['age'] = $_POST['fage'].','.$_POST['tage'];
			$_POST['clicks'] = $arr[1];
			//$_POST['endday'] = "$arr[2]";
			
			if(!empty($_POST['countries']))
			{
				$_POST['country'] = implode('","',$_POST['countries']);
				if(count($_POST['countries']) > 1) $where2 .= ' and country in ("'.$_POST['country'].'")';
				else $where2 .= ' and country like "'.$_POST['country'].'"';
			}
			else
			{
				$_POST['country'] = '';
				$where2 .= '';
			}
			
			if($_POST['fage'] != '' && $_POST['tage'] != '')
			{
				if($_POST['fage'] < $_POST['tage'])	$where2 .= ' and age between '.$_POST['fage'].' and '.$_POST['tage'];
				else header('Location: ?c=addadvertisement&message=m2');
			}
			elseif($_POST['fage'] == '' && $_POST['tage'] == '') $where2 .= '';
			elseif($_POST['fage'] != '' && $_POST['tage'] == '') $where2 .= ' and age > '.$_POST['fage'];
			elseif($_POST['fage'] == '' && $_POST['tage'] != '') $where2 .= ' and age < '.$_POST['tage'];
			
			unset($_POST['countries'],$_POST['fage'],$_POST['tage']);
			
			$users = getAllDataFromTable('users',' where advertiser = 0 and id <> '.$_POST['uid'].$where2,'');
			/*if(count($users) >= $_POST['clicks'])
			{*/
			
			if(!empty($_FILES))
			{
				$_POST['ad'] = upload_profile_picture($_POST['category']);
				if($_POST['ad'])
				{
					$_POST['time'] = time();
					$views['adid'] = insertRow('advertisements',$_POST);
					if($views['adid'])
					{
						if(update('userpayads',' set adnumber = adnumber-1 ',' where id = '.$_POST['plan']) && update('users',' set addads = addads-1 ',' where id = '.$_POST['uid']))
						{
							for($i=0;$i<count($users);$i++) { $views['uid'] = $users[$i]['id']; insertRow('viewadvertisements',$views); }
							header('Location: ?c=adaddadvertisement&message=m1');
						}
						else header('Location: ?c=adaddadvertisement&message=m2');
					}
					else header('Location: ?c=adaddadvertisement&message=m2');
				}
				else header('Location: ?c=adaddadvertisement&message=m3');
			}
			elseif(!filter_var($_POST['ad'], FILTER_VALIDATE_URL) === false)
			{
				$_POST['ad'] = $_POST['ad'];
				$_POST['time'] = time();
				$views['adid'] = insertRow('advertisements',$_POST);
				if($views['adid'])
				{
					if(update('userpayads',' set adnumber = adnumber-1 ',' where id = '.$_POST['plan']) && update('users',' set addads = addads-1 ',' where id = '.$_POST['uid']))
					{
						for($i=0;$i<count($users);$i++) { $views['uid'] = $users[$i]['id']; insertRow('viewadvertisements',$views); }
						header('Location: ?c=adaddadvertisement&message=m1');
					}
					else header('Location: ?c=adaddadvertisement&message=m2');
				}
				else header('Location: ?c=adaddadvertisement&message=m2');
			}
			else header('Location: ?c=adaddadvertisement&message=m4');
			
			/*}
			else header('Location: ?c=adaddadvertisement&message=m18');*/
		}
		else header('Location: ?c=adaddadvertisement&message=m5');
	}
?>