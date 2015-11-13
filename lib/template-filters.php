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