<?php
/*
* Lian Theme's Functions
*/

if ( ! defined( 'LIAN_VERSION' ) ) {
	define( 'LIAN_VERSION', '1.0.2' );
}

// LIAN Directory
define('LIAN_URI', get_template_directory_uri());
define('LIAN_DIR', get_template_directory());
define('LIAN_ASSETS_URI', get_template_directory_uri() . "/assets/");
define('LIAN_UPLOAD_DIR', WP_CONTENT_DIR. "/uploads/lian/");
define('LIAN_UPLOAD_URI', WP_CONTENT_URL. "/uploads/lian/");
define('LIAN_ELEMENTOR_URI', get_template_directory_uri(). "/inc/elementor/");
define('LIAN_MODULE_DIR', get_template_directory(). "/inc/modules/");

/**
 * Theme Functions
 */
require LIAN_DIR . '/inc/template-functions.php';