<?php
/**
 * Home Page: Our Builders Section
 */

$builders_title = get_field('home_builders_title');

if ($builders_title || have_rows('home_builders_list')) : ?>
    <section class="section home-builders">
        <div class="grid-container">

            <?php if ($builders_title) : ?>
                <h2 class="section-title text-center"><?php echo esc_html($builders_title); ?></h2>
            <?php endif; ?>

            <?php if (have_rows('home_builders_list')) : ?>
                <div class="builders-list grid-x grid-margin-x">
                    <?php while (have_rows('home_builders_list')) : the_row();
                        $photo = get_sub_field('builder_photo');
                        $name = get_sub_field('builder_name');
                        $description = get_sub_field('builder_description');

                        $photo_html = $photo ? wp_get_attachment_image($photo['id'], 'medium', false, ['class' => 'builder-photo']) : '';
                        ?>
                        <div class="cell large-4 medium-6">
                            <article class="builder-card">
                                <?php echo $photo_html; ?>

                                <h3 class="builder-name"><?php echo esc_html($name); ?></h3>

                                <div class="builder-description">
                                    <?php echo wp_kses_post($description); ?>
                                </div>
                            </article>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>
