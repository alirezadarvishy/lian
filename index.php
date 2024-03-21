<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lian
 */
$lian_blog_archive_sidebar = lian_options('lian_blog_archive_sidebar');
$post_style = !empty(lian_options('lian_blog_archive_post_style')) ? lian_options('lian_blog_archive_post_style').'-style' : 'grid-style';

get_header();
?>
	<div class="container">
		<main class="site-main" id="wp--skip-link--target">
			<div class="col <?php echo $post_style . ' ' . esc_attr($lian_blog_archive_sidebar === "1" ? 's9 ms12':''); ?>">
				<?php
				if ( have_posts() ) : 
				    if(!is_home()): ?>
    					<header class="page-header">
    						<?php
    							the_archive_title( '<h1 class="page-title">', '</h1>' );
    							the_archive_description( '<div class="archive-description">', '</div>' );
    						?>
    					</header>
					<?php
					endif;
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();
						get_template_part( 'theme-layouts/post/content', get_post_type() );
					endwhile;
					lian_pagination_nav();
				else :
					get_template_part( 'theme-layouts/post/content', 'none' );

				endif;
				?>
			</div>
			<?php
				if( $lian_blog_archive_sidebar === "1"){
					get_sidebar();
				}
			?>
		</main>
	</div>
<?php
get_footer();