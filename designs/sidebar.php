<?php if($_SESSION['advertiser'] == '0') { ?>
<div class="col-sm-4">

	<h3 class="profilr-main-menu">
		<?php language('advertisements'); ?>
	</h3>
	<ul class="nav sidebar-nav">
		<li><a href="page.php?c=advertisements"><?php language('advertisements'); ?></a></li>
		<li><a href="page.php?c=offers"><?php language('offers'); ?></a></li>
	</ul>
	
	<h3 class="profilr-main-menu">
		<?php language('account'); ?>
	</h3>
	<ul class="nav sidebar-nav">
		<!--<li><a href="page.php?c=tree"><?php //language('tree'); ?></a></li>-->
		<li><a href="page.php?c=statistics"><?php language('statistics'); ?></a></li>
		<li><a href="page.php?c=tree">Referral Link</a></li>
		<li><a href="page.php?c=account"><?php language('account'); ?></a></li>
		<li><a href="logout.php"><?php language('logout'); ?></a></li>
	</ul>

</div>
<?php } else { ?>
<div class="col-sm-4">

	<h3 class="profilr-main-menu">
		<?php language('advertisements'); ?>
	</h3>
	<ul class="nav sidebar-nav">
		<li><a href="page.php?c=myadvertisements"><?php language('myadvertisements'); ?></a></li>
	</ul>
	
	<h3 class="profilr-main-menu">
		<?php language('settings'); ?>
	</h3>
	<ul class="nav sidebar-nav">
		<li><a href="page.php?c=adveraccount"><?php language('account'); ?></a></li>
		<li><a href="logout.php"><?php language('logout'); ?></a></li>
	</ul>
	
</div>
<?php } ?>