<?php
include('libs/plans.php');

$where = '';

$resultsPerPage = 10;
if($resultsPerPage != 0)
{
	if(isset($_GET['page'])) $page = (int) $_GET['page'];
	else $page = 0;
	
	if ($page < 1) $page = 1;
	$startResults = ($page - 1) * $resultsPerPage;
	$noOfrows = getNoOfRowsFromTable('plans',$where);
	$totalPages = ceil($noOfrows / $resultsPerPage);
	
	$limit = 'LIMIT '.$startResults.', '.$resultsPerPage;
}
else
{
	$page = 0;
	$totalPages = 0;
	$limit = '';
}

if(isset($_GET['id']) && $_GET['id'] != '')
{
	$plan = getRowFromTable('plans',' where id = '.$_GET['id'],'');
}

if(isset($_POST['plansubmit']))
{
	unset($_POST['plansubmit']);
	if($_POST['title'] != '' && is_numeric($_POST['pay']) && is_numeric($_POST['cost']))
	{
		if(isset($_POST['active']) && $_POST['active'] == 'on') $_POST['active'] = 1;
		else $_POST['active'] = 0;
		
		if(isset($_POST['oldid']))
		{
			if(update('plans',' set title = "'.$_POST['title'].'" , pay = "'.$_POST['pay'].'" , cost = "'.$_POST['cost'].'" , timer = '.$_POST['timer'].' , active = '.$_POST['active'],' where id = '.$_POST['oldid'])) header('Location: ?c=plans&message=m1');
			else header('Location: ?c=plans&message=m2');
		}
		else
		{
			if(insertRow('plans',$_POST)) header('Location: ?c=plans&message=m1');
			else header('Location: ?c=plans&message=m2');
		}
	}
	else header('Location: ?c=plans&message=m4');
}
?>