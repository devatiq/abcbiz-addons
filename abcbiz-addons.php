<?php
/*
Plugin Name: PrimeKit Addons and Templates for Elementor by ABCPlugin
Plugin URI: https://abcbizaddons.com/abcbiz-multi-addons-for-elementor/
Description: The Elementor Custom Widgets plugin is a powerhouse tool designed to elevate your website's aesthetic and functionality. ABCBiz Addons and Templates are packed with gorgeous custom elements, each meticulously crafted to integrate seamlessly with your site's design. 
Version: 1.0.9
Author: ABCPlugin
Author URI: https://abcplugin.com/
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: abcbiz-addons
Domain Path: /languages
Elementor tested up to: 3.24.6
Elementor Pro tested up to: 3.24.6
Requires Plugins: elementor
*/

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

if (!function_exists('abcbiz_elementor_plugin_general_init')) {
    function abcbiz_elementor_plugin_general_init()
    {
        // Define constants
        define('ABCBIZ_File', __FILE__);
        define('ABCBIZ_Path', dirname(ABCBIZ_File));
        define('ABCBIZ_Inc', ABCBIZ_Path . '/includes');
        define('ABCBIZ_Admin', ABCBIZ_Inc . '/admin');
        define('ABCBIZ_URL', plugins_url('', ABCBIZ_File));
        define('ABCBIZ_Assets', ABCBIZ_URL . '/assets');
        define('ABCBIZ_Admin_CSS', ABCBIZ_URL . '/includes/admin/css');

        //loading main file
        if (!class_exists('ABCBizMultiElementorPack')) {
            require_once 'abcbiz-main-class.php';
            \ABCBIZ\ABCBizMultiElementorPack::instance();
        }

        //loading css transform
        if (!class_exists('ABCBiz\Includes\globals\CSS_Transform')) {
            require_once ABCBIZ_Inc . '/globals/css-transform.php';
            \ABCBiz\Includes\globals\CSS_Transform::init();
        }

        // Loading wrapper link
        if (!class_exists('ABCBiz\Includes\globals\ABCbiz_Wrapper_link')) {
            require_once ABCBIZ_Inc . '/globals/wrapper-link.php';
            new \ABCBiz\Includes\globals\ABCbiz_Wrapper_link();
        }

        // Loading Custom CSS
        if (!class_exists('ABCBiz\Includes\globals\ABCbiz_CustomCSS')) {
            require_once ABCBIZ_Inc . '/globals/custom-css.php';
            new \ABCBiz\Includes\globals\ABCbiz_CustomCSS();
        }

        //load post view tracker
        if (!class_exists('ABCBiz\Includes\lib\PostViewTracker')) {
            require_once ABCBIZ_Inc . '/lib/post-view-tracker.php';
            new \ABCBiz\Includes\lib\PostViewTracker();
        }


        load_plugin_textdomain('abcbiz-addons', false, dirname(plugin_basename(ABCBIZ_File)) . '/languages/');
        require_once ABCBIZ_Admin . '/abcbiz-settings.php';
    }
}
add_action('plugins_loaded', 'abcbiz_elementor_plugin_general_init');

