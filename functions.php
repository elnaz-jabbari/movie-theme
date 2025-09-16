<?php
function movie_theme_enqueue_styles() {
    // استایل اصلی تم (style.css)
    wp_enqueue_style(
        'movie-style',
        get_stylesheet_uri(),
        array(),
        filemtime(get_stylesheet_directory() . '/style.css')
    );

    // Bootstrap CSS
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.rtl.min.css', array(), '5.3.2' );

    // Bootstrap JS (bundle شامل Popper)
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(), '5.3.2', true );
}
add_action( 'wp_enqueue_scripts', 'movie_theme_enqueue_styles' );

// ثبت منو در تم
function movie_theme_register_menus() {
    register_nav_menus(array(
        'header-menu' => 'منوی هدر',
    ));
}
add_action('after_setup_theme', 'movie_theme_register_menus');

// فعال کردن قابلیت لوگو در تم
function movie_theme_setup() {
    add_theme_support('custom-logo', array(
        'height'      => 60,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ));
}
add_action('after_setup_theme', 'movie_theme_setup');


// ********************
// Custom Post Type: Movie
// ********************
function movie_theme_register_cpt() {
    $labels = array(
        'name' => 'فیلم‌ها',
        'singular_name' => 'فیلم',
        'menu_name' => 'فیلم‌ها',
        'add_new' => 'افزودن فیلم جدید',
        'add_new_item' => 'افزودن فیلم جدید',
        'edit_item' => 'ویرایش فیلم',
        'new_item' => 'فیلم جدید',
        'view_item' => 'نمایش فیلم',
        'all_items' => 'همه فیلم‌ها',
        'search_items' => 'جستجوی فیلم‌ها',
        'not_found' => 'فیلمی یافت نشد',
        'not_found_in_trash' => 'فیلمی در سطل زباله یافت نشد',
    );

    $args = array(
        'label' => 'فیلم',
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail'),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array(
            'slug' => 'movies',
            'with_front' => false
        ),
        'menu_icon' => 'dashicons-format-video',
        'taxonomies' => array('movie_genre'),
    );

    register_post_type('movie', $args);
}
add_action('init', 'movie_theme_register_cpt', 0);


// ********************
// Custom Taxonomy: Movie Genre
// ********************
function movie_theme_register_taxonomy() {
    $labels = array(
        'name' => 'ژانرها',
        'singular_name' => 'ژانر',
        'search_items' => 'جستجوی ژانرها',
        'all_items' => 'همه ژانرها',
        'edit_item' => 'ویرایش ژانر',
        'update_item' => 'به‌روزرسانی ژانر',
        'add_new_item' => 'افزودن ژانر جدید',
        'new_item_name' => 'نام ژانر جدید',
        'menu_name' => 'ژانرها',
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
    );

    register_taxonomy('movie_genre', array('movie'), $args);
}
add_action('init', 'movie_theme_register_taxonomy', 0);
// فعال کردن پشتیبانی از تصویر شاخص
add_theme_support('post-thumbnails');


function my_frontpage_pagination_fix( $query ) {
    if ( $query->is_main_query() && !is_admin() && is_front_page() ) {
        $paged = get_query_var('paged') ? get_query_var('paged') : ( get_query_var('page') ? get_query_var('page') : 1 );
        $query->set( 'paged', $paged );
    }
}
add_action( 'pre_get_posts', 'my_frontpage_pagination_fix' );

