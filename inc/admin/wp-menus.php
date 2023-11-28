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

add_action( 'admin_menu', 'cndev__admin_menu' );
/**
 * Removes items from the admin area sidebar.
 *
 * @package Portfolio
 */
function cndev__admin_menu() {
	// Removing default WP items.
	remove_menu_page( 'index.php' );                  // Dashboard.
	remove_menu_page( 'edit.php' );                   // Posts.
	remove_menu_page( 'edit-comments.php' );          // Comments.
	remove_menu_page( 'themes.php' );                 // Appearance.
	remove_menu_page( 'users.php' );                  // Users.
	remove_menu_page( 'tools.php' );                  // Tools.
	// remove_menu_page( 'upload.php' );              // Media.
	// remove_menu_page( 'edit.php?post_type=page' ); // Pages.
	// remove_menu_page( 'plugins.php' );             // Plugins.
	// remove_menu_page( 'options-general.php' );     // Settings.

	// Adding custom menu for the front page options.
	add_menu_page( __( 'Front page', 'cndev' ), __( 'Front page', 'cndev' ), 'manage_options', 'cndev-front-page', 'cndev__admin_settings_page', 'dashicons-buddicons-groups', 1 );
		add_submenu_page( 'cndev-front-page', __( 'Hero section', 'cndev' ), __( 'Hero section', 'cndev' ), 'manage_options', 'cndev-front-page', 'cndev__admin_settings_page' );
		add_submenu_page( 'cndev-front-page', __( 'About me', 'cndev' ), __( 'About me', 'cndev' ), 'manage_options', 'cndev-about-me', 'cndev__admin_settings_page' );
		add_submenu_page( 'cndev-front-page', __( 'Projects', 'cndev' ), __( 'Projects', 'cndev' ), 'manage_options', 'cndev-projects', 'cndev__admin_settings_page' );
		add_submenu_page( 'cndev-front-page', __( 'Contact', 'cndev' ), __( 'Contact', 'cndev' ), 'manage_options', 'cndev-contact', 'cndev__admin_settings_page' );
}

function cndev__admin_settings_page() {
	global $menu;
	echo '<pre>';
	print_r( get_current_screen() );
	echo '</pre>';
	echo '<div class="wrap">';
	echo '<p>Here is where the form would go if I actually had options.</p>';
	echo '</div>';
}

add_action( 'wp_before_admin_bar_render', 'cndev__admin_bar' );
/**
 * Changes the admin bar items.
 *
 * @package Portfolio
 */
function cndev__admin_bar() {
	global $wp_admin_bar;
	// Removing default.
	$wp_admin_bar->remove_menu( 'site-name' );
	$wp_admin_bar->remove_menu( 'new-content' );
	$wp_admin_bar->remove_menu( 'archive' );
	$wp_admin_bar->remove_menu( 'comments' );
	$wp_admin_bar->remove_menu( 'edit' );
	$wp_admin_bar->remove_menu( 'customize' );
	$wp_admin_bar->remove_menu( 'wp-logo' );
	$wp_admin_bar->remove_menu( 'search' );
	$wp_admin_bar->remove_menu( 'view' );

	// Adding custom.
	$wp_admin_bar->add_menu(
		array(
			'id'     => 'home',
			'parent' => null,
			'group'  => null,
			'title'  => '<span class="cndev__admin-bar-item dashicons dashicons-admin-home"></span>' . __( 'Front', 'project' ),
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
			'title'  => '<span class="cndev__admin-bar-item dashicons dashicons-schedule"></span>' . _x( 'Projects', 'Post type general name', 'project' ),
			'href'   => admin_url( 'edit.php?post_type=projects' ),
			'meta'   => array(
				'title' => __( 'Projects', 'project' ),
			),
		)
	);
}

if ( ! is_admin() ) {
	add_filter( 'show_admin_bar', 'cndev__remove_wp_admin_bar' );
	function cndev__remove_wp_admin_bar() {
		return false;
	}
}
