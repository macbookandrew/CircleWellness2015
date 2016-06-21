<?php
// use minified CSS
function add_custom_css() {
    wp_enqueue_style( 'theme-style', get_stylesheet_directory_uri() . '/CircleWellness.css' );
    wp_dequeue_style( 'twentythirteen-style' );
    wp_enqueue_style( 'dashicons' );

    // fonts
    wp_dequeue_style( 'twentythirteen-fonts' );
    wp_deregister_style( 'open-sans' );
    wp_register_style( 'open-sans', false ); // dependency workaround from https://gist.github.com/thetrickster/8946567
    wp_dequeue_style( 'bitter' );
}
add_action( 'wp_print_styles', 'add_custom_css' );

// remove script and style version numbers
function script_loader_src_example( $src ) {
    return remove_query_arg( 'ver', $src );
}
add_filter( 'script_loader_src', 'script_loader_src_example' );
add_filter( 'style_loader_src', 'script_loader_src_example' );

// remove custom header support
function remove_custom_header() {
    remove_theme_support( 'custom-header' );
}
add_action( 'after_setup_theme', 'remove_custom_header', 12 );

// add footer widget sizes
add_image_size( 'home_quick_link', '500', '200', true );
add_image_size( 'home_quick_link_large', '1000', '400', true );

// check for existence of background image and add to post_class
function add_custom_background_class( $classes ) {
    global $post;
    if ( class_exists( 'acf' ) ) { // conditional check for ACF installation
        if ( get_field( 'background_image', $post->ID ) ) {
            array_push( $classes, 'custom-background' );
        }
    }
    return $classes;
}
add_filter( 'post_class', 'add_custom_background_class' );

// add javascript functions
function js_functions() {
    wp_enqueue_script( 'theme-js-functions', get_stylesheet_directory_uri() . '/js/functions.min.js', array( 'jquery' ) );
}
add_filter( 'wp_enqueue_scripts', 'js_functions' );

// style the visual editor with editor-style.css to match the theme style
add_editor_style();

// include ARMD branding
include('functions-branding.php');

// add header widget area
function add_header_widget_area() {
    register_sidebar( array(
        'name'          => 'Header Widget Area',
        'id'            => 'header-sidebar',
        'description'   => 'Widget area in the site header',
        'class'         => 'header-sidebar',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
    ));
}
add_action( 'widgets_init', 'add_header_widget_area' );
