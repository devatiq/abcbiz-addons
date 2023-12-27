<?php
namespace Includes\Widgets\ABCTestimonials;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;

class Main extends BaseWidget
{

    // define protected variables...
    protected $name = 'abcbiz-elementor-testimonial';
    protected $title = 'ABC Testimonial';
    protected $icon = 'eicon-testimonial-carousel';
    protected $categories = [
        'abcbiz-category'
    ];
    protected $keywords = [
        'abc', 'testimonial', 'feedback', 'slider',
    ];

    public function get_script_depends()
    {
        return ['swiper', 'abcbiz-testimonial-scripts'];
    }

    public function get_style_depends()
    {
        return ['swiper'];
    }

    /**
     * Register the widget controls.
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'abcbiz_elementor_testimonial_setting',
            [
                'label' => esc_html__('Testimonial Setting', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        // testimonial grid or slider selection
        $this->add_control(
            'abcbiz_ele_testimonial_types',
            [
                'label' => esc_html__('Select Type', 'abcbiz-multi'),
                'type' => Controls_Manager::SELECT,
                'default' => 'grid',
                'options' => [
                    'grid' => esc_html__('Grid', 'abcbiz-multi'),
                    'slider' => esc_html__('Slider', 'abcbiz-multi'),
                ],
            ]
        );
        // testimonial column for desktop
        $this->add_control(
            'abcbiz_ele_testimonial_column_desktop',
            [
                'label' => esc_html__('Desktop Column', 'abcbiz-multi'),
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
                'label' => esc_html__('Tab Column', 'abcbiz-multi'),
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
                'label' => esc_html__('Mobile Column', 'abcbiz-multi'),
                'type' => Controls_Manager::NUMBER,
                'default' => 1,
                'min' => 1,
                'max' => 2,   
                'condition' => [
                    'abcbiz_ele_testimonial_types' => 'slider',
                ],
            ]
        );
        // total show items in the slideshow
        $this->add_control(
            'abcbiz_ele_testimonial_total_count',
            [
                'label' => esc_html__('Total Testimonials', 'abcbiz-multi'),
                'type' => Controls_Manager::NUMBER,
                'default' => 6,
                'condition' => [
                    'abcbiz_ele_testimonial_types' => 'slider',
                ],
            ]
        );
        //testimonial per page
        $this->add_control(
            'abcbiz_ele_testimonial_grid_per_page',
            [
                'label' => esc_html__('Testimonial Per Page', 'abcbiz-multi'),
                'type' => Controls_Manager::NUMBER,
                'default' => 6,
                'condition' => [
                    'abcbiz_ele_testimonial_types' => 'grid',
                ],
            ]
        );
        // autoplay on/off
        $this->add_control(
            'abcbiz_ele_testimonial_autoplay',
            [
                'label' => esc_html__('Autoplay', 'abcbiz-multi'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('On', 'abcbiz-multi'),
                'label_off' => esc_html__('Off', 'abcbiz-multi'),
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
                'label' => esc_html__('Autoplay Delay', 'abcbiz-multi'),
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
                'label' => esc_html__('Icon', 'abcbiz-multi'),
                'type' => Controls_Manager::ICONS,
            ]
        );

        // testimonial arrow on/off
        $this->add_control(
            'abcbiz_ele_testimonial_slider_arrow',
            [
                'label' => esc_html__('Arrow', 'abcbiz-multi'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('On', 'abcbiz-multi'),
                'label_off' => esc_html__('Off', 'abcbiz-multi'),
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
                'label' => esc_html__('Pagination', 'abcbiz-multi'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('On', 'abcbiz-multi'),
                'label_off' => esc_html__('Off', 'abcbiz-multi'),
                'return_value' => 'true',
                'default' => 'true',
                'condition' => [
                    'abcbiz_ele_testimonial_types' => 'slider',
                ],
            ]
        );

        //pagination on/off switcher
        $this->add_control(
            'abcbiz_ele_testimonial_pagination',
            [
                'label' => esc_html__('Pagination', 'abcbiz-multi'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('On', 'abcbiz-multi'),
                'label_off' => esc_html__('Off', 'abcbiz-multi'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'abcbiz_ele_testimonial_types' => 'grid',
                ],
            ]
        );


        // end of Testimonial section
        $this->end_controls_section();

        // start of Testimonial style section
        $this->start_controls_section(
            'abcbiz_elementor_testimonial_style_setting',
            [
                'label' => esc_html__('Style', 'abcbiz-multi'),
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
                'label' => esc_html__('Title Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-testimonial-client-info h3',
            ]
        );
        // testimonial title color
        $this->add_control(
            'abcbiz_ele_testimonial_title_color',
            [
                'label' => esc_html__('Title Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
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
                'label' => esc_html__('Designation Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-testimonial-client-info p',
            ]
        );
        // testimonial designation color
        $this->add_control(
            'abcbiz_ele_testimonial_designation_color',
            [
                'label' => esc_html__('Designation Color', 'abcbiz-multi'),
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
                'label' => esc_html__('Content Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-testimonial-content p',
            ]
        );
        // testimonial content color
        $this->add_control(
            'abcbiz_ele_testimonial_content_color',
            [
                'label' => esc_html__('Content Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-testimonial-content p' => 'color: {{VALUE}}',
                ],
            ]
        );
        // testimonial rating size
        $this->add_responsive_control(
            'abcbiz_ele_testimonial_rating_size',
            [
                'label' => esc_html__('Star Size', 'abcbiz-multi'),
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
                'label' => esc_html__('Star Color', 'abcbiz-multi'),
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
                'label' => esc_html__('Quote Icon Size', 'abcbiz-multi'),
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
        // testimonial quote icon color
        $this->add_control(
            'abcbiz_ele_testimonial_quote_icon_color',
            [
                'label' => esc_html__('Quote Icon Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
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
                'label' => esc_html__('Icon Opacity', 'abcbiz-multi'),
                'type' => Controls_Manager::NUMBER,
                'min' => 0.1,
                'max' => 1,
                'step' => 0.1,
                'default' => 0.4,
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
                'label' => esc_html__('Pagination', 'abcbiz-multi'),
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
                'label' => esc_html__('Color', 'abcbiz-multi'),
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
                'label' => esc_html__('Hover/Active Color', 'abcbiz-multi'),
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
                'label' => esc_html__('Background Color', 'abcbiz-multi'),
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
                'label' => esc_html__('Hover/Active BG Color', 'abcbiz-multi'),
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
                'label' => esc_html__('Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-elementor-pagination.abcbiz-blog-list-pagi .page-numbers',
            ]
        );
        // testimonial pagination border radius
        $this->add_responsive_control(
            'abcbiz_ele_testimonial_pagination_border_radius',
            [
                'label' => esc_html__('Border Radius', 'abcbiz-multi'),
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
                'label' => esc_html__('Padding', 'abcbiz-multi'),
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
                'label' => esc_html__('Gap', 'abcbiz-multi'),
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
                'label' => esc_html__('Alignment', 'abcbiz-multi'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'abcbiz-multi'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'abcbiz-multi'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'abcbiz-multi'),
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
                'label' => esc_html__('Arrows', 'abcbiz-multi'),
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
                'label' => esc_html__('Color', 'abcbiz-multi'),
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
                'label' => esc_html__('Hover Color', 'abcbiz-multi'),
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
                'label' => esc_html__('Background Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#59a818',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-testimonial-slider-nav-bar button.abcbiz-testimonial-arrow svg' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        // testimonial arrow hover background color
        $this->add_control(
            'abcbiz_ele_testimonial_arrow_hover_bg_color',
            [
                'label' => esc_html__('Hover BG Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#FFAB01',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-testimonial-slider-nav-bar button.abcbiz-testimonial-arrow:hover svg' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        // testimonial arrow size
        $this->add_responsive_control(
            'abcbiz_ele_testimonial_arrow_size',
            [
                'label' => esc_html__('Size', 'abcbiz-multi'),
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
                'label' => esc_html__('Border Radius', 'abcbiz-multi'),
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
                'label' => esc_html__('Padding', 'abcbiz-multi'),
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
                'label' => esc_html__('Alignment for Normal Device', 'abcbiz-multi'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        // testimonial navigation bar alignment
        $this->add_responsive_control(
            'abcbiz_ele_testimonial_nav_bar_alignment',
            [
                'label' => esc_html__('Navigation Bar Alignment', 'abcbiz-multi'),
                'type' => Controls_Manager::CHOOSE,
                'default' => 'center',
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'abcbiz-multi'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'abcbiz-multi'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'abcbiz-multi'),
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
                'label' => esc_html__('Gap', 'abcbiz-multi'),
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
                'label' => esc_html__('Indent for Largest Device', 'abcbiz-multi'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        // testimonial left arrow top indent
        $this->add_responsive_control(
            'abcbiz_ele_testimonial_left_arrow_top_indent',
            [
                'label' => esc_html__('Left Arrow Top Indent', 'abcbiz-multi'),
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
                'label' => esc_html__('Left Arrow Left Indent', 'abcbiz-multi'),
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
                'label' => esc_html__('Right Arrow Top Indent', 'abcbiz-multi'),
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
                'label' => esc_html__('Right Arrow Right Indent', 'abcbiz-multi'),
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
                'label' => esc_html__('Pagination', 'abcbiz-multi'),
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
                'label' => esc_html__('Alignment', 'abcbiz-multi'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'flex-start' => [
                        'title' => esc_html__('Left', 'abcbiz-multi'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'abcbiz-multi'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'flex-end' => [
                        'title' => esc_html__('Right', 'abcbiz-multi'),
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
                'label' => esc_html__('Size', 'abcbiz-multi'),
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
                'label' => esc_html__('Gap', 'abcbiz-multi'),
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
                'label' => esc_html__('Indent', 'abcbiz-multi'),
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
                'label' => esc_html__('Color', 'abcbiz-multi'),
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
                'label' => esc_html__('Active Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#448E08',
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
