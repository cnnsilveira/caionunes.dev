<?php
/**
 * Caionunes.dev
 *
 * Generates the header template.
 *
 * @package Portfolio
 * @author  Caio Nunes
 * @license GPL-3.0
 * @link    https://github.com/cnnsilveira/caionunes.dev
 */
$header_id = 'cndev__header';
$markup    = '<div class="' . $header_id . '--logo">' . cndev__svg( 'logo', 75, '#fff' ) . '</div>';

if ( ! is_404() ) {
	$markup .= '
		<div class="' . $header_id . '--nav">
			<nav>
				<ul>
					<li><button class="cndev__section_link" data-content="about">' . _x( 'Who\'s Caio?', 'cndev' ) . '</button></li>
					<li><button class="cndev__section_link" data-content="projects">' . _x( 'My work', 'cndev' ) . '</button></li>
					<li><button class="cndev__section_link" data-content="contact">' . _x( 'Get in touch', 'cndev' ) . '</button></li>
				</ul>
			</nav>
		</div>
		<div class="' . $header_id . '--scroll">
			<i class="fa-solid fa-chevron-up"></i>
		</div>
	';
}

cndev__section(
	array(
		'tag'     => 'header',
		'content' => $markup,
	)
);
