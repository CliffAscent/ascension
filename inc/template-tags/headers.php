<?php
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
	
	if ( $asc_theme_options['asc_header_info'] == 'true' ) {
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
	
	if ( $asc_theme_options['asc_header_info'] == 'true' ) {
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
	
	if ( $asc_theme_options['asc_header_socials'] === 'true' ) {
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
?>