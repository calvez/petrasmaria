<?php

if ( ! function_exists( 'foundationpress_theme_support' ) ) :
function foundationpress_theme_support() {

	// Image size for single posts
	add_image_size( 'album-illustration', 600, 600 );

}

add_action( 'after_setup_theme', 'foundationpress_theme_support' );
endif;
?>
