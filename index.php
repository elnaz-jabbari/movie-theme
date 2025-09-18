<?php
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
