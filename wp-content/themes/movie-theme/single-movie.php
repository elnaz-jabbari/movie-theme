<?php
get_header();
?>

<div class="container my-5">
    <div class="row">
        <div class="col-12 text-end d-flex align-items-center justify-content-end">
            <button class=" d-flex align-items-center justify-content-center return-btn text-white">
                <span>بازگشت</span>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Vector%20(Stroke).svg" alt="آیکون">

            </button>
        </div>
    </div>
    <div class="row d-block d-md-flex">
        <div class="col-12 col-md-4 d-flex align-items-center justify-content-start gap-4">
            <div>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Movie%20Resolutions.png" alt="آیکون">
            </div>
            <div class="text-white">
                <div class="title-section"> <?php the_title()?></div>
                <div>فیلم ال کامینو</div>
            </div>
        </div>
        <div class="col-12 col-md-8 d-flex align-items-center justify-content-center justify-content-between">
            <div class="dropdown d-none d-md-block">
                <button class="button-quality btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    1080p - webdl  کیفیت
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">720p - webdl  کیفیت </a></li>
                    <li><a class="dropdown-item" href="#">480p - webdl  کیفیت </a></li>
                    <li><a class="dropdown-item" href="#">480p - webdl  کیفیت </a></li>
                </ul>
            </div>
            <div>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Rating.png" alt="آیکون">
            </div>
            <div class="d-flex align-items-center justify-content-center text-white">
                <span>10</span> /  <span class="fw-bold fs-4">4.5</span>
                <img class="ms-2" src="<?php echo get_template_directory_uri(); ?>/assets/images/IMDB.png" alt="آیکون">
            </div>
            <div class="d-none d-md-block">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon05.svg" alt="آیکون">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon06.svg" alt="آیکون">
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12 col-md-8">
            <div class="video-player bg-dark position-relative" style="border-radius:6px; overflow:hidden;">

                <!-- تگ ویدیو -->
                <video id="myVideo" class="w-100 d-block" poster="PATH_TO_POSTER.jpg" preload="metadata">
                    <!-- می‌تونی چند منبع بذاری -->
                    <source src="PATH_TO_VIDEO.mp4" type="video/mp4">
                    مرورگر شما تگ ویدیو را پشتیبانی نمی‌کند.
                </video>

                <!-- کنترل‌های سفارشی (روی لایه ویدیو) -->
                <div class="video-controls p-2" style="position:absolute; left:0; right:0; bottom:0; background: linear-gradient(transparent, rgba(0,0,0,0.6));">
                    <div class="d-flex align-items-center">
                        <!-- دکمه پخش / توقف -->
                        <button id="btnPlay" class="btn btn-sm btn-light me-2" aria-label="پخش/وقفه">
                            ▶
                        </button>

                        <!-- نوار پیشرفت -->
                        <input id="progress" type="range" min="0" max="100" value="0" step="0.1" style="flex:1; accent-color:#e33b3b;">

                        <!-- زمان -->
                        <small id="time" class="text-white ms-2 me-2" style="min-width:85px;">00:00 / 00:00</small>

                        <!-- ولوم -->
                        <input id="volume" type="range" min="0" max="1" step="0.05" value="1" style="width:100px;" title="صدا">

                        <!-- فول‌اسکرین -->
                        <button id="btnFull" class="btn btn-sm btn-light ms-2" aria-label="فول‌اسکرین">⤢</button>
                    </div>
                </div>

                <!-- دکمه بزرگ پخش وسط (ظاهر یوتیوب) -->
                <button id="bigPlay" class="btn btn-lg btn-outline-light" style="position:absolute; left:50%; top:50%; transform:translate(-50%,-50%); display:none; opacity:0.95;">
                    ▶
                </button>

            </div>
            <div class="d-block d-md-flex align-items-center justify-content-between mt-3">
                <div>

                    <button class="btn-video">پلیر تلوزیون های سامسونگ</button>
                    <button class="btn-video">پلیر تلوزیون های قدیمی</button>
                    <button class="btn-video">پلیر تلوزیون های قدیمی</button>
                </div>
                <div class="align-items-center justify-content-between d-flex my-3">
                    <span class="prob-txt">حین تماشا با مشکلی رو به رو شدید؟</span>
                    <a class="text-white prob-btn" href="#">اعلام مشکل</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 related-movies">
                <?php
                $args = array(
                    'post_type'      => 'movie',
                    'posts_per_page' => 3,
                    'post__not_in'   => array(get_the_ID()),
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                );
                $latest_movies = new WP_Query($args);

                if ($latest_movies->have_posts()) :
                    while ($latest_movies->have_posts()) : $latest_movies->the_post();
                        ?>
                        <div class="movie-box d-flex align-items-center mb-4">
                            <div class="movie-poster me-2">
                                <?php if (has_post_thumbnail()) {
                                    the_post_thumbnail('medium', ['class'=>'card-img-top']);
                                } ?>
                            </div>
                            <div class="movie-info w-100">
                                <h2 class="movie-title text-white"><?php the_title()?></h2>
                                <span class="color-gray d-block">6.5 per meter</span>
                                <p class="color-gray mb-1">
                                    <?php
                                    $terms = get_the_terms(get_the_ID(), 'movie_genre');
                                    if ( $terms && !is_wp_error($terms) ) {
                                        $genres = wp_list_pluck( $terms, 'name' );
                                        echo esc_html( implode(', ', $genres) );
                                    }
                                    ?>
                                </p>
                                <div class="d-flex align-items-center justify-content-between my-2">
                                    <span class="color-gray"><?php the_field('movie_year');?></span>
                                    <div>
                                        <span class="color-gray">(12 رای)</span>
                                        <span class="text-white">3.5</span>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/star.svg" alt="آیکون">
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="color-gray">
                                        <span>10</span> /  <span class="fw-bold fs-6 text-white">4.5</span>
                                        <img class="imdb-size" src="<?php echo get_template_directory_uri(); ?>/assets/images/IMDB.png" alt="آیکون">
                                    </div>
                                    <div class="color-gray">
                                        <span>10</span> /  <span class="fw-bold fs-6 text-white">6.5</span>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/rotten tomatoes.svg" alt="آیکون">
                                    </div>
                                    <div>
                                        <span class="fw-bold fs-6 text-white">45</span>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/metacritic.svg" alt="آیکون">
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p class="text-white">فیلمی یافت نشد.</p>';
                endif;
                ?>


        </div>
    </div>
</div>

<?php
get_footer();
?>
