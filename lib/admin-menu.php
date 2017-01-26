<?php
function custom_menu_order($menu_ord) {
	if (!$menu_ord) return true;
	 
	return array(
		'index.php', // Dashboard
		'separator1', // First separator
		'edit.php?post_type=page', // Pages
		'edit.php', // Posts
		'upload.php', // Media
		'edit.php?post_type=feature', // Custom type one
		'edit.php?post_type=ff_rse_event', // Custom type one
		'edit.php?post_type=wine', // Custom type one
		'edit.php?post_type=review', // Custom type one
		'edit.php?post_type=event', // Custom type one
		'edit.php?post_type=trade-and-media', // Custom type one
		'separator2', // Second separator
		'edit.php?post_type=acf-field-group', // Custom type one
		'theme-general-settings', // Settings
		'options-general.php', // Settings
		'plugins.php', // Plugins
		'tools.php', // Tools
		'themes.php', // Appearance
		'users.php', // Users
		'separator-last', // Last separator
	);
}
add_filter('custom_menu_order', 'custom_menu_order'); // Activate custom_menu_order
add_filter('menu_order', 'custom_menu_order');

function remove_menus(){
	remove_menu_page('link-manager.php');
	remove_menu_page('edit-comments.php');
}
add_action( 'admin_menu', 'remove_menus' );