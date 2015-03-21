<?php get_header(); ?>
	<main id="main">
		<?php get_template_part("partials/content", "hero");?>
		<div class="page-wrap container">
			<?php get_sidebar("left"); ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'partials/content', 'page' ); ?>
					<?php
						// if ( comments_open() || get_comments_number() ) :
						// 	comments_template();
						// endif;
					?>
				<?php endwhile; ?>
			<?php get_sidebar("right"); ?>
		</div>
	</main><!-- #main -->
<?php get_footer(); ?>