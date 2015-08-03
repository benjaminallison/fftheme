<?php 
	require(dirname(__FILE__) .'/vendor/class-tgm-plugin-activation.php');

	add_action( 'tgmpa_register', 'my_theme_register_required_plugins');

	function my_theme_register_required_plugins() {

		$plugins = array(
			array(
				'name'	=> 'W3 Total Cache',
				'slug'	=> 'w3-total-cache',
				'required'	=> true
			),
			array(
				'name'	=> 'Yoast',
				'slug'	=> 'wordpress-seo',
				'required'	=> true
			),
			array(
				'name'	=> 'Duplicator',
				'slug'	=> 'duplicator',
				'required'	=> true
			),
			array(
				'name'	=> 'Manual Image Crop',
				'slug'	=> 'manual-image-crop',
				'required'	=> true
			),
			array(
				'name'	=> 'iThemes Security',
				'slug'	=> 'better-wp-security',
				'required'	=> true
			),
			array(
				'name'	=> 'Regenerate Thumbnails',
				'slug'	=> 'regenerate-thumbnails',
				'required'	=> true
			),
			array(
				'name'	=> 'Simple Page Ordering',
				'slug'	=> 'simple-page-ordering',
				'required'	=> true,
				'force_activation'	=> true
			),
			array(
				'name'	=> 'Theme Check',
				'slug'	=> 'theme-check',
				'required'	=> true
			),
			array(
				'name'	=> 'Wordpress Importer',
				'slug'	=> 'wordpress-importer',
				'required'	=> true
			),
			array(
				'name'	=> 'WP Ultimate CSV Importer',
				'slug'	=> 'wp-ultimate-csv-importer',
				'required'	=> true
			),
			array(
				'name'	=> 'Contact Form 7',
				'slug'	=> 'contact-form-7',
				'required'	=> true
			),
			array(
				'name'	=> 'Google Analyticator',
				'slug'	=> 'google-analyticator',
				'required'	=> true
			),
			array(
				'name'	=> 'Mailchimp for WP',
				'slug'	=> 'mailchimp-for-wp',
				'required'	=> true
			),
			array(
				'name'	=> 'Enable Media Replace',
				'slug'	=> 'enable-media-replace',
				'required'	=> true
			),
			array(
				'name'	=> 'Simple 301 Redirects',
				'slug'	=> 'simple-301-redirects',
				'required'	=> true
			),
			array(
				'name'	=> 'Mailchimp for WP',
				'slug'	=> 'mailchimp-for-wp',
				'required'	=> true
			),
			array(
				'name'		=> 'WordPress Backup to Dropbox',
				'slug'		=> 'wordpress-backup-to-dropbox',
				'required'	=> true
			),
			array(
				'name'		=> 'WP DB Sync',
				'slug'		=> 'wp-db-sync',
				'source'	=> 'https://github.com/wp-sync-db/wp-sync-db/archive/master.zip',
				'required'	=> true
			),
			array(
				'name'		=> 'WP DB Sync Media Files',
				'slug'		=> 'wp-sync-db-media-files',
				'source'	=> 'https://github.com/wp-sync-db/wp-sync-db-media-files/archive/master.zip',
				'required'	=> true
			),
			array(
				'name'		=> 'Firefly Trade and Media',
				'slug'		=> 'firefly-trade-media',
				'source'	=> get_stylesheet_directory() . '/lib/vendor/firefly-trade-media.zip',
				'required'	=> true
			),
			array(
				'name'		=> 'Advanced Custom Post Order',
				'slug'		=> 'advanced-post-types-order',
				'source'	=> get_stylesheet_directory() . '/lib/vendor/advanced-post-types-order.zip',
				'required'	=> true
			),
			array(
				'name'		=> 'Video User Manuals',
				'slug'		=> 'video-user-manuals',
				'source'	=> get_stylesheet_directory() . '/lib/vendor/video-user-manuals.zip',
				'required'	=> true
			)
		);
	
		$config = array(
			'default_path' => '',                      // Default absolute path to pre-packaged plugins.
			'menu'         => 'tgmpa-install-plugins', // Menu slug.
			'has_notices'  => true,                    // Show admin notices or not.
			'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => false,                   // Automatically activate plugins after installation or not.
			'message'      => '',                      // Message to output right before the plugins table.
			'strings'      => array(
				'page_title'                      => __( 'Install Required Plugins', 'tgmpa' ),
				'menu_title'                      => __( 'Install Plugins', 'tgmpa' ),
				'installing'                      => __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
				'oops'                            => __( 'Something went wrong with the plugin API.', 'tgmpa' ),
				'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s).
				'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s).
				'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).
				'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
				'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
				'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).
				'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s).
				'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).
				'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
				'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
				'return'                          => __( 'Return to Required Plugins Installer', 'tgmpa' ),
				'plugin_activated'                => __( 'Plugin activated successfully.', 'tgmpa' ),
				'complete'                        => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
				'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
			)
		);
		tgmpa( $plugins, $config );
	}


	
	// This is an example of how to include a plugin pre-packaged with a theme.
	// array(
	// 	'name'               => 'TGM Example Plugin', // The plugin name.
	// 	'slug'               => 'tgm-example-plugin', // The plugin slug (typically the folder name).
	// 	'source'             => get_stylesheet_directory() . '/lib/plugins/tgm-example-plugin.zip', // The plugin source.
	// 	'required'           => true, // If false, the plugin is only 'recommended' instead of required.
	// 	'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
	// 	'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
	// 	'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
	// 	'external_url'       => '', // If set, overrides default API URL and points to an external URL.
	// ),
	
	// This is an example of how to include a plugin from a private repo in your theme.
	// array(
	// 	'name'               => 'TGM New Media Plugin', // The plugin name.
	// 	'slug'               => 'tgm-new-media-plugin', // The plugin slug (typically the folder name).
	// 	'source'             => 'https://s3.amazonaws.com/tgm/tgm-new-media-plugin.zip', // The plugin source.
	// 	'required'           => true, // If false, the plugin is only 'recommended' instead of required.
	// 	'external_url'       => 'https://github.com/thomasgriffin/New-Media-Image-Uploader', // If set, overrides default API URL and points to an external URL.
	// ),
	// This is an example of how to include a plugin from the WordPress Plugin Repository.
	// array(
	// 	'name'      => 'BuddyPress',
	// 	'slug'      => 'buddypress',
	// 	'required'  => false,
	// ),

	// $config = array(
	// 	'default_path' => '',                      // Default absolute path to pre-packaged plugins.
	// 	'menu'         => 'tgmpa-install-plugins', // Menu slug.
	// 	'has_notices'  => true,                    // Show admin notices or not.
	// 	'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
	// 	'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
	// 	'is_automatic' => false,                   // Automatically activate plugins after installation or not.
	// 	'message'      => '',                      // Message to output right before the plugins table.
	// 	'strings'      => array(
	// 		'page_title'                      => __( 'Install Required Plugins', 'tgmpa' ),
	// 		'menu_title'                      => __( 'Install Plugins', 'tgmpa' ),
	// 		'installing'                      => __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
	// 		'oops'                            => __( 'Something went wrong with the plugin API.', 'tgmpa' ),
	// 		'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s).
	// 		'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s).
	// 		'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).
	// 		'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
	// 		'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
	// 		'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).
	// 		'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s).
	// 		'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).
	// 		'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
	// 		'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
	// 		'return'                          => __( 'Return to Required Plugins Installer', 'tgmpa' ),
	// 		'plugin_activated'                => __( 'Plugin activated successfully.', 'tgmpa' ),
	// 		'complete'                        => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
	// 		'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
	// 	)
	// );
