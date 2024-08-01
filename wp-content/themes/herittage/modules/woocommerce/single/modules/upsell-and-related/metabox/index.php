<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'Herittage_Shop_Metabox_Single_Upsell_Related' ) ) {
    class Herittage_Shop_Metabox_Single_Upsell_Related {

        private static $_instance = null;

        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }

            return self::$_instance;
        }

        function __construct() {

			add_filter( 'herittage_shop_product_custom_settings', array( $this, 'herittage_shop_product_custom_settings' ), 10 );

		}

        function herittage_shop_product_custom_settings( $options ) {

			$ct_dependency      = array ();
			$upsell_dependency  = array ( 'show-upsell', '==', 'true');
			$related_dependency = array ( 'show-related', '==', 'true');
			if( function_exists('herittage_shop_single_module_custom_template') ) {
				$ct_dependency['dependency'] 	= array ( 'product-template', '!=', 'custom-template');
				$upsell_dependency 				= array ( 'product-template|show-upsell', '!=|==', 'custom-template|true');
				$related_dependency 			= array ( 'product-template|show-related', '!=|==', 'custom-template|true');
			}

			$product_options = array (

				array_merge (
					array(
						'id'         => 'show-upsell',
						'type'       => 'select',
						'title'      => esc_html__('Show Upsell Products', 'herittage'),
						'class'      => 'chosen',
						'default'    => 'admin-option',
						'attributes' => array( 'data-depend-id' => 'show-upsell' ),
						'options'    => array(
							'admin-option' => esc_html__( 'Admin Option', 'herittage' ),
							'true'         => esc_html__( 'Show', 'herittage'),
							null           => esc_html__( 'Hide', 'herittage'),
						)
					),
					$ct_dependency
				),

				array(
					'id'         => 'upsell-column',
					'type'       => 'select',
					'title'      => esc_html__('Choose Upsell Column', 'herittage'),
					'class'      => 'chosen',
					'default'    => 4,
					'options'    => array(
						'admin-option' => esc_html__( 'Admin Option', 'herittage' ),
						1              => esc_html__( 'One Column', 'herittage' ),
						2              => esc_html__( 'Two Columns', 'herittage' ),
						3              => esc_html__( 'Three Columns', 'herittage' ),
						4              => esc_html__( 'Four Columns', 'herittage' ),
					),
					'dependency' => $upsell_dependency
				),

				array(
					'id'         => 'upsell-limit',
					'type'       => 'select',
					'title'      => esc_html__('Choose Upsell Limit', 'herittage'),
					'class'      => 'chosen',
					'default'    => 4,
					'options'    => array(
						'admin-option' => esc_html__( 'Admin Option', 'herittage' ),
						1              => esc_html__( 'One', 'herittage' ),
						2              => esc_html__( 'Two', 'herittage' ),
						3              => esc_html__( 'Three', 'herittage' ),
						4              => esc_html__( 'Four', 'herittage' ),
						5              => esc_html__( 'Five', 'herittage' ),
						6              => esc_html__( 'Six', 'herittage' ),
						7              => esc_html__( 'Seven', 'herittage' ),
						8              => esc_html__( 'Eight', 'herittage' ),
						9              => esc_html__( 'Nine', 'herittage' ),
						10              => esc_html__( 'Ten', 'herittage' ),
					),
					'dependency' => $upsell_dependency
				),

				array_merge (
					array(
						'id'         => 'show-related',
						'type'       => 'select',
						'title'      => esc_html__('Show Related Products', 'herittage'),
						'class'      => 'chosen',
						'default'    => 'admin-option',
						'attributes' => array( 'data-depend-id' => 'show-related' ),
						'options'    => array(
							'admin-option' => esc_html__( 'Admin Option', 'herittage' ),
							'true'         => esc_html__( 'Show', 'herittage'),
							null           => esc_html__( 'Hide', 'herittage'),
						)
					),
					$ct_dependency
				),

				array(
					'id'         => 'related-column',
					'type'       => 'select',
					'title'      => esc_html__('Choose Related Column', 'herittage'),
					'class'      => 'chosen',
					'default'    => 4,
					'options'    => array(
						'admin-option' => esc_html__( 'Admin Option', 'herittage' ),
						2              => esc_html__( 'Two Columns', 'herittage' ),
						3              => esc_html__( 'Three Columns', 'herittage' ),
						4              => esc_html__( 'Four Columns', 'herittage' ),
					),
					'dependency' => $related_dependency
				),

				array(
					'id'         => 'related-limit',
					'type'       => 'select',
					'title'      => esc_html__('Choose Related Limit', 'herittage'),
					'class'      => 'chosen',
					'default'    => 4,
					'options'    => array(
						'admin-option' => esc_html__( 'Admin Option', 'herittage' ),
						1              => esc_html__( 'One', 'herittage' ),
						2              => esc_html__( 'Two', 'herittage' ),
						3              => esc_html__( 'Three', 'herittage' ),
						4              => esc_html__( 'Four', 'herittage' ),
						5              => esc_html__( 'Five', 'herittage' ),
						6              => esc_html__( 'Six', 'herittage' ),
						7              => esc_html__( 'Seven', 'herittage' ),
						8              => esc_html__( 'Eight', 'herittage' ),
						9              => esc_html__( 'Nine', 'herittage' ),
						10              => esc_html__( 'Ten', 'herittage' ),
					),
					'dependency' => $related_dependency
				)

			);

			$options = array_merge( $options, $product_options );

			return $options;

		}

    }
}

Herittage_Shop_Metabox_Single_Upsell_Related::instance();