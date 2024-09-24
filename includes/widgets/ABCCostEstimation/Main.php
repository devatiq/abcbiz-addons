<?php
namespace ABCBiz\Includes\Widgets\ABCCostEstimation;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

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

    public function get_script_depends()
    {
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
                    'label' => esc_html__('Labels & URL', 'abcbiz-addons'),
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

            // Section: Style
            $this->start_controls_section(
                'general_style_section',
                [
                    'label' => esc_html__('General Style', 'abcbiz-addons'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

            //width of the widget
            $this->add_responsive_control(
                'abcbiz_cost_calculator_width',
                [
                    'label' => esc_html__('Width', 'abcbiz-addons'),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => ['px', '%'],
                    'range' => [
                        'px' => [
                            'min' => 300,
                            'max' => 2000,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .abcbiz-pricing-calculator' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            // Background for the widget
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'abcbiz_cost_calculator_background',
                    'label' => esc_html__('Background', 'abcbiz-addons'),
                    'types' => ['classic', 'gradient'],
                    'selector' => '{{WRAPPER}} .abcbiz-pricing-calculator',
                ]
            );

            // Border for the widget
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'abcbiz_cost_calculator_border',
                    'label' => esc_html__('Border', 'abcbiz-addons'),
                    'selector' => '{{WRAPPER}} .abcbiz-pricing-calculator',
                ]
            );

            // Border radius for the widget
            $this->add_control(
                'abcbiz_cost_calculator_border_radius',
                [
                    'label' => esc_html__('Border Radius', 'abcbiz-addons'),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],                    
                    'selectors' => [
                        '{{WRAPPER}} .abcbiz-pricing-calculator' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            // Margin for the widget
            $this->add_responsive_control(
                'abcbiz_cost_calculator_margin',
                [
                    'label' => esc_html__('Margin', 'abcbiz-addons'),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .abcbiz-pricing-calculator' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            // Padding for the widget
            $this->add_responsive_control(
                'abcbiz_cost_calculator_padding',
                [
                    'label' => esc_html__('Padding', 'abcbiz-addons'),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .abcbiz-pricing-calculator' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            // Box Shadow for the widget
            $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'abcbiz_cost_calculator_box_shadow',
                    'label' => esc_html__('Box Shadow', 'abcbiz-addons'),
                    'selector' => '{{WRAPPER}} .abcbiz-pricing-calculator',
                ]
            );

            $this->end_controls_section(); // end: Style

            /**
             * Style Tab
             */
            $this->start_controls_section(
                'style_label',
                [
                    'label' => esc_html__('Label', 'abcbiz-addons'),
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

            //heading color
            $this->add_control(
                'abcbiz_cost_calculator_heading_label_color',
                [
                    'label' => esc_html__('Heading Color', 'abcbiz-addons'),
                    'type' => Controls_Manager::COLOR,
                    'description' => esc_html__('Set the color of the main heading text in the pricing calculator section.', 'abcbiz-addons'),
                    'default' => '#000',
                    'selectors' => [
                        '{{WRAPPER}} .abcbiz-pricing-cal-heading h2' => 'color: {{VALUE}}',
                    ],
                ]
            );

            // total typography
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'abcbiz_cost_calculator_total_label_typography',
                    'label' => esc_html__('Total Text Typography', 'abcbiz-addons'),
                    'selector' => '{{WRAPPER}} .abcbiz-pricing-cal-total-price p:not(#abcbiz-total-price)',
                ]
            );

            // total label color
            $this->add_control(
                'abcbiz_cost_calculator_total_label_color',
                [
                    'label' => esc_html__('Total Text Color', 'abcbiz-addons'),
                    'type' => Controls_Manager::COLOR,
                    'description' => esc_html__('Set the color of the "Total" label that appears before the total price.', 'abcbiz-addons'),
                    'default' => '#000',
                    'selectors' => [
                        '{{WRAPPER}} .abcbiz-pricing-cal-total-price p:not(#abcbiz-total-price)' => 'color: {{VALUE}}',
                    ],
                ]
            );

            // total amount typography
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'abcbiz_cost_calculator_total_amount_typography',
                    'label' => esc_html__('Total Amount Typography', 'abcbiz-addons'),
                    'selector' => '{{WRAPPER}} .abcbiz-pricing-cal-total-price #abcbiz-total-price',
                ]
            );

            // total amount color
            $this->add_control(
                'abcbiz_cost_calculator_total_amount_color',
                [
                    'label' => esc_html__('Total Amount Color', 'abcbiz-addons'),
                    'type' => Controls_Manager::COLOR,
                    'description' => esc_html__('Set the color of the total amount in the pricing calculator.', 'abcbiz-addons'),
                    'default' => '#000',
                    'selectors' => [
                        '{{WRAPPER}} .abcbiz-pricing-cal-total-price #abcbiz-total-price' => 'color: {{VALUE}}',
                    ],
                ]
            );


            $this->end_controls_section(); // end label style section

            // start package name style section
            $this->start_controls_section(
                'abcbiz_cost_calculator_package_name_style',
                [
                    'label' => esc_html__('Package Name', 'abcbiz-addons'),
                    'tab' => Controls_Manager::TAB_STYLE,
                ]
            );

            // package label typography
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'abcbiz_cost_calculator_package_label_typography',
                    'label' => esc_html__('Typography', 'abcbiz-addons'),
                    'selector' => '{{WRAPPER}} .abcbiz-pricing-option .abcbiz-pricing-label-text',
                    'description' => esc_html__('Customize the typography for the package labels (e.g., Low, Medium, High) displayed next to each pricing option.', 'abcbiz-addons'),
                ]
            );

            // package label
            $this->add_control(
                'abcbiz_cost_calculator_package_label_color',
                [
                    'label' => esc_html__('Color', 'abcbiz-addons'),
                    'type' => Controls_Manager::COLOR,
                    'description' => esc_html__('Set the color for the package labels (e.g., Low, Medium, High) displayed next to each pricing option.', 'abcbiz-addons'),
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
                    'label' => esc_html__('Gap', 'abcbiz-addons'),
                    'type' => Controls_Manager::SLIDER,
                    'description' => esc_html__('Set the space (gap) between the package labels (e.g., Low, Medium, High) in the pricing options.', 'abcbiz-addons'),
                    'size_units' => ['px', '%'],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 200,
                        ]
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .abcbiz-pricing-label .abcbiz-pricing-options' => 'gap: {{SIZE}}{{UNIT}}',
                    ],
                ]
            );

            // radio bullet size
            $this->add_responsive_control(
                'abcbiz_cost_calculator_package_radio_size',
                [
                    'label' => esc_html__('Button Size', 'abcbiz-addons'),
                    'description' => esc_html__('Adjust the size of the radio buttons used for package selection in the pricing options.', 'abcbiz-addons'),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => ['px', '%'],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 200,
                        ]
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .abcbiz-pricing-options .abcbiz-cost-est-pack-radio' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}}',
                    ],
                ]
            );

            // radio color
            $this->add_control(
                'abcbiz_cost_calculator_package_radio_color',
                [
                    'label' => esc_html__('Button Color', 'abcbiz-addons'),
                    'description' => esc_html__('Choose the color for the border of the radio buttons in the pricing options.', 'abcbiz-addons'),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#4CAF50',
                    'selectors' => [
                        '{{WRAPPER}} .abcbiz-pricing-options .abcbiz-cost-est-pack-radio' => 'border-color: {{VALUE}}',
                    ],
                ]
            );

            // active radio color
            $this->add_control(
                'abcbiz_cost_calculator_package_active_radio_color',
                [
                    'label' => esc_html__('Active Button Color', 'abcbiz-addons'),
                    'type' => Controls_Manager::COLOR,
                    'description' => esc_html__('Set the background and border color for the radio button when it is selected (active state).', 'abcbiz-addons'),
                    'default' => '#4CAF50',
                    'selectors' => [
                        '{{WRAPPER}} .abcbiz-pricing-options .abcbiz-pricing-option input[type="radio"]:checked + .abcbiz-cost-est-pack-radio' => 'background-color: {{VALUE}};border-color:{{VALUE}}',
                    ],
                ]
            );

            $this->end_controls_section(); // end package name style section


            // add style section for slider
            $this->start_controls_section(
                'abcbiz_cost_calculator_slider_style',
                [
                    'label' => esc_html__('Range Slider', 'abcbiz-addons'),
                    'tab' => Controls_Manager::TAB_STYLE,
                ]
            );
            // add typography and color
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'abcbiz_cost_calculator_slider_heading_typography',
                    'label' => esc_html__('Heading Typography', 'abcbiz-addons'),
                    'description' => esc_html__('Customize the typography for the main heading of the range slider section.', 'abcbiz-addons'),
                    'selector' => '{{WRAPPER}} .abcbiz-pricing-cal-pages-top h2',
                ]
            );

            //range slider heading
            $this->add_control(
                'abcbiz_cost_calculator_slider_heading_color',
                [
                    'label' => esc_html__('Heading Color', 'abcbiz-addons'),
                    'description' => esc_html__('Set the color for the main heading in the range slider section.', 'abcbiz-addons'),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#666666',
                    'selectors' => [
                        '{{WRAPPER}} .abcbiz-pricing-cal-pages-top h2' => 'color: {{VALUE}}',
                    ],
                ]
            );

            // Add typography settings for the slider's page number display
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'abcbiz_cost_calculator_slider_page_number_typography',
                    'label' => esc_html__('Page Number Typography', 'abcbiz-addons'),
                    'description' => esc_html__('Customize the typography for the page numbers displayed in the range slider section.', 'abcbiz-addons'),
                    'selector' => '{{WRAPPER}} .abcbiz-pricing-cal-pages-top p,{{WRAPPER}} .abcbiz-pricing-cal-range-bottom p',
                ]
            );

            // Add color control for the slider's page number display
            $this->add_control(
                'abcbiz_cost_calculator_slider_page_number_color',
                [
                    'label' => esc_html__('Page Number Color', 'abcbiz-addons'),
                    'type' => Controls_Manager::COLOR,
                    'description' => esc_html__('Set the color for the page numbers in the range slider, including both the top and bottom sections.', 'abcbiz-addons'),
                    'default' => '#666666',
                    'selectors' => [
                        '{{WRAPPER}} .abcbiz-pricing-cal-pages-top p' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .abcbiz-pricing-cal-range-bottom p' => 'color: {{VALUE}}',
                    ],
                ]
            );

            // Add control for the active (filled) slider color
            $this->add_control(
                'slider_active_color',
                [
                    'label' => esc_html__('Slider Active Color', 'abcbiz-addons'),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#0f4fff',  
                    'selectors' => [
                        '{{WRAPPER}} .abcbiz-range-slider' => '--active-color: {{VALUE}};',
                    ],
                ]
            );

            // Add control for the inactive (unfilled) slider color
            $this->add_control(
                'slider_inactive_color',
                [
                    'label' => esc_html__('Slider Inactive Color', 'abcbiz-addons'),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#ddd',  
                    'selectors' => [
                        '{{WRAPPER}} .abcbiz-range-slider' => '--inactive-color: {{VALUE}};',
                    ],
                ]
            );

            // Add control for the thumb color
            $this->add_control(
                'slider_thumb_color',
                [
                    'label' => esc_html__('Slider Thumb Color', 'abcbiz-addons'),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#0f4fff',  
                    'selectors' => [
                        '{{WRAPPER}} .abcbiz-range-slider' => '--thumb-color: {{VALUE}};',
                    ],
                ]
            );


            $this->end_controls_section(); // end range slider style section

            
            // Style section for the button
            $this->start_controls_section(
                'style_button',
                [
                    'label' => esc_html__('Button', 'abcbiz-addons'),
                    'tab' => Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_responsive_control(
                'button_alignment',
                [
                    'label' => esc_html__('Alignment', 'abcbiz-addons'),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => esc_html__('Left', 'abcbiz-addons'),
                            'icon' => 'eicon-text-align-left',
                        ],
                        'center' => [
                            'title' => esc_html__('Center', 'abcbiz-addons'),
                            'icon' => 'eicon-text-align-center',
                        ],
                        'right' => [
                            'title' => esc_html__('Right', 'abcbiz-addons'),
                            'icon' => 'eicon-text-align-right',
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .abcbiz-pricing-cal-submit-button' => 'justify-content: {{VALUE}};',
                    ],
                ]
            );

            
            $this->add_responsive_control(
                'button_width',
                [
                    'label' => esc_html__('Width', 'abcbiz-addons'),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => ['px', 'em', '%'],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 200,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .abcbiz-pricing-cal-submit-button a' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'button_padding',
                [
                    'label' => esc_html__('Padding', 'abcbiz-addons'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', 'em', '%'],
                    'selectors' => [
                        '{{WRAPPER}} .abcbiz-pricing-cal-submit-button a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'button_margin',
                [
                    'label' => esc_html__('Margin', 'abcbiz-addons'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', 'em', '%'],
                    'selectors' => [
                        '{{WRAPPER}} .abcbiz-pricing-cal-submit-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'button_typography',
                    'label' => esc_html__('Typography', 'abcbiz-addons'),
                    'selector' => '{{WRAPPER}} .abcbiz-pricing-cal-submit-button a',
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'button_border',
                    'label' => esc_html__('Border', 'abcbiz-addons'),
                    'selector' => '{{WRAPPER}} .abcbiz-pricing-cal-submit-button a',
                ]
            );

            $this->add_responsive_control(
                'button_border_radius',
                [
                    'label' => esc_html__('Border Radius', 'abcbiz-addons'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .abcbiz-pricing-cal-submit-button a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );


            $this->start_controls_tabs('button_style_tabs');

            $this->start_controls_tab('button_style_normal_tab', [
                'label' => esc_html__('Normal', 'abcbiz-addons'),
            ]);
            $this->add_control(
                'button_text_color',
                [
                    'label' => esc_html__('Text Color', 'abcbiz-addons'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .abcbiz-pricing-cal-submit-button a' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'button_background',
                    'label' => esc_html__('Background', 'abcbiz-addons'),
                    'types' => ['classic', 'gradient'],
                    'selector' => '{{WRAPPER}} .abcbiz-pricing-cal-submit-button a',
                ]
            );
            $this->end_controls_tab();

            $this->start_controls_tab('button_style_hover_tab', [
                'label' => esc_html__('Hover', 'abcbiz-addons'),
            ]);
            
            $this->add_control(
                'button_text_color_hover',
                [
                    'label' => esc_html__('Text Color', 'abcbiz-addons'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .abcbiz-pricing-cal-submit-button a:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'button_background_hover',
                    'label' => esc_html__('Background', 'abcbiz-addons'),
                    'types' => ['classic', 'gradient'],
                    'exclude' => ['image'],
                    'selector' => '{{WRAPPER}} .abcbiz-pricing-cal-submit-button a:hover',
                ]
            );   
            
            $this->add_control(
                'button_border_color_hover',
                [
                    'label' => esc_html__('Border Color', 'abcbiz-addons'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .abcbiz-pricing-cal-submit-button a:hover' => 'border-color: {{VALUE}}',
                    ],
                ]
            );
            

            $this->end_controls_tab();

            $this->end_controls_tabs(); // end button style tabs

            $this->end_controls_section(); // end button style section
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