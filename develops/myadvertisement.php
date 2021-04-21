<?php
include('libs/myadvertisement.php');

if(isset($_GET['ad']) && $_GET['ad'] != '') {}
else header('Location: ?c=advertisements');

?>