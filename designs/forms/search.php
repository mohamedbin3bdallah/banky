<script type="text/javascript" src="../js/search.js"></script>
<!-- <form action="" method="GET"> -->
	<div class="col-md-8 <?php if($lang_file == 'ar') echo ' col-md-push-4'; ?>">
		<input type="text" id="search" name="search" class="form-control" placeholder="<?php language("search"); ?>" autocomplete="off">
		<div style="position:absolute;" id="searchresult"></div>
	</div>
	<div class="col-md-4 <?php if($lang_file == 'ar') echo ' col-md-pull-8'; ?>">
		<button type="submit" class="btn btn-defualt" name="savesearch" style="display:none;"><?php language("search"); ?></button>
	</div>
<!-- </form> -->