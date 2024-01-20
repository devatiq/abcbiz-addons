<?php 
namespace ABCBiz\Includes\Widgets\WooCommerce\ABCProductCheckout;

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
		protected $name = 'abcbiz-wc-checkout';
		protected $title = 'ABC Checkout Page';
		protected $icon = 'eicon-checkout abcbiz-multi-icon';
		protected $categories = [
			'abcbiz-wc-category'
		];		
		protected $keywords = [
			'abc', 'woo', 'checkout'
		];

	protected function register_controls() {

		//Info Style
		$this->start_controls_section(
			'abcbiz_elementor_wc_product_checkout_page_info_style',
			[
				'label' => esc_html__( 'Info Style', 'abcbiz-multi' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		//Border Color
		$this->add_control(
			'abcbiz_elementor_wc_product_checkout_page_info_border_color',
			[
				'label' => esc_html__( 'Border Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#6f45ed',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-wc-checkout-page .woocommerce-info' => 'border-color: {{VALUE}}',
					'{{WRAPPER}} .abcbiz-elementor-wc-checkout-page .woocommerce-info::before' => 'color: {{VALUE}}',
				],
			]
		);

		//Background Color
		$this->add_control(
			'abcbiz_elementor_wc_product_checkout_page_info_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#f6f5f8',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-wc-checkout-page .woocommerce-info' => 'background-color: {{VALUE}}',
				],
			]
		);

		//Text Color
		$this->add_control(
			'abcbiz_elementor_wc_product_checkout_page_info_text_color',
			[
				'label' => esc_html__( 'Text Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#333333',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-wc-checkout-page .woocommerce-info' => 'color: {{VALUE}}',
				],
			]
		);

		//Link Color
		$this->add_control(
			'abcbiz_elementor_wc_product_checkout_page_info_link_color',
			[
				'label' => esc_html__( 'Link Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#1D56E6',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-wc-checkout-page .woocommerce-info a' => 'color: {{VALUE}}',
				],
			]
		);

		//typoghraphy
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz_elementor_wc_product_checkout_page_info_text_typography',
				'label' => esc_html__( 'Typography', 'abcbiz-multi' ),
				'selector' => '{{WRAPPER}} .abcbiz-elementor-wc-checkout-page .woocommerce-info',
			]
		);

        $this->end_controls_section();

		//Billing Style
		$this->start_controls_section(
			'abcbiz_elementor_wc_product_checkout_page_billing_style',
			[
				'label' => esc_html__( 'Billing Style', 'abcbiz-multi' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		//heading typoghraphy
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz_elementor_wc_checkout_page_billing_heading_typography',
				'label' => esc_html__( 'Heading Typography', 'abcbiz-multi' ),
				'selector' => '{{WRAPPER}} .abcbiz-elementor-wc-checkout-page .woocommerce-billing-fields h3',
			]
		);

		//Heading Color
		$this->add_control(
			'abcbiz_elementor_wc_checkout_page_billing_heading_color',
			[
				'label' => esc_html__( 'Heading Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#1D56E6',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-wc-checkout-page .woocommerce-billing-fields h3' => 'color: {{VALUE}}',
				],
			]
		);

		//Label typoghraphy
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz_elementor_wc_checkout_page_billing_label_typography',
				'label' => esc_html__( 'Label Typography', 'abcbiz-multi' ),
				'selector' => '{{WRAPPER}} .abcbiz-elementor-wc-checkout-page .woocommerce-billing-fields label',
			]
		);

		//Label Color
		$this->add_control(
			'abcbiz_elementor_wc_checkout_page_billing_label_color',
			[
				'label' => esc_html__( 'Label Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#1D56E6',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-wc-checkout-page .woocommerce-billing-fields label' => 'color: {{VALUE}}',
				],
			]
		);

		//spacing
		$this->add_control(
			'abcbiz_elementor_wc_checkout_page_billing_input_spacing',
			[
				'label' => esc_html__( 'Input Fields Spacing', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px'],
				'default' => [
					'top' => 10,
					'right' => 15,
					'bottom' => 10,
					'left' => 15,
					'unit' => 'px',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-wc-checkout-page .woocommerce-billing-fields input, {{WRAPPER}} .abcbiz-elementor-wc-checkout-page .woocommerce-billing-fields select' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		//Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'abcbiz_elementor_wc_checkout_page_billing_input_spacing_border',
				'selector' => '{{WRAPPER}} .abcbiz-elementor-wc-checkout-page .woocommerce-billing-fields input, .abcbiz-elementor-wc-checkout-page .woocommerce-billing-fields .select2-selection--single',
			]
		);

		$this->end_controls_section();

		//Order Review Style
		$this->start_controls_section(
			'abcbiz_elementor_wc_product_checkout_page_order_review_style',
			[
				'label' => esc_html__( 'Order Review Style', 'abcbiz-multi' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		//heading typoghraphy
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz_elementor_wc_checkout_page_review_heading_typography',
				'label' => esc_html__( 'Heading Typography', 'abcbiz-multi' ),
				'selector' => '{{WRAPPER}} .abcbiz-elementor-wc-checkout-page h3#order_review_heading',
			]
		);

		//Heading Color
		$this->add_control(
			'abcbiz_elementor_wc_checkout_page_review_heading_color',
			[
				'label' => esc_html__( 'Heading Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#1D56E6',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-wc-checkout-page h3#order_review_heading' => 'color: {{VALUE}}',
				],
			]
		);

		//Data Color
		$this->add_control(
			'abcbiz_elementor_wc_checkout_page_review_data_color',
			[
				'label' => esc_html__( 'Data Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#333333',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-wc-checkout-page .woocommerce-checkout-review-order table td, {{WRAPPER}} .abcbiz-elementor-wc-checkout-page .woocommerce-checkout-review-order table th' => 'color: {{VALUE}}',
				],
			]
		);

		//Border Color
		$this->add_control(
			'abcbiz_elementor_wc_checkout_page_review_border_color',
			[
				'label' => esc_html__( 'Border Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => 'rgba(0,0,0,.1)',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-wc-checkout-page .woocommerce-checkout-review-order table table, {{WRAPPER}} .abcbiz-elementor-wc-checkout-page .woocommerce-checkout-review-order table td, {{WRAPPER}} .abcbiz-elementor-wc-checkout-page .woocommerce-checkout-review-order table th' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

		//Order Button Style
		$this->start_controls_section(
			'abcbiz_elementor_wc_product_checkout_page_order_btn_style',
			[
				'label' => esc_html__( 'Order Button Style', 'abcbiz-multi' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		//button typoghraphy
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz_elementor_wc_checkout_page_order_btn_typography',
				'label' => esc_html__( 'Button Typography', 'abcbiz-multi' ),
				'selector' => '{{WRAPPER}} .abcbiz-elementor-wc-checkout-page .place-order button.button.alt',
			]
		);

		//Text Color
		$this->add_control(
			'abcbiz_elementor_wc_checkout_page_order_btn_color',
			[
				'label' => esc_html__( 'Text Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-wc-checkout-page .place-order button.button.alt' => 'color: {{VALUE}}',
				],
			]
		);

		//BG Color
		$this->add_control(
			'abcbiz_elementor_wc_checkout_page_order_btn_bg_color',
			[
				'label' => esc_html__( 'Text Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#1D56E6',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-wc-checkout-page .place-order button.button.alt' => 'background-color: {{VALUE}}',
				],
			]
		);

		//Text Hover Color
		$this->add_control(
			'abcbiz_elementor_wc_checkout_page_order_btn_hov_color',
			[
				'label' => esc_html__( 'Text Hover Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-wc-checkout-page .place-order button.button.alt:hover' => 'color: {{VALUE}}',
				],
			]
		);

		//Text Hover BG Color
		$this->add_control(
			'abcbiz_elementor_wc_checkout_page_order_btn_hov_bg_color',
			[
				'label' => esc_html__( 'Hover BG Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#6A0AD5',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-wc-checkout-page .place-order button.button.alt:hover' => 'background-color: {{VALUE}}',
				],
			]
		);

			//button spacing
			$this->add_control(
				'abcbiz_elementor_wc_checkout_page_order_btn_spacing',
				[
					'label' => esc_html__( 'Input Fields Spacing', 'abcbiz-multi' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px'],
					'default' => [
						'top' => 12,
						'right' => 25,
						'bottom' => 12,
						'left' => 25,
						'unit' => 'px',
						'isLinked' => false,
					],
					'selectors' => [
						'{{WRAPPER}}  .abcbiz-elementor-wc-checkout-page .place-order button.button.alt' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			//border radius
			$this->add_control(
				'abcbiz_elementor_wc_checkout_page_order_btn_border_radius',
				[
					'label' => esc_html__( 'Input Fields Spacing', 'abcbiz-multi' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px'],
					'default' => [
						'top' => 5,
						'right' => 5,
						'bottom' => 5,
						'left' => 5,
						'unit' => 'px',
						'isLinked' => true,
					],
					'selectors' => [
						'{{WRAPPER}}  .abcbiz-elementor-wc-checkout-page .place-order button.button.alt' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

		//Additional Info Style
		$this->start_controls_section(
			'abcbiz_elementor_wc_product_checkout_page_add_info_style',
			[
				'label' => esc_html__( 'Additional Info Style', 'abcbiz-multi' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		//Additional Info typoghraphy
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz_elementor_wc_product_checkout_page_add_heading_typography',
				'label' => esc_html__( 'Heading Typography', 'abcbiz-multi' ),
				'selector' => '{{WRAPPER}} .abcbiz-elementor-wc-checkout-page .woocommerce-additional-fields h3',
			]
		);

		//Additional Info Color
		$this->add_control(
			'abcbiz_elementor_wc_checkout_page_add_heading_color',
			[
				'label' => esc_html__( 'Heading Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#1D56E6',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-wc-checkout-page .woocommerce-additional-fields h3' => 'color: {{VALUE}}',
				],
			]
		);

		//Additional label typoghraphy
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz_elementor_wc_checkout_page_add_label_typography',
				'label' => esc_html__( 'Heading Typography', 'abcbiz-multi' ),
				'selector' => '{{WRAPPER}} .abcbiz-elementor-wc-checkout-page .woocommerce-additional-fields label',
			]
		);

		//Additional label Color
		$this->add_control(
			'abcbiz_elementor_wc_checkout_page_add_label_color',
			[
				'label' => esc_html__( 'Label Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#1D56E6',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-wc-checkout-page .woocommerce-additional-fields label' => 'color: {{VALUE}}',
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