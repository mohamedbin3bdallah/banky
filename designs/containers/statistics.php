<script src="bootstrap/js/bootstrap.min.js"></script>

<div class="row" style="margin-bottom: 25px;">
	<div class="col-sm-12">
		<?php if(isset($_GET['message'])) { echo '<h2 style="text-align:center; color: green;">'; language($_GET['message']); echo '</h2>'; } ?>
	</div>
</div>

<div class="row" style="margin-bottom: 25px;">
	<?php $clicksbalance = getClickkAndBalanceByUser($_SESSION['uid']); ?>
	<div class="col-sm-4">
		<?php language('clicks'); language(' '); language(':'); language(' '); echo $clicksbalance['clicks'];?>
	</div>
	<div class="col-sm-4">
		<?php language('balance'); language(' '); language(':'); language(' '); echo $clicksbalance['balance'].' EGP';?>
	</div>
	<div class="col-sm-4">
		<div class="dropdown">
			<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><?php language('getbalance'); ?>
				<span class="caret"></span>
			</button>
			<ul class="dropdown-menu">
				<li><a href="?c=getbalance&pay=delivery"><?php language('bank'); language(' '); language('account'); ?></a></li>
				<li><a href="?c=getbalance&pay=paypal"><?php language('paypal'); ?></a></li>
			</ul>
		</div>
	</div>
</div>

<div class="row" style="margin-bottom: 25px;">
	<div class="col-sm-12">
		- List of direct referrals: 
		<?php
			if($clicksbalance['rearray'] == '') echo ' Nothing';
			else echo $clicksbalance['rearray'];
		?>
	</div>
</div>

<div class="row" style="margin-bottom: 25px;">
	<div class="col-sm-12">
		<?php if($clicksbalance['balance'] >= 10 && $clicksbalance['repay'] == 0) { ?>
		<div style="float:left; margin-top:7px;">- Buy extra level of erfferals. &nbsp;&nbsp;</div>
		<div class="dropdown" style="float:left;">
			<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Buy
				<span class="caret"></span>
			</button>
			<ul class="dropdown-menu">
				<li><a href="?c=statistics&type=30">30 Days</a></li>
				<li><a href="?c=statistics&type=60">60 Days</a></li>
				<li><a href="?c=statistics&type=90">90 Days</a></li>
			</ul>
		</div>
		<div style="float:left; margin-top:7px;">&nbsp;&nbsp; This will add a 4th level of referrals for 30, 60 or 90 days.</div>
		<?php } ?>
	</div>
</div>

<?php
//foreach($rows as $row) { if(isset($row['count'])) echo $row['count'].","; else echo "0,"; }
//$data = getNoOfAllUserAdTasks(' where month(date) = '.date('m').' and viewad = 1 and uid = '.$_SESSION['uid'].' group by date order by date ASC');
$data = getNoOfAllUserAdTasks(' where month(date) = '.date('m').' and viewadvertisements.viewad = 1 and viewadvertisements.uid = '.$_SESSION['uid'].' group by viewadvertisements.date,plans.id order by viewadvertisements.date,plans.id ASC');
if(!empty($data))
{
	ksort($data['title']);
	$title = "'Date',";
	foreach($data['title'] as $titlevalue)
	{
		$title .= "'".$titlevalue."',";
	}
	?>
	<div class="row">
	<div class="col-sm-12">
	<script type="text/javascript" src="js/chart.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          [<?php echo $title; ?>],
		  <?php
		  foreach($data['rows'] as $key => $rows) {
			foreach($rows as $plankey => $row)
			{
				foreach($data['title'] as $titlekey => $title)
				{
					if($plankey != $titlekey && !isset($data['rows'][$key][$titlekey])) $data['rows'][$key][$titlekey] = 0;
				}
			}
			ksort($data['rows'][$key]);
			echo "['".$key."',";
			foreach($data['rows'][$key] as $plankey => $row)
			{
				echo $data['rows'][$key][$plankey].",";
			}
			//for($i=1;$i<count($data['title'])+1;$i++) { echo $data['rows'][$key][$i].","; }
			echo "],";
		  }
		  ?>
		  /*['2004',  1000,      400],
          ['2005',  1170,      460],
          ['2006',  660,       1120],
          ['2007',  1030,      540]*/
        ]);

        var options = {
          title: 'Advertisements Statistic',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
	<div id="curve_chart" style="width: 100%; height: 500px"></div>
	</div>
	</div>
	<?php
}
else
{
	language('nodata');
}
?>