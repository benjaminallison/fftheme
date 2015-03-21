<aside id="sidebar-left" class="sidebar col-1-4 gutter-pad" role="complementary">
		<?php
			// dynamic_sidebar( 'sidebar-left' );
		?>

		<?php
			$sbArgs = array(
				'depth'	=> 3,
				'sort_column' => 'menu_order',
				'child_of' => topLevelParent(),
				'title_li' => ''
			);
		?>
		<h4 class="sidebar-nav-title"><a href="<?php echo get_the_permalink( topLevelParent() );?>"><?php echo get_the_title(topLevelParent());?></a></h4>
		<ul id="main-menu" class="sidebar-menu menu">
			<?php wp_list_pages($sbArgs); ?>
 		</ul>
</aside><!-- #sidebar-left -->