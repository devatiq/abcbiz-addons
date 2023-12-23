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

/**
 * Enqueue scripts and styles.
 */
function abcbizpro_elementor_enqueue()
{

    //register style for magnific-popup
    wp_register_style('magnific-popup',  ABCBIZELEMENTOR_ASSETS . "/css/magnific-popup.css");

    //register style for animation
    wp_register_style('abcbiz-animation',  ABCBIZELEMENTOR_ASSETS . "/css/animation.css");

    // enqueue style
    wp_enqueue_style('abcbiz-elementor-style',  ABCBIZELEMENTOR_ASSETS . "/css/style.css");
    wp_enqueue_style('abcbiz-elementor-responsive',  ABCBIZELEMENTOR_ASSETS . "/css/responsive.css");

    //register script for magnific-popup
    wp_register_script('magnific-popup', ABCBIZELEMENTOR_ASSETS . "/js/magnific-popup.min.js", array('jquery'), 1.0, true);

    //register script for skillbar
    wp_register_script('abcbiz-jquery-appear', ABCBIZELEMENTOR_ASSETS . "/js/jquery.appear.js", array('jquery'), 1.0, true);
    wp_register_script('abcbiz-circular-progress', ABCBIZELEMENTOR_ASSETS . "/js/circular-progress.js", array('jquery'), 1.0, true);
    //register script for counter up
    wp_register_script('abcbiz-counter-up', ABCBIZELEMENTOR_ASSETS . "/js/abcbiz-counterup.js", array('jquery'), 1.0, true);
    wp_register_script('abcbiz-wapoints', ABCBIZELEMENTOR_ASSETS . "/js/waypoints.min.js", array('jquery'), 1.0, true);

    // enqueue script
    wp_enqueue_script('abcbiz-elementor-custom', ABCBIZELEMENTOR_ASSETS . "/js/main.js", array('jquery'), false, true);
}
add_action('wp_enqueue_scripts', 'abcbizpro_elementor_enqueue');

function abcbizpro_elementor_plugin_general_init() {
   
            if (!class_exists('ABCBizMultiElementorPack', false)) {
                // Load Main plugin class
                require_once 'main.php';

                /**
                 * Initiate the plugin class
                 */
                \ABCBIZELEMENTOR\ABCBizMultiElementorPack::instance();
            }

            // Text domain register for translation
            load_plugin_textdomain('abcbiz-multi', false, dirname(plugin_basename(__FILE__)) . '/languages/');
}
add_action('plugins_loaded', 'abcbizpro_elementor_plugin_general_init');


// ABCBiz Addons Custom Category
function abcbizpro_elementor_add_widget_categories($elements_manager)
{

    $elements_manager->add_category(
        'abcbiz-category',
        [
            'title' => esc_html__('ABCBiz Multi Elements', 'abcbiz-multi'),
            'icon' => 'fa fa-plug',
        ]
    );
}
add_action('elementor/elements/categories_registered', 'abcbizpro_elementor_add_widget_categories');

// ABCBiz Addons WooCommerce Custom Category
function abcbizpro_elementor_add_widget_wc_categories($elements_manager)
{
    if (is_plugin_active('woocommerce/woocommerce.php')) {
        $elements_manager->add_category(
            'abcbiz-wc-category',
            [
                'title' => esc_html__('ABCBiz WooCommerce', 'abcbiz-multi'),
                'icon'  => 'eicon-woocommerce',
            ]
        );
    }
}
add_action('elementor/elements/categories_registered', 'abcbizpro_elementor_add_widget_wc_categories');


// enqueue admin style for elementor editor
add_action('elementor/editor/before_enqueue_scripts', function () {

    wp_enqueue_style('abcbiz-elementor-admin-style',  ABCBIZELEMENTOR_ASSETS . "/css/admin.css");
});