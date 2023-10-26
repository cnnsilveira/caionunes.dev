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

// Variables.
$projects   = get_posts( array( 'post_type' => 'projects' ) );
$fp_main_id = cndev_section_id( 'home', 'content' );

// Projects wrap start.
$fp_main_content = '<div class="cndev_projects">';
foreach ( $projects as $project ) {
	// Project markup start.
	$fp_main_content .= '<div class="project-wrap">';
	// Title group.
	$fp_main_content .= '<div class="project-title-group">';
	// Title.
	$fp_main_content .= '<div class="project-title"><h3>' . $project->post_title . '</h3>';
	$fp_main_content .= '</div><!-- .project-title -->';
	// Technologies.
	$fp_main_content .= '<div class="project-technologies">';
	foreach ( get_the_terms( $project->ID, 'technologies' ) as $tech ) {
		$fp_main_content .= '<a class="tech" href="' . esc_url( get_term_link( $tech->term_id ) ) . '" target="_blank">' . $tech->name . '</a>';
	}
	$fp_main_content .= '</div> <!-- .project-technologies -->';
	// Title group end.
	$fp_main_content .= '</div><!-- .project-title-group -->';
	// Images group.
	$fp_main_content .= '<div class="project-images-group">';
	// Project thumbnail.
	$fp_main_content .= '<div class="project-thumbnail">' . get_the_post_thumbnail( $project->ID, 'full', false ) . '</div><!-- .project-thumbnail -->';
	// Images group end.
	$fp_main_content .= '</div><!-- .project-images-group -->';
	// Content group.
	$fp_main_content .= '<div class="project-content-group">';
	// Project content.
	$fp_main_content .= '<div class="project-content"><p>' . $project->post_content . '</p></div><!-- .project-content -->';
	// Content group end.
	$fp_main_content .= '</div><!-- .project-content-group -->';
	// Project link.
	$fp_main_content .= '<div class="project-link">';
	$fp_main_content .= '<a href="' . esc_url( get_post_meta( $project->ID, '_project_link', true ) ) . '" target="_blank">' . _x( 'View Project', 'project' ) . '</a>';
	$fp_main_content .= '</div><!-- .project-link -->';
	// Project markup end.
	$fp_main_content .= '</div><!-- .project-wrap -->';
}
// Projects wrap end.
$fp_main_content .= '</div><!-- .cndev_projects -->';

cndev_section( 'section', $fp_main_id, 'My Projects', $fp_main_content );
