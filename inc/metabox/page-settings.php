<?php

add_action( 'add_meta_boxes', 'lian_page_settings', 10, 2 );

function lian_page_settings( $post_type, $post ) {
  add_meta_box( 'lian-page-settings', __( 'Lian Page Settings', 'lian' ), 'lian_page_settings_mb', 'page', 'advanced', 'high' );
}

/**
 *  content
 */
function lian_page_settings_mb( $post ) { ?>
    <div class="lian-options">
        
        <div class="row">
            <div class="col-4"><?php _e('Lian Page Layout:', 'lian');?></div>
            <div class="col">
               <select name="lian_page_settings_page_layout">
                    <option value="boxed" <?php var_dump(get_post_meta($post->ID, 'lian_page_settings_page_layout', true)); echo selected(get_post_meta($post->ID, 'lian_page_settings_page_layout', true),'boxed') ?>><?php _e('Boxed', 'lian');?></option>
                    <option value="fullwidth" <?php echo selected(get_post_meta($post->ID, 'lian_page_settings_page_layout', true),'fullwidth') ?>><?php _e('Full Width', 'lian');?></option>
                </select>
            </div>
        </div>
        
        <div class="row">
            <div class="col-4"><?php _e('Hide Title:', 'lian');?></div>
            <div class="col">
                <label class="switcher">
                  <input type="checkbox" name="lian_page_settings_title" value="1" <?php echo checked(get_post_meta($post->ID, 'lian_page_settings_title', true),1) ?>>
                  <div class="switcher__indicator"></div>
                </label>
            </div>
        </div>
        
        <div class="row">
            <div class="col-4"><?php _e('Hide Breadcrumb:', 'lian');?></div>
            <div class="col">
                <label class="switcher">
                  <input type="checkbox" name="lian_page_settings_breadcrumb" value="1" <?php echo checked(get_post_meta($post->ID, 'lian_page_settings_breadcrumb', true),1) ?>>
                  <div class="switcher__indicator"></div>
                </label>
            </div>
        </div>
        
        <div class="row">
            <div class="col-4"><?php _e('Hide Sidebar:', 'lian');?></div>
            <div class="col">
                <label class="switcher">
                  <input type="checkbox" name="lian_page_settings_sidebar" value="1" <?php echo checked(get_post_meta($post->ID, 'lian_page_settings_sidebar', true),1) ?>>
                  <div class="switcher__indicator"></div>
                </label>
            </div>
        </div>
        
        <div class="row">
            <div class="col-4"><?php _e('Transparent Header:', 'lian');?></div>
            <div class="col">
                <label class="switcher">
                  <input type="checkbox" name="lian_page_settings_transparent_header" value="1" <?php echo checked(get_post_meta($post->ID, 'lian_page_settings_transparent_header', true),1) ?>>
                  <div class="switcher__indicator"></div>
                </label>
            </div>
        </div>
 
    </div>
    

<?php
}

/**
 *  Save
 */

add_action('save_post', function ($post_id) {
    
    if (isset($_POST['lian_page_settings_page_layout'])){
        update_post_meta($post_id, 'lian_page_settings_page_layout', $_POST['lian_page_settings_page_layout']);
    }else{
        update_post_meta($post_id, 'lian_page_settings_page_layout', '');
    }
    
    if (isset($_POST['lian_page_settings_title'])){
        update_post_meta($post_id, 'lian_page_settings_title', $_POST['lian_page_settings_title']);
    }else{
        update_post_meta($post_id, 'lian_page_settings_title', 0);
    }
    
    if (isset($_POST['lian_page_settings_breadcrumb'])){
        update_post_meta($post_id, 'lian_page_settings_breadcrumb', $_POST['lian_page_settings_breadcrumb']);
    }else{
        update_post_meta($post_id, 'lian_page_settings_breadcrumb', 0);
    }
    
    if(isset($_POST['lian_page_settings_sidebar'])){
        update_post_meta($post_id, 'lian_page_settings_sidebar', $_POST['lian_page_settings_sidebar']);
    }else{
        update_post_meta($post_id, 'lian_page_settings_sidebar', 0);
    }
    
    if(isset($_POST['lian_page_settings_transparent_header'])){
        update_post_meta($post_id, 'lian_page_settings_transparent_header', $_POST['lian_page_settings_transparent_header']);
    }else{
        update_post_meta($post_id, 'lian_page_settings_transparent_header', 0);
    }
});
