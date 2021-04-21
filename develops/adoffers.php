<?php
include('libs/adoffers.php');

$where = ' inner join users on offers.uid = users.id inner join admins on offers.admin = admins.id  order by offers.time DESC';

$resultsPerPage = 10;
if($resultsPerPage != 0)
{
	if(isset($_GET['page'])) $page = (int) $_GET['page'];
	else $page = 0;
	
	if ($page < 1) $page = 1;
	$startResults = ($page - 1) * $resultsPerPage;
	$noOfrows = getNoOfRowsFromTable('offers',$where);
	$totalPages = ceil($noOfrows / $resultsPerPage);
	
	$limit = 'LIMIT '.$startResults.', '.$resultsPerPage;
}
else
{
	$page = 0;
	$totalPages = 0;
	$limit = '';
}

if(isset($_POST['offersubmit']))
{
	unset($_POST['offersubmit']);
	if(is_numeric($_POST['offer']))
	{
		$_POST['admin'] = $_SESSION['admin'];
		$_POST['time'] = time();
		if($_POST['type'] == 'clicks') { $_POST['offer'] = ceil($_POST['offer']); update('users',' set clicks = clicks+'.$_POST['offer'],' where id = '.$_POST['uid']); }
		elseif($_POST['type'] == 'money') { update('users',' set balance = balance+'.$_POST['offer'].',total = total+'.$_POST['offer'],' where id = '.$_POST['uid']); $_POST['offer'] = $_POST['offer'].' EGP'; }
		if(insertRow('offers',$_POST)) header('Location: ?c=adoffers&message=m1');
		else header('Location: ?c=adoffers&message=m2');
	}
	else header('Location: ?c=adoffers&message=m4');
}
?>