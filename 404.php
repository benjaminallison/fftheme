<?php get_header(); ?>
	<main id="main">
		<?php get_template_part("content", "hero");?>
		<?php get_sidebar("left"); ?>
		<article id="content" class="col-half error-404 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'ffcc' ); ?></h1>
			</header>
			<div class="page-content">
				<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'ffcc' ); ?></p>
				<?php get_search_form(); ?>
				<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
				<?php if ( ffcc_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>
				<div class="widget widget_categories">
					<h2 class="widget-title"><?php _e( 'Most Used Categories', 'ffcc' ); ?></h2>
					<ul>
					<?php
						wp_list_categories( array(
							'orderby'    => 'count',
							'order'      => 'DESC',
							'show_count' => 1,
							'title_li'   => '',
							'number'     => 10,
						) );
					?>
					</ul>
				</div><!-- .widget -->
				<?php endif; ?>
				<?php
					/* translators: %1$s: smiley */
					$archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'ffcc' ), convert_smilies( ':)' ) ) . '</p>';
					the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
				?>
				<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
			</div><!-- .page-content -->
		</article>
		<?php get_sidebar("right"); ?>
	</main><!-- #main -->
<?php get_footer(); ?>