<?php get_header(); ?>
	<main id="main">
		<?php get_sidebar("left"); ?>
		<article id="content" class="col-half">
			<div class="inner-wrap">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'page' ); ?>
					<?php
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>
				<?php endwhile; ?>
			</div>
		</article>
		<?php get_sidebar("right"); ?>
	</main><!-- #primary -->
<?php get_footer(); ?>