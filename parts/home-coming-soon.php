<?php
/**
 * Home Page: Coming Soon Text Section
 */

// Отримуємо поля, прив'язані до ID поточної сторінки (front-page)
$coming_soon_title   = get_field('home_cs_title');
$coming_soon_content = get_field('home_cs_content');

// Перевіряємо наявність контенту, щоб секція не виводилася порожньою
if ($coming_soon_title || $coming_soon_content) : ?>
    <section class="section home-coming-soon text-center">
        <div class="grid-container">
            <div class="grid-x grid-margin-x align-center">
                <div class="cell large-8">

                    <?php
                    // 1. Title (Заголовок)
                    if ($coming_soon_title) : ?>
                        <h2 class="section-title"><?php echo esc_html($coming_soon_title); ?></h2>
                    <?php endif; ?>

                    <?php
                    // 2. Content (Основний текст)
                    if ($coming_soon_content) : ?>
                        <div class="section-content">
                            <?php echo wp_kses_post($coming_soon_content); ?>
                            <?php // Використовуємо wp_kses_post для безпечного виводу вмісту з Textarea (якщо там можуть бути теги) ?>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
