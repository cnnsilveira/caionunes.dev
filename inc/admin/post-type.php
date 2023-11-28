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

add_action( 'init', 'cndev__project_post_type' );
/**
 * Creates the Projects post type.
 *
 * @package Portfolio
 */
function cndev__project_post_type() {
	$labels = array(
		'name'                  => __( 'Projects', 'cndev' ),
		'singular_name'         => __( 'Project', 'cndev' ),
		'menu_name'             => __( 'Projects', 'cndev' ),
		'name_admin_bar'        => __( 'Project', 'cndev' ),
		'add_new'               => __( 'Add New', 'cndev' ),
		'add_new_item'          => __( 'Add New Project', 'cndev' ),
		'new_item'              => __( 'New project', 'cndev' ),
		'edit_item'             => __( 'Edit project', 'cndev' ),
		'view_item'             => __( 'View project', 'cndev' ),
		'all_items'             => __( 'All projects', 'cndev' ),
		'search_items'          => __( 'Search projects', 'cndev' ),
		'parent_item_colon'     => __( 'Parent projects:', 'cndev' ),
		'not_found'             => __( 'No project found.', 'cndev' ),
		'not_found_in_trash'    => __( 'No project found in Trash.', 'cndev' ),
		'featured_image'        => __( 'Project thumbnail', 'cndev' ),
		'set_featured_image'    => __( 'Set image', 'cndev' ),
		'remove_featured_image' => __( 'Remove image', 'cndev' ),
		'use_featured_image'    => __( 'Use as image', 'cndev' ),
		'archives'              => __( 'Project archives', 'cndev' ),
		'insert_into_item'      => __( 'Insert into project', 'cndev' ),
		'uploaded_to_this_item' => __( 'Uploaded to this project', 'cndev' ),
		'filter_items_list'     => __( 'Filter projects list', 'cndev' ),
		'items_list_navigation' => __( 'Projects list navigation', 'cndev' ),
		'items_list'            => __( 'projects list', 'cndev' ),
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
		'rewrite'            => array( 'slug' => 'cndev' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 2,
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
		'show_in_rest'       => true,
	);

	register_post_type( 'projects', $args );
	add_theme_support( 'post-thumbnails' );
}

add_action( 'init', 'cndev__projects_taxonomies' );
/**
 * Creates the Projects taxonomy.
 *
 * @package Portfolio
 */
function cndev__projects_taxonomies() {
	// Technologies.
	$tech_labels = array(
		'name'          => __( 'Technologies', 'cndev' ),
		'singular_name' => __( 'Technology', 'cndev' ),
		'menu_name'     => __( 'Technologies', 'cndev' ),
		'all_items'     => __( 'All Technologies', 'cndev' ),
		'edit_item'     => __( 'Edit Technology', 'cndev' ),
		'view_item'     => __( 'View Technology', 'cndev' ),
		'update_item'   => __( 'Update Technology', 'cndev' ),
		'add_new_item'  => __( 'Add New Technology', 'cndev' ),
		'new_item_name' => __( 'New Technology Name', 'cndev' ),
		'search_items'  => __( 'Search Technologies', 'cndev' ),
		'popular_items' => __( 'Popular Technologies', 'cndev' ),
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
		'name'          => __( 'Purposes', 'cndev' ),
		'singular_name' => __( 'Purpose', 'cndev' ),
		'menu_name'     => __( 'Purposes', 'cndev' ),
		'all_items'     => __( 'All Purposes', 'cndev' ),
		'edit_item'     => __( 'Edit Purpose', 'cndev' ),
		'view_item'     => __( 'View Purpose', 'cndev' ),
		'update_item'   => __( 'Update Purpose', 'cndev' ),
		'add_new_item'  => __( 'Add New Purpose', 'cndev' ),
		'new_item_name' => __( 'New Purpose Name', 'cndev' ),
		'search_items'  => __( 'Search Purposes', 'cndev' ),
		'popular_items' => __( 'Popular Purposes', 'cndev' ),
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
