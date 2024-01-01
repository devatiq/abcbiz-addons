<?php 
if (!defined('ABSPATH')) exit; // Exit if accessed directly


//WooCommerce Code
if ( class_exists( 'WooCommerce' ) && function_exists( 'wc_get_product' ) ) {
    // Overwrite Description Tabs
    add_filter('woocommerce_product_tabs', 'abcbiz_override_description_tab', 98);
    function abcbiz_override_description_tab($tabs) {
        if (isset($tabs['description'])) {
            $tabs['description']['callback'] = 'abcbiz_wc_product_description_tab_content';
        }
        return $tabs;
    }

    function abcbiz_wc_product_description_tab_content() {
        global $post;
        $abcbiz_wc_custom_description = get_post_meta($post->ID, '_abcbiz_wc_product_description', true);
        if (empty($abcbiz_wc_custom_description)) {
            echo '<p class="abcbiz-description-notice">' . esc_html__('Please add product description content for this tab using the description box in the page editor.', 'abcbiz-multi') . '</p>';
        } else {
            echo wp_kses_post(wpautop($abcbiz_wc_custom_description));
        }
    }
}

