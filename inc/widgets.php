<?php
/**
 * Widgets
 *
 * Register the theme widgets.
 */


/**
 * Navigation Menu
 *
 * Register Widgets
 * Content Slider
 * Login Form
 */


/**
 * Register Widgets
 *
 * Register the Ascension widgets.
 */
function asc_register_widgets() {
	register_widget( 'Asc_Content_Slider' );
    register_widget( 'Asc_Login_Form' );
}
add_action( 'widgets_init', 'asc_register_widgets' );



/**
 * Content Slider
 */
class Asc_Content_Slider extends WP_Widget {
	// Setup the widget.
	public function __construct() {
		parent::__construct(
			'asc_content_slider',
			__( 'Content Slider', 'ascension' ),
			array( 
				'classname' => 'content-slider',
				'description' => __( 'Creates a content slider using the designated posts.', 'ascension' )
			)
		);
	}

	// Front-end widget content.
	public function widget( $args, $instance ) {
		global $wp_query;
		$count      = 5;
		$query_args = array();
		
		// Load the flex slider script.
		wp_enqueue_script( 'flex-slider', ASC_TEMPLATE_DIR_URI . '/js/vendor/flexslider/jquery.flexslider-min.js', array( 'jquery', 'ascension' ), '2.2.0', true );
		
		// Initiate the slider.
		?>
			<script type="text/javascript">
				jQuery( function() { Ascension.slider( '#<?php echo $args['widget_id']; ?> .slider', '<?php echo apply_filters( 'asc_slider_prev_icon', '<span></span>' ); ?>', '<?php echo apply_filters( 'asc_slider_next_icon', '<span></span>' ); ?>' ) } );
			</script>
		<?php
		
		// Load the selected options.
		if ( ! empty( $instance['count'] ) ) {
			$count = $instance['count'];
		}
		
		// Setup the post query to pull in the slider content.
		if ( $instance['query'] === 'activated' ) {
			$query_args = array(
				'posts_per_page'      => $count,
				'ignore_sticky_posts' => true,
				'meta_query'          => array(
					array(
						'key'     => '_slider_image_id',
						'value'   => '0',
						'compare' => '>'
					)
				)
			);
		}
		else if ( $instance['query'] === 'sticky' ) {
			$query_args = array(
				'posts_per_page'      => $count,
				'post__in'            => get_option( 'sticky_posts' ),
				'ignore_sticky_posts' => true
			);
		}
		else if ( $instance['query'] === 'category' ) {
			$query_args = array(
				'posts_per_page' => $count,
				'category_name'  => $instance['category']
			);
		}
		else if ( $instance['query'] === 'custom' ) {
			$query_args = array(
				'posts_per_page' => $count,
				'post_type'      => $instance['custom']
			);
		}
		
		// Display the widget.
		echo $args['before_widget'];
			$slider_query = new WP_Query( $query_args );
			
			if ( $slider_query->have_posts() ) :
				echo '<div class="slider"><ul class="slides">';
					while ( $slider_query->have_posts() ) : $slider_query->the_post();
						$post_id        = get_the_ID();
						$image_id       = get_post_meta( $post_id, '_slider_image_id', true );
						$slider_title   = get_post_meta( $post_id, '_slider_title', true );
						$slider_excerpt = get_post_meta( $post_id, '_slider_excerpt', true );
						
						// Get the post image if a slider image is not set.
						if ( is_numeric( $image_id ) ) {
							$image_src    = wp_get_attachment_image_src( $image_id, 'ascension-slider' );
							$slider_image = $image_src[0];
						}
						else {
							$slider_image = get_post_meta( $post_id, 'ascension-slider', true );
						}
						
						// Get the post title if a slider title is not set.
						if ( empty( $slider_title ) ) {
							$slider_title = get_the_title();
						}
						
						// Get the post excerpt if a slider excerpt is not set.
						if ( empty( $slider_excerpt ) ) {
							$slider_excerpt = get_the_excerpt();
						}
						
						?>
							<li>
								<?php if ( ! empty( $slider_image ) ) : ?>
									<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><img src="<?php echo $slider_image; ?>" alt="<?php the_title_attribute(); ?>"></a>
								<?php elseif ( has_post_thumbnail() ) : ?>
									<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'ascension-slider' ); ?></a>
								<?php endif; ?>
								<div class="slide-content">
									<div class="contain">	
										<h2 class="slide-title">
											<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo $slider_title; ?></a>
										</h2>
										<p class="slide-text">
											<?php echo $slider_excerpt; ?>
										</p>
									</div>
								</div>
							</li>
						<?php
					endwhile;
				echo '</ul></div>';
			endif;
			
