<?php get_header(); ?>
	<main id="main">
		<?php get_sidebar("left"); ?>
		<article id="content" class="col-half">
			<div class="inner-wrap">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', get_post_format() ); ?>
					<?php endwhile; ?>
					<?php ffcc_paging_nav(); ?>
				<?php else : ?>
					<?php get_template_part( 'content', 'none' ); ?>
				<?php endif; ?>
		</article>
		<?php get_sidebar("right"); ?>
	</main><!-- #primary -->
<?php get_footer(); ?>