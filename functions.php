<?php 

add_action( 'wp_enqueue_scripts', 'theme_files');

function theme_files() {

    wp_enqueue_style( 'custom-style', get_stylesheet_directory_uri() . '/assets/css/custom.css' );

	wp_enqueue_script( 'custom', get_stylesheet_directory_uri().'/assets/js/custom.js', array('jquery'), false, false );

}