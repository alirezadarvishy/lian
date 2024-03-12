<li>
  <div>
    <h2><?php _e( 'Portfolio - Archive', 'lian' ); ?></h2>
    <div class="row">
      <div class="col-4"><?php _e( 'Show Sidebar', 'lian' ); ?></div>
      <div class="col">
        <label class="switcher">
          <input type="checkbox" name="lian_options[lian_portfolio_archive_sidebar]" value="1" <?php checked(1, self::get_theme_option( 'lian_portfolio_archive_sidebar' ), true); ?> />
          <div class="switcher__indicator"></div>
        </label>
      </div>
    </div>

    <div class="row">
      <div class="col-4"><?php _e( 'Show Thumbnail', 'lian' ); ?></div>
      <div class="col">
        <label class="switcher">
          <input type="checkbox" name="lian_options[lian_portfolio_archive_thumb]" value="1" <?php checked(1, self::get_theme_option( 'lian_portfolio_archive_thumb' ), true); ?> />
          <div class="switcher__indicator"></div>
        </label>
      </div>
    </div>

    <div class="row">
      <div class="col-4"><?php _e( 'Show Post Date', 'lian' ); ?></div>
      <div class="col">
        <label class="switcher">
          <input type="checkbox" name="lian_options[lian_portfolio_archive_postdate]" value="1" <?php checked(1, self::get_theme_option( 'lian_portfolio_archive_postdate' ), true); ?> />
          <div class="switcher__indicator"></div>
        </label>
      </div>
    </div>

    <div class="row">
      <div class="col-4"><?php _e( 'Show Author Name', 'lian' ); ?></div>
      <div class="col">
        <label class="switcher">
          <input type="checkbox" name="lian_options[lian_portfolio_archive_author]" value="1" <?php checked(1, self::get_theme_option( 'lian_portfolio_archive_author' ), true); ?> />
          <div class="switcher__indicator"></div>
        </label>
      </div>
    </div>

    <div class="row">
      <div class="col-4"><?php _e( 'Show Expert', 'lian' ); ?></div>
      <div class="col">
        <label class="switcher">
          <input type="checkbox" name="lian_options[lian_portfolio_archive_expert]" value="1" <?php checked(1, self::get_theme_option( 'lian_portfolio_archive_expert' ), true); ?> />
          <div class="switcher__indicator"></div>
        </label>
      </div>
    </div>

    <div class="row">
      <div class="col-4"><?php _e( 'Expert Long (words)', 'lian' ); ?></div>
      <div class="col">
        <input type="number" name="lian_options[lian_portfolio_archive_expert_long]" placeholder="<?php _e('For example: 36', 'lian'); ?>" value="<?php echo self::get_theme_option( 'lian_portfolio_archive_expert_long' ); ?>"/>
      </div>
    </div>

    <div class="row">
      <div class="col-4"><?php _e( 'Show Read More', 'lian' ); ?></div>
      <div class="col">
        <label class="switcher">
          <input type="checkbox" name="lian_options[lian_portfolio_archive_readmore]" value="1" <?php checked(1, self::get_theme_option( 'lian_portfolio_archive_readmore' ), true); ?> />
          <div class="switcher__indicator"></div>
        </label>
      </div>
    </div>

    <div class="row">
      <div class="col-4"><?php _e( 'Read More Text', 'lian' ); ?></div>
      <div class="col">
        <input type="text" name="lian_options[lian_portfolio_archive_readmore_text]" placeholder="<?php _e('Read More Text', 'lian'); ?>" value="<?php echo self::get_theme_option( 'lian_portfolio_archive_readmore_text' ); ?>"/>
      </div>
    </div>

    <div class="row">
      <div class="col-4"><?php _e( 'Show Categories', 'lian' ); ?></div>
      <div class="col">
        <label class="switcher">
          <input type="checkbox" name="lian_options[lian_portfolio_archive_categories]" value="1" <?php checked(1, self::get_theme_option( 'lian_portfolio_archive_categories' ), true); ?> />
          <div class="switcher__indicator"></div>
        </label>
      </div>
    </div>

    <div class="row">
      <div class="col-4"><?php _e( 'Show Tags', 'lian' ); ?></div>
      <div class="col">
        <label class="switcher">
          <input type="checkbox" name="lian_options[lian_portfolio_archive_tags]" value="1" <?php checked(1, self::get_theme_option( 'lian_portfolio_archive_tags' ), true); ?> />
          <div class="switcher__indicator"></div>
        </label>
      </div>
    </div>


    <h2><?php _e( 'Portfolio - Single', 'lian' ); ?></h2>
    <div class="row">
      <div class="col-4"><?php _e( 'Show Sidebar', 'lian' ); ?></div>
      <div class="col">
        <label class="switcher">
          <input type="checkbox" name="lian_options[lian_portfolio_single_sidebar]" value="1" <?php checked(1, self::get_theme_option( 'lian_portfolio_single_sidebar' ), true); ?> />
          <div class="switcher__indicator"></div>
        </label>
      </div>
    </div>
    <div class="row">
      <div class="col-4"><?php _e( 'Show Thumbnail', 'lian' ); ?></div>
      <div class="col">
        <label class="switcher">
          <input type="checkbox" name="lian_options[lian_portfolio_single_thumb]" value="1" <?php checked(1, self::get_theme_option( 'lian_portfolio_single_thumb' ), true); ?> />
          <div class="switcher__indicator"></div>
        </label>
      </div>
    </div>

    <div class="row">
      <div class="col-4"><?php _e( 'Show Post Date', 'lian' ); ?></div>
      <div class="col">
        <label class="switcher">
          <input type="checkbox" name="lian_options[lian_portfolio_single_postdate]" value="1" <?php checked(1, self::get_theme_option( 'lian_portfolio_single_postdate' ), true); ?> />
          <div class="switcher__indicator"></div>
        </label>
      </div>
    </div>

    <div class="row">
      <div class="col-4"><?php _e( 'Show Author Name', 'lian' ); ?></div>
      <div class="col">
        <label class="switcher">
          <input type="checkbox" name="lian_options[lian_portfolio_single_author]" value="1" <?php checked(1, self::get_theme_option( 'lian_portfolio_single_author' ), true); ?> />
          <div class="switcher__indicator"></div>
        </label>
      </div>
    </div>
    
    <div class="row">
      <div class="col-4"><?php _e( 'Show Categories', 'lian' ); ?></div>
      <div class="col">
        <label class="switcher">
          <input type="checkbox" name="lian_options[lian_portfolio_single_categories]" value="1" <?php checked(1, self::get_theme_option( 'lian_portfolio_single_categories' ), true); ?> />
          <div class="switcher__indicator"></div>
        </label>
      </div>
    </div>

    <div class="row">
      <div class="col-4"><?php _e( 'Show Tags', 'lian' ); ?></div>
      <div class="col">
        <label class="switcher">
          <input type="checkbox" name="lian_options[lian_portfolio_single_tags]" value="1" <?php checked(1, self::get_theme_option( 'lian_portfolio_single_tags' ), true); ?> />
          <div class="switcher__indicator"></div>
        </label>
      </div>
    </div>

  </div>
</li>
