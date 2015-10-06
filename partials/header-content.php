<header id="header" class="page_header">
	<div class="container">
		<nav id="nav" class="col_12">
			<div class="col_5 gutter_pad header_logo">
				<a href="#" class="button alignleft">Member SignUp</a>
				<?php $leftMenuParams = array( 'theme_location' => 'left-menu', 'container' => false, 'items_wrap' => '%3$s' ) ; ?>
				<ul id="left-menu" class="menu left-menu">
					<?php wp_nav_menu( $leftMenuParams ); ?>
				</ul>
			</div>
			<a class="col_2 gutter_pad header_logo" href="<?php echo home_url(); ?>">
				<img src="<?php echo get_template_directory_uri();?>/assets/images/logo.png" class="full-width" alt="" />
			</a>
			<div class="col_5 gutter_pad header_logo">
				<a href="#" class="button alignright">Member Login</a>
				<?php $rightMenuParams = array( 'theme_location' => 'right-menu', 'container' => false, 'items_wrap' => '%3$s' ) ; ?>
				<ul id="right-menu" class="right-menu menu">
					<?php wp_nav_menu( $rightMenuParams ); ?>
				</ul>
			</div>
		</nav>
		<button id="nav_toggle" class="button nav_toggle">
			<!-- <span class="icon button-icon icon-bars nav-open"></span>
			<span class="icon button-icon icon-close nav-close"></span> -->
			<div class="toggle_icon">
				<span class="toggle_icon_line top_line"></span>
				<span class="toggle_icon_line mid_line"></span>
				<span class="toggle_icon_line bot_line"></span>
			</div>
		</button>
	</div>
</header>