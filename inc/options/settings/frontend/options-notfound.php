<li>
  <div>
    <h2><?php _e( '404 Page', 'lian' ); ?></h2>
    <div class="row">
      <div class="col-4"><?php _e( 'Show Sidebar', 'lian' ); ?></div>
      <div class="col">
        <label class="switcher">
          <input type="checkbox" name="lian_options[lian_notfound_sidebar]" value="1" <?php checked(1, self::get_theme_option( 'lian_notfound_sidebar' ), true); ?> />
          <div class="switcher__indicator"></div>
        </label>
      </div>
    </div>
    <div class="row">
      <div class="col-4"><?php _e( 'Page Title', 'lian' ); ?></div>
      <div class="col">
          <input type="text" name="lian_options[lian_notfound_title]" value="<?php echo self::get_theme_option( 'lian_notfound_title' ); ?>"/>
      </div>
    </div>
    <div class="row">
      <div class="col-4"><?php _e( 'Page description', 'lian' ); ?></div>
      <div class="col">
          <input type="text" name="lian_options[lian_notfound_desc]" value="<?php echo self::get_theme_option( 'lian_notfound_desc' ); ?>"/>
      </div>
    </div>

    <div class="row">
      <div class="col-4"><?php _e( 'Show home page link', 'lian' ); ?></div>
      <div class="col">
        <label class="switcher">
          <input type="checkbox" name="lian_options[lian_notfound_homelink]" value="1" <?php checked(1, self::get_theme_option( 'lian_notfound_homelink' ), true); ?> />
          <div class="switcher__indicator"></div>
        </label>
      </div>
    </div>

  </div>
</li>
