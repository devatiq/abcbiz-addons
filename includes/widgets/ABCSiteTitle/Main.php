<?php
namespace ABCBiz\Includes\widgets\ABCSiteTitle;

// If this file is called directly, abort!!!
defined('ABSPATH') or die('This is not the place you deserve!');

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

class Main extends BaseWidget {

    protected $name = 'abcbiz-site-title';
    protected $title = 'ABC Site Title & Tagline';
    protected $icon = 'eicon-site-title abcbiz-addons-icon';
    protected $categories = [
        'abcbiz-category'
    ];
    protected $keywords = [
        'abc', 'title', 'site', 'tagline'
    ];

    protected function register_controls() {
        $this->start_controls_section(
            'abcbiz-elementor-site-title-content',
            [
                'label' => esc_html__( 'Contents', 'abcbiz-addons' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );


		//Site Title Switch
		$this->add_control(
			'abcbiz-elementor-site-title-switch',
			[
				'label' => esc_html__( 'Display Site Title?', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'tagline_on' => esc_html__( 'Show', 'abcbiz-addons' ),
				'tagline_off' => esc_html__( 'Hide', 'abcbiz-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		//Heading tag
        $this->add_control(
            'abcbiz-elementor-site-title-tag',
            [
                'label' => esc_html__('Site Title Tag', 'abcbiz-addons'),
                'type' => Controls_Manager::SELECT,
                'default' => 'h1',
                'options' => [
                    'h1' => esc_html__('H1', 'abcbiz-addons'),
                    'h2' => esc_html__('H2', 'abcbiz-addons'),
                    'h3' => esc_html__('H3', 'abcbiz-addons'),
                    'h4' => esc_html__('H4', 'abcbiz-addons'),
                    'h5' => esc_html__('H5', 'abcbiz-addons'),
                    'H6' => esc_html__('H6', 'abcbiz-addons'),
                ],
				'condition' => [
					'abcbiz-elementor-site-title-switch' => 'yes'
				],
            
            ]
        );

        //Title Alignment
		$this->add_responsive_control(
			'abcbiz-elementor-site-title-align',
			[
				'label' => esc_html__( 'Title Alignment', 'abcbiz-addons'),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'left',
				'options' => [
					'left'    => [
						'title' => esc_html__( 'Left', 'abcbiz-addons' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'abcbiz-addons' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'abcbiz-addons' ),
						'icon' => 'eicon-text-align-right',
					],
				],				
				'selectors' => [
					'{{WRAPPER}} .abcbiz-ele-site-title' => 'text-align: {{VALUE}}',
				],
				'condition' => [
					'abcbiz-elementor-site-title-switch' => 'yes'
				],
			]
		);

		//Tagline Switch
		$this->add_control(
			'abcbiz-elementor-site-tagline-switch',
			[
				'label' => esc_html__( 'Display Tagline?', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'tagline_on' => esc_html__( 'Show', 'abcbiz-addons' ),
				'tagline_off' => esc_html__( 'Hide', 'abcbiz-addons' ),
				'return_value' => 'yes',
				'default' => 'tagline_off',
			]
		);

		//Tagline tag
        $this->add_control(
            'abcbiz-elementor-site-tagline-tag',
            [
                'label' => esc_html__('Tagline Tag', 'abcbiz-addons'),
                'type' => Controls_Manager::SELECT,
                'default' => 'h2',
                'options' => [
                    'h1' => esc_html__('H1', 'abcbiz-addons'),
                    'h2' => esc_html__('H2', 'abcbiz-addons'),
                    'h3' => esc_html__('H3', 'abcbiz-addons'),
                    'h4' => esc_html__('H4', 'abcbiz-addons'),
                    'h5' => esc_html__('H5', 'abcbiz-addons'),
                    'H6' => esc_html__('H6', 'abcbiz-addons'),
                ],
				'condition' => [
					'abcbiz-elementor-site-tagline-switch' => 'yes'
				],
            
            ]
        );

        //Title Alignment
		$this->add_responsive_control(
			'abcbiz-elementor-site-tagline-align',
			[
				'label' => esc_html__( 'Tagline Alignment', 'abcbiz-addons'),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'left',
				'options' => [
					'left'    => [
						'title' => esc_html__( 'Left', 'abcbiz-addons' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'abcbiz-addons' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'abcbiz-addons' ),
						'icon' => 'eicon-text-align-right',
					],
				],				
				'selectors' => [
					'{{WRAPPER}} .abcbiz-ele-site-tagline' => 'text-align: {{VALUE}}',
				],
				'condition' => [
					'abcbiz-elementor-site-tagline-switch' => 'yes'
				],
			]
		);

        $this->end_controls_section();//end content

		//Title Style
		$this->start_controls_section(
            'abcbiz-elementor-site-title-style',
            [
                'label' => esc_html__( 'Site Title Style', 'abcbiz-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'abcbiz-elementor-site-title-switch' => 'yes'
				],
            ]
        );

		//color
		$this->add_control(
			'abcbiz-elementor-site-title-color',
			[
				'label' => esc_html__( 'Title Color', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#333333',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-ele-site-title' => 'color: {{VALUE}}',
				],
			]
		);

		//typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz-elementor-site-title-typography',
				'selector' => '{{WRAPPER}} .abcbiz-ele-site-title',
			]
		);

		//spacing
		$this->add_control(
		'abcbiz-elementor-site-title-spacing',
		[
			'label' => esc_html__( 'Spacing', 'abcbiz-addons' ),
			'type' => \Elementor\Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px' ],
			'default' => [
				'top' => 0,
				'right' => 0,
				'bottom' => 0,
				'left' => 0,
				'unit' => 'px',
				'isLinked' => false,
			],
			'selectors' => [
				'{{WRAPPER}} .abcbiz-ele-site-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);

		$this->end_controls_section();//end site title style

		//Tagline Style
		$this->start_controls_section(
            'abcbiz-elementor-site-tagline-style',
            [
                'label' => esc_html__( 'Tagline Style', 'abcbiz-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'abcbiz-elementor-site-tagline-switch' => 'yes'
				],
            ]
        );

		//color
		$this->add_control(
			'abcbiz-elementor-site-tagline-color',
			[
				'label' => esc_html__( 'Tagline Color', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#555555',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-ele-site-tagline' => 'color: {{VALUE}}',
				],
			]
		);

		//typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz-elementor-site-tagline-typography',
				'selector' => '{{WRAPPER}} .abcbiz-ele-site-tagline',
			]
		);

			//spacing
			$this->add_control(
				'abcbiz-elementor-site-tagline-spacing',
				[
					'label' => esc_html__( 'Spacing', 'abcbiz-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px' ],
					'default' => [
						'top' => 0,
						'right' => 0,
						'bottom' => 0,
						'left' => 0,
						'unit' => 'px',
						'isLinked' => false,
					],
					'selectors' => [
						'{{WRAPPER}} .abcbiz-ele-site-tagline' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();//end tagline style
    }

    protected function render() {      
		include 'renderview.php';
    }
}