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
$projects_id = cndev_section_id( 'home', 'projects' );
$projects    = get_posts( array( 'post_type' => 'projects' ) );
$markup      = '<div class="content projects" data-content="projects">';
foreach ( $projects as $project ) {
	// Project markup start.
	$markup .= '<div class="project-wrap">';
	// Title group.
	$markup .= '<div class="project-title-group">';
	// Title.
	$markup .= '<div class="project-title"><h3>' . $project->post_title . '</h3>';
	$markup .= '</div><!-- .project-title -->';
	// Technologies.
	$markup .= '<div class="project-technologies">';
	foreach ( get_the_terms( $project->ID, 'technologies' ) as $tech ) {
		$markup .= '<a class="tech" href="' . esc_url( get_term_link( $tech->term_id ) ) . '" target="_blank">' . $tech->name . '</a>';
	}
	$markup .= '</div> <!-- .project-technologies -->';
	// Title group end.
	$markup .= '</div><!-- .project-title-group -->';
	// Images group.
	$markup .= '<div class="project-images-group">';
	// Project thumbnail.
	$markup .= '<div class="project-thumbnail">' . get_the_post_thumbnail( $project->ID, 'full', false ) . '</div><!-- .project-thumbnail -->';
	// Images group end.
	$markup .= '</div><!-- .project-images-group -->';
	// Content group.
	$markup .= '<div class="project-content-group">';
	// Project content.
	$markup .= '<div class="project-content"><p>' . $project->post_content . '</p></div><!-- .project-content -->';
	// Content group end.
	$markup .= '</div><!-- .project-content-group -->';
	// Project link.
	$markup .= '<div class="project-link">';
	$markup .= '<a href="' . esc_url( get_post_meta( $project->ID, '_project_link', true ) ) . '" target="_blank">' . _x( 'View Project', 'project' ) . '</a>';
	$markup .= '</div><!-- .project-link -->';
	// Project markup end.
	$markup .= '</div><!-- .project-wrap -->';
}
// Projects wrap end.
$markup .= '</div><!-- #projects -->';

cndev_section( 'section', $projects_id, 'Projects', $markup, 'projects' );
