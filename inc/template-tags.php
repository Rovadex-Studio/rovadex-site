<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Rovadex
 */

/**
 * Display the header logo.
 *
 * @since  1.0.0
 * @return void
 */
function rovadex_header_logo() {

	$logo     = get_bloginfo( 'name' );
	$logo_url = rovadex_get_mod( 'header_logo_url' );

	$format = apply_filters(
		'rovadex_header_logo_format',
		'<div class="site-logo"><a class="site-logo__link" href="%1$s" rel="home">%2$s</a></div>'
	);

	if ( ! $logo_url ) {
		printf( $format, esc_url( home_url( '/' ) ), $logo );
		return;
	}

	$retina_logo     = '';
	$logo_url        = rovadex_render_theme_url( $logo_url );
	$retina_logo_url = get_theme_mod( 'retina_header_logo_url' );
	$retina_logo_url = rovadex_render_theme_url( $retina_logo_url );
	$logo_id         = rovadex_get_image_id_by_url( $logo_url );

	if ( $retina_logo_url ) {
		$retina_logo = sprintf( 'srcset="%s 2x"', esc_url( $retina_logo_url ) );
	}

	$logo_src = wp_get_attachment_image_src( $logo_id, 'full' );

	if ( $logo_id && $logo_src ) {
		$atts = ' width="' . $logo_src[1] . '" height="' . $logo_src[2] . '"';
	} else {
		$atts = '';
	}

	$format_image = apply_filters( 'rovadex_header_logo_image_format',
		'<img src="%1$s" alt="%2$s" class="site-link__img" %3$s%4$s>'
	);

	$image = sprintf( $format_image, esc_url( $logo_url ), esc_attr( $logo ), $retina_logo, $atts );

	printf( $format, esc_url( home_url( '/' ) ), $image );
}

