<?php

namespace Inc\Widgets\ABCShape;

use Inc\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;


class Main extends BaseWidget
{
    // define protected variables...
    protected $name = 'ABC-Elementor-ABCShape';
    protected $title = 'ABC Animated Shape';
    protected $icon = 'eicon-shape';
    protected $categories = [
        'abc-category'
    ];

    public function get_style_depends()
    {
        return ['abc-animation'];
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
            'abc_elementor_shape_settings',
            [
                'label' => __('Shape', 'ABCMAFTH'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        //shape type
        $this->add_control(
            'abc_elementor_shape_type',
            [
                'label' => esc_html__('Shape Type', 'ABCMAFTH'),
                'type' => Controls_Manager::SELECT,
                'default' => 'circle',
                'options' => [
                    'circle' => esc_html__('Circle', 'ABCMAFTH'),
                    'square' => esc_html__('Square', 'ABCMAFTH'),
                    'image' => esc_html__('Image', 'ABCMAFTH'),
                ],
            ]
        );
        //image shape
        $this->add_control(
            'abc_elementor_shape_image',
            [
                'label' => esc_html__('Choose Image', 'ABCMAFTH'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                
                'condition' => [
                    'abc_elementor_shape_type' => 'image',
                ],
            ]
        );
        //animation show/hide
        $this->add_control(
            'abc_elementor_shape_animation',
            [
                'label' => esc_html__('Animation', 'ABCMAFTH'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'ABCMAFTH'),
                'label_off' => esc_html__('Hide', 'ABCMAFTH'),
                'return_value' => 'yes',
                'default' => '',
            ]
        );
        //select animation
        $this->add_control(
            'abc_elementor_shape_animation_effect',
            [
                'label' => esc_html__('Animation Type', 'ABCMAFTH'),
                'type' => Controls_Manager::SELECT,
                'default' => 'ABCSpin',
                'options' => [
                    'ABCxAxisMove' => esc_html__('X-Axis Move', 'ABCMAFTH'),
                    'ABCyAxisMove' => esc_html__('Y-Axis Move', 'ABCMAFTH'),
                    'ABCtriAngleMove' => esc_html__('Triangle Move', 'ABCMAFTH'),
                    'ABCSpin' => esc_html__('Spin', 'ABCMAFTH'),
                    'ABCRotationMove' => esc_html__('Rotation Move', 'ABCMAFTH'),
                    'ABCTilt' => esc_html__('Tilt', 'ABCMAFTH'),
                    'ABCTimeLineAnimate' => esc_html__('Timeline Animate', 'ABCMAFTH'),
                    'ABCSpinMove' => esc_html__('Spin Move', 'ABCMAFTH'),
                    'ABCclockSpin' => esc_html__('Clockwise Spin', 'ABCMAFTH'),
                    'ABCAntiClockSpin' => esc_html__('Anti-Clockwise Spin', 'ABCMAFTH'),
                    'ABCRotating' => esc_html__('Rotating', 'ABCMAFTH'),
                ],
                'condition' => [
                    'abc_elementor_shape_animation' => 'yes',
                ],
            ]
        );
                

        $this->end_controls_section();

        //abc shape style
        $this->start_controls_section(
            'abc_elementor_shape_style',
            [
                'label' => __('Shape Style', 'ABCMAFTH'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'abc_elementor_shape_type!' => 'image',
                ],
            ]
        );

        //shape border radius
        $this->add_responsive_control(
            'abc_elementor_shape_border_radius',
            [
                'label' => __('Border Radius', 'ABCMAFTH'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abc-shape-area .abc-ele-shape' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        //shape size
        $this->add_responsive_control(
            'abc_elementor_shape_size',
            [
                'label' => __('Size', 'ABCMAFTH'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 500,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abc-shape-area .abc-ele-shape' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        //shape normal/hover tabs
        $this->start_controls_tabs('abc_elementor_shape_style_tabs');

        //shape normal tab
        $this->start_controls_tab(
            'abc_elementor_shape_style_normal_tab',
            [
                'label' => __('Normal', 'ABCMAFTH'),
            ]
        );

        //shape background 
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'abc_elementor_shape_background',
                'label' => __('Background', 'ABCMAFTH'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .abc-shape-area .abc-ele-shape',
            ]
        );

        //shape border
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'abc_elementor_shape_border',
                'selector' => '{{WRAPPER}} .abc-shape-area .abc-ele-shape',
            ]
        );

        $this->end_controls_tab();

        //shape hover tab
        $this->start_controls_tab(
            'abc_elementor_shape_style_hover_tab',
            [
                'label' => __('Hover', 'ABCMAFTH'),
            ]
        );

        //shape hover background
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'abc_elementor_shape_hover_background',
                'label' => __('Background', 'ABCMAFTH'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .abc-shape-area:hover .abc-ele-shape',
            ]
        );

        //shape hover border color
        $this->add_control(
            'abc_elementor_shape_border_hover_color',
            [
                'label' => __('Border Color', 'ABCMAFTH'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-shape-area:hover .abc-ele-shape' => 'border-color: {{VALUE}};',
                ],
            ]
        );



        $this->end_controls_tab();

        $this->end_controls_tabs();


        //end of shape style
        $this->end_controls_section();

        //abc shape image style
        $this->start_controls_section(
            'abc_elementor_shape_image_style',
            [
                'label' => __('Image', 'ABCMAFTH'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'abc_elementor_shape_type' => 'image',
                ]
            ]
        );

        $this->add_control(
            'abc_elementor_shape_image_width',
            [
                'label' => __('Width', 'ABCMAFTH'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'default' => [
                    'unit' => 'px',
                    'size' => 150,
                ],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 1000,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abc-shape-area .abc-shape-image img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        // Border settings
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'abc_elementor_image_border',
                'label' => __('Border', 'ABCMAFTH'),
                'selector' => '{{WRAPPER}} .abc-shape-area .abc-shape-image img',
            ]
        );

        // Border Radius settings
        $this->add_control(
            'abc_elementor_image_border_radius',
            [
                'label' => __('Border Radius', 'ABCMAFTH'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abc-shape-area .abc-shape-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
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
