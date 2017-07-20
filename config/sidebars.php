<?php
/**
 * Theme sidebars configuration
 */

return apply_filters( 'rovadex_widget_area_default_settings', array(
	'primary-sidebar' => array(
		'name'           => esc_html__( 'Sidebar', 'rovadex-site' ),
		'description'    => '',
		'before_widget'  => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'   => '</aside>',
		'before_title'   => '<h6 class="widget-title">',
		'after_title'    => '</h6>',
		'before_wrapper' => '<div id="%1$s" %2$s role="complementary">',
		'after_wrapper'  => '</div>',
		'is_global'      => true,
	),
	'home-header' => array(
		'name'           => esc_html__( 'Header Area (front page)', 'rovadex-site' ),
		'description'    => '',
		'before_widget'  => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'   => '</aside>',
		'before_title'   => '<h5 class="widget-title">',
		'after_title'    => '</h5>',
		'before_wrapper' => '<div id="%1$s-area" %2$s>',
		'after_wrapper'  => '</div>',
		'is_global'      => true,
	),
	'header' => array(
		'name'           => esc_html__( 'Header Area', 'rovadex-site' ),
		'description'    => '',
		'before_widget'  => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'   => '</aside>',
		'before_title'   => '<h5 class="widget-title">',
		'after_title'    => '</h5>',
		'before_wrapper' => '<div id="%1$s-area" %2$s>',
		'after_wrapper'  => '</div>',
		'is_global'      => true,
	),
	'footer' => array(
		'name'            => esc_html__( 'Footer Area', 'rovadex-site' ),
		'description'     => '',
		'before_widget'   => '<aside id="%1$s" class="widget %2$s col-xs-12 col-sm-6 col-md-3 col-lg-3">',
		'after_widget'    => '</aside>',
		'before_title'    => '<h5 class="widget-title">',
		'after_title'     => '</h5>',
		'before_wrapper'  => '<div id="%1$s-area" %2$s>',
		'after_wrapper'   => '</div>',
		'wrapper_classes' => 'container row',
		'is_global'       => true,
	),
) );
