		<div class="col-md-8 col-md-offset-2">
			<form class="form-horizontal" action="admin.php?c=user&id=<?php echo $_GET['id']; ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
				<?php
					if(isset($_GET['message']) && $_GET['message'] != '') { echo '<h2 style="text-align:center; color: green;">'; language($_GET['message']); echo '</h2>'; }
					if(isset($_GET['id'])) echo '<input type="hidden" name="oldid" value="'.$_GET['id'].'">';
				?>
				<div class="form-group">
				<label for="username" class="col-sm-2 control-label"><?php language('username'); ?></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="username" id="username" value="<?php if(isset($user['username'])) echo $user['username']; ?>" maxlength="255" title="<?php language('username-validation'); ?>" placeholder="<?php language("username"); ?>" autocomplete="off" required/>
					</div>
				</div>
				<div class="form-group">
				<label for="password" class="col-sm-2 control-label"><?php language('password'); ?></label>
					<div class="col-sm-10">
						<input type="password" class="form-control" name="password" id="password" placeholder="<?php language("password"); ?>" autocomplete="off" />
					</div>
				</div>
				<div class="form-group">
				<label for="email" class="col-sm-2 control-label"><?php language('email'); ?></label>
					<div class="col-sm-10">
						<input type="email" class="form-control" name="email" id="email" value="<?php if(isset($user['email'])) echo $user['email']; ?>" maxlength="255" placeholder="<?php language("email"); ?>" autocomplete="off" required/>
					</div>
				</div>
				<div class="form-group">
				<label for="paypalemail" class="col-sm-2 control-label"><?php language('paypalemail'); ?></label>
					<div class="col-sm-10">
						<input type="email" class="form-control" name="paypalemail" id="paypalemail" value="<?php if(isset($user['paypalemail'])) echo $user['paypalemail']; ?>" maxlength="255" placeholder="<?php language("paypalemail"); ?>" autocomplete="off" required/>
					</div>
				</div>
				<div class="form-group">
				<label for="country" class="col-sm-2 control-label"><?php language('country'); ?></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="country" id="country" value="<?php if(isset($user['country'])) echo $user['country']; ?>" maxlength="255" pattern="[A-Za-z]{1,}" title="<?php language('country-validation'); ?>" placeholder="<?php language("country"); ?>" autocomplete="off" required/>
					</div>
				</div>
				<div class="form-group">
				<label for="balance" class="col-sm-2 control-label"><?php language('balance'); ?></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="balance" id="balance" value="<?php if(isset($user['balance'])) echo $user['balance']; ?>" maxlength="255" pattern="[-+]?([0-9]*\.[0-9]+|[0-9]+)" title="<?php language('pricematch'); ?>" placeholder="<?php language("balance"); ?>" autocomplete="off" required/>
					</div>
				</div>
				<div class="form-group">
				<label for="clicks" class="col-sm-2 control-label"><?php language('clicks'); ?></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="clicks" id="clicks" value="<?php if(isset($user['clicks'])) echo $user['clicks']; ?>" maxlength="50" pattern="[0-9]{1,}" title="<?php language('clicks-validation'); ?>" placeholder="<?php language("clicks"); ?>" autocomplete="off" required/>
					</div>
				</div>
				<div class="form-group">
				<label for="addads" class="col-sm-2 control-label"><?php language('advertisements'); ?></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="addads" id="addads" value="<?php if(isset($user['addads'])) echo $user['addads']; ?>" maxlength="50" pattern="[0-9]{1,}" title="<?php language('clicks-validation'); ?>" placeholder="<?php language("advertisements"); ?>" autocomplete="off" required/>
					</div>
				</div>
				<div class="form-group">
				<label for="repay" class="col-sm-2 control-label">4th Level</label>
					<div class="col-sm-10">
						<input type="checkbox" name="repay" id="repay" <?php if(isset($user['repay']) && $user['repay'] == 1) echo 'checked'; ?> />
					</div>
				</div>
				<div class="form-group">
				<label for="active" class="col-sm-2 control-label"><?php language('active'); ?></label>
					<div class="col-sm-10">
						<input type="checkbox" name="active" id="active" <?php if(isset($user['active']) && $user['active'] == 1) echo 'checked'; ?> />
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<input type="submit" class="btn btn-default" name="usersubmit" id="usersubmit" value="<?php language("save"); ?>" />
					</div>
				</div>
			</form>
		</div>