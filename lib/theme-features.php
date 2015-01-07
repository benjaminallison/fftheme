<?php
	add_theme_support( 'menus' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('post-thumbnails');
	add_theme_support( 'title-tag' );
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	add_image_size( '16x9-small', 150, 84, true );
	add_image_size( '16x9-medium', 600, 336, true );
	add_image_size( '16x9-large', 1200, 675, true );
	add_image_size( '4x3-small', 150, 112, true );
	add_image_size( '4x3-medium', 600, 450, true );
	add_image_size( '4x3-large', 1200, 675, true );
	add_image_size( '3x2-small', 150, 100, true );
	add_image_size( '3x2-medium', 600, 400, true );
	add_image_size( '3x2-large', 1200, 800, true );
	add_image_size( '1x1-small', 150, 150, true );
	add_image_size( '1x1-medium', 600, 600, true );
	add_image_size( '1x1-large', 1200, 1200, true );
	add_image_size( 'natural-small', 150, 150, false );
	add_image_size( 'natural-medium', 600, 600, false );
	add_image_size( 'natural-large', 1200, 1200, false );