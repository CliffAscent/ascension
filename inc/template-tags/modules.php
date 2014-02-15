<?php
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
	
	if ( $asc_theme_options['asc_media_query_test'] === 'true' ) {
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
	
	if ( $asc_theme_options['asc_scroll_to_top'] === 'true' ) {
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