function rovadex_header_custom_logo() {
	?>
	<div class="site-logo">
		<a class="site-logo__link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<svg version="1.1" id="rovadex-logo-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="350px" x="0px" y="0px" viewBox="0 0 415 157" xml:space="preserve">
				<g id="inner">
					<g id="XMLID_7_">
						<path id="XMLID_27_" class="shape-1" fill="#009ED2" opacity="0.5" d="M26.3,46.5c6.9-15,42.6-42.2,54-44.3c9.1-1.7,75.2,10.8,80.5,20.7c10.3,19.1,19.4,74.2,15.5,79.5c-16.4,4.9-17.8,4.5-33.9,23.4c-3.9,4.5-12.4,17.1-16.4,19c-4.4,2-28.4,5.4-38.7,4.4c-17.3-1.8-39.5-22-43-25.9C30,107.2,21,58.2,26.3,46.5z"/>
						<path id="XMLID_26_" class="shape-2" fill="#008AC9" opacity="0.8" d="M173.9,107.4c2.7-0.4,15.5-19.4,12-37.9c-2.8-15-48-59.4-60.3-61.7c-17.9-3.3-66.7,8.7-73.7,16.4c-6.9,7.6-30.3,53-28.4,68.3c1.9,15.7,44.4,54.5,56.6,57c12.3,2.5,44.9-7.2,47.6-11.3c2.5-3.8,3.3-6.4,0-10c-8.5-9.3-52.4-9.2-51.7-34s13.9-51.4,39.7-58.7c4-1.1,21.8-3.5,29.9,5.8c21.7,24.8,11.7,44.7,12.6,51.6C159.9,106.4,171.3,107.8,173.9,107.4z"/>
						<path class="main-symbol" fill="#ffffff" d="M49.2,64.6c-2.5,0-3.7-1.2-3.7-3.6c0-1.1,0.6-3.1,1.7-5.9c1.2-2.9,2.1-5.1,3-6.7c1.9-3.7,3.8-6.3,5.8-7.7
							c3.1-2.3,15.4-4.3,36.7-6c9.3-0.7,16-1,20.2-1c4.2,0,7.2,0.1,9,0.2c1.8,0.1,3.6,0.4,5.5,0.7s3.8,0.7,5.7,1.2
							c1.9,0.5,3.7,1,5.4,1.7c3.7,1.5,6.3,3.3,7.7,5.5c4.6,6.8,6.9,12.3,6.8,16.6c0,4.8-3.7,9.4-11,13.9c-2.2,1.4-4.6,2.8-7.1,4.2
							c-9.1,4.8-14.5,7.7-16.1,8.6c3.2,6.4,9.6,13,19.1,19.9c1.1,0.8,2,1.4,2.7,1.8c2.9,1.7,6.4,1.5,10.4-0.7c1.1-0.7,2.2-1,3.3-1
							c1.1,0,2.1,0.4,3,1.3c0.9,0.8,1.3,1.8,1.3,2.8c0,4.6-3.2,9.6-9.4,14.9c-4.6,3.9-8.8,5.9-12.5,5.9c-3,0-9.5-4.5-19.5-13.4
							c-5.7-5-10.3-9.6-13.8-13.5c-3.5-4-5.9-6.9-7.3-8.9c-1.3-1.9-2-3.6-2-5s0.4-2.7,1.1-3.7c0.7-1.1,1.6-2.1,2.8-3.1
							c1.8-1.5,4.5-3.2,7.9-4.9c3.4-1.7,6.2-3.4,8.4-5c2.2-1.6,4-3.2,5.6-4.9c3.5-3.6,5.2-6.9,5.2-9.8c0-1.9-0.6-3.5-1.7-4.8
							c-2.1-2.3-4.1-3.5-5.9-3.5c-3.2,0-7,0.2-11.6,0.6l-7.2,12.6c-9.2,16.5-15.6,31.3-19,44.5c-1.4,5.1-6.4,7.7-15.1,7.6
							c-7.2-0.1-11.8-1.8-13.7-5.1c-0.7-1.1-0.9-2.2-0.7-3.3c0.2-1.1,0.7-2.5,1.6-4.2c0.9-1.7,2.1-3.9,3.6-6.5l5.3-8.9l6.5-10.4
							l7.3-11.3L82,54.6c-13.7,2.8-23.6,5.9-29.9,9.3C51.1,64.4,50.2,64.6,49.2,64.6z"/>
					</g>
					<path id="XMLID_21_" class="drop drop-1" fill="#008AC9" d="M149.1,126c-0.9,0.7,0.4,6.2,4.2,12.5c4.2,7,12.9,10.8,15.4,8.4c3.6-3.3-1.5-10.7-4.8-13.7C161.5,131.1,150.6,124.8,149.1,126z"/>
					<path id="XMLID_20_" class="drop drop-2" fill="#BFB6DA" d="M156.6,120.3c0,0,0.7,3.2,6.1,4.1c3.5,0.6,6.6,0.2,7.1-1.5c0.4-1.4-1.5-5.1-7.6-5S156.6,120.3,156.6,120.3z"/>
					<path id="XMLID_19_" class="drop drop-3" fill="#6CCCDD" d="M20.5,101.3c0-1.1-3.7-3.7-9-4.7c-5.8-1.2-11.7,3-11.5,6.5c0.3,4.8,6.8,5.7,9.9,5C12.1,107.6,20.5,103.2,20.5,101.3z"/>
					<path id="XMLID_16_" class="drop drop-4" fill="#008AC9" d="M19.3,109.9c0,0-3.9-0.9-7.8,2.8c-3.8,3.7-1.1,6.5,0,7.5s5.8,2.2,8.2-3.4S19.3,109.9,19.3,109.9z"/>
					<path id="XMLID_12_" class="drop drop-5" fill="#BFB6DA" d="M161.2,9.8c0,0-1.9-1.4-0.5-4.1s3.4-2.4,4.4-2c0.8,0.3,1.8,2.5,0.3,4.4S162.4,10.4,161.2,9.8z"/>
					<g>
						<path class="symbol symbol-1" fill="#FFFFFF" d="M192.3,102.6c-3.5,3-8.5,4.6-15.2,4.6s-11.8-1.5-15.2-4.6s-5.2-7.8-5.2-14.4s1.7-11.4,5.2-14.4
							s8.6-4.5,15.2-4.5c6.7,0,11.8,1.5,15.2,4.5c3.5,3,5.2,7.8,5.2,14.4S195.8,99.6,192.3,102.6z M185.4,79.1c-1.7-2-4.5-3-8.3-3
							s-6.6,1-8.3,3s-2.6,5.1-2.6,9.1s0.9,7,2.6,9.1s4.5,3,8.3,3s6.6-1,8.3-3s2.6-5,2.6-9.1S187.1,81.2,185.4,79.1z"/>
						<path class="symbol symbol-2" fill="#FFFFFF" d="M200.9,72.1c-0.1-0.2-0.2-0.4-0.2-0.7c0-0.2,0.2-0.5,0.5-0.9s0.8-0.5,1.3-0.5h5.6c1.3,0,2.3,0.8,3,2.4
							l9.8,21.9l9.8-21.9c0.7-1.6,1.7-2.4,3-2.4h5.6c0.6,0,1,0.2,1.3,0.5c0.3,0.4,0.5,0.7,0.5,0.9c0,0.2,0,0.5-0.1,0.7l-14.6,31.7
							c-0.8,1.7-2,2.6-3.6,2.6h-3.7c-1.6,0-2.8-0.9-3.6-2.6L200.9,72.1z"/>
						<path class="symbol symbol-3" fill="#FFFFFF" d="M242,104.1l6.4-24.2c1.7-6.6,7.3-9.9,16.9-9.9H279c0.6,0,1.1,0.2,1.6,0.7c0.4,0.5,0.6,1,0.6,1.7v31.7
							c0,0.7-0.2,1.2-0.7,1.7s-1,0.7-1.7,0.7H274c-0.7,0-1.3-0.2-1.7-0.7s-0.7-1-0.7-1.7v-6.4h-18.1l-1.7,6.4c-0.2,0.7-0.5,1.3-1.1,1.7
							s-1.2,0.7-1.9,0.7h-5c-0.7,0-1.1-0.2-1.4-0.6s-0.4-0.7-0.4-1S242,104.3,242,104.1z M255.4,90.4h16.2V77.2h-7.2
							c-1.6,0-3,0.5-4.3,1.4c-1.2,0.9-2,2.2-2.5,3.7L255.4,90.4z"/>
						<path class="symbol symbol-4" fill="#FFFFFF" d="M290.3,104.1V72.5c0-0.7,0.2-1.3,0.7-1.8s1-0.7,1.7-0.7h14.2c7.3,0,12.7,1.5,16,4.4s5,7.5,5,13.8
							s-1.7,10.9-5,13.8s-8.7,4.4-16,4.4h-14.2c-0.7,0-1.2-0.2-1.7-0.7S290.3,104.7,290.3,104.1z M299.9,99.2h6.8c4.6,0,7.7-0.8,9.3-2.5
							s2.5-4.5,2.5-8.5s-0.8-6.9-2.5-8.5c-1.6-1.7-4.7-2.5-9.3-2.5h-6.8V99.2z"/>
						<path class="symbol symbol-5" fill="#FFFFFF" d="M335.1,104V72.4c0-0.7,0.2-1.2,0.7-1.7s1-0.7,1.7-0.7h29.3c0.7,0,1.2,0.2,1.7,0.7s0.7,1,0.7,1.7v2.4
							c0,0.7-0.2,1.2-0.7,1.7s-1,0.7-1.7,0.7h-22.1v7.4h19c0.7,0,1.2,0.2,1.7,0.7s0.7,1,0.7,1.7v2.4c0,0.7-0.2,1.2-0.7,1.7
							s-1,0.7-1.7,0.7h-19v7.5h22.1c0.6,0,1.2,0.2,1.7,0.7s0.7,1,0.7,1.7v2.4c0,0.7-0.2,1.2-0.7,1.7s-1,0.7-1.7,0.7h-29.1
							c-0.7,0-1.2-0.2-1.7-0.7S335.1,104.7,335.1,104z"/>
						<path class="symbol symbol-6" fill="#FFFFFF" d="M374,106.4c-0.8,0-1.3-0.4-1.4-1.1c0-0.4,0.2-0.8,0.5-1.2L386,87.7l-12.1-15.3c-0.4-0.4-0.5-0.9-0.5-1.2
							c0-0.8,0.5-1.2,1.4-1.2h5.5c1.7,0,3.2,0.8,4.4,2.4l7,8.8l7-8.8c1.3-1.6,2.7-2.4,4.4-2.4h5.5c0.9,0,1.4,0.4,1.4,1.2
							c0,0.4-0.2,0.8-0.5,1.2l-12.1,15.3l12.8,16.3c0.4,0.4,0.5,0.8,0.5,1.1s0,0.5-0.1,0.6c-0.2,0.5-0.6,0.7-1.3,0.7h-5.4
							c-1.7,0-3.2-0.8-4.4-2.4l-7.7-9.9l-7.7,9.9c-1.3,1.6-2.7,2.4-4.4,2.4C379.7,106.4,374,106.4,374,106.4z"/>
					</g>
				</g>
			</svg>
		</a>
	</div>
	<?php
}
/**
 * Show nav menu by location
 *
 * @param  string $location Location name
 * @return void
 */
