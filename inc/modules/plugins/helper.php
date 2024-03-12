<?php
if ( ! defined( 'ABSPATH' ) ) exit;

if ( is_admin() ) {
	require_once LIAN_MODULE_DIR . '/plugins/class-tgm-plugin-activation.php';
	require_once LIAN_MODULE_DIR . '/plugins/tgm-plugin-activation.php';
}