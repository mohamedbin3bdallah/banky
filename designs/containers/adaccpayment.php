<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="js/jquery-1.11.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			
			<ul class="nav nav-tabs nav-justified">
				<li class="active"><a data-toggle="tab" href="#waiting"><?php language('waiting'); ?></a></li>
				<li><a data-toggle="tab" href="#accepting"><?php language('accepting'); ?></a></li>
			</ul>
			
			<div class="tab-content" style="margin-top: 25px;">
				<div id="waiting" class="tab-pane fade in active">
				<?php
					$data = getAllDataFromTable('userpayads.id as id,userpayads.title as title,userpayads.adnumber as adnumber,userpayads.clicks as clicks,userpayads.cost as cost,userpayads.time as time,users.username as username,users.id as userid','userpayads',' inner join users on userpayads.uid = users.id where userpayads.payed = 0 order by userpayads.time DESC','');
					if(!empty($data))
					{
				?>
					<div class="row">
						<div class="col-md-12 table-responsive">
							<table class="table table-bordered table-striped">
								<tr class="info">
									<th><?php language('username'); ?></th>
									<th><?php language('plan'); ?></th>
									<th><?php language('adnumber'); ?></th>
									<th><?php language('clicks'); ?></th>
									<th><?php language('cost'); ?></th>
									<th><?php language('time'); ?></th>
									<th><?php language('delivered'); ?></th>
									<th><?php language('delete'); ?></th>
								</tr>
								<?php	for($i=0;$i<sizeof($data);$i++)	{	?>
									<tr id="tr-<?php echo $data[$i]['id'];?>">
										<td><?php echo $data[$i]['username']; ?></td>
										<td><?php echo $data[$i]['title']; ?></td>
										<td><?php echo $data[$i]['adnumber']; ?></td>
										<td><?php echo $data[$i]['clicks']; ?></td>
										<td><?php echo $data[$i]['cost'].' EGP'; ?></td>
										<td><?php echo date('Y-m-d ||| h:i:sa', $data[$i]['time']); ?></td>
										<td><input type="checkbox" class="acceptpayment" id="<?php echo $data[$i]['id'];?>"  user="<?php echo $data[$i]['userid'];?>" number="<?php echo $data[$i]['adnumber'];?>"></td>										
										<td><a href="admin.php?c=adaccpayment&id=<?php echo $data[$i]['id']; ?>&userid=<?php echo $data[$i]['userid']; ?>&num=<?php echo $data[$i]['adnumber']; ?>" style="color: red;"><i style="color:red;" class="glyphicon glyphicon-remove"></i></a></td>
									</tr>
								<?php	} ?>
							</table>
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
				</div>
				
				<div id="accepting" class="tab-pane fade">
				<?php
					$data = getAllDataFromTable('userpayads.id as id,userpayads.title as title,userpayads.adnumber as adnumber,userpayads.clicks as clicks,userpayads.cost as cost,userpayads.time as time,users.username as username','userpayads',' inner join users on userpayads.uid = users.id where userpayads.payed = 1 order by userpayads.time DESC','');
					if(!empty($data))
					{
				?>
					<div class="row">
						<div class="col-md-12 table-responsive">
							<table class="table table-bordered table-striped">
								<tr class="info">
									<th><?php language('username'); ?></th>
									<th><?php language('plan'); ?></th>
									<th><?php language('adnumber'); ?></th>
									<th><?php language('clicks'); ?></th>
									<th><?php language('cost'); ?></th>
									<th><?php language('time'); ?></th>
								</tr>
								<?php	for($i=0;$i<sizeof($data);$i++)	{	?>
									<tr id="tr-<?php echo $data[$i]['id'];?>">
										<td><?php echo $data[$i]['username']; ?></td>
										<td><?php echo $data[$i]['title']; ?></td>
										<td><?php echo $data[$i]['adnumber']; ?></td>
										<td><?php echo $data[$i]['clicks']; ?></td>
										<td><?php echo $data[$i]['cost'].' EGP'; ?></td>
										<td><?php echo date('Y-m-d ||| h:i:sa', $data[$i]['time']); ?></td>
									</tr>
								<?php	} ?>
							</table>
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
				</div>
			</div>
			
		</div>
	</div>