<?php 
namespace ABCBizAddons\includes\admin\inc\Settings;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class SettingsPage {
    private $options;

    public function __construct() {
        $this->options = get_option('abcbiz_mailchimp_options');
        add_action('admin_menu', [$this, 'add_settings_submenu_page']);
        add_action('admin_init', [$this, 'register_settings']);
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
        register_setting(
            'abcbiz_mailchimp_options', // Option group
            'abcbiz_mailchimp_options', // Option name
            [$this, 'sanitize'] // Sanitize callback
        );

        add_settings_section(
            'mailchimp_settings_section', // ID
            __('Mailchimp API Settings', 'abcbiz-addons'), // Title
            [$this, 'section_info'], // Callback
            'abcbiz_mailchimp_settings' // Page
        );

        add_settings_field(
            'mailchimp_api_key', // ID
            __('API Key', 'abcbiz-addons'), // Title 
            [$this, 'mailchimp_api_key_callback'], // Callback
            'abcbiz_mailchimp_settings', // Page
            'mailchimp_settings_section' // Section           
        );

        add_settings_field(
            'mailchimp_list_id', 
            __('List ID', 'abcbiz-addons'), 
            [$this, 'mailchimp_list_id_callback'], 
            'abcbiz_mailchimp_settings', 
            'mailchimp_settings_section'
        );
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

        if (isset($input['mailchimp_list_id'])) {
            $new_input['mailchimp_list_id'] = sanitize_text_field($input['mailchimp_list_id']);
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
            '<input type="text" id="mailchimp_api_key" name="abcbiz_mailchimp_options[mailchimp_api_key]" value="%s" />',
            isset($this->options['mailchimp_api_key']) ? esc_attr($this->options['mailchimp_api_key']) : ''
        );
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function mailchimp_list_id_callback() {
        printf(
            '<input type="text" id="mailchimp_list_id" name="abcbiz_mailchimp_options[mailchimp_list_id]" value="%s" />',
            isset($this->options['mailchimp_list_id']) ? esc_attr($this->options['mailchimp_list_id']) : ''
        );
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