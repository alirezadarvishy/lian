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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="msapplication-TileColor" content="<?php echo esc_attr( $lian_style_primary_color ); ?>">
    <meta name="theme-color" content="<?php echo esc_attr( $lian_style_primary_color ); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#wp--skip-link--target"><?php _e('Skip to content','lian'); ?></a>
<header id="masthead" class="site-header <?php echo esc_attr($sticky_header === "1" ? 'sticky':''); ?> <?php echo isset($header_transparent) && $header_transparent ? 'transparent-header' : ''; ?>">
  <?php
  if(lian_is_elementor_activated() && lian_options('lian_cs_header') === "1" && !empty(lian_options('lian_cs_header_name'))){
    get_template_part( 'theme-layouts/header/header', 'elementor' );
  }
  else{ ?>
  <div class="container">
    <div class="headerrow">
      <div class="header-right-side">
        <div class="header-branding">
          <a href="<?php echo esc_url(home_url( '/' )); ?>"><?php
              if(!empty(lian_options('lian_general_main_logo'))){
                $logo_url = lian_options('lian_general_main_logo');
                echo '<img src="'.esc_url($logo_url).'" alt="'.esc_attr(get_bloginfo( 'name' )).'"/>';
              }else{
                echo get_bloginfo( 'name' );
              }
            ?></a>
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
        <a href="#" class="mobile-menu lianf lian-bars"></a>
      </div>
    </div>
  </div>
  <?php } ?>
</header>