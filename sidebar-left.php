<aside id="sidebar-left" class="col-1-4" role="complementary">
	<div class="inner-wrap">
		<?php
			// dynamic_sidebar( 'sidebar-left' );
		?>
		<?php $subMenuParams = array( 'theme_location' => 'main-menu', 'container' => false, 'items_wrap' => '%3$s', 'sub_menu' => true ) ; ?>
		<ul id="main-menu" class="sidebar-menu menu">
			<?php wp_nav_menu( $subMenuParams ); ?>
 		</ul>
	</div>
</aside><!-- #sidebar-left -->