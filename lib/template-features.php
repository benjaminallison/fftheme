<?php
	if ( ! isset( $content_width ) ) {
		$content_width = 1200;
	}

	add_theme_support( 'menus' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('post-thumbnails');
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	// register_nav_menus( array(
	// 	'main-menu' => __( 'Main Menu', 'main-menu' ),
	// 	'left-menu' => __( 'Left Menu', 'left-menu' ),
	// 	'right-menu' => __( 'Right Menu', 'right-menu' ),
	// 	'footer-menu' => __( 'Footer Menu', 'footer-menu' ),
	// ) );

	function ffcc_widgets_init() {
		register_sidebar( array(
			'name'          => __( 'Left Sidebar', 'ffcc' ),
			'id'            => 'sidebar-left',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		) );
		register_sidebar( array(
			'name'          => __( 'Right Sidebar', 'ffcc' ),
			'id'            => 'sidebar-right',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		) );
	}
	add_action( 'widgets_init', 'ffcc_widgets_init' );

	add_image_size( '2x1-small', 150, 75, true );
	add_image_size( '2x1-medium', 600, 300, true );
	add_image_size( '2x1-large', 1200, 600, true );
	add_image_size( '2x1-massive', 1600,800, false );
	add_image_size( '1x2-small', 75, 150, true );
	add_image_size( '1x2-medium', 300, 600, true );
	add_image_size( '1x2-large', 600, 1200, true );
	add_image_size( '1x2-massive', 800, 1600, true );
	add_image_size( '16x9-small', 150, 84, true );
	add_image_size( '16x9-medium', 600, 336, true );
	add_image_size( '16x9-large', 1200, 675, true );
	add_image_size( '16x9-large', 1200, 675, true );
	add_image_size( '16x9-massive', 1600, 900, true );
	add_image_size( '4x3-small', 150, 112, true );
	add_image_size( '4x3-medium', 600, 450, true );
	add_image_size( '4x3-large', 1200, 675, true );
	add_image_size( '4x3-massive', 1600, 1200, true );
	add_image_size( '3x2-small', 150, 100, true );
	add_image_size( '3x2-medium', 600, 400, true );
	add_image_size( '3x2-large', 1200, 800, true );
	add_image_size( '3x2-massive', 1600, 1066, true );
	add_image_size( '1x1-small', 150, 150, true );
	add_image_size( '1x1-medium', 600, 600, true );
	add_image_size( '1x1-large', 1200, 1200, true );
	add_image_size( '1x1-massive', 1600, 1600, true );
	add_image_size( 'natural-small', 150, 150, false );
	add_image_size( 'natural-medium', 600, 600, false );
	add_image_size( 'natural-large', 1200, 1200, false );
	add_image_size( 'natural-massive', 1600, 1600, false );

	function set_permalink(){
		global $wp_rewrite;
		$wp_rewrite->set_permalink_structure('/%postname%/');
	}
	add_action('after_switch_theme', 'set_permalink');

	function theme_editor_styles() {
		add_editor_style( 'assets/css/build/editor-style.css' );
	}
	add_action( 'admin_init', 'theme_editor_styles' );