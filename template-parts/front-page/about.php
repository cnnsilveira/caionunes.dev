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

$section_id = cndev__section_id( 'home', 'about' );
// Markup.
$markup = cndev__about_selector( 'today' ) . '
	<div class="left">
		<img src="' . esc_url( cndev__images( 'eu-ia' ) ) . '">
	</div>
	<div class="right">
		<div>
			<h3 class="string-effect"></h3>
			<span class="separator"></span>';
foreach ( cndev__about_tabs() as $tab_id => $content ) {
	$markup .= '<p class="content" data-tab-content="' . $tab_id . '">' . $content['content'] . '</p>';
}
$markup .= '
		</div>
		' . cndev__social_icons() . '
	</div>
';

cndev__section(
	array(
		'tag'     => 'section',
		'title'   => 'Who\'s Caio?',
		'content' => $markup,
		'data'    => array(
			'content' => 'about',
		),
	)
);
