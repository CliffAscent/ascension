<?php
/**
 * Theme Options
 *
 * Create the theme options page and manage all of it's settings.
 */


/**
 * Navigation Menu
 *
 * Register Settings
 * Settings Groups
 * Social Icon Settings
 * Main Layout Settings
 * Sidebar Layout Settings
 * Post Display Settings
 * Advanced Settings
 * Default Options
 * Options Page
 * Validation
 */


/**
 * Register Settings
 *
 * Register the settings groups and individual setting.
 * Every setting has an arguments array that is passed to the validation function.
 * All setting argument should contain 'label_for' => 'setting_id'
 * Setting with options should contain 'options' => array( 'Valid 1', 'Valid 2' )
 */
function asc_theme_options() {
	// Register the theme settings.
	register_setting(
		'asc_theme_options',
		'asc_theme_options',
		'asc_theme_options_validate'
	);

	/**
	 * Settings Groups
	 *
	 * Categorical groups that contain all settings.
	 */
	add_settings_section(
		'asc_child_theme',
		__( 'Child Theme', 'ascension' ),
		'__return_false',
		'asc_child_theme'
	);
	add_settings_section(
		'asc_social_icons',
		__( 'Social Icons', 'ascension' ),
		'__return_false',
		'asc_social_icons'
	);
	add_settings_section(
		'asc_main_layout',
		__( 'Main Layout', 'ascension' ),
		'__return_false',
		'asc_main_layout'
	);
	add_settings_section(
		'asc_sidebar_layout',
		__( 'Sidebar Layout', 'ascension' ),
		'__return_false',
		'asc_sidebar_layout'
	);
	add_settings_section(
		'asc_post_display',
		__( 'Posts and Pages', 'ascension' ),
		'__return_false',
		'asc_post_display'
	);
	add_settings_section(
		'asc_advanced',
		__( 'Advanced', 'ascension' ),
		'__return_false',
		'asc_advanced'
	);
	
	
	/**
	 * Child Theme Settings
	 *
	 * Action hook for child theme to register settings to the asc_child_theme section.
	 */
	do_action( 'asc_add_theme_options' );

	
	/**
	 * Social Icon Settings
	 *
	 * Setting specific to social icons.
	 */
	add_settings_field(
		'asc_twitter_feed',
		__( 'Twitter Feed URL', 'ascension' ),
		'asc_settings_display_text_field',
		'asc_social_icons',
		'asc_social_icons',
		array( 'label_for' => 'asc_twitter_feed', 'description' => __( 'The address to your Twitter feed. If this field is blank the icon will not be displayed.', 'ascension' ) )
	);
	add_settings_field(
		'asc_facebook_profile',
		__( 'Facebook Profile URL', 'ascension' ),
		'asc_settings_display_text_field',
		'asc_social_icons',
		'asc_social_icons',
		array(
			'label_for'   => 'asc_facebook_profile',
			'description' => __( 'The address to your Facebook profile. If this field is blank the icon will not be displayed.', 'ascension' ) 
		)
	);
	add_settings_field(
		'asc_youtube_page',
		__( 'YouTube Page URL', 'ascension' ),
		'asc_settings_display_text_field',
		'asc_social_icons',
		'asc_social_icons',
		array(
			'label_for'   => 'asc_youtube_page',
			'description' => __( 'The address to your YouTube page. If this field is blank the icon will not be displayed.', 'ascension' )
		)
	);
	add_settings_field(
		'asc_rss_link',
		__( 'RSS Feed URL', 'ascension' ),
		'asc_settings_display_text_field',
		'asc_social_icons',
		'asc_social_icons',
		array(
			'label_for'   => 'asc_rss_link',
			'description' => __( 'The address to your RSS feed. If this field is blank the icon will not be displayed.', 'ascension' )
		)
	);
	add_settings_field(
		'asc_header_socials',
		__( 'Show in the Header', 'ascension' ),
		'asc_settings_display_drop_down',
		'asc_social_icons',
		'asc_social_icons',
		array(
			'label_for'   => 'asc_header_socials',
			'options'     => array( 'Yes', 'No' ),
			'description' => __( 'Select "Yes" to show the activated social icons in the header.', 'ascension' )
		)
	);

	/**
	 * Main Layout Settings
	 *
	 * Setting that effect the overall layout of the site.
	 */
	add_settings_field(
		'asc_fullscreen_layout',
		__( 'Fullscreen Layout', 'ascension' ),
		'asc_settings_display_drop_down',
		'asc_main_layout',
		'asc_main_layout',
		array(
			'label_for'   => 'asc_fullscreen_layout',
			'options'     => array( 'Enabled', 'Disabled' ),
			'description' => __( 'Enable this option to allow the layout to fill 100% of the browsers width instead of the default 1200px maximum.', 'ascension' ) )
	);
	add_settings_field(
		'asc_sitename_in_title',
		__( 'Site Name in Page Title', 'ascension' ),
		'asc_settings_display_drop_down',
		'asc_main_layout',
		'asc_main_layout',
		array(
			'label_for'   => 'asc_sitename_in_title',
			'options'     => array( 'Enabled', 'Disabled' ),
			'description' => __( 'Enabled this option to add the Site Title into the web page &lt;title&gt; (effects bookmarks and browser tab titles). Some SEO plugin\'s will already do this, in which case you should Disabled this option.', 'ascension' )
		)
	);
	add_settings_field(
		'asc_scroll_to_top',
		__( 'Scroll to Top Box', 'ascension' ),
		'asc_settings_display_drop_down',
		'asc_main_layout',
		'asc_main_layout',
		array(
			'label_for'   => 'asc_scroll_to_top',
			'options'     => array( 'Enabled', 'Disabled' ),
			'description' => __( 'Enabled this option to display a scroll to top box when a user scrolls down on a page.', 'ascension' )
		)
	);
	add_settings_field(
		'asc_header_layout',
		__( 'Header Layout', 'ascension' ),
		'asc_settings_display_drop_down',
		'asc_main_layout',
		'asc_main_layout',
		array(
			'label_for'   => 'asc_header_layout',
			'options'     => array( 'Default', 'Banner Image', 'Widget' ),
			'description' => __( 'Select the header layout type. The Banner Image option displays an image at 100% width, and the Widget option activates a widget area to add a custom header widget.', 'ascension' )
		)
	);
	add_settings_field(
		'asc_header_info',
		__( 'Header Title and Text', 'ascension' ),
		'asc_settings_display_drop_down',
		'asc_main_layout',
		'asc_main_layout',
		array(
			'label_for'   => 'asc_header_info',
			'options'     => array( 'Enabled', 'Disabled' ),
			'description' => __( 'Toggle the header title and description area on or off.', 'ascension' )
		)
	);
	add_settings_field(
		'asc_header_title',
		__( 'Custom Header Title', 'ascension' ),
		'asc_settings_display_text_field',
		'asc_main_layout',
		'asc_main_layout',
		array(
			'label_for'   => 'asc_header_title',
			'description' => __( 'Set a custom header title to use instead of the Site Title in the general settings.', 'ascension' )
		)
	);
	add_settings_field(
		'asc_header_text',
		__( 'Custom Header Text', 'ascension' ),
		'asc_settings_display_text_area',
		'asc_main_layout',
		'asc_main_layout',
		array(
			'label_for'   => 'asc_header_text',
			'description' => __( 'Set a custom header description to use instead of the Tagline in the general settings.', 'ascension' )
		)
	);
	add_settings_field(
		'asc_main_nav',
		__( 'Main Navigation', 'ascension' ),
		'asc_settings_display_drop_down',
		'asc_main_layout',
		'asc_main_layout',
		array(
			'label_for'   => 'asc_main_nav',
			'options'     => array( 'Enabled', 'Disabled' ),
			'description' => __( 'Toggle the main navigation area on or off.', 'ascension' )
		)
	);
	add_settings_field(
		'asc_footer_credits',
		__( 'Footer Credits', 'ascension' ),
		'asc_settings_display_drop_down',
		'asc_main_layout',
		'asc_main_layout',
		array(
			'label_for'   => 'asc_footer_credits',
			'options'     => array( 'Enabled', 'Disabled' ),
			'description' => __( 'Toggle the Ascension footer credits on or off. Please support Ascension and Enable this option or make a contribution towards the development of Ascension.', 'ascension' )
		)
	);
	
	/**
	 * Sidebar Layout Settings
	 *
	 * Sidebar configurations for various sections of the site.
	 */
	add_settings_field(
		'asc_sidebar_default',
		__( 'Default Sidebar Layout', 'ascension' ),
		'asc_settings_display_drop_down',
		'asc_sidebar_layout',
		'asc_sidebar_layout',
		array(
			'label_for'   => 'asc_sidebar_layout',
			'options'     => array( 'Right Sidebar', 'Left Sidebar', 'Left and Right Sidebars', 'Double Right Sidebars', 'Double Left Sidebars', 'No Sidebars' ),
			'description' => __( 'The default sidebar layout used as a fallback for pages that don\'t fall into any other sidebar layout category.', 'ascension' )
		)
	);
	add_settings_field(
		'asc_sidebar_home',
		__( 'Home Sidebar Layout', 'ascension' ),
		'asc_settings_display_drop_down',
		'asc_sidebar_layout',
		'asc_sidebar_layout',
		array(
			'label_for'   => 'asc_sidebar_home',
			'options'     => array( 'Right Sidebar', 'Left Sidebar', 'Left and Right Sidebars', 'Double Right Sidebars', 'Double Left Sidebars', 'No Sidebars' ),
			'description' => __( 'The sidebar layout used on the home page of the site.', 'ascension' )
		)
	);
	add_settings_field(
		'asc_sidebar_archive',
		__( 'Archive Sidebar Layout', 'ascension' ),
		'asc_settings_display_drop_down',
		'asc_sidebar_layout',
		'asc_sidebar_layout',
		array(
			'label_for'   => 'asc_sidebar_archive',
			'options'     => array( 'Right Sidebar', 'Left Sidebar', 'Left and Right Sidebars', 'Double Right Sidebars', 'Double Left Sidebars', 'No Sidebars' ),
			'description' => __( 'The sidebar layout used for archive and category pages.', 'ascension' )
		)
	);
	add_settings_field(
		'asc_sidebar_singular',
		__( 'Singular Sidebar Layout', 'ascension' ),
		'asc_settings_display_drop_down',
		'asc_sidebar_layout',
		'asc_sidebar_layout',
		array(
			'label_for'   => 'asc_sidebar_singular',
			'options'     => array( 'Right Sidebar', 'Left Sidebar', 'Left and Right Sidebars', 'Double Right Sidebars', 'Double Left Sidebars', 'No Sidebars' ),
			'description' => __( 'The sidebar layout used for a single post, not counting the post type \'pages\'.', 'ascension' )
		)
	);
	add_settings_field(
		'asc_sidebar_page',
		__( 'Page Sidebar Layout', 'ascension' ),
		'asc_settings_display_drop_down',
		'asc_sidebar_layout',
		'asc_sidebar_layout',
		array(
			'label_for'   => 'asc_sidebar_page',
			'options'     => array( 'Right Sidebar', 'Left Sidebar', 'Left and Right Sidebars', 'Double Right Sidebars', 'Double Left Sidebars', 'No Sidebars' ),
			'description' => __( 'The sidebar layout used for single pages of the post type \'pages\'.', 'ascension' )
		)
	);
	add_settings_field(
		'asc_sidebar_search',
		__( 'Search Sidebar Layout', 'ascension' ),
		'asc_settings_display_drop_down',
		'asc_sidebar_layout',
		'asc_sidebar_layout',
		array(
			'label_for'   => 'asc_sidebar_search',
			'options'     => array( 'Right Sidebar', 'Left Sidebar', 'Left and Right Sidebars', 'Double Right Sidebars', 'Double Left Sidebars', 'No Sidebars' ),
			'description' => __( 'The sidebar layout used for the search page.', 'ascension' )
		)
	);
	add_settings_field(
		'asc_sidebar_404',
		__( 'Not Found Sidebar Layout', 'ascension' ),
		'asc_settings_display_drop_down',
		'asc_sidebar_layout',
		'asc_sidebar_layout',
		array(
			'label_for'   => 'asc_sidebar_404',
			'options'     => array( 'Right Sidebar', 'Left Sidebar', 'Left and Right Sidebars', 'Double Right Sidebars', 'Double Left Sidebars', 'No Sidebars' ),
			'description' => __( 'The sidebar layout used when an invalid page is requested.', 'ascension' )
		)
	);
	add_settings_field(
		'asc_sidebar_attachment',
		__( 'Attachment Sidebar Layout', 'ascension' ),
		'asc_settings_display_drop_down',
		'asc_sidebar_layout',
		'asc_sidebar_layout',
		array(
			'label_for'   => 'asc_sidebar_attachment',
			'options'     => array( 'Right Sidebar', 'Left Sidebar', 'Left and Right Sidebars', 'Double Right Sidebars', 'Double Left Sidebars', 'No Sidebars' ),
			'description' => __( 'The sidebar layout used for attachment pages.', 'ascension' )
		)
	);

	/**
	 * Post Display Settings
	 *
	 * Settings that effect posts and the various post types.
	 */
	add_settings_field(
		'asc_category_desc',
		__( 'Category Descriptions', 'ascension' ),
		'asc_settings_display_drop_down',
		'asc_post_display',
		'asc_post_display',
		array(
			'label_for'   => 'asc_category_desc',
			'options'     => array( 'Enabled', 'Disabled' ),
			'description' => __( 'Enable this option to display the category description, if set, in the category archive page.', 'ascension' )
		)
	);
	add_settings_field(
		'asc_entry_details',
		__( 'Post Details', 'ascension' ),
		'asc_settings_display_drop_down',
		'asc_post_display',
		'asc_post_display',
		array(
			'label_for'   => 'asc_entry_details',
			'options'     => array( 'Enabled', 'Disabled' ),
			'description' => __( 'Toggle the post details on or off.', 'ascension' )
		)
	);
	add_settings_field(
		'asc_entry_tags',
		__( 'Post Tags', 'ascension' ),
		'asc_settings_display_drop_down',
		'asc_post_display',
		'asc_post_display',
		array(
			'label_for'   => 'asc_entry_tags',
			'options'     => array( 'Enabled', 'Disabled' ),
			'description' => __( 'Toggle the post tags on or off.', 'ascension' )
		)
	);
	add_settings_field(
		'asc_custom_read_more',
		__( 'Custom Read More Text', 'ascension' ),
		'asc_settings_display_text_field',
		'asc_post_display',
		'asc_post_display',
		array(
			'label_for'   => 'asc_custom_read_more',
			'description' => __( 'Set custom text for the "Read More" link used in excerpts on archive pages.', 'ascension' )
		)
	);
	add_settings_field(
		'asc_page_title',
		__( 'Page Title', 'ascension' ),
		'asc_settings_display_drop_down',
		'asc_post_display',
		'asc_post_display',
		array(
			'label_for'   => 'asc_page_title',
			'options'     => array( 'Enabled', 'Disabled' ),
			'description' => __( 'Toggle the title on or off for the post type \'pages\'.', 'ascension' )
		)
	);
	add_settings_field(
		'asc_page_details',
		__( 'Page Details', 'ascension' ),
		'asc_settings_display_drop_down',
		'asc_post_display',
		'asc_post_display',
		array(
			'label_for'   => 'asc_page_details',
			'options'     => array( 'Enabled', 'Disabled' ),
			'description' => __( 'Toggle the details on or off for the post type \'pages\'.', 'ascension' )
		)
	);
	
	/**
	 * Advanced Settings
	 *
	 * Setting for advanced customization.
	 */
	add_settings_field(
		'asc_environment',
		__( 'Site Environment', 'ascension' ),
		'asc_settings_display_drop_down',
		'asc_advanced',
		'asc_advanced',
		array(
			'label_for'   => 'asc_environment',
			'options'     => array( 'Live', 'Dev' ),
			'description' => __( 'Declare the hosting environment type. This option is currently not used by the Ascension framework, but may be by child themes.', 'ascension' )
		)
	);
	add_settings_field(
		'asc_media_query_test',
		__( 'Media Query Test', 'ascension' ),
		'asc_settings_display_drop_down',
		'asc_advanced',
		'asc_advanced',
		array(
			'label_for'   => 'asc_media_query_test',
			'options'     => array( 'Enabled', 'Disabled' ),
			'description' => __( 'Toggle the media query indicator bar on or off.', 'ascension' )
		)
	);
	add_settings_field(
		'asc_custom_header_code',
		__( 'Custom Header Code', 'ascension' ),
		'asc_settings_display_text_area',
		'asc_advanced',
		'asc_advanced',
		array(
			'label_for'   => 'asc_custom_header_code',
			'description' => __( 'Add custom code into the bottom of the &lt;head&gt;.', 'ascension' )
		)
	);
	add_settings_field(
		'asc_custom_footer_code',
		__( 'Custom body Code', 'ascension' ),
		'asc_settings_display_text_area',
		'asc_advanced',
		'asc_advanced',
		array(
			'label_for'   => 'asc_custom_footer_code',
			'description' => __( 'Add custom code into the bottom of the &lt;footer&gt;.', 'ascension' )
		)
	);
}
add_action( 'admin_init', 'asc_theme_options' );


