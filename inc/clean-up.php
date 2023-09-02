<?php
/**
 * caionunes.dev
 *
 * This file removes default WP code that is not being used.
 * 
 * Reference: https://gist.github.com/alexander-young/b0471a7a3451e56dbb8a7245ef293343
 *
 * @author  Caio Nunes
 * @license GPL-3.0
 * @link    https://github.com/cnnsilveira/caionunes.dev
 * 
 */

// Remove emoji support
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// Remove RSS feed links
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );