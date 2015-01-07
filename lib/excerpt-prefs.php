<?php
	// CUSTOM EXCERPT SETTINGS
	
	function custom_excerpt_length( $length ) {
		return 40;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
	
	function new_excerpt_more( $more ) {
		return '...';
	}
	add_filter('excerpt_more', 'new_excerpt_more');
	
	function excerpt_read_more_link($output) {
		global $post;
		return $output /*. '<p class="readMore"><a href="'. get_permalink($post->ID) . '"> Read More...</a></p>'*/;
	}
	add_filter('the_excerpt', 'excerpt_read_more_link');
	
	function addPageExcerpts() {
		add_post_type_support( 'page', 'excerpt' );
	}
	add_action('init', 'addPageExcerpts');