<?php
/**
 * Template part for posts pagination.
 *
 * @package Rovadex
 */
the_posts_pagination( array(
	'prev_text' => sprintf( '<span class="screen-reader-text">%s</span>', esc_html__( 'Previous', 'rovadex-site' ) ),
	'next_text' => sprintf( '<span class="screen-reader-text">%s</span>', esc_html__( 'Next', 'rovadex-site' ) ),
) );
