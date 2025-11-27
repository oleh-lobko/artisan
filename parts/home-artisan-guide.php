<?php
/**
 * Artisan Guide Section (Банер)

 */
$bg_image = get_field('guide_bg_image');
$poster_image = get_field('guide_poster_image');
$pdf_file = get_field('guide_pdf_file');
$button_text = get_field('guide_button_text');


if ($bg_image || $poster_image || $pdf_file) :

    $pdf_url = $pdf_file ? esc_url($pdf_file['url']) : '#';
    ?>

    <section class="artisan-guide-section section-full-width text-center">

        <div class="guide-background"
            <?php if ($bg_image) : ?>
                style="background-image: url(<?php echo esc_url($bg_image['url']); ?>);"
            <?php endif; ?>>
        </div>

        <div class="guide-content grid-container">

            <div class="poster-container">
                <?php if ($poster_image) :
                    echo wp_get_attachment_image($poster_image['id'], 'medium', false, ['class' => 'guide-poster']);
                endif; ?>

                <?php if ($button_text) : ?>

                    <a href="<?php echo $pdf_url; ?>"

                       target="_blank"

                       rel="noopener noreferrer"

                       class="view-guide-btn button">

                        <?php echo esc_html($button_text); ?>

                    </a>

                <?php endif; ?>
            </div>

        </div>
    </section>
<?php endif; ?>
