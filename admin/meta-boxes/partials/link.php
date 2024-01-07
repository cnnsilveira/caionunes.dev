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

	// Repository source.
	$project_repository_source = get_post_meta( $post->ID, '_project_repository_source', true );
	wp_nonce_field( 'project_repository_source_action', 'project_repository_source_nonce' );
	$github_selected = 'github' === $project_repository_source ? ' selected' : '';
	$gitlab_selected = 'gitlab' === $project_repository_source ? ' selected' : '';

	// Repository link.
	$project_repository = get_post_meta( $post->ID, '_project_repository', true );
	wp_nonce_field( 'project_repository_action', 'project_repository_nonce' );

	// Repository visibility.
	$project_repository_link = get_post_meta( $post->ID, '_project_repository_visibility', true );
	wp_nonce_field( 'project_repository_visibility_action', 'project_repository_visibility_nonce' );
	$checked = 'on' === $project_repository_link ? ' checked' : '';

	echo '
		<table class="form-table cndev__meta_links">
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
						<p class="repo">
							<select name="project_repository_source">
								<option value="github" ' . esc_attr( $github_selected ) . '>Github</option>
								<option value="gitlab" ' . esc_attr( $gitlab_selected ) . '>Gitlab</option>
							</select>
							<input class="large-text" type="text" name="project_repository" value="' . esc_attr( $project_repository ) . '"/>
							<span>Private?</span>
							<label class="switch">
								<input name="project_repository_visibility" type="checkbox" ' . esc_attr( $checked ) . '>
								<span class="slider round"></span>
							</label>
						</p>
					</td>
				</tr>
			</tbody>
		</table>
	';
}
