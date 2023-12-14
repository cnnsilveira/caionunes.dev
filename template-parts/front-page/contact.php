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
			<span class="slogan">' . esc_html__( 'Make it extraordinary with', 'cndev' ) . '</span>
			' . cndev__svg( 'logo', 450, '#ffffff' ) . '
			' . cndev__contact_pins() . '
		</div>
		<div class="right">
			' . cndev__contact_form() . '
		</div>
	</div>
	
';

cndev__section(
	array(
		'tag'     => 'section',
		'title'   => esc_html__( 'Get in touch', 'cndev' ),
		'content' => $markup,
		'data'    => array(
			'content' => 'contact',
		),
	)
);
