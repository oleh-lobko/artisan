<?php
/**
 * Footer (Corrected for Centered Design).
 */
?>

<footer class="footer">
    <div class="grid-container">
        <div class="grid-x grid-margin-x align-center text-center">

            <div class="cell large-12">

                <?php
                // 1. КОНТАКТНА ІНФОРМАЦІЯ (Phone, Address, Web)
                $address = get_field('address', 'option');
                $phone = get_field('phone', 'option');
                // Припускаємо, що у вас є поле 'website' або ви використаєте інший лінк з Options
                $website = get_bloginfo('url');

                if ($address || $phone) : ?>
                    <div class="footer-contact-info">
                        <?php if ($address) : ?>
                            <p><?php echo nl2br(esc_html($address)); ?></p>
                        <?php endif; ?>
                        <p>
                            <?php if ($phone) : ?>
                                Phone <?php echo esc_html($phone); ?> |
                            <?php endif; ?>
                            <a href="<?php echo esc_url($website); ?>"><?php echo esc_url(str_replace(['http://', 'https://'], '', $website)); ?></a>
                        </p>
                    </div>
                <?php endif; ?>

                <?php
                // 2. СОЦІАЛЬНІ МЕРЕЖІ
                get_template_part('parts/socials');
                ?>

                <?php
                // 3. ФУТЕР-ЛОГО (Home Builders Association)
                if ($footer_logo = get_field('footer_logo', 'options')) {
                    // Використовуємо великий розмір, оскільки логотип великий
                    echo wp_get_attachment_image($footer_logo['id'], 'large', false, ['class' => 'footer__association-logo']);
                }
                ?>

            </div>

        </div>
    </div>

    <?php
    // 4. COPYRIGHT (окремий, широкий блок в самому низу)
    if ($copyright = get_field('copyright', 'options')) { ?>
        <div class="footer__copy">
            <div class="grid-container">
                <div class="grid-x grid-margin-x">
                    <div class="cell text-center">
                        <?php echo $copyright; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</footer>
<?php wp_footer(); ?>
</body>
</html>
