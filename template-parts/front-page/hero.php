<?php
/**
 * Caionunes.dev
 *
 * Generates the hero section for the front page template.
 *
 * @package Portfolio
 * @author  Caio Nunes
 * @license GPL-3.0
 * @link    https://github.com/cnnsilveira/caionunes.dev
 */

$fp_hero_id      = cndev_section_id( 'home', 'hero' );
$fp_hero_content = '
	<div class="fade-out-effect">
		<h1>
			Bringing Your Digital Dreams to Life,
			<br>One Stack at a Time.
		</h1>
		<div class="buttons">
			<a class="cndev_button" id="cndev_home_about">' . _x( 'Who\'s Caio?', 'project' ) . '</a>
			<a class="cndev_button" id="cndev_home_projects">' . _x( 'My work', 'project' ) . '</a>
			<a class="cndev_button" id="cndev_home_contact">' . _x( 'Get in touch', 'project' ) . '</a>
		</div><!-- .buttons -->
	</div>
';

cndev_section( 'section', $fp_hero_id, '', $fp_hero_content );
