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

require_once __DIR__ . '/partials/content.php';
require_once __DIR__ . '/partials/link.php';
require_once __DIR__ . '/partials/images.php';

add_action( 'add_meta_boxes', 'cndev_custom_fields' );
/**
 * Register the projects custom meta.
 *
 * @package Portfolio
 */
function cndev_custom_fields() {
	add_meta_box(
		'project_content',
		_x( 'Front page excerpt', 'project' ),
		'cndev_meta_project_content',
		'projects',
		'normal',
		'high'
	);
	add_meta_box(
		'project_link',
		_x( 'Links', 'project' ),
		'cndev_meta_project_link',
		'projects',
		'normal',
		'high'
	);
	add_meta_box(
		'project_images',
		_x( 'Screenshots', 'project' ),
		'cndev_meta_project_images',
		'projects',
		'normal',
		'high'
	);
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

	// Update project link.
	cndev_update_meta( $post_id, 'project_content' );

	// Update project link.
	cndev_update_meta( $post_id, 'project_link' );

	// Update project desktop image.
	cndev_update_meta( $post_id, 'project_desktop_image' );

	// Update project mobile image.
	cndev_update_meta( $post_id, 'project_mobile_image' );
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

	// Update field.
	$field_value = isset( $_POST[ $field_name ] ) ? sanitize_text_field( wp_unslash( $_POST[ $field_name ] ) ) : '';
	update_post_meta(
		$post_id,
		'_' . $field_name,
		$field_value
	);
}
