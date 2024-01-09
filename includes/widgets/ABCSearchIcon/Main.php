<?php
namespace ABCBiz\Includes\Widgets\ABCSearchIcon;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

class Main extends BaseWidget
{
    // define protected variables...
    protected $name = 'abcbiz-search-icon';
    protected $title = 'ABC Search Icon';
    protected $icon = 'eicon-search';
    protected $categories = [
        'abcbiz-category'
    ];

    protected $keywords = [
        'abc', 'search', 'icon'
    ];

    public function get_script_depends()
    {
        return ['abcbiz-search-icon'];
    }


    /**
     * Register the widget controls.
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'abcbiz_elementor_search_icon_setting',
            [
                'label' => esc_html__('Setting', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        //placeholder text
        $this->add_control(
			'abcbiz_elementor_search_icon_placeholder_text',
			[
				'label' => esc_html__( 'Placeholder Text', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Search...', 'abcbiz-multi' ),
			]
		);

        //Alignment
		$this->add_responsive_control(
			'abcbiz_elementor_search_icon_alignment',
			[
				'label' => esc_html__( 'Alignment', 'abcbiz-multi'),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'flex-end',
				'options' => [
					'flex-start'    => [
						'title' => esc_html__( 'Left', 'abcbiz-multi' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'abcbiz-multi' ),
						'icon' => 'eicon-text-align-center',
					],
					'flex-end' => [
						'title' => esc_html__( 'Right', 'abcbiz-multi' ),
						'icon' => 'eicon-text-align-right',
					],
				],				
				'selectors' => [
					'{{WRAPPER}} .abcbiz-ele-search-icon .abcbiz-search-icon-container' => 'justify-content: {{VALUE}}',
				],
			]
		);

        $this->end_controls_section();

        // search icon style section
        $this->start_controls_section(
            'abcbiz_elementor_search_icon_style_section',
            [
                'label' => esc_html__('Icon Style', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
            );

            //icon size
            $this->add_responsive_control(
                'abcbiz_elementor_search_icon_icon_size',
                [
                    'label' => esc_html__( 'Icon Size', 'abcbiz-multi' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'range' => [
                        'px' => [
                            'min' => 10,
                            'max' => 100,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 30,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .abcbiz-search-icon svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

        // icon color
          $this->add_control(
            'abcbiz_elementor_search_icon_icon_color',
            [
                'label' => esc_html__('Icon Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#3f14db',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-search-icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        // icon hover color
          $this->add_control(
            'abcbiz_elementor_search_icon_hov_icon_color',
            [
                'label' => esc_html__('Icon Hover Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#820bb5',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-search-icon svg:hover' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // search input style section
        $this->start_controls_section(
            'abcbiz_elementor_search_icon_input_style_section',
            [
                'label' => esc_html__('Search Field Style', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
            );

            // BG color
          $this->add_control(
            'abcbiz_elementor_search_icon_input_bg_color',
            [
                'label' => esc_html__('Field BG Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-search-icon .s' => 'background-color: {{VALUE}};',
                ],
            ]
        );

         // Text color
         $this->add_control(
            'abcbiz_elementor_search_icon_input_text_color',
            [
                'label' => esc_html__('Text Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#333333',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-search-icon .s' => 'color: {{VALUE}};',
                ],
            ]
        );

            //Placeholder typography
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'abcbiz_elementor_search_placeholder_typography',
                    'label' => esc_html__( 'Placeholder Typography', 'abcbiz-multi' ),
                    'selector' => '{{WRAPPER}} .abcbiz-ele-search-icon input[type="text"]::placeholder',
                ]
            );

             // placeholder color
         $this->add_control(
            'abcbiz_elementor_search_icon_input_placeholder_color',
            [
                'label' => esc_html__('Placeholder Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#333333',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-search-icon input[type="text"]::placeholder' => 'color: {{VALUE}};',
                ],
            ]
        );

            //input width
            $this->add_responsive_control(
                'abcbiz_elementor_search_icon_input_width',
                [
                    'label' => esc_html__( 'Field Width', 'abcbiz-multi' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'range' => [
                        'px' => [
                            'min' => 100,
                            'max' => 500,
                            'step' => 5,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 200,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .abcbiz-ele-search-icon .s.active' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            //input height
            $this->add_responsive_control(
                'abcbiz_elementor_search_icon_input_height',
                [
                    'label' => esc_html__( 'Field Height', 'abcbiz-multi' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'range' => [
                        'px' => [
                            'min' => 1,
                            'max' => 20,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 5,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .abcbiz-ele-search-icon .s.active' => 'padding-top: {{SIZE}}{{UNIT}}; padding-bottom: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            //Border
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'abcbiz_elementor_search_icon_input_border',
                    'selector' => '{{WRAPPER}} .abcbiz-ele-search-icon .s.active',
                ]
            );

            //Border radius
            $this->add_responsive_control(
                'abcbiz_elementor_search_icon_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'abcbiz-multi' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%'],
                    'default' => [
                        'top' => 2,
                        'right' => 2,
                        'bottom' => 2,
                        'left' => 2,
                        'unit' => 'px',
                        'isLinked' => true,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .abcbiz-ele-search-icon .s' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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