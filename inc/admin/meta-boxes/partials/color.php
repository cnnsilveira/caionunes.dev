<?php
/**
 * Generates the markup for the projects custom meta.
 *
 * @param object $post The object containing the current post data.
 *
 * @package Portfolio
 */
function cndev__meta_project_color( $post ) {
	// Project color.
	$project_color = get_post_meta( $post->ID, '_project_color', true );
	wp_nonce_field( 'project_color_action', 'project_color_nonce' );

	echo '
		<table class="form-table">
			<tbody>
				<tr>
					<td>
						<p>
							<input type="text" name="project_color" value="' . esc_attr( $project_color ) . '" placeholder="#000000"/>
						</p>
					</td>
				</tr>
			</tbody>
		</table>
	';
}
