<?php
/**
 * Theme Functions
 *
 * Contains the theme functions, definitions, configurations, etc.
 */


/**
 * Navigation Menu
 *
 * Versions
 * Setup
 * Scripts and Styles
 */


/**
 * Versions
 *
 * Version numbers tracking the various theme sections.
 * Numbers are formatted as majorRelease.minorRelease.hotfix
 */
define( 'ASC_ST_VERSION', '0.8.0' );
define( 'ASC_ST_SCRIPT_VERSION', '0.1.0' );
define( 'ASC_ST_STYLE_VERSION', '0.8.0' );


/**
 * Setup
 *
 * Define constants, load settings, load required files, register supports, etc.
 */
function asc_st_setup() {
	// Add internationalization support.
	load_theme_textdomain( 'ascension-starter', ASC_STYLESHEET_DIR_URI . '/languages' );
	
	// Load the Open Sans Google fonts.
	asc_webfonts( 'google', array( 'Open Sans' ) );
	
	// Enabled the dropped main navigation template.
	define( 'ASC_DROPPED_NAV', true );
}
add_action( 'after_setup_theme', 'asc_st_setup' );


/**
 * Scripts and Styles
 *
 * Enqueue the scripts and stylesheets.
 */
function asc_st_scripts() {
	// Load the Ascension Starter stylesheet after the Ascension framework stylesheet.
	wp_enqueue_style( 'ascension-starter', ASC_STYLESHEET_DIR_URI . '/css/ascension-starter.css', array( 'ascension' ), ASC_ST_STYLE_VERSION );
	
	// Load the Ascension Starter script.
	wp_enqueue_script( 'ascension-starter', ASC_STYLESHEET_DIR_URI . '/js/ascension-starter.js', array( 'jquery' ), ASC_ST_SCRIPT_VERSION, false );
}
add_action( 'wp_enqueue_scripts', 'asc_st_scripts', 20 );
?>