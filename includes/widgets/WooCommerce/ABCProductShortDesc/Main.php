<?php 
namespace ABCBiz\Includes\Widgets\WooCommerce\ABCProductShortDesc;

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
		protected $name = 'abcbiz-wc-product-short-desc';
		protected $title = 'ABC Product Short Description';
		protected $icon = 'eicon-product-description abcbiz-addons-icon';
		protected $categories = [
			'abcbiz-wc-category'
		];		
		protected $keywords = [
			'abc', 'product', 'summery', 'short', 'description',
		];


	/**
	 * Register list widget controls.
	 */
	protected function register_controls() {
		//Template
		$this->start_controls_section(
			'abcbiz_elementor_wc_product_short_desc',
			[
				'label' => esc_html__( 'Style', 'abcbiz-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		//Alignment
		$this->add_responsive_control(
			'abcbiz_elementor_wc_product_short_desc_align',
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
					'{{WRAPPER}} .abcbiz-elementor-wc-product-short-desc' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'abcbiz_elementor_wc_product_short_desc_color',
			[
				'label' => esc_html__( 'Color', 'abcbiz-addons' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#555555',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-wc-product-short-desc' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz_elementor_wc_product_short_desc_typography',
				'label' => esc_html__( 'Typography', 'abcbiz-addons' ),
				'selector' => '{{WRAPPER}} .abcbiz-elementor-wc-product-short-desc',
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