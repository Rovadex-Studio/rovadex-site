<?php
/**
 * Theme hooks.
 *
 * @package Rovadex
 */

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
add_filter( 'body_class', 'rovadex_body_sidebar_class' );

/**
 * Add SVG into allowed mime types
 *
 * @param array $mimes Default mime types.
 */
function add_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';

	return $mimes;
}
add_filter( 'upload_mimes', 'add_mime_types' );

/**
 * Customize one page menu item link attr line
 *
 * @return Object
 */
function customize_nav_menu_link_attributes( $atts, $item, $args ) {

	if ( 'one_page_navi' === $args->theme_location ) {
		$menuanchor = str_replace( '#', '', $item->url );
		// inspect $item, then …
		$atts[ 'data-menuanchor' ] = $menuanchor;
	}

	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'customize_nav_menu_link_attributes', 10, 3 );




