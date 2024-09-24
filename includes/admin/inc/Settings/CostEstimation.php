<?php

namespace ABCBizAddons\includes\admin\inc\Settings;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class CostEstimation
{
    private $options;

    public function __construct()
    {
        $this->options = get_option('abcbiz_cost_estimation_options');
        // Set default values if not already set
        if (!$this->options) {
            $this->options = array(
                'cost_estimation_package_1' => 'low',
                'cost_estimation_package_2' => 'medium',
                'cost_estimation_package_3' => 'high',
            );
            update_option('abcbiz_cost_estimation_options', $this->options);
        }

        add_action('admin_init', [$this, 'register_settings']);
    }

    // Register Cost Estimation settings
    public function register_settings()
    {
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

        // Add three fields for the packages
        add_settings_field(
            'cost_estimation_package_1',
            __('Package Name 1', 'abcbiz-addons'),
            [$this, 'cost_estimation_package_1_callback'],
            'abcbiz_cost_estimation_settings',
            'cost_estimation_settings_section'
        );

        add_settings_field(
            'cost_estimation_package_2',
            __('Package Name 2', 'abcbiz-addons'),
            [$this, 'cost_estimation_package_2_callback'],
            'abcbiz_cost_estimation_settings',
            'cost_estimation_settings_section'
        );

        add_settings_field(
            'cost_estimation_package_3',
            __('Package Name 3', 'abcbiz-addons'),
            [$this, 'cost_estimation_package_3_callback'],
            'abcbiz_cost_estimation_settings',
            'cost_estimation_settings_section'
        );
    }

    // Cost Estimation settings section description
    public function section_info()
    {
        echo __('Enter the names for the cost estimation packages below:', 'abcbiz-addons');
    }

    // Sanitize Cost Estimation settings, including nonce validation
    public function sanitize($input)
    {
        // Check for the nonce before processing the form
        if (!isset($_POST['abcbiz_nonce']) || !wp_verify_nonce($_POST['abcbiz_nonce'], 'abcbiz_save_settings')) {
            add_settings_error('abcbiz_cost_estimation_settings', 'abcbiz_nonce_error', __('Nonce verification failed', 'abcbiz-addons'), 'error');
            return $input; // Do not save the input if the nonce is invalid
        }

        // Sanitize each package name
        $new_input = array();
        if (isset($input['cost_estimation_package_1'])) {
            $new_input['cost_estimation_package_1'] = sanitize_text_field($input['cost_estimation_package_1']);
        }
        if (isset($input['cost_estimation_package_2'])) {
            $new_input['cost_estimation_package_2'] = sanitize_text_field($input['cost_estimation_package_2']);
        }
        if (isset($input['cost_estimation_package_3'])) {
            $new_input['cost_estimation_package_3'] = sanitize_text_field($input['cost_estimation_package_3']);
        }

        // Add a success message
        add_settings_error('abcbiz_cost_estimation_settings', 'abcbiz_cost_estimation_success', __('Settings saved successfully', 'abcbiz-addons'), 'updated');

        return $new_input;
    }

    // Callback for Package Name 1
    public function cost_estimation_package_1_callback()
    {
        printf(
            '<input type="text" class="abcbiz-full-width-input" id="cost_estimation_package_1" name="abcbiz_cost_estimation_options[cost_estimation_package_1]" value="%s" placeholder="%s"/>',
            isset($this->options['cost_estimation_package_1']) ? esc_attr($this->options['cost_estimation_package_1']) : '',
            __('Package Name 1', 'abcbiz-addons')
        );
    }

    // Callback for Package Name 2
    public function cost_estimation_package_2_callback()
    {
        printf(
            '<input type="text" class="abcbiz-full-width-input" id="cost_estimation_package_2" name="abcbiz_cost_estimation_options[cost_estimation_package_2]" value="%s" placeholder="%s"/>',
            isset($this->options['cost_estimation_package_2']) ? esc_attr($this->options['cost_estimation_package_2']) : '',
            __('Package Name 2', 'abcbiz-addons')
        );
    }

    // Callback for Package Name 3
    public function cost_estimation_package_3_callback()
    {
        printf(
            '<input type="text" class="abcbiz-full-width-input" id="cost_estimation_package_3" name="abcbiz_cost_estimation_options[cost_estimation_package_3]" value="%s" placeholder="%s"/>',
            isset($this->options['cost_estimation_package_3']) ? esc_attr($this->options['cost_estimation_package_3']) : '',
            __('Package Name 3', 'abcbiz-addons')
        );
    }
}