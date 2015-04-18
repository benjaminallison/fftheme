<?php
	function load_styles() {
		wp_register_style( 'theme-declaration', get_template_directory_uri() . '/style.css', false, false , "all" );
		wp_enqueue_style( 'theme-declaration' );
		wp_register_style( 'theme-styles', get_template_directory_uri() . '/assets/css/build/global.css', false, false , "all" );
		wp_enqueue_style( 'theme-styles' );
	}
	add_action( 'wp_enqueue_scripts', 'load_styles' );