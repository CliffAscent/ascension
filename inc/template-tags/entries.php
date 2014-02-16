<?php
/**
 * Archive Content Template
 *
 * Load the proper content template file for archives.
 *
 * @return echo the template HTML
 */
if ( ! function_exists( 'asc_archive_content_template' ) ) :
function asc_archive_content_template() {
	$format      = get_post_format();
	$slider_only = get_post_meta( get_the_ID(), '_slider_only', true );

	if ( $slider_only != 'true' ) {
		if ( locate_template( array( 'templates/content/content-archive-' . $format . '.php' ) ) ) {
			get_template_part( 'templates/content/content-archive', $format );
		}
		elseif ( locate_template( array( 'templates/content/content-' . $format . '.php' ) ) ) {
			get_template_part( 'templates/content/content', $format );
		}
		else {
			get_template_part( 'templates/content/content-archive' );
		}
	}
}
endif; // End asc_archive_content_template()

if ( ! function_exists( 'asc_get_archive_content_template' ) ) :
function asc_get_archive_content_template() {
	// Store the content.
	ob_start();
	asc_archive_content_template();
	$content = ob_get_contents();
	ob_end_clean();
	
	return $content;
}
endif; // End asc_get_archive_content_template()


/**
 * Entry Title
 *
 * Return the title for an entry.
 *
 * @return mixed the title string or bool false
 */ 
if ( ! function_exists( 'asc_get_entry_title' ) ) :
function asc_get_entry_title() {
	global $asc_theme_options;
	
	if ( is_page() ) {
		if ( $asc_theme_options['asc_page_title'] === 'true' ) {
			return get_the_title();
		}
	}
	else if ( is_single() ) {
		return get_the_title();
	}
	else {
		return '<a href="' . get_permalink() . '" rel="bookmark">' . get_the_title() . '</a>';
	}
}
endif; // End asc_get_entry_title()


/**
 * Archive Entry Title
 *
 * Return the post title or a generic title.
 *
 * @return string the post title text
 */
if ( ! function_exists( 'asc_get_archive_entry_title' ) ) :
function asc_get_archive_entry_title() {
	if ( get_the_title() ) {
		return get_the_title();
	}
	else {
		return apply_filters( 'asc_archive_post_no_title', __( 'View Post', 'ascension' ) );
	}
}
endif; // End asc_get_archive_entry_title()


/**
 * Entry Details
 *
 * Return the post details.
 *
 * @return mixed the post details string or bool false
 */
