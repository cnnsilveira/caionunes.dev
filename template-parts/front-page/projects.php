<?php
/**
 * Caionunes.dev
 *
 * Generates the projects section for the front page template.
 *
 * @package Portfolio
 * @author  Caio Nunes
 * @license GPL-3.0
 * @link    https://github.com/cnnsilveira/caionunes.dev
 */

// Projects wrap start.
$projects = get_posts( array( 'post_type' => 'projects' ) );

$thumbs           = '';
$desktop_images   = '';
$mobile_images    = '';
$projects_content = '';
$counter          = 0;
foreach ( $projects as $project ) {
	$project_title         = $project->post_title;
	$project_thumb         = get_the_post_thumbnail( $project->ID, array( 75, 75 ) );
	$project_desktop_image = wp_get_attachment_image( get_post_meta( $project->ID, '_project_desktop_image', true ), array( 392, 234 ) );
	$project_mobile_image  = wp_get_attachment_image( get_post_meta( $project->ID, '_project_mobile_image', true ), array( 130, 265 ) );
	$project_content       = get_post_meta( $project->ID, '_project_content', true );
	$project_color         = get_post_meta( $project->ID, '_project_color', true );
	$project_link          = get_post_meta( $project->ID, '_project_link', true );
	$project_repo_source   = 'github' === get_post_meta( $project->ID, '_project_repository_source', true ) ? '<i class="fa-brands fa-github"></i>' : cndev__svg( 'gitlab', 24 );
	$restrict_repo         = 'on' !== get_post_meta( $project->ID, '_project_repository_visibility', true ) ? ' restrict' : '';
	$project_repo          = '' === $restrict_repo ? '' : get_post_meta( $project->ID, '_project_repository', true );

	if ( 0 === $counter ) {
		$active_class = 'active';
		++$counter;
	} else {
		$active_class = '';
	}
	$thumbs .= '
		<div class="project-thumb ' . $active_class . '" data-project-id="' . $project->ID . '" style="background: ' . $project_color . ';">
			' . $project_thumb . '
			<span>' . $project_title . '</span>
			<a class="project-thumb--click"></a>
		</div>
	';

	$desktop_images .= '
		<div class="project-desktop-image ' . $active_class . '" data-project-id="' . $project->ID . '">
			<a href="' . $project_link . '" title="' . $project_title . '" target="_blank">' . $project_desktop_image . '</a>
		</div>
	';

	$mobile_images .= '
		<div class="project-mobile-image ' . $active_class . '" data-project-id="' . $project->ID . '">
		<a href="' . $project_link . '" title="' . $project_title . '" target="_blank">' . $project_mobile_image . '</a>
		</div>
	';

	$projects_content .= '
		<div class="left--inner ' . $active_class . '" data-project-id="' . $project->ID . '">
			<div class="project-title">
				<h3>' . $project_title . '</h3>
				<a class="repo ' . $restrict_repo . '" href="' . esc_url( $project_repo ) . '" target="_blank">
					' . $project_repo_source . '
				</a>
			</div>
			<div class="project-content">
				<p>' . $project_content . '</p>
			</div>
		</div>
	';
}

$markup = '
	<div class="left">
	<div class="project-selector">
		<div class="project-selector--items">
			' . $thumbs . '
		</div>
		<div class="project-selector--filters">
			<a href="#" class="project-filter">' . __( 'Filters', 'cndev' ) . '</a>
		</div>
	</div>
	' . $projects_content . '
	</div>
	<div class="right">
		<div class="pc-mockup">
			<div class="pc-frame" style="background-image: url(\'' . cndev__images( 'pc-frame' ) . '\')"></div>
			' . $desktop_images . '
		</div>
		<div class="mobile-mockup">
			<div class="mobile-frame" style="background-image: url(\'' . cndev__images( 'mobile-frame' ) . '\')"></div>
			' . $mobile_images . '
		</div>
	</div>
';

cndev__section(
	array(
		'tag'     => 'section',
		'title'   => 'My work',
		'content' => $markup,
		'data'    => array(
			'content' => 'projects',
		),
	)
);
