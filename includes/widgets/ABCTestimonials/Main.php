<?php
namespace ABCBiz\Includes\Widgets\ABCTestimonials;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Utils;


class Main extends BaseWidget
{

    // define protected variables...
    protected $name = 'abcbiz-elementor-testimonial';
    protected $title = 'ABC Testimonial Carousel';
    protected $icon = 'eicon-testimonial-carousel abcbiz-addons-icon';
    protected $categories = [
        'abcbiz-category'
    ];
    protected $keywords = [
        'abc', 'testimonial', 'carousel', 'slider',
    ];

    public function get_script_depends()
    {
        return ['abcbiz-swiper', 'abcbiz-testimonial'];
    }

    public function get_style_depends()
    {
        return ['abcbiz-swiper'];
    }

    /**
     * Register the widget controls.
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'abcbiz_elementor_testimonial_setting',
            [
                'label' => esc_html__('Testimonial Setting', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        // testimonial grid or slider selection
        $this->add_control(
            'abcbiz_ele_testimonial_types',
            [
                'label' => esc_html__('Select Type', 'abcbiz-addons'),
                'type' => Controls_Manager::SELECT,
                'default' => 'grid',
                'options' => [
                    'grid' => esc_html__('Grid', 'abcbiz-addons'),
                    'slider' => esc_html__('Slider', 'abcbiz-addons'),
                ],
            ]
        );
        $this->add_control(
            'abcbiz_ele_testimonial_client_image_switch',
            [
                'label' => esc_html__('Display Client Image', 'abcbiz-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('On', 'abcbiz-addons'),
                'label_off' => esc_html__('Off', 'abcbiz-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        // Initialize the repeater control
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
			'testimonial_name',
			[
				'label' => esc_html__( 'Name', 'abcbiz-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'List Name' , 'abcbiz-addons' ),
				'label_block' => true,
			]
		);       
        $repeater->add_control(
			'testimonial_feedback',
			[
				'label' => esc_html__( 'Description', 'abcbiz-addons' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Enter feedback message here' , 'abcbiz-addons' ),
				'label_block' => true,
			]
		);       
        $repeater->add_control(
			'testimonial_designation',
			[                
                'label' => esc_html__('Designation', 'abcbiz-addons'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('CEO of Company', 'abcbiz-addons'),
                'dynamic' => ['active' => true],
			]
		);        
        $repeater->add_control(
			'testimonial_rating',
			[  
                'label' => esc_html__('Rating', 'abcbiz-addons'),
                'type' => Controls_Manager::SELECT,
                'default' => '5',
                'options' => [
                    '1' => esc_html__('1 Star', 'abcbiz-addons'),
                    '2' => esc_html__('2 Stars', 'abcbiz-addons'),
                    '3' => esc_html__('3 Stars', 'abcbiz-addons'),
                    '4' => esc_html__('4 Stars', 'abcbiz-addons'),
                    '5' => esc_html__('5 Stars', 'abcbiz-addons'),
                ],
			]
		);       
        $repeater->add_control(
			'testimonial_client_image',
			[                  
                'label' => esc_html__('Client Image', 'abcbiz-addons'),
                'type' => Controls_Manager::MEDIA,
                'dynamic' => ['active' => true],   
			]
		);
		$this->add_control(
			'abcbiz_testimonial_repeater',
			[
				'label' => esc_html__( 'Testimonial Items', 'abcbiz-addons' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'testimonial_name' => esc_html__( 'Name #1', 'abcbiz-addons' ),						
					],
					[
						'testimonial_name' => esc_html__( 'Name #2', 'abcbiz-addons' ),						
					],
                    [
						'testimonial_name' => esc_html__( 'Name #3', 'abcbiz-addons' ),						
					],
				],
				'title_field' => '{{{ testimonial_name }}}',
			]
		);
        // testimonial column for desktop
        $this->add_control(
            'abcbiz_ele_testimonial_column_desktop',
            [
                'label' => esc_html__('Desktop Column', 'abcbiz-addons'),
                'type' => Controls_Manager::NUMBER,
                'default' => 2,
                'min' => 1,
                'max' => 3,
                'frontend_available' => true,
                'condition' => [
                    'abcbiz_ele_testimonial_types' => 'slider',
                ],
            ]
        );
        // testimonial column for tab
        $this->add_control(
            'abcbiz_ele_testimonial_column_tab',
            [
                'label' => esc_html__('Tab Column', 'abcbiz-addons'),
                'type' => Controls_Manager::NUMBER,
                'default' => 1,                
                'min' => 1,
                'max' => 2,              
                'condition' => [
                    'abcbiz_ele_testimonial_types' => 'slider',
                ],
            ]
        );
        // testimonial column for mobile
        $this->add_control(
            'abcbiz_ele_testimonial_column_mobile',
            [
                'label' => esc_html__('Mobile Column', 'abcbiz-addons'),
                'type' => Controls_Manager::NUMBER,
                'default' => 1,
                'min' => 1,
                'max' => 2,   
                'condition' => [
                    'abcbiz_ele_testimonial_types' => 'slider',
                ],
            ]
        );

        // autoplay on/off
        $this->add_control(
            'abcbiz_ele_testimonial_autoplay',
            [
                'label' => esc_html__('Autoplay', 'abcbiz-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('On', 'abcbiz-addons'),
                'label_off' => esc_html__('Off', 'abcbiz-addons'),
                'return_value' => 'true',
                'default' => 'true',
                'condition' => [
                    'abcbiz_ele_testimonial_types' => 'slider',
                ],
            ]
        );
        // autoplay delay time
        $this->add_control(
            'abcbiz_ele_testimonial_autoplay_delay',
            [
                'label' => esc_html__('Autoplay Delay', 'abcbiz-addons'),
                'type' => Controls_Manager::NUMBER,
                'default' => 5000,
                'condition' => [
                    'abcbiz_ele_testimonial_autoplay' => 'true',
                    'abcbiz_ele_testimonial_types' => 'slider',
                ],
            ],
        );

        // item quote icon
        $this->add_control(
            'abcbiz_ele_testimonial_item_quote_icon',
            [
                'label' => esc_html__('Icon', 'abcbiz-addons'),
                'type' => Controls_Manager::ICONS,
            ]
        );

        // testimonial arrow on/off
        $this->add_control(
            'abcbiz_ele_testimonial_slider_arrow',
            [
                'label' => esc_html__('Arrow', 'abcbiz-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('On', 'abcbiz-addons'),
                'label_off' => esc_html__('Off', 'abcbiz-addons'),
                'return_value' => 'true',
                'default' => 'false',
                'condition' => [
                    'abcbiz_ele_testimonial_types' => 'slider',
                ],
            ]
        );
        // testimonial slider pagination on/off
        $this->add_control(
            'abcbiz_ele_testimonial_slider_pagination',
            [
                'label' => esc_html__('Pagination', 'abcbiz-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('On', 'abcbiz-addons'),
                'label_off' => esc_html__('Off', 'abcbiz-addons'),
                'return_value' => 'true',
                'default' => 'true',
                'condition' => [
                    'abcbiz_ele_testimonial_types' => 'slider',
                ],
            ]
        );


        // end of Testimonial section
        $this->end_controls_section();

        // start of Testimonial style section
        $this->start_controls_section(
            'abcbiz_elementor_testimonial_style_setting',
            [
                'label' => esc_html__('Style', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        // testimonial wrapper background
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'Background',
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .abcbiz-testimonial-single-item',
            ]
        );

        // testimonial title typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_ele_testimonial_title_typography',
                'label' => esc_html__('Name Typography', 'abcbiz-addons'),
                'selector' => '{{WRAPPER}} .abcbiz-testimonial-client-info h3',
            ]
        );
        // testimonial name color
        $this->add_control(
            'abcbiz_ele_testimonial_title_color',
            [
                'label' => esc_html__('Name Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#333333',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-testimonial-client-info h3' => 'color: {{VALUE}}',
                ],
            ]
        );
        // testimonial designation typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_ele_testimonial_designation_typography',
                'label' => esc_html__('Designation Typography', 'abcbiz-addons'),
                'selector' => '{{WRAPPER}} .abcbiz-testimonial-client-info p',
            ]
        );
        // testimonial designation color
        $this->add_control(
            'abcbiz_ele_testimonial_designation_color',
            [
                'label' => esc_html__('Designation Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#448E08',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-testimonial-client-info p' => 'color: {{VALUE}}',
                ],
            ]
        );
        // testimonial content typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_ele_testimonial_content_typography',
                'label' => esc_html__('Content Typography', 'abcbiz-addons'),
                'selector' => '{{WRAPPER}} .abcbiz-testimonial-content p',
            ]
        );
        // testimonial content color
        $this->add_control(
            'abcbiz_ele_testimonial_content_color',
            [
                'label' => esc_html__('Content Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#555555',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-testimonial-content p' => 'color: {{VALUE}}',
                ],
            ]
        );
        // testimonial rating size
        $this->add_responsive_control(
            'abcbiz_ele_testimonial_rating_size',
            [
                'label' => esc_html__('Star Size', 'abcbiz-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 50,
                    ],
                    'em' => [
                        'min' => 1,
                        'max' => 5,
                        'step' => 0.1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 14,
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-testimonial-rating i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        // testimonial rating color
        $this->add_control(
            'abcbiz_ele_testimonial_rating_color',
            [
                'label' => esc_html__('Star Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#D3A500',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-testimonial-rating i' => 'color: {{VALUE}}',
                ],
            ]
        );
        // testimonial quote icon size
        $this->add_responsive_control(
            'abcbiz_ele_testimonial_quote_icon_size',
            [
                'label' => esc_html__('Quote Icon Size', 'abcbiz-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 150,
                    ],
                    'em' => [
                        'min' => 1,
                        'max' => 15,
                        'step' => 0.1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 50,
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-testimonial-quote i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .abcbiz-testimonial-quote svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        // testimonial quote icon top/bottom position
        $this->add_responsive_control(
            'abcbiz_ele_testimonial_quote_icon_tb_position',
            [
                'label' => esc_html__('Quote Icon Top Position', 'abcbiz-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 300,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-testimonial-quote' => 'top: {{SIZE}}{{UNIT}};',
                ],                
            ]
        );

        // testimonial quote icon left/right position
        $this->add_responsive_control(
            'abcbiz_ele_testimonial_quote_icon_lr_position',
            [
                'label' => esc_html__('Quote Icon Right Position', 'abcbiz-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 300,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-testimonial-quote' => 'right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        // testimonial quote icon color
        $this->add_control(
            'abcbiz_ele_testimonial_quote_icon_color',
            [
                'label' => esc_html__('Quote Icon Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#444444',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-testimonial-quote i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .abcbiz-testimonial-quote svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        // testimonial quote icon opacity
        $this->add_control(
            'abcbiz_ele_testimonial_quote_icon_opacity',
            [
                'label' => esc_html__('Icon Opacity', 'abcbiz-addons'),
                'type' => Controls_Manager::NUMBER,
                'min' => 0.1,
                'max' => 1,
                'step' => 0.1,
                'default' => 0.6,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-testimonial-quote i' => 'opacity: {{SIZE}};',
                    '{{WRAPPER}} .abcbiz-testimonial-quote svg path' => 'fill-opacity: {{SIZE}};',
                ],
            ]
        );
        // end of testimonial section
        $this->end_controls_section();

        // testimonial pagination style section
        $this->start_controls_section(
            'abcbiz_elementor_testimonial_pagination_style_setting',
            [
                'label' => esc_html__('Pagination', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'abcbiz_ele_testimonial_pagination' => 'yes',
                    'abcbiz_ele_testimonial_types' => 'grid',
                ],
            ]
        );
        // testimonial pagination color
        $this->add_control(
            'abcbiz_ele_testimonial_pagination_color',
            [
                'label' => esc_html__('Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-elementor-pagination.abcbiz-blog-list-pagi .page-numbers' => 'color: {{VALUE}}',
                ],
            ]
        );
        // testimonial pagination hover color
        $this->add_control(
            'abcbiz_ele_testimonial_pagination_hover_color',
            [
                'label' => esc_html__('Hover/Active Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-elementor-pagination.abcbiz-blog-list-pagi .page-numbers.current' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .abcbiz-elementor-pagination.abcbiz-blog-list-pagi .page-numbers:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        // testimonial pagination background color
        $this->add_control(
            'abcbiz_ele_testimonial_pagination_bg_color',
            [
                'label' => esc_html__('Background Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-elementor-pagination.abcbiz-blog-list-pagi .page-numbers' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        // testimonial pagination hover background color
        $this->add_control(
            'abcbiz_ele_testimonial_pagination_hover_bg_color',
            [
                'label' => esc_html__('Hover/Active BG Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-elementor-pagination.abcbiz-blog-list-pagi .page-numbers.current' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .abcbiz-elementor-pagination.abcbiz-blog-list-pagi .page-numbers:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        // testimonial pagination typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_ele_testimonial_pagination_typography',
                'label' => esc_html__('Typography', 'abcbiz-addons'),
                'selector' => '{{WRAPPER}} .abcbiz-elementor-pagination.abcbiz-blog-list-pagi .page-numbers',
            ]
        );
        // testimonial pagination border radius
        $this->add_responsive_control(
            'abcbiz_ele_testimonial_pagination_border_radius',
            [
                'label' => esc_html__('Border Radius', 'abcbiz-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-elementor-pagination.abcbiz-blog-list-pagi .page-numbers' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // testimonial pagination padding
        $this->add_responsive_control(
            'abcbiz_ele_testimonial_pagination_padding',
            [
                'label' => esc_html__('Padding', 'abcbiz-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-elementor-pagination.abcbiz-blog-list-pagi .page-numbers' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // testimonial pagination gap
        $this->add_responsive_control(
            'abcbiz_ele_testimonial_pagination_gap',
            [
                'label' => esc_html__('Gap', 'abcbiz-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 50,
                    ],
                    '%' => [
                        'min' => 1,
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-elementor-pagination.abcbiz-blog-list-pagi .page-numbers' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        // testimonial pagination alignment
        $this->add_control(
            'abcbiz_ele_testimonial_pagination_alignment',
            [
                'label' => esc_html__('Alignment', 'abcbiz-addons'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'abcbiz-addons'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'abcbiz-addons'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'abcbiz-addons'),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-elementor-pagination.abcbiz-blog-list-pagi' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        // end of testimonial pagination section
        $this->end_controls_section();

        // testimonial arrow style section
        $this->start_controls_section(
            'abcbiz_elementor_testimonial_arrow_style_setting',
            [
                'label' => esc_html__('Arrows', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'abcbiz_ele_testimonial_slider_arrow' => 'true',
                ],

            ]
        );
        // testimonial arrow color
        $this->add_control(
            'abcbiz_ele_testimonial_arrow_color',
            [
                'label' => esc_html__('Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-testimonial-slider-nav-bar button.abcbiz-testimonial-arrow svg' => 'fill: {{VALUE}}',
                ],
            ]
        );
        // testimonial arrow hover color
        $this->add_control(
            'abcbiz_ele_testimonial_arrow_hover_color',
            [
                'label' => esc_html__('Hover Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-testimonial-slider-nav-bar button.abcbiz-testimonial-arrow:hover svg' => 'fill: {{VALUE}}',
                ],
            ]
        );
        // testimonial arrow background color
        $this->add_control(
            'abcbiz_ele_testimonial_arrow_bg_color',
            [
                'label' => esc_html__('Background Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#6247ed',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-testimonial-slider-nav-bar button.abcbiz-testimonial-arrow svg' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        // testimonial arrow hover background color
        $this->add_control(
            'abcbiz_ele_testimonial_arrow_hover_bg_color',
            [
                'label' => esc_html__('Hover BG Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#374ae4',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-testimonial-slider-nav-bar button.abcbiz-testimonial-arrow:hover svg' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        // testimonial arrow size
        $this->add_responsive_control(
            'abcbiz_ele_testimonial_arrow_size',
            [
                'label' => esc_html__('Size', 'abcbiz-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 150,
                    ],
                    'em' => [
                        'min' => 1,
                        'max' => 15,
                        'step' => 0.1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 30,
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-testimonial-slider-nav-bar .abcbiz-testimonial-arrow' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .abcbiz-testimonial-slider-nav-bar .abcbiz-testimonial-arrow svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        // testimonial arrow border radius
        $this->add_responsive_control(
            'abcbiz_ele_testimonial_arrow_border_radius',
            [
                'label' => esc_html__('Border Radius', 'abcbiz-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'default' => [
                    'top' => '50',
                    'right' => '50',
                    'bottom' => '50',
                    'left' => '50',
                    'unit' => '%',
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-testimonial-slider-nav-bar .abcbiz-testimonial-arrow svg' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // testimonial arrow padding
        $this->add_responsive_control(
            'abcbiz_ele_testimonial_arrow_padding',
            [
                'label' => esc_html__('Padding', 'abcbiz-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-testimonial-slider-nav-bar .abcbiz-testimonial-arrow svg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // arrow indent for normal device
        $this->add_control(
            'abcbiz_ele_testimonial_arrow_normal_device_heading',
            [
                'label' => esc_html__('Alignment for Normal Device', 'abcbiz-addons'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        // testimonial navigation bar alignment
        $this->add_responsive_control(
            'abcbiz_ele_testimonial_nav_bar_alignment',
            [
                'label' => esc_html__('Navigation Bar Alignment', 'abcbiz-addons'),
                'type' => Controls_Manager::CHOOSE,
                'default' => 'center',
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'abcbiz-addons'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'abcbiz-addons'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'abcbiz-addons'),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-testimonial-slider-nav-bar' => 'justify-content: {{VALUE}};',
                ],
            ]
        );

        //arrow gap
        $this->add_responsive_control(
            'abcbiz_ele_testimonial_arrow_gap',
            [
                'label' => esc_html__('Gap', 'abcbiz-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%', 'vh', 'vw', 'rem', 'ex', 'ch', 'custom'],
                'range' => [
                    'px' => [
                        'min' => -200,
                        'max' => 1000,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-testimonial-slider-nav-bar' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // arrow heading for largest device
        $this->add_control(
            'abcbiz_ele_testimonial_arrow_largest_device_heading',
            [
                'label' => esc_html__('Indent for Largest Device', 'abcbiz-addons'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        // testimonial left arrow top indent
        $this->add_responsive_control(
            'abcbiz_ele_testimonial_left_arrow_top_indent',
            [
                'label' => esc_html__('Left Arrow Top Indent', 'abcbiz-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%', 'vh', 'vw', 'rem', 'ex', 'ch', 'custom'],
                'range' => [
                    'px' => [
                        'min' => -200,
                        'max' => 1000,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-testimonial-slider-nav-bar .abcbiz-testimonial-arrow.abcbiz-testimonial-arrow-left' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // testimonial left arrow left indent
        $this->add_responsive_control(
            'abcbiz_ele_testimonial_left_arrow_left_indent',
            [
                'label' => esc_html__('Left Arrow Left Indent', 'abcbiz-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%', 'vh', 'vw', 'rem', 'ex', 'ch', 'custom'],
                'range' => [
                    'px' => [
                        'min' => -200,
                        'max' => 1000,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-testimonial-slider-nav-bar .abcbiz-testimonial-arrow.abcbiz-testimonial-arrow-left' => 'left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        // testimonial right arrow top indent
        $this->add_responsive_control(
            'abcbiz_ele_testimonial_right_arrow_top_indent',
            [
                'label' => esc_html__('Right Arrow Top Indent', 'abcbiz-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%', 'vh', 'vw', 'rem', 'ex', 'ch', 'custom'],
                'range' => [
                    'px' => [
                        'min' => -200,
                        'max' => 1000,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-testimonial-slider-nav-bar .abcbiz-testimonial-arrow.abcbiz-testimonial-arrow-right' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        // testimonial right arrow right indent
        $this->add_responsive_control(
            'abcbiz_ele_testimonial_right_arrow_right_indent',
            [
                'label' => esc_html__('Right Arrow Right Indent', 'abcbiz-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%', 'vh', 'vw', 'rem', 'ex', 'ch', 'custom'],
                'range' => [
                    'px' => [
                        'min' => -200,
                        'max' => 1000,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-testimonial-slider-nav-bar .abcbiz-testimonial-arrow.abcbiz-testimonial-arrow-right' => 'right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section(); // end of testimonial arrow section


        // start of testimonial slider pagination section
        $this->start_controls_section(
            'abcbiz_ele_testimonial_slider_pagination_style',
            [
                'label' => esc_html__('Pagination', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'abcbiz_ele_testimonial_slider_pagination' => 'true',
                ],
            ]
        );
        // testimonial pagination alignment
        $this->add_responsive_control(
            'abcbiz_ele_testimonial_slider_pagination_alignment',
            [
                'label' => esc_html__('Alignment', 'abcbiz-addons'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'flex-start' => [
                        'title' => esc_html__('Left', 'abcbiz-addons'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'abcbiz-addons'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'flex-end' => [
                        'title' => esc_html__('Right', 'abcbiz-addons'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .swiper-pagination.abcbiz-testimonial-slider-pagination' => 'justify-content: {{VALUE}};',
                ],
            ],
        );

        // testimonial pagination size
        $this->add_responsive_control(
            'abcbiz_ele_testimonial_slider_pagination_size',
            [
                'label' => esc_html__('Size', 'abcbiz-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%', 'vh', 'vw', 'rem', 'ex', 'ch', 'custom'],
                'default' => [
                    'unit' => 'px',
                    'size' => 15,
                ],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 1000,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .swiper-pagination.abcbiz-testimonial-slider-pagination .swiper-pagination-bullet' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // testimonial pagination gap
        $this->add_responsive_control(
            'abcbiz_ele_testimonial_slider_pagination_gap',
            [
                'label' => esc_html__('Gap', 'abcbiz-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .swiper-pagination.abcbiz-testimonial-slider-pagination' => 'gap: {{SIZE}}{{UNIT}};',
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 3,
                ],
            ]
        );

        // testimonial pagination indent
        $this->add_responsive_control(
            'abcbiz_ele_testimonial_slider_pagination_indent',
            [
                'label' => esc_html__('Indent', 'abcbiz-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'default' => [
                    'unit' => 'px',
                    'size' => 15,
                ],
                'range' => [
                    'px' => [
                        'min' => -200,
                        'max' => 1000,                    
                    ],                    
                ],
                'selectors' => [
                    '{{WRAPPER}} .swiper-pagination.abcbiz-testimonial-slider-pagination' => 'bottom: {{SIZE}}{{UNIT}};',
                ]
            ]
        );

        // testimonial pagination color
        $this->add_control(
            'abcbiz_ele_testimonial_slider_pagination_color',
            [
                'label' => esc_html__('Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#666666',
                'selectors' => [
                    '{{WRAPPER}} .swiper-pagination.abcbiz-testimonial-slider-pagination .swiper-pagination-bullet' => 'background-color: {{VALUE}};',
                ]
            ]
        );
        // testimonial pagination active color
        $this->add_control(
            'abcbiz_ele_testimonial_slider_pagination_active_color',
            [
                'label' => esc_html__('Active Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#374ae4',
                'selectors' => [
                    '{{WRAPPER}} .swiper-pagination.abcbiz-testimonial-slider-pagination .swiper-pagination-bullet.swiper-pagination-bullet-active' => 'background-color: {{VALUE}};',
                ]
            ]
        );
        $this->end_controls_section(); // end of testimonial slider pagination section
    }

    /**
     * Render the widget output on the frontend.
     */
    protected function render()

    {
        include 'RenderView.php';
    }
}