<?php
global $comment;
global $comment_args;
global $comment_depth;

$avatar  = asc_get_comment_avatar( $comment );
$details = asc_get_comment_details( $comment );
?>
<li <?php comment_class(); ?> id="wrap-comment-<?php comment_ID(); ?>">
	<?php do_action( 'asc_before_comment' ); ?>
	
	<article id="comment-<?php comment_ID(); ?>">
		<?php do_action( 'asc_after_comment_open' ); ?>
				
		<header class="comment-header <?php echo apply_filters( 'asc_comment_header_class', '' ); ?>">
			<?php do_action( 'asc_after_comment_header_open' ); ?>
			
			<?php if ( $avatar ) : ?>
				<div class="comment-author vcard">
					<?php echo $avatar; ?>
				</div>
			<?php endif; ?>
			
			<?php if ( $details ) : ?>
				<div class="comment-details">
					<?php echo $details; ?>
				</div>
			<?php endif; ?>
			
			<?php do_action( 'asc_before_comment_header_close' ); ?>
		</header><!-- End .comment-header -->
		
		<?php do_action( 'asc_after_comment_header' ); ?>

		<div class="comment-content <?php echo apply_filters( 'asc_comment_content_class', '' ); ?>">
			<div class="contain">
				<?php do_action( 'asc_after_comment_content_open' ); ?>
				
				<?php comment_text(); ?>
					
				<?php do_action( 'asc_before_comment_content_close' ); ?>
			</div>
		</div><!-- End .comment-content -->
		
		<?php do_action( 'asc_after_comment_content' ); ?>

		<footer class="comment-footer <?php echo apply_filters( 'asc_comment_footer_class', '' ); ?>">
			<?php do_action( 'asc_after_comment_footer_open' ); ?>
			
			<?php comment_reply_link( array_merge( $comment_args, array( 'before' => '<div class="comment-reply">', 'after' => '</div>', 'reply_text' => __( 'Reply', 'ascension' ), 'depth' => $comment_depth, 'max_depth' => $comment_args['max_depth'] ) ) ); ?>
			
			<?php edit_comment_link( __( 'Edit Comment', 'ascension' ), '<div class="comment-edit meta">', '</div>' ); ?>
			
			<?php do_action( 'asc_before_comment_footer_close' ); ?>
		</footer><!-- End .entry-footer -->
		
		<?php do_action( 'asc_before_comment_close' ); ?>
	</article><!-- End #comment-<?php comment_ID(); ?> -->
	
	<?php do_action( 'asc_after_comment' ); ?>