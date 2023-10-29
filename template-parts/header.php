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
$header_id = 'cndev_header';
$markup    = '<div class="' . $header_id . '--logo">' . cndev_do_logo( 75, '#fff' ) . '</div>';

if ( ! is_404() ) {
	$markup .= '
		<div class="' . $header_id . '--nav">
			<nav>
				<ul>
					<li><a>' . _x( 'About me', 'projects' ) . '</a></li>
					<li><a>' . _x( 'Projects', 'projects' ) . '</a></li>
					<li><a>' . _x( 'Contact', 'projects' ) . '</a></li>
				</ul>
			</nav>
		</div>
		<div class="' . $header_id . '--scroll">
			<i class="fa-solid fa-chevron-up"></i>
		</div>
	';
}

cndev_section(
	array(
		'tag'     => 'header',
		'content' => $markup,
	)
);
