<li <?php comment_class(); ?> id="wrap-comment-<?php comment_ID(); ?>">
	<?php do_action( 'asc_before_pingback' ); ?>
	
	<p id="comment-<?php comment_ID(); ?>">
		<?php do_action( 'asc_after_pingback_content_open' ); ?>
			
		<?php _e( 'Pingback: ', 'ascension' ); ?>
		
		<?php comment_author_link(); ?>
		
		<?php edit_comment_link( __( 'Edit', 'ascension' ), '<span class="pingback-edit meta">', '</span>' ); ?>
				
		<?php do_action( 'asc_before_pingback_content_close' ); ?>
	</p>
	
	<?php do_action( 'asc_after_pingback' ); ?>