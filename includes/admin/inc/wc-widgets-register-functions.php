<?php 
if (!defined('ABSPATH')) exit; // Exit if accessed directly

function abcbiz_wc_widgets_settings_init() {
    add_settings_section(
        'abcbiz_available_widgets_section',          // Section ID
        esc_html__('Available Widgets', 'abcbiz-addons'), // Title
        'abcbiz_available_widgets_section_callback', // Callback function
        'abcbiz_widgets_menu'                             // Page slug where this section will be shown
    );

// Register settings
register_setting('abcbiz_widgets_menu', 'abcbiz_wc_product_cart_icon_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_wc_add_to_cart_icon_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_wc_cart_page_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_wc_checkout_page_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_wc_product_img_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_wc_product_meta_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_wc_product_price_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_wc_product_related_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_wc_product_short_desc_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_wc_product_tabs_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_wc_product_title_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_wc_product_bread_crumb_field');
register_setting('abcbiz_widgets_menu', 'abcbiz_wc_my_account_field');

// Set default values if not already set
add_option('abcbiz_wc_add_to_cart_icon_field', '1');
add_option('abcbiz_wc_product_cart_icon_field', '1');
add_option('abcbiz_wc_cart_page_field', '1');
add_option('abcbiz_wc_checkout_page_field', '1');
add_option('abcbiz_wc_product_img_field', '1');
add_option('abcbiz_wc_product_meta_field', '1');
add_option('abcbiz_wc_product_price_field', '1');
add_option('abcbiz_wc_product_related_field', '1');
add_option('abcbiz_wc_product_short_desc_field', '1');
add_option('abcbiz_wc_product_tabs_field', '1');
add_option('abcbiz_wc_product_title_field', '1');
add_option('abcbiz_wc_product_bread_crumb_field', '1');
add_option('abcbiz_wc_my_account_field', '1');


// Product Bread Crumb
add_settings_field(
    'abcbiz_wc_product_bread_crumb_field',
    esc_html__('Product Bread Crumb', 'abcbiz-addons'),
    'abcbiz_wc_product_bread_crumb_field_render',
    'abcbiz_widgets_menu', 
    'abcbiz_available_widgets_section'
);

// product title
add_settings_field(
    'abcbiz_wc_product_title_field',
    esc_html__('Product Title', 'abcbiz-addons'),
    'abcbiz_wc_product_title_field_render',
    'abcbiz_widgets_menu', // Page slug where this field will be shown
    'abcbiz_available_widgets_section'
);

// Product Tabs
add_settings_field(
    'abcbiz_wc_product_tabs_field',
    esc_html__('Product Tabs', 'abcbiz-addons'),
    'abcbiz_wc_product_tabs_field_render',
    'abcbiz_widgets_menu', 
    'abcbiz_available_widgets_section'
);

// Product Short Desc
add_settings_field(
    'abcbiz_wc_product_short_desc_field',
    esc_html__('Product Short Description', 'abcbiz-addons'),
    'abcbiz_wc_product_short_desc_field_render',
    'abcbiz_widgets_menu', 
    'abcbiz_available_widgets_section'
);

// Related Product
add_settings_field(
    'abcbiz_wc_product_related_field',
    esc_html__('Related Product', 'abcbiz-addons'),
    'abcbiz_wc_product_related_field_render',
    'abcbiz_widgets_menu', 
    'abcbiz_available_widgets_section'
);

// Product Price
add_settings_field(
    'abcbiz_wc_product_price_field',
    esc_html__('Product Price', 'abcbiz-addons'),
    'abcbiz_wc_product_price_field_render',
    'abcbiz_widgets_menu', 
    'abcbiz_available_widgets_section'
);

// Product Meta
add_settings_field(
    'abcbiz_wc_product_meta_field',
    esc_html__('Product Meta', 'abcbiz-addons'),
    'abcbiz_wc_product_meta_field_render',
    'abcbiz_widgets_menu', 
    'abcbiz_available_widgets_section'
);

// Product Image
add_settings_field(
    'abcbiz_wc_product_img_field',
    esc_html__('Product Image', 'abcbiz-addons'),
    'abcbiz_wc_product_img_field_render',
    'abcbiz_widgets_menu', 
    'abcbiz_available_widgets_section'
);

// checkout page
add_settings_field(
    'abcbiz_wc_checkout_page_field',
    esc_html__('Checkout Page', 'abcbiz-addons'),
    'abcbiz_wc_checkout_page_field_render',
    'abcbiz_widgets_menu', 
    'abcbiz_available_widgets_section'
);

// cart page
add_settings_field(
    'abcbiz_wc_cart_page_field',
    esc_html__('Cart Page', 'abcbiz-addons'),
    'abcbiz_wc_cart_page_field_render',
    'abcbiz_widgets_menu', 
    'abcbiz_available_widgets_section'
);

// Add to cart
add_settings_field(
    'abcbiz_wc_add_to_cart_icon_field',
    esc_html__('Add to cart', 'abcbiz-addons'),
    'abcbiz_wc_add_to_cart_icon_field_render',
    'abcbiz_widgets_menu', 
    'abcbiz_available_widgets_section'
);

// cart icon
add_settings_field(
    'abcbiz_wc_product_cart_icon_field',
    esc_html__('Cart Icon', 'abcbiz-addons'),
    'abcbiz_wc_product_cart_icon_field_render',
    'abcbiz_widgets_menu', 
    'abcbiz_available_widgets_section'
);

// Add settings field for My Account
add_settings_field(
    'abcbiz_wc_my_account_field',
    esc_html__('My Account', 'abcbiz-addons'),
    'abcbiz_wc_my_account_field_render',
    'abcbiz_widgets_menu', 
    'abcbiz_available_widgets_section'
);

}
add_action('admin_init', 'abcbiz_wc_widgets_settings_init');