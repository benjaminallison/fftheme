<?php
	include(dirname(__FILE__) . '/lib/utilities.php');
	include(dirname(__FILE__) . '/lib/excerpt-prefs.php');
	include(dirname(__FILE__) . '/lib/template-features.php');
	include(dirname(__FILE__) . '/lib/template-filters.php');
	include(dirname(__FILE__) . '/lib/template-functions.php');
	include(dirname(__FILE__) . '/lib/template-nav-filters.php');
	include(dirname(__FILE__) . '/lib/template-tags.php');
	include(dirname(__FILE__) . '/lib/template-shortcodes.php');
	include(dirname(__FILE__) . '/lib/enqueue-styles.php');
	include(dirname(__FILE__) . '/lib/enqueue-scripts.php');
	include(dirname(__FILE__) . '/lib/dequeuing.php');
	include(dirname(__FILE__) . '/lib/default-setup.php');
	include(dirname(__FILE__) . '/lib/auto-install-plugins.php');
	include(dirname(__FILE__) . '/lib/admin-menu.php');
	include(dirname(__FILE__) . '/lib/admin-tinymce.php');

	// include(dirname(__FILE__) . '/lib/images-rotate-on-upload.php');
	// include(dirname(__FILE__) . '/lib/admin-options.php');
	// add_filter('show_admin_bar', '__return_false');