			wp_reset_postdata();
		echo $args['after_widget'];
	}

	// Widget options form.
 	public function form( $instance ) {
		if ( ! intval( $instance['count'] ) ) {
			$count = 10;
		}
		else {
			$count = intval( $instance['count'] );
		}
		$query    = $instance['query'];
		$category = $instance['category'];
		$custom   = $instance['custom'];
		
		
		// Output the form.
		?>
			<script type="text/javascript">
				jQuery( function() {
					jQuery( '#<?php echo $this->get_field_id( 'query' ); ?>' ).on( 'change', function () {
						var val = jQuery( '#<?php echo $this->get_field_id( 'query' ); ?>' ).val();
						
						jQuery( '.toggle-<?php echo $this->get_field_id( 'query' ); ?>' ).slideUp();
						jQuery( '#toggle-<?php echo $this->get_field_id( 'query' ); ?>-' + val ).slideDown();
					} );
					jQuery( '#<?php echo $this->get_field_id( 'query' ); ?>' ).trigger( 'change' );
				} );
			</script>
			<p>
				<label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php _e( 'Number of Slides:', 'ascension' ); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" type="text" value="<?php echo esc_attr( $count ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'query' ); ?>"><?php _e( 'Pull Slides From:', 'ascension' ); ?></label> 
				<select id="<?php echo $this->get_field_id( 'query' ); ?>" name="<?php echo $this->get_field_name( 'query' ); ?>">
					<option value="activated" <?php if ( $query === 'activated' ) echo 'selected="selected"'; ?>><?php _e( 'Posts with a Slider Image', 'ascension' ); ?></option>
					<option value="sticky" <?php if ( $query === 'sticky' ) echo 'selected="selected"'; ?>><?php _e( 'Sticky Posts', 'ascension' ); ?></option>
					<option value="category" <?php if ( $query === 'category' ) echo 'selected="selected"'; ?>><?php _e( 'Category', 'ascension' ); ?></option>
					<option value="custom" <?php if ( $query === 'custom' ) echo 'selected="selected"'; ?>><?php _e( 'Custom Post Type', 'ascension' ); ?></option>
				</select>
			</p>
			<p id="toggle-<?php echo $this->get_field_id( 'query' ); ?>-category" class="toggle-<?php echo $this->get_field_id( 'query' ); ?>">
				<label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Category Slug:', 'ascension' ); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'category' ); ?>" name="<?php echo $this->get_field_name( 'category' ); ?>" type="text" value="<?php echo esc_attr( $category ); ?>" />
			</p>
			<p id="toggle-<?php echo $this->get_field_id( 'query' ); ?>-custom" class="toggle-<?php echo $this->get_field_id( 'query' ); ?>">
				<label for="<?php echo $this->get_field_id( 'custom' ); ?>"><?php _e( 'Custom Post Type Slug:', 'ascension' ); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'custom' ); ?>" name="<?php echo $this->get_field_name( 'custom' ); ?>" type="text" value="<?php echo esc_attr( $custom ); ?>" />
			</p>
		<?php 
	}

	// Validate the widget options.
	public function update( $new_instance, $old_instance ) {
		$instance             = array();
		$instance['count']    = intval( $new_instance['count'] );
		$instance['query']    = $new_instance['query'];
		$instance['category'] = $new_instance['category'];
		$instance['custom']   = $new_instance['custom'];

		return $instance;
	}
} // End Asc_Content_Slider


/**
 * Login Form
 */
class Asc_Login_Form extends WP_Widget {
	// Setup the widget.
	public function __construct() {
		parent::__construct(
			'asc_login_form',
			__( 'Login Form', 'ascension' ),
			array( 'description' => __( 'Outputs a basic login form.', 'ascension' ), )
		);
	}

	// Front-end widget content.
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $args['before_widget'];
		
		// Display the title.
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		
		// Display the login form.
		if ( ! is_user_logged_in() ) {
			$login_args = array(
				'form_id'        => 'asc-login-widget',
				'label_username' => __( 'Username', 'ascension' ),
				'label_password' => __( 'Password', 'ascension' ),
				'label_remember' => __( 'Remember Me', 'ascension' ),
				'label_log_in'   => __( 'Log In', 'ascension' ),
				'remember'       => true
			);
		
			// Select the chosen redirect.
			if ( $instance['redirect'] === 'home' ) {
				$login_args['redirect'] = home_url();
			}
			else if ( $instance['redirect'] === 'admin' ) {
				$login_args['redirect'] = admin_url();
			}
			
			wp_login_form( $login_args );
		}
		else {
			$logout = wp_loginout( home_url(), false );
			$admin  = wp_register( '', '', false );
			
			echo apply_filters( 'asc-login-widget-logout', '<ul><li class="admin">' . $admin . '</li><li class="logout">' . $logout . '</li></ul>' );
		}
		
		echo $args['after_widget'];
	}

	// Widget options form.
 	public function form( $instance ) {
		if ( isset( $instance['title'] ) ) {
			$title = $instance['title'];
		}
		
		if ( isset( $instance['redirect'] ) ) {
			$redirect = $instance['redirect'];
		}
		
		?>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'ascension' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'redirect' ); ?>"><?php _e( 'Redirect To:', 'ascension' ); ?></label> 
				<select id="<?php echo $this->get_field_id( 'redirect' ); ?>" name="<?php echo $this->get_field_name( 'redirect' ); ?>">
					<option value="current" <?php if ( $redirect === 'current' ) echo 'selected="selected"'; ?>><?php _e( 'Current Page', 'ascension' ); ?></option>
					<option value="home" <?php if ( $redirect === 'home' ) echo 'selected="selected"'; ?>><?php _e( 'Home Page', 'ascension' ); ?></option>
					<option value="admin" <?php if ( $redirect === 'admin' ) echo 'selected="selected"'; ?>><?php _e( 'Admin Dashboard', 'ascension' ); ?></option>
				</select>
			</p>
		<?php 
	}

	// Validate the widget options.
	public function update( $new_instance, $old_instance ) {
		$instance             = array();
		$instance['title']    = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['redirect'] = $new_instance['redirect'];

		return $instance;
	}
} // End Asc_Login_Form
?>