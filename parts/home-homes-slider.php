<?php
/**
 * Our Homes (Slider) Section - Виведення останніх 9 CPT Home (Метод ACF)
 */
$section_title = get_field('home_homes_title');
$view_homes_link = get_field('home_homes_link');
$posts_per_page = 9;


$homes_query = new WP_Query([
    'post_type'      => 'home',
    'posts_per_page' => $posts_per_page,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC'
]);

if ($homes_query->have_posts()) :
    ?>
    <section class="our-homes-section section-padding">
        <div class="grid-container">

            <?php if ($section_title) : ?>
                <h2 class="section-title text-center"><?php echo esc_html($section_title); ?></h2>
            <?php endif; ?>

            <div class="homes-slider-wrapper">

                <?php while ($homes_query->have_posts()) : $homes_query->the_post();
                    $home_photo = get_field('cpt_home_photo');
                    $address = get_field('cpt_home_address');
                    $city_zip = get_field('cpt_home_city_zip');
                    $artisan_home_num = get_field('cpt_home_number');
                    $builder_tax_term = get_the_terms(get_the_ID(), 'builder_tax');
                    $builder_name = !empty($builder_tax_term) ? esc_html($builder_tax_term[0]->name) : '';
                    ?>
                    <div class="home-slide-item">
                        <div class="home-card">

                            <div class="home-photo-wrap">
                                <?php if ($home_photo) :
                                    // Виведення зображення будинку
                                    echo wp_get_attachment_image($home_photo['id'], 'large', false, ['class' => 'home-photo']);
                                endif; ?>
                            </div>

                            <div class="home-info">
                                <?php if ($address) : ?>
                                    <p class="home-address"><?php echo nl2br(esc_html($address)); ?></p>
                                <?php endif; ?>

                                <?php if ($city_zip) : ?>
                                    <p class="home-city-zip"><?php echo esc_html($city_zip); ?></p>
                                <?php endif; ?>

                                <?php if ($builder_name) : ?>
                                    <p class="builder-name"><?php echo esc_html($builder_name); ?></p>
                                <?php endif; ?>
                            </div>

                            <a href="<?php the_permalink(); ?>" class="artisan-number-btn">
                                <?php echo esc_html($artisan_home_num); ?>
                            </a>
                        </div>
                    </div>
                <?php endwhile; wp_reset_postdata(); ?>

            </div>

            <?php if ($view_homes_link) : ?>
                <a href="<?php echo esc_url($view_homes_link); ?>" class="view-homes-btn button">
                    <?php _e('View Homes', 'artisan'); ?>
                </a>
            <?php endif; ?>

        </div>
    </section>
<?php endif; ?>
