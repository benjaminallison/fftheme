<?php
	$wineLabels = array(
		'name' => _x('Wines','post type general name'),
		'singular_name' => _x('Wine','post type singular name'),
		'add_new' => _x('Add Wine','wine'),
		'add_new_item' => __('Add New Wines'),
		'edit_item' => __('Edit Wines'),
		'new_item' => __('New Wine'),
		'view_item' => __('View Wines'),
		'search_items' => __('Search Wines'),
		'not_found' =>  __('No wine found'),
		'not_found_in_trash' => __('No wine found in Trash'),
		'parent_item_colon' => '',
		'menu_name' => 'Wines'
	);
	$wineArgs = array(
		'labels' => $wineLabels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'capability_type' => 'page',
		'has_archive' => true,
		'hierarchical' => true,
		'menu_position' => 7,
		'menu_icon' => 'dashicons-products',
		'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'page-attributes')
	);
	register_post_type('wine', $wineArgs);