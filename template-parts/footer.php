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

$markup = '<span>&copy; ' . gmdate( 'Y' ) . ', Caio Nunes – All Rights Reserved | Panta Rhei <i class="fa-solid fa-dove"></i></span>';

cndev_section(
	array(
		'tag'     => 'footer',
		'content' => $markup,
	)
);
