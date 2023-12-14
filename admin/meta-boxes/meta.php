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
require_once __DIR__ . '/partials/color.php';
require_once __DIR__ . '/partials/images.php';

add_action( 'add_meta_boxes', 'cndev__custom_fields' );
/**
 * Register the projects custom meta.
 *
 * @package Portfolio
 */
function cndev__custom_fields() {
	add_meta_box(
		'project_content',
		__( 'Front page excerpt', 'cndev' ),
		'cndev__meta_project_content',
		'projects',
		'normal',
		'high'
	);
	add_meta_box(
		'project_link',
		__( 'Links', 'cndev' ),
		'cndev__meta_project_link',
		'projects',
		'normal',
		'high'
	);
	add_meta_box(
		'project_color',
		__( 'Predominant color', 'cndev' ),
		'cndev__meta_project_color',
		'projects',
		'normal',
		'high'
	);
	add_meta_box(
		'project_images',
		__( 'Screenshots', 'cndev' ),
		'cndev__meta_project_images',
		'projects',
		'normal',
		'high'
	);
}

add_action( 'save_post', 'cndev__meta_save' );
/**
 * Updates the custom fields data on the database.
 *
 * @param int $post_id The current post ID.
 *
 * @package Portfolio
 */
function cndev__meta_save( $post_id ) {
	// Capability.
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	// Not saving on autosave.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post_id;
	}

	// Update project link.
	cndev__update_meta( $post_id, 'project_content' );

	// Update project link.
	cndev__update_meta( $post_id, 'project_link' );

	// Update project repository link.
	cndev__update_meta( $post_id, 'project_repository_source' );

	// Update project repository link.
	cndev__update_meta( $post_id, 'project_repository' );

	// Update project repository visibility.
	cndev__update_meta( $post_id, 'project_repository_visibility' );

	// Update project link.
	cndev__update_meta( $post_id, 'project_color' );

	// Update project desktop image.
	cndev__update_meta( $post_id, 'project_desktop_image' );

	// Update project mobile image.
	cndev__update_meta( $post_id, 'project_mobile_image' );
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
function cndev__update_meta( $post_id, $field_name ) {
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
