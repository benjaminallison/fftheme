<?php
	function hasChildren($id = null) {
		global $post;
		if ($id == null ) {
			$id = $post->ID;
		}
		$children = get_pages('child_of='.$id);
		if ( !empty( $children ) ) {
			return true;
		} else {
			return false;
		}
	}