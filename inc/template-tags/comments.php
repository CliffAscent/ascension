<?php
/**
 * Comments Title
 *
 * Displays the comments area title.
 *
 * @return echo the comments title
 */
if ( ! function_exists( 'asc_comments_title' ) ) :
function asc_comments_title() {
	comments_number(
		__('Leave a Response', 'ascension' ),
		__( 'One Response', 'ascension' ),
		__( '% Responses', 'ascension' )
	);
	_e( ' to ', 'ascension' );
	echo '&#8220;';
	the_title();
	echo '&#8220;';
}
endif; // End asc_comments_title()

if ( ! function_exists( 'asc_get_comments_title' ) ) :
function asc_get_comments_title() {
	// Store the content.
	ob_start();
	asc_comments_title();
	$content = ob_get_contents();
	ob_end_clean();
	
	return $content;
}
endif; // End asc_get_comments_title()


/**
 * Comment Layout
 *
 * Layout for a single comment.
 *
 * @param string $comment the comment text
 * @param array $args the comment arguments
 * @param int $depth the depth of the comment
 * @return echo the comment template
 */
if ( ! function_exists( 'asc_comment' ) ) :
function asc_comment( $comment, $args, $depth ) {
	switch ( $comment->comment_type ) {
		case 'pingback' :
		case 'trackback' :
			if ( pings_open() ) {
				get_template_part( 'templates/modules/pingback' );
			}
			break;

		default :
			if ( comments_open() ) {
				$GLOBALS['comment']       = $comment;
				$GLOBALS['comment_args']  = $args;
				$GLOBALS['comment_depth'] = $depth;
				get_template_part( 'templates/modules/comment' );
			}
			break;
	}
}
endif; // End asc_comment()

if ( ! function_exists( 'asc_get_comment' ) ) :
function asc_get_comment() {
	// Store the content.
	ob_start();
	asc_comment();
	$content = ob_get_contents();
	ob_end_clean();
	
	return $content;
}
endif; // End asc_get_comment()


/**
 * Comment Avatar
 *
 * Displays the comment author avatar.
 *
 * @param $comment object the comment object
 * @return mixed the avatar content string or bool false
 */
if ( ! function_exists( 'asc_get_comment_avatar' ) ) :
function asc_get_comment_avatar( $comment ) {
	$avatar_size = apply_filters( 'asc_avatar_size', 64 );
	
	// Use smaller avatars for replies.
	if ( '0' != $comment->comment_parent ) {
		$avatar_size = apply_filters( 'asc_avatar_reply_size', 48 );
	}

	return get_avatar( $comment, $avatar_size );
}
endif; // End asc_get_comment_avatar()


/**
 * Comment Details
 *
 * Return the comment details.
 *
 * @param $comment object the comment object
 * @return string the comment details content
 */
if ( ! function_exists( 'asc_get_comment_details' ) ) :
function asc_get_comment_details( $comment ) {
	$return = apply_filters( 'asc_entry_author_icon', '<span class="meta author"><a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . get_comment_author( $comment->comment_ID ) . '</a></span>' );
	
	$return .= apply_filters( 'asc_entry_date_icon', '<span class="meta date"><a href="' . esc_url( get_comment_link( $comment->comment_ID ) ) . '" rel="bookmark">' . get_comment_date() . '</a></span>' );
	
	$return .= apply_filters( 'asc_entry_time_icon', '<span class="meta time"><a href="' . esc_url( get_comment_link( $comment->comment_ID ) ) . '" rel="bookmark">' . get_comment_time() . '</a></span>' );
	
	return apply_filters( 'asc_comment_details', $return );
}
endif; // End asc_get_comment_details()


/**
 * Previous Comments
 *
 * Retrieve the previous comments link.
 *
 * @return mixed the previous comments link string or bool false
 */
if ( ! function_exists( 'asc_get_previous_comments_link' ) ) :
function asc_get_previous_comments_link() {
	// Store the previous comments content.
	ob_start();
	previous_comments_link( apply_filters( 'asc_prev_comments_link', __( 'Older Comments', 'ascension' ) ) );
	$prev_comments = ob_get_contents();
	ob_end_clean();
	
	if ( ! empty( $prev_comments ) ) {
		return $prev_comments;
	}
	else {
		return false;
	}
}
endif; // End asc_get_previous_comments_link()


/**
 * Next Comments
 *
 * Retrieve the next comments link.
 *
 * @return mixed the next comments link string or bool false
 */
if ( ! function_exists( 'asc_get_next_comments_link' ) ) :
function asc_get_next_comments_link() {
	// Store the next comments content.
	ob_start();
	next_comments_link( apply_filters( 'asc_next_comments_link', __( 'Newer Comments', 'ascension' ) ) );
	$next_comments = ob_get_contents();
	ob_end_clean();
	
	if ( ! empty( $next_comments ) ) {
		return $next_comments;
	}
	else {
		return false;
	}
}
endif; // End asc_get_next_comments_link()
?>