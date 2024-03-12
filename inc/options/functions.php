<?php
if ( ! defined( 'ABSPATH' ) ) exit;


/**
 * Insert New Post Baded on Post Type for Elementor
 * @author Alireza Dr.
 */
function lian_create_new_post(){
    $type = $_REQUEST['type'];
    $title = $_REQUEST['title'];

    // Check type
    if(empty($type)) wp_die();

    $keyword = '';
    switch ($type) {
        case 'lian_header':
            $keyword = 'Header';
            break;
        case 'lian_footer':
            $keyword = 'Footer';
            break;
        case 'lian_megamenu':
            $keyword = 'Mega Menu';
            break;
    }


    // Check security sec
    if ( !wp_verify_nonce( $_REQUEST[ 'sec' ], "secure_nonce_main" ) ) wp_die();

    add_filter( 'wp_insert_post_empty_content', '__return_false' );

    // Set Params & Insert Post
    $postarr = array(
        'post_status' => 'publish',
        'post_author' => get_current_user_id(),
        'post_type' => $type,
    );
    $post_id = wp_insert_post( $postarr, true);

    // Check Ttile
    $title = (empty($title) ? $keyword . ' #'. $post_id :$title);

    // Update Template
    if($type !== "page")
        update_post_meta( $post_id, '_wp_page_template', 'elementor_canvas');

    // Update Post Title
    wp_update_post( array('ID' => $post_id ,'post_title' => $title), false );

    echo esc_url(home_url())."/wp-admin/post.php?post=".$post_id."&action=elementor";

    wp_die();
}
add_action( 'wp_ajax_lian_create_new_post', 'lian_create_new_post' );


/**
 * Remove Post 
 * @author Alireza Dr.
 */
function lian_remove_post(){

    $post_id = $_REQUEST['post_id'];

    // Check post_id
    if(empty($post_id)) wp_die();

    $result = wp_delete_post( $post_id, true);

    if(!empty($result) && $result !== false) echo esc_attr($post_id);

    wp_die();
}
add_action( 'wp_ajax_lian_remove_post', 'lian_remove_post' );

/**
 * Register License - Options
 * @author Alireza Dr.
 */
function lian_register_license(){

    $license = $_REQUEST['license'];
    if(add_option( 'wipna_purchase_code_lian', $license,'','yes') && add_option( 'lian_version', LIAN_VERSION,'','yes') && add_option( 'lian_new_version', LIAN_VERSION,'','yes')){
        echo 'success';
        if(function_exists('lian_core_update_checker'))
            lian_core_update_checker();
    }

    wp_die();
}
add_action( 'wp_ajax_lian_register_license', 'lian_register_license' );