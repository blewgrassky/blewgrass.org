
<div class="featured-image-container loading">
	<?php
	$thumbnail_id 	 = get_post_thumbnail_id($post->ID);
	$thumbnail_image = wp_get_attachment_image_src( $thumbnail_id, get_theme_mod( 'tropicana-blog-featured-image-size', customizer_library_get_default( 'tropicana-blog-featured-image-size' ) ) );
	$alt_text 	  	 = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true );
	?>
	
	<img src="<?php echo esc_url( $thumbnail_image[0] ); ?>" width="<?php echo esc_attr( $thumbnail_image[1] ); ?>" height="<?php echo esc_attr( $thumbnail_image[2] ); ?>" class="featured-image hideUntilLoaded" alt="<?php echo esc_attr( $alt_text ); ?>" />
</div>
