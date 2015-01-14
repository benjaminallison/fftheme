<header id="header" class="masthead centredParallax">
	<div class="container">
		<nav id="nav" class="col-full">
			<div class="col-5-12 gutter-pad header-logo">
				<a href="#" class="button alignleft">Member SignUp</a>
				<?php $leftMenuParams = array( 'theme_location' => 'left-menu', 'container' => false, 'items_wrap' => '%3$s' ) ; ?>
				<ul id="left-menu" class="menu left-menu">
					<?php wp_nav_menu( $leftMenuParams ); ?>
				</ul>
			</div>
			<a class="col-1-6 gutter-pad header-logo" href="<?php echo home_url(); ?>">
				<img src="<?php echo get_template_directory_uri();?>/assets/images/logo.png" class="full-width" alt="" />
			</a>
			<div class="col-5-12 gutter-pad header-logo">
				<a href="#" class="button alignright">Member Login</a>
				<?php $rightMenuParams = array( 'theme_location' => 'right-menu', 'container' => false, 'items_wrap' => '%3$s' ) ; ?>
				<ul id="right-menu" class="right-menu menu">
					<?php wp_nav_menu( $rightMenuParams ); ?>
				</ul>
			</div>
		</nav>
		<button id="button nav-toggle">
			<span class="button-icon icon-open">&#xe689;</span>
			<span class="button-icon icon-close">&#xe68d;</span>
		</button>
	</div>
</header>