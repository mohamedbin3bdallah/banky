<?php
include('libs/adstatistics.php');

$where = '';
if(isset($_POST['statisticssubmit']))
{
	unset($_POST['statisticssubmit']);
	if($_POST['from'] <= $_POST['to'])
	{
		$where .= ' where viewadvertisements.viewad = 1 ';
		
		if($_POST['category'] == 'daily') { $select = 'date as date'; $where .= ' and date between "'.$_POST['from'].'" and "'.$_POST['to'].'"'; $group = 'date'; }
		elseif($_POST['category'] == 'monthly') { $select = 'month(date) as date'; $where .= ' and year(date) = '.date('Y').' and month(date) between '.$_POST['from'].' and '.$_POST['to']; $group = 'month(date)'; }
		elseif($_POST['category'] == 'yearly') { $select = 'year(date) as date'; $where .= ' and year(date) between '.$_POST['from'].' and '.$_POST['to']; $group = 'year(date)'; }
		else header('Location: admin.php?c=adstatistics&message=m5');

		if($_POST['user'] != '') $where .= ' and viewadvertisements.uid = '.$_POST['user'];
		
		$where .= ' group by '.$group.',plans.id order by '.$group.',plans.id ASC';
		$data = getNoOfAllUserAdTasks($select,$where);
	}
	else header('Location: admin.php?c=adstatistics&message=m8');
}
?>