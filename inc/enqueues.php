<?php

add_action( 'wp_enqueue_scripts', 'cndev_enqueues' );

function cndev_enqueues() {
    wp_enqueue_style( 'cndev', CNDEV_URI . '/build/style-index.css' );
    wp_enqueue_script('cndev', CNDEV_URI . '/build/index.js', array('jquery'), '1.0', true);
}