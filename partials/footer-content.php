<footer id="footer" class="page_footer">
	<div class="container">
		<nav class="col_6 gutter_pad footer_nav">
			<h4>Find your way</h4>
			<?php $footerMenuParams = array( 'theme_location' => 'footer-menu', 'container' => false, 'items_wrap' => '%3$s' ) ; ?>
			<ul id="page_footer_menu" class="page_footer_menu menu">
				<?php wp_nav_menu( $footerMenuParams ); ?>
			</ul>
		</nav>
		<div class="col-half gutter=pad">
			<h4>© <?php echo date("Y"); ?> <?php echo get_bloginfo( 'name' ); ?></h4>
			<p><?php echo get_bloginfo( 'description' ); ?></p>
		</div>
	</div>
</footer>