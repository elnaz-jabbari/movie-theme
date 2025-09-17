<?php
get_header();
?>

<?php get_header(); ?>

<?php get_header(); ?>

<div class="container my-4">
    <div class="row">
        <?php
        // گرفتن شماره صفحه فعلی
        $paged = max( 1, get_query_var('paged'), get_query_var('page') );

        // کوئری فیلم‌ها
        $args = array(
            'post_type'      => 'movie',
            'posts_per_page' => 5,
            'paged'          => $paged,
            'post_status'    => 'publish',
        );
        $movies = new WP_Query($args);

        if ( $movies->have_posts() ) :
            while ( $movies->have_posts() ) : $movies->the_post(); ?>
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card h-100 movie-card">
                        <a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()) {
                                the_post_thumbnail('medium', ['class'=>'card-img-top']);
                            } ?>
                        </a>
                        <div class="card-body bg-dark text-white">
                            <h5 class="card-title">
                                <a href="<?php the_permalink(); ?>" class="text-white text-decoration-none">
                                    <?php the_title(); ?>
                                </a>
                            </h5>

                            <p class="mb-1"><strong>سال انتشار:</strong> <?php the_field('movie_year');?></p>
                            <p class="mb-1"><strong>ژانر:</strong>
                                <?php
                                $terms = get_the_terms(get_the_ID(), 'movie_genre');
                                if ( $terms && !is_wp_error($terms) ) {
                                    $genres = wp_list_pluck( $terms, 'name' );
                                    echo esc_html( implode(', ', $genres) );
                                }
                                ?>
                            </p>
                            <p class="card-text small"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>

            <!-- صفحه‌بندی -->
            <div class="col-12">
                <?php
                $total_pages = $movies->max_num_pages;

                if ($total_pages > 1) {
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                    echo '<nav aria-label="صفحه‌بندی">';
                    echo '<ul class="pagination justify-content-center flex-wrap">';

                    // دکمه قبلی
                    if ($paged > 1) {
                        echo '<li class="page-item">';
                        echo '<a class="page-link" href="' . get_pagenum_link($paged - 1) . '" aria-label="قبلی">&laquo; قبلی</a>';
                        echo '</li>';
                    }

                    // شماره صفحات
                    for ($i = 1; $i <= $total_pages; $i++) {
                        $active = ($i == $paged) ? ' active' : '';
                        echo '<li class="page-item' . $active . '">';
                        echo '<a class="page-link" href="' . get_pagenum_link($i) . '">' . $i . '</a>';
                        echo '</li>';
                    }

                    // دکمه بعدی
                    if ($paged < $total_pages) {
                        echo '<li class="page-item">';
                        echo '<a class="page-link" href="' . get_pagenum_link($paged + 1) . '" aria-label="بعدی">بعدی &raquo;</a>';
                        echo '</li>';
                    }

                    echo '</ul>';
                    echo '</nav>';
                }
                ?>

            </div>

        <?php else : ?>
            <p class="text-center text-white">هیچ فیلمی پیدا نشد.</p>
        <?php endif; wp_reset_postdata(); ?>
    </div>
</div>

<?php get_footer(); ?>




<?php get_footer(); ?>

