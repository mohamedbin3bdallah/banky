<link rel="stylesheet" href="../css/system.css">
<?php $profileImage = getProfileImage($profileid); ?>

<nav class="navbar system">
	<div class="col-xs-3 col-md-4<?php if($lang_file == 'ar') echo ' col-xs-push-9 col-md-push-8'; ?>">
		<a class="" href="#">Brand</a>
	</div>

  <div class="container-fluid col-xs-9 col-md-8<?php if($lang_file == 'ar') echo ' col-xs-pull-3 col-md-pull-4'; ?>">
    <!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle<?php if($lang_file == 'ar') echo ' pull-left'; ?>" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      
	
      <!-- <form class="navbar-form navbar-left" role="search"> -->
	<div class="col-xs-12 col-md-8<?php if($lang_file == 'ar') echo ' col-md-push-4'; ?>">
		<div class="form-group">
			<?php include("../designs/forms/search.php")?>
        </div>
        <!-- <button type="submit" class="btn btn-default">Submit</button> -->
      <!-- </form> -->
	</div>
    <div class="topbar-links col-xs-12 col-md-4<?php if($lang_file == 'ar') echo ' col-md-pull-8'; ?>">
      <ul class="nav navbar-nav navbar-<?php if($lang_file == 'ar') echo 'right'; else echo 'left'; ?>">
		<div class="col-xs-3 col-md-3<?php if($lang_file == 'ar') echo ' col-xs-push-9 col-md-push-9'; ?>">
			<?php if(isset($_COOKIE['isadmin'])) { ?><li><a href="../admin/pages/" title="<?php language("admin"); ?>"><?php language(" ").language("admin").language(" "); ?></a></li><?php } ?>
		</div>
		<div class="col-xs-3 col-md-3<?php if($lang_file == 'ar') echo ' col-xs-push-3 col-md-push-3'; ?>">
		<li><a href="../logout.php" title="<?php language("logout"); ?>"><i class="glyphicon glyphicon-log-out"></i></a></li>
		</div>
		<div class="col-xs-3 col-md-3<?php if($lang_file == 'ar') echo ' col-xs-pull-3 col-md-pull-3'; ?>">
			<li><a href="../groups/groups.php" title="<?php language("home"); ?>"><i class="glyphicon glyphicon-home"></i></a></li>
		</div>
		<div class="col-xs-3 col-md-3<?php if($lang_file == 'ar') echo ' col-xs-pull-9 col-md-pull-9'; ?>">
			<li><a href="../pages/profile.php?id=<?php echo $_COOKIE['userid']; ?>" title="<?php language("myprofile"); ?>"><i class="glyphicon glyphicon-user"></i></a></li>
		</div>
      </ul>
	</div>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>