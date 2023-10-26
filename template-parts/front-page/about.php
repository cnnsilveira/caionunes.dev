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
$fp_main_id = cndev_section_id( 'home', 'about' );

$fp_about = cndev_about_selector() . '
	<div class="left">
		<img src="' . esc_url( cndev_images( 'eu-ia' ) ) . '">
	</div>
	<div class="right">
		<div>
			<h3 class="string-effect"></h3>
			<p class="content">A full-stack developer capable of creating end-to-end web applications going from UI/UX development, to custom dashboards and content management. Currently working as freelancer and looking for an oportunity on the right place.
			
			</p>
		</div>
		' . cndev_social_icons() . '
	</div>
';

cndev_section( 'section', $fp_main_id, 'Who\'s Caio?', $fp_about );
