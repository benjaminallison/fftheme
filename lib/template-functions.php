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

	function getGrandparent($id = null) {
		global $post;
		if ($id === null ) {
			$id = $post->ID;
		} else {
			$post = get_post($id);
		}
		if ( $post->post_parent ) {
			$parentData = get_post($post->post_parent);
			if ( $parentData->post_parent ) {
				return $parentData->post_parent;;
			}
		}
		return false;
	}