<li>
  <div>
    <h2><?php _e( 'Footer', 'lian' ); ?></h2>
    <div class="row">
      <div class="col-4"><?php _e( 'Custom Footer', 'lian' ); ?></div>
      <div class="col">
        <label class="switcher">
          <input type="checkbox" name="lian_options[lian_cs_footer]" value="1" <?php checked(1, self::get_theme_option( 'lian_cs_footer' ), true); ?> />
          <div class="switcher__indicator"></div>
        </label>
      </div>
    </div>

    <div class="row">
      <div class="col-4"><?php _e( 'Choose Footer', 'lian' ); ?></div>
      <div class="col">
        <select name="lian_options[lian_cs_footer_name]">
          <option value=""><?php _e( '-- Choose --', 'lian' ); ?></option>
        <?php

        $args = array(
          'post_type'=> 'lian_footer',
          'order'    => 'ASC'
        );

        $the_query = new WP_Query( $args );
        if($the_query->have_posts() ) :
          while ( $the_query->have_posts() ) :
             $the_query->the_post();
             echo '<option value="'.get_the_ID().'"';
             echo selected(get_the_ID(), self::get_theme_option( 'lian_cs_footer_name' ), true);
             echo '>'.get_the_title().'</option>';
          endwhile;
          wp_reset_postdata();
        else:
        endif;
        ?>
        </select>

      </div>
    </div>


    <div class="row">
      <div class="col-4"><?php _e( 'Copyright Text', 'lian' ); ?></div>
      <div class="col">
          <input type="text" name="lian_options[lian_text_copyright]" value="<?php echo self::get_theme_option( 'lian_text_copyright' ); ?>"/>
      </div>
    </div>


  </div>
</li>
