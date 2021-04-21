<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="js/jquery-1.11.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/chart.js"></script>

    
<div class="row" style="margin-bottom: 20px;">
	<label class="col-sm-4 col-sm-offset-1 control-label">
		<?php language('search'); language(' '); language('username'); ?>
	</label>
	<div class="col-sm-5">
		<input type="text" name="user" id="user" class="form-control">
	</div>
</div>

<div class="row">
	<div class="col-sm-12 table-responsive" id="usersearch">
	</div>
</div>

<?php
$data = getAllDataFromTable('users',$where,$limit);
if(!empty($data))
{
?>
	<script type="text/javascript">
      google.charts.load('current', {packages:["orgchart"]});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
		<?php	for($i=0;$i<sizeof($data);$i++)	{	?>

        var data<?php echo $data[$i]['id']; ?> = new google.visualization.DataTable();
        data<?php echo $data[$i]['id']; ?>.addColumn('string', 'Name');
        data<?php echo $data[$i]['id']; ?>.addColumn('string', 'Referral');

        // For each orgchart box, provide the name, manager, and tooltip to show.
        
		data<?php echo $data[$i]['id']; ?>.addRows([
			<?php echo $data[$i]['referral']; ?>
        ]);

        // Create the chart.
        var chart<?php echo $data[$i]['id']; ?> = new google.visualization.OrgChart(document.getElementById('chart_div_<?php echo $data[$i]['id']; ?>'));
        // Draw the chart, setting the allowHtml option to true for the tooltips.
        chart<?php echo $data[$i]['id']; ?>.draw(data<?php echo $data[$i]['id']; ?>, {allowHtml:true});
		
		<?php } ?>
      }
   </script>
   
	<div class="row">
		<div class="col-md-12 table-responsive">
			<table class="table table-bordered table-striped">
				<tr class="info">
					<th><?php language('username'); ?></th>
					<th><?php language('email'); ?></th>
					<th><?php language('paypalemail'); ?></th>
					<th><?php language('country'); ?></th>
					<th><?php language('clicks'); ?></th>
					<th><?php language('balance'); ?></th>
					<th><?php language('total'); ?></th>
					<th></th>
					<th><?php language('registerdate'); ?></th>
					<th><?php language('edit'); ?></th>
					<th><?php language('delete'); ?></th>
				</tr>
				<?php	for($i=0;$i<sizeof($data);$i++)	{	?>
					<tr>
						<td><?php echo $data[$i]['username']; ?></td>
						<td><?php echo $data[$i]['email']; ?></td>
						<td><?php echo $data[$i]['paypalemail']; ?></td>
						<td><?php echo $data[$i]['country']; ?></td>
						<td><?php echo $data[$i]['clicks']; ?></td>
						<td><?php echo $data[$i]['balance'].' EGP'; ?></td>
						<td><?php echo $data[$i]['total'].' EGP'; ?></td>
						<td><a class="item-hover ajax-nav" href="#" data-toggle="modal" data-target="#user-<?php echo $data[$i]['id']; ?>"><?php language('tree'); ?></a></td>
						<td><?php echo date('Y-m-d', $data[$i]['time']); ?></td>
						<td><a href="admin.php?c=user&id=<?php echo $data[$i]['id']; ?>" style="color: green;"><i style="color:green;" class="glyphicon glyphicon-edit"></i></a></td>
						<td>
							<i style="color:red;" id=<?php echo $data[$i]['id']; ?> class="del glyphicon glyphicon-remove"></i>
							<div id="del-<?php echo $data[$i]['id'];?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-sm">
									<div class="modal-content">
										<div class="modal-header">
											<?php echo 'Are You Sure You Want To Delete This User ?'; ?>
											<br>
										</div>
										<div class="modal-body">
											<center>
												<button class="btn btn-danger" onclick="location.href = 'admin.php?c=<?php echo $_GET['c']; ?>&id=<?php echo $data[$i]['id']; ?>'" data-dismiss="modal"><?php language('agree'); ?></button>
												<button class="btn btn-success" data-dismiss="modal" aria-hidden="true"><?php language('no'); ?></button>
											</center>
										</div>
									</div>
								</div>
							</div>	
						</td>
					</tr>

					<div id="user-<?php echo $data[$i]['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<?php echo $data[$i]['username']; ?>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<br>
								</div>
								<div class="modal-body">
									<div class="row">
										<div id="chart_div_<?php echo $data[$i]['id']; ?>"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
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
					<?php if($totalPages > 1) { ?><li><a href="?c=users&page=1"><?php language("first"); ?></a></li><?php } ?>
					<?php if($page > 3) { ?><li>
						<a href="?c=users&page=<?php echo $page-2; ?>" aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
						</a>
					</li><?php } ?>
					<?php if($page > 1) { ?><li><a href="?c=users&page=<?php echo $page-1; ?>"><?php echo $page-1; ?></a></li><?php } ?>
					<?php if($totalPages > 1) { ?><li><a href="?c=users&page=<?php echo $page; ?>"><?php echo $page; ?></a></li><?php } ?>
					<?php if($page < $totalPages) { ?><li><a href="?c=users&page=<?php echo $page+1; ?>"><?php echo $page+1; ?></a></li><?php } ?>
					<?php if($page < $totalPages-1) { ?><li>
						<a href="?c=users&page=<?php echo $page+2; ?>" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
						</a>
					</li><?php } ?>
					<?php if($totalPages > 1) { ?><li><a href="?c=users&page=<?php echo $totalPages; ?>"><?php language("last"); ?></a></li><?php } ?>
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