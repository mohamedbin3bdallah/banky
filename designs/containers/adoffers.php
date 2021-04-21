<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="js/jquery-1.11.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

	<div class="row">	
		<div class="col-md-8 col-md-offset-2">
			<form class="form-horizontal" action="admin.php?c=adoffers" method="POST" enctype="multipart/form-data" autocomplete="off">
				<?php
					if(isset($_GET['message']) && $_GET['message'] != '') { echo '<h2 style="text-align:center; color: green;">'; language($_GET['message']); echo '</h2>'; }
				?>
				<div class="form-group">
				<label for="user" class="col-sm-2 control-label"><?php language('user'); ?></label>
					<div class="col-sm-10">
						<select class="form-control" name="uid" id="uid" required/>
							<?php $data = getAllDataFromTable('*','users','where advertiser = 0 and active = 1',' order by username ASC'); for($j=0;$j<count($data);$j++) { echo '<option value="'.$data[$j]['id'].'">'.$data[$j]['username'].'</option>'; } ?>
						</select>
					</div>
				</div>
				<div class="form-group">
				<label for="type" class="col-sm-2 control-label"><?php language('type'); ?></label>
					<div class="col-sm-10">
						<select class="form-control" name="type" id="type" required/>
							<option value="clicks"><?php language('clicks'); ?></option>
							<option value="money"><?php language('money'); ?></option>
						</select>
					</div>
				</div>
				<div class="form-group">
				<label for="offer" class="col-sm-2 control-label"><?php language('offer'); ?></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="offer" id="offer" placeholder="<?php language("offer"); ?>" autocomplete="off" required/>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<input type="submit" class="btn btn-default" name="offersubmit" id="offersubmit" value="<?php language("save"); ?>" />
					</div>
				</div>
			</form>
		</div>
	</div>

<?php
$data = getAllDataFromTable('offers.id as id,offers.type as type,offers.offer as offer,offers.time as time,users.username as user,admins.username as admin','offers',$where,$limit);
if(!empty($data))
{
?>
	<div class="row">
		<div class="col-md-12 table-responsive">
			<table class="table table-bordered table-striped">
				<tr class="info">
					<th><?php language('admin'); ?></th>
					<th><?php language('user'); ?></th>
					<th><?php language('type'); ?></th>
					<th><?php language('offer'); ?></th>
					<th><?php language('time'); ?></th>
				</tr>
				<?php	for($i=0;$i<sizeof($data);$i++)	{	?>
					<tr id="tr-<?php echo $data[$i]['id'];?>">
						<td><?php echo $data[$i]['admin']; ?></td>
						<td><?php echo $data[$i]['user']; ?></td>
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
					<?php if($totalPages > 1) { ?><li><a href="?c=adoffers&page=1"><?php language("first"); ?></a></li><?php } ?>
					<?php if($page > 3) { ?><li>
						<a href="?c=adoffers&page=<?php echo $page-2; ?>" aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
						</a>
					</li><?php } ?>
					<?php if($page > 1) { ?><li><a href="?c=adoffers&page=<?php echo $page-1; ?>"><?php echo $page-1; ?></a></li><?php } ?>
					<?php if($totalPages > 1) { ?><li><a href="?c=adoffers&page=<?php echo $page; ?>"><?php echo $page; ?></a></li><?php } ?>
					<?php if($page < $totalPages) { ?><li><a href="?c=adoffers&page=<?php echo $page+1; ?>"><?php echo $page+1; ?></a></li><?php } ?>
					<?php if($page < $totalPages-1) { ?><li>
						<a href="?c=adoffers&page=<?php echo $page+2; ?>" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
						</a>
					</li><?php } ?>
					<?php if($totalPages > 1) { ?><li><a href="?c=adoffers&page=<?php echo $totalPages; ?>"><?php language("last"); ?></a></li><?php } ?>
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