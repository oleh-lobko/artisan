<?php
/**
 * Collaborations Section (Динамічні заголовки та фільтри)
 */
$REPEATER_NAME = 'collaborations_section';

if (have_rows($REPEATER_NAME)) :
    ?>
    <section class="collaborations-section section-padding text-center">
        <div class="grid-container">

            <?php
            while (have_rows($REPEATER_NAME)) : the_row();
                $section_title = get_sub_field('section_title');
                $filter_value = get_sub_field('filter_value');
                if ($filter_value) :

                    $collaborators_query = new WP_Query([
                        'post_type'      => 'sponsor',
                        'posts_per_page' => -1,
                        'post_status'    => 'publish',
                        'meta_key'       => 'partner_type',
                        'meta_value'     => $filter_value,
                        'orderby'        => 'menu_order',
                        'order'          => 'ASC'
                    ]);
                    if ($collaborators_query->have_posts()) :
                        ?>

                        <div class="collaboration-block">
                            <h3 class="section-title"><?php echo esc_html($section_title); ?></h3>

                            <div class="logo-list grid-x grid-margin-x align-center">
                                <?php while ($collaborators_query->have_posts()) : $collaborators_query->the_post();
                                    $logo = get_field('sponsor_logo');
                                    $url = get_field('sponsor_url');
                                    $logo_html = $logo ? wp_get_attachment_image($logo['id'], 'medium', false, ['class' => 'sponsor-logo']) : '';
                                    ?>
                                    <div class="cell shrink logo-item">
                                        <?php if ($url) : ?>
                                        <a href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener noreferrer">
                                            <?php echo $logo_html; ?>
                                        </a>
                                        <?php else : ?>
                                            <?php echo $logo_html; ?>
                                        <?php endif; ?>
                                    </div>
                                <?php endwhile; wp_reset_postdata(); ?>
                            </div>
                        </div>

                    <?php
                    endif;
                endif;
            endwhile;
            ?>

        </div>
    </section>
<?php endif; ?>