/**
 * Default Options
 *
 * Set and retrieve the default theme options.
 */

// Get the theme options with fallback defaults.
function asc_get_theme_options() {
	return get_option( 'asc_theme_options', asc_get_default_theme_options() );
}

// Get the default theme options.
function asc_get_default_theme_options() {
	// Build the default theme options.
	$default_theme_options = array(
		// Social Icons
		'asc_twitter_feed'               => 'https://twitter.com/CliffAscent',
		'asc_facebook_profile'           => '',
		'asc_youtube_page'               => '',
		'asc_rss_link'                   => '',
		'asc_header_socials'             => 'Yes',
		
		// Main Layout
		'asc_fullscreen_layout'          => 'Disabled',
		'asc_sitename_in_title'          => 'Enabled',
		'asc_scroll_to_top'              => 'Enabled',
		'asc_header_layout'              => 'Default',
		'asc_header_info'                => 'Enabled',
		'asc_header_title'               => '',
		'asc_header_text'                => '',
		'asc_main_nav'                   => 'Enabled',
		'asc_footer_credits'             => 'Disabled',
		
		// Sidebar Layout
		'asc_sidebar_layout'             => 'Right Sidebar',
		'asc_sidebar_home'               => 'Right Sidebar',
		'asc_sidebar_layout_category'    => 'Right Sidebar',
		'asc_sidebar_archive'            => 'Right Sidebar',
		'asc_sidebar_singular'           => 'Right Sidebar',
		'asc_sidebar_page'               => 'Right Sidebar',
		'asc_sidebar_search'             => 'Right Sidebar',
		'asc_sidebar_404'                => 'No Sidebars',
		'asc_sidebar_attachment'         => 'No Sidebars',
		
		// Post Display
		'asc_category_desc'              => 'Disabled',
		'asc_entry_details'              => 'Enabled',
		'asc_entry_tags'                 => 'Enabled',
		'asc_custom_read_more'           => '',
		'asc_page_title'                 => 'Enabled',
		'asc_page_details'               => 'Disabled',
		
		// Advanced
		'asc_environment'                => 'Live',
		'asc_media_query_test'           => 'Disabled',
		'asc_custom_header_code'         => '',
		'asc_custom_footer_code'         => ''
	);

	// Filter hook to change the default theme options.
	return apply_filters( 'asc_default_theme_options', $default_theme_options );
}


