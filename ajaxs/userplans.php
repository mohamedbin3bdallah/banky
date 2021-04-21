<?php

if(isset($_POST['id']))
{
	$id = $_POST['id'];
	include("../libs/config.php");
	include("../libs/opendb.php");
	$result = mysql_query("select * from userpayads where uid = '$id' and payed = 1 and adnumber > 0 order by title ASC");
	if(!empty($result))
	{
		for($i=0; $row = mysql_fetch_array($result); $i++)
		{
			echo '<option value="'.$row['id'].'|'.$row['clicks'].'">'.$row['title'].' (Ads #: '.$row['adnumber'].' Clicks #: '.$row['clicks'].' )'.'</option>';
		}
	}
	else echo 0;
	exit;
}
?>