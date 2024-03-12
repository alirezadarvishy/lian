<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package lian
 */

$show_sidebar = false;
$content_size = '';
$lian_blog_single_sidebar = lian_options('lian_blog_single_sidebar');
$lian_portfolio_single_sidebar = lian_options('lian_portfolio_single_sidebar');

/* Sidebar & Col Size */
if('post' === get_post_type() && $lian_blog_single_sidebar === "1" ){
	$show_sidebar = true;
	$content_size = 's9';
}elseif('portfolio' === get_post_type() && $lian_portfolio_single_sidebar === "1" ){
	$show_sidebar = true;
	$content_size = 's9';
}

get_header();
?>
<div class="container">
	<main id="primary" class="site-main">
		<div class="col <?php echo esc_attr($content_size); ?>">
			<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'theme-layouts/post/content', 'single' );

					the_post_navigation(
						array(
							'prev_text' => '<span class="nav-subtitle">' . __( 'Previous:', 'lian' ) . '</span> <span class="nav-title">%title</span>',
							'next_text' => '<span class="nav-subtitle">' . __( 'Next:', 'lian' ) . '</span> <span class="nav-title">%title</span>',
						)
					);

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
			?>
		</div>
		<?php
			if($show_sidebar){
				get_sidebar();
			}
		?>
	</main>
</div>
<?php
get_footer();
