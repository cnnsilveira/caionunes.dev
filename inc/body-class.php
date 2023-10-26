<?php
/**
 * Caionunes.dev
 *
 * Filter and remove classes from the body tag.
 *
 * @package Portfolio
 * @author  Caio Nunes
 * @license GPL-3.0
 * @link    https://github.com/cnnsilveira/caionunes.dev
 */

add_filter( 'body_class', 'cndev_body_classes', 10, 2 );
/**
 * Modifies the body classes.
 *
 * @param array $wp_classes WordPress body classes.
 * @param array $extra_classes Additional body classes.
 *
 * @return array $wp_classes Modified body classes.
 *
 * @package Portfolio
 */
function cndev_body_classes( $wp_classes, $extra_classes ) {

	$whitelist = array( 'home', 'error404', 'admin-bar' );

	$wp_classes = array_intersect( $wp_classes, $whitelist );

	$wp_classes = array_merge( $wp_classes, (array) $extra_classes );

	$wp_classes[] = 'cndev';

	return $wp_classes;
}
