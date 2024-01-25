<?php 
namespace ABCBiz\Includes\Widgets\ABCFeturedImg;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;

class Main extends BaseWidget {

	    // define protected variables...
		protected $name = 'abcbiz-featured-image';
		protected $title = 'ABC Featured Image';
		protected $icon = 'eicon-image abcbiz-addons-icon';
		protected $categories = [
			'abcbiz-category'
		];		
		protected $keywords = [
			'abc', 'featured', 'image', 'featured image',
		];


	/**
	 * Register widget controls.
	 */
	protected function register_controls() {
		//Template
		$this->start_controls_section(
			'abcbiz-elementor-fearture-img',
			[
				'label' => esc_html__( 'Image Alignment', 'abcbiz-addons' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		//Alignment
		$this->add_responsive_control(
			'abc_elementor_feat_img_align',
			[
				'label' => esc_html__( 'Alignment', 'abcbiz-addons'),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'center',
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
					'{{WRAPPER}} .abcbiz-elementor-feat-img-area' => 'text-align: {{VALUE}}',
				],
			]
		);
		
		$this->end_controls_section();

		//Style Section
		$this->start_controls_section(
            'abcbiz-elementor-fearture-img-style',
            [
                'label' => esc_html__('Style', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

		//image Width
		$this->add_responsive_control(
            'abcbiz-elementor-fearture-img-size',
            [
                'label' => esc_html__('Image Width', 'abcbiz-addons'),
                'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%'],
                'range' => [
					'px' => [
						'min' => 10,
						'max' => 1000,
						'step' => 10,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 100,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-feat-img-area img' => 'width: {{SIZE}}{{UNIT}};',
				],
            
            ]
        );

		//image border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'abcbiz-elementor-fearture-img-border',
				'selector' => '{{WRAPPER}} .abcbiz-elementor-feat-img-area img',
			]
		);

		//image border radius
		$this->add_control(
			'abcbiz-elementor-fearture-img-border-radius',
			[
				'label' => esc_html__( 'Border Radius', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'default' => [
					'top' => 0,
					'right' => 0,
					'bottom' => 0,
					'left' => 0,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-feat-img-area img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        include 'renderview.php';
    }
}