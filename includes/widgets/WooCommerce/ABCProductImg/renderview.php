<?php
/**
 * Render View for WooCommerce Product Image with Gallery and Zoom
 */
if (!defined('ABSPATH')) exit; // Exit if accessed directly

global $product;
$abcbiz_post_id = get_the_ID();

if (is_a($product, 'WC_Product')) {
    wc_get_template_part('single-product/product-image');
} else {
    echo esc_html__('This product does not exist', 'abcbiz-multi');
}


add_action( 'wp_enqueue_scripts', 'enqueue_woocommerce_scripts' );

function enqueue_woocommerce_scripts() {
    if ( is_product() || is_woocommerce() ) {
        wp_enqueue_script( 'wc-single-product' );
    }
}


?>


