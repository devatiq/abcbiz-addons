<?php 
namespace ABCBiz\Includes\Widgets\WooCommerce\ABCProductPrice;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;

/**
 * Elementor List Widget.
 * @since 1.0.0
 */
class Main extends BaseWidget {

	    // define protected variables...
		protected $name = 'abcbiz-wc-product-price';
		protected $title = 'ABC Product Price';
		protected $icon = 'eicon-product-price';
		protected $categories = [
			'abcbiz-wc-category'
		];		
		protected $keywords = [
			'abc', 'product', 'price'
		];


	/**
	 * Register list widget controls.
	 */
	protected function register_controls() {
		//Template
		$this->start_controls_section(
			'abcbiz_elementor_wc_product_price',
			[
				'label' => esc_html__( 'Style', 'abcbiz-multi' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		//Alignment
		$this->add_responsive_control(
			'abcbiz_elementor_wc_product_price_align',
			[
				'label' => esc_html__( 'Alignment', 'abcbiz-multi'),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'left',
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
					'{{WRAPPER}} .abcbiz-elementor-wc-product-price .price' => 'text-align: {{VALUE}}',
				],
			]
		);

		//Price Color regular
		$this->add_control(
			'abcbiz_elementor_wc_product_price_regular_color',
			[
				'label' => esc_html__( 'Price Regular Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#999999',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-wc-product-price .price del bdi, {{WRAPPER}} .abcbiz-elementor-wc-product-price .price bdi' => 'color: {{VALUE}}',
				],
			]
		);

		//Price regular typoghraphy
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz_elementor_wc_product_price_regular_typography',
				'label' => esc_html__( 'Typography', 'abcbiz-multi' ),
				'selector' => '{{WRAPPER}} .abcbiz-elementor-wc-product-price .price del bdi, {{WRAPPER}} .abcbiz-elementor-wc-product-price .price bdi',
			]
		);


		//Price Color sales
		$this->add_control(
			'abcbiz_elementor_wc_product_price_sales_color',
			[
				'label' => esc_html__( 'Price Sales Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#333333',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-wc-product-price .price ins bdi' => 'color: {{VALUE}}',
				],
			]
		);

		//Price sales typoghraphy
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz_elementor_wc_product_price_sales_typography',
				'label' => esc_html__( 'Typography', 'abcbiz-multi' ),
				'selector' => '{{WRAPPER}} .abcbiz-elementor-wc-product-price .price ins bdi',
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