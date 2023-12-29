<?php 
namespace Includes\widgets\WooCommerce\ABCProductImg;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;


class Main extends BaseWidget {

	    // define protected variables...
		protected $name = 'abcbiz-wc-featured-image';
		protected $title = 'ABC Product Image';
		protected $icon = 'eicon-product-images';
		protected $categories = [
			'abcbiz-wc-category'
		];		
		protected $keywords = [
			'abc', 'product', 'image', 'product image',
		];


	/**
	 * Register list widget controls.
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'abcbiz_elementor_wc_product_img_setting',
			[
				'label' => esc_html__( 'Settings', 'abcbiz-multi' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		//Alignment
		$this->add_responsive_control(
			'abcbiz_elementor_wc_product_img_align',
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
					'{{WRAPPER}} .abcbiz-elementor-product-img-area' => 'text-align: {{VALUE}}',
				],
			]
		);
		
		$this->end_controls_section();

		//Style Section
		$this->start_controls_section(
            'abcbiz_elementor_wc_product_img_style',
            [
                'label' => esc_html__('Style', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

		//image Width
		$this->add_responsive_control(
            'abcbiz_elementor_wc_product_img_size',
            [
                'label' => esc_html__('Image Width', 'abcbiz-multi'),
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
					'{{WRAPPER}} .abcbiz-elementor-product-img-area img' => 'width: {{SIZE}}{{UNIT}};',
				],
            
            ]
        );

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'abcbiz_elementor_wc_product_img_border',
				'selector' => '{{WRAPPER}} .abcbiz-elementor-product-img-area img',
			]
		);

		$this->add_control(
			'abcbiz_elementor_wc_product_img_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'default' => [
					'top' => 0,
					'right' => 0,
					'bottom' => 0,
					'left' => 0,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-product-img-area img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

    }

    /**
     * Render the widget output on the frontend.
	 * */

    protected function render()
    {
        include 'renderview.php';
    }
}