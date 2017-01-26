<?php
	function load_scripts() {
		wp_register_script( 'vendor-scripts', get_template_directory_uri() . '/assets/js/build/vendor.min.js', array("jquery"), 1.0 , true );
		wp_enqueue_script( 'vendor-scripts' );
		wp_register_script( 'firefly-scripts', get_template_directory_uri() . '/assets/js/build/script.min.js', array("jquery"), 1.0 , true );
		wp_enqueue_script( 'firefly-scripts' );

		if (in_array($_SERVER['SERVER_NAME'], array('url.dev'))) {
			wp_register_script('livereload', '//localhost:35729/livereload.js?snipver=1', null, false, true);
			wp_enqueue_script('livereload');
		}

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'load_scripts' );