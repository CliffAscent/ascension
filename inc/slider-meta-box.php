<?php
/**
 * Slider Meta Box
 *
 * Add a meta box to posts for custom slider content.
 */

// Add hooks
if ( ! function_exists( 'asc_hook_slider_meta_box' ) ) :
function asc_hook_slider_meta_box() {
	if ( current_user_can( 'upload_files' ) ) {
		add_action( 'add_meta_boxes', 'asc_add_slider_meta_box' );
		add_action( 'post_edit_form_tag', 'asc_add_post_form_tag' );
		add_action( 'save_post', 'asc_save_slider_meta_box' );
	}
}
endif; // End asc_hook_slider_meta_box()
add_action( 'init', 'asc_hook_slider_meta_box' );


// Register the meta box.
if ( ! function_exists( 'asc_add_slider_meta_box' ) ) :
function asc_add_slider_meta_box() {
	add_meta_box( 'asc-slider-meta', 'Custom Slider Content', 'asc_slider_meta_box', apply_filters( 'asc_slider_meta_post_type', 'post' ), 'side', 'low' );
}
endif; // End asc_add_slider_meta_box()


// Output the meta box.
if ( ! function_exists( 'asc_slider_meta_box' ) ) :
function asc_slider_meta_box( $post ) {
	global $_wp_additional_image_sizes;
	$image_id       = get_post_meta( $post->ID, '_slider_image_id', true );
	$slider_title   = get_post_meta( $post->ID, '_slider_title', true );
	$slider_excerpt = get_post_meta( $post->ID, '_slider_excerpt', true );
	$slider_only    = get_post_meta( $post->ID, '_slider_only', true );
	$html           = '';
	
	// Get the currents themes ascension-slider image dimensions.
	if ( isset( $_wp_additional_image_sizes['ascension-slider'] ) ) {
		$width  = intval( $_wp_additional_image_sizes['ascension-slider']['width'] );
		$height = intval( $_wp_additional_image_sizes['ascension-slider']['height'] );
	}
	
	$html .= '<p class="howto">';
	$html .= __( 'If this post is displayed in the slider the featured image, post title and post excerpt will be used, unless overridden below.', 'ascension' );
	$html .= '</p>';

	// Input field to upload the image.
	$html .= '<label for="asc_slider_image"><strong>' . __( 'Slider Image', 'ascension' ) . '</strong></label>';
	$html .= '<input type="file" name="asc_slider_image" id="asc_slider_image" />';

	// Display the image if it exists.
	if ( is_numeric( $image_id ) ) {
		$image_src = wp_get_attachment_image_src( $image_id, 'ascension-slider' );
		$image_url = $image_src[0];
		
		$html .= '<input type="checkbox" name="asc_slider_image_remove" id="asc_slider_image_remove" value="remove" />';
		$html .= '<label for="asc_slider_image"> ' . __( 'Remove Slider Image', 'ascension' ) . '</label>';
		$html .= '<img style="max-width: 100%; margin-top: 1em;" src="' . $image_url . '" />';
	}
	
	// Help text for the slider image.
	$html .= '<p class="howto">';
	$html .= __( 'Current theme slider image dimensions: ', 'ascension' );
	$html .= $width . 'px ' . __( 'width', 'ascension' ) . ', ' . $height . 'px ' . __( 'height', 'ascension' );
	$html .= '</p>';
	
	// Textarea for a custom excerpt.
	$html .= '<label for="asc_slider_title"><strong>' . __( 'Slider Title', 'ascension' ) . '</strong></label>';
	$html .= '<input style="width: 100%;" type="text" name="asc_slider_title" id="asc_slider_title" value="' . $slider_title . '" />';
	$html .= '<br /><br />';
	
	// Textarea for a custom excerpt.
	$html .= '<label for="asc_slider_excerp"><strong>' . __( 'Slider Excerpt', 'ascension' ) . '</strong></label>';
	$html .= '<textarea style="width: 100%;" name="asc_slider_excerp" id="asc_slider_excerp">' . $slider_excerpt . '</textarea>';
	$html .= '<br /><br />';
	
	// Checkbox to only display in a slider.
	$html .= '<input type="checkbox" name="asc_slider_only" id="asc_slider_only" value="true" ' . checked( $slider_only, 'true', false ) . ' />';
	$html .= '<label for="asc_slider_only"> ' . __( 'Slider Only Post', 'ascension' ) . '</label>';
	
	// Help text for slider only checkbox.
	$html .= '<p class="howto">';
	$html .= __( 'Check the box if you want this post removed from archives and only displayed in a slider.', 'ascension' );
	$html .= '</p>';
	
	echo $html;

	// Add a security nonce.
	wp_nonce_field( 'asc_slider_image_nonce', 'asc_slider_image_nonce' );
}
endif; // End asc_slider_meta_box()


// Set a new form tag to support image uploads.
function asc_add_post_form_tag() {
	echo ' enctype="multipart/form-data"';
}


