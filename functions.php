<?php
/**
 * caionunes.dev
 *
 * All theme's functionalities are being defined on /inc/ folder, functions.php only connect them to WordPress
 *
 * @package Portfolio
 * @author  Caio Nunes
 * @license GPL-3.0
 * @link    https://github.com/cnnsilveira/caionunes.dev
 */

// Theme constants
define ( 'CNDEV_DIR', get_template_directory()     );
define ( 'CNDEV_URI', get_template_directory_uri() );
define ( 'CNDEV_INC', CNDEV_DIR . '/inc/' );

// Installation clean up
require_once CNDEV_INC . 'include.php';
