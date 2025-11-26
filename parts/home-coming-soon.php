<?php
/**
 * Coming Soon Text Section (Використовує актуальні імена полів ACF)
 */
$header = get_field('coming_soon_title'); // З ACF Home Page General Fields
$body_text = get_field('home_cs_content');  // З ACF Home Page General Fields

if ($header || $body_text) :
    ?>
    <section class="coming-soon-section section-padding text-center">
    <div class="grid-container ">
        <div class="grid-x grid-margin-x align-center">
            <div class="cell large-10 large-offset-1">

                <?php if ($header) : ?>
                    <div class="coming-soon-header-wrap">
                        <h2 class="section-header"><?php echo esc_html($header); ?></h2>
                    </div>
                <?php endif; ?>

                <?php if ($body_text) : ?>
                    <div class="body-content"><?php echo $body_text; ?></div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>
<?php endif; ?>
