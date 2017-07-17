<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Rovadex
 */

while ( have_posts() ) : the_post();

	get_template_part( 'template-parts/content-single', get_post_format() );

	the_post_navigation( array(
		'screen_reader_text' => ' ',
		'next_text'          => '<span class="post-title">%title &#62;</span>',
		'prev_text'          => '<span class="post-title">&#60; %title</span>',
	) );

	// If comments are open or we have at least one comment, load up the comment template.

	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;

endwhile; // End of the loop.
