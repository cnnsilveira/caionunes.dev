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

$fp_hero_id      = cndev_section_id( 'home', 'hero' );
$fp_hero_content = '<div class="fade-out-effect"><h1 id="messenger"></h1></div>';

cndev_section( 'section', $fp_hero_id, $fp_hero_content );
