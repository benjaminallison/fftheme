<?php
	function load_scripts() {
		wp_register_script( 'theme-scripts', get_template_directory_uri() . '../assets/js/build/theme-scripts.js', array("jquery"), 1.0 , true );
		wp_enqueue_script( 'theme-scripts' );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'load_scripts' );