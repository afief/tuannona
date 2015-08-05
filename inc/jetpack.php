<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package TuanNona
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function tuannona_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'tuannona_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function tuannona_jetpack_setup
add_action( 'after_setup_theme', 'tuannona_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function tuannona_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function tuannona_infinite_scroll_render
