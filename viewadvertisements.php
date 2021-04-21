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

function insertRow($table,$row)
{
	include("libs/config.php");
	include("libs/opendb.php");
	$fquery = "insert into {$table} (";
	$lquery = " values (";
	foreach ($row as $key => $value)
	{
		$fquery .= $key;
		$lquery .= "'".$value."'";
		$data  = array_keys($row);
		$lastkey = array_pop($data);
		if($key != $lastkey) 
		{	
			$fquery .= ",";
			$lquery .= ",";
		}	
	}
	$fquery .= ")";
	$lquery .= ")";
	$query = $fquery.$lquery;
	$result = mysql_query($query);
	if($result) return mysql_insert_id();
	else return 0;
    /*include("libs/closedb.php");
	unset($data,$lastkey,$row,$fquery,$lquery,$query,$result);*/
}

$ads = getAllDataFromTable('id,country,age','advertisements',' where views < clicks','');
if(!empty($ads))
{
	?><pre><?php //print_r($ads); ?></pre><?php
	for($i=0;$i<count($ads);$i++)
	{
		$agearr[$i] = explode(',',$ads[$i]['age']);
		$age = '';
		if($agearr[$i][0] != '' && $agearr[$i][1] != '')
		{
			if($agearr[$i][0] == $agearr[$i][1]) $age .= ' and age = '.$agearr[$i][0];
			else $age .= ' and age between '.$agearr[$i][0].' and '.$agearr[$i][1];
		}
		elseif($agearr[$i][0] == '' && $agearr[$i][1] == '') $age .= '';
		elseif($agearr[$i][0] != '' && $agearr[$i][1] == '') $age .= ' and age > '.$agearr[$i][0];
		elseif($agearr[$i][0] == '' && $agearr[$i][1] != '') $age .= ' and age < '.$agearr[$i][1];
		?><pre><?php //print_r($age); ?></pre><?php
		$users = getAllDataFromTable('id,country','users',' where advertiser = 0'.$age,'');
		?><pre><?php //print_r($users); ?></pre><?php
		for($j=0;$j<count($users);$j++)
		{
			$view[$j]['createday'] = date('Y-m-d');
			if($ads[$i]['country'] == '' || $users[$j]['country'] == '')
			{
				$view[$j]['uid'] = $users[$j]['id'];
				$view[$j]['adid'] = $ads[$i]['id'];
				insertRow('viewadvertisements',$view[$j]);
			}
			elseif(strpos($ads[$i]['country'], $users[$j]['country']) !== false)
			{
				$view[$j]['uid'] = $users[$j]['id'];
				$view[$j]['adid'] = $ads[$i]['id'];
				insertRow('viewadvertisements',$view[$j]);
			}
			else {}
		}
	}
}
}
?>