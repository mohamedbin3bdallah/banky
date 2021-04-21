<div class="col-md-8 col-md-offset-2">
			<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data" autocomplete="off">
				<?php
					if(isset($_GET['message']) && $_GET['message'] != '') { echo '<h2 style="text-align:center; color: green;">'; language($_GET['message']); echo '</h2>'; }
				?>
				<div class="form-group">
				<label for="bankaccount" class="col-sm-2 control-label"><?php language('bank'); language(' '); language('account'); ?></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="bankaccount" id="bankaccount" value="<?php echo $user['bankaccount']; ?>" maxlength="100" placeholder="<?php language('bank'); language(' '); language('account'); ?>" autocomplete="off" />
					</div>
				</div>
				<div class="form-group">
				<label for="paypalemail" class="col-sm-2 control-label"><?php language('paypalemail'); ?></label>
					<div class="col-sm-10">
						<input type="email" class="form-control" name="paypalemail" id="paypalemail" value="<?php echo $user['paypalemail']; ?>" maxlength="100" placeholder="<?php language("paypalemail"); ?>" autocomplete="off" />
					</div>
				</div>
				<div class="form-group">
				<label for="password" class="col-sm-2 control-label"><?php language('password'); ?></label>
					<div class="col-sm-10" id="jsadvertisement">
						<input type="password" class="form-control" name="password" id="password" placeholder="<?php language("password"); ?>" pattern=".{8,}" title="<?php language("m7"); ?>" autocomplete="off" />
					</div>
				</div>
				<div class="form-group">
				<label for="cmfpassword" class="col-sm-2 control-label"><?php language('cmfpassword'); ?></label>
					<div class="col-sm-10" id="jsadvertisement">
						<input type="password" class="form-control" name="cmfpassword" id="cmfpassword" placeholder="<?php language("cmfpassword"); ?>" pattern=".{8,}" title="<?php language("m7"); ?>" autocomplete="off" />
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