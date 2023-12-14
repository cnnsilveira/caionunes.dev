<?php
/**
 * Generates the markup for the projects custom meta.
 *
 * @param object $post The object containing the current post data.
 *
 * @package Portfolio
 */
function cndev__meta_project_content( $post ) {
	$project_content = get_post_meta( $post->ID, '_project_content', true );
	wp_nonce_field( 'project_content_action', 'project_content_nonce' );
	echo '
		<table class="form-table">
			<tbody>
				<tr>
					<td>
						<p>
							<textarea class="large-text" type="text" name="project_content"/>' . wp_kses_post( $project_content ) . '</textarea>
						</p>
					</td>
				</tr>
			</tbody>
		</table>
	';
}
