<?php
/*
 *
 * Account Options
 *
 */

use Lian\Fonts;
$fonts = Fonts::get_fonts();
?>
<li>
  <div>
    <h2 id="typographysection">
      <div class="col-4"><?php _e( 'Typography', 'lian' ); ?></div>
      <div class="col">
        <div class="col">
          <div class="col"><span class="small-label"><?php _e( 'Font', 'lian' ); ?></span></div>
        </div>
        <div class="col">
          <div class="col"><span class="small-label pl-40"><?php _e( 'Font Size', 'lian' ); ?></span></div>
        </div>
        <div class="col">
          <div class="col"><span class="small-label pl-40"><?php _e( 'Font Weight', 'lian' ); ?></span></div>
        </div>
        <div class="col">
          <div class="col"><span class="small-label"><?php _e( 'Line Height', 'lian' ); ?></span></div>
        </div>
      </div>
    </h2>

    <div class="row">
      <div class="col-4"><?php _e( 'Other Tags (p, span, b and etc)', 'lian' ); ?></div>
      <div class="col">
          <div class="col">
            <select name="lian_options[lian_typography_main_font]">
              <option value=""><?php _e( '-- Choose Font --', 'lian' ); ?></option>
              <?php 
              foreach ($fonts as $key => $value) {
                echo '<option value="'.$key.'" data-type="'.$value.'" style="font-family:'.$key.';" '. selected(self::get_theme_option( 'lian_typography_main_font' ),$key,false) .'>'.$key.'</option>';
              }
              ?>
            </select>
          </div>
          <div class="col">
            <input type="text" name="lian_options[lian_typography_main_size]" placeholder="<?php _e('Main Font Size', 'lian'); ?>" value="<?php echo self::get_theme_option( 'lian_typography_main_size' ); ?>"/>
          </div>
          <div class="col">
            <select name="lian_options[lian_typography_main_weight]">
              <option value=""><?php _e( '-- Choose Weight --', 'lian' ); ?></option>
              <option value="100" <?php selected(self::get_theme_option( 'lian_typography_main_weight' ),'100',true); ?>><?php _e( 'Thin', 'lian' ); ?></option>
              <option value="300" <?php selected(self::get_theme_option( 'lian_typography_main_weight' ),'300',true); ?>><?php _e( 'Light', 'lian' ); ?></option>
              <option value="400" <?php selected(self::get_theme_option( 'lian_typography_main_weight' ),'400',true); ?>><?php _e( 'Normal', 'lian' ); ?></option>
              <option value="500" <?php selected(self::get_theme_option( 'lian_typography_main_weight' ),'500',true); ?>><?php _e( 'Medium', 'lian' ); ?></option>
              <option value="700" <?php selected(self::get_theme_option( 'lian_typography_main_weight' ),'700',true); ?>><?php _e( 'Bold', 'lian' ); ?></option>
              <option value="800" <?php selected(self::get_theme_option( 'lian_typography_main_weight' ),'800',true); ?>><?php _e( 'Extra Bold', 'lian' ); ?></option>
            </select>
          </div>
          <div class="col">
            <input type="text" name="lian_options[lian_typography_main_lineheight]" placeholder="<?php _e('Main Line Height', 'lian'); ?>" value="<?php echo self::get_theme_option( 'lian_typography_main_lineheight' ); ?>"/>
          </div>
      </div>
    </div>
    <div class="row">
      <div class="col-4"><?php _e( 'H1 Tag', 'lian' ); ?></div>
      <div class="col">
        <select name="lian_options[lian_typography_h1_font]">
          <option value=""><?php _e( '-- Choose Font --', 'lian' ); ?></option>
          <?php 
            foreach ($fonts as $key => $value) {
              echo '<option value="'.$key.'" data-type="'.$value.'" style="font-family:'.$key.';" '. selected(self::get_theme_option( 'lian_typography_h1_font' ),$key,false) .'>'.$key.'</option>';
            }
          ?>
        </select>
        <div class="col">
          <input type="text" name="lian_options[lian_typography_h1_size]" placeholder="<?php _e('H1 Font Size', 'lian'); ?>" value="<?php echo self::get_theme_option( 'lian_typography_h1_size' ); ?>"/>
        </div>
        <div class="col">
          <select name="lian_options[lian_typography_h1_weight]">
            <option value=""><?php _e( '-- Choose Weight --', 'lian' ); ?></option>
            <option value="100" <?php selected(self::get_theme_option( 'lian_typography_h1_weight' ),'100',true); ?>><?php _e( 'Thin', 'lian' ); ?></option>
            <option value="300" <?php selected(self::get_theme_option( 'lian_typography_h1_weight' ),'300',true); ?>><?php _e( 'Light', 'lian' ); ?></option>
            <option value="400" <?php selected(self::get_theme_option( 'lian_typography_h1_weight' ),'400',true); ?>><?php _e( 'Normal', 'lian' ); ?></option>
            <option value="500" <?php selected(self::get_theme_option( 'lian_typography_h1_weight' ),'500',true); ?>><?php _e( 'Medium', 'lian' ); ?></option>
            <option value="700" <?php selected(self::get_theme_option( 'lian_typography_h1_weight' ),'700',true); ?>><?php _e( 'Bold', 'lian' ); ?></option>
            <option value="800" <?php selected(self::get_theme_option( 'lian_typography_h1_weight' ),'800',true); ?>><?php _e( 'Extra Bold', 'lian' ); ?></option>
          </select>
        </div>
        <div class="col">
          <input type="text" name="lian_options[lian_typography_h1_lineheight]" placeholder="<?php _e('H1 Line Height', 'lian'); ?>" value="<?php echo self::get_theme_option( 'lian_typography_h1_lineheight' ); ?>"/>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-4"><?php _e( 'H2 Tag', 'lian' ); ?></div>
      <div class="col">
        <select name="lian_options[lian_typography_h2_font]">
          <option value=""><?php _e( '-- Choose Font --', 'lian' ); ?></option>
          <?php 
            foreach ($fonts as $key => $value) {
              echo '<option value="'.$key.'" data-type="'.$value.'" style="font-family:'.$key.';" '. selected(self::get_theme_option( 'lian_typography_h2_font' ),$key,false) .'>'.$key.'</option>';
            }
          ?>
        </select>
        <div class="col">
          <input type="text" name="lian_options[lian_typography_h2_size]" placeholder="<?php _e('H2 Font Size', 'lian'); ?>" value="<?php echo self::get_theme_option( 'lian_typography_h2_size' ); ?>"/>
        </div>
        <div class="col">
          <select name="lian_options[lian_typography_h2_weight]">
            <option value=""><?php _e( '-- Choose Weight --', 'lian' ); ?></option>
            <option value="100" <?php selected(self::get_theme_option( 'lian_typography_h2_weight' ),'100',true); ?>><?php _e( 'Thin', 'lian' ); ?></option>
            <option value="300" <?php selected(self::get_theme_option( 'lian_typography_h2_weight' ),'300',true); ?>><?php _e( 'Light', 'lian' ); ?></option>
            <option value="400" <?php selected(self::get_theme_option( 'lian_typography_h2_weight' ),'400',true); ?>><?php _e( 'Normal', 'lian' ); ?></option>
            <option value="500" <?php selected(self::get_theme_option( 'lian_typography_h2_weight' ),'500',true); ?>><?php _e( 'Medium', 'lian' ); ?></option>
            <option value="700" <?php selected(self::get_theme_option( 'lian_typography_h2_weight' ),'700',true); ?>><?php _e( 'Bold', 'lian' ); ?></option>
            <option value="800" <?php selected(self::get_theme_option( 'lian_typography_h2_weight' ),'800',true); ?>><?php _e( 'Extra Bold', 'lian' ); ?></option>
          </select>
        </div>
        <div class="col">
          <input type="text" name="lian_options[lian_typography_h2_lineheight]" placeholder="<?php _e('H2 Line Height', 'lian'); ?>" value="<?php echo self::get_theme_option( 'lian_typography_h2_lineheight' ); ?>"/>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-4"><?php _e( 'H3 Tag', 'lian' ); ?></div>
      <div class="col">
        <select name="lian_options[lian_typography_h3_font]">
          <option value=""><?php _e( '-- Choose Font --', 'lian' ); ?></option>
          <?php 
            foreach ($fonts as $key => $value) {
              echo '<option value="'.$key.'" data-type="'.$value.'" style="font-family:'.$key.';" '. selected(self::get_theme_option( 'lian_typography_h3_font' ),$key,false) .'>'.$key.'</option>';
            }
          ?>
          </select>
        <div class="col">
          <input type="text" name="lian_options[lian_typography_h3_size]" placeholder="<?php _e('H3 Font Size', 'lian'); ?>" value="<?php echo self::get_theme_option( 'lian_typography_h3_size' ); ?>"/>
        </div>
        <div class="col">
          <select name="lian_options[lian_typography_h3_weight]">
            <option value=""><?php _e( '-- Choose Weight --', 'lian' ); ?></option>
            <option value="100" <?php selected(self::get_theme_option( 'lian_typography_h3_weight' ),'100',true); ?>><?php _e( 'Thin', 'lian' ); ?></option>
            <option value="300" <?php selected(self::get_theme_option( 'lian_typography_h3_weight' ),'300',true); ?>><?php _e( 'Light', 'lian' ); ?></option>
            <option value="400" <?php selected(self::get_theme_option( 'lian_typography_h3_weight' ),'400',true); ?>><?php _e( 'Normal', 'lian' ); ?></option>
            <option value="500" <?php selected(self::get_theme_option( 'lian_typography_h3_weight' ),'500',true); ?>><?php _e( 'Medium', 'lian' ); ?></option>
            <option value="700" <?php selected(self::get_theme_option( 'lian_typography_h3_weight' ),'700',true); ?>><?php _e( 'Bold', 'lian' ); ?></option>
            <option value="800" <?php selected(self::get_theme_option( 'lian_typography_h3_weight' ),'800',true); ?>><?php _e( 'Extra Bold', 'lian' ); ?></option>
          </select>
        </div>
        <div class="col">
          <input type="text" name="lian_options[lian_typography_h3_lineheight]" placeholder="<?php _e('H3 Line Height', 'lian'); ?>" value="<?php echo self::get_theme_option( 'lian_typography_h3_lineheight' ); ?>"/>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-4"><?php _e( 'H4 Tag', 'lian' ); ?></div>
      <div class="col">
        <select name="lian_options[lian_typography_h4_font]">
          <option value=""><?php _e( '-- Choose Font --', 'lian' ); ?></option>
          <?php 
            foreach ($fonts as $key => $value) {
              echo '<option value="'.$key.'" data-type="'.$value.'" style="font-family:'.$key.';" '. selected(self::get_theme_option( 'lian_typography_h4_font' ),$key,false) .'>'.$key.'</option>';
            }
          ?>
          </select>
        <div class="col">
          <input type="text" name="lian_options[lian_typography_h4_size]" placeholder="<?php _e('H4 Font Size', 'lian'); ?>" value="<?php echo self::get_theme_option( 'lian_typography_h4_size' ); ?>"/>
        </div>
        <div class="col">
          <select name="lian_options[lian_typography_h4_weight]">
            <option value=""><?php _e( '-- Choose Weight --', 'lian' ); ?></option>
            <option value="100" <?php selected(self::get_theme_option( 'lian_typography_h4_weight' ),'100',true); ?>><?php _e( 'Thin', 'lian' ); ?></option>
            <option value="300" <?php selected(self::get_theme_option( 'lian_typography_h4_weight' ),'300',true); ?>><?php _e( 'Light', 'lian' ); ?></option>
            <option value="400" <?php selected(self::get_theme_option( 'lian_typography_h4_weight' ),'400',true); ?>><?php _e( 'Normal', 'lian' ); ?></option>
            <option value="500" <?php selected(self::get_theme_option( 'lian_typography_h4_weight' ),'500',true); ?>><?php _e( 'Medium', 'lian' ); ?></option>
            <option value="700" <?php selected(self::get_theme_option( 'lian_typography_h4_weight' ),'700',true); ?>><?php _e( 'Bold', 'lian' ); ?></option>
            <option value="800" <?php selected(self::get_theme_option( 'lian_typography_h4_weight' ),'800',true); ?>><?php _e( 'Extra Bold', 'lian' ); ?></option>
          </select>
        </div>
        <div class="col">
          <input type="text" name="lian_options[lian_typography_h4_lineheight]" placeholder="<?php _e('H4 Line Height', 'lian'); ?>" value="<?php echo self::get_theme_option( 'lian_typography_h4_lineheight' ); ?>"/>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-4"><?php _e( 'H5 Tag', 'lian' ); ?></div>
      <div class="col">
        <select name="lian_options[lian_typography_h5_font]">
          <option value=""><?php _e( '-- Choose Font --', 'lian' ); ?></option>
          <?php 
            foreach ($fonts as $key => $value) {
              echo '<option value="'.$key.'" data-type="'.$value.'" style="font-family:'.$key.';" '. selected(self::get_theme_option( 'lian_typography_h5_font' ),$key,false) .'>'.$key.'</option>';
            }
          ?>
          </select>
        <div class="col">
          <input type="text" name="lian_options[lian_typography_h5_size]" placeholder="<?php _e('H5 Font Size', 'lian'); ?>" value="<?php echo self::get_theme_option( 'lian_typography_h5_size' ); ?>"/>
        </div>
        <div class="col">
          <select name="lian_options[lian_typography_h5_weight]">
            <option value=""><?php _e( '-- Choose Weight --', 'lian' ); ?></option>
            <option value="100" <?php selected(self::get_theme_option( 'lian_typography_h5_weight' ),'100',true); ?>><?php _e( 'Thin', 'lian' ); ?></option>
            <option value="300" <?php selected(self::get_theme_option( 'lian_typography_h5_weight' ),'300',true); ?>><?php _e( 'Light', 'lian' ); ?></option>
            <option value="400" <?php selected(self::get_theme_option( 'lian_typography_h5_weight' ),'400',true); ?>><?php _e( 'Normal', 'lian' ); ?></option>
            <option value="500" <?php selected(self::get_theme_option( 'lian_typography_h5_weight' ),'500',true); ?>><?php _e( 'Medium', 'lian' ); ?></option>
            <option value="700" <?php selected(self::get_theme_option( 'lian_typography_h5_weight' ),'700',true); ?>><?php _e( 'Bold', 'lian' ); ?></option>
            <option value="800" <?php selected(self::get_theme_option( 'lian_typography_h5_weight' ),'800',true); ?>><?php _e( 'Extra Bold', 'lian' ); ?></option>
          </select>
        </div>
        <div class="col">
          <input type="text" name="lian_options[lian_typography_h5_lineheight]" placeholder="<?php _e('H5 Line Height', 'lian'); ?>" value="<?php echo self::get_theme_option( 'lian_typography_h5_lineheight' ); ?>"/>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-4"><?php _e( 'H6 Tag', 'lian' ); ?></div>
      <div class="col">
        <select name="lian_options[lian_typography_h6_font]">
          <option value=""><?php _e( '-- Choose Font --', 'lian' ); ?></option>
          <?php 
            foreach ($fonts as $key => $value) {
              echo '<option value="'.$key.'" data-type="'.$value.'" style="font-family:'.$key.';" '. selected(self::get_theme_option( 'lian_typography_h6_font' ),$key,false) .'>'.$key.'</option>';
            }
          ?>
        </select>
        <div class="col">
          <input type="text" name="lian_options[lian_typography_h6_size]" placeholder="<?php _e('H6 Font Size', 'lian'); ?>" value="<?php echo self::get_theme_option( 'lian_typography_h6_size' ); ?>"/>
        </div>
        <div class="col">
          <select name="lian_options[lian_typography_h6_weight]">
            <option value=""><?php _e( '-- Choose Weight --', 'lian' ); ?></option>
            <option value="100" <?php selected(self::get_theme_option( 'lian_typography_h6_weight' ),'100',true); ?>><?php _e( 'Thin', 'lian' ); ?></option>
            <option value="300" <?php selected(self::get_theme_option( 'lian_typography_h6_weight' ),'300',true); ?>><?php _e( 'Light', 'lian' ); ?></option>
            <option value="400" <?php selected(self::get_theme_option( 'lian_typography_h6_weight' ),'400',true); ?>><?php _e( 'Normal', 'lian' ); ?></option>
            <option value="500" <?php selected(self::get_theme_option( 'lian_typography_h6_weight' ),'500',true); ?>><?php _e( 'Medium', 'lian' ); ?></option>
            <option value="700" <?php selected(self::get_theme_option( 'lian_typography_h6_weight' ),'700',true); ?>><?php _e( 'Bold', 'lian' ); ?></option>
            <option value="800" <?php selected(self::get_theme_option( 'lian_typography_h6_weight' ),'800',true); ?>><?php _e( 'Extra Bold', 'lian' ); ?></option>
          </select>
        </div>
        <div class="col">
          <input type="text" name="lian_options[lian_typography_h6_lineheight]" placeholder="<?php _e('H6 Line Height', 'lian'); ?>" value="<?php echo self::get_theme_option( 'lian_typography_h6_lineheight' ); ?>"/>
        </div>
      </div>
    </div>
  </div>
</li>
