<?php 
namespace ABCBiz\Includes\Widgets\WooCommerce\ABCProductImg;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;


class Main extends BaseWidget {

	    // define protected variables...
		protected $name = 'abcbiz-wc-featured-image';
		protected $title = 'ABC Product Image';
		protected $icon = 'eicon-product-images abcbiz-addons-icon';
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
            'abcbiz_elementor_wc_product_img_style',
            [
                'label' => esc_html__('Style', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

		//Sales Flash
        $this->add_control(
            'abcbiz_elementor_wc_product_sales_switch',
            [
                'label' => esc_html__('Display Sales Flash?', 'abcbiz-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'abcbiz-addons'),
                'label_off' => esc_html__('Hide', 'abcbiz-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

		//Sales Flash Size
		$this->add_responsive_control(
            'abcbiz_elementor_wc_product_sales_size',
            [
                'label' => esc_html__('Sales Flash Size', 'abcbiz-addons'),
                'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
                'range' => [
					'px' => [
						'min' => 20,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-wc-product-img-area span.onsale' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'abcbiz_elementor_wc_product_sales_switch' => 'yes',
				],
            ]
        );

		//Flash Typograhy
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz_elementor_wc_product_sales_typography',
				'selector' => '{{WRAPPER}} .abcbiz-elementor-wc-product-img-area span.onsale',
				'condition' => [
					'abcbiz_elementor_wc_product_sales_switch' => 'yes',
				],
			]
		);

		//Flash Color
		$this->add_control(
			'abcbiz_elementor_wc_product_sales_color',
			[
				'label' => esc_html__( 'Flash Text Color', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-wc-product-img-area span.onsale' => 'color: {{VALUE}}',
				],
				'condition' => [
					'abcbiz_elementor_wc_product_sales_switch' => 'yes',
				],
			]
		);

		//Flash BG Color
		$this->add_control(
			'abcbiz_elementor_wc_product_sales_bg_color',
			[
				'label' => esc_html__( 'Flash BG Color', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#6841ef',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-wc-product-img-area span.onsale' => 'background-color: {{VALUE}}',
				],
				'condition' => [
					'abcbiz_elementor_wc_product_sales_switch' => 'yes',
				],
			]
		);

		//Sales Flash
        $this->add_control(
            'abcbiz_elementor_wc_product_zoom_icon_switch',
            [
                'label' => esc_html__('Display Magnify icon?', 'abcbiz-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'abcbiz-addons'),
                'label_off' => esc_html__('Hide', 'abcbiz-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

		$this->end_controls_section();

		$this->start_controls_section(
            'abcbiz_elementor_wc_product_img_single_style',
            [
                'label' => esc_html__('Product Image Style', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'abcbiz_elementor_wc_product_img_border',
				'selector' => '{{WRAPPER}} .abcbiz-elementor-wc-product-img-area .woocommerce-product-gallery__image img',
			]
		);

		$this->add_control(
			'abcbiz_elementor_wc_product_img_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'abcbiz-addons' ),
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
					'{{WRAPPER}} .abcbiz-elementor-wc-product-img-area .woocommerce-product-gallery__image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'abcbiz_elementor_wc_product_img_gallery_style',
            [
                'label' => esc_html__('Gallery Image Style', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'abcbiz_elementor_wc_product_gal_img_border',
				'selector' => '{{WRAPPER}} .abcbiz-elementor-wc-product-img-area .flex-control-nav.flex-control-thumbs li img',
			]
		);

		$this->add_control(
			'abcbiz_elementor_wc_product_gal_img_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'abcbiz-addons' ),
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
					'{{WRAPPER}} .abcbiz-elementor-wc-product-img-area .flex-control-nav.flex-control-thumbs li img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

    }

    /**
     * Render the widget output on the frontend.
	 * */

    protected function render()
    {
        include 'renderview.php';
    }
}