//Load style and scripts
if (!function_exists('abcbiz_elementor_enqueue')) {
    function abcbiz_elementor_enqueue()
    {
        wp_register_style('abcbiz-animation', ABCBIZ_Assets . "/css/shape-animation.css");
        wp_register_style('abcbiz-magnific-popup', ABCBIZ_Assets . "/css/magnific-popup.css");
        wp_register_style('abcbiz-flip-box', ABCBIZ_Assets . "/css/abcbiz-flip-box.css");
        wp_register_style('abcbiz-form-7-style', ABCBIZ_Assets . "/css/contact-form-7-style.css");
        wp_register_style('abcbiz-cta-style', ABCBIZ_Assets . "/css/abcbiz-cta.css");
        wp_enqueue_style('abcbiz-elementor-style', ABCBIZ_Assets . "/css/style.css");
        wp_enqueue_style('abcbiz-elementor-responsive', ABCBIZ_Assets . "/css/responsive.css");
        wp_register_style('abcbiz-anim-text', ABCBIZ_Assets . "/css/abcbiz-anim-text-style.css");
        if (!wp_style_is('twentytwenty')) {
            wp_register_style('twentytwenty', ABCBIZ_Assets . "/css/twentytwenty.css");
        }

        //register style for swiper slider
        if (!wp_style_is('swiper')) {
            wp_register_style('swiper', ABCBIZ_Assets . "/css/swiper-bundle.min.css");
        }

        //register swiper slider 
        if (!wp_script_is('swiper')) {
            wp_register_script('swiper', ABCBIZ_Assets . "/js/swiper-bundle.min.js", array('jquery', 'elementor-frontend'), 1.0, true);
        }
        wp_register_script('abcbiz-testimonial', ABCBIZ_Assets . "/js/abcbiz-testimonial.js", array('jquery'), false, true);

        // Check if WooCommerce plugin is active
        include_once(ABSPATH . 'wp-admin/includes/plugin.php');
        if (is_plugin_active('woocommerce/woocommerce.php')) {
            wp_enqueue_style('abcbiz-elementor-wc-style', ABCBIZ_Assets . "/css/wc-style.css");
            //cart icon counter
            wp_register_script('abcbiz-cart-count-update', ABCBIZ_Assets . "/js/abcbiz-cart-update.js", array('jquery'), '1.0', true);
            wp_localize_script('abcbiz-cart-count-update', 'abcbizCartAjax', array('url' => admin_url('admin-ajax.php')));
            //Add to cart
            wp_register_script('abcbiz-add-to-cart', ABCBIZ_Assets . "/js/abcbiz-add-to-cart.js", array('jquery'), 1.0, true);
            $abcbiz_add_to_cart_nonce = wp_create_nonce('abcbiz_add_to_cart_nonce');
            wp_localize_script('abcbiz-add-to-cart', 'acbbiz_add_to_cart', array(
                'ajax_url' => admin_url('admin-ajax.php'),
                'abcbiz_add_to_cart_nonce' => $abcbiz_add_to_cart_nonce
            ));
        }

        wp_register_script('abcbiz-anim-text-main', ABCBIZ_Assets . "/js/anim-text-main.js", array('jquery', 'elementor-frontend'), '1.0', true);
        wp_register_script('abcbiz-search-icon', ABCBIZ_Assets . "/js/abcbiz-search-icon.js", array('jquery'), '1.0', true);
        wp_register_script('abcbiz-wp-menu-js', ABCBIZ_Assets . "/js/abcbiz-wp-menu.js", array('jquery'), '1.0', true);
        wp_register_script('abcbiz-popup', ABCBIZ_Assets . "/js/abcbiz-popup.js", array('jquery'), '1.0', true);
        wp_register_script('abcbiz-sticker-text', ABCBIZ_Assets . "/js/abcbiz-sticker-text.js", array('jquery'), '1.0', true);
        wp_register_script('abcbiz-jquery-appear', ABCBIZ_Assets . "/js/jquery.appear.js", array('jquery'), '1.0', true);
        wp_register_script('abcbiz-circular-progress', ABCBIZ_Assets . "/js/circular-progress.js", array('jquery'), '1.0', true);
        wp_register_script('jquery-event-move', ABCBIZ_Assets . "/js/jquery.event.move.js", array('jquery'), '1.0', true);
        wp_register_script('jquery-twentytwenty', ABCBIZ_Assets . "/js/jquery.twentytwenty.js", array('jquery'), '1.0', true);
        wp_register_script('abcbiz-count-down', ABCBIZ_Assets . "/js/abcbiz-count-down.js", array('jquery'), '1.0', true);
        wp_register_script('abcbiz-back-to-top', ABCBIZ_Assets . "/js/abcbiz-back-to-top.js", array('jquery'), '1.0', true);
        wp_register_script('abcbiz-skill-bar', ABCBIZ_Assets . "/js/skill-bar.js", array('jquery'), '1.0', true);
        wp_register_script('abcbiz-counter-up', ABCBIZ_Assets . "/js/abcbiz-counterup.js", array('jquery'), '1.0', true);
        wp_register_script('abcbiz-wapoints', ABCBIZ_Assets . "/js/waypoints.min.js", array('jquery'), '1.0', true);
        wp_register_script('abcbiz-circular-skills', ABCBIZ_Assets . "/js/abcbiz-circular-skills.js", array('jquery'), '1.0', true);
        wp_register_script('abcbiz-magnific-popup', ABCBIZ_Assets . "/js/magnific-popup.min.js", array('jquery'), '1.0', true);
        wp_register_script('abcbiz-mailchimp-newsletter', ABCBIZ_Assets . "/js/mailchimp-newsletter.js", array('jquery'), '1.0', true);
        wp_register_script('abcbiz-template-slider', ABCBIZ_Assets . "/js/abcbiz-template-slider.js", array('jquery', 'elementor-frontend'), '1.0', true);
        wp_register_script('abcbiz-cost-estimation', ABCBIZ_Assets . "/js/abcbiz-cost-estimation.js", array('jquery', 'elementor-frontend'), '1.0', true);
        wp_enqueue_script('abcbiz-elementor-custom', ABCBIZ_Assets . "/js/main.js", array('jquery'), false, true);

        wp_localize_script('abcbiz-mailchimp-newsletter', 'abcbizMailchimpAjax', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('abcbiz_mailchimp_nonce'),
        ]);
    }
}
add_action('wp_enqueue_scripts', 'abcbiz_elementor_enqueue');



