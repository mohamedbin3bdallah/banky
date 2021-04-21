<?php
include('libs/buyadvertisements.php');
$system = getAllDataFromTable('system','','');

if(isset($_POST['buyadvertisementsubmit']))
{
	//print_R($_POST);
	$arr = explode("|",$_POST['plan']);
	
	$paymethod = $_POST['paymethod'];
	unset($_POST['buyadvertisementsubmit'],$_POST['plan'],$_POST['paymethod']);
	$_POST['uid'] = $_SESSION['uid'];
	$_POST['planid'] = $arr[0];
	$_POST['cost'] = $arr[1]*$_POST['adnumber']*$_POST['clicks'];
	$_POST['title'] = $arr[2];
	$_POST['clicks'] = $_POST['clicks'];
	$_POST['time'] = time();
	//$_POST['endday'] = date('Y-m-j', strtotime(' +'.$_POST['admonths'].' months'));
	$id = insertRow('userpayads',$_POST);
	if($id)
	{
		if($paymethod == 1) header('Location: ?c=buyadvertisements&message=m17');
		elseif($paymethod == 2)
		{
			$get = file_get_contents("https://www.google.com/finance/converter?a=".$arr[1]."&from=EGP&to=".$system[0]['currency_code']);
			$get = explode("<span class=bld>",$get);
			$get = explode("</span>",$get[1]);  
			$arr[1] = number_format(preg_replace("/[^0-9\.]/", null, $get[0]),2);
			echo '<div id="submitDiv"></div>';
		}
	}
	else
	{
		unset($arr,$_POST);
		header('Location: ?c=buyadvertisements&message=m5');
	}
	?>
	<head>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script type="text/javascript">
		$(document).ready(function(){
		$('#submitDiv').show(function(e) {
		var charset = 'utf-8';
		var cmd = '_xclick';
		var rm = '2';
		var business = "<?php echo $system[0]['paypalemail']; ?>";
		var item_name = "Banky Plan";
		var item_number = "";
		var amount = "<?php echo $arr[1]*$_POST['clicks']; ?>";
		var quantity = "<?php echo $_POST['adnumber']; ?>";		
		var currency_code = "<?php echo $system[0]['currency_code']; ?>";
		var no_shipping = 1;
		var handling = 0;
		var cancel_return = "<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/pay_cancel.php'; ?>";
		var success_return = "<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/pay_success.php?c='.$id; ?>";
		
		var actionForm = $('<form>', {'action': 'https://www.paypal.com/cgi-bin/webscr', 'method': 'POST'}).append($('<input>', {'name': 'charset', 'value': charset, 'type': 'hidden'}), $('<input>', {'name': 'cmd', 'value': cmd, 'type': 'hidden'}), $('<input>', {'name': 'rm', 'value': rm, 'type': 'hidden'}), $('<input>', {'name': 'business', 'value': business, 'type': 'hidden'}), $('<input>', {'name': 'item_name', 'value': item_name, 'type': 'hidden'}), $('<input>', {'name': 'item_number', 'value': item_number, 'type': 'hidden'}), $('<input>', {'name': 'amount', 'value': amount, 'type': 'hidden'}), $('<input>', {'name': 'quantity', 'value': quantity, 'type': 'hidden'}), $('<input>', {'name': 'currency_code', 'value': currency_code, 'type': 'hidden'}), $('<input>', {'name': 'no_shipping', 'value': no_shipping, 'type': 'hidden'}), $('<input>', {'name': 'handling', 'value': handling, 'type': 'hidden'}), $('<input>', {'name': 'cancel_return', 'value': cancel_return, 'type': 'hidden'}), $('<input>', {'name': 'success_return', 'value': success_return, 'type': 'hidden'}));
		actionForm.submit();
		});
		});
		</script>
	</head>
	<?php
}

?>