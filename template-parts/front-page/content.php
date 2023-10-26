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

$fp_main_id      = cndev_section_id( 'home', 'content' );
$fp_main_content = '';

cndev_section( 'section', $fp_main_id, $fp_main_content );
