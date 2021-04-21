<?php
include('libs/getbalance.php');

if(isset($_GET['pay']))
{
	if(isset($_SERVER['HTTP_REFERER']))
	{
	$arr = explode('/', $_SERVER['HTTP_REFERER']);
	if($arr[count($arr)-1] == 'page.php?c=statistics')
	{
	$user = getRowFromTable('users',' where id = '.$_SESSION['uid'],'');
	$system = getRowFromTable('system','','');
	
	if(!empty($user) && $user['balance'] != 0)
	{
		if($_GET['pay'] == 'delivery')
		{
			if($user['bankaccount'] != '')
			{
				if(insertRow('deliveries', array('uid'=>$_SESSION['uid'], 'balance'=> $user['balance'], 'time'=> time())))
				{
					update('users',' set balance = 0',' where id = '.$_SESSION['uid']);
					header('Location: page.php?c=getbalance&message=m1');
				}
				else header('Location: page.php?c=getbalance&message=m2');
			}
			else header('Location: page.php?c=bankaccount&message=m16');
		}
		elseif($_GET['pay'] == 'paypal')
		{
			if($user['paypalemail'] != '')
			{
				$get = file_get_contents("https://www.google.com/finance/converter?a=".$user['balance']."&from=EGP&to=".$system['currency_code']);
				$get = explode("<span class=bld>",$get);
				$get = explode("</span>",$get[1]);  
				$user['balance'] = number_format(preg_replace("/[^0-9\.]/", null, $get[0]),2);
				echo '<div id="submitDiv"></div>';	
				?>
				<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
				<script type="text/javascript">
				$(document).ready(function(){
				$('#submitDiv').show(function(e) {
				var charset = 'utf-8';
				var cmd = '_xclick';
				var rm = '2';
				var business = "<?php echo $user['paypalemail']; ?>";
				var item_name = "Banky Plan Balance";
				var item_number = "";
				var amount = "<?php echo $user['balance']; ?>";
				var quantity = "1";		
				var currency_code = "<?php echo $system['currency_code']; ?>";
				var no_shipping = 1;
				var handling = 0;
				var cancel_return = "<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/page.php?c=getbalance&message=m2'; ?>";
				var success_return = "<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/page.php?c=getbalance&message=m10'; ?>";
		
				var actionForm = $('<form>', {'action': 'https://www.paypal.com/cgi-bin/webscr', 'method': 'POST'}).append($('<input>', {'name': 'charset', 'value': charset, 'type': 'hidden'}), $('<input>', {'name': 'cmd', 'value': cmd, 'type': 'hidden'}), $('<input>', {'name': 'rm', 'value': rm, 'type': 'hidden'}), $('<input>', {'name': 'business', 'value': business, 'type': 'hidden'}), $('<input>', {'name': 'item_name', 'value': item_name, 'type': 'hidden'}), $('<input>', {'name': 'item_number', 'value': item_number, 'type': 'hidden'}), $('<input>', {'name': 'amount', 'value': amount, 'type': 'hidden'}), $('<input>', {'name': 'quantity', 'value': quantity, 'type': 'hidden'}), $('<input>', {'name': 'currency_code', 'value': currency_code, 'type': 'hidden'}), $('<input>', {'name': 'no_shipping', 'value': no_shipping, 'type': 'hidden'}), $('<input>', {'name': 'handling', 'value': handling, 'type': 'hidden'}), $('<input>', {'name': 'cancel_return', 'value': cancel_return, 'type': 'hidden'}), $('<input>', {'name': 'success_return', 'value': success_return, 'type': 'hidden'}));
				actionForm.submit();
				});
				});
				</script>
				<?php
			}
			else header('Location: page.php?c=paypalemail&message=m14');
		}
	}
	else header('Location: page.php?c=statistics&message=m15');
	}
	else header('Location: page.php?c=statistics&message=m2');
	}
	else header('Location: page.php?c=statistics&message=m2');
}
elseif(isset($_GET['message']) && $_GET['message'] == 'm10')
{
	update('users',' set balance = 0',' where id = '.$_SESSION['uid']);
}
elseif(isset($_GET['message']) && ($_GET['message'] == 'm1' || $_GET['message'] == 'm2'))
{
}
else
{
	header('Location: index.php');
}

?>