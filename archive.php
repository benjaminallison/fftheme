<?php get_header(); ?>
	<main id="main">
		<?php get_template_part("partials/content", "hero");?>
		<?php get_sidebar("left"); ?>
		<article id="content" class="col_6">
			<?php if ( have_posts() ) : ?>
				<header class="page-header">
					<?php
						the_archive_title( '<h1 class="page_title">', '</h1>' );
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
					?>
				</header>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'partials/content', get_post_format() ); ?>
				<?php endwhile; ?>
				<?php ffcc_paging_nav(); ?>
			<?php else : ?>
				<?php get_template_part( 'partials/content', 'none' ); ?>
			<?php endif; ?>
		</article>
		<?php get_sidebar("right"); ?>
	</main><!-- #main -->
<?php get_footer(); ?>