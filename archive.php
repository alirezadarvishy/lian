<?php
/**
 * The template for displaying archive pages
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package lian
 */

$show_sidebar = false;
$content_size = '';
$lian_blog_archive_sidebar = lian_options('lian_blog_archive_sidebar');
$lian_portfolio_archive_sidebar = lian_options('lian_portfolio_archive_sidebar');
$post_style = !empty(lian_options('lian_blog_archive_post_style')) ? lian_options('lian_blog_archive_post_style').'-style' : 'grid-style';

/* Sidebar & Col Size */
if('post' === get_post_type() && $lian_blog_archive_sidebar === "1" ){
	$show_sidebar = true;
	$content_size = 's9 ms12';
}elseif('portfolio' === get_post_type() && $lian_portfolio_archive_sidebar === "1" ){
	$show_sidebar = true;
	$content_size = 's9 ms12';
}

get_header();
?>
	<div class="container">
		<main class="site-main" id="wp--skip-link--target">
			<div class="col <?php echo $post_style . ' ' .  esc_attr($content_size); ?>">
				<?php
				if ( have_posts() ) : 
				    if(!is_home()):
				    ?>
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
				if($show_sidebar){
					get_sidebar();
				}
			?>
		</main>
	</div>
<?php
get_footer();