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
	<div class="contact">
		<h3>Find me</h3>
		' . cndev__contact_pins() . '
	</div>
	<div class="copy">
		<span class="separator"></span>
		<span>&copy; Caio Nunes – All Rights Reserved | Panta Rhei <i class="fa-solid fa-dove"></i></span>
	</div>
	
';

cndev__section(
	array(
		'tag'     => 'footer',
		'content' => $markup,
	)
);
