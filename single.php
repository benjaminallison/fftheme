<?php get_header(); ?>
	<main id="main">
		<?php get_template_part("content", "hero");?>
		<div class="page-wrap container">
			<?php get_sidebar("left"); ?>
			<article id="content" class="col-half gutter-pad">
				<div class="inner-wrap">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', 'single' ); ?>
						<?php ffcc_post_nav(); ?>
						<?php
							// if ( comments_open() || get_comments_number() ) :
							// 	comments_template();
							// endif;
						?>
					<?php endwhile; // end of the loop. ?>
				</div>
			</article>
			<?php get_sidebar("right"); ?>
		</div>
	</main><!-- #main -->
<?php get_footer(); ?>
