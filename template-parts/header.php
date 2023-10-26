<?php
/**
 * Caionunes.dev
 *
 * Generates the header template.
 *
 * @package Portfolio
 * @author  Caio Nunes
 * @license GPL-3.0
 * @link    https://github.com/cnnsilveira/caionunes.dev
 */

$header_id = cndev_section_id( 'header' );

$header_content  = '<div class="' . $header_id . '--logo">';
$header_content .= cndev_do_logo( 75, '#fff' );
$header_content .= '</div>';

$header_content .= '<div class="' . $header_id . '--nav">';
$header_content .= wp_nav_menu(
	array(
		'menu'       => 'primary',
		'container'  => 'nav',
		'menu_class' => 'cndev_menu',
		'echo'       => false,
	)
);
$header_content .= '</div>';

cndev_section( 'header', $header_id, $header_content );

if ( is_front_page() ) {
	echo '<section id="particles-js" class="cndev_particles"></section>';
}
