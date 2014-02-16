<?php
/**
 * Comments Template
 *
 * Displays the comments list and comment submission box.
 */

$prev_comments = asc_get_prev_comments_link();
$next_comments = asc_get_next_comments_link();
?>

<?php if ( comments_open() ) : ?>
	<div id="comments">
		<?php do_action( 'asc_after_comments_open' ); ?>
		
		<h2 class="comments-title">
			<?php asc_comments_title(); ?>
		</h2>
		
		<?php do_action( 'asc_after_comments_title' ); ?>
		
		<?php if ( post_password_required() ) : ?>
			<?php echo apply_filters( 'asc_comments_locked', '<p class="comments-locked">' . __( 'This post is password protected. Enter the password to view any comments.', 'ascension' ) . '</p>' ); ?>

			<?php do_action( 'asc_after_comments_content' ); ?>
		<?php elseif ( have_comments() ) : ?>
			<ol class="comments-list">
				<?php do_action( 'asc_before_comments' ); ?>
				
				<?php wp_list_comments( array( 'callback' => 'asc_comment' ) ); ?>
				
				<?php do_action( 'asc_after_comments' ); ?>
			</ol><!-- End .comments-list -->
			
			<?php do_action( 'asc_after_comments_list' ); ?>
			
			<?php /* Links to more posts. */ ?>
			<?php if ( $next_comments || $prev_comments ) : ?>
				<?php do_action( 'asc_before_comments_links' ); ?>
				
				<div class="comments-pages">
					<div class="contain">
						<?php if ( $prev_comments ) : ?>
							<div class="prev-comments">
								<?php echo $prev_comments; ?>
							</div>
						<?php endif; ?>
						
						<?php if ( $next_comments ) : ?>
							<div class="next-comments">
								<?php echo $next_comments; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
				
				<?php do_action( 'asc_after_comments_links' ); ?>
			<?php endif; ?>

			<?php do_action( 'asc_after_comments_content' ); ?>
			
			<?php comment_form( array( 'comment_notes_after' => '' ) ); ?>
			
			<?php do_action( 'asc_after_comment_reply_form' ); ?>
		<?php else : ?>
			<p class="no-comments">
				<?php echo apply_filters( 'asc_no_comments', __( 'No comments yet, so get the conversation started!', 'ascension' ) ); ?>
			</p>
			
			<?php do_action( 'asc_after_comments_content' ); ?>
			
			<?php comment_form( array( 'comment_notes_after' => '' ) ); ?>
			
			<?php do_action( 'asc_after_comment_reply_form' ); ?>
		<?php endif; ?>
		
		<?php do_action( 'asc_before_comments_close' ); ?>
	</div><!-- End #comments -->
<?php endif; ?>