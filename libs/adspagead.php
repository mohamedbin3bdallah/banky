<?php

function delTree($dir)
{
	$files = array_diff(scandir($dir), array('.','..')); 
    foreach ($files as $file) { 
    (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
    }
    rmdir($dir);
}

function upload_profile_picture()
{
	$file_extn = pathinfo($_FILES['ad']['name'], PATHINFO_EXTENSION);
	$types = array("image/jpg","image/jpeg","image/gif","image/png");

	if(in_array($_FILES["ad"]["type"], $types))
	{
		$image_director = "uploads/advertisement";
		if(!is_dir($image_director)) $create_director = mkdir($image_director);
		//if(!is_dir($image_director.'/thumbnail')) $create_director = mkdir($image_director.'/thumbnail');
		$_FILES["ad"]["name"] = rand().'.'.$file_extn;
		move_uploaded_file($_FILES["ad"]["tmp_name"], $image_director.'/'.$_FILES["ad"]["name"]);
		/*$resizeObj = new Resize($image_director.'/'.$_FILES["ad"]["name"]);
		$resizeObj -> resizeImage(250, 250, 'exact');
		$resizeObj -> saveImage($image_director.'/thumbnail/'.$_FILES["ad"]["name"], 100);*/
		return 1;
	}
	else return 0;
}

?>