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
function rovadex_add_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';

	return $mimes;
}
add_filter( 'upload_mimes', 'rovadex_add_mime_types' );

/**
 * Customize one page menu item link attr line
 *
 * @return Object
 */
function rovadex_customize_nav_menu_link_attributes( $atts, $item, $args ) {

	if ( 'one_page_navi' === $args->theme_location ) {
		$menuanchor = str_replace( '#', '', $item->url );
		// inspect $item, then …
		$atts[ 'data-menuanchor' ] = $menuanchor;
	}

	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'rovadex_customize_nav_menu_link_attributes', 10, 3 );

function rovadex_update_shortcodes_avaliable_styles( $styles ) {
	unset( $styles['grid'] );

	return $styles;
}
add_filter( 'cherry-site-shortcodes-avaliable-styles', 'rovadex_update_shortcodes_avaliable_styles' );


function rovadex_projects_spinner_html( $html ) {
	return '<div class="cherry-projects-ajax-loader projects-end-line-spinner"><div class="rovadex-spinner cherry-spinner"></div></div>';
}
add_filter( 'cherry-projects-ajax-loader-html', 'rovadex_projects_spinner_html', 9, 1);


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

	if ( ! is_single() ) {
		$settings['html'] = '<h3 %1$s><a href="%2$s" %3$s rel="bookmark">%4$s</a></h3>';
		$settings['class'] = 'invert';

	}else{
		$settings['html'] = '<h2 %1$s>%4$s</h2>';
		$settings['class'] = 'entry-title';
	}

	return $settings;
}
add_filter( 'cherry-projects-title-settings', 'rovadex_projects_title_settings', 0 );

function rovadex_projects_date_settings( $settings = array() ) {
	$settings['icon'] = '<i class="fa fa-calendar" aria-hidden="true"></i>';
	$settings['prefix'] = '';
	return $settings;
}
add_filter( 'cherry-projects-date-settings', 'rovadex_projects_date_settings' );

function rovadex_projects_author_settings( $settings = array() ) {
	$settings['icon'] = '<i class="fa fa-user" aria-hidden="true"></i>';
	$settings['prefix'] = '';
	return $settings;
}
add_filter( 'cherry-projects-author-settings', 'rovadex_projects_author_settings' );

function rovadex_projects_comments_settings( $settings = array() ) {
	$settings['icon'] = '<i class="fa fa-comment" aria-hidden="true"></i>';
	$settings['prefix'] = '';
	return $settings;
}
add_filter( 'cherry-projects-comments-settings', 'rovadex_projects_comments_settings' );

function rovadex_projects_terms_list_settings( $settings = array() ) {
	$settings['icon']   = '<i class="fa fa-tags" aria-hidden="true"></i>';
	$settings['prefix'] = '';
	$settings['before'] = '';
	$settings['after']  = '';
	return $settings;
}
add_filter( 'cherry-projects-terms-list-settings', 'rovadex_projects_terms_list_settings' );