/**
 * Options Page
 *
 * Register and render the theme options page.
 */

// Add the theme options page under the appearance menu.
function asc_theme_options_add_page() {
	$page = add_theme_page(
		__( 'Theme Options', 'ascension' ),
		__( 'Theme Options', 'ascension' ),
		'edit_theme_options',
		'theme_options',
		'asc_theme_options_display_page'
	);
	add_action( 'admin_print_styles-' . $page, 'asc_theme_options_scripts' );
}
add_action( 'admin_menu', 'asc_theme_options_add_page' );

// Enqueue the theme options styles and scripts.
function asc_theme_options_scripts() {
	wp_enqueue_style( 'ascension-theme-options', ASC_TEMPLATE_DIR_URI . '/css/theme-options.css' );
	
	// Load enquire.js to run media queries in JavaScript for advanced functionality.
	wp_enqueue_script( 'enquire-js', ASC_TEMPLATE_DIR_URI . '/js/vendor/enquire.js', array(), '2.0.2', false );
	// Load the Ascension script.
	wp_enqueue_script( 'ascension', ASC_TEMPLATE_DIR_URI . '/js/ascension.js', array( 'jquery' ), ASC_SCRIPT_VERSION, false );
}

// Render the theme options page.
function asc_theme_options_display_page() {
	?>
	<div id="ascension-theme-options" class="wrap">
		<?php screen_icon(); ?>
		<?php $theme_name = wp_get_theme(); ?>
		<h2><?php printf( __( '%s Options', 'ascension' ), $theme_name ); ?></h2>
		<?php settings_errors(); ?>
		<br />
		<form id="theme-options-form" method="post" action="options.php">
			<?php
				// Store the child theme settings section output.
				ob_start();
				do_settings_sections( 'asc_child_theme' );
				$child_theme_settings = ob_get_contents();
				ob_end_clean();
				
				// If the output doesn't end with </h3> there are settings, so display them.
				if ( substr( $child_theme_settings, -6, 5 ) !== '</h3>' ) {
					echo $child_theme_settings;
					submit_button();
					echo '<hr /><br />';
				}

				do_settings_sections( 'asc_social_icons' );
				submit_button();
				echo '<hr /><br />';

				do_settings_sections( 'asc_main_layout' );
				submit_button();
				echo '<hr /><br />';

				do_settings_sections( 'asc_sidebar_layout' );
				submit_button();
				echo '<hr /><br />';

				do_settings_sections( 'asc_post_display' );
				submit_button();
				echo '<hr /><br />';

				do_settings_sections( 'asc_advanced' );
				submit_button();

				// Output nonce, action, and theme option fields.
				settings_fields( 'asc_theme_options' );
			?>
		</form>
	</div>
	<?php
	// Initiate the Ascension JavaScript.
	asc_init_script();
}

