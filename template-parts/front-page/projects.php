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
	$project_mobile_image  = wp_get_attachment_image( get_post_meta( $project->ID, '_project_mobile_image', true ), 'large' );
	$project_content       = get_post_meta( $project->ID, '_project_content', true );
	$project_link          = get_post_meta( $project->ID, '_project_link', true );
	$project_repo          = get_post_meta( $project->ID, '_project_repository', true );

	if ( 0 === $counter ) {
		$active_class = 'active';
		++$counter;
	} else {
		$active_class = '';
	}
	$thumbs .= '
		<div class="project-thumb ' . $active_class . '" data-project-id="' . $project->ID . '">
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
				<span class="separator"></span>
				<p>' . $project_content . '</p>
			</div>
			<div class="project-links">
				<a href="#">
					<i class="fa-brands fa-github"></i>
				</a>
				<a href="' . esc_url( get_post_meta( $project->ID, '_project_link', true ) ) . '" target="_blank">
					' . _x( 'View Project', 'project' ) . '
				</a>
			</div>
		</div>
	';
}

$project_selector = '
	<div class="project-selector">
		<div class="project-selector--items">
			' . $thumbs . '
		</div>
		<div class="project-selector--filters">
			<a href="#" class="project-filter">' . __( 'Filters', 'cndev' ) . '</a>
		</div>
	</div>
';

$content = '
	<div class="left">
	' . $projects_content . '
	</div>
	<div class="right">
		<div class="pc-mockup">
			<div class="pc-frame" style="background-image: url(\'' . cndev_images( 'pc-frame' ) . '\')"></div>
			' . $desktop_images . '
		</div>
		<div class="mobile-mockup">
			<div class="mobile-frame" style="background-image: url(\'' . cndev_images( 'mobile-frame' ) . '\')"></div>
			' . $mobile_images . '
		</div>
	</div>
';

$markup = $project_selector . $content;
/*
foreach ( $projects as $project ) {
	$markup .= '
	<div class="project-wrap">

		<div class="project-title-group">
			<div class="project-title">
				<h3>' . $project->post_title . '</h3>
			</div><!-- .project-title -->
			<div class="project-technologies">
	';
	foreach ( get_the_terms( $project->ID, 'technologies' ) as $tech ) {
		$markup .= '<a class="tech" href="' . esc_url( get_term_link( $tech->term_id ) ) . '" target="_blank">' . $tech->name . '</a>';
	}
	$markup .= '
			</div> <!-- .project-technologies -->
		</div><!-- .project-title-group -->

		<div class="project-images-group">
			<div class="project-thumbnail">
				' . get_the_post_thumbnail( $project->ID, 'full', false ) . '
			</div><!-- .project-thumbnail -->
		</div><!-- .project-images-group -->

		<div class="project-content-group">
			<div class="project-content">
				<p>' . $project->post_content . '</p>
			</div><!-- .project-content -->
		</div><!-- .project-content-group -->

		<div class="project-link">
			<a href="' . esc_url( get_post_meta( $project->ID, '_project_link', true ) ) . '" target="_blank">
				' . _x( 'View Project', 'project' ) . '
			</a>
		</div><!-- .project-link -->

	</div><!-- .project-wrap -->
	';
}
*/

cndev_section(
	array(
		'tag'     => 'section',
		'title'   => 'My work',
		'content' => $markup,
		'data'    => array(
			'content' => 'projects',
		),
	)
);
