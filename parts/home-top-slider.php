<?php
/**
 * Hero Section / Top Slider (Використовує ACF для обох зображень)
 */
$slider_query = new WP_Query([
    'post_type'      => 'slider',
    'posts_per_page' => 1,
    'post_status'    => 'publish',
    'orderby'        => 'menu_order',
    'order'          => 'ASC'
]);

if ($slider_query->have_posts()) :
    $slider_query->the_post();

    // 1. Отримання фонового зображення з ACF
    $background_image = get_field('background_hero_image');
    // 2. Отримання накладеного зображення з ACF
    $overlay_image = get_field('hero_overlay_image');

    // Перевірка: чи дійсно ми отримали ID зображення?
    $bg_image_id = $background_image['id'] ?? 0;
    $overlay_image_id = $overlay_image['id'] ?? 0;

    // !!! КРИТИЧНА ПЕРЕВІРКА: Якщо немає ID для фону, не виводимо
    if (!$bg_image_id) {
        wp_reset_postdata();
        return;
    }

    // Виведення фону
    $background_image_html = wp_get_attachment_image($bg_image_id, 'full_hd', false, ['class' => 'slide-image']);
    ?>

    <section class="hero-slider dynamic-slider">
        <div class="slider-wrapper" data-autoplay-delay="4000">
            <div class="single-slide">

                <?php echo $background_image_html; ?>

                <div class="hero-overlay-content text-center">

                    <?php if ($overlay_image_id) :
                        // Виведення накладеного зображення (ARTISAN)
                        echo wp_get_attachment_image($overlay_image_id, 'full', false, ['class' => 'hero-artisan-text']);
                        ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <?php
    wp_reset_postdata();
endif;
?>
