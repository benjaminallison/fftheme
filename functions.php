<?php
	include(dirname(__FILE__) . '/lib/utilities.php');
	include(dirname(__FILE__) . '/lib/excerpt-prefs.php');
	include(dirname(__FILE__) . '/lib/template-features.php');
	include(dirname(__FILE__) . '/lib/template-filters.php');
	include(dirname(__FILE__) . '/lib/template-functions.php');
	include(dirname(__FILE__) . '/lib/template-tags.php');
	include(dirname(__FILE__) . '/lib/enqueue-styles.php');
	include(dirname(__FILE__) . '/lib/enqueue-scripts.php');
	include(dirname(__FILE__) . '/lib/dequeuing.php');
	include(dirname(__FILE__) . '/lib/default-setup.php');
	include(dirname(__FILE__) . '/lib/cpt-init.php');
	include(dirname(__FILE__) . '/lib/taxonomy-init.php');
	include(dirname(__FILE__) . '/lib/auto-install-plugins.php');

	<%= conf.get('wpDir') %> // DID IT WORK?

	/* HEY THIS IS A TEMPLATING TEST: <%= conf.get('wpDir') %> <%= conf.get('tablePrefix') %> */