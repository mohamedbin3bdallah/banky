<div class="col-sm-4">
	<h3 class="profilr-main-menu">
		<?php language('menu'); ?>
	</h3>
	<ul class="nav sidebar-nav">
		<?php if($_SESSION['admin'] == 1) { ?><li><a href="admin.php?c=system"><?php language('system'); ?></a></li><?php } ?>
		<li><a href="admin.php?c=adspagead"><?php language('adspagead'); ?></a></li>
		<li><a href="admin.php?c=users"><?php language('users'); ?></a></li>
		<li><a href="admin.php?c=plans"><?php language('plans'); ?></a></li>
		<li><a href="admin.php?c=adstatistics"><?php language('adstatistics'); ?></a></li>
		<li><a href="admin.php?c=search"><?php language('search'); ?></a></li>
		<li><a href="admin.php?c=adadvertisements"><?php language('adadvertisements'); ?></a></li>
		<li><a href="admin.php?c=adoffers"><?php language('offers'); ?></a></li>
		<li><a href="admin.php?c=balances"><?php language('balances'); ?></a></li>
		<li><a href="admin.php?c=adaccpayment"><?php language('adaccpayment'); ?></a></li>
		<?php if($_SESSION['super']) { ?><li><a href="admin.php?c=adaccount"><?php language('adaccount'); ?></a></li><?php } ?>
		<li><a href="logout.php"><?php language('logout'); ?></a></li>
	</ul>
</div>