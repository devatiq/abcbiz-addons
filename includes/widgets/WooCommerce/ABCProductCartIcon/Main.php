<?php 
namespace ABCBiz\Includes\Widgets\WooCommerce\ABCProductCartIcon;

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
		protected $name = 'abcbiz-wc-cart-icon';
		protected $title = 'ABC Cart Icon';
		protected $icon = 'eicon-cart-medium';
		protected $categories = [
			'abcbiz-wc-category'
		];		
		protected $keywords = [
			'abc', 'product', 'cart'
		];

		public function get_script_depends()
		{
			return ['abcbiz-cart-count-update']; 
		}

	/**
	 * Register list widget controls.
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'abcbiz_elementor_wc_product_cart_icon',
			[
				'label' => esc_html__( 'Style', 'abcbiz-multi' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		//Icon Size
		$this->add_responsive_control(
			'abcbiz_elementor_wc_product_cart_icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 24,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-wc-cart-icon .abcbiz-cart-contents .eicon-cart-solid' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		//Icon Color
		$this->add_control(
			'abcbiz_elementor_wc_product_cart_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#333333',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-wc-cart-icon .abcbiz-cart-contents .eicon-cart-solid' => 'color: {{VALUE}}',
				],
			]
		);

		//Icon Hover Color
		$this->add_control(
			'abcbiz_elementor_wc_product_cart_icon_hov_color',
			[
				'label' => esc_html__( 'Icon Hover Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#873ff0',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-wc-cart-icon:hover .abcbiz-cart-contents .eicon-cart-solid' => 'color: {{VALUE}}',
				],
			]
		);

		//Counter
        $this->add_control(
            'abcbiz_elementor_wc_product_cart_count_switch',
            [
                'label' => esc_html__('Display Counter?', 'abcbiz-multi'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'abcbiz-multi'),
                'label_off' => esc_html__('Hide', 'abcbiz-multi'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

		//Count BG Color
		$this->add_control(
			'abcbiz_elementor_wc_product_cart_count_bg_color',
			[
				'label' => esc_html__( 'Counter BG Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#873ff0',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-wc-cart-icon .abcbiz-cart-contents .abcbiz-cart-contents-count' => 'background-color: {{VALUE}}',
				],
				'condition' => [
					'abcbiz_elementor_wc_product_cart_count_switch' => 'yes',
				],
			]
		);

		//Count BG Hover Color
		$this->add_control(
			'abcbiz_elementor_wc_product_cart_count_bg_hover_color',
			[
				'label' => esc_html__( 'Counter BG Hover Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#005ab4',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-wc-cart-icon:hover .abcbiz-cart-contents .abcbiz-cart-contents-count' => 'background-color: {{VALUE}}',
				],
				'condition' => [
					'abcbiz_elementor_wc_product_cart_count_switch' => 'yes',
				],
			]
		);

		//Number Color
		$this->add_control(
			'abcbiz_elementor_wc_product_cart_count_color',
			[
				'label' => esc_html__( 'Number Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-wc-cart-icon .abcbiz-cart-contents .abcbiz-cart-contents-count' => 'color: {{VALUE}}',
				],
				'condition' => [
					'abcbiz_elementor_wc_product_cart_count_switch' => 'yes',
				],
			]
		);

		//Number Hover Color
		$this->add_control(
			'abcbiz_elementor_wc_product_cart_count_hov_color',
			[
				'label' => esc_html__( 'Number Hover Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-wc-cart-icon:hover .abcbiz-cart-contents .abcbiz-cart-contents-count' => 'color: {{VALUE}}',
				],
				'condition' => [
					'abcbiz_elementor_wc_product_cart_count_switch' => 'yes',
				],
			]
		);

		//Count Size
		$this->add_responsive_control(
				'abcbiz_elementor_wc_product_cart_count_size',
				[
					'label' => esc_html__( 'Counter Size', 'abcbiz-multi' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px'],
					'range' => [
						'px' => [
							'min' => 5,
							'max' => 60,
							'step' => 1,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 20,
					],
					'selectors' => [
						'{{WRAPPER}} .abcbiz-elementor-wc-cart-icon .abcbiz-cart-contents .abcbiz-cart-contents-count' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'abcbiz_elementor_wc_product_cart_count_switch' => 'yes',
					],
				]
			);

		//Count font Size
		$this->add_responsive_control(
				'abcbiz_elementor_wc_product_cart_count_font_size',
				[
					'label' => esc_html__( 'Number Font Size', 'abcbiz-multi' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px'],
					'range' => [
						'px' => [
							'min' => 8,
							'max' => 40,
							'step' => 1,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 12,
					],
					'selectors' => [
						'{{WRAPPER}} .abcbiz-elementor-wc-cart-icon .abcbiz-cart-contents .abcbiz-cart-contents-count' => 'font-size: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'abcbiz_elementor_wc_product_cart_count_switch' => 'yes',
					],
				]
			);

		//Counter position
		$this->add_responsive_control(
				'abcbiz_elementor_wc_product_cart_count_pos',
				[
					'label' => esc_html__( 'Counter Position', 'abcbiz-multi' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px'],
					'range' => [
						'px' => [
							'min' => -30,
							'max' => 30,
							'step' => 1,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => -10,
					],
					'selectors' => [
						'{{WRAPPER}} .abcbiz-elementor-wc-cart-icon .abcbiz-cart-contents .abcbiz-cart-contents-count' => 'margin-top: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'abcbiz_elementor_wc_product_cart_count_switch' => 'yes',
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