<?php
/**
 * Our Builders (Team) Section
 */
$section_title = get_field('home_builders_title');
$group_photo = get_field('builders_group_photo');
$REPEATER_FIELD_NAME = 'home_builders_list';
$has_builders = have_rows($REPEATER_FIELD_NAME);

if ($section_title || $group_photo || $has_builders) :
    ?>
    <section class="builders-team-section section-padding">
        <div class="grid-container">

            <?php if ($section_title) : ?>
                <h2 class="section-title text-center"><?php echo esc_html($section_title); ?></h2>
            <?php endif; ?>

            <div class="builders-content grid-x">

                <div class="cell medium-6 grid-margin-x builder-photo-col">
                    <?php if ($group_photo) :
                        echo wp_get_attachment_image($group_photo['id'], 'medium_large', false, ['class' => 'group-photo']);
                    endif; ?>
                </div>

                <div class="cell medium-6 builder-list-col">
                    <div class="builder-list-wrapper">
                        <?php
                        if (have_rows($REPEATER_FIELD_NAME)) : ?>
                            <ul class="builders-list">
                                <?php
                                while (have_rows($REPEATER_FIELD_NAME)) : the_row();
                                    $name = get_sub_field('builder_name');
                                    $description = get_sub_field('builder_description');
                                    ?>
                                    <li class="builder-item">
                                        <?php if ($name) : ?>
                                            <span class="builder-name"><?php echo esc_html($name); ?></span>
                                        <?php endif; ?>
                                        <?php
                                        // Виведення опису з комою, якщо він існує
                                        if ($description) : ?>
                                            , <span class="builder-description"> <?php echo esc_html($description); ?> </span>
                                        <?php endif; ?>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
