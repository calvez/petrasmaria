<?php

if ( ! function_exists( 'foundationpress_theme_support' ) ) :
function foundationpress_theme_support() {
	// Add language support
	load_theme_textdomain( 'foundationpress', get_template_directory() . '/languages' );

	// Add menu support
	add_theme_support( 'menus' );

	// Add post thumbnail support: http://codex.wordpress.org/Post_Thumbnails
	add_theme_support( 'post-thumbnails' );
	// set_post_thumbnail_size(150, 150, false);

	// rss thingy
	add_theme_support( 'automatic-feed-links' );

	// Add post formarts support: http://codex.wordpress.org/Post_Formats
	add_theme_support( 'post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat') );

	// Add custom headers

	$custom_logo = array(
	'flex-width'    => true,
	'width'         => 1600,
	'flex-height'    => true,
	'default-image' => get_template_directory_uri() . '/assets/img/petras_nev.png',
	);
	add_theme_support( 'custom-header', $custom_logo );

}

add_action( 'after_setup_theme', 'foundationpress_theme_support' );
endif;
?>