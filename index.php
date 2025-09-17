<?php
<<<<<<< HEAD
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define( 'WP_USE_THEMES', true );

/** Loads the WordPress Environment and Template */
require __DIR__ . '/wp-blog-header.php';
=======
get_header();
?>

<h1> Movie Theme!</h1>

<?php
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        the_title('<h2>','</h2>');
        the_content();
    endwhile;
endif;

get_footer();
?>
>>>>>>> 0a77f60379d86f3635b789c06d9333394b7c68d5
