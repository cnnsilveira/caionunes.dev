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

$section_id = cndev_section_id( 'home', 'about' );
// Markup.
$markup = '<div class="content about" data-content="about">' . cndev_about_selector( 'today' ) . '
	<div class="left">
		<img src="' . esc_url( cndev_images( 'eu-ia' ) ) . '">
	</div>
	<div class="right">
		<div>
			<h3 class="string-effect"></h3>
			<span class="separator"></span>';
foreach ( cndev_about_tabs() as $tab_id => $content ) {
	$markup .= '<p class="content" data-tab-content="' . $tab_id . '">' . $content['content'] . '</p>';
}
$markup .= '
			</div>
			' . cndev_social_icons() . '
		</div>
	</div><!-- #about -->
';
cndev_section( 'section', $section_id, 'Who\'s Caio?', $markup, 'about' );
