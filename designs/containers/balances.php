<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="js/jquery-1.11.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			
			<ul class="nav nav-tabs nav-justified">
				<li class="active"><a data-toggle="tab" href="#nondelivered"><?php language('nondelivered'); ?></a></li>
				<li><a data-toggle="tab" href="#delivered"><?php language('delivered'); ?></a></li>
			</ul>
			
			<div class="tab-content" style="margin-top: 25px;">
				<div id="nondelivered" class="tab-pane fade in active">
				<?php
					$data = getAllDataFromTable('deliveries.id as id,deliveries.uid as uid,deliveries.balance as balance,deliveries.time as time,users.username as username,users.bankaccount as bankaccount','deliveries',' inner join users on deliveries.uid = users.id where deliveries.delivered = 0','');
					if(!empty($data))
					{
				?>
					<div class="row">
						<div class="col-md-12 table-responsive">
							<table class="table table-bordered table-striped">
								<tr class="info">
									<th><?php language('username'); ?></th>
									<th><?php language('balance'); ?></th>
									<th><?php language('bank'); language(' '); language('account'); ?></th>
									<th><?php language('time'); ?></th>
									<th><?php language('delivered'); ?></th>
								</tr>
								<?php	for($i=0;$i<sizeof($data);$i++)	{	?>
									<tr id="tr-<?php echo $data[$i]['id'];?>">
										<td><?php echo $data[$i]['username']; ?></td>
										<td><?php echo $data[$i]['balance'].' EGP'; ?></td>
										<td><?php echo $data[$i]['bankaccount']; ?></td>
										<td><?php echo date('Y-m-d ||| h:i:sa', $data[$i]['time']); ?></td>
										<td><input type="checkbox" class="deliveredcheck" id="<?php echo $data[$i]['id'];?>" uid="<?php echo $data[$i]['uid'];?>"></td>										
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
				
				<div id="delivered" class="tab-pane fade">
				<?php
					$data = getAllDataFromTable('deliveries.id as id,deliveries.balance as balance,deliveries.time as time,deliveries.dtime as dtime,users.username as username,users.bankaccount as bankaccount','deliveries',' inner join users on deliveries.uid = users.id where deliveries.delivered = 1','');
					if(!empty($data))
					{
				?>
					<div class="row">
						<div class="col-md-12 table-responsive">
							<table class="table table-bordered table-striped">
								<tr class="info">
									<th><?php language('username'); ?></th>
									<th><?php language('balance'); ?></th>
									<th><?php language('bank'); language(' '); language('account'); ?></th>
									<th><?php language('time'); ?></th>
									<th><?php language('delivered'); ?></th>
								</tr>
								<?php	for($i=0;$i<sizeof($data);$i++)	{	?>
									<tr id="tr-<?php echo $data[$i]['id'];?>">
										<td><?php echo $data[$i]['username']; ?></td>
										<td><?php echo $data[$i]['balance'].' EGP'; ?></td>
										<td><?php echo $data[$i]['bankaccount']; ?></td>
										<td><?php echo date('Y-m-d ||| h:i:sa', $data[$i]['time']); ?></td>
										<td><?php echo date('Y-m-d ||| h:i:sa', $data[$i]['dtime']); ?></td>
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