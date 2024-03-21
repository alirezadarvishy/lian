<?php
/*
 *
 * Style Option
 *
 */
?>
<li>
  <div>
    <h2><?php _e( 'General', 'lian' ); ?></h2>
    <div class="row">
      <div class="col-4"><?php _e( 'Main Color', 'lian' ); ?></div>
      <div class="col">
        <input name="lian_options[lian_style_primary_color]" type="text" value="<?php echo self::get_theme_option( 'lian_style_primary_color' ); ?>" class="lian-color" data-default-color="#ef394e" />
      </div>
    </div>

    <div class="row">
      <div class="col-4"><?php _e( 'Second Color', 'lian' ); ?></div>
      <div class="col">
        <input name="lian_options[lian_style_second_color]" type="text" value="<?php echo self::get_theme_option( 'lian_style_second_color' ); ?>" class="lian-color" data-default-color="#00bfd6" />
      </div>
    </div>

    <div class="row">
      <div class="col-4"><?php _e( 'Body Background Color', 'lian' ); ?></div>
      <div class="col">
        <input name="lian_options[lian_style_bg_color]" type="text" value="<?php echo self::get_theme_option( 'lian_style_bg_color' ); ?>" class="lian-color" data-default-color="#f5f5f5" />
      </div>
    </div>

    <div class="row">
      <div class="col-4"><?php _e( 'Text Color', 'lian' ); ?></div>
      <div class="col">
        <input name="lian_options[lian_style_text_color]" type="text" value="<?php echo self::get_theme_option( 'lian_style_text_color' ); ?>" class="lian-color" data-default-color="#555555" />
      </div>
    </div>

    <div class="row">
      <div class="col-4"><?php _e( 'Content Background', 'lian' ); ?></div>
      <div class="col">
        <input name="lian_options[lian_content_bg]" type="text" value="<?php echo self::get_theme_option( 'lian_content_bg' ); ?>" class="lian-color" data-default-color="#555555" />
      </div>
    </div>

    <div class="row">
      <div class="col-4"><?php _e( 'Sidebar Background', 'lian' ); ?></div>
      <div class="col">
        <input name="lian_options[lian_sidebar_bg]" type="text" value="<?php echo self::get_theme_option( 'lian_sidebar_bg' ); ?>" class="lian-color" data-default-color="#555555" />
      </div>
    </div>

    <h2><?php _e( 'Links', 'lian' ); ?></h2>
    
    <div class="row">
      <div class="col-4"><?php _e( 'Link Text Decoration', 'lian' ); ?></div>
      <div class="col">
        <select name="lian_options[lian_style_link_textdeco]">
          <option value=""><?php _e( '-- Choose --', 'lian' ); ?></option>
          <option value="none" <?php echo selected('none', self::get_theme_option( 'lian_style_link_textdeco' ), true); ?>><?php _e( 'None', 'lian' ); ?></option>
          <option value="underline" <?php echo selected('underline', self::get_theme_option( 'lian_style_link_textdeco' ), true); ?>><?php _e( 'Underline', 'lian' ); ?></option>
          <option value="overline" <?php echo selected('overline', self::get_theme_option( 'lian_style_link_textdeco' ), true); ?>><?php _e( 'Overline', 'lian' ); ?></option>
          <option value="line-through" <?php echo selected('line-through', self::get_theme_option( 'lian_style_link_textdeco' ), true); ?>><?php _e( 'Line Through', 'lian' ); ?></option>
        </select>

      </div>
    </div>
    
    <div class="row">
      <div class="col-4"><?php _e( 'Link Color', 'lian' ); ?></div>
      <div class="col">
        <input name="lian_options[lian_style_a_color]" type="text" value="<?php echo self::get_theme_option( 'lian_style_a_color' ); ?>" class="lian-color" data-default-color="#555555" />
      </div>
    </div>

    <div class="row">
      <div class="col-4"><?php _e( 'Link Color Hover', 'lian' ); ?></div>
      <div class="col">
        <input name="lian_options[lian_style_a_color_hover]" type="text" value="<?php echo self::get_theme_option( 'lian_style_a_color_hover' ); ?>" class="lian-color" data-default-color="#555555" />
      </div>
    </div>

    <h2><?php _e( 'Buttons', 'lian' ); ?></h2>

    <div class="row">
      <div class="col-4"><?php _e( 'Button Background Color', 'lian' ); ?></div>
      <div class="col">
        <input name="lian_options[lian_style_button_bg]" type="text" value="<?php echo self::get_theme_option( 'lian_style_button_bg' ); ?>" class="lian-color" data-default-color="#555555" />
      </div>
    </div>

    <div class="row">
      <div class="col-4"><?php _e( 'Button Background Color Hover', 'lian' ); ?></div>
      <div class="col">
        <input name="lian_options[lian_style_button_bg_hover]" type="text" value="<?php echo self::get_theme_option( 'lian_style_button_bg_hover' ); ?>" class="lian-color" data-default-color="#555555" />
      </div>
    </div>

    <div class="row">
      <div class="col-4"><?php _e( 'Button Text Color', 'lian' ); ?></div>
      <div class="col">
        <input name="lian_options[lian_style_button_color]" type="text" value="<?php echo self::get_theme_option( 'lian_style_button_color' ); ?>" class="lian-color" data-default-color="#555555" />
      </div>
    </div>

    <div class="row">
      <div class="col-4"><?php _e( 'Button Text Color Hover', 'lian' ); ?></div>
      <div class="col">
        <input name="lian_options[lian_style_button_color_hover]" type="text" value="<?php echo self::get_theme_option( 'lian_style_button_color_hover' ); ?>" class="lian-color" data-default-color="#555555" />
      </div>
    </div>
    
    <h2><?php _e( 'Inputs', 'lian' ); ?></h2>

    <div class="row">
      <div class="col-4"><?php _e( 'Input Text Color', 'lian' ); ?></div>
      <div class="col">
        <input name="lian_options[lian_input_text_color]" type="text" value="<?php echo self::get_theme_option( 'lian_input_text_color' ); ?>" class="lian-color" data-default-color="#555555" />
      </div>
    </div>

    <div class="row">
      <div class="col-4"><?php _e( 'Input Background Color', 'lian' ); ?></div>
      <div class="col">
        <input name="lian_options[lian_input_bg_color]" type="text" value="<?php echo self::get_theme_option( 'lian_input_bg_color' ); ?>" class="lian-color" data-default-color="#555555" />
      </div>
    </div>

    <div class="row">
      <div class="col-4"><?php _e( 'Input Border Color', 'lian' ); ?></div>
      <div class="col">
        <input name="lian_options[lian_input_border_color]" type="text" value="<?php echo self::get_theme_option( 'lian_input_border_color' ); ?>" class="lian-color" data-default-color="#555555" />
      </div>
    </div>

    <div class="row">
      <div class="col-4"><?php _e( 'Input Placeholder Text Color', 'lian' ); ?></div>
      <div class="col">
        <input name="lian_options[lian_input_ptext_color]" type="text" value="<?php echo self::get_theme_option( 'lian_input_ptext_color' ); ?>" class="lian-color" data-default-color="#555555" />
      </div>
    </div>

    <h2><?php _e( 'Breadcrumb', 'lian' ); ?></h2>

    <div class="row">
      <div class="col-4"><?php _e( 'Breadcrumb Text Color', 'lian' ); ?></div>
      <div class="col">
        <input name="lian_options[lian_breadcrumb_color]" type="text" value="<?php echo self::get_theme_option( 'lian_breadcrumb_color' ); ?>" class="lian-color" data-default-color="#555555" />
      </div>
    </div>

    <h2><?php _e( 'WooCommerce', 'lian' ); ?></h2>

    <div class="row">
      <div class="col-4"><?php _e( 'Price Color', 'lian' ); ?></div>
      <div class="col">
        <input name="lian_options[lian_style_price_color]" type="text" value="<?php echo self::get_theme_option( 'lian_style_price_color' ); ?>" class="lian-color" data-default-color="#555555" />
      </div>
    </div>
    
  </div>
</li>