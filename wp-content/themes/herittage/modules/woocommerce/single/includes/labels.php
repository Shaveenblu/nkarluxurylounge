<?php

/**
 * Product labels
 **/


// Remove sale flash from single product page
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );

if( ! function_exists( 'herittage_shop_woo_loop_product_additional_labels' ) ) {

	function herittage_shop_woo_loop_product_additional_labels( $single_template ) {

		herittage_shop_woo_show_product_additional_labels(null);

	}

	add_action('herittage_woo_loop_product_additional_labels', 'herittage_shop_woo_loop_product_additional_labels', 20);

}

// Product Labels - Used in Product Images Shortcodes

if( ! function_exists( 'herittage_shop_woo_show_product_additional_labels' ) ) {

	function herittage_shop_woo_show_product_additional_labels($product) {

		if(is_product()) {
			global $product;
		}
		$product_id = $product->get_id();

		$settings = get_post_meta( $product_id, '_custom_settings', true );

		if( $product->is_on_sale() && $product->is_in_stock() ) {
			echo '<span class="onsale"><span>'.esc_html__('Sale', 'herittage').'</span></span>';
		} else if( !$product->is_in_stock() ) {
			echo '<span class="out-of-stock"><span>'.esc_html__('Sold Out','herittage').'</span></span>';
		}

		if( $product->is_featured() ) {
			echo '<div class="featured-tag">
						<div>
							<i class="wdticon-thumb-tack"></i>
							<span>'.esc_html__('Featured', 'herittage').'</span>
						</div>
					</div>';
		}

		if(isset($settings['product-new-label']) && $settings['product-new-label'] == 'true') {
			echo '<span class="new"><span>'.esc_html__('New', 'herittage').'</span></span>';
		}

	}

}