// Takes label_for and options arguments to create a drop down setting.
function asc_settings_display_drop_down() {
	global $asc_theme_options;
	global $asc_custom_options;
	
    $arg_list     = func_get_args();
	$option_name  = $arg_list[0]['label_for'];
	$option_value = $asc_theme_options[$option_name];
	$description  = $arg_list[0]['description'];
	$disabled     = '';
	
	// Check for and apply customizations to this option.
	if ( ! empty( $asc_custom_options ) ) {
		foreach ( $asc_custom_options as $option ) {
			if ( $option['option'] === $option_name ) {
				if ( $option['disabled'] === true ) {
					$disabled = 'disabled="disabled" ';
				}
				if ( ! empty( $option['value'] ) ) {
					$option_value = $option['value'];
				}
				if ( ! empty( $option['description'] ) ) {
					$description = $option['description'];
				}
			}
		}
	}
	
	if ( ! empty( $description ) ) {
		?>
			<span class="tip">
				<div class="tip-control"></div>
				<p class="tip-content">
					<?php echo $description; ?>
				</p>
			</span>&nbsp;
		<?php
	}
	
	echo '<select name="asc_theme_options[' . $option_name . ']" ' . $disabled . '>';
	foreach ( $arg_list[0]['options'] as $option ) {
		echo '<option value="' . $option . '" ' . selected( $option_value, $option ) . '>' . $option . '</option>';
	}
	echo '</select>';
}

