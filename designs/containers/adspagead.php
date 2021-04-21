	<div class="col-md-8 col-md-offset-2">
		<div class="row">
			<?php
				$files = array_diff(scandir('uploads/advertisement'), array('.','..'));
				if(!empty($files)) echo '<img src="uploads/advertisement/'.$files['2'].'" class="img-responsive">';
			?>
		</div>
		<div class="row" style="margin-top: 25px;">
			<form class="form-horizontal" action="admin.php?c=adspagead" method="POST" enctype="multipart/form-data" autocomplete="off">
				<?php
					if(isset($_GET['message']) && $_GET['message'] != '') { echo '<h2 style="text-align:center; color: green;">'; language($_GET['message']); echo '</h2>'; }
				?>
				<div class="form-group">
					<label for="ad" class="col-sm-3 control-label"><?php language('adspagead'); ?></label>
					<div class="col-sm-9" id="jsadvertisement">
						<input type="file" class="form-control" name="ad" id="ad" placeholder="<?php language("adspagead"); ?>" autocomplete="off" required/>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-9">
						<input type="submit" class="btn btn-default" name="adspageadsubmit" id="adspageadsubmit" value="<?php language("save"); ?>" />
					</div>
				</div>
			</form>
		</div>
	</div>