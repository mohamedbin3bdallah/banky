		<div class="col-md-8 col-md-offset-2">
			<form class="form-horizontal" action="admin.php?c=system" method="POST" enctype="multipart/form-data" autocomplete="off">
				<?php
					if(isset($_GET['message']) && $_GET['message'] != '') { echo '<h2 style="text-align:center; color: green;">'; language($_GET['message']); echo '</h2>'; }
				?>
				<div class="form-group">
				<label for="bankaccount" class="col-sm-2 control-label"><?php language('bank'); language(' '); language('account'); ?></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="bankaccount" id="bankaccount" value="<?php if(isset($system['bankaccount'])) echo $system['bankaccount']; ?>" maxlength="100" placeholder="<?php language('bank'); language(' '); language('account'); ?>" autocomplete="off" required />
					</div>
				</div>
				<div class="form-group">
				<label for="paypalemail" class="col-sm-2 control-label"><?php language('paypalemail'); ?></label>
					<div class="col-sm-10">
						<input type="email" class="form-control" name="paypalemail" id="paypalemail" value="<?php if(isset($system['paypalemail'])) echo $system['paypalemail']; ?>" maxlength="100" placeholder="<?php language("paypalemail"); ?>" autocomplete="off" required />
					</div>
				</div>
				<!--<div class="form-group">
				<label for="currency" class="col-sm-2 control-label"><?php //language('currency'); ?></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="currency_code" id="currency_code" value="<?php //if(isset($system['currency_code'])) echo $system['currency_code']; ?>" maxlength="15" placeholder="<?php //language("currency"); ?>" autocomplete="off" readonly />
					</div>
				</div>-->
				<!--<div class="form-group">
				<label for="excode" class="col-sm-2 control-label">External Files Code</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="excode" id="excode" maxlength="100" placeholder="External Files Code" autocomplete="off" />
					</div>
				</div>-->
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<input type="submit" class="btn btn-default" name="systemsubmit" id="systemsubmit" value="<?php language("save"); ?>" />
					</div>
				</div>
			</form>
		</div>