<?php
/**
 * Caionunes.dev
 *
 * This file group some theme functions used throughout the files.
 *
 * @package Portfolio
 * @author  Caio Nunes
 * @license GPL-3.0
 * @link    https://github.com/cnnsilveira/caionunes.dev
 */

/**
 * Outputs the website logo.
 *
 * @param int    $size The size of the logo in pixels.
 * @param string $color The color of the logo.
 *
 * @package Portfolio
 * @source /inc/helper-functions.php
 */
function cndev_do_logo( int $size = 75, string $color = '#0f0f0f' ) {
	$svg = wp_remote_get( CNDEV_URI . '/inc/assets/img/logo.svg' )['body'];

	$style  = 'style="';
	$style .= 'width: ' . $size . 'px; height: ' . $size . 'px; ';
	$style .= 'fill: ' . $color . '; stroke: ' . $color . ';';
	$style .= '"';

	$logo  = '<div class="cndev_logo" ' . wp_kses_post( $style ) . '>';
	$logo .= $svg;
	$logo .= '</div>';

	return $logo;
}

/**
 * Formats the ID names to the theme default.
 *
 * @param string $page The actual page.
 * @param string $section The section name.
 *
 * @return string The formatted ID.
 *
 * @package Portfolio
 * @source /inc/helper-functions.php
 */
function cndev_section_id( string $page, string $section = null ) {
	$section_id = 'cndev_' . $page;
	if ( null !== $section ) {
		$section_id .= '_' . $section;
	}
	return $section_id;
}

/**
 * Outputs the sections HTML.
 *
 * @param string $section The parent section name.
 * @param string $id The id of the section.
 * @param string $content The content.
 * @param bool   $cndev_echo Whether to echo the content or not.
 *
 * @package Portfolio
 * @source /inc/helper-functions.php
 */
function cndev_section( string $section, string $id, string $content, $cndev_echo = true ) {
	$markup  = '<' . $section . ' class="' . $id . '">';
	$markup .= '<article class="' . $id . '--inner">';
	$markup .= $content;
	$markup .= '</article>';
	$markup .= '</' . $section . '>';

	if ( $cndev_echo ) {
		echo $markup;
	} else {
		return $markup;
	}
}
