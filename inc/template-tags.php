<?php
/**
 * Template Functions
 *
 * Custom functions for various template features.
 * Child themes can overwrite all of these functions.
 */


/**
 * Navigation Menu
 *
 * Header Title
 * Header Description
 * Header Social Icons
 * Social Icons
 * Main Navigation
 * Default Menu
 * Sidebar Layout
 * Main Content
 * Category Description
 *
 * Archive Content Template
 * Entry Title
 * Archive Entry Title
 * Entry Details
 * Page Entry Details
 * Aside Entry Details
 * Attachment Details
 * Image Details
 * Entry Tags
 * Archive Content
 * Read More
 * Entry Pages
 *
 * Comments Title
 * Comment Layout
 * Comment Avatar
 * Comment Details
 * Previous Comments
 * Next Comments
 *
 * Login Form
 * Media Query Test
 * Grid Example
 * Scroll to Top
 */


/**
 * Header Title
 *
 * Return the title for the header.
 *
 * @return mixed the title string or bool false
 */
if ( ! function_exists( 'asc_get_header_title' ) ) :
function asc_get_header_title() {
	global $asc_theme_options;
	
	if ( $asc_theme_options['asc_header_info'] == 'Enabled' ) {
		$return = '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" rel="home">';
		
		if ( empty( $asc_theme_options['asc_header_title'] ) ) {
			$return .= get_bloginfo( 'name' );
		}
		else {
			$return .= $asc_theme_options['asc_header_title'];
		}
		
		$return .= '</a>';
		
		return apply_filters( 'asc_header_title', $return );
	}
	else {
		return false;
	}
}
endif; // End asc_get_header_title()


/**
 * Header Description
 *
 * Return the description for the header.
 *
 * @return mixed the description string or bool false
 */
if ( ! function_exists( 'asc_get_header_desc' ) ) :
function asc_get_header_desc() {
	global $asc_theme_options;
	
	if ( $asc_theme_options['asc_header_info'] == 'Enabled' ) {
		if ( empty( $asc_theme_options['asc_header_text'] ) ) {
			$return = get_bloginfo( 'description' );
		}
		else {
			$return = $asc_theme_options['asc_header_text'];
		}
		
		return apply_filters( 'asc_header_desc', $return );
	}
	else {
		return false;
	}
}
endif; // End asc_get_header_desc()


/**
 * Header Social Icons
 *
 * Return the social icons for the header.
 *
 * @return mixed the social icons string or bool false
 */
if ( ! function_exists( 'asc_get_header_socials' ) ) :
function asc_get_header_socials() {
	global $asc_theme_options;
	
	if ( $asc_theme_options['asc_header_socials'] === 'Yes' ) {
		$socials = asc_get_social_icons();
		
		if ( ! empty( $socials ) ) {
			return $socials;
		}
		else {
			return false;
		}
	}
	else {
		return false;
	}
}
endif; // End asc_get_header_socials()


/**
 * Social Icons
 *
 * Generate the social icon links.
 *
 * @return string the social icons HTML
 */
if ( ! function_exists( 'asc_get_social_icons' ) ) :
function asc_get_social_icons() {
	global $asc_theme_options;
	
	$twitter_url  = $asc_theme_options['asc_twitter_feed'];
	$facebook_url = $asc_theme_options['asc_facebook_profile'];
	$youtube_url  = $asc_theme_options['asc_youtube_page'];
	$rss_url      = $asc_theme_options['asc_rss_link'];
	$social_icons = '';

	if ( ! empty( $twitter_url ) ) {
		$social_icons .= '<a href="' . esc_url( $twitter_url ) . '" target="_blank"><img src="' . asc_file_uri( '/images/icons/twitter.png' ) . '" alt="Twitter Feed" /></a>';
	}
	if ( ! empty( $facebook_url ) ) {
		$social_icons .= '<a href="' . esc_url( $facebook_url ) . '" target="_blank"><img src="' . asc_file_uri( '/images/icons/facebook.png' ) . '" alt="Facebook Profile" /></a>';
	}
	if ( ! empty( $youtube_url ) ) {
		$social_icons .= '<a href="' . esc_url( $youtube_url ) . '" target="_blank"><img src="' . asc_file_uri( '/images/icons/youtube.png' ) . '" alt="YouTube Page" /></a>';
	}
	if ( ! empty( $rss_url ) ) {
		$social_icons .= '<a href="' . esc_url( $rss_url ) . '" target="_blank"><img src="' . asc_file_uri( '/images/icons/rss.png' ) . '" alt="RSS Feed" /></a>';
	}
	
	return apply_filters( 'asc_social_icon_links', $social_icons );
}
endif; // End asc_get_social_icons()


/**
 * Main Navigation
 *
 * Determine the proper navigation template to use.
 *
 * @return mixed the navigation template string or bool false
 */
