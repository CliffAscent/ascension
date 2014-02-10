<?php
/**
 * Theme Functions
 *
 * Contains the theme functions, definitions, configurations, etc.
 */


/**
 * Navigation Menu
 *
 * Starter Child
 * Versions
 * Setup
 * File URI
 * Get Nested String
 * Page Title
 * Scripts and Styles
 * Custom Code
 * Admin Bar Link
 * Body Classes
 * Entry Classes
 * Custom Walker Nav
 * Excerpts
 * Visual Editor
 * WooCommerce
 * Footer Credits
 */


/**
 * Starter Child
 *
 * Setup the starter child theme if no child theme is set.
 */
if ( ! is_child_theme() ) {
	require( get_template_directory() . '/inc/starter-functions.php' );
}


/**
 * Versions
 *
 * Version numbers tracking the various framework sections.
 * Numbers are formatted as majorRelease.minorRelease.hotfix
 */
define( 'ASC_VERSION', '0.8.0' );
define( 'ASC_SCRIPT_VERSION', '0.8.0' );
define( 'ASC_STYLE_VERSION', '0.8.0' );


/**
 * Setup
 *
 * Define constants, load settings, load required files, register supports, etc.
 */

// Store the template directory and URI.
define( 'ASC_TEMPLATE_DIR',       get_template_directory() );
define( 'ASC_TEMPLATE_DIR_URI',   get_template_directory_uri() );
define( 'ASC_STYLESHEET_DIR',     get_stylesheet_directory() );
define( 'ASC_STYLESHEET_DIR_URI', get_stylesheet_directory_uri() );

// Define the theme separator. A child theme can do the same to override this.
define( 'ASC_THEME_SEPARATOR', ' - ' );

// Load the required framework files.
require( ASC_TEMPLATE_DIR . '/inc/theme-options.php' );
require( ASC_TEMPLATE_DIR . '/inc/template-tags.php' );
require( ASC_TEMPLATE_DIR . '/inc/widget-areas.php' );
require( ASC_TEMPLATE_DIR . '/inc/widgets.php' );
require( ASC_TEMPLATE_DIR . '/inc/shortcodes.php' );
require( ASC_TEMPLATE_DIR . '/inc/custom-header.php' );
require( ASC_TEMPLATE_DIR . '/inc/web-fonts.php' );
require( ASC_TEMPLATE_DIR . '/inc/slider-meta-box.php' );

// Load the theme options into the global space.
$asc_theme_options = asc_get_theme_options();

// Declare supports, register menus, and set misc. options after theme setup.
function asc_setup() {
	// Add internationalization support.
	load_theme_textdomain( 'ascension', ASC_TEMPLATE_DIR . '/languages' );

	// Register the navigation menus.
	register_nav_menu( 'primary', __( 'Primary Menu', 'ascension' ) );

	// Add theme supports.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-formats', apply_filters( 'asc_post_formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'slider', 'status', 'video' ) ) );
	add_theme_support( 'custom-background', apply_filters( 'asc_custom_bg_defaults', array( 'default-color' => 'fff' ) ) );
	add_theme_support( 'post-thumbnails' );
	
	// Use HTML5 markup for supported forms.
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );
	
	// Set the default post thumbnail size.
	set_post_thumbnail_size( apply_filters( 'asc_image_width_thumb', 100 ), apply_filters( 'asc_image_height_thumb', 100 ) );
	
	// Add custom image sizes that match the grid breakpoints.
	add_image_size( 'ascension-slider', apply_filters( 'asc_image_width_slider', 1200 ), apply_filters( 'asc_image_height_slider', 300 ), apply_filters( 'asc_image_crop_slider', true ) );
	add_image_size( 'ascension-large', apply_filters( 'asc_image_width_large', 1200 ), apply_filters( 'asc_image_height_large', 0 ) );
	add_image_size( 'ascension-medium', apply_filters( 'asc_image_width_medium', 800 ), apply_filters( 'asc_image_height_medium', 0 ) );
	add_image_size( 'ascension-small', apply_filters( 'asc_image_width_small', 400 ), apply_filters( 'asc_image_height_small', 0 ) );
}
add_action( 'after_setup_theme', 'asc_setup' );


