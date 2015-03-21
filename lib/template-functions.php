<?php
	function hasChildren($id = null) {
		global $post;
		if ($id == null ) {
			$id = $post->ID;
		}
		$children = get_pages('child_of='.$id);
		if ( !empty( $children ) ) {
			return true;
		} else {
			return false;
		}
	}

	function getGrandparent($id = null) {
		global $post;
		if ($id === null ) {
			$id = $post->ID;
		} else {
			$post = get_post($id);
		}
		if ( $post->post_parent ) {
			$parentData = get_post($post->post_parent);
			if ( $parentData->post_parent ) {
				return $parentData->post_parent;;
			}
		}
		return false;
	}

	function topLevelParent() {

		$cptOverride = array(
		);

		global $post;
		$postToQuery = $post->ID;
		foreach ($cptOverride as $key => $id) {
			if ( $key == $post->post_type ) {
				$postToQuery = $id;
			}
		}
		$ancestors = get_post_ancestors($postToQuery);
		$topLevelParent = array_pop($ancestors);
		if ( empty($topLevelParent) ) {
			$topLevelParent = $postToQuery;
		}
		return $topLevelParent;
	}

	function list_menu($atts, $content = null) {
		extract(shortcode_atts(array(  
			'menu'            => '', 
			'container'       => 'div', 
			'container_class' => 'sitemap', 
			'container_id'    => '', 
			'menu_class'      => 'menu', 
			'menu_id'         => '',
			'echo'            => true,
			'fallback_cb'     => 'wp_page_menu',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'depth'           => 0,
			'walker'          => '',
			'theme_location'  => ''), 
			$atts));
	 
	 
		return wp_nav_menu( array( 
			'menu'            => $menu, 
			'container'       => $container, 
			'container_class' => $container_class, 
			'container_id'    => $container_id, 
			'menu_class'      => $menu_class, 
			'menu_id'         => $menu_id,
			'echo'            => false,
			'fallback_cb'     => $fallback_cb,
			'before'          => $before,
			'after'           => $after,
			'link_before'     => $link_before,
			'link_after'      => $link_after,
			'depth'           => $depth,
			'walker'          => $walker,
			'theme_location'  => $theme_location));
	}
	//Create the shortcode
	add_shortcode("listmenu", "list_menu");