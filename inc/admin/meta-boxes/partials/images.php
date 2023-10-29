<?php
/**
 * Generates the markup for the projects custom meta.
 *
 * @param object $post The object containing the current post data.
 *
 * @package Portfolio
 */
function cndev_meta_project_images( $post ) {
	// Project desktop image.
	$project_desktop_image     = get_post_meta( $post->ID, '_project_desktop_image', true );
	$project_desktop_image_uri = wp_get_attachment_image_url( $project_desktop_image, 'full' );
	$no_img_class              = ! $project_desktop_image_uri ? 'hidden' : '';
	wp_nonce_field( 'project_desktop_image_action', 'project_desktop_image_nonce' );

	// Project mobile image.
	$project_mobile_image     = get_post_meta( $post->ID, '_project_mobile_image', true );
	$project_mobile_image_uri = wp_get_attachment_image_url( $project_mobile_image, 'full' );
	$no_img_class             = ! $project_mobile_image_uri ? 'hidden' : '';
	wp_nonce_field( 'project_mobile_image_action', 'project_mobile_image_nonce' );

	echo '
		<table class="form-table">
			<tbody>
				<tr>
					<th>
						Desktop
					</th>
					<th>
						Mobile
					</th>
				</tr>
				<tr>
					<td>
						<p>
							<input type="hidden" id="project_desktop_image" name="project_desktop_image" value="' . esc_attr( $project_desktop_image ) . '">
							<div class="preview-container ' . esc_attr( $no_img_class ) . '">
								<img src="' . esc_attr( $project_desktop_image_uri ) . '" width="392" height="234" id="project_desktop_image-preview" style="object-fit: fill">
							</div>
							<button type="button" class="button cndev_meta--upload">' . esc_html__( 'Select image', 'cndev' ) . '</button>
						</p>
					</td>
					<td>
						<p>
							<input type="hidden" id="project_mobile_image" name="project_mobile_image" value="' . esc_attr( $project_mobile_image ) . '">
							<div class="preview-container ' . esc_attr( $no_img_class ) . '">
								<img src="' . esc_attr( $project_mobile_image_uri ) . '" width="132" height="275" id="project_mobile_image-preview" style="object-fit: fill">
							</div>
							<button type="button" class="button cndev_meta--upload">' . esc_html__( 'Select image', 'cndev' ) . '</button>
						</p>
					</td>
				</tr>
			</tbody>
		</table>
	';
}
