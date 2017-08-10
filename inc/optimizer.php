<?php
/**
 * Runs optimization for loading site assets.
 *
 * @since 1.0.0.
 */
add_action( 'rovadex_enqueue_assets', 'rovadex_optimizer' );
function rovadex_optimizer() {

	// Cherry Projects
	if ( ! ( is_singular( 'projects' )
		|| is_post_type_archive( 'projects' )
		|| is_tax( 'projects_category' )
		|| is_tax( 'projects_tag' )
		) ) {
		wp_dequeue_style( 'magnific-popup' );
		wp_dequeue_script( 'magnific-popup' );
		wp_dequeue_style( 'cherry-projects-styles' );
		wp_dequeue_script( 'cherry-projects-single-scripts' );
	}

	// Cherry Services List
	if ( ! ( is_singular( 'cherry-services' )
		|| is_post_type_archive( 'cherry-services' )
		|| is_tax( 'cherry-services_category' )
		) ) {
		wp_dequeue_style( 'cherry-services' );
		wp_dequeue_style( 'cherry-services-theme' );
		wp_dequeue_style( 'cherry-services-grid' );
	}

	// Cherry Testi
	if ( ! ( is_front_page()
		|| is_singular( 'tm-testimonials' )
		|| is_post_type_archive( 'tm-testimonials' )
		|| is_tax( 'tm-testimonials_category' )
		) ) {
		wp_dequeue_style( 'cherry-testi' );
		wp_dequeue_script( 'cherry-testi-public' );
	}

	// DW Question Answer
	$dwqa_options      = get_option( 'dwqa_options', array() );
	$dwga_archive_page = ! empty( $dwqa_options['pages']['archive-question'] ) ? $dwqa_options['pages']['archive-question'] : false;
	$dwga_submit_page  = ! empty( $dwqa_options['pages']['submit-question'] ) ? $dwqa_options['pages']['submit-question'] : false;

	if ( ! ( is_singular( 'dwqa-question' )
		|| is_post_type_archive( 'dwqa-question' )
		|| is_page( array( $dwga_archive_page, $dwga_submit_page, 'ask-question', 'support' ) )
	) ) {
		wp_dequeue_style( 'dwqa-style' );
		wp_dequeue_style( 'dwqa-rtl' );
	}

	// Move jQuery to the footer
	wp_scripts()->add_data( 'jquery', 'group', 1 );
	wp_scripts()->add_data( 'jquery-core', 'group', 1 );
	wp_scripts()->add_data( 'jquery-migrate', 'group', 1 );

	// Deferred loading scripts and styles
	rovadex()->get_core()->init_module(
		'cherry5-assets-loader', array(
			'css' => array(

				// Fonts
				'font-awesome',
				'material-icons',
				'dashicons',

				// Plugins
				'jquery-swiper',
				'cherry-testi',
				'contact-form-7',
				'jet-elements',
				'jet-elements-skin',
				'cherry-site-shortcodes-element-styles',
				'cherry-team',
				'cherry-team-grid',
			),
			'js' => array(
				'rovadex-theme-script',
				'jquery-cherry-responsive-menu',
				'rovadex-tween-max',
				'rovadex-timeline-max',
				'rovadex-ease-pack',
				'jquery.fullpage.extensions',
				'jquery.fullpage',
				'owl.carousel',
				'cherry-site-shortcodes-script',
				'jquery-swiper',
				'cherry-testi-public',
			)
		)
	);
}

add_filter( 'cherry_team_styles', 'rovadex_team_styles' );
function rovadex_team_styles( $styles ) {

	if ( is_front_page()
		|| is_singular( 'team' )
		|| is_post_type_archive( 'team' )
		|| is_tax( 'group' )
	) {
		return $styles;
	}

	return array();
}

add_filter( 'wpcf7_load_js', 'rovadex_cf7_assets' );
add_filter( 'wpcf7_load_css', 'rovadex_cf7_assets' );
function rovadex_cf7_assets( $flag ) {

	if ( is_front_page() || is_page( 'contacts' ) ) {
		return $flag;
	}

	return false;
}
