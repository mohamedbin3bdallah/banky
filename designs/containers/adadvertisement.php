<?php
$data = getAllDataFromTable('advertisements','where id = '.$_GET['ad'],'');
if(!empty($data))
{
	echo '<div class="row">';
	for($i=0;$i<sizeof($data);$i++)
	{
	?>
		<div class="col-sm-12">
			<table class="table table-bordered">
				<tr style="background-color: #088A08; color: #fff;"><td><?php echo $data[$i]['title']; ?></td></tr>
				<tr style="background-color: #F5F6CE;"><td><?php echo $data[$i]['description']; ?></td></tr>
				<?php if($data[$i]['category'] == 'url') { ?>
					<tr style="background-color: #F5F6CE; height: 100%;"><td><iframe src="<?php echo $data[$i]['ad']; ?>" width="100%" height="500px" frameborder="0" allowfullscreen></iframe></td></tr>
				<?php } elseif($data[$i]['category'] == 'image') { ?>
					<tr style="background-color: #F5F6CE; height: 100%;"><td><img class="img-responsive" src="<?php echo $data[$i]['ad']; ?>"></td></tr>
				<?php } elseif($data[$i]['category'] == 'video') { ?>
					<tr style="background-color: #F5F6CE; height: 100%;"><td>
						<div class="embed-responsive embed-responsive-4by3">
							<iframe class="embed-responsive-item" src="<?php echo $data[$i]['ad']; ?>" width="100%" height="500px" frameborder="0" allowfullscreen></iframe>
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