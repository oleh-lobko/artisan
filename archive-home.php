<?php
/**
 * Template Name: Archive Home (Artisan Homes Catalog)
 * Uses builder_tax taxonomy for filtering.
 */

get_header(); ?>
    <main id="main" class="archive-home-main">
        <div class="filter-header-wrap">
            <div class="grid-container">
                <div class="cell auto filter-title-col archive">
                    <h1 class="section-title">ARTISAN HOMES</h1>
                    <label for="company-filter">FILTER BY COMPANY</label>
                    <select id="company-filter" class="company-filter-select">
                        <option value="">ALL</option>
                        <?php
                        $terms = get_terms([
                            'taxonomy' => 'builder_tax',
                            'hide_empty' => true,
                        ]);

                        if (!empty($terms) && !is_wp_error($terms)) :
                            foreach ($terms as $term) :
                                echo '<option value="' . esc_attr($term->slug) . '">' . esc_html($term->name) . '</option>';
                            endforeach;
                        endif;
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="grid-container ">
        <div class="home-listings-grid grid-x grid-margin-x filterable-grid photo">
                <?php
                // Loop, який відображає всі будинки
                if (have_posts()) :
                    while (have_posts()) : the_post();
                        $home_photo = get_field('cpt_home_photo');
                        $address = get_field('cpt_home_address');
                        $city_zip = get_field('cpt_home_city_zip');
                        $artisan_home_num = get_field('cpt_home_number');
                        $builder_tax_term = get_the_terms(get_the_ID(), 'builder_tax');
                        $builder_name = !empty($builder_tax_term) ? esc_html($builder_tax_term[0]->name) : '';

                        // Створюємо рядок даних для JS-фільтрації: data-filter="slug-компанії"
                        $builder_slug = !empty($builder_tax_term) ? $builder_tax_term[0]->slug : 'none';
                        ?>
                        <div class="cell medium-4 home-listing-card" data-filter="<?php echo esc_attr($builder_slug); ?>">
                            <div class="home-card-inner">
                                <div class="home-card">

                                <div class="home-photo-wrap">
                                    <?php if ($home_photo) :
                                        echo wp_get_attachment_image($home_photo['id'], 'medium', false, ['class' => 'home-photo']);
                                    endif; ?>
                                </div>

                                <div class="home-info">
                                    <p class="home-address"><?php echo nl2br(esc_html($address)); ?></p>
                                    <p class="home-city-zip"><?php echo esc_html($city_zip); ?></p>
                                    <?php if (!empty($builder_tax_term)) : ?>
                                        <p class="builder-name"><?php echo esc_html($builder_tax_term[0]->name); ?></p>
                                    <?php endif; ?>
                                </div>

                                <a href="<?php the_permalink(); ?>" class="artisan-number-btn">
                                    <?php echo esc_html($artisan_home_num); ?>
                                </a>
                            </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php // foundation_pagination(); // Якщо у вас є функція пагінації ?>
                <?php else : ?>
                    <p>No homes found.</p>
                <?php endif; ?>
            </div>
        </div>
    </main>

<?php get_footer();
