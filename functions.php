<?php
function add_custom_css() {
    wp_enqueue_style( 'theme-style', get_stylesheet_directory_uri() . '/style.min.css' );
    wp_dequeue_style( 'twentythirteen-style' );

    // fonts
    wp_dequeue_style( 'twentythirteen-fonts' );
    wp_deregister_style( 'open-sans' );
    wp_register_style( 'open-sans', false ); // dependency workaround from https://gist.github.com/thetrickster/8946567
    wp_dequeue_style( 'bitter' );
}
add_action( 'wp_print_styles', 'add_custom_css' );

function remove_custom_header() {
    remove_theme_support( 'custom-header' );
    remove_custom_image_header();
}
add_action( 'after_setup_theme', 'remove_custom_header', 12 );

// add footer widget sizes
add_image_size( 'home_quick_link', '228', '137' );

// check for existence of backgorund image and add to post_class
function add_custom_background_class( $classes ) {
    global $post;
    if ( defined( get_field ) ) { // conditional check for ACF installation
        if ( get_field( 'background_image', $post->ID ) ) {
            $classes[] = 'custom-background';
        }
    }
    return $classes;
}
add_filter( 'post_class', 'add_custom_background_class' );

include('functions-branding.php');
