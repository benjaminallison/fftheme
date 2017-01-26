<?php

function createPage($pageName, $option) {
	$new_page_content = 'This is the page content';
	$new_page_template = '';
	$page_check = get_page_by_title($pageName);
	$new_page = array(
		'post_type' => 'page',
		'post_title' => $pageName,
		'post_content' => $new_page_content,
		'post_status' => 'publish',
		'post_author' => 1,
		'post_name' => $option
	);
	if(!isset($page_check->ID)){
		$new_page_id = wp_insert_post($new_page);
		if(!empty($new_page_template)){
			update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
		}
	}
	if ($option == 'home') {
		$homeSet = get_page_by_title( $pageName );
		update_option( 'page_on_front', $homeSet->ID );
		update_option( 'show_on_front', 'page' );
	} else if ($option == 'news') {
		$newsSet = get_page_by_title( $pageName );
		update_option( 'page_for_posts', $newsSet->ID );
	}
}

createPage('Home', 'home');
createPage('News', 'news');
createPage('Wines', 'wines');
createPage('Reviews', 'reviews');
createPage('Recipes', 'recipes');
createPage('Trade and Media', 'trade-and-media');
createPage('Contact', "contact");
createPage('About', "about-us");