/**
 * File URI
 *
 * Retrieve the URI for the file if it exists in the child theme, or else in the parent theme.
 *
 * @param string $file the file path relative to the theme directory
 * @return mixed the file URI string or bool false
 */
if ( ! function_exists( 'asc_file_uri' ) ) :
function asc_file_uri( $file ) {
	if ( file_exists( ASC_STYLESHEET_DIR . $file ) ) {
		return ASC_STYLESHEET_DIR_URI . $file;
	}
	else if ( file_exists( ASC_TEMPLATE_DIR . $file ) ) {
		return ASC_TEMPLATE_DIR_URI . $file;
	}
	else {
		return false;
	}
}
endif; // End asc_file_uri()


/**
 * Get Nested String
 *
 * Return the string nested between two string.
 *
 * @param string $string The string containing the target
 * @param string $start The string before the target string
 * @param string $end The string after the target string
 * @return string the target string
 */
if ( ! function_exists( 'asc_get_nested_string' ) ) :
function asc_get_nested_string( $string, $start, $end ) {
    $string = ' ' . $string;
    $ini = strpos( $string, $start );
    if ( $ini == 0 ) {
        return '';
	}
    $ini += strlen( $start );
    $len = strpos( $string, $end, $ini ) - $ini;
	
    return substr( $string, $ini, $len );
}
endif; // End asc_get_nested_string()


/**
 * Page Title
 *
 * Modify the <title> content for the current page.
 *
 * @return string the <title> content
 */
if ( ! function_exists( 'asc_page_title' ) ) :
function asc_page_title( $title, $sep ) {
	global $asc_theme_options;
	
	if ( $asc_theme_options['asc_sitename_in_title'] === 'Enabled' ) {
		return $title . get_bloginfo( 'name' );
	}
	else {
		return $title;
	}
}
endif; // End asc_page_title()
add_filter( 'wp_title', 'asc_page_title', 10, 2 );


/**
 * Scripts and Styles
 *
 * Enqueue the framework scripts and stylesheets and load custom JS and CSS.
 */
function asc_scripts() {
	global $asc_theme_options;
	
	// Load the Ascension framework stylesheet.
	wp_enqueue_style( 'ascension', ASC_TEMPLATE_DIR_URI . '/css/ascension.css', false, ASC_STYLE_VERSION );
	
	// Load the Ascension icons stylesheet.
	wp_enqueue_style( 'ascension-icons', ASC_TEMPLATE_DIR_URI . '/css/icons.css', array( 'ascension' ), ASC_STYLE_VERSION );

	// Load enquire.js to run media queries in JavaScript for advanced functionality.
	wp_enqueue_script( 'enquire-js', ASC_TEMPLATE_DIR_URI . '/js/vendor/enquire/enquire.min.js', array(), '2.0.2', false );
	
	// Load the Ascension script.
	wp_enqueue_script( 'ascension', ASC_TEMPLATE_DIR_URI . '/js/ascension.js', array( 'jquery' ), ASC_SCRIPT_VERSION, false );

	// Add the comment-reply script.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply', false, array(), 1, true );
	}
}
add_action( 'wp_enqueue_scripts', 'asc_scripts' );

// Initiate the Ascension JavaScript using the ascensionConfig object if defined.
if ( ! function_exists( 'asc_init_script' ) ) :
function asc_init_script() {
	?>
		<script type="text/javascript">
			var ascTemplateDir         = '<?php echo ASC_TEMPLATE_DIR; ?>';
			var ascTemplateUri         = '<?php echo ASC_TEMPLATE_DIR_URI; ?>';
			var ascStylesheetDir       = '<?php echo ASC_STYLESHEET_DIR; ?>';
			var ascStylesheetDirUri    = '<?php echo ASC_STYLESHEET_DIR_URI; ?>';
			
			if ( typeof ascensionConfig != 'undefined' ) {
				var Ascension = jQuery.Ascension( ascensionConfig );
			}
			else {
				var Ascension = jQuery.Ascension();
			}
		</script>
	<?php
}
endif; // End asc_init_script()
add_action( 'wp_head', 'asc_init_script', 99 );

