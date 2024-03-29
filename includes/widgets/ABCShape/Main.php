<?php
namespace ABCBiz\Includes\Widgets\ABCShape;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;


class Main extends BaseWidget
{
    // define protected variables...
    protected $name = 'abcbiz-elementor-aminshape';
    protected $title = 'ABC Animated Shape';
    protected $icon = 'eicon-shape abcbiz-addons-icon';
    protected $categories = [
        'abcbiz-category'
    ];

    public function get_style_depends()
    {
        return ['abcbiz-animation'];
    }

    /**
     * Register the widget controls.
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'abcbiz_elementor_shape_settings',
            [
                'label' => esc_html__('Shape', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        //shape type
        $this->add_control(
            'abcbiz_elementor_shape_type',
            [
                'label' => esc_html__('Shape Type', 'abcbiz-addons'),
                'type' => Controls_Manager::SELECT,
                'default' => 'circle',
                'options' => [
                    'circle' => esc_html__('Circle', 'abcbiz-addons'),
                    'square' => esc_html__('Square', 'abcbiz-addons'),
                    'image' => esc_html__('Image', 'abcbiz-addons'),
                ],
            ]
        );
        //image shape
        $this->add_control(
            'abcbiz_elementor_shape_image',
            [
                'label' => esc_html__('Choose Image', 'abcbiz-addons'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                
                'condition' => [
                    'abcbiz_elementor_shape_type' => 'image',
                ],
            ]
        );

         //image shape
         $this->add_control(
            'abcbiz_elementor_shape_image_alt',
            [
                'label' => esc_html__('Image Alt Text', 'abcbiz-addons'),
                'type' => Controls_Manager::TEXT,
                'default' => 'ABCBiz Image',
                'condition' => [
                    'abcbiz_elementor_shape_type' => 'image',
                ],
            ]
        );

        //animation show/hide
        $this->add_control(
            'abcbiz_elementor_shape_animation',
            [
                'label' => esc_html__('Animation', 'abcbiz-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'abcbiz-addons'),
                'label_off' => esc_html__('Hide', 'abcbiz-addons'),
                'return_value' => 'yes',
                'default' => '',
            ]
        );
        //select animation
        $this->add_control(
            'abcbiz_elementor_shape_animation_effect',
            [
                'label' => esc_html__('Animation Type', 'abcbiz-addons'),
                'type' => Controls_Manager::SELECT,
                'default' => 'ABCSpin',
                'options' => [
                    'ABCxAxisMove' => esc_html__('X-Axis Move', 'abcbiz-addons'),
                    'ABCyAxisMove' => esc_html__('Y-Axis Move', 'abcbiz-addons'),
                    'ABCtriAngleMove' => esc_html__('Triangle Move', 'abcbiz-addons'),
                    'ABCSpin' => esc_html__('Spin', 'abcbiz-addons'),
                    'ABCRotationMove' => esc_html__('Rotation Move', 'abcbiz-addons'),
                    'ABCTilt' => esc_html__('Tilt', 'abcbiz-addons'),
                    'ABCTimeLineAnimate' => esc_html__('Timeline Animate', 'abcbiz-addons'),
                    'ABCSpinMove' => esc_html__('Spin Move', 'abcbiz-addons'),
                    'ABCclockSpin' => esc_html__('Clockwise Spin', 'abcbiz-addons'),
                    'ABCAntiClockSpin' => esc_html__('Anti-Clockwise Spin', 'abcbiz-addons'),
                    'ABCRotating' => esc_html__('Rotating', 'abcbiz-addons'),
                ],
                'condition' => [
                    'abcbiz_elementor_shape_animation' => 'yes',
                ],
            ]
        );
                
        $this->end_controls_section();

        //abc shape style
        $this->start_controls_section(
            'abcbiz_elementor_shape_style',
            [
                'label' => esc_html__('Shape Style', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'abcbiz_elementor_shape_type!' => 'image',
                ],
            ]
        );

        //shape border radius
        $this->add_responsive_control(
            'abcbiz_elementor_shape_border_radius',
            [
                'label' => esc_html__('Border Radius', 'abcbiz-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-shape-area .abcbiz-ele-shape' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        //shape size
        $this->add_responsive_control(
            'abcbiz_elementor_shape_size',
            [
                'label' => esc_html__('Size', 'abcbiz-addons'),
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
                    '{{WRAPPER}} .abcbiz-shape-area .abcbiz-ele-shape' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        //shape normal/hover tabs
        $this->start_controls_tabs('abcbiz_elementor_shape_style_tabs');

        //shape normal tab
        $this->start_controls_tab(
            'abcbiz_elementor_shape_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'abcbiz-addons'),
            ]
        );

        //shape background 
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'abcbiz_elementor_shape_background',
                'label' => esc_html__('Background', 'abcbiz-addons'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .abcbiz-shape-area .abcbiz-ele-shape',
            ]
        );

        //shape border
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'abcbiz_elementor_shape_border',
                'selector' => '{{WRAPPER}} .abcbiz-shape-area .abcbiz-ele-shape',
            ]
        );

        $this->end_controls_tab();

        //shape hover tab
        $this->start_controls_tab(
            'abcbiz_elementor_shape_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'abcbiz-addons'),
            ]
        );

        //shape hover background
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'abcbiz_elementor_shape_hover_background',
                'label' => esc_html__('Background', 'abcbiz-addons'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .abcbiz-shape-area:hover .abcbiz-ele-shape',
            ]
        );

        //shape hover border color
        $this->add_control(
            'abcbiz_elementor_shape_border_hover_color',
            [
                'label' => esc_html__('Border Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-shape-area:hover .abcbiz-ele-shape' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        //end of shape style
        $this->end_controls_section();

        //abc shape image style
        $this->start_controls_section(
            'abcbiz_elementor_shape_image_style',
            [
                'label' => esc_html__('Image', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'abcbiz_elementor_shape_type' => 'image',
                ]
            ]
        );

        $this->add_control(
            'abcbiz_elementor_shape_image_width',
            [
                'label' => esc_html__('Width', 'abcbiz-addons'),
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
                    '{{WRAPPER}} .abcbiz-shape-area .abcbiz-shape-image img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        // Border settings
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'abcbiz_elementor_image_border',
                'label' => esc_html__('Border', 'abcbiz-addons'),
                'selector' => '{{WRAPPER}} .abcbiz-shape-area .abcbiz-shape-image img',
            ]
        );

        // Border Radius settings
        $this->add_control(
            'abcbiz_elementor_image_border_radius',
            [
                'label' => __('Border Radius', 'abcbiz-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-shape-area .abcbiz-shape-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
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
