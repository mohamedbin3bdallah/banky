<?php
include('libs/search.php');

if(isset($_POST['searchsubmit']))
{
	unset($_POST['searchsubmit']);
	$where = array();
	
	if($_POST['country'] != '') $where[] = 'country like "'.$_POST['country'].'"';
	
	if($_POST['fbalance'] != '' && $_POST['tbalance'] != '')
	{
		if($_POST['fbalance'] < $_POST['tbalance'])	$where[] = 'balance between '.$_POST['fbalance'].' and '.$_POST['tbalance'];
		else header('Location: ?c=search&message=m2');
	}
	elseif($_POST['fbalance'] == '' && $_POST['tbalance'] == '') {}
	elseif($_POST['fbalance'] != '' && $_POST['tbalance'] == '') $where[] = 'balance > '.$_POST['fbalance'];
	elseif($_POST['fbalance'] == '' && $_POST['tbalance'] != '') $where[] = 'balance < '.$_POST['tbalance'];
	
	if($_POST['fclicks'] != '' && $_POST['tclicks'] != '')
	{
		if($_POST['fclicks'] < $_POST['tclicks'])	$where[] = 'clicks between '.$_POST['fclicks'].' and '.$_POST['tclicks'];
		else header('Location: ?c=search&message=m2');
	}
	elseif($_POST['fclicks'] == '' && $_POST['tclicks'] == '') {}
	elseif($_POST['fclicks'] != '' && $_POST['tclicks'] == '') $where[] = 'clicks > '.$_POST['fclicks'];
	elseif($_POST['fclicks'] == '' && $_POST['tclicks'] != '') $where[] = 'clicks < '.$_POST['tclicks'];
	
	if(!empty($where)) $data = getAllDataFromTable('users',implode(' and ',$where),' order by username ASC');
	else $data = getAllDataFromTable('users','1',' order by username ASC');
}
?>