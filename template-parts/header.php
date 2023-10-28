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

$header_id = cndev_section_id( 'header' );

$header_content = '<div class="' . $header_id . '--logo">' . cndev_do_logo( 75, '#fff' ) . '</div>';

if ( ! is_404() ) {
	$header_content .= '
		<div class="' . $header_id . '--nav">
			<nav>
				<ul>
					<li><a>' . _x( 'Who\'s Caio?', 'projects' ) . '</a></li>
					<li><a>' . _x( 'My work', 'projects' ) . '</a></li>
					<li><a>' . _x( 'Get in touch', 'projects' ) . '</a></li>
				</ul>
			</nav>
		</div>
		<div class="' . $header_id . '--scroll">
			<i class="fa-solid fa-chevron-up"></i>
		</div>
	';
}

cndev_section( 'header', $header_id, '', $header_content );
