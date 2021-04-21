<?php
include('libs/advertisements.php');

$where = 'where viewadvertisements.uid = '.$_SESSION['uid'].' order by viewadvertisements.createday DESC';
$resultsPerPage = 9;
if($resultsPerPage != 0)
{
	if(isset($_GET['page'])) $page = (int) $_GET['page'];
	else $page = 0;
	
	if ($page < 1) $page = 1;
	$startResults = ($page - 1) * $resultsPerPage;	
	$noOfrows = getNoOfAllUserAdTasks($where);
	$totalPages = ceil($noOfrows / $resultsPerPage);
	
	$limit = 'LIMIT '.$startResults.', '.$resultsPerPage;
}
else
{
	$page = 0;
	$totalPages = 0;
	$limit = '';
}
?>