<?php
/**
 * Caionunes.dev
 *
 * Generates the footer template.
 *
 * @package Portfolio
 * @author  Caio Nunes
 * @license GPL-3.0
 * @link    https://github.com/cnnsilveira/caionunes.dev
 */

$markup = '
	<div class="copy">
		<span class="separator"></span>
		<span>&copy; Caio Nunes – ' . esc_html__( 'All Rights Reserved', 'cndev' ) . '</span>
	</div>
';

cndev__section(
	array(
		'tag'     => 'footer',
		'content' => $markup,
	)
);
