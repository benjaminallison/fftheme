<?php
	$reviewLabels = array(
		'name' => _x('Reviews','post type general name'),
		'singular_name' => _x('Review','post type singular name'),
		'add_new' => _x('Add Review','review'),
		'add_new_item' => __('Add New Review'),
		'edit_item' => __('Edit Review'),
		'new_item' => __('New Review'),
		'view_item' => __('View Review'),
		'search_items' => __('Search Reviews'),
		'not_found' =>  __('No review found'),
		'not_found_in_trash' => __('No review found in Trash'),
		'parent_item_colon' => '',
		'menu_name' => 'Reviews'
	);
	$reviewArgs = array(
		'labels' => $reviewLabels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => 7,
		'menu_icon' => 'dashicons-products',
		'supports' => array('title', 'editor', 'thumbnail', 'excerpt' )
	);
	register_post_type('review', $reviewArgs);