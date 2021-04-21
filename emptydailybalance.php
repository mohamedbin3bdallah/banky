<?php
if(isset($_GET['excode']) && $_GET['excode'] == 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3')
{

function update($table,$set,$where)
{
	include("libs/config.php");
	include("libs/opendb.php");	
	$stmt = mysql_query("update {$table} $set $where");
	include("libs/closedb.php");
}

update('users','set daybalance = ""','');
}
?>