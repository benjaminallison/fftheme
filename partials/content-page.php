<article id="post-<?php the_ID(); ?>" <?php post_class("col_6 gutter_pad"); ?>>
	<header class="entry_header">
		<?php the_title( '<h1 class="entry_title">', '</h1>' ); ?>
	</header><!-- .entry_header -->

	<div class="entry_content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'ffcc' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry_content -->

	<footer class="entry_footer">
		<?php edit_post_link( __( 'Edit', 'ffcc' ), '<span class="edit_link">', '</span>' ); ?>
	</footer><!-- .entry_footer -->
</article><!-- #post-## -->
