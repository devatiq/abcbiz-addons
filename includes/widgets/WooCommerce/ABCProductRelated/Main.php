<?php 
namespace Includes\widgets\WooCommerce\ABCProductRelated;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;

/**
 * Elementor List Widget.
 * @since 1.0.0
 */
class Main extends BaseWidget {

	    // define protected variables...
		protected $name = 'abcbiz-wc-product-related';
		protected $title = 'ABC Related Products';
		protected $icon = 'eicon-product-related';
		protected $categories = [
			'abcbiz-wc-category'
		];		
		protected $keywords = [
			'abc', 'product', 'related'
		];

	/**
	 * Register list widget controls.
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'abcbiz_elementor_wc_product_related_title_style',
			[
				'label' => esc_html__( 'Related Title', 'abcbiz-multi' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		//Title
		$this->add_control(
			'abcbiz_elementor_wc_product_related_title',
			[
				'label' => esc_html__( 'Text', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Related Products', 'abcbiz-multi' ),
			]
		);

		//Title Typoghraphy
		$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'abcbiz_elementor_wc_product_related_title_typography',
					'label' => esc_html__( 'Typography', 'abcbiz-multi' ),
					'selector' => '{{WRAPPER}} h2.abcbiz-wc-related-product-title',
				]
			);

		//Title Color
		$this->add_control(
			'abcbiz_elementor_wc_product_related_title_color',
			[
				'label' => esc_html__( 'Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#333333',
				'selectors' => [
					'{{WRAPPER}} h2.abcbiz-wc-related-product-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

		// Image Style
		$this->start_controls_section(
			'abcbiz_elementor_wc_product_related_img_style',
			[
				'label' => esc_html__( 'Image Style', 'abcbiz-multi' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'abcbiz_elementor_wc_product_related_img_border',
				'selector' => '{{WRAPPER}} .abcbiz-wc-related-products-area img',
			]
		);

		$this->add_control(
			'abcbiz_elementor_wc_product_related_img_border_radius',
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
					'{{WRAPPER}} .abcbiz-wc-related-products-area img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		//Title Style
		$this->start_controls_section(
			'abcbiz_elementor_wc_product_related_product_title_style',
			[
				'label' => esc_html__( 'Product Title Style', 'abcbiz-multi' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		//Title Typoghraphy
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz_elementor_wc_product_related_product_title_typography',
				'label' => esc_html__( 'Typography', 'abcbiz-multi' ),
				'selector' => '{{WRAPPER}} .abcbiz-wc-related-products-area h2.woocommerce-loop-product__title',
			]
		);

	//Title Color
	$this->add_control(
		'abcbiz_elementor_wc_product_related_product_title_color',
		[
			'label' => esc_html__( 'Color', 'abcbiz-multi' ),
			'type'  => Controls_Manager::COLOR,
			'default' => '#333333',
			'selectors' => [
				'{{WRAPPER}} .abcbiz-wc-related-products-area h2.woocommerce-loop-product__title' => 'color: {{VALUE}}',
			],
		]
	);

	//Title hover Color
	$this->add_control(
		'abcbiz_elementor_wc_product_related_product_title_hov_color',
		[
			'label' => esc_html__( 'Hover Color', 'abcbiz-multi' ),
			'type'  => Controls_Manager::COLOR,
			'default' => '#113481',
			'selectors' => [
				'{{WRAPPER}} .abcbiz-wc-related-products-area li:hover h2.woocommerce-loop-product__title' => 'color: {{VALUE}}',
			],
		]
	);

	$this->end_controls_section();

	//Price Style
	$this->start_controls_section(
			'abcbiz_elementor_wc_product_related_product_price_style',
			[
				'label' => esc_html__( 'Price Style', 'abcbiz-multi' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		//Price Typoghraphy
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz_elementor_wc_product_related_product_price_typography',
				'label' => esc_html__( 'Typography', 'abcbiz-multi' ),
				'selector' => '{{WRAPPER}} .abcbiz-wc-related-products-area .amount',
			]
		);

	//price Color
	$this->add_control(
		'abcbiz_elementor_wc_product_related_product_price_color',
		[
			'label' => esc_html__( 'Color', 'abcbiz-multi' ),
			'type'  => Controls_Manager::COLOR,
			'default' => '#113481',
			'selectors' => [
				'{{WRAPPER}} .abcbiz-wc-related-products-area .amount bdi, {{WRAPPER}}.abcbiz-wc-related-products-area .amount ins bdi' => 'color: {{VALUE}}',
			],
		]
	);

	$this->end_controls_section();

	//Button Style
	$this->start_controls_section(
			'abcbiz_elementor_wc_product_related_product_btn_style',
			[
				'label' => esc_html__( 'Button Style', 'abcbiz-multi' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		//Button Typoghraphy
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz_elementor_wc_product_related_product_btn_typography',
				'label' => esc_html__( 'Typography', 'abcbiz-multi' ),
				'selector' => '{{WRAPPER}} .abcbiz-wc-related-products-area ul.products li.product .button',
			]
		);

	//button Color
	$this->add_control(
		'abcbiz_elementor_wc_product_related_product_btn_color',
		[
			'label' => esc_html__( 'Color', 'abcbiz-multi' ),
			'type'  => Controls_Manager::COLOR,
			'default' => '#ffffff',
			'selectors' => [
				'{{WRAPPER}} .abcbiz-wc-related-products-area ul.products li.product .button' => 'color: {{VALUE}}',
			],
		]
	);

	//button bg Color
	$this->add_control(
		'abcbiz_elementor_wc_product_related_product_btn_bg_color',
		[
			'label' => esc_html__( 'Background Color', 'abcbiz-multi' ),
			'type'  => Controls_Manager::COLOR,
			'default' => '#873ff0',
			'selectors' => [
				'{{WRAPPER}} .abcbiz-wc-related-products-area ul.products li.product .button' => 'background-color: {{VALUE}}',
			],
		]
	);

	//Button hover Color
	$this->add_control(
		'abcbiz_elementor_wc_product_related_product_btn_hov_color',
		[
			'label' => esc_html__( 'Hover Color', 'abcbiz-multi' ),
			'type'  => Controls_Manager::COLOR,
			'default' => '#eeeeee',
			'selectors' => [
				'{{WRAPPER}} .abcbiz-wc-related-products-area ul.products li.product .button:hover' => 'color: {{VALUE}}',
			],
		]
	);

	//Button hover bg Color
	$this->add_control(
		'abcbiz_elementor_wc_product_related_product_btn_hov_bg_color',
		[
			'label' => esc_html__( 'Hover Background Color', 'abcbiz-multi' ),
			'type'  => Controls_Manager::COLOR,
			'default' => '#4050e8',
			'selectors' => [
				'{{WRAPPER}} .abcbiz-wc-related-products-area ul.products li.product .button:hover' => 'background-color: {{VALUE}}',
			],
		]
	);

	//Button spacing
	$this->add_control(
		'abcbiz_elementor_wc_product_related_product_btn_spacing',
		[
			'label' => esc_html__( 'Spacing', 'abcbiz-multi' ),
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
				'{{WRAPPER}} .abcbiz-wc-related-products-area ul.products li.product .button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);

	//Button border radius
	$this->add_control(
		'abcbiz_elementor_wc_product_related_product_btn_radius',
		[
			'label' => esc_html__( 'Border Radius', 'abcbiz-multi' ),
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
				'{{WRAPPER}} .abcbiz-wc-related-products-area ul.products li.product .button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);

	$this->end_controls_section();

	//Sales Flash Style
	$this->start_controls_section(
		'abcbiz_elementor_wc_product_related_product_flash_style',
		[
			'label' => esc_html__( 'Sales Flash Style', 'abcbiz-multi' ),
			'tab' => Controls_Manager::TAB_STYLE,
		]
	);

	//sales flash bg Color
	$this->add_control(
		'abcbiz_elementor_wc_product_related_product_flash_color',
		[
			'label' => esc_html__( 'Color', 'abcbiz-multi' ),
			'type'  => Controls_Manager::COLOR,
			'default' => '#ffffff',
			'selectors' => [
				'{{WRAPPER}} .abcbiz-wc-related-products-area ul.products li.product .onsale' => 'color: {{VALUE}}',
			],
		]
	);

	$this->add_control(
		'abcbiz_elementor_wc_product_related_product_flash_bg_color',
		[
			'label' => esc_html__( 'Background Color', 'abcbiz-multi' ),
			'type'  => Controls_Manager::COLOR,
			'default' => '#5446e8',
			'selectors' => [
				'{{WRAPPER}} .abcbiz-wc-related-products-area ul.products li.product .onsale' => 'background-color: {{VALUE}}',
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

?>
<?php 
function abcbiz_remove_related_products_title( $args ) {
    $args['title'] = ''; // Set the title to an empty string
    return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'abcbiz_remove_related_products_title' );

?>
