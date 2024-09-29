<?php
namespace ABCBiz\Includes\Widgets\ABCTemplateSlider;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Plugin;
use Elementor\Repeater;


class Main extends BaseWidget
{

    // define protected variables...
    protected $name = 'abcbiz-ABCTemplateSlider';
    protected $title = 'ABC Template Slider';
    protected $icon = 'eicon-testimonial-carousel abcbiz-addons-icon';
    protected $categories = [
        'abcbiz-category'
    ];
    protected $keywords = [
        'abc',
        'carousel',
        'slider',
    ];

    public function get_script_depends()
    {
        return ['swiper', 'abcbiz-template-slider'];
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

        // Start content section
        $this->start_controls_section(
            'abcbiz_slider_contents',
            [
                'label' => esc_html__('Slides', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        // Fetch Elementor templates to populate repeater
        $templates = Plugin::instance()->templates_manager->get_source('local')->get_items();
        $template_options = [];

        if (!empty($templates)) {
            foreach ($templates as $template) {
                $template_options[$template['template_id']] = $template['title'];
            }
        }

        // Define the repeater
        $repeater = new Repeater();

        // Add the repeater controls
        $repeater->add_control(
            'template_select',
            [
                'label' => esc_html__('Choose Template', 'abcbiz-addons'),
                'type' => Controls_Manager::SELECT2,
                'options' => $template_options,
                'description' => esc_html__('Choose a template from Elementor', 'abcbiz-addons'),
                'label_block' => true,
            ]
        );

        // Add more controls within the repeater if necessary (e.g., text, images, etc.)
        $repeater->add_control(
            'slide_title',
            [
                'label' => esc_html__('Slide Title', 'abcbiz-addons'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Slide Title', 'abcbiz-addons'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'slides',
            [
                'label' => esc_html__('Slides', 'abcbiz-addons'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'slide_title' => esc_html__('Slide 1', 'abcbiz-addons'),
                    ],
                    [
                        'slide_title' => esc_html__('Slide 2', 'abcbiz-addons'),
                    ],
                ],
                'title_field' => '{{{ slide_title }}}',
            ]
        );

        $this->end_controls_section(); //end content section


        // start slider settings section
        $this->start_controls_section(
            'abcbiz_slider_settings',
            [
                'label' => esc_html__('Slider Settings', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_responsive_control(
            'slides_per_view',
            [
                'label' => esc_html__('Slides Per View', 'abcbiz-addons'),
                'type' => Controls_Manager::NUMBER,
                'default' => 1,
                'desktop_default' => 1,
                'tablet_default' => 1,
                'mobile_default' => 1,
            ]
        );

        $this->add_control(
            'slider_loop',
            [
                'label' => esc_html__('Loop', 'abcbiz-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'abcbiz-addons'),
                'label_off' => esc_html__('No', 'abcbiz-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'slider_autoplay',
            [
                'label' => esc_html__('Autoplay', 'abcbiz-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'abcbiz-addons'),
                'label_off' => esc_html__('No', 'abcbiz-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_pagination',
            [
                'label' => esc_html__('Show Pagination', 'abcbiz-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'abcbiz-addons'),
                'label_off' => esc_html__('No', 'abcbiz-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_arrows',
            [
                'label' => esc_html__('Show Navigation', 'abcbiz-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'abcbiz-addons'),
                'label_off' => esc_html__('No', 'abcbiz-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->end_controls_section(); //end slider settings section


        // start style section
        $this->start_controls_section(
            'abcbiz_slider_style',
            [
                'label' => esc_html__('Style', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'slider_padding',
            [
                'label' => esc_html__('Padding', 'abcbiz-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-addons-slider-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'slider_gap',
            [
                'label' => esc_html__('Gap', 'abcbiz-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .swiper-slide' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section(); //end style section


        // start navigation section
        $this->start_controls_section(
            'abcbiz_slider_navigation',
            [
                'label' => esc_html__('Navigation', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_arrows' => 'yes',
                ],
            ]
        );

        // nav color
        $this->add_control(
            'nav_color',
            [
                'label' => esc_html__('Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .abcbiz-addons-slider-wrapper .swiper-button-prev, {{WRAPPER}}  .abcbiz-addons-slider-wrapper .swiper-button-next' => 'color: {{VALUE}};',
                ],
            ]
        );

        // nav size
        $this->add_responsive_control(
            'nav_size',
            [
                'label' => esc_html__('Size', 'abcbiz-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 400,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-addons-slider-wrapper .swiper-button-next:after, {{WRAPPER}} .abcbiz-addons-slider-wrapper .swiper-button-prev::after' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // prev nav left indent
        $this->add_responsive_control(
            'nav_prev_left_indent',
            [
                'label' => esc_html__('Prev Left Indent', 'abcbiz-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .swiper-button-prev' => 'left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // next nav right indent
        $this->add_responsive_control(
            'nav_next_right_indent',
            [
                'label' => esc_html__('Next Right Indent', 'abcbiz-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .swiper-button-next' => 'right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // nav top indent
        $this->add_responsive_control(
            'nav_top_indent',
            [
                'label' => esc_html__('Top Indent', 'abcbiz-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                    ],
                    '%' => [
                        'min' => -50,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .swiper-button-next, {{WRAPPER}} .swiper-button-prev' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section(); // end navigation section


        // pagination section
        $this->start_controls_section(
            'pagination_section',
            [
                'label' => esc_html__('Pagination', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_pagination' => 'yes',
                ],
            ]
        );

        // pagination size
        $this->add_responsive_control(
            'pagination_size',
            [
                'label' => esc_html__('Size', 'abcbiz-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 200,
                    ],
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-addons-slider-wrapper .swiper-pagination-bullet' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // pagination color
        $this->add_control(
            'pagination_color',
            [
                'label' => esc_html__('Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-addons-slider-wrapper .swiper-pagination-bullet' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // pagination active color
        $this->add_control(
            'pagination_active_color',
            [
                'label' => esc_html__('Active Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-addons-slider-wrapper .swiper-pagination-bullet.swiper-pagination-bullet-active' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // pagination bottom indent
        $this->add_responsive_control(
            'pagination_bottom_indent',
            [
                'label' => esc_html__('Bottom Indent', 'abcbiz-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-addons-slider-wrapper .swiper-pagination' => 'bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->end_controls_section(); // end pagination section

    }


    /**
     * Render the widget output on the frontend.
     */
    protected function render()
    {
        include 'RenderView.php';
    }
}