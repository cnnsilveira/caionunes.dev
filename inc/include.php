<?php

/**
 *	---------------------------------------------------------------------
 *	Requires all functionalities
 *	---------------------------------------------------------------------
 */
require_once CNDEV_INC . '/defaults/clean-up.php';    // Remove unused WP head and footer scripts
require_once CNDEV_INC . '/templates/front-page.php'; // Create theme front page template

/**
 *	---------------------------------------------------------------------
 *	Enqueues scripts and styles
 *	---------------------------------------------------------------------
 */
add_action( 'wp_enqueue_scripts', 'cndev_enqueues' );
/**
 * caionunes.dev
 *
 * Enqueues scripts and styles after compiling and minifing
 *
 * @package Portfolio
 * @author  Caio Nunes
 * @license GPL-3.0
 * @link    https://github.com/cnnsilveira/caionunes.dev
 */
function cndev_enqueues() {
    wp_enqueue_style( 'cndev', CNDEV_URI . '/inc/assets/style.min.css' );
    wp_enqueue_script('cndev', CNDEV_URI . '/inc/assets/scripts.min.js', array('jquery'), '1.0', true);
}