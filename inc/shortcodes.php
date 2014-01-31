<?php
/**
 * Shortcodes
 *
 * Register the theme shortcodes.
 */


/**
 * Responsive dropdowns
 */
function asc_sc_respond_drop( $attr, $content ) {
	$attr = shortcode_atts( array(
		'drop_at'    => 'at-full',
		'icon_class' => 'dashicon-menu',
		'title'      => 'Menu'
	), $attr );
	
	return '<div class="drop ' . $attr['drop_at'] . '">
				<div class="drop-control">
					<h2 class="drop-title">
						<span class="icon ' . $attr['icon_class'] . '"></span> ' . $attr['title'] . '
					</h2>
				</div>
				<div class="drop-content">' . $content . '</div>
			</div>';
}
add_shortcode( 'asc-drop', 'asc_sc_respond_drop' );


/**
 * Tooltips
 */
function asc_sc_tooltip( $attr, $content ) {
	
	return '<span class="tip"><span class="tip-control"></span><span class="tip-content">' . $content . '</span></span>';
}
add_shortcode( 'asc-tooltip', 'asc_sc_tooltip' );


/**
 * Callout Boxes
 */
function asc_sc_callout( $attr, $content ) {
	return '<div class="callout">' . $content . '</div>';
}
add_shortcode( 'asc-callout', 'asc_sc_callout' );


/**
 * Blockquotes
 */
function asc_sc_blockquote( $attr, $content ) {
	$attr = shortcode_atts( array(
		'align' => ''
	), $attr );
	
	if ( $attr['align'] != '' ) {
		$attr['align'] = ' class="' . $attr['align'] . '"';
	}
	
	return '<blockquote' . $attr['align'] . '>' . $content . '</blockquote>';
}
add_shortcode( 'asc-quote', 'asc_sc_blockquote' );


/**
 * Highlight Text
 */
function asc_sc_highlight( $attr, $content ) {
	return '<span class="highlight">' . $content . '</span>';
}
add_shortcode( 'asc-highlight', 'asc_sc_highlight' );


/**
 * Strike Text
 */
function asc_sc_strike( $attr, $content ) {
	return '<span class="strike">' . $content . '</span>';
}
add_shortcode( 'asc-strike', 'asc_sc_strike' );


/**
 * Subheading
 */
function asc_sc_subheading( $attr, $content ) {
	$attr = shortcode_atts( array(
		'h' => '2'
	), $attr );
	
	return '<h' . $attr['h'] . ' class="subheading">' . $content . '</h' . $attr['h'] . '>';
}
add_shortcode( 'asc-subheading', 'asc_sc_subheading' );


/**
 * Notifications
 */
function asc_sc_notify( $attr, $content ) {
	$attr = shortcode_atts( array(
		'type' => 'warn'
	), $attr );
	
	return '<div class="notify ' . $attr['type'] . '">' . $content . '</div>';
}
add_shortcode( 'asc-notify', 'asc_sc_notify' );


/**
 * Grid example
 */
function asc_sc_grid_example( $attr, $content ) {
	// Store the template module.
	ob_start();
	get_template_part( 'templates/modules/grid-example' );
	$template = ob_get_contents();
	ob_end_clean();
	
	return $template;
}
add_shortcode( 'asc-grid', 'asc_sc_grid_example' );


/**
 * Style Guide
 */
function asc_sc_style_guide( $attr, $content ) {
	// Store the template module.
	ob_start();
	get_template_part( 'templates/modules/style-guide' );
	$template = ob_get_contents();
	ob_end_clean();
	
	return $template;
}
add_shortcode( 'asc-style-guide', 'asc_sc_style_guide' );
?>