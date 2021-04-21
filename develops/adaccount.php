<?php
if($_SESSION['super'])
{
include('libs/adaccount.php');

$where = ' where id <> 1 ';

$resultsPerPage = 10;
if($resultsPerPage != 0)
{
	if(isset($_GET['page'])) $page = (int) $_GET['page'];
	else $page = 0;
	
	if ($page < 1) $page = 1;
	$startResults = ($page - 1) * $resultsPerPage;
	$noOfrows = getNoOfRowsFromTable('admins',$where);
	$totalPages = ceil($noOfrows / $resultsPerPage);
	
	$limit = ' order by username ASC'.' LIMIT '.$startResults.', '.$resultsPerPage;
}
else
{
	$page = 0;
	$totalPages = 0;
	$limit = ' order by username ASC';
}

if(isset($_GET['id']) && $_GET['id'] != '' && $_GET['id'] != 1)
{
	$admin = getRowFromTable('admins',' where id = '.$_GET['id'],'');
}

if(isset($_POST['adminsubmit']))
{
	//if($_POST['username'] != '' && !preg_match('/[^a-z]/',$_POST['username']))
	if($_POST['username'] != '')
	{			
			if(isset($_POST['super']) && $_POST['super'] == 'on') $_POST['super'] = 1;
			else $_POST['super'] = 0;
		
			if(isset($_POST['active']) && $_POST['active'] == 'on') $_POST['active'] = 1;
			else $_POST['active'] = 0;
		
			if(isset($_POST['oldid']))
			{
				if(!exist('admins',' where username = "'.$_POST['username'].'" and id <> '.$_POST['oldid']))
				{
					if($_POST['password'] == $_POST['cmfpassword'])
					{
						if($_POST['password'] != ' ' && $_POST['password'] != '') { $_POST['password'] = hash('sha256', $_POST['password'], FALSE); $password = ' , password = "'.$_POST['password'].'"'; }
						else $password = '';
						
						unset($_POST['adminsubmit'],$_POST['cmfpassword'],$_POST['password']);
						if(update('admins',' set username = "'.$_POST['username'].'" , super = '.$_POST['super'].' , active = '.$_POST['active'].$password,' where id = '.$_POST['oldid'])) header('Location: ?c=adaccount&message=m1');
						else header('Location: ?c=adaccount&message=m2');
					}
					else header('Location: ?c=adaccount&message=m6');
				}
				else header('Location: ?c=adaccount&message=m9');
			}
			else
			{
				if(!exist('admins',' where username = "'.$_POST['username'].'"'))
				{
					if($_POST['password'] != ' ' && $_POST['password'] == $_POST['cmfpassword'])
					{
						$_POST['password'] = hash('sha256', $_POST['password'], FALSE);
						unset($_POST['adminsubmit'],$_POST['cmfpassword']);
						if(insertRow('admins',$_POST)) header('Location: ?c=adaccount&message=m1');
						else header('Location: ?c=adaccount&message=m2');
					}
					else header('Location: ?c=adaccount&message=m6');
				}
				else header('Location: ?c=adaccount&message=m9');
			}
	}
	else header('Location: ?c=adaccount&message=m5');
}
}
else header('Location: ?c=adstatistics');
?>