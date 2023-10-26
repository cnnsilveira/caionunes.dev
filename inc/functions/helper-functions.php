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
	$logo .= '</div><!-- .cndev_logo -->';

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
 * @param string $class The id of the section.
 * @param string $title The section title.
 * @param string $content The content.
 * @param bool   $cndev_echo Whether to echo the content or not.
 *
 * @package Portfolio
 * @source /inc/helper-functions.php
 */
function cndev_section( string $section, string $class, string $title = '', string $content, $cndev_echo = true ) {
	$markup  = '<' . $section . ' class="' . $class . '">';
	$markup .= '<article class="' . $class . '--inner">';
	if ( '' !== $title ) {
		$markup .= '<div class="' . $class . '--title"><h2 class="section-title">' . $title . '</h2></div><!-- .' . $class . '--title -->';
	}
	$markup .= '<div class="' . $class . '--content">' . $content . '</div><!-- .' . $class . '--content -->';
	$markup .= '</article><!-- .' . $class . '--inner-->';
	$markup .= '</' . $section . '><!-- .' . $class . ' -->';

	if ( $cndev_echo ) {
		echo $markup;
	} else {
		return $markup;
	}
}

/**
 * Outputs main wrap.
 *
 * @param bool   $open Whether to echo the opening or the closing tag.
 * @param string $current_page The current page identifier.
 *
 * @package Portfolio
 * @source /inc/helper-functions.php
 */
function cndev_main_tag( bool $open, string $current_page = '' ) {
	echo $open ? '<main class="cndev_main' . esc_attr( $current_page ) . '">' : '</main><!-- .cndev_main' . esc_attr( $current_page ) . ' -->';
}

function cndev_about_selector() {
	$markup = '
	<div class="cndev_content_selector">
		<span id="for-all" class="cndev_button active">Today</span>
		<span id="for-costumers" class="cndev_button">For costumers</span>
		<span id="for-companies" class="cndev_button">For companies</span>
		<span id="for-developers" class="cndev_button">For developers</span>
	</div>';
	return $markup;
}

function cndev_images( $selected ) {
	$images = array(
		'laptop-frame' => CNDEV_IMG . '/laptop-frame.webp',
		'about-me'     => CNDEV_IMG . '/about-me.webp',
		'eu'           => CNDEV_IMG . '/eu.png',
		'eu-ia'        => CNDEV_IMG . '/eu-ia.jpg',
	);

	return $images[ $selected ];
}

function cndev_social_icons() {
	$markup = '
		<div class="cndev_social_icons">
			<ul>
				<li><a href="https://github.com/cnnsilveira/" target="_blank"><i class="fa-brands fa-github"></i></a><li>
				<li><a href="https://www.linkedin.com/in/caio-nuness/" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a><li>
			</ul>
		</div><!-- .cndev_social_icons -->
	';
	return $markup;
}
