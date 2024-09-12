<?php

namespace ABCBiz\Includes\Widgets\ABCGravityForms;

use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class Main extends \Elementor\Widget_Base
{

    private $settings;

    public function get_name()
    {
        return 'abcbiz-ABCGravityForms';
    }

    public function get_title()
    {
        return __('ABC Gravity Forms', 'abcbiz-addons');
    }

    public function get_icon()
    {
        return 'eicon-mail';
    }

    public function get_categories()
    {
        return ['abcbiz-category'];
    }


    protected function register_controls()
    {
        $this->start_controls_section(
            'abcbiz_gravity_form_section',
            [
                'label' => __('Gravity Form', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        // Check if Gravity Forms is active
        if (class_exists('GFAPI')) {
            $forms = \GFAPI::get_forms();
            $options = [];

            // Populate the options array with form id and title
            if (!empty($forms)) {
                foreach ($forms as $form) {
                    $options[$form['id']] = $form['title'];
                }
            } else {
                $options[0] = esc_html__('No forms available', 'abcbiz-addons');
            }
            // Add control for Gravity Forms selection
            $this->add_control(
                'abcbiz_gf_form_id',
                [
                    'label' => esc_html__('Select Form', 'abcbiz-addons'),
                    'type' => Controls_Manager::SELECT,
                    'options' => $options,
                    'default' => 0,
                    'description' => esc_html__('Select the Gravity Form you want to use', 'abcbiz-addons')
                ]
            );
        } else {
            // Show a message if Gravity Forms is missing
            $this->add_control(
                'gravity_forms_missing',
                [
                    'type' => Controls_Manager::RAW_HTML,
                    'raw' => __('<strong>Gravity Forms is not installed or activated.</strong> Please install and activate Gravity Forms, then refresh the page to continue using this widget.', 'abcbiz-addons'),
                    'content_classes' => 'elementor-panel-alert elementor-panel-alert-danger',
                ]
            );

        }
        // Display form title
        $this->add_control(
            'display_title',
            [
                'label' => esc_html__('Display Form Title', 'abcbiz-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'abcbiz-addons'),
                'label_off' => esc_html__('No', 'abcbiz-addons'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        // Display form description
        $this->add_control(
            'display_description',
            [
                'label' => esc_html__('Display Form Description', 'abcbiz-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'abcbiz-addons'),
                'label_off' => esc_html__('No', 'abcbiz-addons'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        // Enable AJAX
        $this->add_control(
            'enable_ajax',
            [
                'label' => esc_html__('Enable AJAX', 'abcbiz-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'abcbiz-addons'),
                'label_off' => esc_html__('No', 'abcbiz-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        // Custom field values (optional)
        $this->add_control(
            'field_values',
            [
                'label' => esc_html__('Field Values (Optional)', 'abcbiz-addons'),
                'type' => Controls_Manager::TEXT,
                'default' => '',
                'description' => esc_html__('Pre-populate form fields with specific values (optional).', 'abcbiz-addons'),
            ]
        );

        // Tab index (optional)
        $this->add_control(
            'tabindex',
            [
                'label' => esc_html__('Tab Index', 'abcbiz-addons'),
                'type' => Controls_Manager::NUMBER,
                'default' => 1,
                'description' => esc_html__('Set a specific tab index for the form fields (optional).', 'abcbiz-addons'),
            ]
        );
        $this->end_controls_section();
    }




    protected function render()
    {

        // Check if Gravity Forms is active
        if (class_exists('GFAPI')) {
            // Render the Gravity Forms output as usual
            include 'renderview.php';
        } else {
            // Display a notice if Gravity Forms is not active
            echo '<div class="gravity-forms-missing-notice">';
            echo '<strong>' . esc_html__('Gravity Forms is missing! Please install and activate Gravity Forms.', 'abcbiz-addons') . '</strong>';
            echo '</div>';
        }

    }

}