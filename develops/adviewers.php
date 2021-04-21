<?php
include('libs/adviewers.php');

$where = 'inner join users on viewadvertisements.uid = users.id where viewadvertisements.viewad = 1 and viewadvertisements.adid = '.$_GET['ad'].' order by users.username ASC';
$resultsPerPage = 10;
if($resultsPerPage != 0)
{
	if(isset($_GET['page'])) $page = (int) $_GET['page'];
	else $page = 0;
	
	if ($page < 1) $page = 1;
	$startResults = ($page - 1) * $resultsPerPage;
	$noOfrows = getNoOfRowsFromTable('viewadvertisements',$where);
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