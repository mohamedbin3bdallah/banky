<div class="col-md-8 col-md-offset-2">
			<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data" autocomplete="off">
				<?php
					if(isset($_GET['message']) && $_GET['message'] != '') { echo '<h2 style="text-align:center; color: green;">'; language($_GET['message']); echo '</h2>'; }
				?>
				<div class="form-group">
					<label for="user" class="col-sm-2 control-label"><?php language('user'); ?></label>
					<div class="col-sm-10">
						<?php $users = getAllDataFromTable('users',' where active = 1 ',' order by username ASC'); ?>
						<select class="form-control" name="uid" id="uid" required/>
							<?php for($i=0;$i<count($users);$i++) { echo '<option value="'.$users[$i]['id'].'">'.$users[$i]['username'].'</option>'; } ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="plan" class="col-sm-2 control-label"><?php language('plan'); ?></label>
					<div class="col-sm-10">
						<?php $plans = getAllDataFromTable('plans',' where active = 1 ',''); ?>
						<select class="form-control" name="plan" id="plan" required/>
							<?php for($i=0;$i<count($plans);$i++) { echo '<option cost="'.$plans[$i]['cost'].'" value="'.$plans[$i]['id'].'|'.$plans[$i]['cost'].'|'.$plans[$i]['title'].'">'.$plans[$i]['title'].'</option>'; } ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="adnumber" class="col-sm-2 control-label"><?php language('adnumber'); ?></label>
					<div class="col-sm-10">
						<input type="number" class="form-control" name="adnumber" id="adnumber" min="1" step="1" required/>
					</div>
				</div>
				<!--<div class="form-group">
				<label for="admonths" class="col-sm-2 control-label"><?php language('admonths'); ?></label>
					<div class="col-sm-10">
						<select class="form-control" name="admonths" id="admonths" required/>
							<?php //for($i=1;$i<13;$i++) { echo '<option value="'.$i.'">'.$i.'</option>'; } ?>
						</select>
					</div>
				</div>-->
				<div class="form-group">
				<label for="clicks" class="col-sm-2 control-label"><?php language('clicks'); ?></label>
					<div class="col-sm-10">
						<input type="number" class="form-control" name="clicks" id="clicks" min="1" step="1" required/>
					</div>
				</div>
				<div class="form-group">
				<label for="cost" class="col-sm-2 control-label"><?php language('cost'); ?></label>
					<div class="col-sm-10" id="cost">
						<input type="hidden" class="form-control" name="cost" id="cost" value="" />
					</div>
				</div>
				<div class="form-group">
					<!--<tr><td id="noborder"><input type="checkbox" name="remember" class="remember" id="remember" <?php if(isset($POST['remember']) && $POST['remember'] != ""){ echo "checked"; } ?>> <?php language(" ").language("remember"); ?></td></tr>-->
					<!--<tr><td id="noborder"><a href="forgotpassword.php"><?php language(" ").language("forgotpass"); ?></a></td></tr>-->
					<div class="col-sm-offset-2 col-sm-10">
						<input type="submit" class="btn btn-default" name="buyadvertisementsubmit" id="buyadvertisementsubmit" value="<?php language("upload"); ?>" />
					</div>
				</div>
			</form>
		</div>