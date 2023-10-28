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
$markup   = '';
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
