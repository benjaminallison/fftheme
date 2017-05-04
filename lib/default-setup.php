<?php
	if (isset($_GET['activated']) && is_admin()){
		// SET DEFAULT OPTIONS
		update_option( 'avatar_default', 'retro' );
		update_option( 'avatar_rating', 'X' );
		update_option( 'blogdescription', 'Fancy description.' );
		update_option( 'gmt_offset', '-5' );
		update_option( 'gzipcompression', '1' );
		update_option( 'permalink_structure', '/%year%/%monthnum%/%postname%/' );
		update_option( 'uploads_use_yearmonth_folders', '0' );
		// DELETE DEFAULT PAGES
		wp_delete_post( 1 );
		wp_delete_post( 2 );
	}