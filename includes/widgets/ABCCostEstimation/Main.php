<?php
namespace ABCBiz\Includes\Widgets\ABCCostEstimation;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;

class Main extends BaseWidget
{
    // define protected variables...
    protected $name = 'abcbiz-cost-estimation';
    protected $title = 'Cost Estimation';
    protected $icon = 'eicon-call-to-action abcbiz-addons-icon';
    protected $categories = [
        'abcbiz-category'
    ];

    protected $keywords = [
        'cost',
        'estimation',
        'cost calculator',
        'calculator'
    ];

    public function get_script_depends() {
        return ['abcbiz-cost-estimation'];
    }

    /**
     * Register the widget controls.
     */
    protected function register_controls()
    {
        // Fetch saved package names from the dashboard settings
        $cost_estimation_options = get_option('abcbiz_cost_estimation_options', []);
        $package_1 = isset($cost_estimation_options['cost_estimation_package_1']) ? esc_html($cost_estimation_options['cost_estimation_package_1']) : '';
        $package_2 = isset($cost_estimation_options['cost_estimation_package_2']) ? esc_html($cost_estimation_options['cost_estimation_package_2']) : '';
        $package_3 = isset($cost_estimation_options['cost_estimation_package_3']) ? esc_html($cost_estimation_options['cost_estimation_package_3']) : '';

        // Generate the dynamic URL to the settings page
        $settings_url = admin_url('admin.php?page=abcbiz_settings&tab=cost_estimation');

        // Check if any of the package names are empty
        if (empty($package_1) || empty($package_2) || empty($package_3)) {
            // If any package names are missing, show an alert field in Elementor
            $this->start_controls_section(
                'abcbiz_cost_calculator_alert_section',
                [
                    'label' => esc_html__('Alert', 'abcbiz-addons'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'abcbiz_cost_calculator_alert',
                [
                    'type' => \Elementor\Controls_Manager::ALERT,
                    'alert_type' => 'warning',
                    'heading' => esc_html__('Package Names Missing', 'abcbiz-addons'),
                    'content' => sprintf(
                        esc_html__('Package names are not configured yet. Please go to the %ssettings page%s to configure them.', 'abcbiz-addons'),
                        '<a href="' . esc_url($settings_url) . '" target="_blank">',
                        '</a>'
                    ),
                ]
            );

            $this->end_controls_section();
        } else {
            // Content Tab Start
            $this->start_controls_section(
                'abcbiz_cost_calculator_content_section',
                [
                    'label' => esc_html__('Cost Estimation Pages', 'abcbiz-addons'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $this->add_control(
                'abcbiz_cost_package_alert',
                [
                    'type' => \Elementor\Controls_Manager::ALERT,
                    'alert_type' => 'info',
                    'heading' => esc_html__('info', 'abcbiz-addons'),
                    'content' => sprintf(
                        esc_html__('Package names can be modified here. Please go to the %ssettings page%s in the dashboard to configure them.', 'abcbiz-addons'),
                        '<a href="' . esc_url($settings_url) . '" target="_blank">',
                        '</a>'
                    ),
                ]
            );

            // Create the repeater
            $repeater = new \Elementor\Repeater();

            // Add Title control for each repeater item
            $repeater->add_control(
                'page_list',
                [
                    'label' => esc_html__('Title', 'abcbiz-addons'),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__('Page #1', 'abcbiz-addons'),
                    'label_block' => true,
                ]
            );

            // Add first dropdown control for Package 1
            $repeater->add_control(
                'abcbiz_cost_calculator_pack_1',
                [
                    'label' => esc_html__('Package 1', 'abcbiz-addons'),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'abcbiz_c_p_low',
                    'options' => [
                        'abcbiz_c_p_low' => esc_html($package_1),
                        'abcbiz_c_p_medium' => esc_html($package_2),
                        'abcbiz_c_p_high' => esc_html($package_3),
                    ],
                ]
            );

            // Add first package price control for Package 1
            $repeater->add_control(
                'abcbiz_cost_calculator_price_1',
                [
                    'label' => esc_html__('Package 1 Price', 'abcbiz-addons'),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'min' => 0,
                    'step' => 1,
                    'default' => 100,
                ]
            );

            // Add second dropdown control for Package 2
            $repeater->add_control(
                'abcbiz_cost_calculator_pack_2',
                [
                    'label' => esc_html__('Package 2', 'abcbiz-addons'),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'abcbiz_c_p_medium',
                    'options' => [
                        'abcbiz_c_p_low' => esc_html($package_1),
                        'abcbiz_c_p_medium' => esc_html($package_2),
                        'abcbiz_c_p_high' => esc_html($package_3),
                    ],
                ]
            );

            // Add second package price control for Package 2
            $repeater->add_control(
                'abcbiz_cost_calculator_price_2',
                [
                    'label' => esc_html__('Package 2 Price', 'abcbiz-addons'),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'min' => 0,
                    'step' => 1,
                    'default' => 200,
                ]
            );

            // Add third dropdown control for Package 3
            $repeater->add_control(
                'abcbiz_cost_calculator_pack_3',
                [
                    'label' => esc_html__('Package 3', 'abcbiz-addons'),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'abcbiz_c_p_high',
                    'options' => [
                        'abcbiz_c_p_low' => esc_html($package_1),
                        'abcbiz_c_p_medium' => esc_html($package_2),
                        'abcbiz_c_p_high' => esc_html($package_3),
                    ],
                ]
            );

            // Add third package price control for Package 3
            $repeater->add_control(
                'abcbiz_cost_calculator_price_3',
                [
                    'label' => esc_html__('Package 3 Price', 'abcbiz-addons'),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'min' => 0,
                    'step' => 1,
                    'default' => 400,
                ]
            );

            // Add repeater to the controls
            $this->add_control(
                'abcbiz_cost_cal_pages_list',
                [
                    'label' => esc_html__('Pages List', 'abcbiz-addons'),
                    'type' => \Elementor\Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'page_list' => esc_html__('Page #1', 'abcbiz-addons'),
                            'abcbiz_cost_calculator_pack_1' => 'abcbiz_c_p_low',
                            'abcbiz_cost_calculator_price_1' => 100,
                            'abcbiz_cost_calculator_pack_2' => 'abcbiz_c_p_medium',
                            'abcbiz_cost_calculator_price_2' => 200,
                            'abcbiz_cost_calculator_pack_3' => 'abcbiz_c_p_high',
                            'abcbiz_cost_calculator_price_3' => 400,
                        ],
                    ],
                    'title_field' => '{{{ page_list }}}', // Dynamically show the title in the repeater list
                ]
            );

            $this->end_controls_section(); // end: Section


            // Section: Labels
            $this->start_controls_section(
                'labels_section',
                [
                    'label' => esc_html__('Labels', 'abcbiz-addons'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            // Label for the heading
            $this->add_control(
                'abcbiz_cost_calculator_heading',
                [
                    'label' => esc_html__('Heading', 'abcbiz-addons'),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__('COMPLEXITY', 'abcbiz-addons'),
                ]
            );

            // Label for the range slider
            $this->add_control(
                'abcbiz_cost_calculator_slider_label',
                [
                    'label' => esc_html__('Range Slider', 'abcbiz-addons'),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__('NUMBER OF PAGES', 'abcbiz-addons'),
                ]
            );

            // Label for the total
            $this->add_control(
                'abcbiz_cost_calculator_total_label',
                [
                    'label' => esc_html__('Total', 'abcbiz-addons'),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__('Total', 'abcbiz-addons'),
                ]
            );

            //label for the button
            $this->add_control(
                'abcbiz_cost_calculator_button_label',
                [
                    'label' => esc_html__('Button', 'abcbiz-addons'),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__('Send Request', 'abcbiz-addons'),
                ]
            );
            //button url
            $this->add_control(
                'abcbiz_cost_calculator_button_url',
                [
                    'label' => esc_html__('Button URL', 'abcbiz-addons'),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__('#', 'abcbiz-addons'),
                ]
            );

            $this->end_controls_section(); // end labels section

            /**
             * Style Tab
             */
            $this->start_controls_section(
                'style_label',
                [
                    'label' => esc_html__('Label Style', 'abcbiz-addons'),
                    'tab' => Controls_Manager::TAB_STYLE,
                ]
            );

            // heading typography
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'abcbiz_cost_calculator_heading_label_typography',
                    'label' => esc_html__('Heading Typography', 'abcbiz-addons'),
                    'selector' => '{{WRAPPER}} .abcbiz-pricing-cal-heading h2',
                ]
            );

            $this->add_control(
                'abcbiz_cost_calculator_heading_label_color',
                [
                    'label' => esc_html__('Heading Color', 'abcbiz-addons'),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#000',
                    'selectors' => [
                        '{{WRAPPER}} .abcbiz-pricing-cal-heading h2' => 'color: {{VALUE}}',
                    ],
                ]
            );

            // package label typography
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'abcbiz_cost_calculator_package_label_typography',
                    'label' => esc_html__('Package Name Typography', 'abcbiz-addons'),
                    'selector' => '{{WRAPPER}} .abcbiz-pricing-option .abcbiz-pricing-label-text',
                ]
            );

            // package label
            $this->add_control(
                'abcbiz_cost_calculator_package_label_color',
                [
                    'label' => esc_html__('Package Name Color', 'abcbiz-addons'),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#666',
                    'selectors' => [
                        '{{WRAPPER}}  .abcbiz-pricing-option .abcbiz-pricing-label-text' => 'color: {{VALUE}}',
                    ],
                ]
            );
            //package name gap
            $this->add_responsive_control(
                'abcbiz_cost_calculator_package_label_gap',
                [
                    'label' => esc_html__('Package Name Gap', 'abcbiz-addons'),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => ['px', '%'],                  
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 100,                               
                    ]],
                    'selectors' => [
                        '{{WRAPPER}} .abcbiz-pricing-label .abcbiz-pricing-options' => 'gap: {{SIZE}}{{UNIT}}',
                    ],
                ]
            );



            $this->end_controls_section(); // end label style section
        }
    }

    /**
     * Render the widget output on the frontend.
     */
    protected function render()
    {
        include 'RenderView.php';
    }


}