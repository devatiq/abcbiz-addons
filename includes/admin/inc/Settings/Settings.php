<?php

namespace ABCBizAddons\includes\admin\inc\Settings;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class SettingsPage {
    private $options;

    public function __construct() {
        $this->options = get_option('abcbiz_mailchimp_options');
        add_action('admin_menu', [$this, 'add_settings_submenu_page']);
        add_action('admin_init', [$this, 'register_settings']);
        add_action('admin_head', [$this, 'add_custom_styles']); // Add custom styles hook
    }

    /**
     * Add settings submenu page under the existing ABC Biz menu.
     */
    public function add_settings_submenu_page() {
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
     * Register settings, sections, and fields.
     */
    public function register_settings() {
        // Register Mailchimp settings as before
        register_setting(
            'abcbiz_mailchimp_options', 
            'abcbiz_mailchimp_options', 
            [$this, 'sanitize']
        );
    
        add_settings_section(
            'mailchimp_settings_section',
            __('Mailchimp API Settings', 'abcbiz-addons'), 
            [$this, 'section_info'], 
            'abcbiz_mailchimp_settings'
        );
    
        add_settings_field(
            'mailchimp_api_key', 
            __('API Key', 'abcbiz-addons'), 
            [$this, 'mailchimp_api_key_callback'], 
            'abcbiz_mailchimp_settings', 
            'mailchimp_settings_section'
        );
    
        // Register General settings
        register_setting(
            'abcbiz_general_options', 
            'abcbiz_general_options', 
            [$this, 'sanitize_general'] // Sanitize callback for general options
        );
    
        add_settings_section(
            'general_settings_section', 
            __('General Settings', 'abcbiz-addons'), 
            [$this, 'general_section_info'], 
            'abcbiz_general_settings'
        );
    }
    

    /**
     * Add custom styles to the admin header.
     */
    public function add_custom_styles() {
        echo '<style>
            .abcbiz-full-width-input {
                width: 100%;
                max-width: 600px; /* Optional: To prevent input from being too wide */
                box-sizing: border-box;
            }
        </style>';
    }

    /**
     * Sanitize each setting field as needed.
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize($input) {
        $new_input = array();
        if (isset($input['mailchimp_api_key'])) {
            $new_input['mailchimp_api_key'] = sanitize_text_field($input['mailchimp_api_key']);
        }    
        
        return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function section_info() {
        echo __('Enter your Mailchimp API settings below:', 'abcbiz-addons');
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function mailchimp_api_key_callback() {
        printf(
            '<input type="text" class="abcbiz-full-width-input" id="mailchimp_api_key" name="abcbiz_mailchimp_options[mailchimp_api_key]" value="%s" />',
            isset($this->options['mailchimp_api_key']) ? esc_attr($this->options['mailchimp_api_key']) : ''
        );
        echo '<p class="description">' . sprintf(__('Enter your Mailchimp API Key. You can get it %shere%s.', 'abcbiz-addons'), '<a href="https://us6.admin.mailchimp.com/account/api/" target="_blank">', '</a>') . '</p>';
    }

    // General section 
    public function general_section_info() {
        echo __('General settings for the ABC Biz plugin.', 'abcbiz-addons');
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
                <a href="?page=abcbiz_settings&tab=general" class="nav-tab <?php echo $active_tab == 'general' ? 'nav-tab-active' : ''; ?>"><?php _e('General', 'abcbiz-addons'); ?></a>
                <a href="?page=abcbiz_settings&tab=mailchimp" class="nav-tab <?php echo $active_tab == 'mailchimp' ? 'nav-tab-active' : ''; ?>"><?php _e('Mailchimp', 'abcbiz-addons'); ?></a>
            </h2>

            <form method="post" action="options.php">
                <?php
                if ($active_tab == 'general') {
                    // General settings content (if any) goes here
                    settings_fields('abcbiz_general_options');
                    do_settings_sections('abcbiz_general_settings');
                } else {
                    // Mailchimp settings
                    settings_fields('abcbiz_mailchimp_options');
                    do_settings_sections('abcbiz_mailchimp_settings');
                }
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }
}