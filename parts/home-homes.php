<?php
/**
 * Home Page: Our Homes Slider Section (Query CPT: Home)
 */

// 1. Отримуємо заголовок секції
$homes_title = get_field('home_homes_title');

// 2. Отримуємо посилання на сторінку каталогу
$view_homes_link = get_field('home_homes_link');

// 3. WP_Query для отримання останніх 6 об'єктів CPT: Home
$homes_query = new WP_Query([
    'post_type'      => 'home', // Ваш зареєстрований CPT
    'posts_per_page' => 9, // Обмеження на 6 об'єктів
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC', // Сортування за датою, щоб отримати останні
]);

if ($homes_query->have_posts()) : ?>
    <section class="section home-homes">
        <div class="grid-container">

            <?php // Title (Заголовок секції)
            if ($homes_title) : ?>
                <h2 class="section-title text-center"><?php echo esc_html($homes_title); ?></h2>
            <?php endif; ?>

            <div class="homes-slider js-slick-slider">
                <?php while ($homes_query->have_posts()) : $homes_query->the_post();

                    // 4. Отримуємо дані про будинок з ACF CPT Home Fields
                    $address = get_field('cpt_home_address');
                    $builder_post = get_field('cpt_home_builder_cpt'); // Post Object
                    $home_number = get_field('cpt_home_number');

                    // WLA Standard: Використовувати wp_get_attachment_image для Featured Image
                    $home_photo = get_the_post_thumbnail(get_the_ID(), 'medium', ['class' => 'home-preview-img']);
                    ?>
                    <div class="homes-slider__slide">
                        <div class="home-card">
                            <?php echo $home_photo; ?>

                            <div class="home-details">
                                <p class="home-address"><?php echo esc_html($address); ?></p>
                                <?php if ($builder_post) : ?>
                                    <p class="home-builder"><?php echo esc_html($builder_post->post_title); ?></p>
                                <?php endif; ?>
                                <span class="home-number"><?php echo esc_html($home_number); ?></span>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

            <?php // Кнопка "View Homes" (WP: Page Link)
            if ($view_homes_link) : ?>
                <div class="text-center mt-4">
                    <a href="<?php echo esc_url($view_homes_link); ?>" class="button primary">View Homes</a>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif;
wp_reset_postdata(); // Завжди скидаємо глобальний запит WP ?>
