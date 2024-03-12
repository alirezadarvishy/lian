<?php
/**
 * Recommends plugins for use with the theme via the TGMA Script
 *
 * @package lian WordPress theme
 */

function lian_tgmpa_plugins_register() {

	// Get array of recommended plugins.
	$plugins_list = array(
        array(
            'name'               => esc_html__('Lian Core', 'lian'),
            'slug'               => 'lian-core',
            'source'             => 'https://wipna.com/demo-content/lian/lian-core.zip',
            'required'           => false,
            'version'            => '1.0.0',
            'force_activation'   => false,
            'force_deactivation' => false,
        ),
        array(
            'name'     => esc_html__('Elementor', 'lian'),
            'slug'     => 'elementor',
            'required' => true,
        ),
        array(
            'name'     => esc_html__('Contact Form 7', 'lian'),
            'slug'     => 'contact-form-7',
            'required' => true,
        ),
        array(
            'name'     => esc_html__('One Click Demo Import', 'lian'),
            'slug'     => 'one-click-demo-import',
            'required' => true,
        )
	);

	$plugins = apply_filters('lian_required_plugins_list', $plugins_list);

	// Register notice
	tgmpa( $plugins, array(
		'id'           => 'lian_theme',
		'domain'       => 'lian',
		'menu'         => 'install-required-plugins',
		'has_notices'  => true,
		'is_automatic' => true,
		'dismissable'  => true,
	) );

}
add_action( 'tgmpa_register', 'lian_tgmpa_plugins_register' );