<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="js/jquery-1.11.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

	<div class="row" style="margin-bottom: 25px;">
		<div class="col-md-8 col-md-offset-2">
			<form class="form-horizontal" action="admin.php?c=adstatistics" method="POST" enctype="multipart/form-data" autocomplete="off">
				<?php
					if(isset($_GET['message']) && $_GET['message'] != '') { echo '<h2 style="text-align:center; color: green;">'; language($_GET['message']); echo '</h2>'; }
				?>
				<div class="form-group">
					<label for="user" class="col-sm-2 control-label"><?php language('user'); ?></label>
					<div class="col-sm-10">
						<?php $date = date('Y-m-j'); $users = getAllDataFromTable('users',' where active = 1 ','order by username ASC'); ?>
						<select class="form-control" name="user" id="user" />
							<option value=""><?php language('all'); ?></option>
							<?php for($j=0;$j<count($users);$j++) { echo '<option value="'.$users[$j]['id'].'">'.$users[$j]['username'].'</option>'; } ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="category" class="col-sm-2 control-label"><?php language('category'); ?></label>
					<div class="col-sm-10">
						<select class="form-control" name="category" id="category" required/>
							<option value="daily"><?php language('daily'); ?></option>
							<option value="monthly"><?php language('monthly'); ?></option>
							<option value="yearly"><?php language('yearly'); ?></option>							
						</select>
					</div>
				</div>
				<div id="jsstatistics">
				<div class="form-group">
					<label for="from" class="col-sm-2 control-label"><?php language('from'); language(' '); language('date'); ?></label>
					<div class="col-sm-10">
						<input type="date" class="form-control" name="from" id="from" placeholder="<?php language("date"); ?>" autocomplete="off" required/>
					</div>
				</div>
				<div class="form-group">
				<label for="to" class="col-sm-2 control-label"><?php language('to'); language(' '); language('date'); ?></label>
					<div class="col-sm-10">
						<input type="date" class="form-control" name="to" id="to" placeholder="<?php language("date"); ?>" autocomplete="off" required/>
					</div>
				</div>
				</div>
				<div class="form-group">
					<!--<tr><td id="noborder"><input type="checkbox" name="remember" class="remember" id="remember" <?php if(isset($POST['remember']) && $POST['remember'] != ""){ echo "checked"; } ?>> <?php language(" ").language("remember"); ?></td></tr>-->
					<!--<tr><td id="noborder"><a href="forgotpassword.php"><?php language(" ").language("forgotpass"); ?></a></td></tr>-->
					<div class="col-sm-offset-2 col-sm-10">
						<input type="submit" class="btn btn-default" name="statisticssubmit" id="statisticssubmit" value="<?php language("show"); ?>" />
					</div>
				</div>
			</form>
		</div>
	</div>
<?php
//foreach($rows as $row) { if(isset($row['count'])) echo $row['count'].","; else echo "0,"; }
//$data = getNoOfAllUserAdTasks(' where month(date) = '.date('m').' and viewad = 1 and uid = '.$_SESSION['uid'].' group by date order by date ASC');

if(isset($data) && !empty($data))
{
	ksort($data['title']);
	$title = "'Date',";
	foreach($data['title'] as $titlevalue)
	{
		$title .= "'".$titlevalue."',";
	}
	?>
	<script type="text/javascript" src="js/chart.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data_count = google.visualization.arrayToDataTable([
          [<?php echo $title; ?>],
		  <?php
		  foreach($data['rows'] as $key => $rows) {
			foreach($rows as $plankey => $row)
			{
				foreach($data['title'] as $titlekey => $titlev)
				{
					if($plankey != $titlekey && !isset($data['rows'][$key][$titlekey]['count'])) $data['rows'][$key][$titlekey]['count'] = 0;
				}
			}
			ksort($data['rows'][$key]);
			echo "['".$key."',";
			foreach($data['rows'][$key] as $plankey => $row)
			{
				echo $data['rows'][$key][$plankey]['count'].",";
			}
			echo "],";
		  }
		  ?>
        ]);
        var options_count = {
          title: 'Advertisements Count',
          curveType: 'function',
          legend: { position: 'bottom' }
        };
        var chart_count = new google.visualization.LineChart(document.getElementById('curve_chart_count'));
        chart_count.draw(data_count, options_count);
		
		var data_payment = google.visualization.arrayToDataTable([
          [<?php echo $title; ?>],
		  <?php
		  foreach($data['rows'] as $key => $rows) {
			foreach($rows as $plankey => $row)
			{
				foreach($data['title'] as $titlekey => $titlev)
				{
					if($plankey != $titlekey && !isset($data['rows'][$key][$titlekey]['pay'])) $data['rows'][$key][$titlekey]['pay'] = 0;
				}
			}
			ksort($data['rows'][$key]);
			echo "['".$key."',";
			foreach($data['rows'][$key] as $plankey => $row)
			{
				echo $data['rows'][$key][$plankey]['pay'].",";
			}
			echo "],";
		  }
		  ?>
        ]);
		var options_payment = {
          title: 'Advertisements Payment',
          curveType: 'function',
          legend: { position: 'bottom' }
        };
        var chart_payment = new google.visualization.LineChart(document.getElementById('curve_chart_payment'));
        chart_payment.draw(data_payment, options_payment);
      }
    </script>
	
	<div class="row">
		<div class="col-sm-12">
			<div id="curve_chart_count" style="width: 100%; height: 500px"></div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div id="curve_chart_payment" style="width: 100%; height: 500px"></div>
		</div>
	</div>
	<?php
}
else
{
	echo '<div class="col">';
		language('nodata');
	echo '</div>';
}
?>