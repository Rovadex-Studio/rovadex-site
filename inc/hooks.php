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

	$classes[] = wp_is_mobile() ? 'is-mobile' : '';

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

function rovadex_single_questions_sidebar( $id ) {
	if( 'primary-sidebar' === $id && rovadex_is_dw_qa_page() ){
		return'single-page-questions';
	}

	return $id;
}
add_filter( 'rovadex_rendering_current_widget_area', 'rovadex_single_questions_sidebar');

function rovadex_projects_permalink_text() {
	return esc_html__( 'More info', 'rovadex-site' );
}
add_filter( 'cherry-projects-permalink-text', 'rovadex_projects_permalink_text');

function rovadex_projects_zoom_text() {
	return esc_html__( 'Show', 'rovadex-site' );
}
add_filter( 'cherry-projects-zoom-link-text', 'rovadex_projects_zoom_text');

function rovadex_load_custom_fonts() {
	rovadex()->get_config( 'fonts' );
}
// add_action( 'wp_head', 'rovadex_load_custom_fonts' );

function rovadex_load_analytics() {
	if ( ! isset( $_SERVER['HTTP_USER_AGENT'] )
		|| false === stripos( $_SERVER['HTTP_USER_AGENT'], 'Speed Insights' ) )
	{
		include_once( get_template_directory() . '/inc/extensions/analyticstracking.php' );
	}
}
add_action( 'wp_footer', 'rovadex_load_analytics', 99 );

function rovadex_popup_title_settings( $settings ) {
	$settings['html'] = '<h3 %1$s>%4$s</h3>';
	return $settings;
}
add_filter( 'cherry-popup-title-settings', 'rovadex_popup_title_settings' );

/**
 * Replaces `[...]` (appended to automatically generated excerpts) with `...`.
 *
 * @param  string $more The string shown within the more link.
 * @return string
 */
function rovadex_excerpt_more( $more ) {

	if ( is_admin() ) {
		return $more;
	}

	return ' &hellip;';
}
add_filter( 'excerpt_more', 'rovadex_excerpt_more' );
