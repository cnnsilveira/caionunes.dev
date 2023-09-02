<?php
/**
 * caionunes.dev
 *
 * This file removes default WP code that is not being used
 * 
 * Credit: https://gist.github.com/alexander-young/b0471a7a3451e56dbb8a7245ef293343
 *
 * @package Portfolio
 * @author  Caio Nunes
 * @license GPL-3.0
 * @link    https://github.com/cnnsilveira/caionunes.dev
 */

// Remove emoji support
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

// Remove RSS feed links
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );

// Remove embeded links
add_action( 'wp_footer', function () {
    wp_dequeue_script( 'wp-embed' );
});

add_action( 'wp_enqueue_scripts', function () {
    // Remove default CSS variables
    wp_dequeue_style( 'classic-theme-styles' );
    wp_dequeue_style( 'global-styles' );

    // Remove block library CSS
    wp_dequeue_style( 'wp-block-library' );

    // Remove comment reply JS
    wp_dequeue_script( 'comment-reply' );
});