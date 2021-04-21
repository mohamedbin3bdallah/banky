<?php
if(!empty($data))
{
	echo '<div class="row">';
	//$check = checkUserTaskAd('viewadvertisements',' where viewad = 0 and id = '.$_GET['ad'].' and uid = '.$_SESSION['uid']);
	for($i=0;$i<sizeof($data);$i++)
	{
	?>
	
		<div class="col-sm-3 col-sm-offset-3">
			<?php if($data[$i]['views'] < $data[$i]['clicks'] && $data[$i]['viewad'] == 0 && $data[$i]['createday'] == date('Y-m-d')) { ?><script> mytimer('<?php echo $data[$i]['timer']; ?>'); </script><div id="time" style="padding-top: 10%; min-height: 95px; background-color: #ffff66; color: #000; text-align: center;"></div>
				<?php } elseif($data[$i]['views'] < $data[$i]['clicks'] && $data[$i]['viewad'] == 1) { ?><div style="padding-top: 10%; min-height: 95px; background-color: #088A08; color: #fff; text-align: center;"><?php language('viewed'); ?></div>
				<?php } else { ?><div style="padding-top: 10%; min-height: 95px; background-color: #cc0000; color: #fff; text-align: center;"><?php language('close'); ?></div><?php } ?>
		</div>
		<div class="col-sm-3">
			<?php
				$files = array_diff(scandir('uploads/advertisement'), array('.','..'));
				if(!empty($files)) echo '<img src="uploads/advertisement/'.$files['2'].'" class="img-responsive">';
			?>
		</div>
		<div class="col-sm-12" style="margin-top: 25px;">
			<table class="table table-bordered">
				<input type="hidden" id="adid" value="<?php echo  $data[$i]['id']; ?>">
				<input type="hidden" id="viewid" value="<?php echo $_GET['ad']; ?>">
				<!--<?php if($data[$i]['views'] < $data[$i]['clicks'] && $data[$i]['viewad'] == 0) { ?><script> mytimer('<?php echo $data[$i]['timer']; ?>'); </script><tr style="background-color: #ffff66; color: #000; text-align: center;"><td id="time"></td></tr><tr style="background-color: #ffff66; color: #000;"><td><?php echo $data[$i]['title']; ?></td></tr>
				<?php } elseif($data[$i]['views'] < $data[$i]['clicks'] && $data[$i]['viewad'] == 1) { ?><tr style="background-color: #088A08; color: #fff; text-align: center;"><td><?php language('viewed'); ?></td></tr><tr style="background-color: #088A08; color: #fff;"><td><?php echo $data[$i]['title']; ?></td></tr>
				<?php } else { ?><tr style="background-color: #cc0000; color: #fff; text-align: center;"><td><?php language('close'); ?></td></tr><tr style="background-color: #cc0000; color: #fff;"><td><?php echo $data[$i]['title']; ?></td></tr><?php } ?>-->
				<!--<tr style="text-align: center; background-color: #F5F6CE;"><td><?php //echo $data[$i]['title']; ?></td></tr>-->
				<!--<tr style="background-color: #F5F6CE;"><td><?php //echo $data[$i]['description']; ?></td></tr>-->
				<?php if($data[$i]['category'] == 'url') { ?>
					<tr style="background-color: #F5F6CE; height: 100%;"><td><iframe src="<?php echo $data[$i]['ad']; ?>" width="100%" height="900px" frameborder="0" allowfullscreen></iframe></td></tr>
				<?php } elseif($data[$i]['category'] == 'image') { ?>
					<tr style="background-color: #F5F6CE; height: 100%;"><td><img class="img-responsive" src="<?php echo $data[$i]['ad']; ?>" style="width:100%;"></td></tr>
				<?php } elseif($data[$i]['category'] == 'video') { ?>
					<tr style="background-color: #F5F6CE; height: 100%;"><td>
						<div class="embed-responsive embed-responsive-4by3">
							<iframe class="embed-responsive-item" src="<?php echo $data[$i]['ad']; ?>" width="100%" height="900px" frameborder="0" allowfullscreen></iframe>
						</div>

						<!--<video width="320" height="240" autoplay>
							<source src="uploads/<?php //echo $data[$i]['ad']; ?>" type="video/mp4">
							<source src="uploads/<?php //echo $data[$i]['ad']; ?>" type="video/ogg">
							<source src="uploads/<?php //echo $data[$i]['ad']; ?>" type="video/webm">
						</video>-->
					</td></tr>
				<?php } ?>
			</table>
		</div>
	<?php
	}
	echo '</div>';
}
else
{
	language('nodata');
}
?>