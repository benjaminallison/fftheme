<?php
// create custom plugin settings menu

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page();

	// acf_add_options_page(array(
	// 	'page_title' 	=> 'Theme Options',
	// 	'menu_title'	=> 'Theme Options',
	// 	'menu_slug' 	=> 'theme-general-settings',
	// 	'capability'	=> 'edit_posts',
	// 	'redirect'		=> false
	// ));
	// 
	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'External Links',
	// 	'menu_title'	=> 'External Links',
	// 	'parent_slug'	=> 'theme-general-settings',
	// ));
	// 
	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'Socials',
	// 	'menu_title'	=> 'Socials',
	// 	'parent_slug'	=> 'theme-general-settings',
	// ));
	
}