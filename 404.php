<?php
/**
 * The template for displaying 404 pages (not found)
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 * @package lian
 */
$lian_show_sidebar = lian_options('lian_notfound_sidebar');
$lian_notfound_title = lian_options('lian_notfound_title');
$lian_notfound_desc = lian_options('lian_notfound_desc');
$lian_notfound_homelink = lian_options('lian_notfound_homelink');
$lian_notfound_sidebar = lian_options('lian_notfound_sidebar');
get_header();
?>
<div class="container">
	<main id="primary" class="site-main">
		<div class="col <?php echo esc_attr($lian_show_sidebar === "1" ? 's9 ms12':''); ?>">
			<section class="error-404 not-found">
				<span>404</span>
				<header class="page-header">
					<h1 class="page-title"><?php echo esc_html($lian_notfound_title); ?></h1>
				</header>
				<div class="page-content">
					<p><?php echo esc_html($lian_notfound_desc); ?></p>
				</div>
				<?php if( $lian_notfound_homelink === "1" ): ?>
					<a href="<?php echo esc_url(home_url( '/' )); ?>" class="button"><?php echo __('Back to Main Page','lian')?></a>
				<?php endif; ?>
			</section>
		</div>
		<?php 
			if( $lian_notfound_sidebar === "1"){
				get_sidebar(); 
			}
		?>
	</main>
</div><!-- end container -->
<?php
get_footer();