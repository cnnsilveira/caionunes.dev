<?php
/**
 * Caionunes.dev
 *
 * Enqueues theme's styles and scripts and dequeues unused styles and scripts from WP.
 *
 * @package Portfolio
 * @author  Caio Nunes
 * @license GPL-3.0
 * @link    https://github.com/cnnsilveira/caionunes.dev
 */

add_action( 'wp_enqueue_scripts', 'cndev_enqueues' );
/**
 * Enqueues scripts and styles after compiling and minifying.
 *
 * @package Portfolio
 */
function cndev_enqueues() {
	// Remove default WP CSS variables.
	wp_dequeue_style( 'classic-theme-styles' );
	wp_dequeue_style( 'global-styles' );
	// Remove block library CSS.
	wp_dequeue_style( 'wp-block-library' );
	// Remove comment reply JS.
	wp_dequeue_script( 'comment-reply' );
	// Remove embedded links.
	wp_dequeue_script( 'wp-embed' );
	// Include particles feature.
	wp_enqueue_script( 'particles', 'http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js', array(), '1.0.0', true );
	// Include font.
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap', array(), '1.0.0' );
	// Include theme styles and scripts.
	wp_enqueue_style( 'cndev', CNDEV_URI . '/build/style-index.css', array(), '1.0.0' );
	wp_enqueue_script( 'cndev', CNDEV_URI . '/build/index.js', array( 'jquery' ), '1.0.0', true );
}

add_action( 'wp_head', 'cndev_fontawesome' );
function cndev_fontawesome() {
	?>
	<script src="https://kit.fontawesome.com/13ca972e4c.js" crossorigin="anonymous"></script>
	<?php
}

// Remove default emoji support.
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
// Remove default RSS feed links.
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );
