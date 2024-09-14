<?php

namespace ABCBizAddons\includes\admin\inc\Settings;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class General {
    public function __construct() {
        add_action('admin_init', [$this, 'register_settings']);
    }

    // Register General settings
    public function register_settings() {
        register_setting(
            'abcbiz_general_options',   
            'abcbiz_general_options', 
            [$this, 'sanitize'] // Sanitize callback for general options
        );

        add_settings_section(
            'general_settings_section', 
            __('General Settings', 'abcbiz-addons'), 
            [$this, 'section_info'], 
            'abcbiz_general_settings'
        );
    }

    // General settings section description
    public function section_info() {
        echo __('General settings for the ABC Biz plugin.', 'abcbiz-addons');
    }

    // Sanitize General settings
    public function sanitize($input) {
        $new_input = array();
        // Add sanitization logic for general options here
        return $new_input;
    }
}