<?php
/**
 * Caionunes.dev
 *
 * Generates the hero section for the front page template.
 *
 * @package Portfolio
 * @author  Caio Nunes
 * @license GPL-3.0
 * @link    https://github.com/cnnsilveira/caionunes.dev
 */

$fp_hero_id = cndev_section_id( 'home', 'hero' );
$markup     = '
	<div class="fade-out-effect">
		<h1>
			Bringing Your Digital Dreams to Life,
			<br>One Stack at a Time.
		</h1>
		<div class="buttons">
			<a class="cndev_button">' . _x( 'About me', 'project' ) . '</a>
			<a class="cndev_button">' . _x( 'My work', 'project' ) . '</a>
			<a class="cndev_button">' . _x( 'Get in touch', 'project' ) . '</a>
		</div><!-- .buttons -->
	</div>
';

cndev_section(
	array(
		'tag'     => 'section',
		'content' => $markup,
		'data'    => array(
			'content' => 'hero',
		),
	)
);