if ( ! function_exists( 'asc_get_nav_template' ) ) :
function asc_get_nav_template() {
	if ( ! is_child_theme() ) {
		return 'dropped';
	}
	else {
		if ( defined( 'ASC_DROPPED_NAV' ) && ASC_DROPPED_NAV === true ) {
			return 'dropped';
		}
		else {
			return false;
		}
	}
}
endif; // End asc_get_nav_template()


/**
 * Default Menu
 *
 * Default menu to display when none is assigned to an active menu area.
 *
 * @return echo the default menu HTML
 */
if ( ! function_exists( 'asc_default_menu' ) ) :
function asc_default_menu() {
	?>
		<ul class="menu">
			<li class="menu-item"><a href="<?php esc_url( home_url( '/' ) ); ?>"><?php _e( 'Home', 'ascension' ); ?></a></li>
			<li class="menu-item"><a href="<?php admin_url( 'nav-menus.php' ); ?>"><?php _e( 'Add a Custom Menu', 'ascension' ); ?></a></li>
		</ul>
	<?php
}
endif; // End asc_default_menu()

if ( ! function_exists( 'asc_get_default_menu' ) ) :
function asc_get_default_menu() {
	// Store the content.
	ob_start();
	asc_default_menu();
	$content = ob_get_contents();
	ob_end_clean();
	
	return $content;
}
endif; // End asc_get_default_menu()


/**
 * Sidebar Layout
 *
 * Determine the sidebar and page layout type for the current page.
 *
 * @return string the layout types in 'sidebar_post' format
 */
if ( ! function_exists( 'asc_get_sidebar_layout' ) ) :
function asc_get_sidebar_layout() {
	global $asc_theme_options;

	// Get the proper page type to append to the sidebar layout option.
	if ( is_home() || is_front_page() ) {
		$sidebar_layout_type = '_home';
	}
	elseif ( is_archive() ) {
		$sidebar_layout_type = '_archive';
	}
	elseif ( is_singular() ) {
		if ( is_page() ) {
			$sidebar_layout_type = '_page';
		}
		elseif ( is_attachment() ) {
			$sidebar_layout_type = '_attachment';
		}
		else {
			$sidebar_layout_type = '_singular';
		}
	}
	elseif ( is_search() ) {
		$sidebar_layout_type = '_search';
	}
	elseif ( is_404() ) {
		$sidebar_layout_type = '_404';
	}
	else {
		$sidebar_layout_type = '_default';
	}

	return $asc_theme_options['asc_sidebar' . $sidebar_layout_type];
}
endif; // End asc_get_sidebar_layout()


/**
 * Main Content
 *
 * Display the main-content opening div and set the $content_width.
 *
 * @param string $class optional classes to add to the main content (space separated)
 * @return echo the main content opening div HTML
 */
if ( ! function_exists( 'asc_main_content_classes' ) ) :
function asc_main_content_classes( $class = '', $sidebar_layout = '' ) {
	// $content_width if required, but only effects the oEmbed widths.
	// This is not responsive, but can be with JavaScript.
	global $content_width;

	if ( $sidebar_layout === '' ) {
		$sidebar_layout = asc_get_sidebar_layout();
	}

	switch( $sidebar_layout ) {
		case 'Left Sidebar':
			$class .= ' ' . apply_filters( 'asc_main_content_left_sidebar', 'md-12 lg-8 lg-push-4' );
			echo $class;
			$content_width = 700;
			break;
			
		case 'Right Sidebar':
			$class .= ' ' . apply_filters( 'asc_main_content_right_sidebar', 'md-12 lg-8' );
			echo $class;
			$content_width = 700;
			break;
			
		case 'Left and Right Sidebars':
			$class .= ' ' . apply_filters( 'asc_main_content_left_right_sidebar', 'md-12 lg-6 lg-push-3' );
			echo $class;
			$content_width = 500;
			break;
			
		case 'Double Left Sidebars':
			$class .= ' ' . apply_filters( 'asc_main_content_left_left_sidebar', 'md-12 lg-6 lg-push-6' );
			echo $class;
			$content_width = 500;
			break;
			
		case 'Double Right Sidebars':
			$class .= ' ' . apply_filters( 'asc_main_content_right_right_sidebar', 'md-12 lg-6' );
			echo $class;
			$content_width = 500;
			break;
			
		case 'No Sidebars':
			$class .= ' ' . apply_filters( 'asc_main_content_no_sidebar', 'col-12' );
			echo $class;
			$content_width = 900;
			break;
			
		default:
			$class .= ' ' . apply_filters( 'asc_main_content_no_sidebar', 'col-12' );
			echo $class;
			$content_width = 900;
			break;
	}
}
endif; // End asc_main_content_classes()

