<?php

namespace Inc\Widgets\ABCTestimonials;

use Inc\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;

class Main extends BaseWidget
{

    // define protected variables...
    protected $name = 'ABC-Elementor-ABCTestimonials';
    protected $title = 'ABC Testimonial';
    protected $icon = 'eicon-testimonial-carousel';
    protected $categories = [
        'abc-category'
    ];
    protected $keywords = [
        'abc', 'testimonial', 'feedback', 'slider',
    ];

    public function get_script_depends()
    {
        return ['swiper', 'abc-testimonial-scripts'];
    }

    public function get_style_depends()
    {
        return ['swiper'];
    }

    /**
     * Register the widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'abc_elementor_testimonial_setting',
            [
                'label' => __('Testimonial Setting', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        // testimonial grid or slider selection
        $this->add_control(
            'abc_ele_testimonial_types',
            [
                'label' => __('Select Type', 'abcbiz-multi'),
                'type' => Controls_Manager::SELECT,
                'default' => 'grid',
                'options' => [
                    'grid' => __('Grid', 'abcbiz-multi'),
                    'slider' => __('Slider', 'abcbiz-multi'),
                ],
            ]
        );
        // testimonial column for desktop
        $this->add_control(
            'abc_ele_testimonial_column_desktop',
            [
                'label' => __('Desktop Column', 'abcbiz-multi'),
                'type' => Controls_Manager::NUMBER,
                'default' => 2,
                'min' => 1,
                'max' => 3,
                'frontend_available' => true,
                'condition' => [
                    'abc_ele_testimonial_types' => 'slider',
                ],
            ]
        );
        // testimonial column for tab
        $this->add_control(
            'abc_ele_testimonial_column_tab',
            [
                'label' => __('Tab Column', 'abcbiz-multi'),
                'type' => Controls_Manager::NUMBER,
                'default' => 1,                
                'min' => 1,
                'max' => 2,              
                'condition' => [
                    'abc_ele_testimonial_types' => 'slider',
                ],
            ]
        );
        // testimonial column for mobile
        $this->add_control(
            'abc_ele_testimonial_column_mobile',
            [
                'label' => __('Mobile Column', 'abcbiz-multi'),
                'type' => Controls_Manager::NUMBER,
                'default' => 1,
                'min' => 1,
                'max' => 2,   
                'condition' => [
                    'abc_ele_testimonial_types' => 'slider',
                ],
            ]
        );
        // total show items in the slideshow
        $this->add_control(
            'abc_ele_testimonial_total_count',
            [
                'label' => __('Total Testimonials', 'abcbiz-multi'),
                'type' => Controls_Manager::NUMBER,
                'default' => 6,
                'condition' => [
                    'abc_ele_testimonial_types' => 'slider',
                ],
            ]
        );
        //testimonial per page
        $this->add_control(
            'abc_ele_testimonial_grid_per_page',
            [
                'label' => __('Testimonial Per Page', 'abcbiz-multi'),
                'type' => Controls_Manager::NUMBER,
                'default' => 6,
                'condition' => [
                    'abc_ele_testimonial_types' => 'grid',
                ],
            ]
        );
        // autoplay on/off
        $this->add_control(
            'abc_ele_testimonial_autoplay',
            [
                'label' => __('Autoplay', 'abcbiz-multi'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('On', 'abcbiz-multi'),
                'label_off' => __('Off', 'abcbiz-multi'),
                'return_value' => 'true',
                'default' => 'true',
                'condition' => [
                    'abc_ele_testimonial_types' => 'slider',
                ],
            ]
        );
        // autoplay delay time
        $this->add_control(
            'abc_ele_testimonial_autoplay_delay',
            [
                'label' => __('Autoplay Delay', 'abcbiz-multi'),
                'type' => Controls_Manager::NUMBER,
                'default' => 5000,
                'condition' => [
                    'abc_ele_testimonial_autoplay' => 'true',
                    'abc_ele_testimonial_types' => 'slider',
                ],
            ],
        );

        // item quote icon
        $this->add_control(
            'abc_ele_testimonial_item_quote_icon',
            [
                'label' => esc_html__('Icon', 'abcbiz-multi'),
                'type' => Controls_Manager::ICONS,
            ]
        );

        // testimonial arrow on/off
        $this->add_control(
            'abc_ele_testimonial_slider_arrow',
            [
                'label' => __('Arrow', 'abcbiz-multi'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('On', 'abcbiz-multi'),
                'label_off' => __('Off', 'abcbiz-multi'),
                'return_value' => 'true',
                'default' => 'false',
                'condition' => [
                    'abc_ele_testimonial_types' => 'slider',
                ],
            ]
        );
        // testimonial slider pagination on/off
        $this->add_control(
            'abc_ele_testimonial_slider_pagination',
            [
                'label' => __('Pagination', 'abcbiz-multi'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('On', 'abcbiz-multi'),
                'label_off' => __('Off', 'abcbiz-multi'),
                'return_value' => 'true',
                'default' => 'true',
                'condition' => [
                    'abc_ele_testimonial_types' => 'slider',
                ],
            ]
        );

        //pagination on/off switcher
        $this->add_control(
            'abc_ele_testimonial_pagination',
            [
                'label' => __('Pagination', 'abcbiz-multi'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('On', 'abcbiz-multi'),
                'label_off' => __('Off', 'abcbiz-multi'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'abc_ele_testimonial_types' => 'grid',
                ],
            ]
        );


        // end of Testimonial section
        $this->end_controls_section();

        // start of Testimonial style section
        $this->start_controls_section(
            'abc_elementor_testimonial_style_setting',
            [
                'label' => __('Style', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        // testimonial wrapper background
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'Background',
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .abc-testimonial-single-item',
            ]
        );

        // testimonial title typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abc_ele_testimonial_title_typography',
                'label' => __('Title Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abc-testimonial-client-info h3',
            ]
        );
        // testimonial title color
        $this->add_control(
            'abc_ele_testimonial_title_color',
            [
                'label' => __('Title Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .abc-testimonial-client-info h3' => 'color: {{VALUE}}',
                ],
            ]
        );
        // testimonial designation typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abc_ele_testimonial_designation_typography',
                'label' => __('Designation Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abc-testimonial-client-info p',
            ]
        );
        // testimonial designation color
        $this->add_control(
            'abc_ele_testimonial_designation_color',
            [
                'label' => __('Designation Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#448E08',
                'selectors' => [
                    '{{WRAPPER}} .abc-testimonial-client-info p' => 'color: {{VALUE}}',
                ],
            ]
        );
        // testimonial content typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abc_ele_testimonial_content_typography',
                'label' => __('Content Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abc-testimonial-content p',
            ]
        );
        // testimonial content color
        $this->add_control(
            'abc_ele_testimonial_content_color',
            [
                'label' => __('Content Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .abc-testimonial-content p' => 'color: {{VALUE}}',
                ],
            ]
        );
        // testimonial rating size
        $this->add_responsive_control(
            'abc_ele_testimonial_rating_size',
            [
                'label' => __('Star Size', 'abcbiz-multi'),
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
                    '{{WRAPPER}} .abc-testimonial-rating i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        // testimonial rating color
        $this->add_control(
            'abc_ele_testimonial_rating_color',
            [
                'label' => __('Star Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#D3A500',
                'selectors' => [
                    '{{WRAPPER}} .abc-testimonial-rating i' => 'color: {{VALUE}}',
                ],
            ]
        );
        // testimonial quote icon size
        $this->add_responsive_control(
            'abc_ele_testimonial_quote_icon_size',
            [
                'label' => __('Quote Icon Size', 'abcbiz-multi'),
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
                    '{{WRAPPER}} .abc-testimonial-quote i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .abc-testimonial-quote svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        // testimonial quote icon color
        $this->add_control(
            'abc_ele_testimonial_quote_icon_color',
            [
                'label' => __('Quote Icon Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .abc-testimonial-quote i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .abc-testimonial-quote svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        // testimonial quote icon opacity
        $this->add_control(
            'abc_ele_testimonial_quote_icon_opacity',
            [
                'label' => esc_html__('Icon Opacity', 'abcbiz-multi'),
                'type' => Controls_Manager::NUMBER,
                'min' => 0.1,
                'max' => 1,
                'step' => 0.1,
                'default' => 0.4,
                'selectors' => [
                    '{{WRAPPER}} .abc-testimonial-quote i' => 'opacity: {{SIZE}};',
                    '{{WRAPPER}} .abc-testimonial-quote svg path' => 'fill-opacity: {{SIZE}};',
                ],
            ]
        );
        // end of testimonial section
        $this->end_controls_section();

        // testimonial pagination style section
        $this->start_controls_section(
            'abc_elementor_testimonial_pagination_style_setting',
            [
                'label' => __('Pagination', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'abc_ele_testimonial_pagination' => 'yes',
                    'abc_ele_testimonial_types' => 'grid',
                ],
            ]
        );
        // testimonial pagination color
        $this->add_control(
            'abc_ele_testimonial_pagination_color',
            [
                'label' => __('Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-elementor-pagination.abc-blog-list-pagi .page-numbers' => 'color: {{VALUE}}',
                ],
            ]
        );
        // testimonial pagination hover color
        $this->add_control(
            'abc_ele_testimonial_pagination_hover_color',
            [
                'label' => __('Hover/Active Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-elementor-pagination.abc-blog-list-pagi .page-numbers.current' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .abc-elementor-pagination.abc-blog-list-pagi .page-numbers:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        // testimonial pagination background color
        $this->add_control(
            'abc_ele_testimonial_pagination_bg_color',
            [
                'label' => __('Background Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-elementor-pagination.abc-blog-list-pagi .page-numbers' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        // testimonial pagination hover background color
        $this->add_control(
            'abc_ele_testimonial_pagination_hover_bg_color',
            [
                'label' => __('Hover/Active BG Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-elementor-pagination.abc-blog-list-pagi .page-numbers.current' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .abc-elementor-pagination.abc-blog-list-pagi .page-numbers:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        // testimonial pagination typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abc_ele_testimonial_pagination_typography',
                'label' => __('Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abc-elementor-pagination.abc-blog-list-pagi .page-numbers',
            ]
        );
        // testimonial pagination border radius
        $this->add_responsive_control(
            'abc_ele_testimonial_pagination_border_radius',
            [
                'label' => __('Border Radius', 'abcbiz-multi'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abc-elementor-pagination.abc-blog-list-pagi .page-numbers' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // testimonial pagination padding
        $this->add_responsive_control(
            'abc_ele_testimonial_pagination_padding',
            [
                'label' => __('Padding', 'abcbiz-multi'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abc-elementor-pagination.abc-blog-list-pagi .page-numbers' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // testimonial pagination gap
        $this->add_responsive_control(
            'abc_ele_testimonial_pagination_gap',
            [
                'label' => __('Gap', 'abcbiz-multi'),
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
                    '{{WRAPPER}} .abc-elementor-pagination.abc-blog-list-pagi .page-numbers' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        // testimonial pagination alignment
        $this->add_control(
            'abc_ele_testimonial_pagination_alignment',
            [
                'label' => __('Alignment', 'abcbiz-multi'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'abcbiz-multi'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'abcbiz-multi'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'abcbiz-multi'),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} .abc-elementor-pagination.abc-blog-list-pagi' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        // end of testimonial pagination section
        $this->end_controls_section();

        // testimonial arrow style section
        $this->start_controls_section(
            'abc_elementor_testimonial_arrow_style_setting',
            [
                'label' => __('Arrows', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'abc_ele_testimonial_slider_arrow' => 'true',
                ],

            ]
        );
        // testimonial arrow color
        $this->add_control(
            'abc_ele_testimonial_arrow_color',
            [
                'label' => __('Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .abc-testimonial-slider-nav-bar button.abc-testimonial-arrow svg' => 'fill: {{VALUE}}',
                ],
            ]
        );
        // testimonial arrow hover color
        $this->add_control(
            'abc_ele_testimonial_arrow_hover_color',
            [
                'label' => __('Hover Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .abc-testimonial-slider-nav-bar button.abc-testimonial-arrow:hover svg' => 'fill: {{VALUE}}',
                ],
            ]
        );
        // testimonial arrow background color
        $this->add_control(
            'abc_ele_testimonial_arrow_bg_color',
            [
                'label' => __('Background Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#59a818',
                'selectors' => [
                    '{{WRAPPER}} .abc-testimonial-slider-nav-bar button.abc-testimonial-arrow svg' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        // testimonial arrow hover background color
        $this->add_control(
            'abc_ele_testimonial_arrow_hover_bg_color',
            [
                'label' => __('Hover BG Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#FFAB01',
                'selectors' => [
                    '{{WRAPPER}} .abc-testimonial-slider-nav-bar button.abc-testimonial-arrow:hover svg' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        // testimonial arrow size
        $this->add_responsive_control(
            'abc_ele_testimonial_arrow_size',
            [
                'label' => __('Size', 'abcbiz-multi'),
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
                    '{{WRAPPER}} .abc-testimonial-slider-nav-bar .abc-testimonial-arrow' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .abc-testimonial-slider-nav-bar .abc-testimonial-arrow svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        // testimonial arrow border radius
        $this->add_responsive_control(
            'abc_ele_testimonial_arrow_border_radius',
            [
                'label' => __('Border Radius', 'abcbiz-multi'),
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
                    '{{WRAPPER}} .abc-testimonial-slider-nav-bar .abc-testimonial-arrow svg' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // testimonial arrow padding
        $this->add_responsive_control(
            'abc_ele_testimonial_arrow_padding',
            [
                'label' => __('Padding', 'abcbiz-multi'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abc-testimonial-slider-nav-bar .abc-testimonial-arrow svg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // arrow indent for normal device
        $this->add_control(
            'abc_ele_testimonial_arrow_normal_device_heading',
            [
                'label' => __('Alignment for Normal Device', 'abcbiz-multi'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        // testimonial navigation bar alignment
        $this->add_responsive_control(
            'abc_ele_testimonial_nav_bar_alignment',
            [
                'label' => __('Navigation Bar Alignment', 'abcbiz-multi'),
                'type' => Controls_Manager::CHOOSE,
                'default' => 'center',
                'options' => [
                    'left' => [
                        'title' => __('Left', 'abcbiz-multi'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'abcbiz-multi'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'abcbiz-multi'),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abc-testimonial-slider-nav-bar' => 'justify-content: {{VALUE}};',
                ],
            ]
        );

        //arrow gap
        $this->add_responsive_control(
            'abc_ele_testimonial_arrow_gap',
            [
                'label' => __('Gap', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%', 'vh', 'vw', 'rem', 'ex', 'ch', 'custom'],
                'range' => [
                    'px' => [
                        'min' => -200,
                        'max' => 1000,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abc-testimonial-slider-nav-bar' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // arrow heading for largest device
        $this->add_control(
            'abc_ele_testimonial_arrow_largest_device_heading',
            [
                'label' => __('Indent for Largest Device', 'abcbiz-multi'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        // testimonial left arrow top indent
        $this->add_responsive_control(
            'abc_ele_testimonial_left_arrow_top_indent',
            [
                'label' => __('Left Arrow Top Indent', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%', 'vh', 'vw', 'rem', 'ex', 'ch', 'custom'],
                'range' => [
                    'px' => [
                        'min' => -200,
                        'max' => 1000,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abc-testimonial-slider-nav-bar .abc-testimonial-arrow.abc-testimonial-arrow-left' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // testimonial left arrow left indent
        $this->add_responsive_control(
            'abc_ele_testimonial_left_arrow_left_indent',
            [
                'label' => __('Left Arrow Left Indent', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%', 'vh', 'vw', 'rem', 'ex', 'ch', 'custom'],
                'range' => [
                    'px' => [
                        'min' => -200,
                        'max' => 1000,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abc-testimonial-slider-nav-bar .abc-testimonial-arrow.abc-testimonial-arrow-left' => 'left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        // testimonial right arrow top indent
        $this->add_responsive_control(
            'abc_ele_testimonial_right_arrow_top_indent',
            [
                'label' => __('Right Arrow Top Indent', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%', 'vh', 'vw', 'rem', 'ex', 'ch', 'custom'],
                'range' => [
                    'px' => [
                        'min' => -200,
                        'max' => 1000,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abc-testimonial-slider-nav-bar .abc-testimonial-arrow.abc-testimonial-arrow-right' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        // testimonial right arrow right indent
        $this->add_responsive_control(
            'abc_ele_testimonial_right_arrow_right_indent',
            [
                'label' => __('Right Arrow Right Indent', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%', 'vh', 'vw', 'rem', 'ex', 'ch', 'custom'],
                'range' => [
                    'px' => [
                        'min' => -200,
                        'max' => 1000,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abc-testimonial-slider-nav-bar .abc-testimonial-arrow.abc-testimonial-arrow-right' => 'right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section(); // end of testimonial arrow section


        // start of testimonial slider pagination section
        $this->start_controls_section(
            'abc_ele_testimonial_slider_pagination_style',
            [
                'label' => __('Pagination', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'abc_ele_testimonial_slider_pagination' => 'true',
                ],
            ]
        );
        // testimonial pagination alignment
        $this->add_responsive_control(
            'abc_ele_testimonial_slider_pagination_alignment',
            [
                'label' => __('Alignment', 'abcbiz-multi'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'flex-start' => [
                        'title' => __('Left', 'abcbiz-multi'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'abcbiz-multi'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'flex-end' => [
                        'title' => __('Right', 'abcbiz-multi'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .swiper-pagination.abc-testimonial-slider-pagination' => 'justify-content: {{VALUE}};',
                ],
            ],
        );

        // testimonial pagination size
        $this->add_responsive_control(
            'abc_ele_testimonial_slider_pagination_size',
            [
                'label' => __('Size', 'abcbiz-multi'),
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
                    '{{WRAPPER}} .swiper-pagination.abc-testimonial-slider-pagination .swiper-pagination-bullet' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // testimonial pagination gap
        $this->add_responsive_control(
            'abc_ele_testimonial_slider_pagination_gap',
            [
                'label' => __('Gap', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .swiper-pagination.abc-testimonial-slider-pagination' => 'gap: {{SIZE}}{{UNIT}};',
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 3,
                ],
            ]
        );

        // testimonial pagination indent
        $this->add_responsive_control(
            'abc_ele_testimonial_slider_pagination_indent',
            [
                'label' => __('Indent', 'abcbiz-multi'),
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
                    '{{WRAPPER}} .swiper-pagination.abc-testimonial-slider-pagination' => 'bottom: {{SIZE}}{{UNIT}};',
                ]
            ]
        );

        // testimonial pagination color
        $this->add_control(
            'abc_ele_testimonial_slider_pagination_color',
            [
                'label' => __('Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#666666',
                'selectors' => [
                    '{{WRAPPER}} .swiper-pagination.abc-testimonial-slider-pagination .swiper-pagination-bullet' => 'background-color: {{VALUE}};',
                ]
            ]
        );
        // testimonial pagination active color
        $this->add_control(
            'abc_ele_testimonial_slider_pagination_active_color',
            [
                'label' => __('Active Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#448E08',
                'selectors' => [
                    '{{WRAPPER}} .swiper-pagination.abc-testimonial-slider-pagination .swiper-pagination-bullet.swiper-pagination-bullet-active' => 'background-color: {{VALUE}};',
                ]
            ]
        );
        $this->end_controls_section(); // end of testimonial slider pagination section
    }

    /**
     * Render the widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function render()

    {
        //load render view to show widget output on frontend/website.
        include 'RenderView.php';
    }
}
