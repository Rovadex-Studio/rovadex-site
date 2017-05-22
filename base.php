<?php
/**
 * Base page structure.
 *
 * @package Rovadex
 */
?>
<?php get_header(); ?>
	<?php
		rovadex_breadcrumbs();
	?>
	<div class="<?php echo rovadex_site_content_classes(); ?>">
		<div class="row">
			<div id="primary" class="<?php echo rovadex_layout_class( 'content' ); ?>">
				<main id="main" class="site-main" role="main">
					<?php include rovadex_template_path(); ?>
				</main><!-- #main -->
			</div><!-- #primary -->
			<?php get_sidebar(); // Loads the sidebar.php template.  ?>
		</div><!-- .row -->
	</div><!-- .container -->
<?php get_footer(); ?>
