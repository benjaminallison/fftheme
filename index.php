<?php get_header(); ?>
	<main id="main">
		<?php get_template_part("partials/content", "hero");?>
		<div class="page-wrap container">
			<?php get_sidebar("left"); ?>
			<article id="content" class="col-half gutter-pad">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'partials/content', get_post_format() ); ?>
					<?php endwhile; ?>
					<?php ffcc_paging_nav(); ?>
				<?php else : ?>
					<?php get_template_part( 'partials/content', 'none' ); ?>
				<?php endif; ?>
			</article>
			<?php get_sidebar("right"); ?>
		</div>
	</main><!-- #main -->
<?php get_footer(); ?>