<?php
/**
 * Caionunes.dev
 *
 * Custom meta boxes for the Projects.
 *
 * @package Portfolio
 * @author  Caio Nunes
 * @license GPL-3.0
 * @link    https://github.com/cnnsilveira/caionunes.dev
 */

add_action( 'add_meta_boxes', 'cndev_custom_fields' );
/**
 * Register the banner custom field.
 *
 * @package Portfolio
 */
function cndev_custom_fields() {
	add_meta_box(
		'project_link',
		_x( 'Project link', 'project' ),
		'cndev_meta_markup',
		get_post_types(),
		'normal',
		'high'
	);
}
/**
 * Generates the markup for the banner custom field on "Edit Page".
 *
 * @param object $post The object containing the current post data.
 *
 * @package Portfolio
 */
function cndev_meta_markup( $post ) {
	// Banner title.
	$project_link = get_post_meta( $post->ID, '_project_link', true );
	wp_nonce_field( 'project_link_action', 'project_link_nonce' );

	// Table start.
	echo '<table class="form-table"><tbody>';

		// Button link.
		echo '<tr>';
			echo '<td>';
				echo '<p><input class="large-text" type="text" name="project_link" value="' . esc_attr( $project_link ) . '" placeholder="#"/></p>';
			echo '</td>';
		echo '</tr>';

	// Table end.
	echo '</tbody></table>';
}

add_action( 'save_post', 'cndev_meta_save' );
/**
 * Updates the custom fields data on the database.
 *
 * @param int $post_id The current post ID.
 *
 * @package Portfolio
 */
function cndev_meta_save( $post_id ) {
	// Capability.
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	// Not saving on autosave.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post_id;
	}
	// Update banner button link.
	cndev_update_meta( $post_id, 'project_link' );
}

/**
 * Helper function that verify WP nonce and update the database.
 * Nonce actions and names must match the following: $field_name . "_action"; $field_name . "_nonce";
 *
 * @param int   $post_id The current post ID.
 * @param array $field_name The name of the field to be updated.
 *
 * @package Portfolio
 */
function cndev_update_meta( $post_id, $field_name ) {
	// Action and name.
	$nonce_action = $field_name . '_action';
	$nonce_name   = $field_name . '_nonce';

	// Verify nonce.
	if ( ! isset( $_POST[ $nonce_name ] ) || ! wp_verify_nonce( sanitize_key( $_POST[ $nonce_name ] ), $nonce_action ) ) {
		return;
	}

	// Update field if it exists in $_POST.
	if ( isset( $_POST[ $field_name ] ) ) {
		$field_value = sanitize_text_field( wp_unslash( $_POST[ $field_name ] ) );
		update_post_meta(
			$post_id,
			'_' . $field_name,
			$field_value
		);
	} else {
		update_post_meta(
			$post_id,
			'_' . $field_name,
			''
		);
	}
}
