<?php get_header(); ?>
	<main id="main">
		<?php get_template_part("partials/content", "hero");?>
		<?php get_sidebar("left"); ?>
		<article id="content" class="col_6">
			<?php if ( have_posts() ) : ?>
				<header class="page_header">
					<h1 class="page_title"><?php printf( __( 'Search Results for: %s', 'ffcc' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</header>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'partials/content', 'search' ); ?>
				<?php endwhile; ?>
				<?php ffcc_paging_nav(); ?>
			<?php else : ?>
				<?php get_template_part( 'partials/content', 'none' ); ?>
			<?php endif; ?>
		</article>
		<?php get_sidebar("right"); ?>
	</main><!-- #main -->
<?php get_footer(); ?>z