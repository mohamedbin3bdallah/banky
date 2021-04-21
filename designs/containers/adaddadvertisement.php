<script>
  window.onmousedown = function (e) {
    var el = e.target;
    if (el.tagName.toLowerCase() == 'option' && el.parentNode.hasAttribute('multiple')) {
        e.preventDefault();

        // toggle selection
        if (el.hasAttribute('selected')) el.removeAttribute('selected');
        else el.setAttribute('selected', '');

        // hack to correct buggy behavior
        var select = el.parentNode.cloneNode(true);
        el.parentNode.parentNode.replaceChild(select, el.parentNode);
    }
}
</script>

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data" autocomplete="off">
				<?php
					if(isset($_GET['message']) && $_GET['message'] != '') { echo '<h2 style="text-align:center; color: green;">'; language($_GET['message']); echo '</h2>'; }
				?>
				<div class="form-group">
					<label for="uid" class="col-sm-2 control-label"><?php language('user'); ?></label>
					<div class="col-sm-10">
						<?php $users = getAllDataFromTable('users',' where active = 1 and addads > 0',' order by username ASC'); ?>
						<select class="form-control" name="uid" id="uid" required/>
							<?php for($j=0;$j<count($users);$j++) { echo '<option value="'.$users[$j]['id'].'">'.$users[$j]['username'].'</option>'; } ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="category" class="col-sm-2 control-label"><?php language('plan'); ?></label>
					<div class="col-sm-10">
						<select class="form-control" name="plan" id="plan" required/>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="category" class="col-sm-2 control-label"><?php language('category'); ?></label>
					<div class="col-sm-10">
						<?php $adcategories = getAllDataFromTable('adcategories','',''); ?>
						<select class="form-control" name="category" id="category" required/>
							<?php for($i=0;$i<count($adcategories);$i++) { echo '<option value="'.$adcategories[$i]['title'].'">'.$adcategories[$i]['title'].'</option>'; } ?>
						</select>
					</div>
				</div>
				<div class="form-group">
				<label for="title" class="col-sm-2 control-label"><?php language('title'); ?></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="title" id="title" maxlength="20" placeholder="<?php language("title"); ?>" autocomplete="off" required/>
					</div>
				</div>
				<div class="form-group">
				<label for="description" class="col-sm-2 control-label"><?php language('description'); ?></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="description" id="description" maxlength="255" placeholder="<?php language("description"); ?>" autocomplete="off" required/>
					</div>
				</div>
				<div class="form-group">
				<label for="advertisement" class="col-sm-2 control-label"><?php language('advertisement'); ?></label>
					<div class="col-sm-10" id="jsadvertisement">
						<input type="text" class="form-control" name="ad" id="ad" placeholder="<?php language("url"); ?>" autocomplete="off" required/>
					</div>
				</div>
				<!--<div class="form-group">
					<label for="timer" class="col-sm-2 control-label"><?php //language('timer'); ?></label>
					<div class="col-sm-10" id="jsadvertisement">
						<input type="number" class="form-control" name="timer" id="timer" min="1" step="1" autocomplete="off" required/>
					</div>
				</div>-->
				<div class="form-group">
					<label for="country" class="col-sm-2 control-label"><?php language('country'); ?></label>
					<div class="col-sm-10">
						<?php $countries = getCountries(); ?>
						<select class="form-control" name="countries[]" id="countries" multiple />
							<?php for($co=0;$co<count($countries);$co++) { echo '<option value="'.$countries[$co]['country'].'">'.$countries[$co]['country'].'</option>'; } ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="age" class="col-sm-2 control-label"><?php language('age'); ?></label>
					<label for="from" class="col-sm-2 control-label"><?php language('from'); ?></label>
					<div class="col-sm-3">
						<input type="number" class="form-control" name="fage" id="fage" min="1" step="1" autocomplete="off" />
					</div>
					<label for="to" class="col-sm-2 control-label"><?php language('to'); ?></label>
					<div class="col-sm-3">
						<input type="number" class="form-control" name="tage" id="tage" min="1" step="1" autocomplete="off" />
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<input type="submit" class="btn btn-default" name="advertisementsubmit" id="advertisementsubmit" value="<?php language("upload"); ?>" />
					</div>
				</div>
			</form>
		</div>
	</div>