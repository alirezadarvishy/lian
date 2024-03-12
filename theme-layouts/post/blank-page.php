<?php
/**
 * Template Name: Lian Blank Page
 */
 get_header();
 ?>
<main id="primary" class="<?php echo esc_attr($class); ?>">
    <?php
    while ( have_posts() ) :
        the_post();

        echo the_content();

    endwhile; // End of the loop.
    ?>
</main><!-- #main -->
<?php
get_footer();
