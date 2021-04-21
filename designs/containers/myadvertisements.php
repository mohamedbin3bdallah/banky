<div class="row" style="margin-bottom: 15px;">	
	<?php if(checkAddAdsByUser($_SESSION['uid'])){ ?>
		<div class="col-sm-4 col-sm-offset-2">
			<center><button class="btn btn-default" onclick="location.href = '?c=addadvertisement';"><?php language('addadvertisement'); ?></button></center>
		</div>
		<div class="col-sm-4">
			<center><button class="btn btn-default" onclick="location.href = '?c=buyadvertisements';"><?php language('buyadvertisements'); ?></button></center>
		</div>
	<?php } else { ?>
		<div class="col-sm-4 col-sm-offset-4">
			<center><button class="btn btn-default" onclick="location.href = '?c=buyadvertisements';"><?php language('buyadvertisements'); ?></button></center>
		</div>
	<?php } ?>	
</div>

<?php
$data = getAllDataFromTable('advertisements',$where,$limit);
if(!empty($data))
{
?>
	<div class="row">
	<?php for($i=0;$i<sizeof($data);$i++) { ?>
		<div class="col-sm-4">
			<table class="table table-bordered">
				<tr style="background-color: #088A08; color: #fff;"><td><?php echo $data[$i]['title']; ?></td><td><?php echo $data[$i]['plan']; ?></td></tr>
				<tr style="background-color: #F5F6CE; height: 100px;"><td colspan="2"><a href="?c=myadvertisement&ad=<?php echo $data[$i]['id']; ?>"><?php echo $data[$i]['description']; ?></a></td></tr>
				<tr style="background-color: #F5F6CE;"><td colspan="2"><a href="?c=adviewers&ad=<?php echo $data[$i]['id']; ?>"><?php language('views'); echo ' : '.$data[$i]['views']; ?></a></td></tr>
			</table>
		</div>
	<?php } ?>
	</div>
	
	<div class="row">
		<div class="col-sm-4<?php if($lang == 'ar') echo ' col-sm-push-8'; ?>">
		</div>
		<div class="col-sm-8<?php if($lang == 'ar') echo ' col-sm-pull-4'; ?>">
			<nav>
				<ul class="pagination">
					<?php if($totalPages > 1) { ?><li><a href="?c=myadvertisements&page=1"><?php language("first"); ?></a></li><?php } ?>
					<?php if($page > 3) { ?><li>
						<a href="?c=myadvertisements&page=<?php echo $page-2; ?>" aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
						</a>
					</li><?php } ?>
					<?php if($page > 1) { ?><li><a href="?c=myadvertisements&page=<?php echo $page-1; ?>"><?php echo $page-1; ?></a></li><?php } ?>
					<?php if($totalPages > 1) { ?><li><a href="?c=myadvertisements&page=<?php echo $page; ?>"><?php echo $page; ?></a></li><?php } ?>
					<?php if($page < $totalPages) { ?><li><a href="?c=myadvertisements&page=<?php echo $page+1; ?>"><?php echo $page+1; ?></a></li><?php } ?>
					<?php if($page < $totalPages-1) { ?><li>
						<a href="?c=myadvertisements&page=<?php echo $page+2; ?>" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
						</a>
					</li><?php } ?>
					<?php if($totalPages > 1) { ?><li><a href="?c=myadvertisements&page=<?php echo $totalPages; ?>"><?php language("last"); ?></a></li><?php } ?>
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