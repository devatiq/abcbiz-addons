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
            // Get the edit post link
            $edit_post_link = get_edit_post_link($post->ID);
    
            // Construct the message with the link
            $message = sprintf(
                wp_kses(
                    __('Please add product description content for this tab using the description box in the <a href="%s">page editor</a>.', 'abcbiz-multi'),
                    array( 'a' => array( 'href' => array() ) ) // Allow only 'a' tag with 'href' attribute
                ),
                esc_url($edit_post_link)
            );
    
            echo '<p class="abcbiz-description-notice">' . $message . '</p>';
        } else {
            echo wp_kses_post(wpautop($abcbiz_wc_custom_description));
        }
    }

    //ajax cart icon count
function abcbiz_get_cart_count() {
    echo WC()->cart->get_cart_contents_count();
    wp_die();
}
add_action('wp_ajax_abcbiz_get_cart_count', 'abcbiz_get_cart_count');
add_action('wp_ajax_nopriv_abcbiz_get_cart_count', 'abcbiz_get_cart_count');
    
}//end woocommerce code


