<?php
/**
 * The header for our theme
 * This is the template that displays all of the <head> section
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package lian
 */
$lian_style_primary_color = lian_options('lian_style_primary_color');
$sticky_header = lian_options('lian_sticky_header');
if(is_page()){
    $post_id = get_the_ID();
    $header_transparent = (!empty(get_post_meta( $post_id,'lian_page_settings_transparent_header', true )) ? get_post_meta($post_id, 'lian_page_settings_transparent_header', true) : 0);
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo get_bloginfo("description"); ?>">
    <meta name="msapplication-TileColor" content="<?php echo esc_attr( $lian_style_primary_color ); ?>">
    <meta name="theme-color" content="<?php echo esc_attr( $lian_style_primary_color ); ?>">
    <link rel="profile" href="https://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header id="masthead" class="site-header <?php echo esc_attr($sticky_header === "1" ? 'sticky':''); ?> <?php echo isset($header_transparent) && $header_transparent ? 'transparent-header' : ''; ?>">
  <?php
  if(lian_is_elementor_activated() && lian_options('lian_cs_header') === "1" && !empty(lian_options('lian_cs_header_name'))){
    get_template_part( 'theme-layouts/header/header', 'elementor' );
  }
  else{ ?>
  <div class="container">
    <?php
      if(!empty(lian_options('lian_general_main_logo'))){
        $logo_url = lian_options('lian_general_main_logo');
      }else{
        $logo_url = get_template_directory_uri() . '/assets/img/lian-logo-white-transparent.png';
      }
    ?>
    <div class="headerrow">
      <div class="header-right-side">
        <div class="header-branding">
          <a href="<?php echo esc_url(home_url( '/' )); ?>">
            <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo( 'name' )); ?>"/>
          </a>
        </div>
      </div>
      <div class="header-nav">
        <?php
        wp_nav_menu(
          array(
            'theme_location' => 'primary',
            'menu_id'        => 'primary',
          )
        );
        ?>
        <i class="mobile-menu lianf lian-bars"></i>
      </div>
    </div>
  </div>
  <?php } ?>
</header>