function rovadex_nav_menu( $location = 'primary', $format = '%s', $toggle = false, $custom_args = array() ) {

	$toggle = '';

	if ( true === $toggle ) {
		$toggle = printf(
			'<button class="menu-toggle" aria-controls="%1$s-menu" aria-expanded="false">%2$s</button>',
			$location,
			esc_html__( 'Menu', 'rovadex' )
		);
	}

	$args = wp_parse_args( $custom_args, array(
		'theme_location' => $location,
		'menu_id'        => $location . '-menu',
		'menu_class'     => $location . '-menu menu',
		'fallback_cb'    => '__return_empty_string',
		'echo'           => false,
	) );

	$menu = wp_nav_menu( $args );

	printf( $format, $menu );
}

/**
 * Display the site description.
 *
 * @since  1.0.0
 * @return void
 */
function rovadex_site_description() {

	$show_desc = rovadex_get_mod( 'show_tagline' );

	if ( ! $show_desc ) {
		return;
	}

	$description = get_bloginfo( 'description', 'display' );

	if ( ! ( $description || is_customize_preview() ) ) {
		return;
	}

	$format = apply_filters( 'rovadex_site_description_format', '<div class="site-description">%s</div>' );

	printf( $format, $description );
}

/**
 * Display the breadcrumbs.
 *
 * @return void
 */
