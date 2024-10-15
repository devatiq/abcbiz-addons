<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

function abcbiz_add_admin_menu() {
    // Add a new top-level menu
    add_menu_page(
        esc_html__('PrimeKit Settings', 'abcbiz-addons'),  // Page title
        esc_html__('PrimeKit', 'abcbiz-addons'),  // Menu title
        'manage_options',                               // Capability
        'abcbiz_home',                         // Menu slug
        'abcbiz_home_page',                         // Function to display the page
        plugin_dir_url(__FILE__) . 'img/admin-icon.png',// Icon URL
        6                                               // Position
    );

    // Add a submenu page
    add_submenu_page(
        'abcbiz_home', 
        esc_html__('PrimeKit Available Widgets', 'abcbiz-addons'), // Page title
        esc_html__('Available Widgets', 'abcbiz-addons'), // Menu title
        'manage_options',                                // Capability
        'abcbiz_widgets_menu',                                // Menu slug
        'abcbiz_widgets_page'                            // Function to display the page
    );
}
add_action('admin_menu', 'abcbiz_add_admin_menu');

//Setting link
function abcbiz_add_settings_link( $links ) {
    $settings_link = '<a href="' . admin_url( 'admin.php?page=abcbiz_home' ) . '">' . esc_html__( 'Settings', 'abcbiz-addons' ) . '</a>';
    array_unshift( $links, $settings_link );
    return $links;
}
add_filter( 'plugin_action_links_abcbiz-addons-addons-pro-for-elementor/abcbiz-addons.php', 'abcbiz_add_settings_link' );

// Require setting page
require_once plugin_dir_path(__FILE__) . 'inc/setting-page.php';
// Require widget page
require_once plugin_dir_path(__FILE__) . 'inc/widget-page.php';

require_once plugin_dir_path(__FILE__) . 'inc/Templates/settings.php';

require_once plugin_dir_path(__FILE__) . 'inc/Settings/Settings.php';

// Check if the class has already been defined
if (!class_exists('\ABCBizAddons\includes\admin\inc\Templates\TemplatesAdminMenu ')) {
    $admin_menu = new \ABCBizAddons\includes\admin\inc\Templates\TemplatesAdminMenu ();
} else {
    // Optionally handle the case where the class is already defined
    error_log('Templates Menu class has already been defined elsewhere.');
}

// Check if the class has already been defined
if (!class_exists('\ABCBizAddons\includes\admin\inc\Settings\SettingsPage ')) {
    $admin_menu = new \ABCBizAddons\includes\admin\inc\Settings\SettingsPage ();
} else {
    // Optionally handle the case where the class is already defined
    error_log('Templates Menu class has already been defined elsewhere.');
}


function abcbiz_setting_enqueue_admin_styles() {
    wp_enqueue_style('abcbiz-settings-admin-style', plugin_dir_url(__FILE__) . 'css/admin-settings.css');
    $abcbiz_custom_css = "";
    wp_add_inline_style('abcbiz-settings-admin-style', $abcbiz_custom_css);

    wp_enqueue_script('abcbiz-admin-script', plugin_dir_url(__FILE__) . 'js/admin-setting.js', array('jquery'), null, true);
    wp_localize_script('abcbiz-admin-script', 'abcbizAjax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('abcbiz-widget-nonce')
    ));
}
add_action('admin_enqueue_scripts', 'abcbiz_setting_enqueue_admin_styles');