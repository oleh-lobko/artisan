<?php
/**
 * Home Page: Hero Section (Top Slider)
 */

// 1. Отримуємо текст, який накладається поверх слайдера
$overlay_text = get_field('home_slider_overlay_text');
// 2. Виконуємо WP_Query для CPT: Slider
$slider_posts = new WP_Query([
    'post_type'      => 'slider', // Або назва вашого CPT
    'posts_per_page' => -1,
    'post_status'    => 'publish',
]);

if ($slider_posts->have_posts()) : ?>
    <section class="home-hero-section jarallax" data-speed="0.2">

        <?php // Накладений текст "ARTISAN" та "COMING SEPTEMBER..."
        // WLA Standard: Hero image should be always slider
        // WLA Standard: Якщо дизайн має слайдер, використовуйте CPT: Slider
        ?>
        <div class="hero-overlay-content">
            <?php // Власне накладений текст ARTISAN
            if ($overlay_text) : ?>
                <h1 class="hero-title"><?php echo esc_html($overlay_text); ?></h1>
            <?php endif; ?>
        </div>

        <div class="hero-slider">
            <?php while ($slider_posts->have_posts()) : $slider_posts->the_post();
                // Оскільки це CPT: Slider, ми використовуємо the_post_thumbnail() або ACF Image.
                // Для простоти виводимо The Post Thumbnail (Featured Image) як jarallax-img.
                the_post_thumbnail('full', ['class' => 'jarallax-img']);
            endwhile; ?>
        </div>

    </section>
<?php endif;
wp_reset_postdata(); ?>
