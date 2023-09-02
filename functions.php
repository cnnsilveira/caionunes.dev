<?php 
function custom_css() {
    wp_enqueue_style( 'custom-style', get_stylesheet_directory_uri() . '/assets/css/custom.css' );
}
add_action( 'wp_enqueue_scripts', 'custom_css' );

function custom_js() {
	wp_enqueue_script( 'custom', get_stylesheet_directory_uri().'/assets/js/custom.js', array('jquery'), false, false );
}
add_action( 'wp_enqueue_scripts', 'custom_js');

?>