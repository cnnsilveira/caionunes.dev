<?php

add_action( 'wp_enqueue_scripts', 'cndev_enqueues' );

function cndev_enqueues() {
    wp_enqueue_style( 'cndev', CNDEV_URI . '/inc/assets/style.min.css' );
    wp_enqueue_script('cndev', CNDEV_URI . '/inc/assets/scripts.min.js', array('jquery'), '1.0', true);
}