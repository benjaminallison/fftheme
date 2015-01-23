<?php get_header(); ?>
	<main id="main">
		<?php get_template_part("content", "hero");?>
		<div class="page-wrap container">
			<?php get_sidebar("left"); ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'single' ); ?>
					<?php ffcc_post_nav(); ?>
					<?php
						// if ( comments_open() || get_comments_number() ) :
						// 	comments_template();
						// endif;
					?>
				<?php endwhile; // end of the loop. ?>
			<?php get_sidebar("right"); ?>
		</div>
	</main><!-- #main -->
<?php get_footer(); ?>
