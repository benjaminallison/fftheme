<?php
// create custom plugin settings menu

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' => 'Theme Options'
	));
}