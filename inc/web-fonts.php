<?php
/**
 * Webfonts
 *
 * Loads custom web fonts from any of a wide range of font vendors.
 */
function asc_webfonts( $vendor, $fonts, $args = '' ) {
	$GLOBALS['webfont_fonts'] = $fonts;
	$GLOBALS['webfont_args']  = $args;
	
	// Load the web font loader script.
	function asc_webfont_script() {
		wp_enqueue_script( 'webfont-js', ASC_TEMPLATE_DIR_URI . '/js/vendor/webfontloader-min/webfont.js', array( 'ascension' ), '1.5', false );
	}
	add_action( 'wp_enqueue_scripts', 'asc_webfont_script' );
	
	switch ( $vendor ) {
		case 'google' :
			function asc_webfont_args() {
				global $webfont_fonts;
				global $webfont_args;
				
				wp_localize_script( 'webfont-js', 'googleFontFamilies', $webfont_fonts );
				
				if ( ! empty( $webfont_args ) ) {
					wp_localize_script( 'webfont-js', 'googleFontText', $webfont_args );
				}
			}
			add_action( 'wp_enqueue_scripts', 'asc_webfont_args' );
			
			// Initiate the Web Font Loader JavaScript object.
			function asc_init_webfont() {
				global $webfont_args;
				
				?>
					<script type="text/javascript">
						WebFont.load( {
							google: {
								families : googleFontFamilies,
								<?php if ( ! empty( $webfont_args ) ) : ?>
									text     : googleFontText
								<?php endif; ?>
							}
						} );
					</script>
				<?php
			}
			add_action( 'wp_head', 'asc_init_webfont', 99 );
			
			break;
		
		case 'fontdeck' :
			function asc_webfont_args() {
				global $webfont_fonts;
				wp_localize_script( 'webfont-js', 'fontDeckId', $webfont_fonts );
			}
			add_action( 'wp_enqueue_scripts', 'asc_webfont_args' );
			
			// Initiate the Web Font Loader JavaScript object.
			function asc_init_webfont() {
				?>
					<script type="text/javascript">
						WebFont.load( {
							fontdeck: {
								id : fontDeckId
							}
						} );
					</script>
				<?php
			}
			add_action( 'wp_head', 'asc_init_webfont', 99 );
			
			break;
		
		case 'typekit' :
			function asc_webfont_args() {
				global $webfont_fonts;
				wp_localize_script( 'webfont-js', 'typeKitId', $webfont_fonts );
			}
			add_action( 'wp_enqueue_scripts', 'asc_webfont_args' );
			
			// Initiate the Web Font Loader JavaScript object.
			function asc_init_webfont() {
				?>
					<script type="text/javascript">
						WebFont.load( {
							typekit: {
								id : typeKitId
							}
						} );
					</script>
				<?php
			}
			add_action( 'wp_head', 'asc_init_webfont', 99 );
			
			break;
		
		case 'fontscom' :
			function asc_webfont_args() {
				global $webfont_fonts;
				global $webfont_args;
				
				wp_localize_script( 'webfont-js', 'fontsComId', $webfont_fonts );
				
				if ( ! empty( $webfont_args ) ) {
					wp_localize_script( 'webfont-js', 'fontsComVersion', $webfont_args );
				}
			}
			add_action( 'wp_enqueue_scripts', 'asc_webfont_args' );
			
			// Initiate the Web Font Loader JavaScript object.
			function asc_init_webfont() {
				global $webfont_args;
				
				?>
					<script type="text/javascript">
						WebFont.load( {
							monotype: {
								projectId : fontsComId,
								<?php if ( ! empty( $webfont_args ) ) : ?>
									version : fontsComVersion
								<?php endif; ?>
							}
						} );
					</script>
				<?php
			}
			add_action( 'wp_head', 'asc_init_webfont', 99 );
			
			break;
		
		case 'custom' :
			function asc_webfont_args() {
				global $webfont_fonts;
				global $webfont_args;
				
				wp_localize_script( 'webfont-js', 'customFontFamilies', $webfont_fonts );
				
				if ( ! empty( $webfont_args ) ) {
					wp_localize_script( 'webfont-js', 'customFontUrls', $webfont_args );
				}
			}
			add_action( 'wp_enqueue_scripts', 'asc_webfont_args' );
			
			// Initiate the Web Font Loader JavaScript object.
			function asc_init_webfont() {
				global $webfont_args;
				
				?>
					<script type="text/javascript">
						WebFont.load( {
							custom: {
								families : customFontFamilies,
								<?php if ( ! empty( $webfont_args ) ) : ?>
									urls : customFontUrls
								<?php endif; ?>
							}
						} );
					</script>
				<?php
			}
			add_action( 'wp_head', 'asc_init_webfont', 99 );
			
			break;
	}
}
?>