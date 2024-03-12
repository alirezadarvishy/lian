<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package lian
 */
$lian_blog_archive_sidebar = lian_options('lian_blog_archive_sidebar');
get_header();
?>
<div class="container">
	<main id="primary" class="site-main ">
		<div class="col <?php echo esc_attr($lian_blog_archive_sidebar === "1" ? 's9 ms12':''); ?>">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( __( 'Search Results for: %s', 'lian' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'theme-layouts/post/content', 'search' );

			endwhile;

			the_posts_navigation();

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
	</main><!-- #main -->
</div>

<?php
get_footer();
