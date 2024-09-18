<?php

namespace ABCBiz\Includes\Widgets\ABCMailChimp;

use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class Main extends \Elementor\Widget_Base
{

    private $settings;

    public function get_name()
    {
        return 'abcbiz-mailchimp';
    }

    public function get_title()
    {
        return __('ABC MailChimp', 'abcbiz-addons');
    }

    public function get_icon()
    {
        return 'eicon-mail abcbiz-addons-icon';
    }

    public function get_categories()
    {
        return ['abcbiz-category'];
    }

    // Use this method to register the scripts
    public function get_script_depends()
    {
        return ['abcbiz-mailchimp-newsletter']; // The handle for your script
    }

    public function __construct($data = [], $args = null)
    {
        parent::__construct($data, $args);

        // Fetch Mailchimp API key from plugin settings
        $this->settings = get_option('abcbiz_mailchimp_options');
    }

    public function localize_script()
    {
        wp_localize_script('abcbiz-mailchimp-newsletter', 'abcbizMailchimpAjax', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('abcbiz_mailchimp_nonce'),
        ]);
    }

    protected function register_controls()
    {
        // Check if API key is set
        $api_key = isset($this->settings['mailchimp_api_key']) ? sanitize_text_field($this->settings['mailchimp_api_key']) : '';


        if (empty($api_key)) {
            // Add notice control if API key is not set
            $this->start_controls_section(
                'section_notice',
                [
                    'label' => __('Notice', 'abcbiz-addons'),
                    'tab' => Controls_Manager::TAB_CONTENT,
                ]
            );


            $this->add_control(
                'api_key_notice',
                [
                    'type' => Controls_Manager::RAW_HTML,
                    'raw' => '<div style="color: red;">' . sprintf(
                        __('Mailchimp API key is not set. Please configure it in the <a href="%s" target="_blank">plugin settings</a>.', 'abcbiz-addons'),
                        esc_url(admin_url('admin.php?page=abcbiz_settings&tab=mailchimp'))
                    ) . '</div>',
                    'content_classes' => 'elementor-panel-alert elementor-panel-alert-danger',
                ]
            );

            $this->end_controls_section();
        }

        $this->start_controls_section(
            'section_mailchimp',
            [
                'label' => __('MailChimp Settings', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'mailchimp_list_id',
            [
                'label' => __('Audience List', 'abcbiz-addons'),
                'type' => Controls_Manager::SELECT2,
                'options' => $this->get_mailchimp_lists(),
                'description' => sprintf(__('Select your Mailchimp Audience List. You can find more information %shere%s.', 'abcbiz-addons'), '<a href="https://mailchimp.com/help/find-audience-id/" target="_blank">', '</a>'),
                'dynamic' => ['active' => true],
            ]
        );

        // Toggle control to enable or disable name fields
        $this->add_control(
            'enable_name_fields',
            [
                'label' => __('Enable Name Fields', 'abcbiz-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'abcbiz-addons'),
                'label_off' => __('No', 'abcbiz-addons'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_control(
            'submit_button_text',
            [
                'label' => __('Submit Button Text', 'abcbiz-addons'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Subscribe', 'abcbiz-addons'),
                'placeholder' => __('Enter your placeholder text', 'abcbiz-addons'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'flex_direction',
            [
                'label' => __( 'Flex Direction', 'abcbiz-addons' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'default' => 'row',
                'options' => [
                    'row' => [
                        'title' => __( 'Row', 'abcbiz-addons' ),
                        'icon' => 'eicon-arrow-right',
                    ],
                    'row-reverse' => [
                        'title' => __( 'Row Reverse', 'abcbiz-addons' ),
                        'icon' => 'eicon-arrow-left',
                    ],
                    'column' => [
                        'title' => __( 'Column', 'abcbiz-addons' ),
                        'icon' => 'eicon-arrow-down',
                    ],
                    'column-reverse' => [
                        'title' => __( 'Column Reverse', 'abcbiz-addons' ),
                        'icon' => 'eicon-arrow-up',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} #abcbiz-mailchimp-form' => 'flex-direction: {{VALUE}}',
                ]
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'abcbiz_mailchimp_section_style',
            [
                'label' => __('Style', 'abcbiz-addons'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'abcbiz_mailchimp_first_name_width',
            [
                'label' => __( 'First Name Width', 'abcbiz-addons' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} #abcbiz-mailchimp-form #abcbiz-mailchimp-fname' => 'width: {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'enable_name_fields' => 'yes',
                ],

            ]
        );

        $this->add_responsive_control(
            'abcbiz_mailchimp_last_name_width',
            [
                'label' => __( 'Last Name Width', 'abcbiz-addons' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'condition' => [
                    'enable_name_fields' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}} #abcbiz-mailchimp-form #abcbiz-mailchimp-lname' => 'width: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'abcbiz_mailchimp_email_width',
            [
                'label' => __( 'Email Width', 'abcbiz-addons' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} #abcbiz-mailchimp-form #abcbiz-mailchimp-email' => 'width: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

  

        $this->add_responsive_control(
            'abcbiz_mailchimp_gap',
            [
                'label' => __( 'Gap', 'abcbiz-addons' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 10,
                        'step' => 0.1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-mailchimp-single-form' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'abcbiz_mailchimp_input_padding',
            [
                'label' => __( 'Input Padding', 'abcbiz-addons' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} #abcbiz-mailchimp-form input' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'abcbiz_mailchimp_input_border_radius',
            [
                'label' => __( 'Input Border Radius', 'abcbiz-addons' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} #abcbiz-mailchimp-form input' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'abcbiz_mailchimp_input_border',
                'label' => __( 'Input Border', 'abcbiz-addons' ),
                'selector' => '{{WRAPPER}} #abcbiz-mailchimp-form input:not(.abcbiz-mailchimp-submit)',
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'abcbiz_mailchimp_button_style',
            [
                'label' => __( 'Button', 'abcbiz-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'abcbiz_mailchimp_button_padding',
            [
                'label' => __( 'Padding', 'abcbiz-addons' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} #abcbiz-mailchimp-form #abcbiz-mailchimp-submit' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'abcbiz_mailchimp_button_border_radius',
            [
                'label' => __( 'Border Radius', 'abcbiz-addons' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} #abcbiz-mailchimp-form #abcbiz-mailchimp-submit' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'abcbiz_mailchimp_button_border',
                'label' => __( 'Border', 'abcbiz-addons' ),
                'selector' => '{{WRAPPER}} #abcbiz-mailchimp-form #abcbiz-mailchimp-submit',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_mailchimp_button_typography',
                'label' => __( 'Typography', 'abcbiz-addons' ),
                'selector' => '{{WRAPPER}} #abcbiz-mailchimp-form #abcbiz-mailchimp-submit',
            ]
        );
        $this->add_responsive_control(
            'abcbiz_mailchimp_submit_width',
            [
                'label' => __( 'Width', 'abcbiz-addons' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} #abcbiz-mailchimp-form #abcbiz-mailchimp-submit' => 'width: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'abcbiz_mailchimp_button_background',
                'label' => __( 'Background', 'abcbiz-addons' ),
                'selector' => '{{WRAPPER}} #abcbiz-mailchimp-form #abcbiz-mailchimp-submit',
                'exclude' => [
                    'image'
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'abcbiz_elementor_mailchimp_message_style',
            [
                'label' => __( 'Message Style', 'abcbiz-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'abcbiz_elementor_mailchimp_message_text_color',
            [
                'label' => __( 'Text Color', 'abcbiz-addons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-mailchimp-response' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_mailchimp_message_typography',
                'label' => __( 'Typography', 'abcbiz-addons' ),
                'selector' => '{{WRAPPER}} .abcbiz-mailchimp-response',
            ]
        );

        $this->end_controls_section();

    }

    private function get_mailchimp_lists()
    {
        $api_key = isset($this->settings['mailchimp_api_key']) ? sanitize_text_field($this->settings['mailchimp_api_key']) : '';

        if (empty($api_key)) {
            return [];
        }

        $data_center = substr($api_key, strpos($api_key, '-') + 1);
        $url = 'https://' . $data_center . '.api.mailchimp.com/3.0/lists';

        $response = wp_remote_get($url, [
            'timeout' => 15,
            'headers' => [
                'Authorization' => 'Basic ' . base64_encode('user:' . $api_key),
            ],
        ]);

        if (is_wp_error($response)) {
            return [];
        }

        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body);

        if (json_last_error() !== JSON_ERROR_NONE || empty($data->lists)) {
            return [];
        }

        $lists = [];
        foreach ($data->lists as $list) {
            $lists[$list->id] = $list->name;
        }

        return $lists;
    }

    protected function render()
    {
       include 'renderview.php';
        
    }
}