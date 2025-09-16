<?php get_header(); ?>

<main style="max-width:900px; margin:30px auto; direction:rtl; font-family: 'Tahoma','Vazir',sans-serif;">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <article style="display:flex; flex-wrap:wrap; gap:20px; background:#fff; padding:20px; border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.1);">
            
            <!-- پوستر فیلم -->
            <div style="flex:1 1 300px;">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('large', array('style'=>'width:100%; border-radius:5px;')); ?>
                <?php endif; ?>
            </div>

            <!-- اطلاعات فیلم -->
            <div style="flex:2 1 400px;">
                <h1 style="margin-bottom:10px;"><?php the_title(); ?></h1>

                <!-- سال انتشار -->
                <p>
                    <strong>سال انتشار:</strong>
                    <?php
                    $years = wp_get_post_terms(get_the_ID(), 'year', array('fields'=>'names'));
                    echo $years ? implode(', ', $years) : 'نامشخص';
                    ?>
                </p>

                <!-- ژانرها -->
                <p>
                    <strong>ژانر:</strong>
                    <?php
                    $genres = wp_get_post_terms(get_the_ID(), 'genre', array('fields'=>'names'));
                    echo $genres ? implode(', ', $genres) : 'نامشخص';
                    ?>
                </p>

                <!-- خلاصه / توضیحات -->
                <div style="margin-top:15px;">
                    <?php the_content(); ?>
                </div>
            </div>

        </article>

    <?php endwhile; endif; ?>

</main>

<?php get_footer(); ?>