//add ABCBiz Elementor Category
if (!function_exists('abcbiz_elementor_add_widget_categories')) {
    function abcbiz_elementor_add_widget_categories($elements_manager)
    {
        $elements_manager->add_category(
            'abcbiz-category',
            [
                'title' => esc_html__('ABCBiz Multi Elements', 'abcbiz-addons'),
                'icon' => 'eicon-kit-plugins',
            ]
        );
    }
}
add_action('elementor/elements/categories_registered', 'abcbiz_elementor_add_widget_categories');

//add ABCBiz Elementor WooCommerce Category
if (!function_exists('abcbiz_elementor_add_widget_wc_categories')) {
    function abcbiz_elementor_add_widget_wc_categories($elements_manager)
    {
        if (function_exists('is_plugin_active') && is_plugin_active('woocommerce/woocommerce.php')) {
            $elements_manager->add_category(
                'abcbiz-wc-category',
                [
                    'title' => esc_html__('ABCBiz WooCommerce', 'abcbiz-addons'),
                    'icon' => 'eicon-woocommerce',
                ]
            );
        }
    }
}
add_action('elementor/elements/categories_registered', 'abcbiz_elementor_add_widget_wc_categories');

//Load Editor CSS
add_action('elementor/editor/before_enqueue_scripts', function () {
    wp_enqueue_style('abcbiz-elementor-admin-style', ABCBIZ_Assets . "/css/ele-editor.css");
});

//Get Plugin Info
function abcbiz_multi_plugin_info()
{
    // Ensure the function is available
    if (!function_exists('get_plugin_data')) {
        require_once(ABSPATH . 'wp-admin/includes/plugin.php');
    }

    $plugin_file_path = ABCBIZ_Path . '/abcbiz-addons.php';
    if (file_exists($plugin_file_path)) {
        $plugin_data = get_plugin_data($plugin_file_path);
        $plugin_info = [
            'Name' => $plugin_data['Name'],
            'Version' => $plugin_data['Version'],
            'Author' => $plugin_data['Author'],
            'PluginURI' => $plugin_data['PluginURI'],
            'AuthorURI' => $plugin_data['AuthorURI'],
            'Description' => $plugin_data['Description']
        ];
    } else {
        $plugin_info = [
            'Name' => esc_html__('Plugin Name Not Found', 'abcbiz-addons'),
            'Version' => esc_html__('Plugin Version Not Found', 'abcbiz-addons'),
            'Author' => esc_html__('Author Not Found', 'abcbiz-addons'),
            'PluginURI' => esc_html__('Plugin URI Not Found', 'abcbiz-addons'),
            'AuthorURI' => esc_html__('Author URI Not Found', 'abcbiz-addons'),
            'Description' => esc_html__('Description Not Found', 'abcbiz-addons')
        ];
    }

    return $plugin_info;
}

// Add "Get Pro" and "Settings" link to the plugin action links
function abcbiz_add_plugin_links($links)
{
    // Add "Settings" link
    $settings_link = '<a href="' . admin_url('admin.php?page=abcbiz_home') . '">Settings</a>';

    // Add "Get Pro" link
    $pro_link = '<a href="https://abcbizaddons.com/" target="_blank" style="font-weight: bold; color: #ff4500;">Get Pro</a>';

    // Add the links to the list of existing plugin action links
    array_unshift($links, $settings_link); // Puts "Settings" as the first link
    array_push($links, $pro_link); // Puts "Get Pro" at the end of the list

    return $links;
}

// Hook the function to modify the plugin action links
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'abcbiz_add_plugin_links');
