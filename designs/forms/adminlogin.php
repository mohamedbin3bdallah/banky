	<div class="buy" style="min-height: 403px; margin: 0;">
		<h3>
			<?php language('nowuser'); ?>
		</h3>
		<div class="col-sm-12">
			<form class="form-horizontal" action="" method="POST" autocomplete="off">
				<?php
				if(isset($_POST['loginsubmit'])) 
				{
					unset($_POST['loginsubmit']);
					if($_POST['myusername'] != '' && $_POST['passw0rd'] != '')
					{
						$loginOp = login($_POST['myusername'],$_POST['passw0rd']);		
						if($loginOp == 1 && isset($_GET['c'])) echo header('location: pay_success.php?c='.$_GET['c']);
						//elseif($loginOp == 1) echo header('location: page.php?c=advertisements');
						elseif($loginOp == 1) echo "<script> window.location.href = 'page.php?c=advertisements'; </script>";
						elseif($loginOp == 4) echo "<script> window.location.href = 'page.php?c=myadvertisements'; </script>";
						elseif($loginOp == 0) echo '<div id="wrongaccount"></div>';
						elseif($loginOp == 2) echo '<div id="notactiveaccount"></div>';
					}
				}
				if(isset($_GET['message']))
				{
					if($_GET['message'] == 2) echo '<br><h4 style="color:red;text-align:center;">Wrong Account</h4>'; 
					elseif($_GET['message'] == 3) echo '<br><h4 style="color:red;text-align:center;">Account is Already Active</h4>'; 
					elseif($_GET['message'] == 4) echo '<br><h4 style="color:red;text-align:center;">Wrong Code</h4>'; 
					elseif($_GET['message'] == 0 || $_GET['message'] == 5) echo '<br><h4 style="color:red;text-align:center;">Something Wrong</h4>'; 
					elseif($_GET['message'] == 1) echo '<br><h4 style="color:green;text-align:center;">Account is Activated</h4>'; 
					else {}
				}
				?>
				<div class="form-group">
					<label for="Username" class="col-sm-4 control-label" style="margin-top: 55px;"><?php language('username'); ?></label>
					<div class="col-sm-6">
						<input type="text" class="form-control" style="margin-top: 55px;" name="myusername" id="myusername" placeholder="<?php language("username"); ?>" autocomplete="off" required/>
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
					<!--<tr><td id="noborder"><input type="checkbox" name="remember" class="remember" id="remember" <?php if(isset($POST['remember']) && $POST['remember'] != ""){ echo "checked"; } ?>> <?php language(" ").language("remember"); ?></td></tr>-->
					<!--<tr><td id="noborder"><a href="forgotpassword.php"><?php language(" ").language("forgotpass"); ?></a></td></tr>-->
					<div class="col-sm-offset-4 col-sm-6">
						<input type="submit" class="btn btn-default" name="loginsubmit" id="loginsubmit" class="greenButton" value="<?php language("login"); ?>" disabled/>
					</div>
				</div>
			</form>
		</div>
	</div>