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
function cndev_section( array $args ) {
	// Arguments validation.
	$required = array( 'tag', 'content' );
	foreach ( $required as $req ) {
		if ( ! array_key_exists( $req, $args ) ) {
			return;
		}
	}

	// Required variables.
	$section_tag     = $args['tag'];
	$section_content = $args['content'];
	// Not required variables.
	$section_inner = array_key_exists( 'inner', $args ) ? $args['inner'] : 'article';
	$section_wrap  = array_key_exists( 'content_wrap', $args ) ? $args['content_wrap'] : 'div';
	$section_title = array_key_exists( 'title', $args ) ? $args['title'] : false;
	$section_id    = array_key_exists( 'id', $args ) ? $args['id'] : false;
	$section_data  = array_key_exists( 'data', $args ) ? $args['data'] : false;
	$section_echo  = array_key_exists( 'echo', $args ) ? $args['echo'] : true;

	// Classes.
	$cndev_pattern = 'cndev_' . $section_tag;
	$section_class = 'class="' . $cndev_pattern . '"';
	$inner_class   = 'class="' . $cndev_pattern . '--inner"';
	$title_class   = 'class="' . $cndev_pattern . '--title"';
	$content_class = 'class="' . $cndev_pattern . '--content"';

	// Title markup.
	$title = '';
	if ( $section_title ) {
		$title .= '
			<div ' . $title_class . '>
			<h2>' . $section_title . '</h2>
			</div><!-- .' . $title_class . ' -->
		';
	}

	// Content markup.
	if ( false !== $section_wrap ) {
		$content_wrap  = $title;
		$content_wrap .= '<' . $section_wrap . ' ' . $content_class . '>';
		$content_wrap .= $section_content;
		$content_wrap .= '</' . $section_wrap . '><!-- ' . $content_class . '-->';
	} else {
		$content_wrap = $title . $section_content;
	}

	// Article markup.
	if ( false !== $section_inner ) {
		$inner  = '<' . $section_inner . ' ' . $inner_class . '>';
		$inner .= $content_wrap;
		$inner .= '</' . $section_inner . '><!-- .' . $inner_class . '-->';
	} else {
		$inner = $content_wrap;
	}

	// Data content.
	$data = '';
	if ( $section_data ) {
		foreach ( $section_data as $key => $value ) {
			$data .= 'data-' . $key . '="' . $value . '" ';
		}
	}

	// Section ID.
	if ( $section_id ) {
		$id_attr = 'id="' . $section_id . '"';
	} else {
		$id_attr = '';
	}

	// Section markup.
	$markup  = '<' . $section_tag . ' ' . $id_attr . $section_class . $data . '>';
	$markup .= $inner;
	$markup .= '</' . $section_tag . '><!-- .' . $cndev_pattern . ' -->';

	if ( $section_echo ) {
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

function cndev_about_tabs() {
	$content = array(
		'yesterday'      => array(
			'title'   => 'Yesterday',
			'content' => 'A cashier who decided to remap his goals and invest time on himself. For a kid who lived his entire life turning computers upside down, what better then some buggy code? So there we went. After a long time of hard study, constant practice and a lot of "why it simply doesn\'t work?" thoughts, I progressively started to build my career as a developer.',
		),
		'today'          => array(
			'title'   => 'Today',
			'content' => 'A full-stack developer capable of creating end-to-end web applications going from UI/UX development, to custom dashboards and content management. Specialized on WordPress environments including platform configuration, pages creation, themes & plugins customization and more. Currently working as freelancer and looking for the oportunity on the right place.',
		),
		'for-companies'  => array(
			'title'   => 'For companies',
			'content' => 'The best problem solver you will ever find.',

		),
		'for-developers' => array(
			'title'   => 'For developers',
			'content' => 'Yes, WordPress developers are legit full-stack devel...<br><code>PHP FATAL ERROR: Unexpected ")" on "index.php" at line 1246.</code><br>Oh, sorry, I forgot an "," on my array.',
		),
	);

	return $content;
}

function cndev_about_selector( string $default ) {
	$markup = '
	<nav class="selector">
		<ul>';
	foreach ( cndev_about_tabs() as $tab_id => $content ) {
		$active  = $default === $tab_id ? ' active' : '';
		$markup .= '<li id="' . $tab_id . '" class="cndev_button' . $active . '">' . $content['title'] . '</li>';
	}
	$markup .= '
		</ul>
	</nav>';
	return $markup;
}

function cndev_images( $selected ) {
	$images = array(
		'mobile-frame' => CNDEV_IMG . '/mobile-frame.png',
		'pc-frame'     => CNDEV_IMG . '/pc-frame.png',
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
				<li><a href="https://www.twitch.tv/caiodigdin_" target="_blank"><i class="fa-brands fa-twitch"></i></a><li>
				<li><a href="https://github.com/cnnsilveira/" target="_blank"><i class="fa-brands fa-github"></i></a><li>
				<li><a href="https://www.linkedin.com/in/caio-nuness/" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a><li>
			</ul>
		</div><!-- .cndev_social_icons -->
	';
	return $markup;
}

function cndev_is_admin() {
	return current_user_can( 'administrator' );
}

function cndev_not_admin_redir() {
	if ( ! cndev_is_admin() ) {
		wp_redirect( home_url() );
	}
}
