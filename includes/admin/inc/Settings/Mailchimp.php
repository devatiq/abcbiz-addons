<?php

namespace ABCBizAddons\includes\admin\inc\Settings;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Mailchimp {
    private $options;

    public function __construct() {
        $this->options = get_option('abcbiz_mailchimp_options');
        add_action('admin_init', [$this, 'register_settings']);
    }

    // Register Mailchimp settings
    public function register_settings() {
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
    }

    // Mailchimp settings section description
    public function section_info() {
        echo __('Enter your Mailchimp API settings below:', 'abcbiz-addons');
    }

    // Sanitize Mailchimp settings
    public function sanitize($input) {
        $new_input = array();
        if (isset($input['mailchimp_api_key'])) {
            $new_input['mailchimp_api_key'] = sanitize_text_field($input['mailchimp_api_key']);
        }
        return $new_input;
    }

    // Mailchimp API key field
    public function mailchimp_api_key_callback() {
        printf(
            '<input type="text" class="abcbiz-full-width-input" id="mailchimp_api_key" name="abcbiz_mailchimp_options[mailchimp_api_key]" value="%s" />',
            isset($this->options['mailchimp_api_key']) ? esc_attr($this->options['mailchimp_api_key']) : ''
        );
        echo '<p class="description">' . sprintf(__('Enter your Mailchimp API Key. You can get it %shere%s.', 'abcbiz-addons'), '<a href="https://us6.admin.mailchimp.com/account/api/" target="_blank">', '</a>') . '</p>';
    }
}