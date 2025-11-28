<?php
/**
 * Footer Section (Виправлено: Email замінено на Website URL)
 */
$address = get_field('address', 'option');
$phone_raw = get_field('phone', 'option');
$website_url = get_field('website_url', 'option');
$copyright_text = get_field('copyright', 'option');
$footer_logo = get_field('footer_logo', 'option');

// Хелпер для створення клікабельного телефону
$phone_link = $phone_raw ? preg_replace('/[^+\d]+/', '', $phone_raw) : '';
?>

<footer id="site-footer" class="site-footer">
    <div class="grid-container text-center">

        <div class="footer-contact-info">
            <?php if ($address) :
                  $encoded_address = urlencode(str_replace("\n", ", ", $address));
                $google_maps_url = 'https://www.google.com/maps/search/?api=1&query=' . $encoded_address;
                ?>
                <p class="footer-address">
                    <a href="<?php echo esc_url($google_maps_url); ?>" target="_blank" rel="noopener noreferrer">
                        <?php echo nl2br(esc_html($address)); ?>
                    </a>
                </p>
            <?php endif; ?>

            <p class="footer-contact-links">
                <?php if ($phone_link) : ?>
                    <a href="tel:<?php echo esc_attr($phone_link); ?>">
                        Phone: <?php echo esc_html($phone_raw); ?>
                    </a>
                <?php endif; ?>

                <?php if ($phone_link && $website_url) : ?>
                    |
                <?php endif; ?>

                <?php if ($website_url) : ?>
                    <a href="<?php echo esc_url($website_url); ?>" target="_blank" rel="noopener noreferrer">
                        <?php echo esc_url($website_url); ?>
                    </a>
                <?php endif; ?>
            </p>
        </div>
<div class="social-link">
       <?php get_template_part('parts/socials')?>
</div>
        <?php if ($footer_logo) : ?>
            <div class="footer-logo">
                <?php echo wp_get_attachment_image($footer_logo['id'], 'medium', false, ['class' => 'footer-logo-img']); ?>
            </div>
        <?php endif; ?>

        <?php if ($copyright_text) : ?>
            <div class="footer-copyright">
                <?php echo str_replace('@year', date('Y'), $copyright_text); ?>
            </div>
        <?php endif; ?>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