function rovadex_breadcrumbs() {

	$breadcrumbs_settings = apply_filters( 'rovadex_breadcrumbs_settings', array(
		'wrapper_format'    => '<div class="container"><div class="breadcrumbs__title">%1$s</div><div class="breadcrumbs__items">%2$s</div><div class="clear"></div></div>',
		'page_title_format' => '<h5 class="page-title">%s</h5>',
		'show_on_front'     => false,
		'separator' => '&#124;',
		'labels'            => array(
			'browse' => '',
		),
		'css_namespace' => array(
			'module'    => 'breadcrumbs',
			'content'   => 'breadcrumbs__content',
			'wrap'      => 'breadcrumbs__wrap',
			'browse'    => 'breadcrumbs__browse',
			'item'      => 'breadcrumbs__item',
			'separator' => 'breadcrumbs__item-sep',
			'link'      => 'breadcrumbs__item-link',
			'target'    => 'breadcrumbs__item-target',
		)
	) );

	rovadex()->get_core()->init_module( 'cherry-breadcrumbs', $breadcrumbs_settings );
	do_action('cherry_breadcrumbs_render');
}

/*
 * Display a link to all posts by an author.
 *
 * @link https://developer.wordpress.org/reference/functions/get_the_author_posts_link
 *
 * @since  1.0.0
 * @param  array $args Arguments.
 * @return string      An HTML link to the author page.
 */
function rovadex_get_the_author_posts_link() {

	if ( function_exists( 'get_the_author_posts_link' ) ) {
		return get_the_author_posts_link();
	}

	// This is a fallback code, due to `get_the_author_posts_link` function
	// is available only since WordPress 4.4.0
	ob_start();
	the_author_posts_link();
	$link = ob_get_clean();

	return $link;
}

/**
 * Dispaply box with information about author.
 *
 * @since  1.0.0
 * @return void
 */
function rovadex_post_author_bio() {
	get_template_part( 'template-parts/content', 'author-bio' );
}


if ( ! function_exists( 'rovadex_entry_meta' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function rovadex_entry_meta() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( '%s', 'post date', 'rovadex' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$posted_by = sprintf(
		esc_html_x( '%s', 'post author', 'rovadex' ),
		'<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>'
	);

	echo '<span class="posted-by"><i class="nc-icon-mini users_single-body"></i>' . $posted_by . '</span><span class="posted-on"><i class="nc-icon-mini ui-1_calendar-60"></i>' . $posted_on . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'rovadex_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function rovadex_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'rovadex' ) );
		if ( $categories_list && rovadex_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'rovadex' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'rovadex' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'rovadex' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'rovadex' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'rovadex' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

if ( ! function_exists( 'rovadex_get_post_category' ) ) :
/**
 * Prints HTML with meta information for the categories.
 */
function rovadex_get_post_category() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( '<span>' . esc_html__( '', 'rovadex' ) . '</span>' );
		if ( $categories_list && rovadex_categorized_blog() ) {
			printf( '<div class="post__cats">' . esc_html__( '%1$s', 'rovadex' ) . '</div>', $categories_list ); // WPCS: XSS OK.
		}
	}
}
endif;

if ( ! function_exists( 'rovadex_get_post_tags' ) ) :
/**
 * Prints HTML with meta information for the categories.
 */
function rovadex_get_post_tags() {
	// Hide category and tag text for pages.
	$tags_list = get_the_tag_list( '', esc_html__( ', ', 'rovadex' ) );
	if ( $tags_list ) {
		printf( '<div class="post__tags"><i class="nc-icon-mini shopping_tag-content"></i>' . esc_html__( '%1$s', 'rovadex' ) . '</div>', $tags_list ); // WPCS: XSS OK.
	}
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function rovadex_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'rovadex_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'rovadex_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so rovadex_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so rovadex_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in rovadex_categorized_blog.
 */
function rovadex_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'rovadex_categories' );
}
add_action( 'edit_category', 'rovadex_category_transient_flusher' );
add_action( 'save_post',     'rovadex_category_transient_flusher' );
