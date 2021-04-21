<?php
if(isset($_SESSION['lang']))
{	
	$lang = $_SESSION['lang'];
	include("languages/$lang.php");
}
else
{
	$lang = 'en';
	include("languages/en.php");
}
?>