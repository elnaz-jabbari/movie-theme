<?php
get_header();
?>

<main>
    <h1 style="text-align:center; margin-bottom:20px;">فیلم‌ها</h1>

    <?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
        'post_type' => 'movie',
        'posts_per_page' => 5,
        'paged' => $paged
    );
    $movie_query = new WP_Query($args);

    if ($movie_query->have_posts()) :
        echo '<div class="movies-list" style="display:flex; flex-wrap:wrap; gap:20px;">';
        while ($movie_query->have_posts()) : $movie_query->the_post();
            ?>
            <article class="movie-item" style="width:calc(33% - 20px); background:#fff; padding:10px; border-radius:8px; box-shadow:0 2px 6px rgba(0,0,0,0.1);">
                <a href="<?php the_permalink(); ?>" style="text-decoration:none; color:#000;">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('medium', array('style'=>'width:100%; border-radius:5px;')); ?>
                    <?php endif; ?>
                    <h2 style="margin:10px 0;"><?php the_title(); ?></h2>
                </a>
                <p><?php the_excerpt(); ?></p>
            </article>
            <?php
        endwhile;
        echo '</div>';

        // Pagination
        $big = 999999999;
        echo '<div class="pagination" style="margin-top:30px; text-align:center;">';
        echo paginate_links(array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $movie_query->max_num_pages,
            'prev_text' => '« قبلی',
            'next_text' => 'بعدی »',
        ));
        echo '</div>';

        wp_reset_postdata();
    else :
        echo '<p style="text-align:center;">هیچ فیلمی پیدا نشد.</p>';
    endif;
    ?>
</main>

<?php get_footer(); ?>
