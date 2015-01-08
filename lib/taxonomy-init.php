<?php
	function add_custom_taxonomies() {
		foreach (glob(TEMPLATEPATH."/lib/taxonomies/*.php") as $filename) {
			include $filename;
		}
	}
	add_action('init', 'add_custom_taxonomies', 0);