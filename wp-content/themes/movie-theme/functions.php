<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function movie_theme_enqueue_styles() {
    wp_enqueue_style( 'movie-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'movie_theme_enqueue_styles' );


// ========================
// Custom Post Type: Movie
// ========================
function movie_theme_register_cpt() {

    $labels = array(
        'name'               => 'فیلم‌ها',
        'singular_name'      => 'فیلم',
        'menu_name'          => 'فیلم‌ها',
        'add_new_item'       => 'افزودن فیلم جدید',
        'edit_item'          => 'ویرایش فیلم',
        'new_item'           => 'فیلم جدید',
        'view_item'          => 'مشاهده فیلم',
        'all_items'          => 'همه فیلم‌ها',
        'search_items'       => 'جستجوی فیلم‌ها',
        'not_found'          => 'هیچ فیلمی پیدا نشد',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => array('slug' => 'movie'), // URL انگلیسی
        'menu_icon'          => 'dashicons-video-alt2',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'show_in_rest'       => true, // فعال برای گوتنبرگ
        'menu_position'      => 5,
        'capability_type'    => 'post',
    );

    register_post_type('movie', $args);
}
add_action('init', 'movie_theme_register_cpt');


function movie_theme_setup() {
    add_theme_support('post-thumbnails');
}


add_action('after_setup_theme', 'movie_theme_setup');