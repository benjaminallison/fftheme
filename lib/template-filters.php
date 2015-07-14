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



	// modifies the main WordPress query to include an array of 
	function cpt_search( $query ) {
		if ( $query->is_search ) {
			$query->set( 'post_type', array( 'post', 'page', 'event' ) );
		}
		return $query;
	}
	add_filter( 'pre_get_posts', 'cpt_search' );

	function specify_current_page( $sorted_menu_items, $args ) {
		if ( isset( $args->current) ) {
			foreach($sorted_menu_items as $key => $val) {
				if ($sorted_menu_items[$key]->object_id == $args->current ) {
					$sorted_menu_items[$key]->current = 1;
					$sorted_menu_items[$key]->classes[] = "current-menu-item";
					$sorted_menu_items[$key]->classes[] = "page_item";
					$sorted_menu_items[$key]->classes[] = "current_page_item";
				}
			}
		}
		return $sorted_menu_items;
	}
	add_filter( 'wp_nav_menu_objects', 'specify_current_page', 10, 2 );

	function add_current_class_to_posts_page( $classes, $item ) {
		static $posts_page;
	
		if ( ! is_single() )
			return $classes;
	
		if ( ! isset( $posts_page ) )
			$posts_page = get_option( 'page_for_posts' ); // cache as we may be calling this a lot!
	
		if ( $item->object == 'page' && $item->object_id == $posts_page )
			$classes[] = 'current_page_item'; // this is the posts page!
	
		return $classes;
	}
	add_filter( 'nav_menu_css_class', 'add_current_class_to_posts_page', 10, 2 );

	// filter_hook function to react on sub_menu flag
	function my_wp_nav_menu_objects_sub_menu( $sorted_menu_items, $args ) {
		if ( isset( $args->sub_menu ) ) {
			$root_id = 0;
			// if string, parent has been specified...
			if ( is_string($args->sub_menu) ) {
				$ids = wp_filter_object_list( $sorted_menu_items, array( 'post_title' => $args->sub_menu ) );
				$nav_item = array_pop( $ids );
				$root_id = $nav_item->ID;
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
			
			// prd($sorted_menu_items);
			return $sorted_menu_items;
		} else {
			return $sorted_menu_items;
		}
	}
		// add hook
	add_filter( 'wp_nav_menu_objects', 'my_wp_nav_menu_objects_sub_menu', 10, 2 );