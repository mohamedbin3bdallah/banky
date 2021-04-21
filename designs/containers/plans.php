<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="js/jquery-1.11.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

	<div class="col">	
		<div class="col-md-8 col-md-offset-2">
			<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data" autocomplete="off">
				<?php
					if(isset($_GET['message']) && $_GET['message'] != '') { echo '<h2 style="text-align:center; color: green;">'; language($_GET['message']); echo '</h2>'; }
					if(isset($_GET['id'])) echo '<input type="hidden" name="oldid" value="'.$_GET['id'].'">';
				?>
				<div class="form-group">
				<label for="title" class="col-sm-2 control-label"><?php language('title'); ?></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="title" id="title" value="<?php if(isset($plan['title'])) echo $plan['title']; ?>" maxlength="20" placeholder="<?php language("title"); ?>" autocomplete="off" required/>
					</div>
				</div>
				<div class="form-group">
				<label for="pay" class="col-sm-4 control-label">Pay Per View</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="pay" id="pay" value="<?php if(isset($plan['pay'])) echo $plan['pay']; ?>" maxlength="255" placeholder="Pay Per View" autocomplete="off" required/>
					</div>
					<div class="col-sm-2">
						EGP
					</div>
				</div>
				<div class="form-group">
				<label for="cost" class="col-sm-4 control-label">Cost Per View</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="cost" id="cost" value="<?php if(isset($plan['cost'])) echo $plan['cost']; ?>" placeholder="Cost Per View" autocomplete="off" required/>
					</div>
					<div class="col-sm-2">
						EGP
					</div>
				</div>
				<div class="form-group">
				<label for="pay" class="col-sm-4 control-label"><?php language('timer'); ?> By Seconds</label>
					<div class="col-sm-8">
						<input type="number" class="form-control" name="timer" id="timer" min="1" step="1" autocomplete="off" required/>
					</div>
				</div>
				<div class="form-group">
				<label for="cost" class="col-sm-2 control-label"><?php language('active'); ?></label>
					<div class="col-sm-10">
						<input type="checkbox" name="active" id="active" <?php if(isset($plan['active']) && $plan['active'] == 1) echo 'checked'; ?> />
					</div>
				</div>
				<div class="form-group">
					<!--<tr><td id="noborder"><input type="checkbox" name="remember" class="remember" id="remember" <?php if(isset($POST['remember']) && $POST['remember'] != ""){ echo "checked"; } ?>> <?php language(" ").language("remember"); ?></td></tr>-->
					<!--<tr><td id="noborder"><a href="forgotpassword.php"><?php language(" ").language("forgotpass"); ?></a></td></tr>-->
					<div class="col-sm-offset-2 col-sm-10">
						<input type="submit" class="btn btn-default" name="plansubmit" id="plansubmit" value="<?php language("save"); ?>" />
					</div>
				</div>
			</form>
		</div>
	</div>

<?php
$data = getAllDataFromTable('plans',$where,$limit);
if(!empty($data))
{
?>
	<div class="row">
		<div class="col-md-12 table-responsive">
			<table class="table table-bordered table-striped">
				<tr class="info">
					<th><?php language('title'); ?></th>
					<th>Pay Per View</th>
					<th>Cost Per View</th>
					<th><?php language('timer'); ?> By Seconds</th>
					<th><?php language('active'); ?></th>
					<th><?php language('edit'); ?></th>
					<th><?php language('delete'); ?></th>
				</tr>
				<?php	for($i=0;$i<sizeof($data);$i++)	{	?>
					<tr id="tr-<?php echo $data[$i]['id'];?>">
						<td><?php echo $data[$i]['title']; ?></td>
						<td><?php echo $data[$i]['pay'].' EGP'; ?></td>
						<td><?php echo $data[$i]['cost'].' EGP'; ?></td>
						<td><?php echo $data[$i]['timer']; ?></td>
						<td><input type="checkbox" <?php if($data[$i]['active'] == 1) echo 'checked'; ?> disabled /></td>
						<td><a href="admin.php?c=plans&id=<?php echo $data[$i]['id']; ?>" style="color: green;"><i style="color:green;" class="glyphicon glyphicon-edit"></i></a></td>
						<td>
							<i id="<?php echo $data[$i]['id'];?>" style="color:red;" class="plandel glyphicon glyphicon-remove-circle"></i>
							<div id="plan-<?php echo $data[$i]['id'];?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-sm">
									<div class="modal-content">
										<div class="modal-header">
											<?php language('deleteplanmodal'); ?>
											<br>
        								</div>
										<div class="modal-body">
										<center>
											<button class="btn btn-danger" onclick="deleteplan('<?php echo $data[$i]['id'];?>')" data-dismiss="modal"><?php language('agree'); ?></button>
											<button class="btn btn-success" data-dismiss="modal" aria-hidden="true"><?php language('no'); ?></button>
										</center>
										</div>
									</div>
								</div>
							</div>
						</td>
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
					<?php if($totalPages > 1) { ?><li><a href="?c=plans&page=1"><?php language("first"); ?></a></li><?php } ?>
					<?php if($page > 3) { ?><li>
						<a href="?c=plans&page=<?php echo $page-2; ?>" aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
						</a>
					</li><?php } ?>
					<?php if($page > 1) { ?><li><a href="?c=plans&page=<?php echo $page-1; ?>"><?php echo $page-1; ?></a></li><?php } ?>
					<?php if($totalPages > 1) { ?><li><a href="?c=plans&page=<?php echo $page; ?>"><?php echo $page; ?></a></li><?php } ?>
					<?php if($page < $totalPages) { ?><li><a href="?c=plans&page=<?php echo $page+1; ?>"><?php echo $page+1; ?></a></li><?php } ?>
					<?php if($page < $totalPages-1) { ?><li>
						<a href="?c=plans&page=<?php echo $page+2; ?>" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
						</a>
					</li><?php } ?>
					<?php if($totalPages > 1) { ?><li><a href="?c=plans&page=<?php echo $totalPages; ?>"><?php language("last"); ?></a></li><?php } ?>
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