<?php

	function theme_dir() {
		return get_template_directory_uri();
	}

	function assets_dir() {
		return get_template_directory_uri() . "/assets";
	}

	function assets_path() {
		return TEMPLATEPATH . "/assets";
	}

	function images_dir() {
		return get_template_directory_uri() . "/assets/images";
	}

	function images_path() {
		return TEMPLATEPATH . "/assets/images";
	}

	function svg_icons_dir() {
		return get_template_directory_uri() . "/assets/svg-icons";
	}

	function svg_icons_path() {
		return TEMPLATEPATH . "/assets/svg-icons";
	}

	function font_awesome_dir() {
		return get_template_directory_uri() . "/assets/svg-icons/font-awesome";
	}

	function font_awesome_path() {
		return TEMPLATEPATH . "/assets/svg-icons/font-awesome";
	}

	function body_ID() {
		global $post;
		if ( $post ) {
			return 'id="'.$post->post_name.'"';
		}
	}

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

	function get_nested_terms($args) {
		$terms = get_terms($args);
		$nestedTerms = array();
		foreach ($terms as $term) :
			if ($term->parent === 0) {
				$nestedTerms[] = $term;
			} else {
				// if parent, the parent would already have been added to the new array
				// since it would have come before any children
				foreach ($nestedTerms as $nestedTerm) :
					if ($nestedTerm->term_id === $term->parent) {
						if (!$nestedTerm->children) {
							$nestedTerm->children = array();
						}
						$nestedTerm->children[] = $term;
					}
				endforeach;
			}
		endforeach;
		return $nestedTerms;
	}