if ( ! function_exists( 'asc_get_main_content_classes' ) ) :
function asc_get_main_content_classes() {
	// Store the content.
	ob_start();
	asc_main_content_classes();
	$content = ob_get_contents();
	ob_end_clean();
	
	return $content;
}
endif; // End asc_get_main_content_classes()


/**
 * Category Description
 *
 * Display the category description in the archive and category pages.
 *
 * @return mixed the category description string or bool false
 */
if ( ! function_exists( 'asc_get_category_desc' ) ) :
function asc_get_category_desc() {
	global $asc_theme_options;
	$description = category_description();
	
	if ( is_category() && ! is_home() && ! empty( $description ) && $asc_theme_options['asc_category_desc'] === 'Enabled' ) {
		return $description;
	}
	else {
		return false;
	}
}
endif; // End asc_get_category_desc()


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
	$slider_only = get_post_meta( get_the_ID(), 'slider-only', true );

	if ( $slider_only !== 'true' ) {
		// Store the formatted single template content.
		ob_start();
		get_template_part( 'templates/content/content-' . $format );
		$single_template = ob_get_contents();
		ob_end_clean();
		
		// Store the formatted archive template content.
		ob_start();
		get_template_part( 'templates/content/content-archive-' . $format );
		$archive_template = ob_get_contents();
		ob_end_clean();
		
		if ( ! empty( $archive_template ) ) {
			get_template_part( 'templates/content/content-archive', $format );
		}
		elseif ( ! empty( $single_template ) ) {
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
		if ( $asc_theme_options['asc_page_title'] === 'Enabled' ) {
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
	
	if ( $asc_theme_options['asc_entry_details'] === 'Enabled' ) {
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
	
	if ( $asc_theme_options['asc_page_details'] === 'Enabled' ) {
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

	if ( $asc_theme_options['asc_entry_tags'] === 'Enabled' ) {
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


/**
 * Login Form
 *
 * Display the login form.
 */ 
if ( ! function_exists( 'asc_login_form' ) ) :
function asc_login_form() {
	if ( ! is_user_logged_in() ) {
		$args = array(
			'redirect'       => apply_filters( 'asc-login-page-redirect', $_SERVER['REQUEST_URI'] ), 
			'form_id'        => 'asc-login-page',
			'label_username' => __( 'Username', 'ascension' ),
			'label_password' => __( 'Password', 'ascension' ),
			'label_remember' => __( 'Remember Me', 'ascension' ),
			'label_log_in'   => __( 'Log In', 'ascension' ),
			'remember'       => true
		);
		wp_login_form( $args );
	}
	else {
		$logout = wp_loginout( home_url(), false );
		$admin  = wp_register( '', '', false );
		
		echo apply_filters( 'asc-login-page-logout', '<ul><li class="logout">' . $logout . '</li><li class="admin">' . $admin . '</li></ul>' );
	}
}
endif; // End asc_login_form()

if ( ! function_exists( 'asc_get_login_form' ) ) :
function asc_get_login_form() {
	// Store the content.
	ob_start();
	asc_login_form();
	$content = ob_get_contents();
	ob_end_clean();
	
	return $content;
}
endif; // End asc_get_login_form()


/**
 * Media Query Test
 *
 * Load the media query test view.
 */ 
if ( ! function_exists( 'asc_media_query_test' ) ) :
function asc_media_query_test() {
	global $asc_theme_options;
	
	if ( $asc_theme_options['asc_media_query_test'] === 'Enabled' ) {
		// Output the margin CSS.
		?>
			<style type="text/css">
				body {
					margin-bottom: 2.5em !important;
				}
			</style>
		<?php
		
		// Hook the template into the footer.
		function asc_media_query_test_template() {
			get_template_part( 'templates/modules/media-query-test' );
		}
		add_action( 'wp_footer', 'asc_media_query_test_template' );
	}
}
endif; // End asc_media_query_test()
add_action( 'wp_head', 'asc_media_query_test', 10 );


/**
 * Scroll to Top
 *
 * Display the scroll to top box.
 *
 * @return echo the scroll to top HTML
 */ 
if ( ! function_exists( 'asc_scroll_to_top' ) ) :
function asc_scroll_to_top() {
	global $asc_theme_options;
	
	if ( $asc_theme_options['asc_scroll_to_top'] === 'Enabled' ) {
		$classes = '';
		
		if ( is_admin_bar_showing() ) {
			$classes .= 'admin-bar-on';
		}
		
		$html = '<div id="scroll-to-top" class="' . $classes . '">';
		$html .= apply_filters( 'asc_scroll_to_top_content', '<span></span>' );
		$html .= '</div>';
		
		echo $html;
	}
}
endif; // End asc_scroll_to_top()
add_action( 'wp_footer', 'asc_scroll_to_top', 10 );
?>