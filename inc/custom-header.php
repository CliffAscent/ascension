<?php
/**
 * Custom Header
 *
 * Custom header options, styles, and setup.
 */


/**
 * Navigation Menu
 *
 * Header Options
 * Header Content
 * Header Styles
 * Admin Header Content
 * Admin Header Styles
 */


/**
 * Header Options
 *
 * Setup the custom header arguments.
 */
function asc_custom_header_setup() {
	global $asc_theme_options;

	if ( $asc_theme_options['asc_header_layout'] === 'banner' ) {
		$header_args = array(
			'default-image'          => ASC_TEMPLATE_DIR_URI . '/images/headers/luna.jpg',
			'header-text'            => true,
			'uploads'                => true,
			'default-text-color'     => '222',
			'flex-width'             => true,
			'flex-height'            => true,
			'random-default'         => false,
			'wp-head-callback'       => 'asc_header_style',
			'admin-head-callback'    => 'asc_admin_header_style',
			'admin-preview-callback' => 'asc_admin_header_image'
		);
	}

	else {
		$header_args = array(
			'default-image'          => ASC_TEMPLATE_DIR_URI . '/images/headers/aquarius.jpg',
			'header-text'            => true,
			'uploads'                => true,
			'default-text-color'     => '222',
			'flex-width'             => true,
			'flex-height'            => true,
			'random-default'         => false,
			'wp-head-callback'       => 'asc_header_style',
			'admin-head-callback'    => 'asc_admin_header_style',
			'admin-preview-callback' => 'asc_admin_header_image'
		);
	}

	// Filter hook to allow customization of the header arguments.
	$header_args = apply_filters( 'asc_custom_header_args', $header_args );
	add_theme_support( 'custom-header', $header_args );

	// Default custom headers packaged with the theme.
	if ( $asc_theme_options['asc_header_layout'] === 'banner' ) {
		$default_header_args = array(
			'luna' => array(
				'url'           => '%s/images/headers/luna.jpg',
				'thumbnail_url' => '%s/images/headers/luna-thumbnail.jpg',
				'description'   => __( 'Luna', 'ascension' )
			)
		);
	}
	else {
		$default_header_args = array(
			'aquarius' => array(
				'url'           => '%s/images/headers/aquarius.jpg',
				'thumbnail_url' => '%s/images/headers/aquarius.jpg',
				'description'   => __( 'Aquarius', 'ascension' )
			)
		);
	}
	
	register_default_headers( apply_filters( 'asc_custom_header_defaults', $default_header_args ) );
}
add_action( 'after_setup_theme', 'asc_custom_header_setup' );


/**
 * Header Content
 *
 * Load the selected header template.
 */
if ( ! function_exists( 'asc_get_header' ) ) :
function asc_get_header() {
	global $asc_theme_options;
	
	get_template_part( 'templates/headers/header', $asc_theme_options['asc_header_layout'] );
}
endif; // End asc_get_header()


/**
 * Header Styles
 *
 * Get the custom header options and output the proper styles into the head.
 */
if ( ! function_exists( 'asc_header_style' ) ) :
function asc_header_style() {
	// If no custom header text color is set, return nothing.
	if ( HEADER_TEXTCOLOR == get_header_textcolor() ) {
		return;
	}
	
	?>
		<style type="text/css">
			<?php /* If the header text is hidden, hide it. */ ?>
			<?php if ( 'blank' == get_header_textcolor() ) : ?>
				.site-title,
				.site-description {
					position: absolute !important;
					clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
					clip: rect(1px, 1px, 1px, 1px);
				}
			<?php /* Else use the custom header text color. */ ?>
			<?php else : ?>
				.site-title a,
				.site-description {
					color: #<?php echo get_header_textcolor(); ?>;
				}
			<?php endif; ?>
		</style>
	<?php
}
endif; // End asc_header_style()


/**
 * Admin Header Content
 *
 * Display the header image in the admin area.
 */
if ( ! function_exists( 'asc_admin_header_image' ) ) :
function asc_admin_header_image() { ?>
	<div id="headimg">
		<?php
			if ( 'blank' == get_header_textcolor() || '' == get_header_textcolor() ) {
				$style = ' style="display:none;"';
			}
			else {
				$style = ' style="color:#' . get_header_textcolor() . ';"';
			}
		?>
		
		<h1><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<div id="desc"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></div>
		
		<?php $header_image = get_header_image(); ?>
		<?php if ( ! empty( $header_image ) ) : ?>
			<img src="<?php echo esc_url( $header_image ); ?>" alt="" />
		<?php endif; ?>
	</div>
<?php }
endif; // End asc_admin_header_image()


/**
 * Admin Header Styles
 *
 * Style the header image in the admin area.
 */
if ( ! function_exists( 'asc_admin_header_style' ) ) :
function asc_admin_header_style() {
	?>
		<style type="text/css">
			img {
				max-width: 100%;
			}
			.appearance_page_custom-header #headimg {
				border: none;
			}
			#headimg h1,
			#desc {
				font-family: "Helvetica Neue", Arial, Helvetica, "Nimbus Sans L", sans-serif;
			}
			#headimg h1 {
				margin: 0;
			}
			#headimg h1 a {
				font-size: 32px;
				line-height: 36px;
				text-decoration: none;
			}
			#desc {
				font-size: 14px;
				line-height: 23px;
				padding: 0 0 3em;
			}
			<?php /* Output the custom color text if it's set. */ ?>
			<?php if ( get_header_textcolor() != HEADER_TEXTCOLOR ) : ?>
				#site-title a,
				#site-description {
					color: #<?php echo get_header_textcolor(); ?>;
				}
			<?php endif; ?>
			#headimg img {
				max-width: 100%;
				height: auto;
			}
		</style>
	<?php
}
endif; // End asc_admin_header_style()
?>