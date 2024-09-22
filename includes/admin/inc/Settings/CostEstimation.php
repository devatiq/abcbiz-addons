<?php

namespace ABCBizAddons\includes\admin\inc\Settings;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class CostEstimation {
    private $options;

    public function __construct() {
        $this->options = get_option('abcbiz_cost_estimation_options');
        add_action('admin_init', [$this, 'register_settings']);
    }

    // Register Cost Estimation settings
    public function register_settings() {
        register_setting(
            'abcbiz_cost_estimation_options', 
            'abcbiz_cost_estimation_options', 
            [$this, 'sanitize']
        );

        add_settings_section(
            'cost_estimation_settings_section', 
            __('Cost Estimation Settings', 'abcbiz-addons'), 
            [$this, 'section_info'], 
            'abcbiz_cost_estimation_settings'
        );

        add_settings_field(
            'default_hourly_rate', 
            __('Default Hourly Rate', 'abcbiz-addons'), 
            [$this, 'default_hourly_rate_callback'], 
            'abcbiz_cost_estimation_settings', 
            'cost_estimation_settings_section'
        );
    }

    // Cost Estimation settings section description
    public function section_info() {
        echo __('Enter your cost estimation settings below:', 'abcbiz-addons');
    }

    // Sanitize Cost Estimation settings
    public function sanitize($input) {
        // Verify nonce before saving settings
        if (!isset($_POST['abcbiz_nonce']) || !wp_verify_nonce($_POST['abcbiz_nonce'], 'abcbiz_save_settings')) {
            add_settings_error('abcbiz_cost_estimation_settings', 'abcbiz_nonce_error', __('Nonce verification failed', 'abcbiz-addons'), 'error');
            return $input; // return input without saving to avoid data loss
        }
    
        $new_input = array();
        if (isset($input['default_hourly_rate'])) {
            $new_input['default_hourly_rate'] = sanitize_text_field($input['default_hourly_rate']);
        }
    
        // Add success message
        add_settings_error('abcbiz_cost_estimation_settings', 'abcbiz_cost_estimation_success', __('Settings saved successfully', 'abcbiz-addons'), 'updated');
    
        return $new_input;
    }    

    // Default Hourly Rate field
    public function default_hourly_rate_callback() {
        printf(
            '<input type="text" class="abcbiz-full-width-input" id="default_hourly_rate" name="abcbiz_cost_estimation_options[default_hourly_rate]" value="%s" />',
            isset($this->options['default_hourly_rate']) ? esc_attr($this->options['default_hourly_rate']) : ''
        );
        echo '<p class="description">' . __('Enter the default hourly rate for cost estimation.', 'abcbiz-addons') . '</p>';
    }
}