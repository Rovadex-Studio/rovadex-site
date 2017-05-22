<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Rovadex
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'rovadex' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="container">
			<div class="header-container__flex">
				<div class="site-branding"><?php
					rovadex_header_logo();
					rovadex_site_description();
				?></div><!-- .site-branding -->
				<?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'one_page_navi' ) ) : ?>
					<?php
						if ( is_front_page() ) {
							rovadex_nav_menu(
								'one_page_navi',
								'<nav id="site-navigation" class="main-navigation main-navigation--onepage-navigation" role="navigation">%s</nav>',
								false
							);
						} else {
							rovadex_nav_menu(
								'primary',
								'<nav id="site-navigation" class="main-navigation" role="navigation">%s</nav>',
								true
							);
						}
					?>
				<?php endif; ?>
			</div>
		</div>
	</header><!-- #masthead -->

	<?php if ( ! is_front_page() ) : ?>
		<div class="header-area-wrap">
			<div class="container"><?php
				//do_action( 'rovadex_render_widget_area', 'home-header' );
				do_action( 'rovadex_render_widget_area', 'header' );
			?></div>
		</div>
	<?php endif; ?>

	<div id="content" class="site-content">
