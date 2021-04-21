<?php
if(isset($_SESSION['lang'])) $lang = $_SESSION['lang'];
else $lang = 'en';
include('../languages/'.$lang.'.php');

if(isset($_POST['username']))
{	
	$username = $_POST['username'];
	include("../libs/config.php");
	include("../libs/opendb.php");
	$result = mysql_query("select * from users where username = '$username'");
	$row = mysql_fetch_array($result);
	if(!empty($row)) {
		
		$id = $row['id'];
		$refresult = mysql_query("select count(*) as count from users where referral like '%$id%'");
		$refrow = mysql_fetch_array($refresult);
	?>
	<table class="table table-bordered">
		<tr class="info">
			<th><?php language('username'); ?></th>
			<th><?php language('email'); ?></th>
			<th><?php language('paypalemail'); ?></th>
			<th><?php language('country'); ?></th>
			<th><?php language('clicks'); ?></th>
			<th><?php language('balance'); ?></th>
			<th><?php language('total'); ?></th>
			<th><?php language('registerdate'); ?></th>
			<th><?php language('edit'); ?></th>
		</tr>
		<tr>
			<td><?php echo $row['username']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['paypalemail']; ?></td>
			<td><?php echo $row['country']; ?></td>
			<td><?php echo $row['clicks']; ?></td>
			<td><?php echo $row['balance'].' EGP'; ?></td>
			<td><?php echo $row['total'].' EGP'; ?></td>
			<td><?php echo date('Y-m-d', $row['time']); ?></td>
			<td><a href="admin.php?c=user&id=<?php echo $row['id']; ?>" style="color: green;"><i style="color:green;" class="glyphicon glyphicon-edit"></i></a></td>
		</tr>
	</table>
	<?php } else echo '';
	include("../libs/closedb.php");
   exit;
}
?>