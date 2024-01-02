<?php 
if (!defined('ABSPATH')) exit; // Exit if accessed directly

function abcbiz_wc_widgets_settings_init() {
    add_settings_section(
        'abcbiz_available_widgets_section',          // Section ID
        esc_html__('Available Widgets', 'abcbiz-multi'), // Title
        'abcbiz_available_widgets_section_callback', // Callback function
        'abcbiz_widgets_menu'                             // Page slug where this section will be shown
    );

// Register settings
register_setting('abcbiz_widgets_menu', 'abcbiz_wc_product_cart_icon_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_wc_product_title_field');

// Set default values if not already set
add_option('abcbiz_wc_product_cart_icon_field', '1');
add_option('abcbiz_wc_product_title_field', '1');


// cart icon
add_settings_field(
    'abcbiz_wc_product_cart_icon_field',
    esc_html__('Cart Icon', 'abcbiz-multi'),
    'abcbiz_wc_product_cart_icon_field_render',
    'abcbiz_widgets_menu', 
    'abcbiz_available_widgets_section'
);

// product title
add_settings_field(
    'abcbiz_wc_product_title_field',
    esc_html__('Product Title', 'abcbiz-multi'),
    'abcbiz_wc_product_title_field_render',
    'abcbiz_widgets_menu', // Page slug where this field will be shown
    'abcbiz_available_widgets_section'
);

}
add_action('admin_init', 'abcbiz_wc_widgets_settings_init');