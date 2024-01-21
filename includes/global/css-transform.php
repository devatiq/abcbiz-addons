<?php 
namespace ABCBiz\Includes\global;

// If this file is called directly, abort!!!
defined('ABSPATH') or die('This is not the place you deserve!');

use Elementor\Element_Base;
use Elementor\Controls_Manager;

class CSS_Transform {

    public static function init() {
        add_action('elementor/element/common/_section_style/after_section_end', [__CLASS__, 'register'], 1);
    }

    public static function register(Element_Base $element) {
        $element->start_controls_section(
            'abcbiz_section_css_transform',
            [
                'label' => __( 'ABC CSS Transform', 'abcbiz-multi' ),
                'tab' => Controls_Manager::TAB_ADVANCED,
            ]
        );

        $element->add_control(
            'abcbiz_transform_fx',
            [
                'label' => __( 'Enable', 'abcbiz-multi' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'prefix_class' => 'abcbiz-css-transform-',
            ]
        );

        $element->start_controls_tabs(
            '_tabs_abcbiz_transform',
            [
                'condition' => [
                    'abcbiz_transform_fx' => 'yes',
                ],
            ]
        );

        // Normal tab
        $element->start_controls_tab(
            '_tab_abcbiz_transform_normal',
            [
                'label' => __( 'Normal', 'abcbiz-multi' ),
                'condition' => [
                    'abcbiz_transform_fx' => 'yes',
                ],
            ]
        );

        // Translate
        $element->add_control(
            'abcbiz_transform_fx_translate_toggle',
            [
                'label' => __( 'Translate', 'abcbiz-multi' ),
                'type' => Controls_Manager::POPOVER_TOGGLE,
                'return_value' => 'yes',
                'condition' => [
                    'abcbiz_transform_fx' => 'yes',
                ],
            ]
        );

        $element->start_popover();

        $element->add_responsive_control(
            'abcbiz_transform_fx_translate_x',
            [
                'label' => __( 'Translate X', 'abcbiz-multi' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                    ]
                ],
                'condition' => [
                    'abcbiz_transform_fx_translate_toggle' => 'yes',
                    'abcbiz_transform_fx' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}}' => '--abcbiz-tfx-translate-x: {{SIZE}}px;'
                ],
            ]
        );

        $element->add_responsive_control(
            'abcbiz_transform_fx_translate_y',
            [
                'label' => __( 'Translate Y', 'abcbiz-multi' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                    ]
                ],
                'condition' => [
                    'abcbiz_transform_fx_translate_toggle' => 'yes',
                    'abcbiz_transform_fx' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}}' => '--abcbiz-tfx-translate-y: {{SIZE}}px;'
                ],
            ]
        );

        $element->end_popover();

        // Rotate
        $element->add_control(
            'abcbiz_transform_fx_rotate_toggle',
            [
                'label' => __( 'Rotate', 'abcbiz-multi' ),
                'type' => Controls_Manager::POPOVER_TOGGLE,
                'condition' => [
                    'abcbiz_transform_fx' => 'yes',
                ],
            ]
        );

        $element->start_popover();

        $element->add_control(
            'abcbiz_transform_fx_rotate_mode',
            [
                'label' => __( 'Mode', 'abcbiz-multi' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'compact' => [
                        'title' => __( 'Compact', 'abcbiz-multi' ),
                        'icon' => 'eicon-plus-circle',
                    ],
                    'loose' => [
                        'title' => __( 'Loose', 'abcbiz-multi' ),
                        'icon' => 'eicon-minus-circle',
                    ],
                ],
                'default' => 'loose',
                'toggle' => false,
                'condition' => [
                    'abcbiz_transform_fx_rotate_toggle' => 'yes',
                    'abcbiz_transform_fx' => 'yes',
                ],
            ]
        );

        $element->add_control(
            'abcbiz_transform_fx_rotate_hr',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );

        $element->add_responsive_control(
            'abcbiz_transform_fx_rotate_x',
            [
                'label' => __( 'Rotate X', 'abcbiz-multi' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['deg'],
                'range' => [
                    'deg' => [
                        'min' => -180,
                        'max' => 180,
                    ]
                ],
                'condition' => [
                    'abcbiz_transform_fx_rotate_toggle' => 'yes',
                    'abcbiz_transform_fx' => 'yes',
                    'abcbiz_transform_fx_rotate_mode' => 'loose'
                ],
                'selectors' => [
                    '{{WRAPPER}}' => '--abcbiz-tfx-rotate-x: {{SIZE}}deg;'
                ],
            ]
        );

        $element->add_responsive_control(
            'abcbiz_transform_fx_rotate_y',
            [
                'label' => __( 'Rotate Y', 'abcbiz-multi' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['deg'],
                'range' => [
                    'deg' => [
                        'min' => -180,
                        'max' => 180,
                    ]
                ],
                'condition' => [
                    'abcbiz_transform_fx_rotate_toggle' => 'yes',
                    'abcbiz_transform_fx' => 'yes',
                    'abcbiz_transform_fx_rotate_mode' => 'loose'
                ],
                'selectors' => [
                    '{{WRAPPER}}' => '--abcbiz-tfx-rotate-y: {{SIZE}}deg;'
                ],
            ]
        );

        $element->add_responsive_control(
            'abcbiz_transform_fx_rotate_z',
            [
                'label' => __( 'Rotate Z', 'abcbiz-multi' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['deg'],
                'range' => [
                    'deg' => [
                        'min' => -180,
                        'max' => 180,
                    ]
                ],
                'condition' => [
                    'abcbiz_transform_fx_rotate_toggle' => 'yes',
                    'abcbiz_transform_fx' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}}' => '--abcbiz-tfx-rotate-z: {{SIZE}}deg;'
                ],
            ]
        );

        $element->end_popover();

        // Scale
        $element->add_control(
            'abcbiz_transform_fx_scale_toggle',
            [
                'label' => __( 'Scale', 'abcbiz-multi' ),
                'type' => Controls_Manager::POPOVER_TOGGLE,
                'return_value' => 'yes',
                'condition' => [
                    'abcbiz_transform_fx' => 'yes',
                ],
            ]
        );

        $element->start_popover();

        $element->add_control(
            'abcbiz_transform_fx_scale_mode',
            [
                'label' => __( 'Mode', 'abcbiz-multi' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'compact' => [
                        'title' => __( 'Compact', 'abcbiz-multi' ),
                        'icon' => 'eicon-plus-circle',
                    ],
                    'loose' => [
                        'title' => __( 'Loose', 'abcbiz-multi' ),
                        'icon' => 'eicon-minus-circle',
                    ],
                ],
                'default' => 'loose',
                'toggle' => false
            ]
        );

        $element->add_control(
            'abcbiz_transform_fx_scale_hr',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );

        $element->add_responsive_control(
            'abcbiz_transform_fx_scale_x',
            [
                'label' => __( 'Scale X', 'abcbiz-multi' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'default' => [
                    'size' => 1
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 5,
                        'step' => .1
                    ]
                ],
                'condition' => [
                    'abcbiz_transform_fx_scale_toggle' => 'yes',
                    'abcbiz_transform_fx' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}}' => '--abcbiz-tfx-scale-x: {{SIZE}}; --abcbiz-tfx-scale-y: {{SIZE}};'
                ],
            ]
        );

        $element->add_responsive_control(
            'abcbiz_transform_fx_scale_y',
            [
                'label' => __( 'Scale Y', 'abcbiz-multi' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'default' => [
                    'size' => 1
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 5,
                        'step' => .1
                    ]
                ],
                'condition' => [
                    'abcbiz_transform_fx_scale_toggle' => 'yes',
                    'abcbiz_transform_fx' => 'yes',
                    'abcbiz_transform_fx_scale_mode' => 'loose',
                ],
                'selectors' => [
                    '{{WRAPPER}}' => '--abcbiz-tfx-scale-y: {{SIZE}};'
                ],
            ]
        );

        $element->end_popover();

        // Skew
        $element->add_control(
            'abcbiz_transform_fx_skew_toggle',
            [
                'label' => __( 'Skew', 'abcbiz-multi' ),
                'type' => Controls_Manager::POPOVER_TOGGLE,
                'return_value' => 'yes',
                'condition' => [
                    'abcbiz_transform_fx' => 'yes',
                ],
            ]
        );

        $element->start_popover();

        $element->add_responsive_control(
            'abcbiz_transform_fx_skew_x',
            [
                'label' => __( 'Skew X', 'abcbiz-multi' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['deg'],
                'range' => [
                    'deg' => [
                        'min' => -180,
                        'max' => 180,
                    ]
                ],
                'condition' => [
                    'abcbiz_transform_fx_skew_toggle' => 'yes',
                    'abcbiz_transform_fx' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}}' => '--abcbiz-tfx-skew-x: {{SIZE}}deg;'
                ],
            ]
        );

        $element->add_responsive_control(
            'abcbiz_transform_fx_skew_y',
            [
                'label' => __( 'Skew Y', 'abcbiz-multi' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['deg'],
                'range' => [
                    'deg' => [
                        'min' => -180,
                        'max' => 180,
                    ]
                ],
                'condition' => [
                    'abcbiz_transform_fx_skew_toggle' => 'yes',
                    'abcbiz_transform_fx' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}}' => '--abcbiz-tfx-skew-y: {{SIZE}}deg;'
                ],
            ]
        );

        $element->end_popover();

        $element->end_controls_tab();

        // Hover tab
        $element->start_controls_tab(
            'abcbiz_tab_abcbiz_transform_hover',
            [
                'label' => __( 'Hover', 'abcbiz-multi' ),
                'condition' => [
                    'abcbiz_transform_fx' => 'yes',
                ],
            ]
        );
      
        // Translate Hover
        $element->add_control(
            'abcbiz_transform_fx_translate_toggle_hover',
            [
                'label' => __( 'Translate', 'abcbiz-multi' ),
                'type' => Controls_Manager::POPOVER_TOGGLE,
                'return_value' => 'yes',
                'condition' => [
                    'abcbiz_transform_fx' => 'yes',
                ],
            ]
        );

        $element->start_popover();

        $element->add_responsive_control(
            'abcbiz_transform_fx_translate_x_hover',
            [
                'label' => __( 'Translate X', 'abcbiz-multi' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                    ]
                ],
                'condition' => [
                    'abcbiz_transform_fx_translate_toggle_hover' => 'yes',
                    'abcbiz_transform_fx' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}}:hover' => '--abcbiz-tfx-translate-x-hover: {{SIZE}}px;'
                ],
            ]
        );

        $element->add_responsive_control(
            'abcbiz_transform_fx_translate_y_hover',
            [
                'label' => __( 'Translate Y', 'abcbiz-multi' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                    ]
                ],
                'condition' => [
                    'abcbiz_transform_fx_translate_toggle_hover' => 'yes',
                    'abcbiz_transform_fx' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}}:hover' => '--abcbiz-tfx-translate-y-hover: {{SIZE}}px;'
                ],
            ]
        );

        $element->end_popover();

        // Rotate Hover
        $element->add_control(
            'abcbiz_transform_fx_rotate_toggle_hover',
            [
                'label' => __( 'Rotate', 'abcbiz-multi' ),
                'type' => Controls_Manager::POPOVER_TOGGLE,
                'condition' => [
                    'abcbiz_transform_fx' => 'yes',
                ],
            ]
        );

        $element->start_popover();

        $element->add_responsive_control(
            'abcbiz_transform_fx_rotate_x_hover',
            [
                'label' => __( 'Rotate X', 'abcbiz-multi' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['deg'],
                'range' => [
                    'deg' => [
                        'min' => -180,
                        'max' => 180,
                    ]
                ],
                'condition' => [
                    'abcbiz_transform_fx_rotate_toggle_hover' => 'yes',
                    'abcbiz_transform_fx' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}}:hover' => '--abcbiz-tfx-rotate-x-hover: {{SIZE}}deg;'
                ],
            ]
        );

        $element->add_responsive_control(
            'abcbiz_transform_fx_rotate_y_hover',
            [
                'label' => __( 'Rotate Y', 'abcbiz-multi' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['deg'],
                'range' => [
                    'deg' => [
                        'min' => -180,
                        'max' => 180,
                    ]
                ],
                'condition' => [
                    'abcbiz_transform_fx_rotate_toggle_hover' => 'yes',
                    'abcbiz_transform_fx' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}}:hover' => '--abcbiz-tfx-rotate-y-hover: {{SIZE}}deg;'
                ],
            ]
        );

        $element->add_responsive_control(
            'abcbiz_transform_fx_rotate_z_hover',
            [
                'label' => __( 'Rotate Z', 'abcbiz-multi' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['deg'],
                'range' => [
                    'deg' => [
                        'min' => -180,
                        'max' => 180,
                    ]
                ],
                'condition' => [
                    'abcbiz_transform_fx_rotate_toggle_hover' => 'yes',
                    'abcbiz_transform_fx' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}}:hover' => '--abcbiz-tfx-rotate-z-hover: {{SIZE}}deg;'
                ],
            ]
        );

        $element->end_popover();

        // Scale Hover
        $element->add_control(
            'abcbiz_transform_fx_scale_toggle_hover',
            [
                'label' => __( 'Scale', 'abcbiz-multi' ),
                'type' => Controls_Manager::POPOVER_TOGGLE,
                'return_value' => 'yes',
                'condition' => [
                    'abcbiz_transform_fx' => 'yes',
                ],
            ]
        );

        $element->start_popover();

        $element->add_responsive_control(
            'abcbiz_transform_fx_scale_x_hover',
            [
                'label' => __( 'Scale X', 'abcbiz-multi' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'default' => [
                    'size' => 1
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 5,
                        'step' => .1
                    ]
                ],
                'condition' => [
                    'abcbiz_transform_fx_scale_toggle_hover' => 'yes',
                    'abcbiz_transform_fx' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}}:hover' => '--abcbiz-tfx-scale-x-hover: {{SIZE}};'
                ],
            ]
        );

        $element->add_responsive_control(
            'abcbiz_transform_fx_scale_y_hover',
            [
                'label' => __( 'Scale Y', 'abcbiz-multi' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'default' => [
                    'size' => 1
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 5,
                        'step' => .1
                    ]
                ],
                'condition' => [
                    'abcbiz_transform_fx_scale_toggle_hover' => 'yes',
                    'abcbiz_transform_fx' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}}:hover' => '--abcbiz-tfx-scale-y-hover: {{SIZE}};'
                ],
            ]
        );

        $element->end_popover();

        // Skew Hover
        $element->add_control(
            'abcbiz_transform_fx_skew_toggle_hover',
            [
                'label' => __( 'Skew', 'abcbiz-multi' ),
                'type' => Controls_Manager::POPOVER_TOGGLE,
                'return_value' => 'yes',
                'condition' => [
                    'abcbiz_transform_fx' => 'yes',
                ],
            ]
        );

        $element->start_popover();

        $element->add_responsive_control(
            'abcbiz_transform_fx_skew_x_hover',
            [
                'label' => __( 'Skew X', 'abcbiz-multi' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['deg'],
                'range' => [
                    'deg' => [
                        'min' => -180,
                        'max' => 180,
                    ]
                ],
                'condition' => [
                    'abcbiz_transform_fx_skew_toggle_hover' => 'yes',
                    'abcbiz_transform_fx' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}}:hover' => '--abcbiz-tfx-skew-x-hover: {{SIZE}}deg;'
                ],
            ]
        );

        $element->add_responsive_control(
            'abcbiz_transform_fx_skew_y_hover',
            [
                'label' => __( 'Skew Y', 'abcbiz-multi' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['deg'],
                'range' => [
                    'deg' => [
                        'min' => -180,
                        'max' => 180,
                    ]
                ],
                'condition' => [
                    'abcbiz_transform_fx_skew_toggle_hover' => 'yes',
                    'abcbiz_transform_fx' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}}:hover' => '--abcbiz-tfx-skew-y-hover: {{SIZE}}deg;'
                ],
            ]
        );

        $element->end_popover();

        $element->end_controls_tab();

        $element->end_controls_tabs();

        $element->end_controls_section();
    }
}

CSS_Transform::init();
