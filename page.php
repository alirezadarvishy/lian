<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lian
 */


get_header();

$page_layout = (!empty(get_post_meta($post->ID, 'lian_page_settings_page_layout', true)) ? get_post_meta($post->ID, 'lian_page_settings_page_layout', true) : "boxed");
$hide_breadcrumb = (!empty(get_post_meta($post->ID, 'lian_page_settings_title', true)) ? get_post_meta($post->ID, 'lian_page_settings_title', true) : 1);
$hide_sidebar = (!empty(get_post_meta( $post->ID,'lian_page_settings_sidebar', true )) ? get_post_meta($post->ID, 'lian_page_settings_sidebar', true) : 1);
?>
<main id="primary" class="site-main">
<div class="container <?php echo $page_layout; ?>">
	<div class="col <?php echo (!$hide_sidebar ? 's9':''); ?>">
	<?php if(! $hide_breadcrumb): ?>
	    <div class="breadcrumb"><?php lian_get_breadcrumb(); ?></div>
	<?php endif; ?>
	<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'theme-layouts/post/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
	?>
	</div>
	<?php 
		if(!$hide_sidebar){
			get_sidebar(); 
		}
	?>
</div>
</main>
<?php
get_footer();
