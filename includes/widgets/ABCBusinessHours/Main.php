<?php

namespace ABCBiz\Includes\Widgets\ABCBusinessHours;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;

class Main extends BaseWidget
{
    // define protected variables...
    protected $name = 'abcbiz-business-hours';
    protected $title = 'ABC Business Hours';
    protected $icon = 'eicon-clock-o';
    protected $categories = [
        'abcbiz-category'
    ];

    protected $keywords = [
        'abc', 'hours', 'clock', 'business', 'time', 'schedule', 'business hours',
    ];


    /**
     * Register the widget controls.
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'abcbiz_elementor_business_hours_setting',
            [
                'label' => esc_html__('Contents', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        // Business Hours Section Title
        $this->add_control(
            'abcbiz_elementor_business_hours_section_title',
            [
                'label' => esc_html__('Section Title', 'abcbiz-multi'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Working Hours', 'abcbiz-multi'),
                'placeholder' => esc_html__('Your Title Here', 'abcbiz-multi'),
                'label_block' => true,
            ]
        );


        $repeater = new \Elementor\Repeater();

        // Business Hours day
        $repeater->add_control(
            'abcbiz_elementor_business_hours_days',
            [
                'label' => esc_html__('Day', 'abcbiz-multi'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Monday', 'abcbiz-multi'),
                'label_block' => true,
            ]
        );
        // Business Hours time
        $repeater->add_control(
            'abcbiz_elementor_business_hours_time',
            [
                'label' => esc_html__('Time', 'abcbiz-multi'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('10:00 - 19:00', 'abcbiz-multi'),
                'show_label' => true,
            ]
        );
        // Business Hours day color
        $repeater->add_control(
            'abcbiz_elementor_business_hour_date_color',
            [
                'label' => esc_html__('Date Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-business-hours-area {{CURRENT_ITEM}} span.abcbiz-business-hour-day' => 'color: {{VALUE}}'
                ],
            ]
        );   
        
        // Business Hours time color
        $repeater->add_control(
            'abcbiz_elementor_business_hour_time_color',
            [
                'label' => esc_html__('Time Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-business-hours-area {{CURRENT_ITEM}} span.abcbiz-business-hour-time' => 'color: {{VALUE}}'
                ],
            ]
        );

        // Repeater
        $this->add_control(
            'abcbiz_elementor_business_hours_repeater',
            [
                'label' => esc_html__('Business Hours List', 'abcbiz-multi'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'abcbiz_elementor_business_hours_days' => esc_html__('Title #1', 'abcbiz-multi'),
                        'abcbiz_elementor_business_hours_time' => esc_html__('10:00 - 19:00', 'abcbiz-multi'),
                    ],
                    [
                        'abcbiz_elementor_business_hours_days' => esc_html__('Title #2', 'abcbiz-multi'),
                        'abcbiz_elementor_business_hours_time' => esc_html__('10:00 - 19:00', 'abcbiz-multi'),
                    ],
                ],
                'title_field' => '{{{ abcbiz_elementor_business_hours_days }}}',
            ]
        );

        $this->end_controls_section(); // end section

        // start style section

        $this->start_controls_section(
            'abcbiz_elementor_business_hours_box_style',
            [
                'label' => esc_html__('Box', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Box Shadow
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'abcbiz_elementor_business_hours_box_shadow',
                'selector' => '{{WRAPPER}} .abcbiz-business-hours-area .abcbiz-business-hours ul',
            ]
        );
        // Box Padding
        $this->add_responsive_control(
            'abcbiz_elementor_business_hours_box_padding',
            [
                'label' => esc_html__('Padding', 'abcbiz-multi'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-business-hours-area .abcbiz-business-hours ul' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // Box Margin
        $this->add_responsive_control(
            'abcbiz_elementor_business_hours_box_margin',
            [
                'label' => esc_html__('Margin', 'abcbiz-multi'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-business-hours-area .abcbiz-business-hours ul' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );   

        //background
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'abcbiz_elementor_business_hours_box_background',
                'selector' => '{{WRAPPER}} .abcbiz-business-hours-area .abcbiz-business-hours ul',
                'label' => esc_html__('Background', 'abcbiz-multi'),                
            ]
        );
        //border
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'abcbiz_elementor_business_hours_box_border',
                'selector' => '{{WRAPPER}} .abcbiz-business-hours-area .abcbiz-business-hours ul',
                'label' => esc_html__('Border', 'abcbiz-multi'),
            ]
        );
        
        //border radius
        $this->add_responsive_control(
            'abcbiz_elementor_business_hours_box_border_radius',
            [
                'label' => esc_html__('Border Radius', 'abcbiz-multi'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-business-hours-area .abcbiz-business-hours ul' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->end_controls_section(); // end style section


        // start title style
        $this->start_controls_section(
            'abcbiz_elementor_business_hours_title_style',
            [
                'label' => esc_html__('Section Title', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        //text justify alignment
        $this->add_responsive_control(
            'abcbiz_elementor_business_hours_title_text_justify',
            [
                'label' => esc_html__('Text Alignment', 'abcbiz-multi'),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
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
                'default' => 'flex-start',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-business-hours-area .abcbiz-business-hour-title' => 'justify-content: {{VALUE}};',
                ],
                'toggle' => true,
            ]
        );

        // Title Color
        $this->add_control(
            'abcbiz_elementor_business_hours_title_color',
            [
                'label' => esc_html__('Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-business-hours-area .abcbiz-business-hour-title' => 'color: {{VALUE}};',
                ],
            ]
        );
        // Title Typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_business_hours_title_typography',
                'selector' => '{{WRAPPER}} .abcbiz-business-hours-area .abcbiz-business-hour-title',
            ]
        );
        // Title Background
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'abcbiz_elementor_business_hours_title_background',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .abcbiz-business-hours-area .abcbiz-business-hour-title',
            ]
        );
        // Title Padding
        $this->add_responsive_control(
            'abcbiz_elementor_business_hours_title_padding',
            [
                'label' => esc_html__('Padding', 'abcbiz-multi'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-business-hours-area .abcbiz-business-hour-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // Title Margin
        $this->add_responsive_control(
            'abcbiz_elementor_business_hours_title_margin',
            [
                'label' => esc_html__('Margin', 'abcbiz-multi'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-business-hours-area .abcbiz-business-hour-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section(); // end title style section

        // start list style
        $this->start_controls_section(
            'abcbiz_elementor_business_hours_list_style',
            [
                'label' => esc_html__('List Items', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // List Item Color
        $this->add_control(
            'abcbiz_elementor_business_hours_list_item_color',
            [
                'label' => esc_html__('Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-business-hours-area .abcbiz-business-hour-item span' => 'color: {{VALUE}};',
                ],
            ]
        );

        // List Item Background
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'abcbiz_elementor_business_hours_list_item_background',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .abcbiz-business-hours-area .abcbiz-business-hour-item',
            ]
        );

        // List Item Padding
        $this->add_responsive_control(
            'abcbiz_elementor_business_hours_list_item_padding',
            [
                'label' => esc_html__('Padding', 'abcbiz-multi'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-business-hours-area .abcbiz-business-hour-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // List Item Margin
        $this->add_responsive_control(
            'abcbiz_elementor_business_hours_list_item_margin',
            [
                'label' => esc_html__('Margin', 'abcbiz-multi'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-business-hours-area .abcbiz-business-hour-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // List Item Typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_business_hours_list_item_typography',
                'selector' => '{{WRAPPER}} .abcbiz-business-hours-area .abcbiz-business-hour-item span',
            ]
        );

        // List Item Border
        $this->add_group_control(            
            Group_Control_Border::get_type(),
            [
                'name' => 'abcbiz_elementor_business_hours_list_item_border',
                'selector' => '{{WRAPPER}} .abcbiz-business-hours-area .abcbiz-business-hour-item',
                'separator' => 'before',
            ]
        );
        // List Item Border Radius
        $this->add_responsive_control(
            'abcbiz_elementor_business_hours_list_item_border_radius',
            [
                'label' => esc_html__('Border Radius', 'abcbiz-multi'),
                'type' => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-business-hours-area .abcbiz-business-hour-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );
        //list gap
        $this->add_responsive_control(
            'abcbiz_elementor_business_hours_list_gap',
            [
                'label' => esc_html__('List Gap', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'default' => [
                    'unit' => 'px',
                    'size' => 0,
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,                    
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-business-hours-area .abcbiz-business-hours ul' => 'gap: {{SIZE}}{{UNIT}};',
                ]
            ]
        );
        
        //text justify alignment
        $this->add_responsive_control(
            'abcbiz_elementor_business_hours_text_justify',
            [
                'label' => esc_html__('Text Alignment', 'abcbiz-multi'),
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
                'default' => 'space-between',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-business-hours-area .abcbiz-business-hour-item' => 'justify-content: {{VALUE}};',
                ],
                'toggle' => true,
            ]
        );

        $this->end_controls_section(); // end list style section

    }

    /**
     * Render the widget output on the frontend.
     */
    protected function render()
    {
        include 'RenderView.php';
    }
}
