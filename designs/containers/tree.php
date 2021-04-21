<script type="text/javascript" src="js/chart.js"></script>
<?php
$data = getRowFromTable('users','where id = '.$_SESSION['uid'],'');
if(!empty($data) && $data['username'] != '')
{
?>
   <div class="row" style="margin-bottom:15px;">
		<div class="col-md-12">
			<h3 style="text-align:center;">Invite your friends with this link to add them to your referrals</h3>
		</div>
	</div>
	
	<div class="row" style="margin-bottom:55px;">
		<div class="col-md-12">
			<h4 style="text-align:center;">http://127.0.0.1/banky/register.php?referral=<?php echo $data['username']; ?></h4>
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

<?php
$data = getRowFromTable('users','where id = '.$_SESSION['uid'],'');
if(!empty($data) && $data['referral'] != '')
{
?>
	<script type="text/javascript">
      google.charts.load('current', {packages:["orgchart"]});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Name');
        data.addColumn('string', 'Referral');

        // For each orgchart box, provide the name, manager, and tooltip to show.
        
		data.addRows([
			<?php echo $data['referral']; ?>
        ]);

        // Create the chart.
        var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
        // Draw the chart, setting the allowHtml option to true for the tooltips.
        chart.draw(data, {allowHtml:true});
      }
   </script>
   
   <!--<div class="row" style="margin-bottom:55px;">
		<div class="col-md-12">
			<h3 style="text-align:center;">Last Time of You 4th Level is : <?php if($data['repay'] == 1 && $data['refpayendtime'] != '') echo date('Y-m-d', $data['refpayendtime']); else echo 'Not Payed'; ?></h3>
		</div>
	</div>-->
	
	<div class="row">
		<div class="col-md-12">
			<div id="chart_div"></div>
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