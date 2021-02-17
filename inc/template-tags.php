<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package _s
 */

if ( ! function_exists( '_s_get_the_archive_title' ) ) :

  function _s_get_the_archive_title($title) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>' ;
    } elseif ( is_tax() ) {
        $title = sprintf( __( '%1$s' ), single_term_title( '', false ) );
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title( '', false );
    }
    return $title;
	}
endif;

