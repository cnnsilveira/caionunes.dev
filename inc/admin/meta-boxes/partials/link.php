<?php
/**
 * Generates the markup for the projects custom meta.
 *
 * @param object $post The object containing the current post data.
 *
 * @package Portfolio
 */
function cndev__meta_project_link( $post ) {
	// Project link.
	$project_link = get_post_meta( $post->ID, '_project_link', true );
	wp_nonce_field( 'project_link_action', 'project_link_nonce' );

	// Repository link.
	$project_repository = get_post_meta( $post->ID, '_project_repository', true );
	wp_nonce_field( 'project_repository_action', 'project_repository_nonce' );

	echo '
		<table class="form-table">
			<tbody>
				<tr>
					<th scope="row">Live site</th>
					<td>
						<p>
							<input class="large-text" type="text" name="project_link" value="' . esc_attr( $project_link ) . '"/>
						</p>
					</td>
				</tr>
				<tr>
					<th scope="row">Repository</th>
					<td>
						<p>
							<input class="large-text" type="text" name="project_repository" value="' . esc_attr( $project_repository ) . '"/>
						</p>
					</td>
				</tr>
			</tbody>
		</table>
	';
}
