<?php
/**
 * Listing Options - Product Style
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'Herittage_Woo_Listing_Option_Style' ) ) {
    class Herittage_Woo_Listing_Option_Style extends Herittage_Woo_Listing_Option_Core {

        private static $_instance = null;

        public $option_slug;

        public $option_name;

        public $option_type;

        public $option_default_value;

        public $option_value_prefix;

        public static function instance() {

            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }

            return self::$_instance;

        }

        function __construct() {

            $this->option_slug          = 'product-style';
            $this->option_name          = esc_html__('Product Style', 'herittage');
            $this->option_type          = array ( 'class', 'value-css', 'js' );
            $this->option_default_value = 'product-style-default';
            $this->option_value_prefix  = 'product-style-';

            $this->render_backend();

        }

        /*
        Backend Render
        */

            function render_backend() {

                /* Custom Product Templates - Options */
                    add_filter( 'herittage_woo_custom_product_template_default_options', array( $this, 'woo_custom_product_template_default_options'), 10, 1 );

            }


        /*
        Custom Product Templates - Options
        */
            function woo_custom_product_template_default_options( $template_options ) {

                array_push( $template_options, $this->setting_args() );

                return $template_options;

            }

        /*
        Setting Group
        */
            function setting_group() {

                return 'default';

            }

        /*
        Setting Arguments
        */
            function setting_args() {

                $settings                                =  array ();

                $settings['id']                          =  $this->option_slug;
                $settings['type']                        =  'select';
                $settings['title']                       =  $this->option_name;
                $settings['options']                     =  array (
                    'product-style-default'              => esc_html__('Default', 'herittage'),
                    'product-style-cornered'             => esc_html__('Cornered', 'herittage'),
                    'product-style-title-eg-highlighter' => esc_html__('Title & Element Group Highlighter', 'herittage'),
                    'product-style-content-highlighter'  => esc_html__('Content Highlighter', 'herittage'),
                    'product-style-egrp-overlap-pc'      => esc_html__('Element Group Overlap Product Content', 'herittage'),
                    'product-style-egrp-reveal-pc'       => esc_html__('Element Group Reveal Product Content', 'herittage'),
                    'product-style-igrp-over-pc'         => esc_html__('Icon Group over Product Content', 'herittage'),
                    'product-style-egrp-over-pc'         => esc_html__('Element Group over Product Content', 'herittage')
                );
                $settings['default']                     =  $this->option_default_value;

                return $settings;

            }

        /**
         * Option JS
         */
            function woo_listings_js_load( $js ) {

                if( in_array( 'js', $this->option_type ) ) {

                    if( isset ( $this->option_default_value ) && $this->option_default_value == 'product-style-title-eg-highlighter' ) {

                        $js_file_path = $this->module_dir_path() . 'style/assets/js/title-eg-highlighter.js';

                        if( file_exists ( $js_file_path ) ) {

                            ob_start();
                            include( $js_file_path );
                            $js .= "\n\n".ob_get_clean();

                        }

                    }

                }

                return $js;

            }


    }

}

if( !function_exists('herittage_woo_listing_option_style') ) {
	function herittage_woo_listing_option_style() {
		return Herittage_Woo_Listing_Option_Style::instance();
	}
}

herittage_woo_listing_option_style();