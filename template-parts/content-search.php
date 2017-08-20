<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Rovadex
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row-wrap">
		<div class="column-wrap content-wrap">
			<header class="entry-header">
				<?php the_title( '<h5 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' ); ?>
			</header><!-- .entry-header -->
			<div class="entry-content p-like">
				<?php $excerpt = get_the_excerpt(); ?>
				<?php echo strip_shortcodes( $excerpt ); ?>
			</div><!-- .entry-content -->
		</div>
	</div>
</article><!-- #post-## -->
