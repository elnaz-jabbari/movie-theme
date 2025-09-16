<?php
function movie_theme_enqueue_styles() {
    // استایل اصلی تم (style.css)
    wp_enqueue_style( 'movie-style', get_stylesheet_uri() );

    // Bootstrap CSS
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '5.3.2' );

    // Bootstrap JS (bundle شامل Popper)
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(), '5.3.2', true );
}
add_action( 'wp_enqueue_scripts', 'movie_theme_enqueue_styles' );
