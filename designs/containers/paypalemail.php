<div class="col-md-8 col-md-offset-2">
			<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data" autocomplete="off">
				<?php
					if(isset($_GET['message']) && $_GET['message'] != '') { echo '<h2 style="text-align:center; color: green;">'; language($_GET['message']); echo '</h2>'; }
				?>
				<div class="form-group">
				<label for="paypalemail" class="col-sm-2 control-label"><?php language('paypalemail'); ?></label>
					<div class="col-sm-10">
						<input type="email" class="form-control" name="paypalemail" id="paypalemail" maxlength="100" placeholder="<?php language("paypalemail"); ?>" autocomplete="off" />
					</div>
				</div>
				<div class="form-group">
					<!--<tr><td id="noborder"><input type="checkbox" name="remember" class="remember" id="remember" <?php if(isset($POST['remember']) && $POST['remember'] != ""){ echo "checked"; } ?>> <?php language(" ").language("remember"); ?></td></tr>-->
					<!--<tr><td id="noborder"><a href="forgotpassword.php"><?php language(" ").language("forgotpass"); ?></a></td></tr>-->
					<div class="col-sm-offset-2 col-sm-10">
						<input type="submit" class="btn btn-default" name="settingssubmit" id="settingssubmit" value="<?php language("save"); ?>" />
					</div>
				</div>
			</form>
		</div>