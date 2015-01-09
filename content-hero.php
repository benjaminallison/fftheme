<?php
	// if ( is_singular('recipe') ) {
	// 	$postID = 68; //food and wine page
	// } else if ( is_singular('wine') && $post->post_parent ) {
	// 	$postID = $post->post_parent; // single wine and a vintage? get parent thumb
	// } else if ( get_post_type() === 'trade-and-media' ) {
 	// 	$postID = 83; //trade and media page
	// } else if ( has_post_thumbnail() ){
	// 	$postID = $post->ID;
	// } else {
	// 	$postID = 11; // home page
	// }
	$hero = wp_get_attachment_image_src(get_post_thumbnail_id($postID), "large");
?>
<div class="hero" style="background-image: url('<?php echo $hero[0];?>');" data-bgwidth="<?php echo $hero[1];?>" data-bgheight="<?php echo $hero[2];?>">
<?php if ( is_front_page() ) { ?>
	<!-- -->
<?php } ?>
</div>