<?php
if(isset($_SESSION['lang'])) $lang = $_SESSION['lang'];
else $lang = 'en';
include('../languages/'.$lang.'.php');
if(isset($_POST['val']))
{	
	$val = $_POST['val'];
	if($val == 'url') { ?><input type="text" class="form-control" name="ad" id="ad" placeholder="<?php language("url"); ?>" autocomplete="off" required/><?php }
	elseif($val == 'image' || $val == 'video') { ?><input type="file" class="form-control" name="ad" id="ad" required/><?php }
   exit;
}
?>