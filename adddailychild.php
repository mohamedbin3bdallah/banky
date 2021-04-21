<?php
if(isset($_GET['excode']) && $_GET['excode'] == 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3')
{
function getAllDataFromTable($select,$table,$where,$limit)
{
	include("libs/config.php");
	include("libs/opendb.php");
	$result = mysql_query("select $select from {$table} $where $limit");
	$allrows = array();	
	if(!empty($result))
	{
		for($i=0; $row = mysql_fetch_array($result); $i++)
		{
			$allrows[$i] = $row;
		}
	}
	include("libs/closedb.php");
	return $allrows;
}

function update($table,$set,$where)
{
	include("libs/config.php");
	include("libs/opendb.php");	
	$stmt = mysql_query("update {$table} $set $where");
	include("libs/closedb.php");
}

function exist($table,$where)
{
	include("libs/config.php");
	include("libs/opendb.php");
	$result = mysql_query("select count(id) as count from {$table} $where");
	$row = mysql_fetch_array($result);
	include("libs/closedb.php");
	if(isset($row['count']) && $row['count'] > 0) return 1;
	else return 0;
}

$data = getAllDataFromTable('id,childs,level4,repay,daybalance','users','where advertiser = 0','');
//print_r($data);
if(!empty($data))
{
	?><pre><?php //print_r($data); ?></pre><?php
	for($i=0;$i<count($data);$i++)
	{
		if($data[$i]['childs'] == '')
		{
			update('users','set balance = ROUND(balance+'.$data[$i]['daybalance'].',2) , total = ROUND(total+'.$data[$i]['daybalance'].',2)','where id = '.$data[$i]['id']);
		}
		elseif(substr_count($data[$i]['childs'],',') == 0)
		{
			if(!exist('viewadvertisements','where viewad = 0 and uid = '.$data[$i]['id'].' and createday = CURDATE() - INTERVAL 1 DAY'))
			{
				$child[$i] = getRowFromTable('daybalance','users','where username like "'.$data[$i]['childs'].'"','');
				update('users','set balance = ROUND(balance+'.$data[$i]['daybalance'].'+'.$child[$i]['daybalance'].',2) , total = ROUND(total+'.$data[$i]['daybalance'].'+'.$child[$i]['daybalance'].',2)','where id = '.$data[$i]['id']);
			}
			else update('users','set balance = ROUND(balance+'.$data[$i]['daybalance'].',2) , total = ROUND(total+'.$data[$i]['daybalance'].',2)','where id = '.$data[$i]['id']);
		}
		else
		{
			if(!exist('viewadvertisements','where viewad = 0 and uid = '.$data[$i]['id'].' and createday = CURDATE() - INTERVAL 1 DAY'))  
			{
				$child[$i] = getRowFromTable('sum(daybalance) as daybalance','users','where username in ("'.str_replace(',','","',$data[$i]['childs']).'")','');
				if($data[$i]['level4'] != '' && $data[$i]['repay'] == '1') $level4[$i] = getRowFromTable('sum(daybalance) as daybalance','users','where username in ("'.str_replace(',','","',$data[$i]['level4']).'")','');
				else $level4[$i]['daybalance'] = 0;
				update('users','set balance = ROUND(balance+'.$data[$i]['daybalance'].'+'.$child[$i]['daybalance'].'+'.$level4[$i]['daybalance'].',2) , total = ROUND(total+'.$data[$i]['daybalance'].'+'.$child[$i]['daybalance'].'+'.$level4[$i]['daybalance'].',2)','where id = '.$data[$i]['id']);
			}
			else update('users','set balance = ROUND(balance+'.$data[$i]['daybalance'].',2) , total = ROUND(total+'.$data[$i]['daybalance'].',2)','where id = '.$data[$i]['id']);
		}
	}
}
}
?>