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

function update_shortcodes_avaliable_styles( $styles ) {
	unset( $styles['grid'] );

	return $styles;
}
add_filter( 'cherry-site-shortcodes-avaliable-styles', 'update_shortcodes_avaliable_styles' );


function projects_pinner_html( $html ) {
	return '<div class="cherry-projects-ajax-loader projects-end-line-spinner"><div class="rovadex-spinner cherry-spinner"></div></div>';
}
add_filter( 'cherry-projects-ajax-loader-html', 'projects_pinner_html', 9, 1);


function rovadex_build_search_form( $search_form = '' ) {
	$search_form_html = '<form role="search" method="get" class="search-form" action="%1$s"><label><span class="screen-reader-text">%2$s</span><input type="search" class="search-form__field" placeholder="%3$s" value="" name="s" title="%2$s"></label><button type="submit" class="search-form__submit btn btn-primary"><i class="material-icons">%4$s</i></button></form>';

	$search_form = sprintf(
		$search_form_html,
		get_home_url(),
		esc_html__( 'Search for:', 'rovadex-site' ),
		esc_html__( 'Search &#8230;', 'rovadex-site' ),
		esc_html__( 'search', 'rovadex-site' )
	);

	return $search_form;
}
add_filter( 'get_search_form', 'rovadex_build_search_form', 0 );

function rovadex_projects_title_settings( $settings = array() ) {
	$settings['class'] = 'invert';
	return $settings;
}
add_filter( 'cherry-projects-title-settings', 'rovadex_projects_title_settings', 0 );
