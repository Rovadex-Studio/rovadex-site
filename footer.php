<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Rovadex
 */

?>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer invert" role="contentinfo">
		<?php
			// Update date post - need for google
			rovadex_page_entry_meta();
		?>
		<div class="container">
			<?php
				if ( ! is_front_page() ) { ?>
					<div class="footer-area-wrap invert">
						<?php do_action( 'rovadex_render_widget_area', 'footer' ); ?>
					</div>
			<?php } ?>
		</div>
		<div class="footer-conatiner__flex">
			<div class="site-info">
				<span class="sep"> &copy; </span>
				<?php
					$open_tag_a = '<a href="' . get_bloginfo( 'url' ) . '/privacy-policy">';
					$close_tag_a = '</a>';

					printf( esc_html__( '2017 Rovadex %1$sPrivacy Policy%2$s.', 'rovadex-site' ), $open_tag_a, $close_tag_a );
				?>
			</div><!-- .site-info -->
			<?php if ( has_nav_menu( 'footer' ) ) : ?>
				<?php
					rovadex_nav_menu(
						'footer',
						'<nav id="footer-navigation" class="footer-navigation" role="navigation">%s</nav>',
						true
					);
				?>
			<?php endif; ?>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
