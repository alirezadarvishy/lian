<li>
  <div>
    <h2><?php _e( 'Archive', 'lian' ); ?></h2>

    <div class="row">
      <div class="col-4"><?php _e( 'Post Card Style', 'lian' ); ?></div>
      <div class="col">
        <label class="switcher icon-switcher">
          <div class="icon">
              <svg width="50px" height="50px" fill="#d5d5d5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M8.5,11H5.563a2.5,2.5,0,0,1-2.5-2.5V5.564a2.5,2.5,0,0,1,2.5-2.5H8.5a2.5,2.5,0,0,1,2.5,2.5V8.5A2.5,2.5,0,0,1,8.5,11ZM5.563,4.064a1.5,1.5,0,0,0-1.5,1.5V8.5a1.5,1.5,0,0,0,1.5,1.5H8.5A1.5,1.5,0,0,0,10,8.5V5.564a1.5,1.5,0,0,0-1.5-1.5Z"/>
                <path d="M18.436,11H15.5A2.5,2.5,0,0,1,13,8.5V5.564a2.5,2.5,0,0,1,2.5-2.5h2.934a2.5,2.5,0,0,1,2.5,2.5V8.5A2.5,2.5,0,0,1,18.436,11ZM15.5,4.064a1.5,1.5,0,0,0-1.5,1.5V8.5A1.5,1.5,0,0,0,15.5,10h2.934a1.5,1.5,0,0,0,1.5-1.5V5.564a1.5,1.5,0,0,0-1.5-1.5Z"/>
                <path d="M8.5,20.936H5.564a2.5,2.5,0,0,1-2.5-2.5V15.5a2.5,2.5,0,0,1,2.5-2.5H8.5A2.5,2.5,0,0,1,11,15.5v2.936A2.5,2.5,0,0,1,8.5,20.936ZM5.564,14a1.5,1.5,0,0,0-1.5,1.5v2.936a1.5,1.5,0,0,0,1.5,1.5H8.5a1.5,1.5,0,0,0,1.5-1.5V15.5A1.5,1.5,0,0,0,8.5,14Z"/>
                <path d="M18.436,20.936H15.5a2.5,2.5,0,0,1-2.5-2.5V15.5A2.5,2.5,0,0,1,15.5,13h2.934a2.5,2.5,0,0,1,2.5,2.5v2.936A2.5,2.5,0,0,1,18.436,20.936ZM15.5,14A1.5,1.5,0,0,0,14,15.5v2.936a1.5,1.5,0,0,0,1.5,1.5h2.934a1.5,1.5,0,0,0,1.5-1.5V15.5a1.5,1.5,0,0,0-1.5-1.5Z"/>
              </svg>
          </div>
          <input type="radio" name="lian_options[lian_blog_archive_post_style]" value="grid" <?php checked('grid', self::get_theme_option( 'lian_blog_archive_post_style' ), true); ?> />
          <div class="switcher__indicator"></div>
          <span><?php _e('Grid','lian'); ?></span>
        </label>
        <label class="switcher icon-switcher">
          <div class="icon">
            <svg width="50px" height="50px" fill="#d5d5d5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <g data-name="Grid _2-H">
              <path d="M18.437,11H5.565a2.5,2.5,0,0,1-2.5-2.5V5.564a2.5,2.5,0,0,1,2.5-2.5H18.437a2.5,2.5,0,0,1,2.5,2.5V8.5A2.5,2.5,0,0,1,18.437,11ZM5.565,4.064a1.5,1.5,0,0,0-1.5,1.5V8.5a1.5,1.5,0,0,0,1.5,1.5H18.437a1.5,1.5,0,0,0,1.5-1.5V5.564a1.5,1.5,0,0,0-1.5-1.5Z"/>
              <path d="M18.437,20.936H5.565a2.5,2.5,0,0,1-2.5-2.5V15.5a2.5,2.5,0,0,1,2.5-2.5H18.437a2.5,2.5,0,0,1,2.5,2.5v2.934A2.5,2.5,0,0,1,18.437,20.936ZM5.565,14a1.5,1.5,0,0,0-1.5,1.5v2.934a1.5,1.5,0,0,0,1.5,1.5H18.437a1.5,1.5,0,0,0,1.5-1.5V15.5a1.5,1.5,0,0,0-1.5-1.5Z"/>
              </g>
            </svg>
          </div>
          <input type="radio" name="lian_options[lian_blog_archive_post_style]" value="row" <?php checked('row', self::get_theme_option( 'lian_blog_archive_post_style' ), true); ?> />
          <div class="switcher__indicator"></div>
          <span><?php _e('Row','lian'); ?></span>
        </label>
      </div>
    </div>

    <div class="row">
      <div class="col-4"><?php _e( 'Grid: Number of posts in a row', 'lian' ); ?></div>
      <div class="col">
        <select name="lian_options[lian_blog_archive_grid_in_row]">
          <option value=""><?php _e( '-- Choose --', 'lian' ); ?></option>
          <option value="2" <?php echo selected(2, self::get_theme_option( 'lian_blog_archive_grid_in_row' ), true); ?>><?php _e( 'Two', 'lian' ); ?></option>
          <option value="3" <?php echo selected(3, self::get_theme_option( 'lian_blog_archive_grid_in_row' ), true); ?>><?php _e( 'Three', 'lian' ); ?></option>
          <option value="4" <?php echo selected(4, self::get_theme_option( 'lian_blog_archive_grid_in_row' ), true); ?>><?php _e( 'Four', 'lian' ); ?></option>
          <option value="5" <?php echo selected(5, self::get_theme_option( 'lian_blog_archive_grid_in_row' ), true); ?>><?php _e( 'Five', 'lian' ); ?></option>
          <option value="5" <?php echo selected(5, self::get_theme_option( 'lian_blog_archive_grid_in_row' ), true); ?>><?php _e( 'Six', 'lian' ); ?></option>
        </select>

      </div>
    </div>


    <div class="row">
      <div class="col-4"><?php _e( 'Show Sidebar', 'lian' ); ?></div>
      <div class="col">
        <label class="switcher">
          <input type="checkbox" name="lian_options[lian_blog_archive_sidebar]" value="1" <?php checked(1, self::get_theme_option( 'lian_blog_archive_sidebar' ), true); ?> />
          <div class="switcher__indicator"></div>
        </label>
      </div>
    </div>

    <div class="row">
      <div class="col-4"><?php _e( 'Show Thumbnail', 'lian' ); ?></div>
      <div class="col">
        <label class="switcher">
          <input type="checkbox" name="lian_options[lian_blog_archive_thumb]" value="1" <?php checked(1, self::get_theme_option( 'lian_blog_archive_thumb' ), true); ?> />
          <div class="switcher__indicator"></div>
        </label>
      </div>
    </div>

    <div class="row">
      <div class="col-4"><?php _e( 'Show Post Date', 'lian' ); ?></div>
      <div class="col">
        <label class="switcher">
          <input type="checkbox" name="lian_options[lian_blog_archive_postdate]" value="1" <?php checked(1, self::get_theme_option( 'lian_blog_archive_postdate' ), true); ?> />
          <div class="switcher__indicator"></div>
        </label>
      </div>
    </div>

    <div class="row">
      <div class="col-4"><?php _e( 'Show Author Name', 'lian' ); ?></div>
      <div class="col">
        <label class="switcher">
          <input type="checkbox" name="lian_options[lian_blog_archive_author]" value="1" <?php checked(1, self::get_theme_option( 'lian_blog_archive_author' ), true); ?> />
          <div class="switcher__indicator"></div>
        </label>
      </div>
    </div>

    <div class="row">
      <div class="col-4"><?php _e( 'Show Expert', 'lian' ); ?></div>
      <div class="col">
        <label class="switcher">
          <input type="checkbox" name="lian_options[lian_blog_archive_expert]" value="1" <?php checked(1, self::get_theme_option( 'lian_blog_archive_expert' ), true); ?> />
          <div class="switcher__indicator"></div>
        </label>
      </div>
    </div>

    <div class="row">
      <div class="col-4"><?php _e( 'Expert Long (words)', 'lian' ); ?></div>
      <div class="col">
        <input type="number" name="lian_options[lian_blog_archive_expert_long]" placeholder="<?php _e('For example: 36', 'lian'); ?>" value="<?php echo self::get_theme_option( 'lian_blog_archive_expert_long' ); ?>"/>
      </div>
    </div>

    <div class="row">
      <div class="col-4"><?php _e( 'Show Read More', 'lian' ); ?></div>
      <div class="col">
        <label class="switcher">
          <input type="checkbox" name="lian_options[lian_blog_archive_readmore]" value="1" <?php checked(1, self::get_theme_option( 'lian_blog_archive_readmore' ), true); ?> />
          <div class="switcher__indicator"></div>
        </label>
      </div>
    </div>

    <div class="row">
      <div class="col-4"><?php _e( 'Read More Text', 'lian' ); ?></div>
      <div class="col">
        <input type="text" name="lian_options[lian_blog_archive_readmore_text]" placeholder="<?php _e('Read More Text', 'lian'); ?>" value="<?php echo self::get_theme_option( 'lian_blog_archive_readmore_text' ); ?>"/>
      </div>
    </div>

    <div class="row">
      <div class="col-4"><?php _e( 'Show Categories', 'lian' ); ?></div>
      <div class="col">
        <label class="switcher">
          <input type="checkbox" name="lian_options[lian_blog_archive_categories]" value="1" <?php checked(1, self::get_theme_option( 'lian_blog_archive_categories' ), true); ?> />
          <div class="switcher__indicator"></div>
        </label>
      </div>
    </div>

    <div class="row">
      <div class="col-4"><?php _e( 'Show Tags', 'lian' ); ?></div>
      <div class="col">
        <label class="switcher">
          <input type="checkbox" name="lian_options[lian_blog_archive_tags]" value="1" <?php checked(1, self::get_theme_option( 'lian_blog_archive_tags' ), true); ?> />
          <div class="switcher__indicator"></div>
        </label>
      </div>
    </div>


    <h2><?php _e( 'Single', 'lian' ); ?></h2>
    <div class="row">
      <div class="col-4"><?php _e( 'Show Sidebar', 'lian' ); ?></div>
      <div class="col">
        <label class="switcher">
          <input type="checkbox" name="lian_options[lian_blog_single_sidebar]" value="1" <?php checked(1, self::get_theme_option( 'lian_blog_single_sidebar' ), true); ?> />
          <div class="switcher__indicator"></div>
        </label>
      </div>
    </div>
    <div class="row">
      <div class="col-4"><?php _e( 'Show Thumbnail', 'lian' ); ?></div>
      <div class="col">
        <label class="switcher">
          <input type="checkbox" name="lian_options[lian_blog_single_thumb]" value="1" <?php checked(1, self::get_theme_option( 'lian_blog_single_thumb' ), true); ?> />
          <div class="switcher__indicator"></div>
        </label>
      </div>
    </div>

    <div class="row">
      <div class="col-4"><?php _e( 'Show Post Date', 'lian' ); ?></div>
      <div class="col">
        <label class="switcher">
          <input type="checkbox" name="lian_options[lian_blog_single_postdate]" value="1" <?php checked(1, self::get_theme_option( 'lian_blog_single_postdate' ), true); ?> />
          <div class="switcher__indicator"></div>
        </label>
      </div>
    </div>

    <div class="row">
      <div class="col-4"><?php _e( 'Show Author Name', 'lian' ); ?></div>
      <div class="col">
        <label class="switcher">
          <input type="checkbox" name="lian_options[lian_blog_single_author]" value="1" <?php checked(1, self::get_theme_option( 'lian_blog_single_author' ), true); ?> />
          <div class="switcher__indicator"></div>
        </label>
      </div>
    </div>
    
    <div class="row">
      <div class="col-4"><?php _e( 'Show Categories', 'lian' ); ?></div>
      <div class="col">
        <label class="switcher">
          <input type="checkbox" name="lian_options[lian_blog_single_categories]" value="1" <?php checked(1, self::get_theme_option( 'lian_blog_single_categories' ), true); ?> />
          <div class="switcher__indicator"></div>
        </label>
      </div>
    </div>

    <div class="row">
      <div class="col-4"><?php _e( 'Show Tags', 'lian' ); ?></div>
      <div class="col">
        <label class="switcher">
          <input type="checkbox" name="lian_options[lian_blog_single_tags]" value="1" <?php checked(1, self::get_theme_option( 'lian_blog_single_tags' ), true); ?> />
          <div class="switcher__indicator"></div>
        </label>
      </div>
    </div>

  </div>
</li>
