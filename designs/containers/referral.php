<?php
$data = getRowFromTable('users','where id = '.$_SESSION['uid'],'');
if(!empty($data) && $data['username'] != '')
{
?>
   <div class="row" style="margin-bottom:55px;">
		<div class="col-md-12">
			<h3 style="text-align:center;">Invite your friends with this link to add them to your referrals</h3>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<h4 style="text-align:center;">http://127.0.0.1/banky/register.php?referral=<?php echo $data['username']; ?></h4>
		</div>
	</div>
<?php
}
else
{
	echo '<div class="row">';
		echo '<div class="col-md-8 col-md-offset-2">';
			language('nodata');
		echo '</div>';
	echo '</div>';
}
?>