<?php
namespace ABCBiz\Includes\Widgets\ABCDualButton;

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
    protected $name = 'abcbiz-abcdual-button';
    protected $title = 'ABC Dual Button';
    protected $icon = 'eicon-dual-button abcbiz-multi-icon';
    protected $categories = [
        'abcbiz-category'
    ];

    protected $keywords = [
        'abc', 'button', 'dual', 'dual button',
    ];


    /**
     * Register the widget controls.
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'abcbiz_elementor_dual_button_setting',
            [
                'label' => esc_html__('Contents', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        // Tabs
        $this->start_controls_tabs(
			'abcbiz_elementor_dual_button_tabs'
		);

        // Left Tab
        $this->start_controls_tab(
            'abcbiz_elementor_dual_button_left_tab',
            [
                'label' => esc_html__('Left', 'abcbiz-multi'),
            ]
        );

        // Text field for Left Button
        $this->add_control(
            'abcbiz_elementor_dual_button_text_left',
            [
                'label' => esc_html__('Button Text', 'abcbiz-multi'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Free Download', 'abcbiz-multi'),
                'placeholder' => esc_html__('Enter button text', 'abcbiz-multi'),
                'label_block' => true,
            ]
        );

        // URL field for Left Button
        $this->add_control(
            'abcbiz_elementor_dual_button_url_left',
            [
                'label' => esc_html__('Button URL', 'abcbiz-multi'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'abcbiz-multi'),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'label_block' => true,
            ]
        );

        //switch for icon visibility
        $this->add_control(
            'abcbiz_elementor_dual_button_icon_left_switch',
            [
                'label' => esc_html__('Display Icon', 'abcbiz-multi'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'abcbiz-multi'),
                'label_off' => esc_html__('Hide', 'abcbiz-multi'),
                'return_value' => 'yes',
                'default' => 'no',
                'separator' => 'before',
            ]
        );

        // Icon fields for Left Button
        $this->add_control(
            'abcbiz_elementor_dual_button_icon_left',
            [
                'label' => esc_html__('Icon', 'abcbiz-multi'),
                'type' => Controls_Manager::ICONS,
                'label_block' => true,     
                'condition' => [
                    'abcbiz_elementor_dual_button_icon_left_switch' => 'yes',
                ]         
            ]
        );

        // Choose field for icon position
        $this->add_control(
            'abcbiz_elementor_dual_button_left_icon_position',
            [
                'label' => esc_html__('Icon Position', 'abcbiz-multi'),
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
                'label_block' => false,
                'condition' => [
                    'abcbiz_elementor_dual_button_icon_left_switch' => 'yes',
                ],
                'separator' => 'before',
            ]
        );

        $this->end_controls_tab(); // End Left Tab

        // Middle Tab
        $this->start_controls_tab(
            'abcbiz_elementor_dual_button_middle_tab',
            [
                'label' => esc_html__('Middle', 'abcbiz-multi'),
            ]
        );

        // Switch field for Middle Text visibility
        $this->add_control(
            'abcbiz_elementor_dual_button_middle_text_switch',
            [
                'label' => esc_html__('Display Middle Text', 'abcbiz-multi'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'abcbiz-multi'),
                'label_off' => esc_html__('Hide', 'abcbiz-multi'),
                'return_value' => 'yes',
                'default' => 'yes',
                'separator' => 'before',
            ]
        );

        // Text field for Middle Text
        $this->add_control(
            'abcbiz_elementor_dual_button_text_middle',
            [
                'label' => esc_html__('Middle Text', 'abcbiz-multi'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('OR', 'abcbiz-multi'),
                'placeholder' => esc_html__('Enter middle text', 'abcbiz-multi'),
                'label_block' => true,
                'condition' => [
                    'abcbiz_elementor_dual_button_middle_text_switch' => 'yes',
                ]
            ]
        );

        $this->end_controls_tab();

        // Right Tab
        $this->start_controls_tab(
            'abcbiz_elementor_dual_button_right_tab',
            [
                'label' => esc_html__('Right', 'abcbiz-multi'),
            ]
        );

        // Text field for Right Button
        $this->add_control(
            'abcbiz_elementor_dual_button_text_right',
            [
                'label' => esc_html__('Button Text', 'abcbiz-multi'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Purchase Now', 'abcbiz-multi'),
                'placeholder' => esc_html__('Enter button text', 'abcbiz-multi'),
                'label_block' => true,
            ]
        );

        // URL field for Right Button
        $this->add_control(
            'abcbiz_elementor_dual_button_url_right',
            [
                'label' => esc_html__('Button URL', 'abcbiz-multi'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'abcbiz-multi'),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'label_block' => true,
            ]
        );

        //switch for icon visibility
        $this->add_control(
            'abcbiz_elementor_dual_button_icon_right_switch',
            [
                'label' => esc_html__('Display Icon', 'abcbiz-multi'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'abcbiz-multi'),
                'label_off' => esc_html__('Hide', 'abcbiz-multi'),
                'return_value' => 'yes',
                'default' => 'no',
                'separator' => 'before',
            ]
        );

        // Icon fields for Right Button
        $this->add_control(
            'abcbiz_elementor_dual_button_icon_right',
            [
                'label' => esc_html__('Icon', 'abcbiz-multi'),
                'type' => Controls_Manager::ICONS,
                'label_block' => true,   
                'condition' => [
                    'abcbiz_elementor_dual_button_icon_right_switch' => 'yes',
                ]             
            ]
        );

            // Choose field for icon position
            $this->add_control(
            'abcbiz_elementor_dual_button_right_icon_position',
            [
                'label' => esc_html__('Icon Position', 'abcbiz-multi'),
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
                'label_block' => false,
                'condition' => [
                    'abcbiz_elementor_dual_button_icon_right_switch' => 'yes',
                ],
                'separator' => 'before',
            ]
        );

        $this->end_controls_tab(); // End Right Tab
        
        $this->end_controls_tabs(); // End Tabs        

        $this->end_controls_section(); // End Section


       // Style section for Left Button
       $this->start_controls_section(
           'abcbiz_elementor_dual_button_style_left',
           [
               'label' => esc_html__('Left Button', 'abcbiz-multi'),
               'tab' => Controls_Manager::TAB_STYLE,
           ]
       );
       // Icon Size for Left Button
       $this->add_control(
           'abcbiz_elementor_dual_button_icon_size_left',
           [
               'label' => esc_html__('Icon Size', 'abcbiz-multi'),
               'type' => Controls_Manager::SLIDER,
               'range' => [
                   'px' => [
                       'min' => 6,
                       'max' => 50,
                       'step' => 1,
                   ],
               ],
               'selectors' => [
                   '{{WRAPPER}} .abcbiz-dual-button-area .abcbiz-dual-button.abcbiz-dual-button-one i' => 'font-size: {{SIZE}}{{UNIT}};',
                   '{{WRAPPER}} .abcbiz-dual-button-area .abcbiz-dual-button.abcbiz-dual-button-one svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
               ],
               'condition' => [
                   'abcbiz_elementor_dual_button_icon_left_switch' => 'yes',
               ]
           ]
       );

       // Icon Color for Left Button
       $this->add_control(
           'abcbiz_elementor_dual_button_icon_color_left',
           [
               'label' => esc_html__('Icon Color', 'abcbiz-multi'),
               'type' => Controls_Manager::COLOR,
               'default' => '#fff',
               'selectors' => [
                   '{{WRAPPER}} .abcbiz-dual-button-area .abcbiz-dual-button.abcbiz-dual-button-one i' => 'color: {{VALUE}};',
                   '{{WRAPPER}} .abcbiz-dual-button-area .abcbiz-dual-button.abcbiz-dual-button-one svg' => 'fill: {{VALUE}};',
               ],
               'condition' => [
                   'abcbiz_elementor_dual_button_icon_left_switch' => 'yes',
               ]
           ]
       );
        // Typography for Left Button
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_dual_button_typography_left',
                'label' => esc_html__('Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-dual-button-area .abcbiz-dual-button.abcbiz-dual-button-one a',
            ]
        );

        // Padding for Left Button
        $this->add_responsive_control(
            'abcbiz_elementor_dual_button_padding_left',
            [
                'label' => esc_html__('Padding', 'abcbiz-multi'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-dual-button-area .abcbiz-dual-button.abcbiz-dual-button-one a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // Gap for Dual Button between text and icon
        $this->add_responsive_control(
            'abcbiz_elementor_dual_button_left_icon_gap',
            [
                'label' => esc_html__('Icon Gap', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],       
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-dual-button-area .abcbiz-dual-button.abcbiz-dual-button-one a' => 'gap: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'abcbiz_elementor_dual_button_icon_left_switch' => 'yes',
                ],
            ]
        );
        // Border for Left Button
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'abcbiz_elementor_dual_button_border_left',
                'label' => esc_html__('Border', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-dual-button-area .abcbiz-dual-button.abcbiz-dual-button-one a',
            ]
        );

        // Border Radius for Left Button
        $this->add_responsive_control(
            'abcbiz_elementor_dual_button_border_radius_left',
            [
                'label' => esc_html__('Border Radius', 'abcbiz-multi'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-dual-button-area .abcbiz-dual-button.abcbiz-dual-button-one a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Normal state tab for Left Button
        $this->start_controls_tabs('abcbiz_elementor_dual_button_normal_hover_tabs_left');

        $this->start_controls_tab(
            'abcbiz_elementor_dual_button_normal_tab_left',
            [
                'label' => esc_html__('Normal', 'abcbiz-multi'),
            ]
        );

        // Text color for Left Button
        $this->add_control(
            'abcbiz_elementor_dual_button_text_color_left',
            [
                'label' => esc_html__('Text Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-dual-button-area .abcbiz-dual-button.abcbiz-dual-button-one a' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Background color for Left Button
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'abcbiz_elementor_dual_button_background_left',
                'label' => esc_html__('Background Color', 'abcbiz-multi'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .abcbiz-dual-button-area .abcbiz-dual-button.abcbiz-dual-button-one a',
            ]
        );

        $this->end_controls_tab(); // End Normal Tab


        // Start Hover for Left Button
        $this->start_controls_tab(
            'abcbiz_elementor_dual_button_hover_tab_left',
            [
                'label' => esc_html__('Hover', 'abcbiz-multi'),
            ]
        );

        // Hover text color for Left Button
        $this->add_control(
            'abcbiz_elementor_dual_button_hover_text_color_left',
            [
                'label' => esc_html__('Text Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-dual-button-area .abcbiz-dual-button.abcbiz-dual-button-one a:hover ' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Hover background color for Left Button
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'abcbiz_elementor_dual_button_hover_background_left',
                'label' => esc_html__('Background Color', 'abcbiz-multi'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .abcbiz-dual-button-area .abcbiz-dual-button.abcbiz-dual-button-one a:hover',
            ]
        );

        //icon hover color
        $this->add_control(
            'abcbiz_elementor_dual_button_hover_icon_color_left',
            [
                'label' => esc_html__('Icon Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-dual-button-area .abcbiz-dual-button.abcbiz-dual-button-one a:hover i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .abcbiz-dual-button-area .abcbiz-dual-button.abcbiz-dual-button-one a:hover svg' => 'fill: {{VALUE}};',
                ],
                'condition' => [
                    'abcbiz_elementor_dual_button_icon_left_switch' => 'yes'
                ],
            ]
        );   

        //border color hover
        $this->add_control(
            'abcbiz_elementor_dual_button_hover_border_color_left',
            [
                'label' => esc_html__('Border Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-dual-button-area .abcbiz-dual-button.abcbiz-dual-button-one a:hover' => 'border-color: {{VALUE}};',
                ]
            ]
        );

        $this->end_controls_tab(); // End Hover tab for Left Button

        $this->end_controls_tabs(); // End Tabs for Left Button
            

       $this->end_controls_section();

       // Style section for Middle Text
       $this->start_controls_section(
           'abcbiz_elementor_dual_button_style_middle',
           [
               'label' => esc_html__('Middle Text', 'abcbiz-multi'),
               'tab' => Controls_Manager::TAB_STYLE,
           ]
       );

       // Text Color for Middle Text
       $this->add_control(
           'abcbiz_elementor_dual_button_text_color_middle',
           [
               'label' => esc_html__('Text Color', 'abcbiz-multi'),
               'type' => Controls_Manager::COLOR,
               'default' => '#284162',
               'selectors' => [
                   '{{WRAPPER}} .abcbiz-dual-button-area .abcbiz-dual-button-middle-text' => 'color: {{VALUE}};',
               ],
           ]
       );

       // Typography for Middle Text
       $this->add_group_control(
           Group_Control_Typography::get_type(),
           [
               'name' => 'abcbiz_elementor_dual_button_typography_middle',
               'selector' => '{{WRAPPER}} .abcbiz-dual-button-area .abcbiz-dual-button-middle-text',
           ]
       );

       // Background Color for Middle Text
       $this->add_group_control(
           Group_Control_Background::get_type(),
           [
               'name' => 'abcbiz_elementor_dual_button_background_middle',
               'label' => esc_html__('Background Color', 'abcbiz-multi'),               
               'types' => ['classic', 'gradient'],
               'exclude' => ['image'],
               'selector' => '{{WRAPPER}} .abcbiz-dual-button-area .abcbiz-dual-button-middle-text',
           ]
       );

       // Box Shadow for Middle Text
       $this->add_group_control(
           Group_Control_Box_Shadow::get_type(),
           [
               'name' => 'abcbiz_elementor_dual_button_box_shadow_middle',
               'selector' => '{{WRAPPER}} .abcbiz-dual-button-area .abcbiz-dual-button-middle-text',
           ]
       );

       $this->end_controls_section();

       // Style section for Right Button
       $this->start_controls_section(
           'abcbiz_elementor_dual_button_style_right',
           [
               'label' => esc_html__('Right Button', 'abcbiz-multi'),
               'tab' => Controls_Manager::TAB_STYLE,
           ]
       );

       // Icon Size for Right Button
       $this->add_control(
           'abcbiz_elementor_dual_button_icon_size_right',
           [
               'label' => esc_html__('Icon Size', 'abcbiz-multi'),
               'type' => Controls_Manager::SLIDER,
               'range' => [
                   'px' => [
                       'min' => 5,
                       'max' => 50,
                       'step' => 1,
                   ],
               ],
               'selectors' => [
                   '{{WRAPPER}} .abcbiz-dual-button-area .abcbiz-dual-button.abcbiz-dual-button-two i' => 'font-size: {{SIZE}}{{UNIT}};',
                   '{{WRAPPER}} .abcbiz-dual-button-area .abcbiz-dual-button.abcbiz-dual-button-two svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
               ],
               'condition' => [
                   'abcbiz_elementor_dual_button_icon_right_switch' => 'yes'
               ]
           ]
       );

       // Icon Color for Right Button
       $this->add_control(
           'abcbiz_elementor_dual_button_icon_color_right',
           [
               'label' => esc_html__('Icon Color', 'abcbiz-multi'),
               'type' => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .abcbiz-dual-button-area .abcbiz-dual-button.abcbiz-dual-button-two i' => 'color: {{VALUE}};',
                   '{{WRAPPER}} .abcbiz-dual-button-area .abcbiz-dual-button.abcbiz-dual-button-two svg' => 'fill: {{VALUE}};',
               ],
               'condition' => [
                   'abcbiz_elementor_dual_button_icon_right_switch' => 'yes'
               ]
           ]
       );

        // Typography for Right Button
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_dual_button_typography_right',
                'selector' => '{{WRAPPER}} .abcbiz-dual-button-area .abcbiz-dual-button.abcbiz-dual-button-two a',
            ]
        );

        // Padding for Right Button
        $this->add_responsive_control(
            'abcbiz_elementor_dual_button_padding_right',
            [
                'label' => esc_html__('Padding', 'abcbiz-multi'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-dual-button-area .abcbiz-dual-button.abcbiz-dual-button-two a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // Gap for Dual Button between text and icon
        $this->add_responsive_control(
            'abcbiz_elementor_dual_button_right_icon_gap',
            [
                'label' => esc_html__('Icon Gap', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],       
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-dual-button-area .abcbiz-dual-button.abcbiz-dual-button-two a' => 'gap: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'abcbiz_elementor_dual_button_icon_right_switch' => 'yes',
                ],
            ]
        );

        // Border for Right Button
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'abcbiz_elementor_dual_button_border_right',
                'selector' => '{{WRAPPER}} .abcbiz-dual-button-area .abcbiz-dual-button.abcbiz-dual-button-two a',
            ]
        );

        // Border Radius for Right Button
        $this->add_responsive_control(
            'abcbiz_elementor_dual_button_border_radius_right',
            [
                'label' => esc_html__('Border Radius', 'abcbiz-multi'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-dual-button-area .abcbiz-dual-button.abcbiz-dual-button-two a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // Normal State Tab for Right Button
        $this->start_controls_tabs('abcbiz_elementor_dual_button_normal_hover_right');

        $this->start_controls_tab(
            'abcbiz_elementor_dual_button_normal_right',
            [
                'label' => esc_html__('Normal', 'abcbiz-multi'),
            ]
        );

        // Text Color for Right Button Normal State
        $this->add_control(
            'abcbiz_elementor_dual_button_text_color_right',
            [
                'label' => esc_html__('Text Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-dual-button-area .abcbiz-dual-button.abcbiz-dual-button-two a' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Background Color for Right Button Normal State
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'abcbiz_elementor_dual_button_background_right',
                'label' => esc_html__('Background Color', 'abcbiz-multi'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .abcbiz-dual-button-area .abcbiz-dual-button.abcbiz-dual-button-two a',
            ]
        );

        $this->end_controls_tab();

        // Hover State Tab for Right Button
        $this->start_controls_tab(
            'abcbiz_elementor_dual_button_hover_right',
            [
                'label' => esc_html__('Hover', 'abcbiz-multi'),
            ]
        );

        // Text Color for Right Button Hover
        $this->add_control(
            'abcbiz_elementor_dual_button_text_color_hover_right',
            [
                'label' => esc_html__('Text Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-dual-button-area .abcbiz-dual-button.abcbiz-dual-button-two a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Background Color for Right Button Hover
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'abcbiz_elementor_dual_button_background_hover_right',
                'label' => esc_html__('Background Color', 'abcbiz-multi'),
                'types' => ['classic', 'gradient'],
                'exclude' => ['image'],
                'selector' => '{{WRAPPER}} .abcbiz-dual-button-area .abcbiz-dual-button.abcbiz-dual-button-two a:hover',
            ]
        );

        // Icon Hover Color for Right Button
        $this->add_control(
            'abcbiz_elementor_dual_button_icon_color_hover_right',
            [
                'label' => esc_html__('Icon Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-dual-button-area .abcbiz-dual-button.abcbiz-dual-button-two a:hover i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .abcbiz-dual-button-area .abcbiz-dual-button.abcbiz-dual-button-two a:hover svg' => 'fill: {{VALUE}};',
                ],
                'condition' => [
                    'abcbiz_elementor_dual_button_icon_right_switch' => 'yes',
                ]
            ]
        );

        //border hover color
        $this->add_control(
            'abcbiz_elementor_dual_button_border_color_hover_right',
            [
                'label' => esc_html__('Border Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-dual-button-area .abcbiz-dual-button.abcbiz-dual-button-two a:hover' => 'border-color: {{VALUE}};',
                ]
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

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