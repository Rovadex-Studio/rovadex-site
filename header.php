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
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'rovadex-site' ); ?></a>
	<header id="masthead" class="site-header" role="banner">
		<?php
			if ( is_front_page() ) {
				$container_class = 'class="container-fluid"';
			} else {
				$container_class = 'class="container"';
			}
		?>
		<div <?php echo $container_class; ?>>
			<div class="header-container__flex">
				<div class="site-branding">
				<?php
					//rovadex_header_logo();
					if ( ! is_front_page() ) {
						rovadex_header_custom_logo();
					}
					rovadex_site_description();
				?></div><!-- .site-branding -->
				<?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'one_page_navi' ) ) : ?>
					<?php
						if ( is_front_page() ) {
							rovadex_nav_menu(
								'one_page_navi',
								'<nav id="site-navigation" class="onepage-navigation" role="navigation">
								<div class="navi-toggle-button">
									<svg class="icon icon-menu-toggle" aria-hidden="true" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100">
										<g class="svg-menu-toggle">
											<path class="line line-1" d="M5 13h90v14H5z"/>
											<path class="line line-2" d="M5 43h90v14H5z"/>
											<path class="line line-3" d="M5 73h90v14H5z"/>
										</g>
									</svg>
								</div>
								%s
								</nav>',
								false,
								array (
									'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul><div class="cover"></div>',
								)
							);
						} else {
							rovadex_nav_menu(
								'primary',
								'<nav id="site-navigation" class="main-navigation" role="navigation">%s</nav>',
								true,
								array(
									'before' => '<div class="menu-link-wrapper">',
									'after'  => '</div>',
								)
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