// Set the max-width to full screen.
function asc_header_max_width() {
	global $asc_theme_options;
	
	if ( $asc_theme_options['asc_fullscreen_layout'] == 'Enabled' ) {
		?>
			<style type="text/css">
				body > .wrapper > .row {
					max-width: 100% !important;
				}
			</style>
		<?php
	}
}
add_action( 'wp_head', 'asc_header_max_width' );


/**
 * Custom Code
 *
 * Outputs the custom code theme options into the header and footer.
 */
function asc_header_code() {
	global $asc_theme_options;
	
	if ( ! empty( $asc_theme_options['asc_custom_header_code'] ) ) {
		echo $asc_theme_options['asc_custom_header_code'];
	}
}
add_action( 'wp_head', 'asc_header_code' );

function asc_footer_code() {
	global $asc_theme_options;
	
	if ( ! empty( $asc_theme_options['asc_custom_footer_code'] ) ) {
		echo $asc_theme_options['asc_custom_footer_code'];
	}
}
add_action( 'wp_footer', 'asc_footer_code' );


/**
 * Admin Bar Link
 *
 * Add the theme options page link to the admin bar menu.
 */
function add_theme_options_link( $wp_admin_bar ) {
  $args = array(
    'id' => 'theme_options',
    'title' => __( 'Theme Options', 'ascension' ),
	'parent' => 'site-name',
    'href' => get_admin_url( '', 'themes.php?page=theme_options' )
  );

  $wp_admin_bar->add_node( $args );
}
add_action( 'admin_bar_menu', 'add_theme_options_link', 999 );


/**
 * Body Classes
 *
 * Add the default and custom classes to the body.
 *
 * @param array $classes classes already added to the body
 * @return array $classes the body classes
 */
if ( ! function_exists( 'asc_body_classes' ) ) :
function asc_body_classes( $classes ) {
	// Add a class for the main content and sidebar layout.
	$classes[] = sanitize_title( asc_get_sidebar_layout() );
	
	// Adding no-js to the body for no JavaScript support.
	$classes[] = 'no-js';

	if ( is_archive() || is_search() || is_home() ) {
		$classes[] = 'archive';
	}

	$sidebars = asc_get_sidebar_layout();
	if ( $sidebars === 'No Sidebars' || is_page_template( 'templates/full-width.php' ) ) {
		$classes[] = 'full-width';
	}

	if ( is_singular() && ! is_front_page() ) {
		$classes[] = 'singular';
	}

	if ( is_active_sidebar( 'main-slider' ) ) {
		$classes[] = 'slider';
	}
	
	return $classes;
}
endif; // End asc_body_classes()
add_filter( 'body_class', 'asc_body_classes' );


/**
 * Entry Classes
 *
 * Add the default and custom classes to the entry container.
 *
 * @param array $classes classes already added to the entry
 * @return array $classes the entry classes
 */
if ( ! function_exists( 'asc_entry_classes' ) ) :
function asc_entry_classes( $classes ) {
	// Add a class for entries with an image.
	if ( has_post_thumbnail() ) {
		$classes[] = 'has-post-image';
	}
	
	// Add class entry to all posts, but first make sure there is a post present.
	if ( is_array( $classes ) ) {
		$classes[] = 'entry';
	}
	
	return $classes;
}
endif; // End asc_entry_classes()
add_filter( 'post_class', 'asc_entry_classes' );


/**
 * Custom Walker Nav
 *
 * Modify the default behaviour of wp_nav_menu()
 * This overrides methods of Walker_Nav_Menu in wp-includes/nav-menu-template.php
 */
