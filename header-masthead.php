<header id="header" class="section-block">
	<div class="container">
		<a id="header-logo" class="col-1-6 gutter-pad" href="<?php echo home_url(); ?>">
			<img src="<?php echo get_template_directory_uri();?>/images/logo.png" class="full-height" alt="site name"/>
		</a>
		<nav id="nav" class="col-5-6 gutter-pad">
			<?php $menuParameters = array( 'container' => false, 'items_wrap' => '%3$s' ) ; ?>
			<ul id="menu-main" class="menu">
				<?php wp_nav_menu( $menuParameters ); ?>
			</ul>
		</nav>
		<button id="button nav-toggle">
			<span class="button-icon icon-open">&#xe689;</span>
			<span class="button-icon icon-close">&#xe68d;</span>
		</button>
	</div>
</header>