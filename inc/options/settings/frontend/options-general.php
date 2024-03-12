<?php
/*
 *
 * Account Options
 *
 */
?>
<li style="display:block">
  <div>
    <h2><?php _e( 'General', 'lian' ); ?></h2>
    <div class="row">
      <div class="col-4"><?php _e( 'Logo', 'lian' ); ?></div>
      <div class="col">
        <input id="lian_general_main_logo" type="url" name="lian_options[lian_general_main_logo]" value="<?php echo self::get_theme_option( 'lian_general_main_logo' ); ?>" />
        <input id="lian-upload" type="button" class="btn btn-primary lian-upload" value="<?php _e( 'Choose File', 'lian' ); ?>" />
      </div>
    </div>

    <div class="row">
      <div class="col-4"><?php _e( 'Custom CSS', 'lian' ); ?></div>
      <div class="col">
        <textarea class="lian-code" name="lian_options[lian_general_css]" value="<?php echo self::get_theme_option( 'lian_general_css' ); ?>"></textarea>
      </div>
    </div>

    <div class="row">
      <div class="col-4"><?php _e( 'Custom JS', 'lian' ); ?></div>
      <div class="col">
        <textarea class="lian-code" name="lian_options[lian_general_js]" value="<?php echo self::get_theme_option( 'lian_general_js' ); ?>"></textarea>
      </div>
    </div>

  </div>
</li>
