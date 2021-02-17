<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package _s
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function _s_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Add page slug if it doesn't exist
	if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

	return $classes;
}
add_filter( 'body_class', '_s_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function _s_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', '_s_pingback_header' );

/*

// Remove comments admin menu
function _s_wpdocs_remove_menus(){
  remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', '_s_wpdocs_remove_menus' );

// Remove wp redirect guess
function _s_remove_redirect_guess_404_permalink( $redirect_url ) {
   if ( is_404() )
    return false;
   return $redirect_url;
}
add_filter( 'redirect_canonical', '_s_remove_redirect_guess_404_permalink' );

// Disable load of wcpf7 js on every page
function _s_unload_wpcf7_scripts() {
	if ( is_page('contact') || is_front_page() ) {
		if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
			wpcf7_enqueue_scripts();
    }
  }
}
add_action('wp_enqueue_scripts', '_s_unload_wpcf7_scripts');

// Remove br tags on wpcf7
function _s_remove_wpcf7_tags($content) {
  $content = str_replace('<br />', '', $content);

  return $content;
}
add_filter('wpcf7_form_elements', _s_remove_wpcf7_tags());

*/