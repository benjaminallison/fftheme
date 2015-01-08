<?php
	$featuredLabels = array(
		'name' => _x('Features','post type general name'),
		'singular_name' => _x('Featured','post type singular name'),
		'add_new' => _x('Add Feature','case'),
		'add_new_item' => __('Add New Feature'),
		'edit_item' => __('Edit Feature'),
		'new_item' => __('New Feature'),
		'view_item' => __('View Feature'),
		'search_items' => __('Search Features'),
		'not_found' =>  __('No features found'),
		'not_found_in_trash' => __('No features found in Trash'),
		'parent_item_colon' => '',
		'menu_name' => 'Features'
	);
	$featuredArgs = array(
		'labels' => $featuredLabels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => 6,
		'menu_icon' => 'dashicons-star-filled',
		'supports' => array('title','excerpt', 'thumbnail')
	);
	register_post_type('feature', $featuredArgs);