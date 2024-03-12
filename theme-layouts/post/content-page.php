<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lian
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php lian_post_thumbnail(); ?>

	<?php
		if(lian_is_woocommerce_activated()){
			if(!(is_shop() || is_product_category() || is_product_tag() || is_product())){
				the_title( '<h1 class="entry-title">', '</h1>' );
			}else{
				woocommerce_breadcrumb();
			}
		}
	?>


	<div class="entry-content <?php
		if(lian_is_woocommerce_activated()){
			if(is_shop() || is_product_category() || is_product_tag()){
				echo "lian-archive-woo";
				}elseif (is_product()) {
					echo "lian-product-woo";
				}
		}
		?>">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'lian' ),
				'after'  => '</div>',
			)
		);
		?>
	</div>

</div>
