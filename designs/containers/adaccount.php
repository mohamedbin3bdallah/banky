<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="js/jquery-1.11.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

	<div class="col">
		<div class="col-md-8 col-md-offset-2">
			<form class="form-horizontal" action="admin.php?c=adaccount" method="POST" enctype="multipart/form-data" autocomplete="off">
				<?php
					if(isset($_GET['message']) && $_GET['message'] != '') { echo '<h2 style="text-align:center; color: green;">'; language($_GET['message']); echo '</h2>'; }
					if(isset($_GET['id'])) echo '<input type="hidden" name="oldid" value="'.$_GET['id'].'">';
				?>
				<div class="form-group">
				<label for="username" class="col-sm-2 control-label"><?php language('username'); ?></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="username" id="username" value="<?php if(isset($admin['username'])) echo $admin['username']; ?>" maxlength="100" placeholder="<?php language("username"); ?>" autocomplete="off" required/>
					</div>
				</div>
				<div class="form-group">
				<label for="password" class="col-sm-2 control-label"><?php language('password'); ?></label>
					<div class="col-sm-10">
						<input type="password" class="form-control" name="password" id="password" placeholder="<?php language("password"); ?>" autocomplete="off" />
					</div>
				</div>
				<div class="form-group">
				<label for="cmfpassword" class="col-sm-2 control-label"><?php language('cmfpassword'); ?></label>
					<div class="col-sm-10">
						<input type="password" class="form-control" name="cmfpassword" id="cmfpassword" placeholder="<?php language("cmfpassword"); ?>" autocomplete="off" />
					</div>
				</div>
				<div class="form-group">
				<label for="super" class="col-sm-2 control-label"><?php language('super'); language(' '); language('admin'); ?></label>
					<div class="col-sm-10">
						<input type="checkbox" name="super" id="super" <?php if(isset($admin['super']) && $admin['super'] == 1) echo 'checked'; ?> />
					</div>
				</div>
				<div class="form-group">
				<label for="active" class="col-sm-2 control-label"><?php language('active'); ?></label>
					<div class="col-sm-10">
						<input type="checkbox" name="active" id="active" <?php if(isset($admin['active']) && $admin['active'] == 1) echo 'checked'; ?> />
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<input type="submit" class="btn btn-default" name="adminsubmit" id="adminsubmit" value="<?php language("save"); ?>" />
					</div>
				</div>
			</form>
		</div>
	</div>

<?php
$data = getAllDataFromTable('admins',$where,$limit);
if(!empty($data))
{
?>
	<div class="row">
		<div class="col-md-12 table-responsive">
			<table class="table table-bordered table-striped">
				<tr class="info">
					<th><?php language('username'); ?></th>
					<th><?php language('super'); language(' '); language('admin'); ?></th>
					<th><?php language('active'); ?></th>
					<th><?php language('edit'); ?></th>
					<th><?php language('delete'); ?></th>
				</tr>
				<?php	for($i=0;$i<sizeof($data);$i++)	{	?>
					<tr id="tr-<?php echo $data[$i]['id'];?>">
						<td><?php echo $data[$i]['username']; ?></td>
						<td><input type="checkbox" <?php if($data[$i]['super'] == 1) echo 'checked'; ?> disabled /></td>
						<td><input type="checkbox" <?php if($data[$i]['active'] == 1) echo 'checked'; ?> disabled /></td>
						<td><a href="admin.php?c=adaccount&id=<?php echo $data[$i]['id']; ?>" style="color: green;"><i style="color:green;" class="glyphicon glyphicon-edit"></i></a></td>
						<td>
							<i id="<?php echo $data[$i]['id'];?>" style="color:red;" class="admindel glyphicon glyphicon-remove-circle"></i>
							<div id="admin-<?php echo $data[$i]['id'];?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-sm">
									<div class="modal-content">
										<div class="modal-header">
											<?php language('deleteadminmodal'); ?>
											<br>
        								</div>
										<div class="modal-body">
										<center>
											<button class="btn btn-danger" onclick="deleteadmin('<?php echo $data[$i]['id'];?>')" data-dismiss="modal"><?php language('agree'); ?></button>
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
					<?php if($totalPages > 1) { ?><li><a href="?c=adaccount&page=1"><?php language("first"); ?></a></li><?php } ?>
					<?php if($page > 3) { ?><li>
						<a href="?c=adaccount&page=<?php echo $page-2; ?>" aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
						</a>
					</li><?php } ?>
					<?php if($page > 1) { ?><li><a href="?c=adaccount&page=<?php echo $page-1; ?>"><?php echo $page-1; ?></a></li><?php } ?>
					<?php if($totalPages > 1) { ?><li><a href="?c=adaccount&page=<?php echo $page; ?>"><?php echo $page; ?></a></li><?php } ?>
					<?php if($page < $totalPages) { ?><li><a href="?c=adaccount&page=<?php echo $page+1; ?>"><?php echo $page+1; ?></a></li><?php } ?>
					<?php if($page < $totalPages-1) { ?><li>
						<a href="?c=adaccount&page=<?php echo $page+2; ?>" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
						</a>
					</li><?php } ?>
					<?php if($totalPages > 1) { ?><li><a href="?c=adaccount&page=<?php echo $totalPages; ?>"><?php language("last"); ?></a></li><?php } ?>
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