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
	<div class="left">
		<span class="slogan">Make it extraordinary with</span>
		' . cndev__svg( 'logo', 450, '#ffffff' ) . '
		' . cndev__contact_pins() . '
	</div>
	<div class="right">
		' . cndev__contact_form() . '
	</div>

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
