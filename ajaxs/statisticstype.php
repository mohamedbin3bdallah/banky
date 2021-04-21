<?php
if(isset($_SESSION['lang'])) $lang = $_SESSION['lang'];
else $lang = 'en';
include('../languages/'.$lang.'.php');
if(isset($_POST['val']))
{	
	$val = $_POST['val'];
	if($val == 'daily') { ?>
		<div class="form-group">
			<label for="from" class="col-sm-2 control-label"><?php language('from'); language(' '); language('date'); ?></label>
			<div class="col-sm-10">
				<input type="date" class="form-control" name="from" id="from" placeholder="<?php language("date"); ?>" autocomplete="off" required/>
			</div>
		</div>
		<div class="form-group">
		<label for="to" class="col-sm-2 control-label"><?php language('to'); language(' '); language('date'); ?></label>
			<div class="col-sm-10">
				<input type="date" class="form-control" name="to" id="to" placeholder="<?php language("date"); ?>" autocomplete="off" required/>
			</div>
		</div>
	<?php }	elseif($val == 'monthly') { ?>
		<div class="form-group">
			<label for="from" class="col-sm-2 control-label"><?php language('from'); language(' '); language('date'); ?></label>
			<div class="col-sm-10">
				<select class="form-control" name="from" id="from" required/>
					<?php for($m=1;$m<13;$m++) { echo '<option value="'.$m.'">'.$m.'</option>'; } ?>
				</select>
			</div>
		</div>
		<div class="form-group">
		<label for="to" class="col-sm-2 control-label"><?php language('to'); language(' '); language('date'); ?></label>
			<div class="col-sm-10">
				<select class="form-control" name="to" id="to" required/>
					<?php for($m=1;$m<13;$m++) { echo '<option value="'.$m.'">'.$m.'</option>'; } ?>
				</select>
			</div>
		</div>
	<?php } elseif($val == 'yearly') { ?>
		<div class="form-group">
			<label for="from" class="col-sm-2 control-label"><?php language('from'); language(' '); language('date'); ?></label>
			<div class="col-sm-10">
				<select class="form-control" name="from" id="from" required/>
					<?php for($y=2016;$y<2036;$y++) { echo '<option value="'.$y.'">'.$y.'</option>'; } ?>
				</select>
			</div>
		</div>
		<div class="form-group">
		<label for="to" class="col-sm-2 control-label"><?php language('to'); language(' '); language('date'); ?></label>
			<div class="col-sm-10">
				<select class="form-control" name="to" id="to" required/>
					<?php for($y=2016;$y<2036;$y++) { echo '<option value="'.$y.'">'.$y.'</option>'; } ?>
				</select>
			</div>
		</div>
	<?php } 
   exit;
}
?>