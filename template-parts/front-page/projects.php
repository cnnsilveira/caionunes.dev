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
	$project_repo          = get_post_meta( $project->ID, '_project_repository', true );

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
			' . $project_desktop_image . '
		</div>
	';

	$mobile_images .= '
		<div class="project-mobile-image ' . $active_class . '" data-project-id="' . $project->ID . '">
			' . $project_mobile_image . '
		</div>
	';

	$projects_content .= '
		<div class="left--inner ' . $active_class . '" data-project-id="' . $project->ID . '">
			<div class="project-content">
				<h3>' . $project_title . '</h3>
				<p>' . $project_content . '</p>
			</div>
			<div class="project-links">';

	$projects_content .= ! empty( $project_repo ) ? '
				<a class="repo" href="' . esc_url( $project_repo ) . '" target="_blank">
					<span>' . __( 'Repo', 'cndev' ) . '</span>
					<i class="fa-brands fa-github"></i>
				</a>
	' : '';

	$projects_content .= ! empty( $project_link ) ? '
				<a class="live-site" href="' . esc_url( $project_link ) . '" target="_blank">
					<span>' . __( 'Live site', 'cndev' ) . '</span>
				</a>
	' : '';

	$projects_content .= '
			</div>
		</div>
	';
}

$markup = '
	<div class="project-selector">
		<div class="project-selector--items">
			' . $thumbs . '
		</div>
		<div class="project-selector--filters">
			<a href="#" class="project-filter">' . __( 'Filters', 'cndev' ) . '</a>
		</div>
	</div>
	<div class="left">
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
