<?php
include('libs/adadvertisement.php');

if(isset($_GET['ad']) && $_GET['ad'] != '') {}
else header('Location: ?c=adadvertisements');

?>