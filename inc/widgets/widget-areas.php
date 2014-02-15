<?php
require( ASC_TEMPLATE_DIR . '/inc/widgets/content-slider.php' );
require( ASC_TEMPLATE_DIR . '/inc/widgets/login-form.php' );

function asc_register_widgets() {
	register_widget( 'Asc_Content_Slider' );
    register_widget( 'Asc_Login_Form' );
}
add_action( 'widgets_init', 'asc_register_widgets' );


function asc_widget_areas() {
	global $asc_theme_options;
	
	register_sidebar( array(
		'name' => __( 'Right Sidebar', 'ascension' ),
		'id' => 'right-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="contain">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>'
	) );
	
	register_sidebar( array(
		'name' => __( 'Left Sidebar', 'ascension' ),
		'id' => 'left-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="contain">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>'
	) );
	
	if ( $asc_theme_options['asc_header_layout'] === 'widget' ) {
		register_sidebar( array(
			'name' => __( 'Header', 'ascension' ),
			'id' => 'header',
			'description' => __( 'This widget area is used as a custom header.', 'ascension' ),
			'before_widget' => '<div id="%1$s" class="header-widget clear %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h1 class="site-title"><a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" rel="home">',
			'after_title' => '</a></h1>'
		) );
	}
	
	register_sidebar( array(
		'name' => __( 'Main Slider', 'ascension' ),
		'id' => 'main-slider',
		'description' => __( 'Area for the main content slider just below the navigation.', 'ascension' ),
		'before_widget' => '<aside id="%1$s" class="%2$s"><div class="contain">',
		'after_widget' => '</div></aside>'
	) );
	
	register_sidebar( array(
		'name' => __( 'Posts Widgets', 'ascension' ),
		'id' => 'posts-widgets',
		'description' => __( 'Widgets added here can be added into your posts or pages by using the shortcode [asc-widget title="Widget Title"]', 'ascension' ),
		'before_widget' => '<aside id="%1$s" class="%2$s"><div class="contain">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>'
	) );
	
	register_sidebar( array(
		'name' => __( 'Top - Full Width', 'ascension' ),
		'id' => 'top-full',
		'description' => __( 'These widgets will fill the entire page width and stack vertically.', 'ascension' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="contain">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>'
	) );
	
	register_sidebar( array(
		'name' => __( 'Top - Half Width', 'ascension' ),
		'id' => 'top-halfs',
		'description' => __( 'These widgets will fill half of the page width and will re-stack when the screen width decreases.', 'ascension' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="contain">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>'
	) );
	
	register_sidebar( array(
		'name' => __( 'Top - Third Width', 'ascension' ),
		'id' => 'top-thirds',
		'description' => __( 'These widgets will fill a third of the page width and will re-stack when the screen width decreases.', 'ascension' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="contain">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>'
	) );
	
	register_sidebar( array(
		'name' => __( 'Top - Quarter Width', 'ascension' ),
		'id' => 'top-quarters',
		'description' => __( 'These widgets will fill a quarter of the page width and will re-stack when the screen width decreases.', 'ascension' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="contain">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>'
	) );
	
	register_sidebar( array(
		'name' => __( 'Content Top - Full Width', 'ascension' ),
		'id' => 'content-top-full',
		'description' => __( 'These widgets will fill the entire page width and stack vertically.', 'ascension' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="contain">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>'
	) );
	
	register_sidebar( array(
		'name' => __( 'Content Top - Half Width', 'ascension' ),
		'id' => 'content-top-halfs',
		'description' => __( 'These widgets will fill half of the page width and will re-stack when the screen width decreases.', 'ascension' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="contain">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>'
	) );
	
	register_sidebar( array(
		'name' => __( 'Content Top - Third Width', 'ascension' ),
		'id' => 'content-top-thirds',
		'description' => __( 'These widgets will fill a third of the page width and will re-stack when the screen width decreases.', 'ascension' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="contain">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>'
	) );
	
	register_sidebar( array(
		'name' => __( 'Content Top - Quarter Width', 'ascension' ),
		'id' => 'content-top-quarters',
		'description' => __( 'These widgets will fill a quarter of the page width and will re-stack when the screen width decreases.', 'ascension' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="contain">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>'
	) );
	
	register_sidebar( array(
		'name' => __( 'Content Bottom - Full Width', 'ascension' ),
		'id' => 'content-bottom-full',
		'description' => __( 'These widgets will fill the entire page width and stack vertically.', 'ascension' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="contain">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>'
	) );
	
	register_sidebar( array(
		'name' => __( 'Content Bottom - Half Width', 'ascension' ),
		'id' => 'content-bottom-halfs',
		'description' => __( 'These widgets will fill half of the page width and will re-stack when the screen width decreases.', 'ascension' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="contain">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>'
	) );
	
	register_sidebar( array(
		'name' => __( 'Content Bottom - Third Width', 'ascension' ),
		'id' => 'content-bottom-thirds',
		'description' => __( 'These widgets will fill a third of the page width and will re-stack when the screen width decreases.', 'ascension' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="contain">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>'
	) );
	
	register_sidebar( array(
		'name' => __( 'Content Bottom - Quarter Width', 'ascension' ),
		'id' => 'content-bottom-quarters',
		'description' => __( 'These widgets will fill a quarter of the page width and will re-stack when the screen width decreases.', 'ascension' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="contain">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>'
	) );
	
	register_sidebar( array(
		'name' => __( 'Bottom - Full Width', 'ascension' ),
		'id' => 'bottom-full',
		'description' => __( 'These widgets will fill the entire page width and stack vertically.', 'ascension' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="contain">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>'
	) );
	
	register_sidebar( array(
		'name' => __( 'Bottom - Half Width', 'ascension' ),
		'id' => 'bottom-halfs',
		'description' => __( 'These widgets will fill half of the page width and will re-stack when the screen width decreases.', 'ascension' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="contain">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>'
	) );
	
	register_sidebar( array(
		'name' => __( 'Bottom - Third Width', 'ascension' ),
		'id' => 'bottom-thirds',
		'description' => __( 'These widgets will fill a third of the page width and will re-stack when the screen width decreases.', 'ascension' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="contain">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>'
	) );
	
	register_sidebar( array(
		'name' => __( 'Bottom - Quarter Width', 'ascension' ),
		'id' => 'bottom-quarters',
		'description' => __( 'These widgets will fill a quarter of the page width and will re-stack when the screen width decreases.', 'ascension' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="contain">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>'
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer - Full Width', 'ascension' ),
		'id' => 'footer-full',
		'description' => __( 'These widgets will fill the entire page width and stack vertically.', 'ascension' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="contain">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>'
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer - Half Width', 'ascension' ),
		'id' => 'footer-halfs',
		'description' => __( 'These widgets will fill half of the page width and will re-stack when the screen width decreases.', 'ascension' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="contain">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>'
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer - Third Width', 'ascension' ),
		'id' => 'footer-thirds',
		'description' => __( 'These widgets will fill a third of the page width and will re-stack when the screen width decreases.', 'ascension' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="contain">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>'
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer - Quarter Width', 'ascension' ),
		'id' => 'footer-quarters',
		'description' => __( 'These widgets will fill a quarter of the page width and will re-stack when the screen width decreases.', 'ascension' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="contain">',
		'after_widget' => '</div></aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>'
	) );
}
add_action( 'widgets_init', 'asc_widget_areas' );
?>