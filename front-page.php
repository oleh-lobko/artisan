<?php
/**
 * Template Name: Front Page
 *
 * Викликає header та footer і містить тестовий контент.
 */

get_header();
?>

<main id="main">
<?php
get_template_part('parts/home', 'top-slider');
get_template_part('parts/home', 'coming-soon');
?>


    </main>
<?php
get_footer();
?>