if ( ! function_exists( 'asc_get_entry_details' ) ) :
function asc_get_entry_details( $id ) {
	global $asc_theme_options;
	$return = '';
	
	if ( $asc_theme_options['asc_entry_details'] === 'true' ) {
		$return .= apply_filters( 'asc_entry_author_meta', '<span class="meta author"><a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . get_the_author() . '</a></span>' );
		
		$return .= apply_filters( 'asc_entry_date_meta', '<span class="meta date"><a href="' . get_permalink() . '" rel="bookmark">' . get_the_date() . '</a></span>' );
		
		// Store the categories html.
		ob_start();
		the_category( ', ' );
		$categories = ob_get_contents();
		ob_end_clean();

		if ( ! empty( $categories ) ) {
			$return .= apply_filters( 'asc_entry_category_meta', '<span class="meta category">' . $categories . '</span>' );
		}
		
		if ( comments_open() ) {
			$comments      = wp_count_comments( $id );
			$comment_count = $comments->approved;
			
			$return .= apply_filters( 'asc_entry_comment_meta', '<span class="meta comments"><a href="' . get_permalink() . '#comments">' . _n( number_format_i18n( $comment_count ) . ' comment', number_format_i18n( $comment_count ) . ' comments', $comment_count, 'ascension' ) . '</a></span>' );
		}
		
		return apply_filters( 'asc_entry_details', $return );
	}
	else {
		return false;
	}
}
endif; // End asc_get_entry_details()


/**
 * Page Entry Details
 *
 * Return the page details.
 *
 * @param int/string $id the post ID
 * @return mixed the page details string or bool false
 */
if ( ! function_exists( 'asc_get_entry_page_details' ) ) :
function asc_get_entry_page_details( $id ) {
	global $asc_theme_options;
	
	if ( $asc_theme_options['asc_page_details'] === 'true' ) {
		$return = apply_filters( 'asc_entry_author_meta', '<span class="meta author"><a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . get_the_author() . '</a></span>' );
		
		$return .= apply_filters( 'asc_entry_date_meta', '<span class="meta date"><a href="' . get_permalink() . '" rel="bookmark">' . get_the_date() . '</a></span>' );
		
		if ( comments_open() ) {
			$comments      = wp_count_comments( $id );
			$comment_count = $comments->approved;
			
			$return .= apply_filters( 'asc_entry_comment_meta', '<span class="meta comments"><a href="' . get_permalink() . '#comments">' . _n( number_format_i18n( $comment_count ) . ' comment', number_format_i18n( $comment_count ) . ' comments', $comment_count, 'ascension' ) . '</a></span>' );
		}
		
		return apply_filters( 'asc_entry_page_details', $return );
	}
	else {
		return false;
	}
}
endif; // End asc_get_entry_page_details()


/**
 * Aside Entry Details
 *
 * Return the post details for the aside post format.
 *
 * @param int/string $id the post ID
 * @return mixed the post details string or bool false
 */
if ( ! function_exists( 'asc_get_entry_aside_details' ) ) :
function asc_get_entry_aside_details( $id ) {
	$return = apply_filters( 'asc_entry_author_meta', '<span class="meta author"><a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . get_the_author() . '</a></span>' );
	
	$return .= apply_filters( 'asc_entry_date_meta', '<span class="meta date"><a href="' . get_permalink() . '" rel="bookmark">' . get_the_date() . '</a></span>' );
	
	// Store the categories html.
	ob_start();
	the_category( ', ' );
	$categories = ob_get_contents();
	ob_end_clean();
	if ( ! empty( $categories ) ) {
		$return .= apply_filters( 'asc_entry_category_meta', '<span class="meta category">' . $categories . '</span>' );
	}
	
	return apply_filters( 'asc_entry_aside_details', $return );
}
endif; // End asc_get_entry_aside_details()


/**
 * Image Details
 *
 * Return the details for an attachment page.
 *
 * @return string the image details HTML
 */
if ( ! function_exists( 'asc_get_image_details' ) ) :
function asc_get_image_details() {	
	$return = apply_filters( 'asc_entry_date_meta', '<span class="meta date"><a href="' . get_permalink() . '" rel="bookmark">' . get_the_date() . '</a></span>' );
	$return .= apply_filters( 'asc_entry_attachment_meta', '<span class="meta attachment"><a href="' . wp_get_attachment_url() . '" title="Link to full image.">' . __( 'Full Image', 'ascension' ) . '</a></span>' );
	$return .= apply_filters( 'asc_entry_bookmark_meta', '<span class="meta bookmark"><a href="' . get_permalink() . '" rel="bookmark">' . __( 'Post', 'ascension' ) . '</a></span>' );
	
	return apply_filters( 'asc_image_details', $return );
}
endif; // End asc_get_image_details()


/**
 * Entry Tags
 *
 * Displays the post tags.
 *
 * @return echo the post tags HTML
 */
if ( ! function_exists( 'asc_entry_tags' ) ) :
function asc_entry_tags() {
	global $asc_theme_options;

	if ( $asc_theme_options['asc_entry_tags'] === 'true' ) {
		apply_filters( 'asc_entry_tags_meta', the_tags( '<div class="entry-tags meta">', ', ', '</div>' ) );
	}
}
endif; // End asc_entry_tags()

if ( ! function_exists( 'asc_get_entry_tags' ) ) :
function asc_get_entry_tags() {
	// Store the content.
	ob_start();
	asc_entry_tags();
	$content = ob_get_contents();
	ob_end_clean();
	
	return $content;
}
endif; // End asc_get_entry_tags()


/**
 * Edit Entry
 *
 * Displays the edit entry button.
 *
 * @return echo the edit button
 */
if ( ! function_exists( 'asc_edit_entry' ) ) :
function asc_edit_entry() {
	edit_post_link( 'Edit this entry.', '<div class="entry-edit meta">', '</div>' );
}
endif; // End asc_edit_entry()

if ( ! function_exists( 'asc_get_edit_entry' ) ) :
function asc_get_edit_entry() {
	// Store the content.
	ob_start();
	asc_edit_entry();
	$content = ob_get_contents();
	ob_end_clean();
	
	return $content;
}
endif; // End asc_get_edit_entry()


/**
 * Archive Content
 *
 * Display the proper content for archive pages.
 *
 * @param object $post the post object
 * @return echo the content
 */
if ( ! function_exists( 'asc_archive_content' ) ) :
function asc_archive_content( $post ) {
	global $asc_theme_options;
	
	// Store the more tag position or bool false.
	$has_more = strpos( $post->post_content, '<!--more-->' );
	
	if ( $has_more ) {
		the_content( asc_get_read_more() );
	}
	else {
		the_excerpt();
	}
}
endif; // End asc_archive_content()

if ( ! function_exists( 'asc_get_archive_content' ) ) :
function asc_get_archive_content() {
	// Store the content.
	ob_start();
	asc_archive_content();
	$content = ob_get_contents();
	ob_end_clean();
	
	return $content;
}
endif; // End asc_get_archive_content()


/**
 * Read More
 *
 * Set a new read more link for the post content.
 *
 * @return string the read more link HTML
 */
if ( ! function_exists( 'asc_get_read_more' ) ) :
function asc_get_read_more() {
	global $asc_theme_options;
	$read_more =  __( 'Read More', 'ascension' );
	
	if ( ! empty( $asc_theme_options['asc_custom_read_more'] ) ) {
		$read_more = $asc_theme_options['asc_custom_read_more'];
	}
	return apply_filters( 'asc_read_more', '<span class="read-more">' . $read_more . '</span>' );
}
endif; // End asc_get_read_more()


/**
 * Entry Pages
 *
 * Display links to additional pages for an entry.
 *
 * @return echo the pages links
 */
if ( ! function_exists( 'asc_entry_pages' ) ) :
function asc_entry_pages() {
	$args = array(
		'before'      => '<div class="entry-pages">',
		'after'       => '</div>',
		'link_before' => '<span>', 
		'link_after'  => '</span>'
	);
	wp_link_pages( apply_filters( 'asc_entry_pages', $args ) );
}
endif; // End asc_entry_pages()

if ( ! function_exists( 'asc_get_entry_pages' ) ) :
function asc_get_entry_pages() {
	// Store the content.
	ob_start();
	asc_entry_pages();
	$content = ob_get_contents();
	ob_end_clean();
	
	return $content;
}
endif; // End asc_get_entry_pages()


/**
 * Attachment Links
 */
if ( ! function_exists( 'asc_get_prev_image_link' ) ) :
function asc_get_prev_image_link() {
	// Store the previous image link.
	ob_start();
	previous_image_link();
	$prev_image = ob_get_contents();
	ob_end_clean();
	
	return $prev_image;
}
endif; // End asc_entry_pages()

if ( ! function_exists( 'asc_get_next_image_link' ) ) :
function asc_get_next_image_link() {
	// Store the next image link.
	ob_start();
	next_image_link();
	$next_image = ob_get_contents();
	ob_end_clean();
	
	return $next_image;
}
endif; // End asc_get_next_image_link()
?>