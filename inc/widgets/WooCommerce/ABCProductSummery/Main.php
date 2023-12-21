<?php 
namespace inc\widgets\WooCommerce\ABCProductSummery;

use Inc\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;

/**
 * Elementor List Widget.
 * @since 1.0.0
 */
class Main extends BaseWidget {

	    // define protected variables...
		protected $name = 'abc-wc-product-summery';
		protected $title = 'ABC Product Short Descriptio';
		protected $icon = 'eicon-product-description';
		protected $categories = [
			'abc-wc-category'
		];		
		protected $keywords = [
			'abc', 'product', 'summery', 'short', 'description',
		];


	/**
	 * Register list widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		//Template
		$this->start_controls_section(
			'abc-elementor-product-summery',
			[
				'label' => esc_html__( 'Image Alignment', 'ABCMAFTH' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		//Alignment
		$this->add_responsive_control(
			'abc_elementor_product_summery_align',
			[
				'label' => esc_html__( 'Alignment', 'ABCMAFTH'),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'left',
				'options' => [
					'left'    => [
						'title' => esc_html__( 'Left', 'ABCMAFTH' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'ABCMAFTH' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'ABCMAFTH' ),
						'icon' => 'eicon-text-align-right',
					],
				],				
				'selectors' => [
					'{{WRAPPER}} .abc-elementor-product-summery-area' => 'text-align: {{VALUE}}',
				],
			]
		);
		

		$this->end_controls_section();

		//Style Section
		$this->start_controls_section(
            'abc-elementor-product-summery-style',
            [
                'label' => esc_html__('Style', 'ABCMAFTH'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

		//image Width
		$this->add_responsive_control(
            'abc-elementor-product-summery-size',
            [
                'label' => esc_html__('Image Width', 'ABCMAFTH'),
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
					'{{WRAPPER}} .abc-elementor-product-summery-area img' => 'width: {{SIZE}}{{UNIT}};',
				],
            
            ]
        );

    }

    /**
     * Render the widget output on the frontend.
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        //load render view to show widget output on frontend/website.
        include 'renderview.php';
    }
}