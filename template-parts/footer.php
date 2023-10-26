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


$footer_id = cndev_section_id( 'footer' );

$footer_content = cndev_social_icons();
cndev_section( 'footer', $footer_id, '', $footer_content );
