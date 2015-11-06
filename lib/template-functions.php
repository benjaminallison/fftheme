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

	function topLevelParent() {
		global $post;
		if ($post):
			$cptOverride = array();
			$postToQuery = $post->ID;
			foreach ($cptOverride as $key => $id) {
				if ( $key == $post->post_type ) {
					$postToQuery = $id;
				}
			}
			$ancestors = get_post_ancestors($postToQuery);
			$topLevelParent = array_pop($ancestors);
			if ( empty($topLevelParent) ) {
				$topLevelParent = $postToQuery;
			}
			return $topLevelParent;
		endif;
	}