<?php
	$recipeLabels = array(
		'name' => _x('Recipes','post type general name'),
		'singular_name' => _x('Recipie','post type singular name'),
		'add_new' => _x('Add Recipie','recipe'),
		'add_new_item' => __('Add New Recipie'),
		'edit_item' => __('Edit Recipie'),
		'new_item' => __('New Recipie'),
		'view_item' => __('View Recipie'),
		'search_items' => __('Search Recipes'),
		'not_found' =>  __('No recipe found'),
		'not_found_in_trash' => __('No recipe found in Trash'),
		'parent_item_colon' => '',
		'menu_name' => 'Recipes'
	);
	$recipeArgs = array(
		'labels' => $recipeLabels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => 8,
		'menu_icon' => 'dashicons-list-view',
		'supports' => array('title','thumbnail','excerpt')
	);
	register_post_type('recipe', $recipeArgs );