<?php
if(isset($_POST['id']))
{	
	$id = $_POST['id'];
	include("../libs/config.php");
	include("../libs/opendb.php");
	$result = mysql_query"select count(*) as count from userpayads where planid = '$id'");
	$row = mysql_fetch_array($result);
	if($row['count'] == 0)
	{
		$stmt = mysql_query("delete from plans where id = '$id'");
		echo 1;
	}
	else echo 'This Plan was used';
	include("../libs/closedb.php");
   exit;
}
?>