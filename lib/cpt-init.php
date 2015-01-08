<?php
	function make_all_post_types() {
		foreach (glob(TEMPLATEPATH."/lib/cpts/*.php") as $filename) {
			include $filename;
		}
	}
	add_action('init', 'make_all_post_types');