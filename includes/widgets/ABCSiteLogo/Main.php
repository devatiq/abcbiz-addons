<?php
namespace ABCBiz\Includes\widgets\ABCSiteLogo;

// If this file is called directly, abort!!!
defined('ABSPATH') or die('This is not the place you deserve!');

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

class Main extends BaseWidget {

    protected $name = 'abcbiz-site-logo';
    protected $title = 'ABC Site Logo';
    protected $icon = 'eicon-logo abcbiz-addons-icon';
    protected $categories = [
        'abcbiz-category'
    ];
    protected $keywords = [
        'abc', 'logo', 'site'
    ];

    protected function register_controls() {
        $this->start_controls_section(
            'abcbiz-elementor-site-logo-content',
            [
                'label' => esc_html__( 'Contents', 'abcbiz-addons' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        //Custom Logo Switch
        $this->add_control(
			'abcbiz-elementor-site-logo-custom-switch',
			[
				'label' => esc_html__( 'Custom Logo', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'custom_on' => esc_html__( 'Yes', 'abcbiz-addons' ),
				'custom_off' => esc_html__( 'No', 'abcbiz-addons' ),
				'return_value' => 'yes',
				'default' => 'custom_off',
			]
		);

        //Custom Logo
        $this->add_control(
			'abcbiz-elementor-site-logo-custom-image',
			[
				'label' => esc_html__( 'Choose Logo', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
                'condition' => [
                    'abcbiz-elementor-site-logo-custom-switch' => 'yes'
                ],
			]
		);

        //URL
        $this->add_control(
			'abcbiz-elementor-site-logo-link',
			[
				'label' => esc_html__( 'Link', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => false,
				],
				'label_block' => true,
			]
		);

        //Alignment
		$this->add_responsive_control(
			'abcbiz-elementor-site-logo-align',
			[
				'label' => esc_html__( 'Alignment', 'abcbiz-addons'),
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
					'{{WRAPPER}} .abcbiz-elementor-site-logo-area' => 'text-align: {{VALUE}}',
				],
			]
		);

        $this->end_controls_section();//end content

        //Style Tab
        $this->start_controls_section(
            'abcbiz-elementor-site-logo-style',
            [
                'label' => esc_html__( 'Logo Style', 'abcbiz-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        //width
        $this->add_control(
			'abcbiz-elementor-site-logo-width',
			[
				'label' => esc_html__( 'Logo Width', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%'],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 80,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-site-logo-area img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

        //Spacing
        $this->add_control(
			'abcbiz-elementor-site-logo-spacing',
			[
				'label' => esc_html__( 'Spacing', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px'],
				'default' => [
					'top' => 0,
					'right' => 0,
					'bottom' => 0,
					'left' => 0,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-site-logo-area img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        //Border
        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'abcbiz-elementor-site-logo-border',
                'label' => esc_html__( 'Logo Border', 'abcbiz-addons' ),
				'selector' => '{{WRAPPER}} .abcbiz-elementor-site-logo-area img',
			]
		);

         //Border Radius
         $this->add_control(
			'abcbiz-elementor-site-logo-border-radius',
			[
				'label' => esc_html__( 'Border Radius', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px'],
				'default' => [
					'top' => 0,
					'right' => 0,
					'bottom' => 0,
					'left' => 0,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-site-logo-area img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();//end style
    }

    protected function render() {      
		include 'renderview.php';
    }
}