<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Rovadex
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row-wrap">
		<div class="column-wrap image-wrap">
			<figure class="post-thumbnail">
				<?php rovadex()->utility()->media->get_image( array(
						'size'        => 'post-thumbnail',
						'html'        => '<img class="post-thumbnail__img wp-post-image" src="%3$s" alt="%4$s">',
						'placeholder' => false,
						'echo'        => true,
					) );
				?>
				<?php rovadex_get_post_category(); ?>
			</figure><!-- .post-thumbnail -->
		</div>
		<div class="column-wrap content-wrap">
			<header class="entry-header">
				<?php rovadex()->utility()->attributes->get_title( array(
						'class' => 'entry-title',
						'html'  => '<h2 %1$s>%4$s</h2>',
						'echo'  => true,
					) );
				?>
				<div class="entry-wrap">
					<div class="entry-meta">
						<?php
							rovadex_entry_meta();
							rovadex_get_post_tags();
						?>
					</div><!-- .entry-meta -->
				</div>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php the_content(); ?>

			</div><!-- .entry-content -->

			<footer class="entry-footer">
				<?php
					rovadex_share_buttons();
				?>
			</footer><!-- .entry-footer -->
		</div>
	</div>
</article><!-- #post-## -->
