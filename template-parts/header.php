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

$header_content  = '<div class="' . $header_id . '--logo">' . cndev_do_logo( 75, '#fff' ) . '</div>';
$header_content .= '
	<div class="' . $header_id . '--nav">
		<nav>
			<ul>
				<li><a>' . _x( 'About', 'projects' ) . '</a></li>
				<li><a>' . _x( 'Projects', 'projects' ) . '</a></li>
				<li><a>' . _x( 'Contact', 'projects' ) . '</a></li>
			</ul>
		</nav>
	</div>
';

cndev_section( 'header', $header_id, '', $header_content );
