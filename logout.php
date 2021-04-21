<?php
session_start();
session_unset();
session_destroy();
unset($_COOKIE['uid'],$_COOKIE['advertiser']); setcookie('uid'); setcookie('advertiser'); setcookie('uid',""); setcookie('advertiser',"");
echo header('location: index.php');
?>