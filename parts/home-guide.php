<?php
/**
 * Home Page: Artisan Guide Section
 */

// 1. Отримуємо поля для кнопки
$guide_file_array = get_field('home_guide_file'); // ACF: File (повертає ID або Array)
$guide_button_text = get_field('home_guide_button_text');

// 2. Отримуємо поле для зображення, що накладається
$overlay_image = get_field('home_guide_overlay_image');

// Перевіряємо, чи є принаймні файл або зображення, щоб виводити секцію
if ($guide_file_array || $overlay_image) :

    // Встановлюємо URL файлу для кнопки
    $guide_file_url = is_array($guide_file_array) ? $guide_file_array['url'] : '';

    // WLA Standard: Використовувати wp_get_attachment_image для виводу зображень
    $overlay_image_html = $overlay_image ? wp_get_attachment_image($overlay_image['id'], 'medium', false, ['class' => 'guide-overlay-img']) : '';

    ?>
    <section class="section home-artisan-guide position-relative text-center">
        <div class="grid-container">
            <div class="grid-x grid-margin-x align-center">
                <div class="cell large-6 guide-content rel-content">

                    <?php // 3. Вивід зображення, що накладається (наприклад, ARTISAN GUIDE)
                    // Використовуємо .stretched-img / .rel-content для накладання
                    // WLA Standard: Може знадобитися клас stretched-img для зображення
                    echo $overlay_image_html;
                    ?>

                    <?php // 4. Вивід кнопки
                    if ($guide_file_url && $guide_button_text) : ?>
                        <div class="guide-button-wrap">
                            <a href="<?php echo esc_url($guide_file_url); ?>"
                               target="_blank"
                               class="button primary guide-download-btn"
                               download>
                                <?php echo esc_html($guide_button_text); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
