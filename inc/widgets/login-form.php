<?php
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