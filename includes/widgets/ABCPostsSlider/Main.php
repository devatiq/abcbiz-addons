<?php
namespace ABCBiz\Includes\Widgets\ABCPostsSlider;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Background;

class Main extends BaseWidget
{

    // define protected variables...
    protected $name = 'abcbiz-posts-slider';
    protected $title = 'ABC Posts Slider';
    protected $icon = 'eicon-posts-grid abcbiz-addons-icon';
    protected $categories = [
        'abcbiz-category'
    ];
    protected $keywords = [
        'slider',
        'posts',
    ];

    //dependency scripts
    public function get_script_depends()
    {
        return ['swiper', 'abcbiz-posts-sliders'];
    }


    public function get_style_depends()
    {
        return ['swiper'];
    }


    /**
     * Register the widget controls.
     *
     * Add input fields to allow the user to customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Settings', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'slides_per_view',
            [
                'label' => __('Slides Per View', 'abcbiz-addons'),
                'type' => Controls_Manager::NUMBER,
                'min' => 2,
                'max' => 15,
                'step' => 1,
                'default' => 3,
                'description' => __('Set how many slides will be visible at a time.', 'abcbiz-addons'),
            ]
        );

        $this->add_control(
            'slides_per_view_tablet',
            [
                'label' => __('Slides Per View in Tablet', 'abcbiz-addons'),
                'type' => Controls_Manager::NUMBER,
                'min' => 2,
                'max' => 15,
                'step' => 1,
                'default' => 2,
                'description' => __('Set how many slides will be visible at a time on tablet.', 'abcbiz-addons'),

            ]
        );

        $this->add_control(
            'slides_per_view_mobile',
            [
                'label' => __('Slides Per View in Mobile', 'abcbiz-addons'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 10,
                'step' => 1,
                'default' => 1,
                'description' => __('Set how many slides will be visible at a time on mobile.', 'abcbiz-addons'),
            ]
        );

        $this->add_control(
            'slider_loop',
            [
                'label' => __('Loop', 'abcbiz-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'abcbiz-addons'),
                'label_off' => __('No', 'abcbiz-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
                'description' => __('Enables endless loop mode.', 'abcbiz-addons'),
            ]
        );

        $this->add_control(
            'slider_autoplay',
            [
                'label' => __('Autoplay', 'abcbiz-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'abcbiz-addons'),
                'label_off' => __('No', 'abcbiz-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
                'description' => __('Enables autoplay mode.', 'abcbiz-addons'),
            ]
        );

        $this->add_control(
            'show_pagination',
            [
                'label' => __('Show Pagination', 'abcbiz-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'abcbiz-addons'),
                'label_off' => __('No', 'abcbiz-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
                'description' => __('Show pagination bullets.', 'abcbiz-addons'),
            ]
        );

        $this->add_control(
            'show_navigation',
            [
                'label' => __('Show Navigation', 'abcbiz-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'abcbiz-addons'),
                'label_off' => __('No', 'abcbiz-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
                'description' => __('Show navigation arrows.', 'abcbiz-addons'),
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_general',
            [
                'label' => __('General', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'item_border',
                'label' => __('Border', 'abcbiz-addons'),
                'selector' => '{{WRAPPER}} .abcbiz-posts-slider-thumbnail img',
            ]
        );

        $this->add_control(
            'section_border_radius',
            [
                'label' => __('Border Radius', 'abcbiz-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'default' => [
                    'top' => 10,
                    'right' => 10,
                    'bottom' => 10,
                    'left' => 10,
                    'unit' => 'px',
                    'isLinked' => true,
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-posts-slider-thumbnail img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .abcbiz-posts-slider-thumbnail::before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Title Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-posts-slider-title a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __('Title Typography', 'abcbiz-addons'),
                'selector' => '{{WRAPPER}} .abcbiz-posts-slider-title',
            ]
        );

        $this->add_control(
            'date_color',
            [
                'label' => __('Date Color', 'abcbiz-addons'),
                'default' => '#fff',
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-posts-slider-date' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .abcbiz-posts-slider-date svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'date_typography',
                'label' => __('Date Typography', 'abcbiz-addons'),
                'selector' => '{{WRAPPER}} .abcbiz-posts-slider-date',
            ]
        );

        $this->add_responsive_control(
            'icon_size',
            [
                'label' => __('Icon Size', 'abcbiz-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'default' => [
                    'unit' => 'px',
                    'size' => 16,
                ],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                    'em' => [
                        'min' => 1,
                        'max' => 10,
                    ],
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-posts-slider-date svg' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'indent_bottom',
            [
                'label' => __('Indent Bottom', 'abcbiz-addons'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 10,
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-posts-slider-contents' => 'padding-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'items_gap',
            [
                'label' => __('Gap', 'abcbiz-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'default' => [
                    'size' => 20,
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 150,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-posts-slider-wrapper' => 'gap:{{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section(); // End general styling section

        // Navigation Section
        $this->start_controls_section(
            'abcbiz_posts_slider_navigation',
            [
                'label' => esc_html__('Navigation', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_navigation' => 'yes',
                ],
            ]
        );

        // Navigation Size
        $this->add_responsive_control(
            'posts_nav_size',
            [
                'label' => esc_html__('Size', 'abcbiz-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 30,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-posts-slider-navigation .swiper-button-next svg, {{WRAPPER}} .abcbiz-posts-slider-navigation .swiper-button-prev svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Navigation Indents
        $this->add_responsive_control(
            'posts_nav_top_indent',
            [
                'label' => esc_html__('Top Indent', 'abcbiz-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => -500,
                        'max' => 500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-posts-slider-navigation .swiper-button-next, {{WRAPPER}} .abcbiz-posts-slider-navigation .swiper-button-prev' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Navigation Left Indent for Previous Button
        $this->add_responsive_control(
            'posts_nav_left_indent_prev',
            [
                'label' => esc_html__('Left Indent for Previous', 'abcbiz-addons'),
                'type' => Controls_Manager::SLIDER,
                'description' => esc_html__('Left Indent for Previous', 'abcbiz-addons'),
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => -500,
                        'max' => 500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-posts-slider-navigation .swiper-button-prev' => 'left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Navigation Right Indent for Next Button
        $this->add_responsive_control(
            'posts_nav_right_indent_next',
            [
                'label' => esc_html__('Right Indent for Next', 'abcbiz-addons'),
                'type' => Controls_Manager::SLIDER,
                'description' => esc_html__('Right Indent for Next', 'abcbiz-addons'),
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => -500,
                        'max' => 500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-posts-slider-navigation .swiper-button-next' => 'right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Tabs
        $this->start_controls_tabs('nav_tabs');
        $this->start_controls_tab(
            'nav_normal_tab',
            [
                'label' => esc_html__('Normal', 'abcbiz-addons'),
            ]
        );
        // Navigation Color
        $this->add_control(
            'posts_nav_color',
            [
                'label' => esc_html__('Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-posts-slider-navigation .swiper-button-next svg, {{WRAPPER}} .abcbiz-posts-slider-navigation .swiper-button-prev svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        // Navigation Background
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'posts_nav_background',
                'label' => esc_html__('Background', 'abcbiz-addons'),
                'types' => ['classic', 'gradient'],
                'exclude' => ['image'],
                'selector' => '{{WRAPPER}} .abcbiz-posts-slider-navigation .swiper-button-next svg, {{WRAPPER}} .abcbiz-posts-slider-navigation .swiper-button-prev svg',
            ]
        );

        $this->end_controls_tab(); // End Normal Tab

        // Hover Tab
        $this->start_controls_tab(
            'nav_hover_tab',
            [
                'label' => esc_html__('Hover', 'abcbiz-addons'),
            ]
        );
        // Navigation Color
        $this->add_control(
            'posts_nav_hover_color',
            [
                'label' => esc_html__('Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-posts-slider-navigation .swiper-button-next:hover svg, {{WRAPPER}} .abcbiz-posts-slider-navigation .swiper-button-prev:hover svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        // Navigation Background
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'posts_nav_hover_background',
                'label' => esc_html__('Background', 'abcbiz-addons'),
                'types' => ['classic', 'gradient'],
                'exclude' => ['image'],
                'selector' => '{{WRAPPER}} .abcbiz-posts-slider-navigation .swiper-button-next:hover svg, {{WRAPPER}} .abcbiz-posts-slider-navigation .swiper-button-prev:hover svg',
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section(); // End Navigation Section

        // Pagination Section
        $this->start_controls_section(
            'abcbiz_posts_slider_pagination',
            [
                'label' => esc_html__('Pagination', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_pagination' => 'yes',
                ],
            ]
        );

        // Pagination Size
        $this->add_responsive_control(
            'posts_pagination_size',
            [
                'label' => esc_html__('Size', 'abcbiz-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 15,
                        'max' => 50,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 15,
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-posts-slider-pagination .swiper-pagination-bullet' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Pagination Color
        $this->add_control(
            'posts_pagination_color',
            [
                'label' => esc_html__('Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ddd',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-posts-slider-pagination .swiper-pagination-bullet' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Pagination Active Color
        $this->add_control(
            'posts_pagination_active_color',
            [
                'label' => esc_html__('Active Color', 'abcbiz-addons'),
                'default' => '#5A49F8',
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-posts-slider-pagination .swiper-pagination-bullet.swiper-pagination-bullet-active' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Pagination Bottom Indent
        $this->add_responsive_control(
            'posts_pagination_bottom_indent',
            [
                'label' => esc_html__('Bottom Indent', 'abcbiz-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => -500,
                        'max' => 500,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-posts-slider-pagination .swiper-pagination' => 'bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Border
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'posts_pagination_border',
                'label' => esc_html__('Border', 'abcbiz-addons'),
                'selector' => '{{WRAPPER}} .abcbiz-posts-slider-pagination .swiper-pagination-bullet',
            ]
        );

        // Border Radius
        $this->add_control(
            'posts_pagination_border_radius',
            [
                'label' => esc_html__('Border Radius', 'abcbiz-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-posts-slider-pagination .swiper-pagination-bullet' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section(); // End Pagination Section




    }

    private function post_date_icon()
    {
        ?>

        <svg id="fi_2948088" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512"
            xmlns="http://www.w3.org/2000/svg">
            <g>
                <path
                    d="m446 40h-46v-24c0-8.836-7.163-16-16-16s-16 7.164-16 16v24h-224v-24c0-8.836-7.163-16-16-16s-16 7.164-16 16v24h-46c-36.393 0-66 29.607-66 66v340c0 36.393 29.607 66 66 66h380c36.393 0 66-29.607 66-66v-340c0-36.393-29.607-66-66-66zm-380 32h46v16c0 8.836 7.163 16 16 16s16-7.164 16-16v-16h224v16c0 8.836 7.163 16 16 16s16-7.164 16-16v-16h46c18.748 0 34 15.252 34 34v38h-448v-38c0-18.748 15.252-34 34-34zm380 408h-380c-18.748 0-34-15.252-34-34v-270h448v270c0 18.748-15.252 34-34 34z">
                </path>
            </g>
        </svg>
        <?php
    }

    /**
     * Render the widget output on the frontend.
     */
    protected function render()
    {
        include 'renderview.php';
    }
}