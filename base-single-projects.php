
<?php get_header( rovadex_template_base() ); ?>
	<header class="entry-header main-entry-header">
		<?php if ( ! is_front_page() ) : ?>
			<h1 class="entry-title"><?php wp_title(''); ?></h1>
		<?php endif; ?>
		<?php rovadex_breadcrumbs(); ?>
	</header><!-- .entry-header -->

	<?php do_action( 'rovadex_render_widget_area', 'full-width-header-area' ); ?>

	<div class="<?php echo rovadex_site_content_classes(); ?>">
		<div class="row no-gutters">

			<div id="primary" class="col-xs-12">

				<main id="main" class="site-main" role="main">

					<?php include rovadex_template_path(); ?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- .container -->

<?php get_footer( rovadex_template_base() ); ?>
