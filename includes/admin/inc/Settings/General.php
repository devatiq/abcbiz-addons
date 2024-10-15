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
        echo __('General settings for the PrimeKit Addons.', 'abcbiz-addons');
    }

    // Sanitize General settings
    public function sanitize($input) {
        // Verify nonce before saving settings
        if (!isset($_POST['abcbiz_nonce']) || !wp_verify_nonce($_POST['abcbiz_nonce'], 'abcbiz_save_settings')) {
            add_settings_error('abcbiz_general_settings', 'abcbiz_nonce_error', __('Nonce verification failed', 'abcbiz-addons'), 'error');
            return $input; // return input without saving to avoid data loss
        }
    
        $new_input = array();
        // Add sanitization logic for general options
    
        // Add success message
        add_settings_error('abcbiz_general_settings', 'abcbiz_general_success', __('Settings saved successfully', 'abcbiz-addons'), 'updated');
    
        return $new_input;
    }
    
    
}