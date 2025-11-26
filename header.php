<?php
/**
 * Header відповідно до макета Artisan Home Tour (Фінальна версія).
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header id="site-header" class="site-header" role="banner">
    <nav class="site-navigation top-bar" role="navigation" id="site-navigation">
        <div class="grid-container">
            <div class="grid-x grid-padding-x align-middle align-spaced " >

                <div class="cell auto site-logo">
                    <?php
                    the_custom_logo();

                    // Якщо логотип не завантажено, відображаємо резервний текст:
                    if (!has_custom_logo()) : ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="logo-link text-fallback">
                            <span class="logo-main">ARTISAN</span>
                            <span class="logo-sub">HOME TOUR</span>
                            <span class="logo-city">GREATER KANSAS CITY</span>
                        </a>
                    <?php endif; ?>
                </div>

                <div class="cell shrink site-menu">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'header',
                        'container'      => false,
                        'menu_class'     => 'main-menu menu',
                        'fallback_cb'    => false,
                    ) );
                    ?>
                </div>
            </div>
        </div>
    </nav>
</header>
