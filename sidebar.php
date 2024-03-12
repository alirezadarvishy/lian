<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lian
 */

?>
<div class="sidebar col s3">
<div class="inner_sidebar">
<?php
  if(lian_is_woocommerce_activated() && is_woocommerce()){
    dynamic_sidebar( 'shop-sidebar' );
  }else{
    dynamic_sidebar( 'primary' );
  }
?>
</div>
</div>