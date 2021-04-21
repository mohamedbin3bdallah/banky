<?php
include('libs/users.php');

$where = '';
$resultsPerPage = 10;
if($resultsPerPage != 0)
{
	if(isset($_GET['page'])) $page = (int) $_GET['page'];
	else $page = 0;
	
	if ($page < 1) $page = 1;
	$startResults = ($page - 1) * $resultsPerPage;
	$noOfrows = getNoOfRowsFromTable('users',$where);
	$totalPages = ceil($noOfrows / $resultsPerPage);
	
	$limit = ' order by username ASC'.' LIMIT '.$startResults.', '.$resultsPerPage;
}
else
{
	$page = 0;
	$totalPages = 0;
	$limit = ' order by username ASC';
}

if(isset($_GET['id']) && $_GET['id'] != '')
{
	if(deleterow('users','where id = '.$_GET['id'])) header('Location: admin.php?c=users');
	else header('Location: admin.php?c=users');
}
?>