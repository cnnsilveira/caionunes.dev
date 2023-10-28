<?php
/**
 * Caionunes.dev
 *
 * Manipulates the admin bar and admin area content.
 *
 * @package Portfolio
 * @author  Caio Nunes
 * @license GPL-3.0
 * @link    https://github.com/cnnsilveira/caionunes.dev
 */

add_action( 'admin_menu', 'cndev_admin_menu' );
/**
 * Removes items from the admin area sidebar.
 *
 * @package Portfolio
 */
function cndev_admin_menu() {

	remove_menu_page( 'index.php' );               // Dashboard.
	remove_menu_page( 'edit.php' );                // Posts.
	remove_menu_page( 'edit-comments.php' );       // Comments.
	remove_menu_page( 'themes.php' );              // Appearance.
	remove_menu_page( 'users.php' );               // Users.
	remove_menu_page( 'tools.php' );               // Tools.
	// remove_menu_page( 'upload.php' );              // Media.
	// remove_menu_page( 'edit.php?post_type=page' ); // Pages.
	// remove_menu_page( 'plugins.php' );          // Plugins.
	// remove_menu_page( 'options-general.php' );  // Settings.
}

add_action( 'wp_before_admin_bar_render', 'cndev_admin_bar' );
/**
 * Changes the admin bar items.
 *
 * @package Portfolio
 */
function cndev_admin_bar() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu( 'site-name' );
	$wp_admin_bar->remove_menu( 'new-content' );
	$wp_admin_bar->remove_menu( 'archive' );
	$wp_admin_bar->remove_menu( 'comments' );
	$wp_admin_bar->remove_menu( 'edit' );
	$wp_admin_bar->remove_menu( 'customize' );
	$wp_admin_bar->remove_menu( 'wp-logo' );
	$wp_admin_bar->remove_menu( 'search' );
	$wp_admin_bar->remove_menu( 'view' );
	$wp_admin_bar->add_menu(
		array(
			'id'     => 'home',
			'parent' => null,
			'group'  => null,
			'title'  => '<span class="cndev_admin-bar-item dashicons dashicons-admin-home"></span>' . __( 'Front', 'project' ),
			'href'   => home_url(),
			'meta'   => array(
				'title' => __( 'Front', 'project' ),
			),
		)
	);
	$wp_admin_bar->add_menu(
		array(
			'id'     => 'projects',
			'parent' => null,
			'group'  => null,
			'title'  => '<span class="cndev_admin-bar-item dashicons dashicons-schedule"></span>' . _x( 'Projects', 'Post type general name', 'project' ),
			'href'   => admin_url( 'edit.php?post_type=projects' ),
			'meta'   => array(
				'title' => __( 'Projects', 'project' ),
			),
		)
	);
}

add_action( 'admin_head', 'cndev_admin_bar_icon' ); // Back-end.
add_action( 'wp_head', 'cndev_admin_bar_icon' );    // Front-end.
/**
 * CSS for "Projects" icon on admin bar.
 *
 * @package Portfolio
 */
function cndev_admin_bar_icon() {
	if ( is_admin_bar_showing() ) {
		?>
		<style type="text/css">
			#wpadminbar .cndev_admin-bar-item.dashicons {
				font-family: dashicons !important;
				display: inline-block !important;
				line-height: 1 !important;
				font-weight: 400 !important;
				font-style: normal !important;
				text-decoration: inherit !important;
				text-transform: none !important;
				text-rendering: auto !important;
				-webkit-font-smoothing: antialiased !important;
				-moz-osx-font-smoothing: grayscale !important;
				width: 18px !important;
				height: 18px !important;
				font-size: 18px !important;
				vertical-align: center !important;
				text-align: center !important;
				position: relative !important;
				font: normal 18px/1 dashicons !important;
				padding: 4px 0 !important;
				background-image: none!important;
				margin-right: 6px !important;
				color: rgba(240,246,252,.6) !important;
				top: 3px !important;
			}
			#wpadminbar li:hover .cndev_admin-bar-item.dashicons {
				color: #72aee6 !important;
			}
		</style>
		<?php
	}
}

if ( ! is_admin() ) {
	add_filter( 'show_admin_bar', 'cndev_remove_wp_admin_bar' );
	function cndev_remove_wp_admin_bar() {
		return false;
	}
}
