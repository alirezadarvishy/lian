<?php
/**
 * The template for displaying the footer
 * Contains the closing of the #content div and all content after.
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package lian
 */
$lian_text_copyright = lian_options('lian_text_copyright');
$lian_cs_footer = lian_options('lian_cs_footer');
$lian_cs_footer_name = lian_options('lian_cs_footer_name');
?>
<footer id="colophon" class="site-footer">
  <?php
  	if(lian_is_elementor_activated() && $lian_cs_footer === "1" && $lian_cs_footer_name != ''){
		get_template_part( 'theme-layouts/footer/footer', 'elementor' );
	}else{ ?>
		<div class="site-info">
			<span><?php echo esc_html($lian_text_copyright); ?></span>
		</div>
  <?php } ?>
</footer>
<?php wp_footer(); ?>
</body>
</html>
