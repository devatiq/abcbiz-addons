<?php
namespace ABCBiz\Includes\Widgets\ABCCTA;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;

class Main extends BaseWidget
{
    // define protected variables...
    protected $name = 'abcbiz-cta';
    protected $title = 'ABC Call To Action';
    protected $icon = 'eicon-image-rollover';
    protected $categories = [
        'abcbiz-category'
    ];

    protected $keywords = [
        'abc', 'cta', 'call to action', 'call',
    ];


    /**
     * Register the widget controls.
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'abcbiz_elementor_cta_setting',
            [
                'label' => esc_html__('Contents', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        // Sub Heading Control
        $this->add_control(
            'abcbiz_cta_sub_heading',
            [
                'label' => esc_html__('Sub Heading', 'abcbiz-multi'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__('Type your sub heading here', 'abcbiz-multi'),
                'label_block' => true,
            ]
        );

        // Heading Control
        $this->add_control(
            'abcbiz_cta_heading',
            [
                'label' => esc_html__('Heading', 'abcbiz-multi'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Let\'s deliver the right solution for your', 'abcbiz-multi'),
                'placeholder' => esc_html__('Type your heading here', 'abcbiz-multi'),
                'label_block' => true,
            ]
        );

        // Description Control
        $this->add_control(
            'abcbiz_cta_description',
            [
                'label' => esc_html__('Description', 'abcbiz-multi'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('onsectetur adipiscing elit pellentesque habitant morbi tristique senectus. Vestibulum mattis
                velit sed ullamcorper morbi. At erat  pellentesque.', 'abcbiz-multi'),
                'placeholder' => esc_html__('Type your description here', 'abcbiz-multi'),
                'label_block' => true,
            ]
        );

        // First Button text
        $this->add_control(
            'abcbiz_cta_button_text_one',
            [
                'label' => esc_html__('Button 1 Text', 'abcbiz-multi'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Get Started', 'abcbiz-multi'),
                'placeholder' => esc_html__('Type your button text here', 'abcbiz-multi'),
                'label_block' => true,
            ]
        );
        // First Button Link
        $this->add_control(
            'abcbiz_cta_button_link_one',
            [
                'label' => esc_html__('Button 1 Link', 'abcbiz-multi'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'abcbiz-multi'),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false,
                ],
            ]
        );

        // Second Button text
        $this->add_control(
            'abcbiz_cta_button_text_two',
            [
                'label' => esc_html__('Button 2 Text', 'abcbiz-multi'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Contact Us', 'abcbiz-multi'),
                'placeholder' => esc_html__('Type your button text here', 'abcbiz-multi'),
                'label_block' => true,
            ]
        );

        // Second Button Link
        $this->add_control(
            'abcbiz_cta_button_link_two',
            [
                'label' => esc_html__('Button 2 Link', 'abcbiz-multi'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'abcbiz-multi'),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false,
                ],
            ]
        );
        $this->end_controls_section(); // End Section

        // Start Section for Alignment
        $this->start_controls_section(
            'abcbiz_elementor_cta_alignment',
            [
                'label' => esc_html__('Alignment', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_CONTENT,                
            ]
        );
        // Content Direction
        $this->add_responsive_control(
            'abcbiz_cta_content_direction',
            [
                'label' => esc_html__('Content Direction', 'abcbiz-multi'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'row' => [
                        'title' => esc_html__('Row', 'abcbiz-multi'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'row-reverse' => [
                        'title' => esc_html__('Row Reverse', 'abcbiz-multi'),
                        'icon' => 'eicon-h-align-right',
                    ],
                    'column' => [
                        'title' => esc_html__('Column', 'abcbiz-multi'),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'column-reverse' => [
                        'title' => esc_html__('Column Reverse', 'abcbiz-multi'),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-cta-area' => 'flex-direction: {{VALUE}};',
                ],
            ]
        );

        // Justify Content Control
        $this->add_responsive_control(
            'abcbiz_cta_area_justify_content',
            [
                'label' => esc_html__('Justify Content', 'abcbiz-multi'),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => true,
                'options' => [
                    'flex-start' => [
                        'title' => esc_html__('Start', 'abcbiz-multi'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'abcbiz-multi'),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'flex-end' => [
                        'title' => esc_html__('End', 'abcbiz-multi'),
                        'icon' => 'eicon-h-align-right',
                    ],
                    'space-between' => [
                        'title' => esc_html__('Space Between', 'abcbiz-multi'),
                        'icon' => 'eicon-flex eicon-justify-space-between-h',
                    ],
                    'space-around' => [
                        'title' => esc_html__('Space Around', 'abcbiz-multi'),
                        'icon' => 'eicon-flex eicon-justify-space-around-h',
                    ],
                    'space-evenly' => [
                        'title' => esc_html__('Space Evenly', 'abcbiz-multi'),
                        'icon' => 'eicon-flex eicon-justify-space-evenly-h',
                    ],
                ],                
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-cta-area' => 'justify-content: {{VALUE}};',
                ],
                'condition' => [
                    'abcbiz_cta_content_direction' => ['row', 'row-reverse'],
                ],
            ]
        );

        // Align Items Control for row
        $this->add_responsive_control(
            'abcbiz_cta_area_align_items_row',
            [
                'label' => esc_html__('Align Items', 'abcbiz-multi'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'flex-start' => [
                        'title' => esc_html__('Start', 'abcbiz-multi'),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'abcbiz-multi'),
                        'icon' => 'eicon-v-align-middle',
                    ],
                    'flex-end' => [
                        'title' => esc_html__('End', 'abcbiz-multi'),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],                
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-cta-area' => 'align-items: {{VALUE}};',
                ],
                'condition' => [
                    'abcbiz_cta_content_direction' => ['row', 'row-reverse'],
                ],
            ]
        );

        // Align Items Control for coumn
        $this->add_responsive_control(
            'abcbiz_cta_area_align_items_column',
            [
                'label' => esc_html__('Align Items', 'abcbiz-multi'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'flex-start' => [
                        'title' => esc_html__('Start', 'abcbiz-multi'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'abcbiz-multi'),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'flex-end' => [
                        'title' => esc_html__('End', 'abcbiz-multi'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],                
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-cta-area' => 'align-items: {{VALUE}};',
                ],
                'condition' => [
                    'abcbiz_cta_content_direction' => ['column', 'column-reverse'],
                ],
            ]
        );

        // CTA Area Gap between content and button
        $this->add_responsive_control(
            'abcbiz_cta_area_gap',
            [
                'label' => esc_html__('Gap Between Content/Button', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
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
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-cta-area' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // button direction
        $this->add_responsive_control(
            'abcbiz_cta_button_direction',
            [
                'label' => esc_html__('Button Direction', 'abcbiz-multi'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'row' => [
                        'title' => esc_html__('Row (Horizontal)', 'abcbiz-multi'),
                        'icon' => 'eicon-arrow-right',
                    ],
                    'column' => [
                        'title' => esc_html__('Column (Vertical)', 'abcbiz-multi'),
                        'icon' => 'eicon-arrow-down',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-cta-area .abcbiz-cta-button-area' => 'flex-direction: {{VALUE}};',
                ]
            ]
        );
        //button gap
        $this->add_responsive_control(
            'abcbiz_cta_button_gap',
            [
                'label' => esc_html__('Button Gap', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],                    
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-cta-area .abcbiz-cta-button-area' => 'gap: {{SIZE}}{{UNIT}};',
                ]
            ]
        );
       
		$this->end_controls_section();

        // Ribbon Section
        $this->start_controls_section(
            'abcbiz_cta_ribbon_section',
            [
                'label' => esc_html__('Ribbon', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        // Rabbon Switch
        $this->add_control(
            'abcbiz_cta_ribbon_enable',
            [
                'label' => esc_html__('Enable Ribbon', 'abcbiz-multi'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'abcbiz-multi'),
                'label_off' => esc_html__('No', 'abcbiz-multi'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        // Rabbon Text
        $this->add_control(
            'abcbiz_cta_ribbon_text',
            [
                'label' => esc_html__('Ribbon Text', 'abcbiz-multi'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Most popular', 'abcbiz-multi'),
                'placeholder' => esc_html__('Type your ribbon text', 'abcbiz-multi'),
                'label_block' => true,
                'condition' => [
                    'abcbiz_cta_ribbon_enable' => 'yes',
                ],
            ]
        );

        // Rabbon Position 
        $this->add_control(
            'abcbiz_cta_ribbon_position',
            [
                'label' => esc_html__('Ribbon Position', 'abcbiz-multi'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'abcbiz-multi'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'abcbiz-multi'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'right',
                'toggle' => true,
                'condition' => [
                    'abcbiz_cta_ribbon_enable' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        // Start Style Tab
        $this->start_controls_section(
            'abcbiz_cta_style_section',
            [
                'label' => esc_html__('Style', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        // Box Padding
        $this->add_responsive_control(
            'abcbiz_cta_box_padding',
            [
                'label' => esc_html__('Padding', 'abcbiz-multi'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-cta-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // Box Background Normal
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'abcbiz_cta_box_background_normal',
                'label' => esc_html__('Box Background', 'abcbiz-multi'),
                'types' => ['classic', 'gradient'],                
                'selector' => '{{WRAPPER}} .abcbiz-cta-area:before',
                'fields_options' => [
					'background' => [
						'label' => esc_html_x( 'Box Background', 'abcbiz-multi' ),
					]
				]
            ]
        );

        // Zoom Effect Disable Field
        $this->add_control(
            'abcbiz_cta_zoom_effect_disable',
            [
                'label' => esc_html__('Disable Zoom Effect', 'abcbiz-multi'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'abcbiz-multi'),
                'label_off' => esc_html__('No', 'abcbiz-multi'),
                'return_value' => 'yes',
                'default' => 'no',               
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'abcbiz_cta_box_border',
                'label' => esc_html__('Box Border', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-cta-area',               
            ]
        );
        $this->add_control(
            'abcbiz_cta_box_border_radius',
            [
                'label' => esc_html__('Border Radius', 'abcbiz-multi'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-cta-area' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // Sub Heading typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_cta_sub_heading_typography',
                'label' => esc_html__('Sub Heading Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-cta-content-area .abcbiz-cta-heading h4',                 
            ]
        );
        // Sub Heading Color
        $this->add_control(
            'abcbiz_cta_sub_heading_color',
            [
                'label' => esc_html__('Sub Heading Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-cta-content-area .abcbiz-cta-heading h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        // Sub Heading Bottom Spacing
        $this->add_responsive_control(
            'abcbiz_cta_sub_heading_spacing',
            [
                'label' => esc_html__('Sub Heading Bottom Spacing', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'size_units' => ['px', '%'],
                'default' => [
                    'unit' => 'px',
                    'size' => 10,
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-cta-content-area .abcbiz-cta-heading h4' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Heading typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_cta_heading_typography',
                'label' => esc_html__('Heading Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-cta-content-area .abcbiz-cta-heading h2', 
            ]
        );

        // Heading Color
        $this->add_control(
            'abcbiz_cta_heading_color',
            [
                'label' => esc_html__('Heading Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-cta-content-area .abcbiz-cta-heading h2' => 'color: {{VALUE}};', 
                ],
            ]
        );

        // Heading Bottom Spacing
        $this->add_responsive_control(
            'abcbiz_cta_heading_bottom_spacing',
            [
                'label' => esc_html__('Heading Bottom Spacing', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 5,
                        'step' => 0.1,
                    ],
                ],
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-cta-content-area .abcbiz-cta-heading h2' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Description typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_cta_description_typography',
                'label' => esc_html__('Description Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-cta-content-area .abcbiz-cta-description p, {{WRAPPER}} .abcbiz-cta-content-area .abcbiz-cta-description', 
            ]
        );

        // Description Color
        $this->add_control(
            'abcbiz_cta_description_color',
            [
                'label' => esc_html__('Description Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-cta-content-area .abcbiz-cta-description p' => 'color: {{VALUE}};', 
                    '{{WRAPPER}} .abcbiz-cta-content-area .abcbiz-cta-description' => 'color: {{VALUE}};', 
                ],
            ]
        );

        // Description Bottom Spacing
        $this->add_responsive_control(
            'abcbiz_cta_description_bottom_spacing',
            [
                'label' => esc_html__('Description Bottom Spacing', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 5,
                        'step' => 0.1,
                    ],
                ],
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-cta-content-area .abcbiz-cta-description' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ],
        );
        // Content Alignment Control
        $this->add_control(
            'abcbiz_cta_content_alignment',
            [
                'label' => esc_html__('Content Alignment', 'abcbiz-multi'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'abcbiz-multi'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'abcbiz-multi'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'abcbiz-multi'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-cta-content-area .abcbiz-cta-heading' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .abcbiz-cta-content-area .abcbiz-cta-description' => 'text-align: {{VALUE}};',
                ],
                'toggle' => true,
            ]
        );

        //end the style tab
        $this->end_controls_section();


        // Button Style
        $this->start_controls_section(
            'abcbiz_cta_button_style_section',
            [
                'label' => esc_html__('Button', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        // Button Width
        $this->add_responsive_control(
            'abcbiz_cta_button_width',
            [
                'label' => esc_html__('Width', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
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
                    'em' => [
                        'min' => 0,
                        'max' => 10,
                        'step' => 0.1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-cta-button-area .abcbiz-cta-button' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Button Height
        $this->add_responsive_control(
            'abcbiz_cta_button_height',
            [
                'label' => esc_html__('Height', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 5,
                        'step' => 0.1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-cta-button-area .abcbiz-cta-button' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Border Group
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'abcbiz_cta_button_border',
                'label' => esc_html__('Button Border', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-cta-button-area .abcbiz-cta-button',
            ]
        );

        // Border Radius
        $this->add_responsive_control(
            'abcbiz_cta_button_border_radius',
            [
                'label' => esc_html__('Border Radius', 'abcbiz-multi'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-cta-button-area .abcbiz-cta-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Button Typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_cta_button_typography',
                'label' => esc_html__('Button Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-cta-button-area .abcbiz-cta-button', 
            ]
        );

        $this->start_controls_tabs('abcbiz_cta_button_style_tabs');

        // Normal State Tab
        $this->start_controls_tab(
            'abcbiz_cta_button_normal',
            [
                'label' => esc_html__('Normal', 'abcbiz-multi'),
            ]
        );

        // Text Color
        $this->add_control(
            'abcbiz_cta_button_text_color',
            [
                'label' => esc_html__('Text Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-cta-button-area a.abcbiz-cta-button' => 'color: {{VALUE}};',
                ],
            ]
        );
        // Button Background
        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'abcbiz_cta_button_background_color',
                'label' => esc_html__('Button Background', 'abcbiz-multi'),
				'types' => [ 'classic', 'gradient'],
                'exclude' => [ 'image' ],
				'selector' => '{{WRAPPER}} .abcbiz-cta-button-area a.abcbiz-cta-button',
			]
		);

        $this->end_controls_tab(); // end normal tab

        // Hover State Tab
        $this->start_controls_tab(
            'abcbiz_cta_button_hover',
            [
                'label' => esc_html__('Hover', 'abcbiz-multi'),
            ]
        );
        // Text Color
        $this->add_control(
            'abcbiz_cta_button_hover_text_color',
            [
                'label' => esc_html__('Text Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-cta-button-area a.abcbiz-cta-button:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Background
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'abcbiz_cta_button_hover_background',
                'label' => esc_html__('Hover Background', 'abcbiz-multi'),
                'types' => [ 'classic', 'gradient'],
                'exclude' => [ 'image' ],
                'selector' => '{{WRAPPER}} .abcbiz-cta-button-area a.abcbiz-cta-button:hover',
            ]
        );
        // Border Color
        $this->add_control(
            'abcbiz_cta_button_hover_border_color',
            [
                'label' => esc_html__('Border Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-cta-button-area a.abcbiz-cta-button:hover' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'abcbiz_cta_button_border_border!' => 'none',
                ],
            ]
        );

        $this->end_controls_tab(); // end hover tab

        $this->end_controls_tabs(); // end tabs

        $this->end_controls_section(); // end button style

        $this->start_controls_section(
            'abcbiz_cta_ribbon_style',
            [
                'label' => esc_html__('Ribbon Style', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'abcbiz_cta_ribbon_enable' => 'yes',
                ],
            ]
        );

        // Ribbon Text Color
        $this->add_control(
            'abcbiz_cta_ribbon_text_color',
            [
                'label' => esc_html__('Text Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-cta-ribbon-area .abcbiz-cta-ribbon-text p' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Ribbon Typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_cta_ribbon_typography',
                'selector' => '{{WRAPPER}} .abcbiz-cta-ribbon-area .abcbiz-cta-ribbon-text p',
            ]
        );

        // Ribbon Background
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'abcbiz_cta_ribbon_background',
                'label' => esc_html__('Background', 'abcbiz-multi'),
                'types' => ['classic', 'gradient'],    
                'exclude' => [ 'image' ],                           
                'selector' => '{{WRAPPER}} .abcbiz-cta-ribbon-area .abcbiz-cta-ribbon-text',
            ]
        );

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