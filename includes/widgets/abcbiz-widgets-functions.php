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
    
            echo sprintf(
                wp_kses(                    
                    '<p class="abcbiz-description-notice">' . __('Please add product description content for this tab using the description box in the <a href="%s">page editor</a>.', 'abcbiz-addons') . '</p>',
                    array(
                        'a' => array('href' => array()), // Allow 'a' tag with 'href' attribute
                        'p' => array('class' => array()) // Allow 'p' tag with 'class' attribute
                    )
                ),
                esc_url($edit_post_link) // Safely escape the URL
            );
            
        } else {
            echo wp_kses_post(wpautop($abcbiz_wc_custom_description));
        }
    }

//ajax cart icon count
function abcbiz_get_cart_count() {
    echo esc_html( WC()->cart->get_cart_contents_count() );
    wp_die();
}
    
add_action('wp_ajax_abcbiz_get_cart_count', 'abcbiz_get_cart_count');
add_action('wp_ajax_nopriv_abcbiz_get_cart_count', 'abcbiz_get_cart_count');

//Add to cart
function abcbiz_ajax_add_to_cart_handler() {
    if (!isset($_POST['abcbiz_cart_nonce']) || !wp_verify_nonce(sanitize_text_field( wp_unslash ($_POST['abcbiz_cart_nonce'])), 'abcbiz_add_to_cart_nonce')) {
        wp_send_json_error(['message' => esc_html__('Nonce verification failed.', 'abcbiz-addons')]);
        return;
    }

    if (!isset($_POST['product_id'])) {
        wp_send_json_error(['message' => esc_html__('Product ID is missing.', 'abcbiz-addons')]);
        return;
    }

    // Safely escape the product_id
    $product_id = isset($_POST['product_id']) ? (int) sanitize_text_field($_POST['product_id']) : 0;
    // Safely escape the quantity, use sent quantity or default to 1
    $quantity = isset($_POST['quantity']) ? (int) sanitize_text_field($_POST['quantity']) : 1;

    if (!wc_get_product($product_id)) {
        wp_send_json_error(['message' => esc_html__('Invalid product.', 'abcbiz-addons')]);
        return;
    }

    $cart_item_key = WC()->cart->add_to_cart($product_id, $quantity);

    if ($cart_item_key) {
        wp_send_json_success(['message' => esc_html__('Product successfully added to cart.', 'abcbiz-addons')]);
    } else {
        wp_send_json_error(['message' => esc_html__('Failed to add the product to the cart.', 'abcbiz-addons')]);
    }
}
add_action('wp_ajax_abcbiz_ajax_add_to_cart_handler', 'abcbiz_ajax_add_to_cart_handler');
add_action('wp_ajax_nopriv_abcbiz_ajax_add_to_cart_handler', 'abcbiz_ajax_add_to_cart_handler');

//product gallery support
function abcbiz_woocommerce_gallery_support() {
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
        if ( ! current_theme_supports( 'wc-product-gallery-zoom' ) ) {
            add_theme_support( 'wc-product-gallery-zoom' );
        }
        if ( ! current_theme_supports( 'wc-product-gallery-slider' ) ) {
            add_theme_support( 'wc-product-gallery-slider' );
        }
        if ( ! current_theme_supports( 'wc-product-gallery-lightbox' ) ) {
            add_theme_support( 'wc-product-gallery-lightbox' );
        }
    }
}
add_action( 'after_setup_theme', 'abcbiz_woocommerce_gallery_support' );
    
}//end woocommerce code


//Menu walker functions
class abcbiz_custom_walker extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        parent::start_el($output, $item, $depth, $args, $id);
        if ($depth === 0 && in_array('menu-item-has-children', $item->classes)) {
            $svg_icon = '<svg id="fi_2985150" enable-background="new 0 0 128 128" height="512" viewBox="0 0 128 128" width="512" xmlns="http://www.w3.org/2000/svg"><path id="Down_Arrow_3_" d="m64 88c-1.023 0-2.047-.391-2.828-1.172l-40-40c-1.563-1.563-1.563-4.094 0-5.656s4.094-1.563 5.656 0l37.172 37.172 37.172-37.172c1.563-1.563 4.094-1.563 5.656 0s1.563 4.094 0 5.656l-40 40c-.781.781-1.805 1.172-2.828 1.172z"></path></svg>';
            $output .= '<span class="abcbiz-submenu-icon">' . $svg_icon . '</span>';
        }

        if ($depth > 0 && in_array('menu-item-has-children', $item->classes)) {
            $svg_icon = '<svg id="fi_2985179" enable-background="new 0 0 128 128" height="512" viewBox="0 0 128 128" width="512" xmlns="http://www.w3.org/2000/svg"><path id="Right_Arrow_4_" d="m44 108c-1.023 0-2.047-.391-2.828-1.172-1.563-1.563-1.563-4.094 0-5.656l37.172-37.172-37.172-37.172c-1.563-1.563-1.563-4.094 0-5.656s4.094-1.563 5.656 0l40 40c1.563 1.563 1.563 4.094 0 5.656l-40 40c-.781.781-1.805 1.172-2.828 1.172z"></path></svg>';
            $output .= '<span class="abcbiz-submenu-icon">' . $svg_icon . '</span>';
        }
    }
}


