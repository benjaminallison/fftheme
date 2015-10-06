<aside id="sidebar_left" class="sidebar sidebar_left col_3 gutter_pad" role="complementary">
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
		<h4 class="sidebar_nav_title"><a href="<?php echo get_the_permalink( topLevelParent() );?>"><?php echo get_the_title(topLevelParent());?></a></h4>
		<ul id="main_menu" class="sidebar_menu menu">
			<?php wp_list_pages($sbArgs); ?>
 		</ul>
</aside><!-- #sidebar-left -->