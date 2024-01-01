<?php 
namespace Includes\widgets\WooCommerce\ABCProductTabs;

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
		protected $name = 'abcbiz-wc-product-tabs';
		protected $title = 'ABC Product Tabs';
		protected $icon = 'eicon-product-tabs';
		protected $categories = [
			'abcbiz-wc-category'
		];		
		protected $keywords = [
			'abc', 'product', 'meta'
		];


	/**
	 * Register list widget controls.
	 */
	protected function register_controls() {
		//Template
		$this->start_controls_section(
			'abcbiz_elementor_wc_product_tabs',
			[
				'label' => esc_html__( 'Style', 'abcbiz-multi' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		//SKU
        $this->add_control(
            'abcbiz_elementor_wc_product_tabs_sku_switch',
            [
                'label' => esc_html__('Display SKU?', 'abcbiz-multi'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'abcbiz-multi'),
                'label_off' => esc_html__('Hide', 'abcbiz-multi'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

		//Category
        $this->add_control(
            'abcbiz_elementor_wc_product_tabs_category_switch',
            [
                'label' => esc_html__('Display Category?', 'abcbiz-multi'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'abcbiz-multi'),
                'label_off' => esc_html__('Hide', 'abcbiz-multi'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

		//Tags
        $this->add_control(
            'abcbiz_elementor_wc_product_tabs_tags_switch',
            [
                'label' => esc_html__('Display Tags?', 'abcbiz-multi'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'abcbiz-multi'),
                'label_off' => esc_html__('Hide', 'abcbiz-multi'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

		//Divider
        $this->add_control(
            'abcbiz_elementor_wc_product_tabs_div_switch',
            [
                'label' => esc_html__('Display Divider?', 'abcbiz-multi'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'abcbiz-multi'),
                'label_off' => esc_html__('Hide', 'abcbiz-multi'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

		//SKU Color
		$this->add_control(
			'abcbiz_elementor_wc_product_tabs_sku_color',
			[
				'label' => esc_html__( 'SKU Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#333333',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-wc-product-tabs .abcbiz-product-sku' => 'color: {{VALUE}}',
				],

				'condition' => [
					'abcbiz_elementor_wc_product_tabs_sku_switch' => 'yes',
				],
			]
		);

		//SKU typoghraphy
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz_elementor_wc_product_tabs_sku_typography',
				'label' => esc_html__( 'SKU Typography', 'abcbiz-multi' ),
				'selector' => '{{WRAPPER}} .abcbiz-elementor-wc-product-tabs .abcbiz-product-sku',
				'condition' => [
					'abcbiz_elementor_wc_product_tabs_sku_switch' => 'yes',
				],
			]
		);

		//Category Color
		$this->add_control(
			'abcbiz_elementor_wc_product_tabs_cat_color',
			[
				'label' => esc_html__( 'Category Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#333333',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-wc-product-tabs .abcbiz-product-categories, {{WRAPPER}} .abcbiz-elementor-wc-product-tabs .abcbiz-product-categories a' => 'color: {{VALUE}}',
				],

				'condition' => [
					'abcbiz_elementor_wc_product_tabs_category_switch' => 'yes',
				],
			]
		);

		//Category typoghraphy
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz_elementor_wc_product_tabs_cat_typography',
				'label' => esc_html__( 'Category Typography', 'abcbiz-multi' ),
				'selector' => '{{WRAPPER}} .abcbiz-elementor-wc-product-tabs .abcbiz-product-categories',
				'condition' => [
					'abcbiz_elementor_wc_product_tabs_category_switch' => 'yes',
				],
			]
		);

		//Tags Color
		$this->add_control(
			'abcbiz_elementor_wc_product_tabs_tag_color',
			[
				'label' => esc_html__( 'Tags Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#333333',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-wc-product-tabs .abcbiz-product-tags, {{WRAPPER}} .abcbiz-elementor-wc-product-tabs .abcbiz-product-tags a' => 'color: {{VALUE}}',
				],

				'condition' => [
					'abcbiz_elementor_wc_product_tabs_tags_switch' => 'yes',
				],
			]
		);

		//Tags typoghraphy
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz_elementor_wc_product_tabs_tag_typography',
				'label' => esc_html__( 'Tags Typography', 'abcbiz-multi' ),
				'selector' => '{{WRAPPER}} .abcbiz-elementor-wc-product-tabs .abcbiz-product-tags',
				'condition' => [
					'abcbiz_elementor_wc_product_tabs_tags_switch' => 'yes',
				],
			]
		);

		//Tags Color
		$this->add_control(
			'abcbiz_elementor_wc_product_tabs_div_color',
			[
				'label' => esc_html__( 'Divider Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#e6e6e6',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-wc-product-tabs .abcbiz-tabs-divider' => 'background-color: {{VALUE}}',
				],

				'condition' => [
					'abcbiz_elementor_wc_product_tabs_div_switch' => 'yes',
				],
			]
		);

		$this->add_control(
			'abcbiz_elementor_wc_product_tabs_div_space',
			[
				'label' => esc_html__( 'Divider Space', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-wc-product-tabs .abcbiz-tabs-divider' => 'margin-top: {{SIZE}}{{UNIT}}; margin-bottom: {{SIZE}}{{UNIT}};',
				],

				'condition' => [
					'abcbiz_elementor_wc_product_tabs_div_switch' => 'yes',
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