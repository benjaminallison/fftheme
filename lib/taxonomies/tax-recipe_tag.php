<?php
	register_taxonomy(
		'recipe_tag',
		'recipe',
		array(
			'rewrite' => array( 'slug' => 'recipe_tag' ),
			'hierarchical' => true,
			'labels' => array(
				'name' => _x( 'Recipe Tags', 'taxonomy general name' ),
				'singular_name' => _x( 'Recipe Tags', 'taxonomy singular name' ),
				'search_items' =>  __( 'Search Recipe Tags' ),
				'all_items' => __( 'All Recipe Tags' ),
				'edit_item' => __( 'Edit Recipe Tag' ),
				'update_item' => __( 'Update Recipe Tag' ),
				'add_new_item' => __( 'Add New Recipe Tag' ),
				'new_item_name' => __( 'New Recipe Tag Name' ),
				'menu_name' => __( 'Recipe Tags' ),
			),
			'capabilities' => array(
				'manage__terms' => 'edit_posts',
				'edit_terms' => 'manage_categories',
				'delete_terms' => 'manage_categories',
				'assign_terms' => 'edit_posts'
			)
		)
	);