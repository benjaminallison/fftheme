<?php
	function my_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}
	
		global $page, $paged;
	
		// Add the blog name
		$title .= get_bloginfo( 'name', 'display' );
	
		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}
	
		// Add a page number if necessary:
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( __( 'Page %s', 'adsdf' ), max( $paged, $page ) );
		}
	
		return $title;
	}
	add_filter( 'wp_title', 'my_wp_title', 10, 2 );
	
	function render_my_wp_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}
	add_action( 'wp_head', 'render_my_wp_title' );

	function body_ID() {
		global $post;
		if ( $post ) {
			return 'id="'.$post->post_name.'"';
		}
	} 

	function body_classes( $classes ) {
		global $post;
		if ( $post ) {
			$classes[] = $post->post_name;
			if ( isset($post->post_type) ) {
				$classes[] = $post->post_type;
			}
		}

		if ( function_exists("wpmd_is_device") ) {
			if ( wpmd_is_device() ) {
				$classes[] = "mobile-device";
				if ( wpmd_is_tablet() ) {
					$classes[] = " tablet-device";
				}
				if ( wpmd_is_phone() ) {
					$classes[] = "phone-device";
				}
			} else {
				$classes[] = "desktop-device";
			}
		}

		return $classes;
	}
	add_filter( 'body_class', 'body_classes' );

	// filter_hook function to react on sub_menu flag
	function my_wp_nav_menu_objects_sub_menu( $sorted_menu_items, $args ) {
		if ( isset( $args->sub_menu ) ) {
			$root_id = 0;

			if ( isset($args->page_id) ) {
				foreach ( $sorted_menu_items as $menu_item ) {
					if ( $menu_item->object_id == $args->page_id ) {
						$root_id = $menu_item->ID;
						break;
					}
				}
			} else {
				// find the current menu item
				foreach ( $sorted_menu_items as $menu_item ) {
					if ( $menu_item->current ) {
						// set the root id based on whether the current menu item has a parent or not
						$root_id = ( $menu_item->menu_item_parent ) ? $menu_item->menu_item_parent : $menu_item->ID;
						break;
					}
				}
				
				// find the top level parent
				if ( ! isset( $args->direct_parent ) ) {
					$prev_root_id = $root_id;
					while ( $prev_root_id != 0 ) {
						foreach ( $sorted_menu_items as $menu_item ) {
							if ( $menu_item->ID == $prev_root_id ) {
								$prev_root_id = $menu_item->menu_item_parent;
								// don't set the root_id to 0 if we've reached the top of the menu
								if ( $prev_root_id != 0 ) $root_id = $menu_item->menu_item_parent;
								break;
							}
						}
					}
				}
			}
		
			$menu_item_parents = array();
			foreach ( $sorted_menu_items as $key => $item ) {
				// init menu_item_parents
				if ( $item->ID == $root_id ) $menu_item_parents[] = $item->ID;
				if ( in_array( $item->menu_item_parent, $menu_item_parents ) ) {
					// part of sub-tree: keep!
					$menu_item_parents[] = $item->ID;
					} else if ( ! ( isset( $args->show_parent ) && in_array( $item->ID, $menu_item_parents ) ) ) {
					// not part of sub-tree: away with it!
					unset( $sorted_menu_items[$key] );
				}
			}
			
			return $sorted_menu_items;
		} else {
			return $sorted_menu_items;
		}
	}
		// add hook
	add_filter( 'wp_nav_menu_objects', 'my_wp_nav_menu_objects_sub_menu', 10, 2 );