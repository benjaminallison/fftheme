<?php

	function list_menu($atts, $content = null) {
		extract(shortcode_atts(array(
			'menu'            => '',
			'container'       => 'div',
			'container_class' => 'sitemap',
			'container_id'    => '',
			'menu_class'      => 'menu',
			'menu_id'         => '',
			'echo'            => true,
			'fallback_cb'     => 'wp_page_menu',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'depth'           => 0,
			'walker'          => '',
			'theme_location'  => ''),
			$atts));


		return wp_nav_menu( array(
			'menu'            => $menu,
			'container'       => $container,
			'container_class' => $container_class,
			'container_id'    => $container_id,
			'menu_class'      => $menu_class,
			'menu_id'         => $menu_id,
			'echo'            => false,
			'fallback_cb'     => $fallback_cb,
			'before'          => $before,
			'after'           => $after,
			'link_before'     => $link_before,
			'link_after'      => $link_after,
			'depth'           => $depth,
			'walker'          => $walker,
			'theme_location'  => $theme_location));
	}
	//Create the shortcode
	add_shortcode("listmenu", "list_menu");

	function displayFaq( $atts ){
		if ( post_type_exists( "faq" ) ) {
			$args = array(
				"post_type" => "faq",
				"posts_per_page" => -1,
				"orderby" => "menu_order",
				"order" => "ASC"
			);

			$query = new WP_Query($args);
			$returnData = '<div class="accordion faq-list">';

			while ( $query->have_posts() ) : $query->the_post();
				$returnData .= '<h5>' . get_the_title() . '</h5>';
				$returnData .= '<div>' . wpautop(get_the_content()) . '</div>';
			endwhile;

			$returnData .= '</div>';
			return $returnData;
		}
	}

	add_shortcode( 'faq', 'displayFaq' );

	function wineLoop( $atts ){
			$args = array(
				"post_type" => "wine",
				"post_per_page" => -1,
				"orderby"		=> "menu_order",
				'tax_query' => array(
					array(
						'taxonomy' => "brand",
						'field' => 'slug',
						'terms' => $atts['brand'],
					)
				),
			);

			$query = new WP_Query($args);
			$returnData = "";

			while ( $query->have_posts() ) : $query->the_post();
				ob_start();
				get_template_part("partials/wine", "excerpt");
				$returnData .= ob_get_clean();
			endwhile; wp_reset_postdata();

			return $returnData;
	}

	add_shortcode( 'wine-loop', 'wineLoop' );

