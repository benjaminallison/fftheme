<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo home_url(); ?>/favicon.png">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<!--[if lt IE 9]>
			<script src="<?php echo get_template_directory_uri(); ?>/assets/js/vendor/html5shiv.min.js"></script>
		<![endif]-->
	
		<!-- 
			<script type="text/javascript" src="http://use.typekit.com/mpe4ylu.js"></script>
			<script type="text/javascript">try{Typekit.load();}catch(e){}</script> 
		-->
		<?php wp_head(); ?>
	</head>
	<body <?php body_ID(); ?> <?php body_class(); ?>>
		<div id="page" class="page_wrap">
			<header id="header" class="page_header">
				<div class="container">
					<nav id="nav" class="col_12">
						<div class="col_5 gutter_pad">
							<a href="#" class="button alignleft">Member SignUp</a>
							<?php $leftMenuParams = array( 'theme_location' => 'left-menu', 'container' => false, 'items_wrap' => '%3$s' ) ; ?>
							<ul id="left-menu" class="menu left-menu">
								<?php wp_nav_menu( $leftMenuParams ); ?>
							</ul>
						</div>
						<a class="col_2 gutter_pad header_logo" href="<?php echo home_url(); ?>">
							<img src="<?php echo get_template_directory_uri();?>/assets/images/logo.png" class="full-width" alt="" />
						</a>
						<div class="col_5 gutter_pad">
							<a href="#" class="button alignright">Member Login</a>
							<?php $rightMenuParams = array( 'theme_location' => 'right-menu', 'container' => false, 'items_wrap' => '%3$s' ) ; ?>
							<ul id="right-menu" class="right-menu menu">
								<?php wp_nav_menu( $rightMenuParams ); ?>
							</ul>
						</div>
					</nav>
					<button id="nav_toggle" class="button nav_toggle">
						<div class="toggle_icon">
							<span class="toggle_icon_line top_line"></span>
							<span class="toggle_icon_line mid_line"></span>
							<span class="toggle_icon_line bot_line"></span>
						</div>
					</button>
				</div>
			</header>