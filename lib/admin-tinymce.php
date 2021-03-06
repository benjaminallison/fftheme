<?php
	function wpb_mce_buttons_2($buttons) {
		array_unshift($buttons, 'styleselect');
		return $buttons;
	}
	add_filter('mce_buttons_2', 'wpb_mce_buttons_2');

	function my_mce_before_init_insert_formats( $init_array ) {
		$style_formats = array(  
			array(  
				'title' => 'Button',
				'block' => 'span',
				'classes' => 'button',
				'wrapper' => true
			),
			array(  
				'title' => '<cite>',  
				'inline' => 'cite',
				'wrapper' => true,
			)
		);
		$init_array['style_formats'] = json_encode( $style_formats );
		return $init_array;  
	}
	add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );

	function my_theme_add_editor_styles() {
		add_editor_style( 'custom-editor-style.css' );
	}
	add_action( 'init', 'my_theme_add_editor_styles' );