<?php

function getNoOfRowsFromTable($table,$where)
{
	include("libs/config.php");
	include("libs/opendb.php");	
	$result = mysql_query("select count(*) as count from {$table} $where");
	$row = mysql_fetch_array($result);
	include("libs/closedb.php");
	return $row['count'];
}

function getAllDataFromTable($table,$where,$limit)
{
	include("libs/config.php");
	include("libs/opendb.php");
	$result = mysql_query("select * from {$table} $where $limit");
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

function getCountries()
{
	include("libs/config.php");
	include("libs/opendb.php");
	$result = mysql_query("select distinct country from users where country <> '' order by country ASC");
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

function checkAddAdsByUser($uid)
{
	include("libs/config.php");
	include("libs/opendb.php");	
	$result = mysql_query("select addads from users where id = '$uid'");
	$row = mysql_fetch_array($result);
	include("libs/closedb.php");
	return $row['addads'];
}

function upload_profile_picture($category)
{
	$file_extn = pathinfo($_FILES['ad']['name'], PATHINFO_EXTENSION);
	if($category == 'image') $types = array("image/jpg","image/jpeg","image/gif","image/png");
	elseif($category == 'video') $types = array("video/webm","video/mp4","video/ogg");
	else $types = array();
	if(in_array($_FILES["ad"]["type"], $types))
	{
		$image_director = "uploads/".date('Y-m-d');
		if(!is_dir($image_director)) $create_director = mkdir($image_director);
		if(!is_dir($image_director.'/'.$category)) $create_director = mkdir($image_director.'/'.$category);
		//if(!is_dir($image_director.'/thumbnail')) $create_director = mkdir($image_director.'/thumbnail');
		$_FILES["ad"]["name"] = rand().'.'.$file_extn;
		move_uploaded_file($_FILES["ad"]["tmp_name"], $image_director.'/'.$category.'/'.$_FILES["ad"]["name"]);
		/*$resizeObj = new Resize($image_director.'/'.$_FILES["ad"]["name"]);
		$resizeObj -> resizeImage(250, 250, 'exact');
		$resizeObj -> saveImage($image_director.'/thumbnail/'.$_FILES["ad"]["name"], 100);*/
		return $image_director.'/'.$category.'/'.$_FILES["ad"]["name"];
	}
	else return 0;
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

function update($table,$set,$where)
{
	include("libs/config.php");
	include("libs/opendb.php");	
	$stmt = mysql_query("update {$table} $set $where");
	if($stmt) return 1;
	else return 0;
	include("libs/closedb.php");
}

?>