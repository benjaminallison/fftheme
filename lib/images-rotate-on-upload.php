<?php
	// ROTATING SCRIPT
	function rotate_images( $file, $width, $height, $crop = false ) {
		if ( $width || $height ) {
			$rotated_file = wp_get_image_editor( $file );
			if ( ! is_wp_error( $rotated_file ) ) {
				$filename = $rotated_file->generate_filename( $width . 'x' . $height . '-rotated' );
				$rotated_file->rotate(-90);
				$rotated_file->save( $filename );
				$info = $rotated_file->get_size();
				return array(
					'file' => wp_basename( $filename ),
					'width' => $info['width'],
					'height' => $info['height'],
				);
			}
		}
		return false;
	}

	// PROCESS UPLOADS
	add_filter('wp_generate_attachment_metadata', 'process_uploaded_image', 10, 2 );
	function process_uploaded_image($metadata, $attachment_id) {
		foreach ( $metadata as $key => $value ) {
			if ( is_array( $value ) ) {
				foreach ( $value as $image => $attr ) {
					if ( is_array( $attr ) ) {
						rotate_images( get_attached_file( $attachment_id ), $attr['width'], $attr['height'], true );
					}
				}
			}
		}
 		return $metadata;
 	}

	// DELETE ROTATED IMAGES
	add_filter( 'delete_attachment', 'delete_retina_support_images' );
	function delete_retina_support_images( $attachment_id ) {
		$meta = wp_get_attachment_metadata( $attachment_id );
		$upload_dir = wp_upload_dir();
		$path = pathinfo( $meta['file'] );
		if ( isset($meta['file']) ) {
			$path = pathinfo( $meta['file'] );
			foreach ( $meta as $key => $value ) {
				if ( 'sizes' === $key ) {
					foreach ( $value as $sizes => $size ) {
						$original_filename = $upload_dir['basedir'] . '/' . $path['dirname'] . '/' . $size['file'];
						$retina_filename = substr_replace( $original_filename, '-rotated.', strrpos( $original_filename, '.' ), strlen( '.' ) );
						if ( file_exists( $retina_filename ) )
							unlink( $retina_filename );
					}
				}
			}
		}
	}

function get_rotated_hero($postID, $thumbSize) {
	$hero = wp_get_attachment_image_src(get_post_thumbnail_id($postID), $thumbSize);
	$hero = pathinfo($hero[0]);
	$heroURL = $hero["dirname"] . "/" . $hero["filename"] . "-rotated." . $hero["extension"];
	return $heroURL;
}