	<div class="buy" style="min-height: 403px; margin: 0;">
		<h3>
			<?php language('nowuser'); ?>
		</h3>
		<div class="col-sm-12">
			<form class="form-horizontal" action="" method="POST" autocomplete="off">
				<?php
				if(isset($_GET['message']))
				{
					if($_GET['message'] == 2) echo '<br><h4 style="color:red;text-align:center;">Wrong Account</h4>'; 
					elseif($_GET['message'] == 3) echo '<br><h4 style="color:red;text-align:center;">Account is Already Active</h4>'; 
					elseif($_GET['message'] == 4) echo '<br><h4 style="color:red;text-align:center;">Wrong Code</h4>'; 
					elseif($_GET['message'] == 0 || $_GET['message'] == 5) echo '<br><h4 style="color:red;text-align:center;">Something Wrong</h4>'; 
					elseif($_GET['message'] == 1) echo '<br><h4 style="color:green;text-align:center;">Account is Activated</h4>'; 
					elseif($_GET['message'] == 6) echo '<br><h4 style="color:red;text-align:center;">Wrong Username OR Password</h4>'; 
					elseif($_GET['message'] == 7) echo '<br><h4 style="color:red;text-align:center;">Account is Not Active</h4>'; 
					else {}
				}
				?>
				<div class="form-group">
					<label for="Username" class="col-sm-4 control-label"><?php language('username'); ?></label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="myusername" id="myusername" placeholder="<?php language("username"); ?>" autocomplete="off" required/>
						<input type="hidden" name="myusername-hidden" id="myusername-hidden" value="0" />
						<div id="myusername-validation"></div>
					</div>
				</div>
				<div class="form-group">
				<label for="password" class="col-sm-4 control-label"><?php language('password'); ?></label>
					<div class="col-sm-6">
						<input type="password" class="form-control" name="passw0rd" id="passw0rd" placeholder="<?php language("password"); ?>" autocomplete="off" required/>
						<input type="hidden" name="passw0rd-hidden" id="passw0rd-hidden" value="0" />
						<div id="passw0rd-validation"></div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-8 col-sm-offset-4">
						<input type="checkbox" name="remember" class="remember" id="remember"> <?php language(" ").language("remember"); ?>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-8 col-sm-offset-4">
						<a href="forgotpassword.php">Forgot Password</a>
					</div>
				</div>
				<div class="form-group">
					<!--<tr><td id="noborder"><input type="checkbox" name="remember" class="remember" id="remember" <?php if(isset($POST['remember']) && $POST['remember'] != ""){ echo "checked"; } ?>> <?php language(" ").language("remember"); ?></td></tr>-->
					<!--<tr><td id="noborder"><a href="forgotpassword.php"><?php language(" ").language("forgotpass"); ?></a></td></tr>-->
					<div class="col-sm-offset-4 col-sm-6">
						<input type="submit" class="btn btn-default" name="loginsubmit" id="loginsubmit" class="greenButton" value="<?php language("login"); ?>" disabled/>
					</div>
				</div>
			</form>
		</div>
	</div>