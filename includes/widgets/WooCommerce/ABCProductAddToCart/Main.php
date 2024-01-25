<?php 
namespace ABCBiz\Includes\Widgets\WooCommerce\ABCProductAddToCart;

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
		protected $name = 'abcbiz-wc-add-to-cart';
		protected $title = 'ABC Add to Cart';
		protected $icon = 'eicon-product-add-to-cart abcbiz-addons-icon';
		protected $categories = [
			'abcbiz-wc-category'
		];		
		protected $keywords = [
			'abc', 'product', 'add', 'cart'
		];

		public function get_script_depends()
		{
			return ['abcbiz-add-to-cart'];
		}


	/**
	 * Register list widget controls.
	 */
	protected function register_controls() {
		//Template
		$this->start_controls_section(
			'abcbiz_elementor_wc_product_add_to_cart',
			[
				'label' => esc_html__( 'Button Style', 'abcbiz-addons' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		//Button Typoghraphy
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz_elementor_wc_product_add_to_cart_btn_typography',
				'label' => esc_html__( 'Typography', 'abcbiz-addons' ),
				'selector' => '{{WRAPPER}} .abcbiz-wc-qty-button-holder button.button',
			]
		);

	//button Color
	$this->add_control(
		'abcbiz_elementor_wc_product_add_to_cart_btn_color',
		[
			'label' => esc_html__( 'Color', 'abcbiz-addons' ),
			'type'  => Controls_Manager::COLOR,
			'default' => '#ffffff',
			'selectors' => [
				'{{WRAPPER}} .abcbiz-wc-qty-button-holder button.button' => 'color: {{VALUE}}',
			],
		]
	);

	//button bg Color
	$this->add_control(
		'abcbiz_elementor_wc_product_add_to_cart_btn_bg_color',
		[
			'label' => esc_html__( 'Background Color', 'abcbiz-addons' ),
			'type'  => Controls_Manager::COLOR,
			'default' => '#873ff0',
			'selectors' => [
				'{{WRAPPER}} .abcbiz-wc-qty-button-holder button.button' => 'background-color: {{VALUE}}',
			],
		]
	);

	//Button hover Color
	$this->add_control(
		'abcbiz_elementor_wc_product_add_to_cart_btn_hov_color',
		[
			'label' => esc_html__( 'Hover Color', 'abcbiz-addons' ),
			'type'  => Controls_Manager::COLOR,
			'default' => '#eeeeee',
			'selectors' => [
				'{{WRAPPER}} .abcbiz-wc-qty-button-holder button.button:hover' => 'color: {{VALUE}}',
			],
		]
	);

	//Button hover bg Color
	$this->add_control(
		'abcbiz_elementor_wc_product_add_to_cart_btn_hov_bg_color',
		[
			'label' => esc_html__( 'Hover Background Color', 'abcbiz-addons' ),
			'type'  => Controls_Manager::COLOR,
			'default' => '#4050e8',
			'selectors' => [
				'{{WRAPPER}} .abcbiz-wc-qty-button-holder button.button:hover' => 'background-color: {{VALUE}}',
			],
		]
	);

	//Button spacing
	$this->add_responsive_control(
		'abcbiz_elementor_wc_product_add_to_cart_btn_spacing',
		[
			'label' => esc_html__( 'Spacing', 'abcbiz-addons' ),
			'type' => \Elementor\Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px' ],
			'default' => [
				'top' => 10,
				'right' => 20,
				'bottom' => 10,
				'left' => 20,
				'unit' => 'px',
				'isLinked' => false,
			],
			'selectors' => [
				'{{WRAPPER}} .abcbiz-wc-qty-button-holder button.button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);

	//Button border radius
	$this->add_control(
		'abcbiz_elementor_wc_product_add_to_cart_btn_radius',
		[
			'label' => esc_html__( 'Border Radius', 'abcbiz-addons' ),
			'type' => \Elementor\Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px' ],
			'default' => [
				'top' => 10,
				'right' => 10,
				'bottom' => 10,
				'left' => 10,
				'unit' => 'px',
				'isLinked' => true,
			],
			'selectors' => [
				'{{WRAPPER}} .abcbiz-wc-qty-button-holder button.button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);
        $this->end_controls_section();

		$this->start_controls_section(
			'abcbiz_elementor_wc_product_add_to_cart_quatity',
			[
				'label' => esc_html__( 'Quantity Input Style', 'abcbiz-addons' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		//input field width
		$this->add_control(
			'abcbiz_elementor_wc_product_add_to_cart_quatity_width',
			[
				'label' => esc_html__( 'Quantity Input Width', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 50,
						'max' => 500,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 90,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-wc-qty-button-holder .quantity input' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		//Input Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'abcbiz_elementor_wc_product_add_to_cart_quatity_border',
				'selector' => '{{WRAPPER}} .abcbiz-wc-qty-button-holder .quantity input',
			]
		);

			//Font Size
	$this->add_control(
		'abcbiz_elementor_wc_product_add_to_cart_quatity_font',
		[
			'label' => esc_html__( 'Font Size', 'abcbiz-addons' ),
			'type' => \Elementor\Controls_Manager::SLIDER,
			'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 60,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 16,
				],
			'selectors' => [
				'{{WRAPPER}} .abcbiz-wc-qty-button-holder .quantity input' => 'font-size: {{SIZE}}{{UNIT}};',
			],
		]
	);

		//Input spacing
	$this->add_control(
		'abcbiz_elementor_wc_product_add_to_cart_quatity_spacing',
		[
			'label' => esc_html__( 'Spacing', 'abcbiz-addons' ),
			'type' => \Elementor\Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px' ],
			'default' => [
				'top' => 10,
				'right' => 20,
				'bottom' => 10,
				'left' => 20,
				'unit' => 'px',
				'isLinked' => false,
			],
			'selectors' => [
				'{{WRAPPER}} .abcbiz-wc-qty-button-holder .quantity input' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);

	//border radius
	$this->add_control(
		'abcbiz_elementor_wc_product_add_to_cart_quatity_radius',
		[
			'label' => esc_html__( 'Border Radius', 'abcbiz-addons' ),
			'type' => \Elementor\Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px' ],
			'default' => [
				'top' => 5,
				'right' => 5,
				'bottom' => 5,
				'left' => 5,
				'unit' => 'px',
				'isLinked' => true,
			],
			'selectors' => [
				'{{WRAPPER}} .abcbiz-wc-qty-button-holder .quantity input' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);

		$this->end_controls_section();

		//Stock Style
		$this->start_controls_section(
			'abcbiz_elementor_wc_product_add_to_cart_in_stock',
			[
				'label' => esc_html__( 'Stock Style', 'abcbiz-addons' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		//Stock Typoghraphy
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz_elementor_wc_product_add_to_cart_in_stock_typography',
				'label' => esc_html__( 'Typography', 'abcbiz-addons' ),
				'selector' => '{{WRAPPER}} .abcbiz-elementor-wc-add-to-cart .stock',
			]
		);

	//Stock Color
	$this->add_control(
		'abcbiz_elementor_wc_product_add_to_cart_in_stock_color',
		[
			'label' => esc_html__( 'Color', 'abcbiz-addons' ),
			'type'  => Controls_Manager::COLOR,
			'default' => '#333333',
			'selectors' => [
				'{{WRAPPER}} .abcbiz-elementor-wc-add-to-cart .stock' => 'color: {{VALUE}}',
			],
		]
	);

	$this->end_controls_section();

		//Variation Price Style
		$this->start_controls_section(
			'abcbiz_elementor_wc_product_add_to_cart_var_price',
			[
				'label' => esc_html__( 'Variation Price Style', 'abcbiz-addons' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		//Variation Price Typoghraphy
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz_elementor_wc_product_add_to_cart_var_price_typography',
				'label' => esc_html__( 'Typography', 'abcbiz-addons' ),
				'selector' => '{{WRAPPER}} .abcbiz-elementor-wc-add-to-cart .price bdi',
			]
		);

	//Variation Price Color
	$this->add_control(
		'abcbiz_elementor_wc_product_add_to_cart_var_price_color',
		[
			'label' => esc_html__( 'Color', 'abcbiz-addons' ),
			'type'  => Controls_Manager::COLOR,
			'default' => '#333333',
			'selectors' => [
				'{{WRAPPER}} .abcbiz-elementor-wc-add-to-cart .price bdi' => 'color: {{VALUE}}',
			],
		]
	);

	$this->end_controls_section();
		

    }
	
	public function before_add_to_cart_quantity() {
		?>
		<div class="abcbiz-wc-qty-button-holder">
		<?php
	}

	/**
	 * After Add to Cart Quantity
	 */
	public function after_add_to_cart_button() {
		?>
		</div>
		<div id="acbbiz-add-to-cart-message"></div>
		<?php
	}

	public function unescape_html( $safe_text, $text ) {
		return $text;
	}

	private function render_form_button( $product ) {
		if ( ! $product && current_user_can( 'manage_options' ) ) {
			echo esc_html__( 'Please set a valid product', 'abcbiz-addons' );
			return;
		}
	
		$text_callback = function() {
			ob_start();          
			echo esc_html__('Add to cart', 'abcbiz-addons');          
			return ob_get_clean();
		};
	
		add_filter( 'woocommerce_product_single_add_to_cart_text', $text_callback );
		add_filter( 'esc_html', [ $this, 'unescape_html' ], 10, 2 );
	
		ob_start();
		woocommerce_template_single_add_to_cart();
		$form = ob_get_clean();
	
		// Add the data-product_id attribute
		$product_id = $product->get_id();
		$replacement = 'single_add_to_cart_button elementor-button abcbiz_add_to_cart button alt" data-product_id="' . esc_attr($product_id) . '"';
		$form = str_replace( 'single_add_to_cart_button', $replacement, $form );
	
		echo $form; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
	
	public function get_product( $product_id = false ) {
		if ( 'product_variation' === get_post_type() ) {
			return $this->get_product_variation( $product_id );
		}

		$product = wc_get_product( $product_id );

		if ( ! $product ) {
			$product = wc_get_product();
		}

		return $product;
	}

	public function get_product_variation( $product_id = false ) {
		return wc_get_product( get_the_ID() );
	}
    /**
     * Render the widget output on the frontend.
     */
    protected function render()
    {
        include 'renderview.php';
    }
}