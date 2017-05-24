<?php
/**
 * Theme hooks.
 *
 * @package Rovadex
 */
add_filter( 'cherry_search_placeholder', 'rovadex_cherry_search_placeholder' );
add_filter( 'cherry_search_thumbnail_size', 'rovadex_search_thumbnail_set_size', 9, 1 );
add_filter( 'body_class', 'rovadex_body_sidebar_class' );

/**
 * cherry_search_thumbnail_set_size
 *
 * @param $array
 * @return $array
 */
function rovadex_search_thumbnail_set_size( $size ){
	return 'search-thumbnail';
}

/**
 * cherry_search_placeholder.
 * @param $array
 * @return $array
 */
function rovadex_cherry_search_placeholder( $args ) {
	$args['width'] = 86;
	$args['height'] = 66;
	return $args;
}

/**
 * Adds 'has_sidebar' class to body if required.
 *
 * @param  [type] $classes [description]
 * @return [type]          [description]
 */
function rovadex_body_sidebar_class( $classes ) {

	$layout = rovadex_layout_class( 'sidebar' );

	if ( ! empty( $layout ) && is_active_sidebar( 'primary-sidebar' ) ) {
		$classes[] = 'has_sidebar';
	}

	return $classes;
}
