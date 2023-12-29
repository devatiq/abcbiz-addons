<?php
/*
Plugin Name: ABCBiz Multi Addons Pro For Elementor
Plugin URI: https://abcplugin.com/abcbiz-multi-addons-for-elementor/
Description: The Elementor Custom Widgets plugin, a powerhouse tool designed to elevate your website's aesthetic and functionality. ABCBiz Multi Addons is packed with an array of gorgeous custom elements, each meticulously crafted to integrate seamlessly with your site's design.
Version: 1.0.0
Author: SupreoX Limited
Author URI: http://www.supreox.com/
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: abcbiz-multi
Domain Path: /languages
Elementor tested up to: 3.18.0
Elementor Pro tested up to: 3.18.0
*/

if (!defined('ABSPATH')) exit; // Exit if accessed directly

if (!function_exists('abcbiz_elementor_plugin_general_init')) {
    function abcbiz_elementor_plugin_general_init() {
        // Define constants
        define('AbcBizElementor_File', __FILE__);
        define('AbcBizElementor_Path', dirname(AbcBizElementor_File));
        define('AbcBizElementor_Inc', AbcBizElementor_Path . '/includes');
        define('AbcBizElementor_Admin', AbcBizElementor_Inc . '/admin');
        define('AbcBizElementor_URL', plugins_url('', AbcBizElementor_File));
        define('AbcBizElementor_Assets', AbcBizElementor_URL . '/assets');

        //loading main file
        if (!class_exists('ABCBizMultiElementorPack')) {
            require_once 'abcbiz-main-class.php';
            \AbcBizElementor\ABCBizMultiElementorPack::instance();
        }

        load_plugin_textdomain('abcbiz-multi', false, dirname(plugin_basename(AbcBizElementor_File)) . '/languages/');
        require_once AbcBizElementor_Admin . '/abcbiz-settings.php';
    }
}
add_action('plugins_loaded', 'abcbiz_elementor_plugin_general_init');

//Load style and scripts
if (!function_exists('abcbiz_elementor_enqueue')) {
    function abcbiz_elementor_enqueue() {
        wp_enqueue_style('abcbiz-popup-style', AbcBizElementor_Assets . "/css/magnific-popup.css");
        wp_enqueue_style('abcbiz-animation', AbcBizElementor_Assets . "/css/animation.css");
        wp_enqueue_style('abcbiz-elementor-style', AbcBizElementor_Assets . "/css/style.css");
        wp_enqueue_style('abcbiz-elementor-responsive', AbcBizElementor_Assets . "/css/responsive.css");
        // Check if WooCommerce plugin is active
        include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
        if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
            wp_enqueue_style('abcbiz-elementor-wc-style', AbcBizElementor_Assets . "/css/wc-style.css");
        }

        wp_enqueue_script('abcbiz-magnific-popup', AbcBizElementor_Assets . "/js/magnific-popup.min.js", array('jquery'), '1.0', true);
        wp_enqueue_script('abcbiz-jquery-appear', AbcBizElementor_Assets . "/js/jquery.appear.js", array('jquery'), '1.0', true);
        wp_enqueue_script('abcbiz-circular-progress', AbcBizElementor_Assets . "/js/circular-progress.js", array('jquery'), '1.0', true);
        wp_enqueue_script('abcbiz-skill-bar', AbcBizElementor_Assets . "/js/skill-bar.js", array('jquery'), '1.0', true);
        wp_enqueue_script('abcbiz-counter-up', AbcBizElementor_Assets . "/js/abcbiz-counterup.js", array('jquery'), '1.0', true);
        wp_enqueue_script('abcbiz-wapoints', AbcBizElementor_Assets . "/js/waypoints.min.js", array('jquery'), '1.0', true);
        wp_enqueue_script('abcbiz-elementor-custom', AbcBizElementor_Assets . "/js/main.js", array('jquery'), false, true);
    }
}
add_action('wp_enqueue_scripts', 'abcbiz_elementor_enqueue');

//add ABCBiz Elementor Category
if (!function_exists('abcbiz_elementor_add_widget_categories')) {
    function abcbiz_elementor_add_widget_categories($elements_manager) {
        $elements_manager->add_category(
            'abcbiz-category',
            [
                'title' => esc_html__('ABCBiz Multi Elements', 'abcbiz-multi'),
                'icon' => 'eicon-kit-plugins',
            ]
        );
    }
}
add_action('elementor/elements/categories_registered', 'abcbiz_elementor_add_widget_categories');

//add ABCBiz Elementor WooCommerce Category
if (!function_exists('abcbiz_elementor_add_widget_wc_categories')) {
    function abcbiz_elementor_add_widget_wc_categories($elements_manager) {
        if (function_exists('is_plugin_active') && is_plugin_active('woocommerce/woocommerce.php')) {
            $elements_manager->add_category(
                'abcbiz-wc-category',
                [
                    'title' => esc_html__('ABCBiz WooCommerce', 'abcbiz-multi'),
                    'icon' => 'eicon-woocommerce',
                ]
            );
        }
    }
}
add_action('elementor/elements/categories_registered', 'abcbiz_elementor_add_widget_wc_categories');

//Load Editor CSS
add_action('elementor/editor/before_enqueue_scripts', function () {
    wp_enqueue_style('abcbiz-elementor-admin-style', AbcBizElementor_Assets . "/css/ele-editor.css");
});