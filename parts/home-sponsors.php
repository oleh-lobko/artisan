<?php
/**
 * Home Page: Collaborations (Sponsors/Partners) Section
 */

// 1. Отримуємо заголовок секції
$collaborations_title = get_field('home_collaborations_title');

// 2. WP_Query для отримання всіх об'єктів CPT: Sponsor
$sponsors_query = new WP_Query([
    'post_type'      => 'sponsor', // Ваш зареєстрований CPT
    'posts_per_page' => -1, // Виводимо всіх
    'post_status'    => 'publish',
    'orderby'        => 'menu_order', // Можемо сортувати за порядком, якщо він вказаний
    'order'          => 'ASC',
]);

if ($sponsors_query->have_posts()) : ?>
    <section class="section home-collaborations text-center">
        <div class="grid-container">

            <?php // Title (Заголовок секції)
            if ($collaborations_title) : ?>
                <h2 class="section-title"><?php echo esc_html($collaborations_title); ?></h2>
            <?php endif; ?>

            <div class="sponsors-list grid-x grid-margin-x align-center">
                <?php while ($sponsors_query->have_posts()) : $sponsors_query->the_post();

                    // 3. Отримуємо дані з ACF CPT Sponsor Fields
                    $logo = get_field('cpt_sponsor_logo'); // Image Array
                    $url = get_field('cpt_sponsor_url');   // URL

                    // WLA Standard: Зовнішні посилання повинні відкриватися в новому вікні (target="_blank")
                    // WLA Standard: Використовувати wp_get_attachment_image для виводу зображень
                    $logo_html = $logo ? wp_get_attachment_image($logo['id'], 'medium', false, ['class' => 'sponsor-logo']) : '';
                    ?>
                    <div class="cell shrink sponsor-item">
                        <?php if ($url) : ?>
                            <a href="<?php echo esc_url($url); ?>"
                               target="_blank"
                               rel="noopener noreferrer"
                               title="<?php the_title(); ?>">
                                <?php echo $logo_html; ?>
                            </a>
                        <?php else : ?>
                            <?php echo $logo_html; ?>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif;
wp_reset_postdata(); // Скидаємо глобальний запит WP ?>
