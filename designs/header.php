			<div class="logo">
				<a href="index.php"><img src="images/logo.png" alt=" " /></a>
			</div>
			<div class="logo-right">
				<span class="menu"><img src="images/menu.png" alt=" "/></span>
				<ul class="nav1">
					<li class="<?php if(basename($_SERVER["SCRIPT_FILENAME"], '.php') == 'index') echo 'cap'; ?>"><a href="index.php" class="act">HOME<span>START HERE</span></a></li>
					<!--<li><a href="index.php#about" class="act1 scroll">ABOUT US<span>KNOW US</span></a></li>
					<li><a href="index.php#feature" class="act2 scroll">OFFERS<span>READ</span></a></li>-->
					<?php if(isset($_SESSION['uid']) && $_SESSION['advertiser'] == '0') { ?>
						<li class="<?php if(basename($_SERVER["SCRIPT_FILENAME"], '.php') != 'index' && basename($_SERVER["SCRIPT_FILENAME"], '.php') != 'contact') echo 'cap'; ?>"><a href="page.php?c=advertisements" class="act3">ADVERTISEMENTS<span>USER </span></a></li>
						<!--<li><a href="logout.php" class="act4">LOGOUT<span>LOGOUT </span></a></li>-->
					<?php } elseif(isset($_SESSION['uid']) && $_SESSION['advertiser'] == '1') { ?>
						<li class="<?php if(basename($_SERVER["SCRIPT_FILENAME"], '.php') != 'index' && basename($_SERVER["SCRIPT_FILENAME"], '.php') != 'contact') echo 'cap'; ?>"><a href="page.php?c=myadvertisements" class="act3">ADVERTISEMENTS<span>USER </span></a></li>
					<?php } elseif(isset($_SESSION['admin'])) { ?>
						<li class="<?php if(basename($_SERVER["SCRIPT_FILENAME"], '.php') != 'index' && basename($_SERVER["SCRIPT_FILENAME"], '.php') != 'contact') echo 'cap'; ?>"><a href="admin.php?c=adstatistics" class="act3">PROFILE<span>ADMIN </span></a></li>
						<!--<li><a href="adminlogout.php" class="act4">LOGOUT<span>LOGOUT </span></a></li>-->
					<?php } else { ?>
						<li class="<?php if(basename($_SERVER["SCRIPT_FILENAME"], '.php') == 'register') echo 'cap'; ?>"><a href="register.php" class="act3">SIGN UP<span>REGISTER </span></a></li>
						<!--<li class="<?php if(basename($_SERVER["SCRIPT_FILENAME"], '.php') == 'login') echo 'cap'; ?>"><a href="login.php" class="act4">LOGIN<span>MEMBER </span></a></li>-->
					<?php } ?>
					<li class="<?php if(basename($_SERVER["SCRIPT_FILENAME"], '.php') == 'contact') echo 'cap'; ?>"><a href="contact.php" class="act5">CONTACT US<span>GET IN TOUCH</span></a></li>
				</ul>
			</div>
			<div class="clearfix"> </div>
				<!-- script for menu -->
					<script> 
						$( "span.menu" ).click(function() {
						$( "ul.nav1" ).slideToggle( 300, function() {
						 // Animation complete.
						});
						});
					</script>
				<!-- //script for menu -->