class Asc_walker_Nav_Menu extends Walker_Nav_Menu {
	// Add a class to menu items with a sub menu.
    function display_element( $element, &$children_elements, $max_depth, $depth = 0, $args, &$output ) {
        $id_field = $this->db_fields['id'];
        if ( ! empty( $children_elements[ $element->$id_field ] ) ) {
            $element->classes[] = 'has-sub-menu';
        }
        Walker_Nav_Menu::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
	
	// Add a depth class to sub-menus
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$new_depth = $depth + 1;
		
		if ( $depth === 0 ) {
			$output .= "\n$indent<ul class=\"sub-menu depth-$new_depth\">\n";
		}
		else {
			$output .= "\n$indent<ul class=\"sub-menu depth-$new_depth sub-sub-menu\">\n";
		}
	}
	
	// Close the container on sub-menus
	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul>\n";
	}
}


/**
 * Excerpts
 *
 * Customize the post excerpts.
 */

// Set a new post excerpt length.
function asc_excerpt_length( $length ) {
	return 60;
}
add_filter( 'excerpt_length', 'asc_excerpt_length' );

// Set a new read more link for the post excerpt.
function asc_excerpt_more( $more ) {
	return asc_get_read_more();
}
add_filter( 'excerpt_more', 'asc_excerpt_more' );


/**
 * Visual Editor
 *
 * Plug our shortcodes into the visual editor.
 */

// Declare the editor plugin JS file.
function asc_editor_plugin( $plugin_array ) {
    $plugin_array['ascension'] = ASC_TEMPLATE_DIR_URI . '/js/editor.js';
    return $plugin_array;
}

// Declare the custom editor buttons.
function asc_editor_buttons( $buttons ) {
    array_push( $buttons, 'notify', 'contentBoxes', 'postWidget', 'callout', 'respondDrop', 'tooltip', 'blockquoteLeft', 'blockquoteRight', 'highlight', 'subheading', 'newline' );
    return $buttons;
}

// Register the editor plugin.
function asc_visual_editor() {
    add_filter( 'mce_external_plugins', 'asc_editor_plugin' );
    add_filter( 'mce_buttons_4', 'asc_editor_buttons' );
	
	// Load up the custom editor CSS.
	add_editor_style( 'css/editor.css' );
}
add_action( 'init', 'asc_visual_editor' );


/**
 * WooCommerce
 *
 * Setup support for woocommerce.
 */

// Declare woocommerce support.
add_theme_support( 'woocommerce' );

// Change the main content wrapper for woocommerce pages.
function asc_wc_main_content_open() {
	// Store the main content classes.
	ob_start();
	asc_main_content_classes( 'woocommerce' );
	$classes = ob_get_contents();
	ob_end_clean();
	
	echo '<div id="main-content" class="' . $classes . '" role="main">';
}
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
add_action( 'woocommerce_before_main_content', 'asc_wc_main_content_open', 10 );

// Change the main content closing for woocommerce pages.
function asc_wc_main_content_end() {
  echo '</div><!-- End #main-content -->';
}
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
add_action( 'woocommerce_after_main_content', 'asc_wc_main_content_end', 10 );


/**
 * Footer Credits
 *
 * Add a credit link in the wp_footer hook.
 */
if ( ! function_exists( 'asc_footer_credits' ) ) :
function asc_footer_credits() {
	global $asc_theme_options;
	$asc_theme = wp_get_theme( 'ascension' );
	
	if ( $asc_theme_options['asc_footer_credits'] == 'Enabled' ) {
		echo '<div class="ascension-credits">' . __( 'Built using', 'ascension' ) . ' <a href="' . $asc_theme->get( 'ThemeURI' ) . '">' . $asc_theme->get( 'Name' ) . '</a></div>';
	}
}
endif; // End asc_footer_credits()
add_action( 'wp_footer', 'asc_footer_credits', 99 );
?>