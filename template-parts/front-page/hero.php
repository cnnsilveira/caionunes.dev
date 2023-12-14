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

$fp_hero_id = cndev__section_id( 'home', 'hero' );
$markup     = '
	<div class="fade-out-effect">
		<h1>
			' . esc_html__( 'Bringing Your Digital Dreams to Life,', 'cndev' ) . '
			<br>
			' . esc_html__( 'One Stack at a Time.', 'cndev' ) . '
		</h1>
		<div class="buttons">
			<button class="cndev__button cndev__section_link" data-content="about">' . esc_html__( 'Who\'s Caio?', 'cndev' ) . '</button>
			<button class="cndev__button cndev__section_link" data-content="projects">' . esc_html__( 'My work', 'cndev' ) . '</button>
			<button class="cndev__button cndev__section_link" data-content="contact">' . esc_html__( 'Get in touch', 'cndev' ) . '</button>
		</div><!-- .buttons -->
	</div>
';

cndev__section(
	array(
		'tag'     => 'section',
		'content' => $markup,
		'data'    => array(
			'content' => 'hero',
		),
	)
);
