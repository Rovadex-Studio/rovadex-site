<section class="comment-wrapper">
	<div class="comment-author vcard">
		<?php echo rovadex_comment_author_avatar(); ?>
	</div>
	<section class="comment-inner">
		<footer class="comment-meta">
			<div class="comment-metadata">
				<span class="posted-by">
					<i class="fa fa-user" aria-hidden="true"></i>
					<?php echo rovadex_get_comment_author_link(); ?>
				</span>
				<span class="posted-date">
					<i class="fa fa-calendar" aria-hidden="true"></i>
					<?php echo rovadex_get_comment_date( array( 'format' => 'M d, Y' ) ); ?>
				</span>
			</div>
		</footer>
		<div class="comment-content">
			<?php echo rovadex_get_comment_text(); ?>
		</div>
	</section>
</section>
<section class="reply">
	<?php echo rovadex_get_comment_reply_link( array( 'reply_text' => '<i class="material-icons">reply</i>' ) ); ?>
</section>
