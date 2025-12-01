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
        <div class="grid-container">
            <div class="grid-x grid-padding-x align-middle align-spaced " >

                <div class="cell medium-2  auto site-logo">
                    <?php
                    the_custom_logo();


                    if (!has_custom_logo()) : ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="logo-link text-fallback">
                            <span class="logo-main">ARTISAN</span>
                            <span class="logo-sub">HOME TOUR</span>
                            <span class="logo-city">GREATER KANSAS CITY</span>
                        </a>
                    <?php endif; ?>
                </div>

                <div class="cell medium-10  shrink site-menu">
                    <?php if (has_nav_menu('header')){ ?>
                        <div class="title-bar hide-for-medium" data-responsive-toggle="main-menu" data-hide-for="medium">
                            <button class="menu-icon" type="button" data-toggle aria-label="Menu" aria-controls="main-menu">
                                <span></span></button>
                        </div>

                    <nav class="top-bar" id="main-menu">
                        <?php
                        wp_nav_menu( array(
                            'theme_location' => 'header',
                            'container'      => false,
                            'menu_class'     => 'main-menu menu',
                            'items_wrap' => '<ul id="%1$s" class="%2$s" data-responsive-menu="accordion medium-dropdown" data-submenu-toggle="true" data-multi-open="false" data-close-on-click-inside="false">%3$s</ul>',
                            'fallback_cb'    => false,
                        ) ); ?>
                    </nav>
                    <?php  } ?>
                </div>
            </div>
        </div>

</header>
