<?php
/**
 * Caionunes.dev
 *
 * Generates the contact section for the front page template.
 *
 * @package Portfolio
 * @author  Caio Nunes
 * @license GPL-3.0
 * @link    https://github.com/cnnsilveira/caionunes.dev
 */

$markup = cndev__contact_form() . cndev__contact_pins();

$markup = '
	<div class="left">
		' . cndev__contact_form() . '
	</div>
	<div class="right">
		' . cndev__contact_pins() . '
		' . cndev__svg( 'logo', 200, '#ffffff' ) . '
	</div>
';

cndev__section(
	array(
		'tag'     => 'section',
		'title'   => 'Get in touch',
		'content' => $markup,
		'data'    => array(
			'content' => 'contact',
		),
	)
);
