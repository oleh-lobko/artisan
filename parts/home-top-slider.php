<?php
/**
 * Hero Section / Top Slider (Виправлено: Додано цикл while для всіх слайдів)
 */
$slider_query = new WP_Query([
    'post_type'      => 'slider',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'orderby'        => 'menu_order',
    'order'          => 'ASC'
]);

if ($slider_query->have_posts()) :
    ?>

    <section class="hero-slider dynamic-slider">
        <div class="slider-wrapper" data-autoplay-delay="4000">

            <?php
            while ($slider_query->have_posts()) : $slider_query->the_post();

                // Отримуємо дані всередині циклу для поточного слайда
                $background_image = get_field('background_hero_image');
                $overlay_image = get_field('hero_overlay_image');

                $bg_image_id = $background_image['id'] ?? 0;
                $overlay_image_id = $overlay_image['id'] ?? 0;

                if (!$bg_image_id) {
                    continue;
                }


                $background_image_html = wp_get_attachment_image($bg_image_id, 'full_hd', false, ['class' => 'slide-image']);
                ?>

                <div class="single-slide">

                    <?php echo $background_image_html; ?>

                    <div class="hero-overlay-content text-center">

                        <?php if ($overlay_image_id) :
                            echo wp_get_attachment_image($overlay_image_id, 'full', false, ['class' => 'hero-artisan-text']);
                            ?>
                        <?php endif; ?>
                    </div>
                </div>

            <?php endwhile; ?>

        </div>
    </section>

    <?php
    wp_reset_postdata();
endif;
?>
