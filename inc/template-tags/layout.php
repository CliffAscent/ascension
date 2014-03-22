<?php
/**
 * Main Navigation
 *
 * Determine the proper navigation template to use.
 *
 * @return mixed the navigation template string or bool false
 */
if ( ! function_exists( 'asc_get_nav_template' ) ) :
function asc_get_nav_template() {
	global $asc_theme_options;
	
	if ( ! defined( 'ASC_DISABLE_MAIN_NAV' ) && $asc_theme_options['asc_main_nav'] === 'true' ) {
		if ( defined( 'ASC_DROPPED_NAV' ) && ASC_DROPPED_NAV == true ) {
			return 'main-dropped';
		}
		else {
			return 'main';
		}
	}
	else {
		return false;
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
		<ul class="horizontal menu">
			<li class="menu-item"><a href="<?php echo esc_url( home_url() ); ?>"><?php _e( 'Home', 'ascension' ); ?></a></li>
			<li class="menu-item"><a href="<?php echo admin_url( 'nav-menus.php' ); ?>"><?php _e( 'Add a Custom Menu', 'ascension' ); ?></a></li>
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
		case 'left':
			$class .= ' ' . apply_filters( 'asc_main_content_left_sidebar', 'md-12 lg-8 lg-push-4' );
			echo $class;
			$content_width = 700;
			break;
			
		case 'right':
			$class .= ' ' . apply_filters( 'asc_main_content_right_sidebar', 'md-12 lg-8' );
			echo $class;
			$content_width = 700;
			break;
			
		case 'left-right':
			$class .= ' ' . apply_filters( 'asc_main_content_left_right_sidebar', 'md-12 lg-6 lg-push-3' );
			echo $class;
			$content_width = 500;
			break;
			
		case 'double-right':
			$class .= ' ' . apply_filters( 'asc_main_content_right_right_sidebar', 'md-12 lg-6' );
			echo $class;
			$content_width = 500;
			break;
			
		case 'double=left':
			$class .= ' ' . apply_filters( 'asc_main_content_left_left_sidebar', 'md-12 lg-6 lg-push-6' );
			echo $class;
			$content_width = 500;
			break;
			
		case 'none':
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
	
	if ( is_category() && ! is_home() && ! empty( $description ) && $asc_theme_options['asc_category_desc'] === 'true' ) {
		return $description;
	}
	else {
		return false;
	}
}
endif; // End asc_get_category_desc()
?>