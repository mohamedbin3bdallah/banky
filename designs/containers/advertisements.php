<?php
$data = getAllUserAdTasks($where,$limit);
if(!empty($data))
{
?>
	<div class="row" style="margin-bottom:15px;">
		<div class="col-sm-12">
			<h4 style="text-align:center;">Please make sure to click all ads in order to collect your referrals money.</h4>
		</div>
	</div>
	
	<?php if(exist('viewadvertisements','where viewad = 0 and uid = '.$_SESSION['uid'].' and createday = CURDATE() - INTERVAL 1 DAY')) { ?>
	<div class="row" style="margin-bottom:15px;">
		<div class="col-sm-12">
			<h4 style="text-align:center; color:red;">You will NOT recieve any referral money today for net viewing your ads yesterday.</h4>
		</div>
	</div>
	<?php } ?>

	<div class="row">
	<?php for($i=0;$i<sizeof($data);$i++) {	?>
		<div class="col-sm-4">
			<?php if($data[$i]['viewad'] == 0) { ?>
				<table class="table table-bordered">
					<tr style="background-color: #088A08; color: #fff;"><td><?php echo $data[$i]['title']; ?></td><td><?php echo $data[$i]['plan']; ?></td></tr>
					<tr style="background-color: #F5F6CE; height: 100px;"><td colspan="2"><a href="?c=advertisement&ad=<?php echo $data[$i]['viewid']; ?>" target="_blank"><?php echo $data[$i]['description']; ?></a></td></tr>
					<!--<tr style="background-color: #F5F6CE;"><td><a href="?c=advertisement&ad=<?php echo $data[$i]['id']; ?>"><?php echo $data[$i]['ad']; ?></a></td></tr>-->
				</table>
			<?php } else { ?>
				<table class="table table-bordered">
					<tr style="background-color: #6E6E6E; color: #fff;"><td><?php echo $data[$i]['title']; ?></td><td><?php echo $data[$i]['plan']; ?></td></tr>
					<tr style="background-color: #E6E6E6; height: 100px;"><td colspan="2"><a href="?c=advertisement&ad=<?php echo $data[$i]['viewid']; ?>" target="_blank"><?php echo $data[$i]['description']; ?></a></td></tr>
					<!--<tr style="background-color: #E6E6E6;"><td><?php echo $data[$i]['ad']; ?></td></tr>-->
				</table>
			<?php } ?>
		</div>
	<?php } ?>
	</div>
	
	<div class="row">
		<div class="col-sm-4<?php if($lang == 'ar') echo ' col-sm-push-8'; ?>">
		</div>
		<div class="col-sm-8<?php if($lang == 'ar') echo ' col-sm-pull-4'; ?>">
			<nav>
				<ul class="pagination">
					<?php if($totalPages > 1) { ?><li><a href="?c=advertisements&page=1"><?php language("first"); ?></a></li><?php } ?>
					<?php if($page > 3) { ?><li>
						<a href="?c=advertisements&page=<?php echo $page-2; ?>" aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
						</a>
					</li><?php } ?>
					<?php if($page > 1) { ?><li><a href="?c=advertisements&page=<?php echo $page-1; ?>"><?php echo $page-1; ?></a></li><?php } ?>
					<?php if($totalPages > 1) { ?><li><a href="?c=advertisements&page=<?php echo $page; ?>"><?php echo $page; ?></a></li><?php } ?>
					<?php if($page < $totalPages) { ?><li><a href="?c=advertisements&page=<?php echo $page+1; ?>"><?php echo $page+1; ?></a></li><?php } ?>
					<?php if($page < $totalPages-1) { ?><li>
						<a href="?c=advertisements&page=<?php echo $page+2; ?>" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
						</a>
					</li><?php } ?>
					<?php if($totalPages > 1) { ?><li><a href="?c=advertisements&page=<?php echo $totalPages; ?>"><?php language("last"); ?></a></li><?php } ?>
				</ul>
			</nav>
		</div>
	</div>
	
<?php
}
else
{
	language('nodata');
}
?>