// Takes label_for and options arguments to create a text field setting.
function asc_settings_display_text_field() {
	global $asc_theme_options;
	global $asc_custom_options;
	
    $arg_list = func_get_args();
	$option_name  = $arg_list[0]['label_for'];
	$option_value = $asc_theme_options[$option_name];
	$description  = $arg_list[0]['description'];
	$disabled     = '';
	
	// Check for and apply customizations to this option.
	if ( ! empty( $asc_custom_options ) ) {
		foreach ( $asc_custom_options as $option ) {
			if ( $option['option'] === $option_name ) {
				if ( $option['disabled'] === true ) {
					$disabled = 'disabled="disabled" ';
				}
				if ( ! empty( $option['value'] ) ) {
					$option_value = $option['value'];
				}
				if ( ! empty( $option['description'] ) ) {
					$description = $option['description'];
				}
			}
		}
	}
	
	if ( ! empty( $description ) ) {
		?>
			<span class="tip">
				<div class="tip-control"></div>
				<p class="tip-content">
					<?php echo $description; ?>
				</p>
			</span>&nbsp;
		<?php
	}
	
	echo '<input id="' . $option_name . '" name="asc_theme_options[' . $option_name . ']" type="text" value="' . $option_value . '" ' . $disabled . ' />';
}

