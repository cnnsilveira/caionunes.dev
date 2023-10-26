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

$footer_content = '<span>&copy; 2023, Caio Nunes – All Rights Reserved | Panta Rhei <i class="fa-solid fa-dove"></i></span>';
cndev_section( 'footer', $footer_id, '', $footer_content );
