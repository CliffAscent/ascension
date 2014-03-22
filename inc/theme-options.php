<?php
/**
 * Theme Options
 *
 * Create the theme options page and manage all of it's settings.
 */

class AscThemeOptions {

    public function __construct() {
		add_action( 'admin_init', array( $this, 'register' ) );
		add_action( 'admin_menu', array( $this, 'add_options_page' ) );
    }
	
	
	public function add_options_page() {
		$page = add_theme_page(
			__( 'Theme Options', 'ascension' ),
			__( 'Theme Options', 'ascension' ),
			'edit_theme_options',
			'theme_options',
			array( $this, 'display_options_page' )
		);
		add_action( 'admin_print_styles-' . $page, array( $this, 'scripts' ) );
	}
	
	
	public function scripts() {
		wp_enqueue_style( 'ascension-theme-options', ASC_TEMPLATE_DIR_URI . '/css/theme-options.css' );
		wp_enqueue_script( 'enquire-js', ASC_TEMPLATE_DIR_URI . '/js/vendor/enquire/enquire.js', array(), '2.0.2', false );
		wp_enqueue_script( 'ascension', ASC_TEMPLATE_DIR_URI . '/js/ascension.js', array( 'jquery' ), ASC_SCRIPT_VERSION, false );
	}
	
	
	public function display_options_page() {
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
	
	
	public function drop_down() {
		global $asc_custom_options;
		$arg_list = func_get_args();
		$option   = $arg_list[0];
		$name     = $option['label_for'];
		$args     = $this->option_args( $option );
		$value    = $args['value'];
		$desc     = $args['desc'];
		$disabled = $args['disabled'];
		$html     = '';
		
		$html .= $this->option_desc( $desc );
		$html .= '
			<select name="asc_theme_options[' . $name . ']" ' . $disabled . '>
		';
		foreach ( $option['options'] as $opt ) {
			$html .= '<option value="' . $opt['value'] . '" ' . selected( $value, $opt['value'], false ) . '>' . $opt['name'] . '</option>';
		}
		$html .= '</select>';
		
		echo $html;
	}

	
	public function text_field() {
		global $asc_custom_options;
		$arg_list = func_get_args();
		$option   = $arg_list[0];
		$name     = $option['label_for'];
		$args     = $this->option_args( $option );
		$value    = $args['value'];
		$desc     = $args['desc'];
		$disabled = $args['disabled'];
		$html     = '';
		
		$html .= $this->option_desc( $desc );
		$html .= '<input id="' . $name . '" name="asc_theme_options[' . $name . ']" type="text" value="' . $value . '" ' . $disabled . ' />';
		
		echo $html;
	}

	
	public function text_area() {
		global $asc_custom_options;
		$arg_list = func_get_args();
		$option   = $arg_list[0];
		$name     = $option['label_for'];
		$args     = $this->option_args( $option );
		$value    = $args['value'];
		$desc     = $args['desc'];
		$disabled = $args['disabled'];
		$html     = '';
		
		$html .= $this->option_desc( $desc );
		$html .= '<textarea id="' . $name . '" name="asc_theme_options[' . $name . ']" ' . $disabled . '>' . $value . '</textarea>';
		
		echo $html;
	}
	
	
	public function option_args( $option ) {
		global $asc_theme_options;
		global $asc_custom_options;
		$name     = $option['label_for'];
		$value    = $asc_theme_options[$name];
		$desc     = $option['desc'];
		$disabled = false;
		
		// Check for and apply customizations to this option.
		if ( ! empty( $asc_custom_options ) ) {
			foreach ( $asc_custom_options as $custom_option ) {
				if ( $custom_option['name'] === $name ) {
					if ( $custom_option['disabled'] === true ) {
						$disabled = 'disabled="disabled" ';
					}
					if ( ! empty( $custom_option['value'] ) ) {
						$value = $custom_option['value'];
					}
					if ( ! empty( $custom_option['desc'] ) ) {
						$desc = $custom_option['desc'];
					}
				}
			}
		}
		
		return array( 'value' => $value, 'desc' => $desc, 'disabled' => $disabled );
	}
	
	
	public function option_desc( $desc ) {
		if ( ! empty( $desc ) ) {
			$html = '
				<span class="tip">
					<div class="tip-control"></div>
					<p class="tip-content">
						' . $desc . '
					</p>
				</span>&nbsp;
			';
			
			return $html;
		}
		else {
			return false;
		}
	}
	

	public function get_options() {
		return get_option( 'asc_theme_options', $this->get_default_options() );
	}

	
	public function get_default_options() {
		// Build the default theme options.
		$defaults = array(
			// Social Icons
			'asc_twitter_feed'               => 'https://twitter.com/CliffAscent',
			'asc_facebook_profile'           => '',
			'asc_youtube_page'               => '',
			'asc_rss_link'                   => '',
			'asc_header_socials'             => 'true',
			
			// Main Layout
			'asc_fullscreen_layout'          => 'false',
			'asc_sitename_in_title'          => 'true',
			'asc_scroll_to_top'              => 'true',
			'asc_header_layout'              => 'default',
			'asc_header_info'                => 'true',
			'asc_header_title'               => '',
			'asc_header_text'                => '',
			'asc_main_nav'                   => 'true',
			'asc_footer_credits'             => 'false',
			
			// Sidebar Layout
			'asc_sidebar_layout'             => 'right',
			'asc_sidebar_home'               => 'right',
			'asc_sidebar_layout_category'    => 'right',
			'asc_sidebar_archive'            => 'right',
			'asc_sidebar_singular'           => 'right',
			'asc_sidebar_page'               => 'right',
			'asc_sidebar_search'             => 'right',
			'asc_sidebar_404'                => 'none',
			'asc_sidebar_attachment'         => 'none',
			
			// Post Display
			'asc_category_desc'              => 'false',
			'asc_entry_details'              => 'true',
			'asc_entry_tags'                 => 'true',
			'asc_custom_read_more'           => '',
			'asc_page_title'                 => 'true',
			'asc_page_details'               => 'false',
			
			// Advanced
			'asc_environment'                => 'live',
			'asc_media_query_test'           => 'false',
			'asc_custom_header_code'         => '',
			'asc_custom_footer_code'         => ''
		);

		// Filter hook to change the default theme options.
		return apply_filters( 'asc_default_theme_options', $defaults );
	}
	
	
	public function validate( $input ) {
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
	
	
	public function register() {
		// Register the theme settings.
		register_setting(
			'asc_theme_options',
			'asc_theme_options',
			array( $this, 'validate' )
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
			array( $this, 'text_field' ),
			'asc_social_icons',
			'asc_social_icons',
			array( 
				'label_for' => 'asc_twitter_feed',
				'desc'      => __( 'The address to your Twitter feed. If this field is blank the icon will not be displayed.', 'ascension' )
			)
		);
		add_settings_field(
			'asc_facebook_profile',
			__( 'Facebook Profile URL', 'ascension' ),
			array( $this, 'text_field' ),
			'asc_social_icons',
			'asc_social_icons',
			array(
				'label_for' => 'asc_facebook_profile',
				'desc'      => __( 'The address to your Facebook profile. If this field is blank the icon will not be displayed.', 'ascension' ) 
			)
		);
		add_settings_field(
			'asc_youtube_page',
			__( 'YouTube Page URL', 'ascension' ),
			array( $this, 'text_field' ),
			'asc_social_icons',
			'asc_social_icons',
			array(
				'label_for' => 'asc_youtube_page',
				'desc'      => __( 'The address to your YouTube page. If this field is blank the icon will not be displayed.', 'ascension' )
			)
		);
		add_settings_field(
			'asc_rss_link',
			__( 'RSS Feed URL', 'ascension' ),
			array( $this, 'text_field' ),
			'asc_social_icons',
			'asc_social_icons',
			array(
				'label_for' => 'asc_rss_link',
				'desc'      => __( 'The address to your RSS feed. If this field is blank the icon will not be displayed.', 'ascension' )
			)
		);
		add_settings_field(
			'asc_header_socials',
			__( 'Show in the Header', 'ascension' ),
			array( $this, 'drop_down' ),
			'asc_social_icons',
			'asc_social_icons',
			array(
				'label_for' => 'asc_header_socials',
				'desc'      => __( 'Select "Yes" to show the activated social icons in the header.', 'ascension' ),
				'options'   => array( 
					array( 'value' => 'true',  'name' => __( 'Yes', 'ascension' ) ),
					array( 'value' => 'false', 'name' => __( 'No', 'ascension' ) )
				)
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
			array( $this, 'drop_down' ),
			'asc_main_layout',
			'asc_main_layout',
			array(
				'label_for' => 'asc_fullscreen_layout',
				'desc'      => __( 'Enable this option to allow the layout to fill 100% of the browsers width instead of the default 1200px maximum.', 'ascension' ),
				'options'   => array(
					array( 'value' => 'true',  'name' => __( 'Enabled', 'ascension' ) ),
					array( 'value' => 'false', 'name' => __( 'Disabled', 'ascension' ) )
				)
			)
		);
		add_settings_field(
			'asc_sitename_in_title',
			__( 'Site Name in Page Title', 'ascension' ),
			array( $this, 'drop_down' ),
			'asc_main_layout',
			'asc_main_layout',
			array(
				'label_for' => 'asc_sitename_in_title',
				'desc'      => __( 'Enabled this option to add the Site Title into the web page &lt;title&gt; (effects bookmarks and browser tab titles). Some SEO plugin\'s will already do this, in which case you should Disabled this option.', 'ascension' ),
				'options'   => array(
					array( 'value' => 'true',  'name' => __( 'Enabled', 'ascension' ) ),
					array( 'value' => 'false', 'name' => __( 'Disabled', 'ascension' ) )
				)
			)
		);
		add_settings_field(
			'asc_scroll_to_top',
			__( 'Scroll to Top Box', 'ascension' ),
			array( $this, 'drop_down' ),
			'asc_main_layout',
			'asc_main_layout',
			array(
				'label_for' => 'asc_scroll_to_top',
				'desc'      => __( 'Enabled this option to display a scroll to top box when a user scrolls down on a page.', 'ascension' ),
				'options'   => array(
					array( 'value' => 'true',  'name' => __( 'Enabled', 'ascension' ) ),
					array( 'value' => 'false', 'name' => __( 'Disabled', 'ascension' ) )
				)
			)
		);
		add_settings_field(
			'asc_header_layout',
			__( 'Header Layout', 'ascension' ),
			array( $this, 'drop_down' ),
			'asc_main_layout',
			'asc_main_layout',
			array(
				'label_for' => 'asc_header_layout',
				'desc'      => __( 'Select the header layout type. The Banner Image option displays an image at 100% width, and the Widget option activates a widget area to add a custom header widget.', 'ascension' ),
				'options'   => apply_filters( 'asc_header_layout_options',
					array(
						array( 'value' => 'default', 'name' => __( 'Default', 'ascension' ) ),
						array( 'value' => 'banner',  'name' => __( 'Banner Image', 'ascension' ) ),
						array( 'value' => 'widget',  'name' => __( 'Widget', 'ascension' ) )
					)
				)
			)
		);
		add_settings_field(
			'asc_header_info',
			__( 'Header Title and Text', 'ascension' ),
			array( $this, 'drop_down' ),
			'asc_main_layout',
			'asc_main_layout',
			array(
				'label_for' => 'asc_header_info',
				'desc'      => __( 'Toggle the header title and description area on or off.', 'ascension' ),
				'options'   => array(
					array( 'value' => 'true',  'name' => __( 'Enabled', 'ascension' ) ),
					array( 'value' => 'false', 'name' => __( 'Disabled', 'ascension' ) )
				)
			)
		);
		add_settings_field(
			'asc_header_title',
			__( 'Custom Header Title', 'ascension' ),
			array( $this, 'text_field' ),
			'asc_main_layout',
			'asc_main_layout',
			array(
				'label_for' => 'asc_header_title',
				'desc'      => __( 'Set a custom header title to use instead of the Site Title in the general settings.', 'ascension' )
			)
		);
		add_settings_field(
			'asc_header_text',
			__( 'Custom Header Text', 'ascension' ),
			array( $this, 'text_area' ),
			'asc_main_layout',
			'asc_main_layout',
			array(
				'label_for' => 'asc_header_text',
				'desc'      => __( 'Set a custom header description to use instead of the Tagline in the general settings.', 'ascension' )
			)
		);
		add_settings_field(
			'asc_main_nav',
			__( 'Main Navigation', 'ascension' ),
			array( $this, 'drop_down' ),
			'asc_main_layout',
			'asc_main_layout',
			array(
				'label_for' => 'asc_main_nav',
				'desc'      => __( 'Toggle the main navigation area on or off.', 'ascension' ),
				'options'   => array(
					array( 'value' => 'true',  'name' => __( 'Enabled', 'ascension' ) ),
					array( 'value' => 'false', 'name' => __( 'Disabled', 'ascension' ) )
				)
			)
		);
		add_settings_field(
			'asc_footer_credits',
			__( 'Footer Credits', 'ascension' ),
			array( $this, 'drop_down' ),
			'asc_main_layout',
			'asc_main_layout',
			array(
				'label_for' => 'asc_footer_credits',
				'desc'      => __( 'Toggle the Ascension footer credits on or off. Please support Ascension and Enable this option or make a contribution towards the development of Ascension.', 'ascension' ),
				'options'   => array(
					array( 'value' => 'true',  'name' => __( 'Enabled', 'ascension' ) ),
					array( 'value' => 'false', 'name' => __( 'Disabled', 'ascension' ) )
				)
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
			array( $this, 'drop_down' ),
			'asc_sidebar_layout',
			'asc_sidebar_layout',
			array(
				'label_for' => 'asc_sidebar_layout',
				'options'     => array( 'Right Sidebar', 'Left Sidebar', 'Left and Right Sidebars', 'Double Right Sidebars', 'Double Left Sidebars', 'No Sidebars' ),
				'desc'      => __( 'The default sidebar layout used as a fallback for pages that don\'t fall into any other sidebar layout category.', 'ascension' ),
				'options'   => apply_filters( 'asc_sidebar_layout_options',
					array(
						array( 'value' => 'right',        'name' => __( 'Right Sidebar', 'ascension' ) ),
						array( 'value' => 'left',         'name' => __( 'Left Sidebar', 'ascension' ) ),
						array( 'value' => 'left-right',   'name' => __( 'Left and Right Sidebars', 'ascension' ) ),
						array( 'value' => 'double-right', 'name' => __( 'Double Right Sidebars', 'ascension' ) ),
						array( 'value' => 'double-left',  'name' => __( 'Double Left Sidebars', 'ascension' ) ),
						array( 'value' => 'none',         'name' => __( 'No Sidebars', 'ascension' ) )
					)
				)
			)
		);
		add_settings_field(
			'asc_sidebar_home',
			__( 'Home Sidebar Layout', 'ascension' ),
			array( $this, 'drop_down' ),
			'asc_sidebar_layout',
			'asc_sidebar_layout',
			array(
				'label_for' => 'asc_sidebar_home',
				'desc'      => __( 'The sidebar layout used on the home page of the site.', 'ascension' ),
				'options'   => apply_filters( 'asc_sidebar_layout_options',
					array(
						array( 'value' => 'right',        'name' => __( 'Right Sidebar', 'ascension' ) ),
						array( 'value' => 'left',         'name' => __( 'Left Sidebar', 'ascension' ) ),
						array( 'value' => 'left-right',   'name' => __( 'Left and Right Sidebars', 'ascension' ) ),
						array( 'value' => 'double-right', 'name' => __( 'Double Right Sidebars', 'ascension' ) ),
						array( 'value' => 'double-left',  'name' => __( 'Double Left Sidebars', 'ascension' ) ),
						array( 'value' => 'none',         'name' => __( 'No Sidebars', 'ascension' ) )
					)
				)
			)
		);
		add_settings_field(
			'asc_sidebar_archive',
			__( 'Archive Sidebar Layout', 'ascension' ),
			array( $this, 'drop_down' ),
			'asc_sidebar_layout',
			'asc_sidebar_layout',
			array(
				'label_for' => 'asc_sidebar_archive',
				'desc'      => __( 'The sidebar layout used for archive and category pages.', 'ascension' ),
				'options'   => apply_filters( 'asc_sidebar_layout_options',
					array(
						array( 'value' => 'right',        'name' => __( 'Right Sidebar', 'ascension' ) ),
						array( 'value' => 'left',         'name' => __( 'Left Sidebar', 'ascension' ) ),
						array( 'value' => 'left-right',   'name' => __( 'Left and Right Sidebars', 'ascension' ) ),
						array( 'value' => 'double-right', 'name' => __( 'Double Right Sidebars', 'ascension' ) ),
						array( 'value' => 'double-left',  'name' => __( 'Double Left Sidebars', 'ascension' ) ),
						array( 'value' => 'none',         'name' => __( 'No Sidebars', 'ascension' ) )
					)
				)
			)
		);
		add_settings_field(
			'asc_sidebar_singular',
			__( 'Singular Sidebar Layout', 'ascension' ),
			array( $this, 'drop_down' ),
			'asc_sidebar_layout',
			'asc_sidebar_layout',
			array(
				'label_for' => 'asc_sidebar_singular',
				'desc'      => __( 'The sidebar layout used for a single post, not counting the post type \'pages\'.', 'ascension' ),
				'options'   => apply_filters( 'asc_sidebar_layout_options',
					array(
						array( 'value' => 'right',        'name' => __( 'Right Sidebar', 'ascension' ) ),
						array( 'value' => 'left',         'name' => __( 'Left Sidebar', 'ascension' ) ),
						array( 'value' => 'left-right',   'name' => __( 'Left and Right Sidebars', 'ascension' ) ),
						array( 'value' => 'double-right', 'name' => __( 'Double Right Sidebars', 'ascension' ) ),
						array( 'value' => 'double-left',  'name' => __( 'Double Left Sidebars', 'ascension' ) ),
						array( 'value' => 'none',         'name' => __( 'No Sidebars', 'ascension' ) )
					)
				)
			)
		);
		add_settings_field(
			'asc_sidebar_page',
			__( 'Page Sidebar Layout', 'ascension' ),
			array( $this, 'drop_down' ),
			'asc_sidebar_layout',
			'asc_sidebar_layout',
			array(
				'label_for' => 'asc_sidebar_page',
				'desc'      => __( 'The sidebar layout used for single pages of the post type \'pages\'.', 'ascension' ),
				'options'   => apply_filters( 'asc_sidebar_layout_options',
					array(
						array( 'value' => 'right',        'name' => __( 'Right Sidebar', 'ascension' ) ),
						array( 'value' => 'left',         'name' => __( 'Left Sidebar', 'ascension' ) ),
						array( 'value' => 'left-right',   'name' => __( 'Left and Right Sidebars', 'ascension' ) ),
						array( 'value' => 'double-right', 'name' => __( 'Double Right Sidebars', 'ascension' ) ),
						array( 'value' => 'double-left',  'name' => __( 'Double Left Sidebars', 'ascension' ) ),
						array( 'value' => 'none',         'name' => __( 'No Sidebars', 'ascension' ) )
					)
				)
			)
		);
		add_settings_field(
			'asc_sidebar_search',
			__( 'Search Sidebar Layout', 'ascension' ),
			array( $this, 'drop_down' ),
			'asc_sidebar_layout',
			'asc_sidebar_layout',
			array(
				'label_for' => 'asc_sidebar_search',
				'desc'      => __( 'The sidebar layout used for the search page.', 'ascension' ),
				'options'   => apply_filters( 'asc_sidebar_layout_options',
					array(
						array( 'value' => 'right',        'name' => __( 'Right Sidebar', 'ascension' ) ),
						array( 'value' => 'left',         'name' => __( 'Left Sidebar', 'ascension' ) ),
						array( 'value' => 'left-right',   'name' => __( 'Left and Right Sidebars', 'ascension' ) ),
						array( 'value' => 'double-right', 'name' => __( 'Double Right Sidebars', 'ascension' ) ),
						array( 'value' => 'double-left',  'name' => __( 'Double Left Sidebars', 'ascension' ) ),
						array( 'value' => 'none',         'name' => __( 'No Sidebars', 'ascension' ) )
					)
				)
			)
		);
		add_settings_field(
			'asc_sidebar_404',
			__( 'Not Found Sidebar Layout', 'ascension' ),
			array( $this, 'drop_down' ),
			'asc_sidebar_layout',
			'asc_sidebar_layout',
			array(
				'label_for' => 'asc_sidebar_404',
				'desc'      => __( 'The sidebar layout used when an invalid page is requested.', 'ascension' ),
				'options'   => apply_filters( 'asc_sidebar_layout_options',
					array(
						array( 'value' => 'right',        'name' => __( 'Right Sidebar', 'ascension' ) ),
						array( 'value' => 'left',         'name' => __( 'Left Sidebar', 'ascension' ) ),
						array( 'value' => 'left-right',   'name' => __( 'Left and Right Sidebars', 'ascension' ) ),
						array( 'value' => 'double-right', 'name' => __( 'Double Right Sidebars', 'ascension' ) ),
						array( 'value' => 'double-left',  'name' => __( 'Double Left Sidebars', 'ascension' ) ),
						array( 'value' => 'none',         'name' => __( 'No Sidebars', 'ascension' ) )
					)
				)
			)
		);
		add_settings_field(
			'asc_sidebar_attachment',
			__( 'Attachment Sidebar Layout', 'ascension' ),
			array( $this, 'drop_down' ),
			'asc_sidebar_layout',
			'asc_sidebar_layout',
			array(
				'label_for' => 'asc_sidebar_attachment',
				'desc'      => __( 'The sidebar layout used for attachment pages.', 'ascension' ),
				'options'   => apply_filters( 'asc_sidebar_layout_options',
					array(
						array( 'value' => 'right',        'name' => __( 'Right Sidebar', 'ascension' ) ),
						array( 'value' => 'left',         'name' => __( 'Left Sidebar', 'ascension' ) ),
						array( 'value' => 'left-right',   'name' => __( 'Left and Right Sidebars', 'ascension' ) ),
						array( 'value' => 'double-right', 'name' => __( 'Double Right Sidebars', 'ascension' ) ),
						array( 'value' => 'double-left',  'name' => __( 'Double Left Sidebars', 'ascension' ) ),
						array( 'value' => 'none',         'name' => __( 'No Sidebars', 'ascension' ) )
					)
				)
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
			array( $this, 'drop_down' ),
			'asc_post_display',
			'asc_post_display',
			array(
				'label_for' => 'asc_category_desc',
				'desc'      => __( 'Enable this option to display the category description, if set, in the category archive page.', 'ascension' ),
				'options'   => array(
					array( 'value' => 'true',  'name' => __( 'Enabled', 'ascension' ) ),
					array( 'value' => 'false', 'name' => __( 'Disabled', 'ascension' ) )
				)
			)
		);
		add_settings_field(
			'asc_entry_details',
			__( 'Post Details', 'ascension' ),
			array( $this, 'drop_down' ),
			'asc_post_display',
			'asc_post_display',
			array(
				'label_for' => 'asc_entry_details',
				'desc'      => __( 'Toggle the post details on or off.', 'ascension' ),
				'options'   => array(
					array( 'value' => 'true',  'name' => __( 'Enabled', 'ascension' ) ),
					array( 'value' => 'false', 'name' => __( 'Disabled', 'ascension' ) )
				)
			)
		);
		add_settings_field(
			'asc_entry_tags',
			__( 'Post Tags', 'ascension' ),
			array( $this, 'drop_down' ),
			'asc_post_display',
			'asc_post_display',
			array(
				'label_for' => 'asc_entry_tags',
				'desc'      => __( 'Toggle the post tags on or off.', 'ascension' ),
				'options'   => array(
					array( 'value' => 'true',  'name' => __( 'Enabled', 'ascension' ) ),
					array( 'value' => 'false', 'name' => __( 'Disabled', 'ascension' ) )
				)
			)
		);
		add_settings_field(
			'asc_custom_read_more',
			__( 'Custom Read More Text', 'ascension' ),
			array( $this, 'text_field' ),
			'asc_post_display',
			'asc_post_display',
			array(
				'label_for' => 'asc_custom_read_more',
				'desc'      => __( 'Set custom text for the "Read More" link used in excerpts on archive pages.', 'ascension' )
			)
		);
		add_settings_field(
			'asc_page_title',
			__( 'Page Title', 'ascension' ),
			array( $this, 'drop_down' ),
			'asc_post_display',
			'asc_post_display',
			array(
				'label_for' => 'asc_page_title',
				'desc'      => __( 'Toggle the title on or off for the post type \'pages\'.', 'ascension' ),
				'options'   => array(
					array( 'value' => 'true',  'name' => __( 'Enabled', 'ascension' ) ),
					array( 'value' => 'false', 'name' => __( 'Disabled', 'ascension' ) )
				)
			)
		);
		add_settings_field(
			'asc_page_details',
			__( 'Page Details', 'ascension' ),
			array( $this, 'drop_down' ),
			'asc_post_display',
			'asc_post_display',
			array(
				'label_for' => 'asc_page_details',
				'desc'      => __( 'Toggle the details on or off for the post type \'pages\'.', 'ascension' ),
				'options'   => array(
					array( 'value' => 'true',  'name' => __( 'Enabled', 'ascension' ) ),
					array( 'value' => 'false', 'name' => __( 'Disabled', 'ascension' ) )
				)
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
			array( $this, 'drop_down' ),
			'asc_advanced',
			'asc_advanced',
			array(
				'label_for' => 'asc_environment',
				'desc'      => __( 'Declare the hosting environment type. This option is currently not used by the Ascension framework, but may be by child themes.', 'ascension' ),
				'options'   => apply_filters( 'asc_environment_options',
					array(
						array( 'value' => 'live', 'name' => __( 'Live', 'ascension' ) ),
						array( 'value' => 'dev',  'name' => __( 'Development', 'ascension' ) )
					)
				)
			)
		);
		add_settings_field(
			'asc_media_query_test',
			__( 'Media Query Test', 'ascension' ),
			array( $this, 'drop_down' ),
			'asc_advanced',
			'asc_advanced',
			array(
				'label_for' => 'asc_media_query_test',
				'desc'      => __( 'Toggle the media query indicator bar on or off.', 'ascension' ),
				'options'   => array(
					array( 'value' => 'true',  'name' => __( 'Enabled', 'ascension' ) ),
					array( 'value' => 'false', 'name' => __( 'Disabled', 'ascension' ) )
				)
			)
		);
		add_settings_field(
			'asc_custom_header_code',
			__( 'Custom Header Code', 'ascension' ),
			array( $this, 'text_area' ),
			'asc_advanced',
			'asc_advanced',
			array(
				'label_for' => 'asc_custom_header_code',
				'desc'      => __( 'Add custom code into the bottom of the &lt;head&gt;.', 'ascension' )
			)
		);
		add_settings_field(
			'asc_custom_footer_code',
			__( 'Custom body Code', 'ascension' ),
			array( $this, 'text_area' ),
			'asc_advanced',
			'asc_advanced',
			array(
				'label_for' => 'asc_custom_footer_code',
				'desc'      => __( 'Add custom code into the bottom of the &lt;footer&gt;.', 'ascension' )
			)
		);
	}
}