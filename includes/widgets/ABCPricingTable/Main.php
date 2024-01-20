<?php
namespace ABCBiz\Includes\Widgets\ABCPricingTable;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;


class Main extends BaseWidget
{

    // define protected variables...
    protected $name = 'abcbiz-elementor-pricingtable';
    protected $title = 'ABC Pricing Table';
    protected $icon = 'eicon-price-table abcbiz-multi-icon';
    protected $categories = [
        'abcbiz-category'
    ];


    /**
     * Register the widget controls.
     */
    protected function register_controls()
    {
        $this->start_controls_section(
            'abcbiz_elementor_pricingTable_type_section',
            [
                'label' => esc_html__('Table Type', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        // Pricing table type
        $this->add_control(
            'abcbiz_elementor_pricingTable_type',
            [
                'label' => esc_html__('Table Type', 'abcbiz-multi'),
                'type' => Controls_Manager::SELECT,
                'default' => 'fancy',
                'options' => [
                    'standard' => esc_html__('Standard', 'abcbiz-multi'),
                    'fancy' => esc_html__('Fancy', 'abcbiz-multi'),
                ],
                'description' => esc_html__('Choose the type of the pricing table.', 'abcbiz-multi'),
            ]
        );
        $this->end_controls_section();

        // Start Pricing Table Header
        $this->start_controls_section(
            'abcbiz_elementor_pricingTable_header_section',
            [
                'label' => esc_html__('Pricing Header', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        // Pricing pacakge name
        $this->add_control(
            'abcbiz_elementor_pricingTable_name',
            [
                'label' => esc_html__('Package Name', 'abcbiz-multi'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Basic Plan', 'abcbiz-multi'),
                'label_block' => true,
            ]
        );
        // Pricing package Price
        $this->add_control(
            'abcbiz_elementor_pricingTable_price',
            [
                'label' => esc_html__('Price', 'abcbiz-multi'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('$499', 'abcbiz-multi'),
            ]
        );
        // Pricing package Price period
        $this->add_control(
            'abcbiz_elementor_pricingTable_price_period',
            [
                'label' => esc_html__('Period', 'abcbiz-multi'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('/Monthly', 'abcbiz-multi'),
            ]
        );
        // Pricing package Recommended
        $this->add_control(
            'abcbiz_elementor_pricingTable_recommended',
            [
                'label' => esc_html__('Recommended', 'abcbiz-multi'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'abcbiz-multi'),
                'label_off' => esc_html__('No', 'abcbiz-multi'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        // pacakge recommended position left or top
        $this->add_control(
            'abcbiz_elementor_pricingTable_recommended_position',
            [
                'label' => esc_html__('Recommended Position', 'abcbiz-multi'),
                'type' => Controls_Manager::SELECT,
                'default' => 'top',
                'options' => [
                    'left' => esc_html__('Left', 'abcbiz-multi'),
                    'top' => esc_html__('Top', 'abcbiz-multi'),
                    'custom' => esc_html__('Custom', 'abcbiz-multi'),
                ],
                'condition' => [
                    'abcbiz_elementor_pricingTable_recommended' => 'yes',
                ],
            ]
        );
        // pacakge recommended custom position left
        $this->add_responsive_control(
            'abcbiz_elementor_pricingTable_recommended_custom_position_left',
            [
                'label' => esc_html__('Custom Position Left', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => -200,
                        'max' => 200,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -50,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ep-recommended-left.abcbiz-ele-pricing-recommended' => 'left: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'abcbiz_elementor_pricingTable_recommended' => 'yes',
                    'abcbiz_elementor_pricingTable_recommended_position' => 'custom',
                ],
            ]
        );
        // pacakge recommended custom position top
        $this->add_responsive_control(
            'abcbiz_elementor_pricingTable_recommended_custom_position_top',
            [
                'label' => esc_html__('Custom Position Top', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => -200,
                        'max' => 200,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -50,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ep-recommended-left.abcbiz-ele-pricing-recommended' => 'top: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'abcbiz_elementor_pricingTable_recommended' => 'yes',
                    'abcbiz_elementor_pricingTable_recommended_position' => 'custom',
                ],
            ]
        );
        // pacakge recommended text
        $this->add_control(
            'abcbiz_elementor_pricingTable_recommended_text',
            [
                'label' => esc_html__('Recommended Text', 'abcbiz-multi'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Recommended', 'abcbiz-multi'),
                'condition' => [
                    'abcbiz_elementor_pricingTable_recommended' => 'yes',
                ],
            ]
        );

        // show/hide header stock shape
        $this->add_control(
            'abcbiz_elementor_pricingTable_header_stock_shape',
            [
                'label' => esc_html__('Shape', 'abcbiz-multi'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'abcbiz-multi'),
                'label_off' => esc_html__('Hide', 'abcbiz-multi'),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'abcbiz_elementor_pricingTable_type' => 'fancy',
                ]
            ]
        );

        // end of Pricing header section
        $this->end_controls_section();

        // start of Pricing body section
        $this->start_controls_section(
            'abcbiz_elementor_pricingTable_body_section',
            [
                'label' => esc_html__('Package Features', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        // Pricing body features list
        $repeater = new \Elementor\Repeater();

        // feature text
        $repeater->add_control(
            'abcbiz_elementor_pricingTable_feature_text',
            [
                'label' => esc_html__('Text', 'abcbiz-multi'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__('5GB Disk Space', 'abcbiz-multi'),
                'label_block' => true,
            ],
        );
        // feature icon
        $repeater->add_control(
            'abcbiz_elementor_pricingTable_feature_icon',
            [
                'label' => esc_html__('Icon', 'abcbiz-multi'),
                'type' => Controls_Manager::ICONS,
            ],
        );
        // icon color
        $repeater->add_control(
            'abcbiz_elementor_pricingTable_feature_icon_color',
            [
                'label' => esc_html__('Icon Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pricing-table-body ul {{CURRENT_ITEM}} i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .abcbiz-ele-pricing-table-body ul {{CURRENT_ITEM}} svg path' => 'fill: {{VALUE}}',
                ],
            ],
        );
        // Feature list
        $this->add_control(
            'abc_pricingTable_features_list',
            [
                'label' => esc_html__('Features List', 'abcbiz-multi'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'abcbiz_elementor_pricingTable_feature_text' => esc_html__('Title #1', 'abcbiz-multi'),
                    ],
                    [
                        'abcbiz_elementor_pricingTable_feature_text' => esc_html__('Title #2', 'abcbiz-multi'),
                    ],
                ],
                'title_field' => '{{{ abcbiz_elementor_pricingTable_feature_text }}}',
            ]
        );

        // end of Pricing body section
        $this->end_controls_section();

        // start of Pricing footer section
        $this->start_controls_section(
            'abcbiz_elementor_pricingTable_footer_section',
            [
                'label' => esc_html__('Button', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        // Pricing footer button text
        $this->add_control(
            'abcbiz_elementor_pricingTable_button_text',
            [
                'label' => esc_html__('Button Text', 'abcbiz-multi'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Purchase Now', 'abcbiz-multi'),
                'label_block' => true,
            ]
        );
        // Pricing footer button link
        $this->add_control(
            'abcbiz_elementor_pricingTable_button_link',
            [
                'label' => esc_html__('Button Link', 'abcbiz-multi'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'abcbiz-multi'),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        // pricing button icon
        $this->add_control(
            'abcbiz_elementor_pricingTable_button_icon',
            [
                'label' => esc_html__('Button Icon', 'abcbiz-multi'),
                'type' => Controls_Manager::ICONS,                
            ]
        );

        // end of Pricing footer section
        $this->end_controls_section();


        // start of Pricing table box full area style section
        $this->start_controls_section(
            'abcbiz_elementor_pricingTable_box_style_section',
            [
                'label' => esc_html__('Box', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        // box normal and hover
        $this->start_controls_tabs(
            'abcbiz_elementor_pricingTable_box_style_tabs'
        );
        // Normal Tab
        $this->start_controls_tab(
            'abcbiz_elementor_pricingTable_tab_normal',
            [
                'label' => esc_html__('Normal', 'abcbiz-multi'),
            ]
        );

        // box background
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'abcbiz_elementor_pricingTable_box_bg',
                'types' => ['classic', 'gradient'],
                'label' => esc_html__('Background', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-ele-pricing-table-area',
            ]
        );
        // pricing table box border
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'abcbiz_elementor_pricingTable_box_border',
                'selector' => '{{WRAPPER}} .abcbiz-ele-pricing-table-area',
            ]
        );

        // pricing table box border radius
        $this->add_responsive_control(
            'abcbiz_elementor_pricingTable_box_border_radius',
            [
                'label' => esc_html__('Border Radius', 'abcbiz-multi'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pricing-table-area' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',                    
                ],
            ]
        );

        $this->end_controls_tab();

        // Hover Tab
        $this->start_controls_tab(
            'abcbiz_elementor_pricingTable_tab_hover',
            [
                'label' => esc_html__('Hover', 'abcbiz-multi'),
            ]
        );

        // box background
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'abcbiz_elementor_pricingTable_box_hover_bg',
                'types' => ['classic', 'gradient'],
                'label' => esc_html__('Background', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-ele-pricing-table-area:hover',
            ]
        );
        // pricing table box border hover color
        $this->add_control(
            'abcbiz_elementor_pricingTable_hover_border_color',
            [
                'label' => esc_html__('Border Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pricing-table-area:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab(); // end of hover tab

        $this->end_controls_tabs(); // end of box normal and hover

        $this->end_controls_section();
        // end of Pricing table box full area style section


        // start of Pricing table header style section
        $this->start_controls_section(
            'abcbiz_elementor_pricingTable_header_style_section',
            [
                'label' => esc_html__('Header', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        // pacakge price typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_pricingTable_price_typography',
                'label' => esc_html__('Price Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-ele-pricing-pack-preiod h3',
            ]
        );
        // pacakge price period typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_pricingTable_price_period_typography',
                'label' => esc_html__('Period Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-ele-pricing-pack-preiod h3 sub',
            ]
        );
        // pacakge recommended typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_pricingTable_recommended_typography',
                'label' => esc_html__('Recommended Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-ele-pricing-recommended span',
                'condition' => [
                    'abcbiz_elementor_pricingTable_recommended' => 'yes',
                ],
            ]
        );
        // Slider control for border bottom width
        $this->add_responsive_control(
            'abcbiz_elementor_pricingTable_header_border_bottom',
            [
                'label' => esc_html__('Border Bottom Width', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'default' => [
                    'unit' => 'px',
                    'size' => 10,
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 20,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pricing-table-type-standard .abcbiz-ele-pricing-table-header-area' => 'border-bottom-width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'abcbiz_elementor_pricingTable_type' => 'standard',
                ]
            ]
        );
        // Border color control for the pricing table header area
        $this->add_control(
            'abcbiz_elementor_pricingTable_header_border_color',
            [
                'label' => esc_html__('Border Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#FE4D05',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pricing-table-area .abcbiz-ele-pricing-table-header-area' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'abcbiz_elementor_pricingTable_type' => 'standard',
                ],
            ]
        );
        // Border radius control for the pricing table header area
        $this->add_control(
            'abcbiz_elementor_pricingTable_header_border_radius',
            [
                'label' => esc_html__('Border Radius', 'abcbiz-multi'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pricing-table-area .abcbiz-ele-pricing-table-header-area' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .abcbiz-ele-pricing-table-area .abcbiz-ele-pricing-table-header svg' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        // header normal and hover
        $this->start_controls_tabs(
            'abcbiz_elementor_pricingTable_header_style_tabs'
        );
        // header normal tab
        $this->start_controls_tab(
            'abc_ele_pricingTable_header_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'abcbiz-multi'),
            ]
        );
        // header normal background color
        $this->add_control(
            'abcbiz_elementor_pricingTable_header_normal_bg_color',
            [
                'label' => esc_html__('Background Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#448E08',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pricing-header-bg svg path' => 'fill: {{VALUE}};',
                    '{{WRAPPER}} .abcbiz-ele-pricing-table-type-standard .abcbiz-ele-pricing-table-header-area' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        //header normal stroke color
        $this->add_control(
            'abcbiz_elementor_pricingTable_header_normal_stroke_color',
            [
                'label' => esc_html__('Shape Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#FD5009',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pricing-header-strock svg path' => 'fill: {{VALUE}};',
                ],
                'condition' => [
                    'abcbiz_elementor_pricingTable_type' => 'fancy',
                ],
            ]
        );

        // pacakge price color
        $this->add_control(
            'abcbiz_elementor_pricingTable_price_color',
            [
                'label' => esc_html__('Price Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pricing-pack-preiod h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        // pacakge price period color
        $this->add_control(
            'abcbiz_elementor_pricingTable_price_period_color',
            [
                'label' => esc_html__('Period Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pricing-pack-preiod h3 sub' => 'color: {{VALUE}};',
                ],
            ]
        );
        // pacakge recommended color
        $this->add_control(
            'abcbiz_elementor_pricingTable_recommended_color',
            [
                'label' => esc_html__('Recommended Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pricing-recommended span' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'abcbiz_elementor_pricingTable_recommended' => 'yes',
                ],
            ]
        );
        // pacakge recommended background color
        $this->add_control(
            'abcbiz_elementor_pricingTable_recommended_bg_color',
            [
                'label' => esc_html__('Recommended Background Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pricing-recommended span' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .abcbiz-ele-pricing-recommended:before' => 'border-bottom-color: {{VALUE}};',
                    '{{WRAPPER}} .abcbiz-ep-recommended-left.abcbiz-ele-pricing-recommended:after' => 'border-left-color: {{VALUE}};',
                ],
                'condition' => [
                    'abcbiz_elementor_pricingTable_recommended' => 'yes',
                ],
            ]
        );



        $this->end_controls_tab(); // end of header normal tab

        // header hover tab
        $this->start_controls_tab(
            'abc_ele_pricingTable_header_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'abcbiz-multi'),
            ]
        );
        // hover Border color control for the pricing table header area
        $this->add_control(
            'abcbiz_elementor_pricingTable_header_hover_border_color',
            [
                'label' => esc_html__('Border Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#448E08',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pricing-table-area:hover .abcbiz-ele-pricing-table-header-area' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'abcbiz_elementor_pricingTable_type' => 'standard',
                ]
            ]
        );
        // header hover background color
        $this->add_control(
            'abcbiz_elementor_pricingTable_header_hover_bg_color',
            [
                'label' => esc_html__('Background Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#FE4D05',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pricing-table-area:hover .abcbiz-ele-pricing-header-bg svg path' => 'fill: {{VALUE}};',
                    '{{WRAPPER}} .abcbiz-ele-pricing-table-type-standard.abcbiz-ele-pricing-table-area:hover .abcbiz-ele-pricing-table-header-area' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        //header hover stroke color
        $this->add_control(
            'abcbiz_elementor_pricingTable_header_hover_stroke_color',
            [
                'label' => esc_html__('Shape Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pricing-table-area:hover .abcbiz-ele-pricing-header-strock svg path' => 'fill: {{VALUE}};',
                ],
                'condition' => [
                    'abcbiz_elementor_pricingTable_type' => 'fancy',
                ],
            ]
        );
        // pacakge price hover color
        $this->add_control(
            'abcbiz_elementor_pricingTable_price_hover_color',
            [
                'label' => esc_html__('Price Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pricing-table-area:hover .abcbiz-ele-pricing-pack-preiod h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        // pacakge price period hover color
        $this->add_control(
            'abcbiz_elementor_pricingTable_price_period_hover_color',
            [
                'label' => esc_html__('Period Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pricing-table-area:hover .abcbiz-ele-pricing-pack-preiod h3 sub' => 'color: {{VALUE}};',
                ],
            ]
        );
        // pacakge recommended hover color
        $this->add_control(
            'abcbiz_elementor_pricingTable_recommended_hover_color',
            [
                'label' => esc_html__('Recommended Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pricing-table-area:hover .abcbiz-ele-pricing-recommended span' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'abcbiz_elementor_pricingTable_recommended' => 'yes',
                ],
            ]
        );
        // pacakge recommended hover background color
        $this->add_control(
            'abcbiz_elementor_pricingTable_recommended_hover_bg_color',
            [
                'label' => esc_html__('Recommended Background Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pricing-table-area:hover .abcbiz-ele-pricing-recommended span' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .abcbiz-ele-pricing-table-area:hover .abcbiz-ele-pricing-recommended:before' => 'border-bottom-color: {{VALUE}};',
                    '{{WRAPPER}} .abcbiz-ele-pricing-table-area:hover .abcbiz-ep-recommended-left.abcbiz-ele-pricing-recommended:after' => 'border-left-color: {{VALUE}};',
                ],
                'condition' => [
                    'abcbiz_elementor_pricingTable_recommended' => 'yes',
                ],
            ]
        );
        // end of header hover tab

        $this->end_controls_tab(); // end of header hover tab

        $this->end_controls_tabs(); // end of tabs for header

        //header spacing heading
        $this->add_control(
            'abcbiz_elementor_pricingTable_header_spacing_heading',
            [
                'label' => esc_html__('Spacing', 'abcbiz-multi'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        // pacakge price period top spacing
        $this->add_responsive_control(
            'abcbiz_elementor_pricingTable_price_period_top_spacing',
            [
                'label' => esc_html__('Pricing Period Top', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'default' => [
                    'size' => 110,
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 300,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pricing-pack-preiod' => 'top: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'abcbiz_elementor_pricingTable_type' => 'fancy',
                ],
            ]
        );
        // Package header padding top
        $this->add_responsive_control(
            'abcbiz_elementor_pricingTable_header_padding_top',
            [
                'label' => esc_html__('Top Specing', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],   
                'default' => [
                    'size' => 50,
                    'unit' => 'px',
                ],          
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pricing-table-type-standard .abcbiz-ele-pricing-pack-preiod' => 'padding-top: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'abcbiz_elementor_pricingTable_type' => 'standard',
                ]
            ]
        );        
        // Package header padding bottom
        $this->add_responsive_control(
            'abcbiz_elementor_pricingTable_header_padding_bottom',
            [
                'label' => esc_html__('Bottom Specing', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,                
                'default' => [
                    'size' => 50,
                    'unit' => 'px',                   
                ],
                'size_units' => ['px', '%'],              
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pricing-table-type-standard .abcbiz-ele-pricing-pack-preiod' => 'padding-bottom: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'abcbiz_elementor_pricingTable_type' => 'standard',
                ]
            ]
        );
        // pacakge header stock shap top spacing
        $this->add_responsive_control(
            'abcbiz_elementor_pricingTable_header_stock_shap_top_spacing',
            [
                'label' => esc_html__('Shape Top', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'default' => [
                    'size' => -124,
                ],
                'range' => [
                    'px' => [
                        'min' => -400,
                        'max' => 300,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pricing-header-strock' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'abcbiz_elementor_pricingTable_header_stock_shape' => 'yes',
                ],
            ]
        );


        //end of the header section
        $this->end_controls_section();

        // start of pricing table name style section
        $this->start_controls_section(
            'abcbiz_elementor_pricingTable_name_style_section',
            [
                'label' => esc_html__('Name', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        // pacakge name width
        $this->add_responsive_control(
            'abcbiz_elementor_pricingTable_name_width',
            [
                'label' => esc_html__('Width', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 300,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pricing-pack-name' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        // pacakge name height
        $this->add_responsive_control(
            'abcbiz_elementor_pricingTable_name_height',
            [
                'label' => esc_html__('Height', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 300,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pricing-pack-name' => 'height: {{SIZE}}{{UNIT}};min-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        // pacakge name typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_pricingTable_name_typography',
                'label' => esc_html__('Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-ele-pricing-pack-name h3',
            ]
        );

        // pacakge name normal/hover tabs
        $this->start_controls_tabs(
            'abcbiz_elementor_pricingTable_name_style_tabs'
        );
        // pacakge name normal tab
        $this->start_controls_tab(
            'abc_ele_pricingTable_name_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'abcbiz-multi'),
            ]
        );

        // pacakge name color
        $this->add_control(
            'abcbiz_elementor_pricingTable_name_color',
            [
                'label' => esc_html__('Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pricing-pack-name h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        // pacakge name background color
        $this->add_control(
            'abcbiz_elementor_pricingTable_name_bg_color',
            [
                'label' => esc_html__('Background Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pricing-pack-name' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab(); // end of pacakge name normal tab

        // pacakge name hover tab
        $this->start_controls_tab(
            'abc_ele_pricingTable_name_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'abcbiz-multi'),
            ]
        );

        // pacakge name hover color
        $this->add_control(
            'abcbiz_elementor_pricingTable_name_hover_color',
            [
                'label' => esc_html__('Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pricing-table-area:hover .abcbiz-ele-pricing-pack-name h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        // pacakge name hover background color
        $this->add_control(
            'abcbiz_elementor_pricingTable_name_hover_bg_color',
            [
                'label' => esc_html__('Background', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pricing-table-area:hover .abcbiz-ele-pricing-pack-name' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab(); // end of pacakge name hover tab

        $this->end_controls_tabs(); // end of pacakge name tabs

        // end of Pricing table name style section
        $this->end_controls_section();

        // start of Pricing table body style section
        $this->start_controls_section(
            'abcbiz_elementor_pricingTable_body_style_section',
            [
                'label' => esc_html__('Features', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'abcbiz_elementor_pricingTable_top_content_spacing',
            [
                'label' => esc_html__('Top Spacing', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 10,
                        'step' => 0.1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 40,              
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pricing-table-type-standard .abcbiz-ele-pricing-table-body' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'abcbiz_elementor_pricingTable_type' => 'standard',
                ],
            ]
        );
        // pacakge features typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_pricingTable_features_typography',
                'label' => esc_html__('Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-ele-pricing-table-body ul li',
            ]
        );
        // pacakge features color
        $this->add_control(
            'abcbiz_elementor_pricingTable_features_color',
            [
                'label' => esc_html__('Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#181818',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pricing-table-body ul li' => 'color: {{VALUE}};',
                ],
            ]
        );
        // pacakge features icon color
        $this->add_control(
            'abcbiz_elementor_pricingTable_features_icon_color',
            [
                'label' => esc_html__('Icon Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#448E08',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pricing-table-body ul i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .abcbiz-ele-pricing-table-body ul svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );
        // features list spacing/gap
        $this->add_responsive_control(
            'abcbiz_elementor_pricingTable_features_list_spacing',
            [
                'label' => esc_html__('Gap Between', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'default' => [
                    'size' => 20,
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pricing-table-body ul' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        // feature icon size
        $this->add_responsive_control(
            'abcbiz_elementor_pricingTable_feature_icon_size',
            [
                'label' => esc_html__('Icon Size', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'default' => [
                    'size' => 18,
                ],
                'range' => [
                    'px' => [
                        'min' => 5,
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pricing-table-body ul i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .abcbiz-ele-pricing-table-body ul svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        // feature icon spacing
        $this->add_responsive_control(
            'abcbiz_elementor_pricingTable_feature_icon_spacing',
            [
                'label' => esc_html__('Icon Spacing', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'default' => [
                    'size' => 5,
                ],
                'range' => [
                    'px' => [
                        'min' => 5,
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pricing-table-body ul i' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .abcbiz-ele-pricing-table-body ul svg' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        //feature icon position
        $this->add_responsive_control(
            'abcbiz_elementor_pricingTable_feature_icon_position',
            [
                'label' => esc_html__('Icon Position', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'default' => [
                    'size' => 5,
                ],
                'range' => [
                    'px' => [
                        'min' => -50,
                        'max' => 50,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pricing-table-body ul i' => 'top: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .abcbiz-ele-pricing-table-body ul svg' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // end of Pricing table body style section
        $this->end_controls_section();

        // start of Pricing table footer style section
        $this->start_controls_section(
            'abcbiz_elementor_pricingTable_footer_style_section',
            [
                'label' => esc_html__('Button', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        // pacakge button typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_pricingTable_button_typography',
                'label' => esc_html__('Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-ele-pricing-table-footer a',
            ]
        );
        // package button padding
        $this->add_responsive_control(
            'abcbiz_elementor_pricingTable_button_padding',
            [
                'label' => esc_html__('Padding', 'abcbiz-multi'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pricing-table-footer a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ]
        );
        // pacakge button border radius
        $this->add_responsive_control(
            'abcbiz_elementor_pricingTable_button_border_radius',
            [
                'label' => esc_html__('Border Radius', 'abcbiz-multi'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'default' => [
                    'top' => 5,
                    'right' => 5,
                    'bottom' => 5,
                    'left' => 5,
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pricing-table-footer a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ]
        );
        // button width
        $this->add_responsive_control(
            'abcbiz_elementor_pricingTable_button_width',
            [
                'label' => esc_html__('Button Width', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'default' => [
                    'unit' => '%',
                    'size' => 80,
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 300,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pricing-table-footer a' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        // button icon size
        $this->add_responsive_control(
            'abcbiz_elementor_pricingTable_feature_btn_size',
            [
                'label' => esc_html__('Icon Size', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'default' => [
                    'unit' => 'px',
                    'size' => 15,
                ],
                'range' => [
                    'px' => [
                        'min' => 5,
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pricing-table-footer a i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .abcbiz-ele-pricing-table-footer a svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        // pricing button icon space
        $this->add_responsive_control(
            'abcbiz_elementor_pricingTable_button_icon_space',
            [
                'label' => esc_html__('Icon Space', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'default' => [
                    'unit' => 'px',
                    'size' => 10,
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pricing-table-footer a' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        // pacakge button tab normal and hover
        $this->start_controls_tabs(
            'abcbiz_elementor_pricingTable_button_style_tabs'
        );
        // pacakge button normal tab
        $this->start_controls_tab(
            'abc_ele_pricingTable_button_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'abcbiz-multi'),
            ]
        );
        // pacakge button normal color
        $this->add_control(
            'abcbiz_elementor_pricingTable_button_normal_color',
            [
                'label' => esc_html__('Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pricing-table-footer a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .abcbiz-ele-pricing-table-footer a i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .abcbiz-ele-pricing-table-footer a svg' => 'fill: {{VALUE}};',
                ],
            ]
        );
        // pacakge button normal background color
        $this->add_control(
            'abcbiz_elementor_pricingTable_button_normal_bg_color',
            [
                'label' => esc_html__('Background Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#448E08',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pricing-table-footer a' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        // pacakge button border
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'abcbiz_elementor_pricingTable_button_border',
                'selector' => '{{WRAPPER}} .abcbiz-ele-pricing-table-footer a',
            ]
        );
        // end of pacakge button normal tab
        $this->end_controls_tab();
        // pacakge button hover tab
        $this->start_controls_tab(
            'abc_ele_pricingTable_button_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'abcbiz-multi'),
            ]
        );
        // pacakge button hover color
        $this->add_control(
            'abcbiz_elementor_pricingTable_button_hover_color',
            [
                'label' => esc_html__('Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pricing-table-area:hover .abcbiz-ele-pricing-table-footer a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .abcbiz-ele-pricing-table-area:hover .abcbiz-ele-pricing-table-footer a i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .abcbiz-ele-pricing-table-area:hover .abcbiz-ele-pricing-table-footer a fill' => 'fill: {{VALUE}};',
                ],
            ]
        );
        // pacakge button hover background color
        $this->add_control(
            'abcbiz_elementor_pricingTable_button_hover_bg_color',
            [
                'label' => esc_html__('Background Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#FE4D05',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pricing-table-area:hover .abcbiz-ele-pricing-table-footer a' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        // pacakge button hover border color
        $this->add_control(
            'abcbiz_elementor_pricingTable_button_hover_border_color',
            [
                'label' => esc_html__('Border Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pricing-table-area:hover .abcbiz-ele-pricing-table-footer a' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        // end of pacakge button hover tab
        $this->end_controls_tab();
        // end of pacakge button tabs
        $this->end_controls_tabs();
        // end of pacakge button style section
        $this->end_controls_section();
    }

    /**
     * Render the widget output on the frontend.
     */
    protected function render()

    {
    
        include 'RenderView.php';
    }
}
