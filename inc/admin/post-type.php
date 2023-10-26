<?php
/**
 * Caionunes.dev
 *
 * Creates the Projects post type.
 *
 * @package Portfolio
 * @author  Caio Nunes
 * @license GPL-3.0
 * @link    https://github.com/cnnsilveira/caionunes.dev
 */

add_action( 'init', 'cndev_project_post_type' );
/**
 * Creates the Projects post type.
 *
 * @package Portfolio
 */
function cndev_project_post_type() {
	$labels = array(
		'name'                  => _x( 'Projects', 'Projects post type general name', 'project' ),
		'singular_name'         => _x( 'Project', 'Projects post type singular name', 'project' ),
		'menu_name'             => _x( 'Projects', 'Admin Menu text', 'project' ),
		'name_admin_bar'        => _x( 'Project', 'Add New on Toolbar', 'project' ),
		'add_new'               => __( 'Add New', 'project' ),
		'add_new_item'          => __( 'Add New Project', 'project' ),
		'new_item'              => __( 'New project', 'project' ),
		'edit_item'             => __( 'Edit project', 'project' ),
		'view_item'             => __( 'View project', 'project' ),
		'all_items'             => __( 'All projects', 'project' ),
		'search_items'          => __( 'Search projects', 'project' ),
		'parent_item_colon'     => __( 'Parent projects:', 'project' ),
		'not_found'             => __( 'No project found.', 'project' ),
		'not_found_in_trash'    => __( 'No project found in Trash.', 'project' ),
		'featured_image'        => _x( 'Project image', 'Overrides the “Featured Image” phrase for this Projects post type.', 'project' ),
		'set_featured_image'    => _x( 'Set image', 'Overrides the “Set featured image” phrase for this Projects post type.', 'project' ),
		'remove_featured_image' => _x( 'Remove image', 'Overrides the “Remove featured image” phrase for this Projects post type.', 'project' ),
		'use_featured_image'    => _x( 'Use as image', 'Overrides the “Use as featured image” phrase for this Projects post type.', 'project' ),
		'archives'              => _x( 'Project archives', 'The Projects post type archive label used in nav menus. Default “Post Archives”.', 'project' ),
		'insert_into_item'      => _x( 'Insert into project', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post).', 'project' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this project', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post).', 'project' ),
		'filter_items_list'     => _x( 'Filter projects list', 'Screen reader text for the filter links heading on the Projects post type listing screen. Default “Filter posts list”/”Filter pages list”.', 'project' ),
		'items_list_navigation' => _x( 'Projects list navigation', 'Screen reader text for the pagination heading on the Projects post type listing screen. Default “Posts list navigation”/”Pages list navigation”.', 'project' ),
		'items_list'            => _x( 'projects list', 'Screen reader text for the items list heading on the Projects post type listing screen. Default “Posts list”/”Pages list”.', 'project' ),
	);
	$args   = array(
		'labels'             => $labels,
		'description'        => 'Portfolio projects.',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'menu_icon'          => 'dashicons-schedule',
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'project' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 5,
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
		'show_in_rest'       => true,
	);

	register_post_type( 'projects', $args );
	add_theme_support( 'post-thumbnails' );
}

add_action( 'init', 'cndev_projects_taxonomies' );
/**
 * Creates the Projects taxonomy.
 *
 * @package Portfolio
 */
function cndev_projects_taxonomies() {
	// Technologies.
	$tech_labels = array(
		'name'          => _x( 'Technologies', 'project' ),
		'singular_name' => _x( 'Technology', 'project' ),
		'menu_name'     => _x( 'Technologies', 'project' ),
		'all_items'     => _x( 'All Technologies', 'project' ),
		'edit_item'     => _x( 'Edit Technology', 'project' ),
		'view_item'     => _x( 'View Technology', 'project' ),
		'update_item'   => _x( 'Update Technology', 'project' ),
		'add_new_item'  => _x( 'Add New Technology', 'project' ),
		'new_item_name' => _x( 'New Technology Name', 'project' ),
		'search_items'  => _x( 'Search Technologies', 'project' ),
		'popular_items' => _x( 'Popular Technologies', 'project' ),
	);
	$tech        = array(
		'labels'            => $tech_labels,
		'description'       => 'Technologies used on the projects.',
		'hierarchical'      => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'show_in_rest'      => true,
		'rewrite'           => array( 'slug' => 'technologies' ),
	);
	register_taxonomy( 'technologies', 'projects', $tech );

	// Purposes.
	$purpose_labels = array(
		'name'          => _x( 'Purposes', 'project' ),
		'singular_name' => _x( 'Purpose', 'project' ),
		'menu_name'     => _x( 'Purposes', 'project' ),
		'all_items'     => _x( 'All Purposes', 'project' ),
		'edit_item'     => _x( 'Edit Purpose', 'project' ),
		'view_item'     => _x( 'View Purpose', 'project' ),
		'update_item'   => _x( 'Update Purpose', 'project' ),
		'add_new_item'  => _x( 'Add New Purpose', 'project' ),
		'new_item_name' => _x( 'New Purpose Name', 'project' ),
		'search_items'  => _x( 'Search Purposes', 'project' ),
		'popular_items' => _x( 'Popular Purposes', 'project' ),
	);
	$purpose        = array(
		'labels'            => $purpose_labels,
		'description'       => 'Purpose of the project creation.',
		'hierarchical'      => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'show_in_rest'      => true,
		'rewrite'           => array( 'slug' => 'purposes' ),
	);
	register_taxonomy( 'purposes', 'projects', $purpose );
}
