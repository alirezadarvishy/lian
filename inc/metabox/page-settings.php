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
        <input type="hidden" name="lian_metabox_nonce" value="<?php echo wp_create_nonce( "lian_metabox_nonce" ); ?>">
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
     
	if ( ! isset( $_POST['lian_metabox_nonce'] ) ) return;

	if ( ! wp_verify_nonce( $_POST['lian_metabox_nonce'], 'lian_metabox_nonce' ) ) return;
	

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	

	if ( ! current_user_can( 'edit_post', $post_id ) ) return;
	
    // Sanitize and save page layout
    if (array_key_exists('lian_page_settings_page_layout', $_POST)){
        $page_layout = sanitize_text_field($_POST['lian_page_settings_page_layout']);
        update_post_meta($post_id, 'lian_page_settings_page_layout', $page_layout);
    }else{
        delete_post_meta($post_id, 'lian_page_settings_page_layout');
    }
    
    // Sanitize and save title
    if (array_key_exists('lian_page_settings_title', $_POST)){
        $title = sanitize_text_field($_POST['lian_page_settings_title']);
        update_post_meta($post_id, 'lian_page_settings_title', $title);
    }else{
        delete_post_meta($post_id, 'lian_page_settings_title');
    }
    
    // Sanitize and save breadcrumb
    if (array_key_exists('lian_page_settings_breadcrumb', $_POST)){
        $breadcrumb = sanitize_text_field($_POST['lian_page_settings_breadcrumb']);
        update_post_meta($post_id, 'lian_page_settings_breadcrumb', $breadcrumb);
    }else{
        delete_post_meta($post_id, 'lian_page_settings_breadcrumb');
    }
    
    // Sanitize and save sidebar
    if(array_key_exists('lian_page_settings_sidebar', $_POST)){
        $sidebar = sanitize_text_field($_POST['lian_page_settings_sidebar']);
        update_post_meta($post_id, 'lian_page_settings_sidebar', $sidebar);
    }else{
        delete_post_meta($post_id, 'lian_page_settings_sidebar');
    }
    
    // Sanitize and save transparent header
    if(array_key_exists('lian_page_settings_transparent_header', $_POST)){
        $transparent_header = sanitize_text_field($_POST['lian_page_settings_transparent_header']);
        update_post_meta($post_id, 'lian_page_settings_transparent_header', $transparent_header);
    }else{
        delete_post_meta($post_id, 'lian_page_settings_transparent_header');
    }
});

