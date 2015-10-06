<article id="post-<?php the_ID(); ?>" <?php post_class("col_6 gutter_pad"); ?>>
	<header class="entry_header">
		<?php the_title( sprintf( '<h1 class="entry_title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry_meta">
			<?php ffcc_posted_on(); ?>
		</div><!-- .entry_meta -->
		<?php endif; ?>
	</header><!-- .entry_header -->

	<div class="entry_summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry_summary -->

	<footer class="entry_footer">
		<?php ffcc_entry_footer(); ?>
	</footer><!-- .entry_footer -->
</article><!-- #post-## -->
