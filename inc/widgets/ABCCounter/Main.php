<?php

namespace Inc\Widgets\ABCCounter;

use Inc\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;


class Main extends BaseWidget
{

    // define protected variables...
    protected $name = 'ABC-Elementor-ABCCounter';
    protected $title = 'ABC Counter';
    protected $icon = 'eicon-counter';
    protected $categories = [
        'abc-category'
    ];

    protected $keywords = [
        'abc', 'counter',  'up'
    ];

    public function get_script_depends()
    {
        return ['abc-counter-up','abc-jquery-appear', 'abc-wapoints']; 
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
            'abc_elementor_counter_section',
            [
                'label' => __('Counter', 'ABCMAFTH'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]           
        );
        // counter title
        $this->add_control(
            'abc_elementor_counter_title',
            [
                'label' => __('Title', 'ABCMAFTH'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Our Clients', 'ABCMAFTH'),
                'label_block' => true,
            ]           
        );
        // counter number
        $this->add_control(
            'abc_elementor_counter_number',
            [
                'label' => __('Number', 'ABCMAFTH'),
                'type' => Controls_Manager::NUMBER,
                'default' => __('100', 'ABCMAFTH'),               
            ]
        );
        // counter icon
        $this->add_control(
            'abc_elementor_counter_icon',
            [
                'label' => __('Icon', 'ABCMAFTH'),
                'type' => Controls_Manager::ICONS,
            ]            
        );
        // counter suffix
        $this->add_control(
            'abc_elementor_counter_suffix',
            [
                'label' => __('Suffix', 'ABCMAFTH'),
                'type' => Controls_Manager::TEXT,
                'default' => __('+', 'ABCMAFTH'),
                'label_block' => true,
            ]            
        );    
        
        //Alignment
		$this->add_responsive_control(
			'abc_elementor_counter_icon_align',
			[
				'label' => esc_html__( 'Alignment', 'ABCMAFTH'),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'center',
				'options' => [
					'left'    => [
						'title' => esc_html__( 'Left', 'ABCMAFTH' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'ABCMAFTH' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'ABCMAFTH' ),
						'icon' => 'eicon-text-align-right',
					],
				],				
				'selectors' => [
					'{{WRAPPER}} .abc-ele-countdown-wrap' => 'text-align: {{VALUE}}',
				],
			]
		);

        // end of counter section
        $this->end_controls_section();


        // start of counter style section
        $this->start_controls_section(
            'abc_elementor_counter_style_section',
            [
                'label' => __('Style', 'ABCMAFTH'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        //counter box padding
        $this->add_responsive_control(
            'abc_elementor_counter_box_padding',
            [
                'label' => __('Box Padding', 'ABCMAFTH'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-countdown-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ]
        );
        // counter title color
        $this->add_control(
            'abc_elementor_counter_title_color',
            [
                'label' => __('Title Color', 'ABCMAFTH'),
                'type' => Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-count-title h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        // counter title typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abc_elementor_counter_title_typography',
                'label' => __('Title Typography', 'ABCMAFTH'),
                'selector' => '{{WRAPPER}} .abc-ele-count-title h3',
            ]
        );
        // counter number color
        $this->add_control(
            'abc_elementor_counter_number_color',
            [
                'label' => __('Number Color', 'ABCMAFTH'),
                'type' => Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-counter .abccounter' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .abc-ele-counter-suffix' => 'color: {{VALUE}};',
                ],
            ]
        );
        // counter number typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abc_elementor_counter_number_typography',
                'label' => __('Number Typography', 'ABCMAFTH'),
                'selector' => '{{WRAPPER}} .abc-ele-counter span.abccounter, {{WRAPPER}} .abc-ele-counter-suffix',
            ]
        );
        // counter icon color
        $this->add_control(
            'abc_elementor_counter_icon_color',
            [
                'label' => __('Icon Color', 'ABCMAFTH'),
                'type' => Controls_Manager::COLOR,
                'default' => '#59A818',
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-countdown-wrap span.abc-counter-icon i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .abc-ele-countdown-wrap span.abc-counter-icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );
        // counter icon size
        $this->add_responsive_control(
            'abc_elementor_counter_icon_size',
            [
                'label' => __('Icon Size', 'ABCMAFTH'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'default' => [
                    'size' => 30,
                ],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 200,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}  .abc-ele-countdown-wrap span.abc-counter-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}}  .abc-ele-countdown-wrap span.abc-counter-icon svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        // counter icon background color
        $this->add_control(
            'abc_elementor_counter_icon_bg_color',
            [
                'label' => __('Icon Background Color', 'ABCMAFTH'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-countdown-wrap span.abc-counter-icon i' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .abc-ele-countdown-wrap span.abc-counter-icon svg' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        // counter icon border
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'abc_elementor_counter_icon_border',
                'selector' => '{{WRAPPER}} .abc-ele-countdown-wrap span.abc-counter-icon i, {{WRAPPER}} .abc-ele-countdown-wrap span.abc-counter-icon svg',
            ]
        );
        // counter icon border radius
        $this->add_responsive_control(
            'abc_elementor_counter_icon_border_radius',
            [
                'label' => __('Icon Border Radius', 'ABCMAFTH'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-countdown-wrap span.abc-counter-icon i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .abc-ele-countdown-wrap span.abc-counter-icon svg' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ]
        );
        // counter icon padding
        $this->add_responsive_control(
            'abc_elementor_counter_icon_padding',
            [
                'label' => __('Icon Padding', 'ABCMAFTH'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-countdown-wrap span.abc-counter-icon i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .abc-ele-countdown-wrap span.abc-counter-icon svg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ]
        );
        // counter icon margin
        $this->add_responsive_control(
            'abc_elementor_counter_icon_margin',
            [
                'label' => __('Icon Margin', 'ABCMAFTH'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-countdown-wrap span.abc-counter-icon i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .abc-ele-countdown-wrap span.abc-counter-icon svg' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ]
        );
        // end of counter style section
        $this->end_controls_section();

        // start of counter hover style section
        $this->start_controls_section(
            'abc_elementor_counter_hover_style_section',
            [
                'label' => __('Hover', 'ABCMAFTH'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        // counter title hover color
        $this->add_control(
            'abc_elementor_counter_title_hover_color',
            [
                'label' => __('Title Color', 'ABCMAFTH'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-countdown-wrap:hover .abc-ele-count-title h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        // counter number hover color
        $this->add_control(
            'abc_elementor_counter_number_hover_color',
            [
                'label' => __('Number Color', 'ABCMAFTH'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-countdown-wrap:hover .abccounter' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .abc-ele-countdown-wrap:hover .abc-ele-counter-suffix' => 'color: {{VALUE}};',
                ],
            ]
        );
        // counter icon hover color
        $this->add_control(
            'abc_elementor_counter_icon_hover_color',
            [
                'label' => __('Icon Color', 'ABCMAFTH'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-countdown-wrap:hover span.abc-counter-icon i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .abc-ele-countdown-wrap:hover span.abc-counter-icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );
        // counter icon hover background color
        $this->add_control(
            'abc_elementor_counter_icon_hover_bg_color',
            [
                'label' => __('Icon Background Color', 'ABCMAFTH'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-countdown-wrap:hover span.abc-counter-icon i' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .abc-ele-countdown-wrap:hover span.abc-counter-icon svg' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        // counter icon hover border color
        $this->add_control(
            'abc_elementor_counter_icon_hover_border_color',
            [
                'label' => __('Icon Border Color', 'ABCMAFTH'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-countdown-wrap:hover span.abc-counter-icon i' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .abc-ele-countdown-wrap:hover span.abc-counter-icon svg' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        // end of counter hover style section
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
