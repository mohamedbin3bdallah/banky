<div class="col-md-4">
<div class="index-label"><?php language('newuser'); ?></div>
<form action="" method="POST">	
	<table class="table" align="center" >
		<!-- <tr><td><input type="text" class="form-control" name="fname" id="fnamereg" pattern="[A-Za-z]{3,}" title="Three letter or more" placeholder="<?php language("fname"); ?>" maxlength="30" value="<?php if(isset($_POST['fname'])) echo $_POST['fname']; ?>" required/></td></tr>
		<tr><td><input type="text" class="form-control" name="sname" id="snamereg" pattern="[A-Za-z]{3,}" title="Three letter or more" placeholder="<?php language("sname"); ?>" maxlength="30" value="<?php if(isset($_POST['sname'])) echo $_POST['sname']; ?>" required/></td></tr> -->
		<tr><td id="noborder"><input type="text" class="form-control" name="username" id="username" placeholder="<?php language("username"); ?>" value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>" autocomplete="off" required/><input type="hidden" name="username-hidden" id="username-hidden" value="0" /><div id="username-validation"></div></td></tr>
		<tr><td id="noborder">
			<select name="country" id="country" class="form-control" required>
				<option value=""><?php language("country"); ?></option>
				<?php getCountries($lang_file); ?>
			</select>
		</td></tr>
		<tr><td id="noborder">
			<select name="town" id="town" class="form-control" required>
				<option value=""><?php language("town"); ?></option>				
			</select>
		</td></tr>
		<tr><td id="noborder">
			<select name="city" id="city" class="form-control" required>
				<option value=""><?php language("city"); ?></option>				
			</select>
		</td></tr>
		<tr><td id="noborder"><input type="text" class="form-control" name="family" id="family" placeholder="<?php language("family"); ?>" value="<?php if(isset($_POST['family'])) echo $_POST['family']; ?>" autocomplete="off" required/><input type="hidden" name="family-hidden" id="family-hidden" value="0" /><div id="family-validation"></div></td></tr>
		<tr><td id="noborder"><input type="password" class="form-control" name="password" id="password" placeholder="<?php language("password"); ?>" autocomplete="off" required/><input type="hidden" name="password-hidden" id="password-hidden" value="0" /><div id="password-validation"></div></td></tr>
		<tr><td id="noborder"><input type="password" class="form-control" name="cmfpassword" id="cmfpassword" placeholder="<?php language("cmfpassword"); ?>" maxlength="30" autocomplete="off" required/><input type="hidden" name="cmfpassword-hidden" id="cmfpassword-hidden" value="0" /><div id="cmfpassword-validation"></div></td></tr>
		<tr><td id="noborder"><input  type="submit" class="btn btn-info" name="registersubmit" id="registersubmit" class="greenButton" value="<?php language("signin"); ?>" disabled/></td></tr>		
	</table>
</form>
</div>