<?php
/**
 * Caionunes.dev
 *
 * All theme's functionalities are being defined on /inc/ folder.
 * functions.php only connect them to WordPress.
 *
 * @package Portfolio
 * @author  Caio Nunes
 * @license GPL-3.0
 * @link    https://github.com/cnnsilveira/caionunes.dev
 */

// Constants.
define( 'CNDEV_DIR', get_template_directory() );
define( 'CNDEV_URI', get_template_directory_uri() );
define( 'CNDEV_IMG', CNDEV_URI . '/inc/assets/img' );
define( 'CNDEV_INC', CNDEV_DIR . '/inc' );
define( 'CNDEV_ADMIN', CNDEV_INC . '/admin' );
define( 'CNDEV_FUNCTIONS', CNDEV_INC . '/functions' );

// WP bars.
require_once CNDEV_ADMIN . '/wp-bars.php';
// Custom post type.
require_once CNDEV_ADMIN . '/post-type.php';
// Custom fields.
require_once CNDEV_ADMIN . '/custom-fields.php';

// Helper functions.
require_once CNDEV_FUNCTIONS . '/helper-functions.php';
// Body classes.
require_once CNDEV_FUNCTIONS . '/body-class.php';
// Enqueues.
require_once CNDEV_FUNCTIONS . '/enqueues.php';
