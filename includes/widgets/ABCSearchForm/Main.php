<?php
namespace ABCBiz\Includes\Widgets\ABCSearchForm;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

class Main extends BaseWidget
{
    // define protected variables...
    protected $name = 'abcbiz-search-form';
    protected $title = 'ABC Search Form';
    protected $icon = 'eicon-site-search abcbiz-addons-icon';
    protected $categories = [
        'abcbiz-category'
    ];

    protected $keywords = [
        'abc', 'search', 'form'
    ];


    /**
     * Register the widget controls.
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'abcbiz_elementor_search_form_setting',
            [
                'label' => esc_html__('Setting', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
			'abcbiz_elementor_search_form_placeholder_text',
			[
				'label' => esc_html__( 'Placeholder Text', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Search...', 'abcbiz-addons' ),
			]
		);

        $this->add_control(
			'abcbiz_elementor_search_form_btn_text',
			[
				'label' => esc_html__( 'Button Text', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Search', 'abcbiz-addons' ),
			]
		);

        $this->end_controls_section();

        // blog info style section
        $this->start_controls_section(
            'abcbiz_elementor_search_form_style_section',
            [
                'label' => esc_html__('Style', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
            );

            //Button typography
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'abcbiz_elementor_search_btn_typography',
                    'label' => esc_html__( 'Button Typography', 'abcbiz-addons' ),
                    'selector' => '{{WRAPPER}} .abcbiz-ele-search-form input[type="submit"]',
                ]
            );

            //Placeholder typography
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'abcbiz_elementor_search_placeholder_typography',
                    'label' => esc_html__( 'Placeholder Typography', 'abcbiz-addons' ),
                    'selector' => '{{WRAPPER}} .abcbiz-ele-search-form input[type="text"]::placeholder',
                ]
            );

            //input height
            $this->add_control(
                'abcbiz_elementor_search_form_height',
                [
                    'label' => esc_html__( 'Form Height', 'abcbiz-addons' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'range' => [
                        'px' => [
                            'min' => 20,
                            'max' => 100,
                            'step' => 2,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 40,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .abcbiz-ele-search-form input[type="text"], .abcbiz-ele-search-form input[type="submit"]' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
    

            // Border color
          $this->add_control(
            'abcbiz_elementor_search_form_border_color',
            [
                'label' => esc_html__('Border Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#053D58',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-search-form input[type=text]' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        //Button Style
		$this->add_control(
			'abcbiz_elementor_search_form_btn_style',
			[
				'label' => esc_html__( 'Button Style', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->start_controls_tabs(
			'abcbiz_elementor_search_form_style_tabs'
		);

		$this->start_controls_tab(
			'abcbiz_elementor_search_form_style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'abcbiz-addons' ),
			]
		);

		$this->add_control(
			'abcbiz_elementor_search_form_color',
			[
				'label' => esc_html__( 'Color', 'abcbiz-addons' ),
                'default' => '#ffffff',
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abcbiz-ele-search-form input[type="submit"]' => 'color: {{VALUE}} !important;',
				],
			]
		);
		
        // Button Background color
        $this->add_control(
            'abcbiz_elementor_search_form_btn_bg_color',
            [
                'label' => esc_html__('Background Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ad07b0',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-search-form input[type="submit"]' => 'background-color: {{VALUE}};',
                ],
            ]
        );

		$this->end_controls_tab();

		$this->start_controls_tab(
			'abcbiz_elementor_search_form_style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'abcbiz-addons' ),
			]
		);
	
		$this->add_control(
			'abcbiz_elementor_comment_form_reply_btn_hover_color',
			[
				'label' => esc_html__( 'Color', 'abcbiz-addons' ),
                'default' => '#ffffff',
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abcbiz-ele-search-form input[type="submit"]:hover' => 'color: {{VALUE}}!important;',
				],
			]
		);
		
         $this->add_control(
            'abcbiz_elementor_search_form_btn_bg_hover_color',
            [
                'label' => esc_html__('Background Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#053D58',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-search-form input[type="submit"]:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        ); 

		$this->end_controls_tab();
		$this->end_controls_tabs();
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