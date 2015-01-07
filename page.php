<?php get_header(); ?>
	<main id="primary">
		<aside id="sidebar-left" class="2-col">
			<div class="inner-wrap">
				<?php get_sidebar("left"); ?>
			</div>
		</aside>
		<article id="content" class="8-col">
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
		<aside id="sidebar-right"  class="2-col">
			<div class="inner-wrap">
				<?php get_sidebar("right"); ?>
			</div>
		</aside>
	</main><!-- #primary -->
<?php get_footer(); ?>