<?php
$data = getAllDataFromTable('offers',$where,$limit);
if(!empty($data))
{
?>
	<div class="row">
		<div class="col-md-12 table-responsive">
			<table class="table table-bordered table-striped">
				<tr class="info">
					<!--<th><?php //language('admin'); ?></th>
					<th><?php //language('user'); ?></th>-->
					<th><?php language('type'); ?></th>
					<th><?php language('offer'); ?></th>
					<th><?php language('time'); ?></th>
				</tr>
				<?php	for($i=0;$i<sizeof($data);$i++)	{	?>
					<tr id="tr-<?php echo $data[$i]['id'];?>">
						<!--<td><?php //echo getUsernameFromID('admins',$data[$i]['admin']); ?></td>
						<td><?php //echo getUsernameFromID('users',$data[$i]['uid']); ?></td>-->
						<td><?php echo $data[$i]['type']; ?></td>
						<td><?php echo $data[$i]['offer']; ?></td>
						<td><?php echo date('Y-m-d ||| h:i:sa', $data[$i]['time']); ?></td>
					</tr>
					
				<?php	} ?>
			</table>
		</div>
	</div>
						
	<div class="row">
		<div class="col-sm-4<?php if($lang == 'ar') echo ' col-sm-push-8'; ?>">
		</div>
		<div class="col-sm-8<?php if($lang == 'ar') echo ' col-sm-pull-4'; ?>">
			<nav>
				<ul class="pagination">
					<?php if($totalPages > 1) { ?><li><a href="?c=offers&page=1"><?php language("first"); ?></a></li><?php } ?>
					<?php if($page > 3) { ?><li>
						<a href="?c=offers&page=<?php echo $page-2; ?>" aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
						</a>
					</li><?php } ?>
					<?php if($page > 1) { ?><li><a href="?c=offers&page=<?php echo $page-1; ?>"><?php echo $page-1; ?></a></li><?php } ?>
					<?php if($totalPages > 1) { ?><li><a href="?c=offers&page=<?php echo $page; ?>"><?php echo $page; ?></a></li><?php } ?>
					<?php if($page < $totalPages) { ?><li><a href="?c=offers&page=<?php echo $page+1; ?>"><?php echo $page+1; ?></a></li><?php } ?>
					<?php if($page < $totalPages-1) { ?><li>
						<a href="?c=offers&page=<?php echo $page+2; ?>" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
						</a>
					</li><?php } ?>
					<?php if($totalPages > 1) { ?><li><a href="?c=offers&page=<?php echo $totalPages; ?>"><?php language("last"); ?></a></li><?php } ?>
				</ul>
			</nav>
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