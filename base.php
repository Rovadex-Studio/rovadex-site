<?php
/**
 * Base page structure.
 *
 * @package Rovadex
 */
?>
<?php get_header(); ?>
	<?php if ( ! is_single() ) : ?>
		<header class="entry-header">
			<?php if ( ! is_front_page() ) : ?>
				<h1 class="entry-title"><?php wp_title(''); ?></h1>
			<?php endif; ?>
			<?php rovadex_breadcrumbs(); ?>
		</header><!-- .entry-header -->
	<?php endif; ?>
	<div class="<?php echo rovadex_site_content_classes(); ?>">
		<div class="row no-gutters">
			<div id="primary" class="<?php echo rovadex_layout_class( 'content' ); ?>">
				<main id="main" class="site-main" role="main">
					<?php include rovadex_template_path(); ?>
				</main><!-- #main -->
			</div><!-- #primary -->
			<?php get_sidebar(); // Loads the sidebar.php template.  ?>
		</div><!-- .row -->
	</div><!-- .container -->
<?php get_footer(); ?>