// Takes label_for and options arguments to create a text field setting.
function asc_settings_display_text_area() {
	global $asc_theme_options;
	global $asc_custom_options;
	
    $arg_list     = func_get_args();
	$option_name  = $arg_list[0]['label_for'];
	$option_value = $asc_theme_options[$option_name];
	$description  = $arg_list[0]['description'];
	$disabled     = '';
	
	// Check for and apply customizations to this option.
	if ( ! empty( $asc_custom_options ) ) {
		foreach ( $asc_custom_options as $option ) {
			if ( $option['option'] === $option_name ) {
				if ( $option['disabled'] === true ) {
					$disabled = 'disabled="disabled" ';
				}
				if ( ! empty( $option['value'] ) ) {
					$option_value = $option['value'];
				}
				if ( ! empty( $option['description'] ) ) {
					$description = $option['description'];
				}
			}
		}
	}
	
	if ( ! empty( $description ) ) {
		?>
			<span class="tip">
				<div class="tip-control"></div>
				<p class="tip-content">
					<?php echo $description; ?>
				</p>
			</span>&nbsp;
		<?php
	}
	
	echo '<textarea id="' . $option_name . '" name="asc_theme_options[' . $option_name . ']" ' . $disabled . '>' . $option_value . '</textarea>';
}


/**
* Validation
*
* Validate user input for the theme options.
*/
function asc_theme_options_validate( $input ) { 
    $output = array();  

	// Loop through each option, sanitize the content then save it to the output.
    foreach( $input as $key => $value ) {   
        if( isset( $input[$key] ) ) {  
            $output[$key] = strip_tags( stripslashes( $input[ $key ] ) );  
        }
    }

	// Apply a filter to the return so it can be customized.
    return apply_filters( 'asc_theme_options_validated', $output, $input );
}
?>