<?php

namespace ABCBizAddons\includes\admin\inc\Settings;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class SettingsPage
{
    public function __construct()
    {
        add_action('admin_menu', [$this, 'add_settings_submenu_page']);
        add_action('admin_head', [$this, 'add_custom_styles']); // Add custom styles hook

        // Load the settings classes
        $this->load_settings_classes();
    }

    /**
     * Load settings classes for General and Mailchimp settings.
     */
    public function load_settings_classes()
    {
        // Include the General and Mailchimp settings files using the defined constants
        if (file_exists(ABCBIZ_Admin . '/inc/Settings/General.php')) {
            require_once ABCBIZ_Admin . '/inc/Settings/General.php';
            // Check if the class General exists before instantiating
            if (class_exists('ABCBizAddons\includes\admin\inc\Settings\General')) {
                new \ABCBizAddons\includes\admin\inc\Settings\General();
            }
        }

        if (file_exists(ABCBIZ_Admin . '/inc/Settings/Mailchimp.php')) {
            require_once ABCBIZ_Admin . '/inc/Settings/Mailchimp.php';
            // Check if the class Mailchimp exists before instantiating
            if (class_exists('ABCBizAddons\includes\admin\inc\Settings\Mailchimp')) {
                new \ABCBizAddons\includes\admin\inc\Settings\Mailchimp();
            }
        }
    }

    /**
     * Add settings submenu page under the existing ABC Biz menu.
     */
    public function add_settings_submenu_page()
    {
        add_submenu_page(
            'abcbiz_home', // Parent slug
            __('Settings', 'abcbiz-addons'), // Page title
            __('Settings', 'abcbiz-addons'), // Menu title
            'manage_options', // Capability
            'abcbiz_settings', // Menu slug
            [$this, 'render_settings_page'] // Callback function
        );
    }

    /**
     * Add custom styles to the admin header.
     */
    public function add_custom_styles()
    {
        echo '<style>
            .abcbiz-full-width-input {
                width: 100%;
                max-width: 600px;
                box-sizing: border-box;
            }
        </style>';
    }

    /**
     * Render the settings page with tabs.
     */
    public function render_settings_page() {
        $active_tab = isset($_GET['tab']) ? $_GET['tab'] : 'general';
        ?>
        <div class="wrap">
            <h1><?php _e('ABC Biz Settings', 'abcbiz-addons'); ?></h1>
    
            <h2 class="nav-tab-wrapper">
                <a href="?page=abcbiz_settings&tab=general"
                    class="nav-tab <?php echo $active_tab == 'general' ? 'nav-tab-active' : ''; ?>"><?php echo esc_html__('General', 'abcbiz-addons'); ?></a>
                <a href="?page=abcbiz_settings&tab=mailchimp"
                    class="nav-tab <?php echo $active_tab == 'mailchimp' ? 'nav-tab-active' : ''; ?>"><?php echo esc_html__('Mailchimp', 'abcbiz-addons'); ?></a>
            </h2>
    
            <!-- Display settings errors and success messages -->
            <?php settings_errors(); ?>
    
            <form method="post" action="options.php">
                <?php
                if ($active_tab == 'general') {
                    // General settings content
                    settings_fields('abcbiz_general_options');
                    do_settings_sections('abcbiz_general_settings');
                } else {
                    // Mailchimp settings
                    settings_fields('abcbiz_mailchimp_options');
                    do_settings_sections('abcbiz_mailchimp_settings');
                }
    
                // Add nonce field for security
                wp_nonce_field('abcbiz_save_settings', 'abcbiz_nonce');
                
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }
    
}