// Save the meta box.
if ( ! function_exists( 'asc_save_slider_meta_box' ) ) :
function asc_save_slider_meta_box( $post_id ) {
	// Do nothing if this is an auto save.
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return $post_id;
	}

	// Make sure the user has the 'upload_files' capability.
	if ( ! current_user_can( 'upload_files' ) ) {
		wp_die( 'You do not have permission to upload files.' );
	}

	// Array of acceptable image formats.
	$allowed_file_types = array( 'image/jpg', 'image/jpeg', 'image/gif', 'image/png' );

	// Array for the wp_handle_upload function.
	$upload_overrides = array( 'test_form' => false );

	// Check if the upload field has a file in it.
	if ( ! empty( $_FILES ) && isset( $_FILES['asc_slider_image'] ) && ( $_FILES['asc_slider_image']['size'] > 0 ) ) {
		// Verify the security nonce.
		check_admin_referer( 'asc_slider_image_nonce', 'asc_slider_image_nonce' );
		
		// Get the file type of the uploaded file.
		$image_file_type     = wp_check_filetype( basename( $_FILES['asc_slider_image']['name'] ) );
		$uploaded_image_type = $image_file_type['type'];

		// Check if the uploaded file is the right format.
		if( in_array( $uploaded_image_type, $allowed_file_types ) ) {
			// Process the uploaded file.
			$uploaded_image = wp_handle_upload( $_FILES['asc_slider_image'], $upload_overrides );

			// Check if we have a local path for the image.
			if( isset( $uploaded_image['file'] ) ) {
				// Pass the local path for the image.
				$image_name_and_location = $uploaded_image['file'];

				// Copy the post title for the image title.
				$image_title_in_library = get_the_title( $post_id );

				// Set up options array to add this file as an attachment.
				$image_attachment = array(
					'post_mime_type' => $uploaded_image_type,
					'post_title' => addslashes( $image_title_in_library ) . ' - Slider Image',
					'post_content' => '',
					'post_status' => 'inherit'
				);

				// Insert the image and it's meta data as a post attachment.
				$image_attach_id = wp_insert_attachment( $image_attachment, $image_name_and_location, $post_id );
				require_once( ABSPATH . 'wp-admin' . '/includes/image.php' );
				$image_attach_data = wp_generate_attachment_metadata( $image_attach_id, $image_name_and_location );
				wp_update_attachment_metadata( $image_attach_id, $image_attach_data );

				// Delete any previously uploaded image.
				$existing_uploaded_image = (int) get_post_meta( $post_id, '_slider_image_id', true );
				if ( is_numeric( $existing_uploaded_image ) ) {
					wp_delete_attachment( $existing_uploaded_image );
				}

				// Update the post meta.
				update_post_meta( $post_id, '_slider_image_id', $image_attach_id );

				// Empty the feedback flag since the upload was successful.
				$image_upload_feedback = 'Upload successful.';
			}

			// If the upload fails, return an error.
			else {
				$image_upload_feedback = 'There was a problem with your image upload.';
			}
		}

		// Display an error for the wrong file type.
		else {
			$image_upload_feedback = 'Only jpg, jpeg, gif or png file types are allowed for the slider image.';
		}
	}

	// There was no file uploaded.
	else {
		$image_upload_feedback = 'No file uploaded.';
		
		// Delete any previously uploaded image.
		if ( isset( $_POST['asc_slider_image_remove'] ) && $_POST['asc_slider_image_remove'] == 'remove' ) {
			$existing_uploaded_image = (int) get_post_meta( $post_id, '_slider_image_id', true );
			if ( is_numeric( $existing_uploaded_image ) ) {
				wp_delete_attachment( $existing_uploaded_image );
				delete_post_meta( $post_id, '_slider_image_id' );
			}
		}
	}

	// Update the post meta with the upload feedback.
	update_post_meta( $post_id, '_slider_image_id_upload_feedback', $image_upload_feedback );
	
	// Check if an title was set.
	if ( isset( $_POST['asc_slider_title'] ) ) {
		// Sanitize the title.
		$slider_title = $_POST['asc_slider_title'];
		$slider_title = sanitize_text_field( $slider_title );
		
		// Update the post meta.
		update_post_meta( $post_id, '_slider_title', $slider_title );
	}
	
	// Check if an excerpt was set.
	if ( isset( $_POST['asc_slider_excerp'] ) ) {
		// Sanitize the excerpt.
		$slider_excerp = $_POST['asc_slider_excerp'];
		$slider_excerp = sanitize_text_field( $slider_excerp );
		
		// Update the post meta.
		update_post_meta( $post_id, '_slider_excerpt', $slider_excerp );
	}
		
	// Check for the slider only option.
	if ( isset( $_POST['asc_slider_only'] ) ) {
		update_post_meta( $post_id, '_slider_only', 'true' );
	}
	else {
		update_post_meta( $post_id, '_slider_only', 'false' );
	}

	return;
}
endif; // End asc_save_slider_meta_box()
?>