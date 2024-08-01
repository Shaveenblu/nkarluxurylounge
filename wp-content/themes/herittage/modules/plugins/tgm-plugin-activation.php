<?php
/**
 * Recommends plugins for use with the theme via the TGMA Script
 *
 * @package Herittage WordPress theme
 */

function herittage_tgmpa_plugins_register() {

	// Get array of recommended plugins.

	$plugins_list = array(
        array(
            'name'               => esc_html__('Herittage Plus', 'herittage'),
            'slug'               => 'herittage-plus',
            'source'             => HERITTAGE_MODULE_DIR . '/plugins/herittage-plus.zip',
            'required'           => true,
            'version'            => '1.0.1',
            'force_activation'   => false,
            'force_deactivation' => false,
        ),
        array(
            'name'               => esc_html__('Herittage Pro', 'herittage'),
            'slug'               => 'herittage-pro',
            'source'             => HERITTAGE_MODULE_DIR . '/plugins/herittage-pro.zip',
            'required'           => true,
            'version'            => '1.0.1',
            'force_activation'   => false,
            'force_deactivation' => false,
        ),
        array(
            'name'     => esc_html__('Elementor', 'herittage'),
            'slug'     => 'elementor',
            'required' => true,
        ),
        array(
            'name'               => esc_html__('WeDesignTech Elementor Addon', 'herittage'),
            'slug'               => 'wedesigntech-elementor-addon',
            'source'             => HERITTAGE_MODULE_DIR . '/plugins/wedesigntech-elementor-addon.zip',
            'required'           => true,
            'version'            => '1.0.2',
            'force_activation'   => false,
            'force_deactivation' => false,
        ),
        array(
            'name'     => esc_html__('WooCommerce', 'herittage'),
            'slug'     => 'woocommerce',
            'required' => false,
        ),
        array(
            'name'               => esc_html__('Herittage Shop', 'herittage'),
            'slug'               => 'herittage-shop',
            'source'             => HERITTAGE_MODULE_DIR . '/plugins/herittage-shop.zip',
            'required'           => false,
            'version'            => '1.0.0',
            'force_activation'   => false,
            'force_deactivation' => false,
        ),
        array(
            'name'     => esc_html__('YITH WooCommerce Wishlist', 'herittage'),
            'slug'     => 'yith-woocommerce-wishlist',
            'required' => false,
        ),
        array(
            'name'     => esc_html__('YITH WooCommerce Compare', 'herittage'),
            'slug'     => 'yith-woocommerce-compare',
            'required' => false,
        ),
        array(
            'name'     => esc_html__('Contact Form 7', 'herittage'),
            'slug'     => 'contact-form-7',
            'required' => true,
        ),
        array(
            'name'               => esc_html__('WDT Demo Importer', 'herittage'),
            'slug'               => 'wdt-demo-importer',
            'source'             => HERITTAGE_MODULE_DIR . '/plugins/wdt-demo-importer.zip',
            'required'           => true,
            'version'            => '1.0.0',
            'force_activation'   => false,
            'force_deactivation' => false,
        ),
        array(
            'name'               => esc_html__('WP Hotel Booking', 'herittage'),
            'slug'               => 'wp-hotel-booking',
            'source'             => HERITTAGE_MODULE_DIR . '/plugins/wp-hotel-booking.zip',
            'required'           => true,
            'version'            => '2.0.4',
            'force_activation'   => false,
            'force_deactivation' => false,
        )
	);

    $plugins = apply_filters('herittage_required_plugins_list', $plugins_list);

	// Register notice
	tgmpa( $plugins, array(
		'id'           => 'herittage_theme',
		'domain'       => 'herittage',
		'menu'         => 'install-required-plugins',
		'has_notices'  => true,
		'is_automatic' => true,
		'dismissable'  => true,
	) );

}
add_action( 'tgmpa_register', 'herittage_tgmpa_plugins_register' );