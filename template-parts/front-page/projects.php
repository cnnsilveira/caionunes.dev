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
foreach ( $projects as $project ) {
	$thumbs .= '
		<div class="project-thumb" data-project-id="' . $project->ID . '">
			' . get_the_post_thumbnail( $project->ID, array( 75, 75 ) ) . '
		</div>
	';

	$desktop_images .= '
		<div class="project-desktop-image" data-project-id="' . $project->ID . '">
			<a href="' . esc_url( get_post_meta( $project->ID, '_project_link', true ) ) . '" target="_blank">
				' . get_the_post_thumbnail( $project->ID, array( 392, 234 ) ) . '
			</a>
		</div>
	';

	$mobile_images .= '
		<div class="project-mobile-image" data-project-id="' . $project->ID . '">
			<a href="' . esc_url( get_post_meta( $project->ID, '_project_link', true ) ) . '" target="_blank">
				' . get_the_post_thumbnail( $project->ID, 'large' ) . '
			</a>
		</div>
	';

	$projects_content .= '
		<div class="right--inner" data-project-id="' . $project->ID . '">
			<div class="project-content">
				<h3>' . $project->post_title . '</h3>
				<span class="separator"></span>
				<p>' . $project->post_content . '</p>
			</div>
			<div class="project-link">
				<a href="' . esc_url( get_post_meta( $project->ID, '_project_link', true ) ) . '" target="_blank">
					' . _x( 'View Project', 'project' ) . '
				</a>
			</div>
		</div>
	';

	break;
}
$thumbs  = '<div class="project-selector">' . $thumbs . '</div>';
$content = '
	<div class="left">
		<div class="pc-mockup">
			<div class="pc-frame" style="background-image: url(\'' . cndev_images( 'pc-frame' ) . '\')"></div>
			' . $desktop_images . '
		</div>
		<div class="mobile-mockup">
			<div class="mobile-frame" style="background-image: url(\'' . cndev_images( 'mobile-frame' ) . '\')"></div>
			' . $mobile_images . '
		</div>
	</div>
	<div class="right">
		' . $projects_content . '
	</div>
';

$markup = $thumbs . $content;
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
		'title'   => 'Projects',
		'content' => $markup,
		'data'    => array(
			'content' => 'projects',
		),
	)
);
