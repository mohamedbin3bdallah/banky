<?php
include('libs/adbuyadvertisements.php');

if(isset($_POST['buyadvertisementsubmit']))
{
	//print_R($_POST);
	$arr = explode("|",$_POST['plan']);
	
	unset($_POST['buyadvertisementsubmit'],$_POST['plan']);
	$_POST['planid'] = $arr[0];
	$_POST['cost'] = $arr[1]*$_POST['adnumber']*$_POST['clicks'];
	$_POST['title'] = $arr[2];
	$_POST['clicks'] = $_POST['clicks'];
	$_POST['time'] = time();
	$_POST['payed'] = 1;
	$id = insertRow('userpayads',$_POST);
	if($id)
	{
		update('users',' set addads = addads+'.$_POST['adnumber'],' where id = '.$_POST['uid']);
		header('Location: ?c=adbuyadvertisements&message=m1');
	}
	else header('Location: ?c=adbuyadvertisements&message=m2');
}

?>