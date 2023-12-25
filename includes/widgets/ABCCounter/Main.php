<?php
namespace Includes\Widgets\ABCCounter;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;


class Main extends BaseWidget
{

    // define protected variables...
    protected $name = 'abcbiz-elementor-counterup';
    protected $title = 'ABC Counter Up';
    protected $icon = 'eicon-counter';
    protected $categories = [
        'abcbiz-category'
    ];

    protected $keywords = [
        'abc', 'counter',  'up'
    ];

    public function get_script_depends()
    {
        return ['abcbiz-counter-up','abcbiz-jquery-appear', 'abcbiz-wapoints']; 
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
            'abcbiz_elementor_counter_section',
            [
                'label' => esc_html__('Counter', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]           
        );
        // counter title
        $this->add_control(
            'abcbiz_elementor_counter_title',
            [
                'label' => esc_html__('Title', 'abcbiz-multi'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Our Clients', 'abcbiz-multi'),
                'label_block' => true,
            ]           
        );
        // counter number
        $this->add_control(
            'abcbiz_elementor_counter_number',
            [
                'label' => esc_html__('Number', 'abcbiz-multi'),
                'type' => Controls_Manager::NUMBER,
                'default' => esc_html__('100', 'abcbiz-multi'),               
            ]
        );
        // counter icon
        $this->add_control(
            'abcbiz_elementor_counter_icon',
            [
                'label' => esc_html__('Icon', 'abcbiz-multi'),
                'type' => Controls_Manager::ICONS,
            ]            
        );
        // counter suffix
        $this->add_control(
            'abcbiz_elementor_counter_suffix',
            [
                'label' => esc_html__('Suffix', 'abcbiz-multi'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('+', 'abcbiz-multi'),
                'label_block' => true,
            ]            
        );    
        
        //Alignment
		$this->add_responsive_control(
			'abcbiz_elementor_counter_icon_align',
			[
				'label' => esc_html__( 'Alignment', 'abcbiz-multi'),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'center',
				'options' => [
					'left'    => [
						'title' => esc_html__( 'Left', 'abcbiz-multi' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'abcbiz-multi' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'abcbiz-multi' ),
						'icon' => 'eicon-text-align-right',
					],
				],				
				'selectors' => [
					'{{WRAPPER}} .abcbiz-ele-countdown-wrap' => 'text-align: {{VALUE}}',
				],
			]
		);

        // end of counter section
        $this->end_controls_section();


        // start of counter style section
        $this->start_controls_section(
            'abcbiz_elementor_counter_style_section',
            [
                'label' => esc_html__('Style', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        //counter box padding
        $this->add_responsive_control(
            'abcbiz_elementor_counter_box_padding',
            [
                'label' => esc_html__('Box Padding', 'abcbiz-multi'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-countdown-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ]
        );
        // counter title color
        $this->add_control(
            'abcbiz_elementor_counter_title_color',
            [
                'label' => esc_html__('Title Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-count-title h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        // counter title typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_counter_title_typography',
                'label' => esc_html__('Title Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-ele-count-title h3',
            ]
        );
        // counter number color
        $this->add_control(
            'abcbiz_elementor_counter_number_color',
            [
                'label' => esc_html__('Number Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-counter .abcbiz-counter' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .abcbiz-ele-counter-suffix' => 'color: {{VALUE}};',
                ],
            ]
        );
        // counter number typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_counter_number_typography',
                'label' => esc_html__('Number Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-ele-counter span.abcbiz-counter, {{WRAPPER}} .abcbiz-ele-counter-suffix',
            ]
        );
        // counter icon color
        $this->add_control(
            'abcbiz_elementor_counter_icon_color',
            [
                'label' => esc_html__('Icon Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#59A818',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-countdown-wrap span.abcbiz-counter-icon i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .abcbiz-ele-countdown-wrap span.abcbiz-counter-icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );
        // counter icon size
        $this->add_responsive_control(
            'abcbiz_elementor_counter_icon_size',
            [
                'label' => esc_html__('Icon Size', 'abcbiz-multi'),
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
                    '{{WRAPPER}}  .abcbiz-ele-countdown-wrap span.abcbiz-counter-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}}  .abcbiz-ele-countdown-wrap span.abcbiz-counter-icon svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        // counter icon background color
        $this->add_control(
            'abcbiz_elementor_counter_icon_bg_color',
            [
                'label' => esc_html__('Icon Background Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-countdown-wrap span.abcbiz-counter-icon i' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .abcbiz-ele-countdown-wrap span.abcbiz-counter-icon svg' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        // counter icon border
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'abcbiz_elementor_counter_icon_border',
                'selector' => '{{WRAPPER}} .abcbiz-ele-countdown-wrap span.abcbiz-counter-icon i, {{WRAPPER}} .abcbiz-ele-countdown-wrap span.abcbiz-counter-icon svg',
            ]
        );
        // counter icon border radius
        $this->add_responsive_control(
            'abcbiz_elementor_counter_icon_border_radius',
            [
                'label' => esc_html__('Icon Border Radius', 'abcbiz-multi'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-countdown-wrap span.abcbiz-counter-icon i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .abcbiz-ele-countdown-wrap span.abcbiz-counter-icon svg' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ]
        );
        // counter icon padding
        $this->add_responsive_control(
            'abcbiz_elementor_counter_icon_padding',
            [
                'label' => esc_html__('Icon Padding', 'abcbiz-multi'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-countdown-wrap span.abcbiz-counter-icon i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .abcbiz-ele-countdown-wrap span.abcbiz-counter-icon svg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ]
        );
        // counter icon margin
        $this->add_responsive_control(
            'abcbiz_elementor_counter_icon_margin',
            [
                'label' => esc_html__('Icon Margin', 'abcbiz-multi'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-countdown-wrap span.abcbiz-counter-icon i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .abcbiz-ele-countdown-wrap span.abcbiz-counter-icon svg' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ]
        );
        // end of counter style section
        $this->end_controls_section();

        // start of counter hover style section
        $this->start_controls_section(
            'abcbiz_elementor_counter_hover_style_section',
            [
                'label' => esc_html__('Hover', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        // counter title hover color
        $this->add_control(
            'abcbiz_elementor_counter_title_hover_color',
            [
                'label' => esc_html__('Title Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-countdown-wrap:hover .abcbiz-ele-count-title h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        // counter number hover color
        $this->add_control(
            'abcbiz_elementor_counter_number_hover_color',
            [
                'label' => esc_html__('Number Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-countdown-wrap:hover .abcbiz-counter' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .abcbiz-ele-countdown-wrap:hover .abcbiz-ele-counter-suffix' => 'color: {{VALUE}};',
                ],
            ]
        );
        // counter icon hover color
        $this->add_control(
            'abcbiz_elementor_counter_icon_hover_color',
            [
                'label' => esc_html__('Icon Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-countdown-wrap:hover span.abcbiz-counter-icon i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .abcbiz-ele-countdown-wrap:hover span.abcbiz-counter-icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );
        // counter icon hover background color
        $this->add_control(
            'abcbiz_elementor_counter_icon_hover_bg_color',
            [
                'label' => esc_html__('Icon Background Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-countdown-wrap:hover span.abcbiz-counter-icon i' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .abcbiz-ele-countdown-wrap:hover span.abcbiz-counter-icon svg' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        // counter icon hover border color
        $this->add_control(
            'abcbiz_elementor_counter_icon_hover_border_color',
            [
                'label' => esc_html__('Icon Border Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-countdown-wrap:hover span.abcbiz-counter-icon i' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .abcbiz-ele-countdown-wrap:hover span.abcbiz-counter-icon svg' => 'border-color: {{VALUE}};',
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
