<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>
    <div class="header-main">
        <div class="container">
            <div class="row align-items-center py-2">

                <!-- لوگو -->
                <div class="col-4 col-md-2 site-logo">
                    <?php
                    if (function_exists('the_custom_logo') && has_custom_logo()) {
                        the_custom_logo();
                    } else { ?>
                        <a href="<?php echo home_url(); ?>" class="navbar-brand text-white"><h1>سایت فیلم</h1></a>
                    <?php } ?>
                </div>

                <!-- منو -->
                <div class="col-4 col-md-7 text-center menu-h">
                    <nav class="d-none d-md-block">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'header-menu',
                            'container'      => false,
                            'menu_class'     => 'navbar-nav d-flex flex-row justify-content-start ',
                            'link_class'     => 'nav-link text-white px-3'
                        ));
                        ?>
                    </nav>
                    <div class="d-md-none d-block">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Menu.svg" alt="آیکون">

                    </div>
                </div>

                <!-- آیکون‌ها -->
                <div class="col-4 col-md-3 d-flex justify-content-center justify-content-md-start header-icons">
                    <a href="#" class="text-white mx-2">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon01.svg" alt="آیکون">
                    </a>
                    <a href="#" class="text-white mx-2 d-none d-md-block">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon02.svg" alt="آیکون">
                    </a>
                    <a href="#" class="text-white mx-2 d-none d-md-block">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon03.svg" alt="آیکون">
                    </a>
                    <a href="#" class="text-white mx-2 d-none d-md-block">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon04.svg" alt="آیکون">
                    </a>
                </div>
            </div>
        </div>

    </div>

</header>

