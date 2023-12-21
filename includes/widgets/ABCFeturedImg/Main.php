<?php 
namespace inc\widgets\ABCFeturedImg;

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
		protected $name = 'abc-featured-image';
		protected $title = 'ABC Featured Image';
		protected $icon = 'eicon-image';
		protected $categories = [
			'abc-category'
		];		
		protected $keywords = [
			'abc', 'featured', 'image', 'featured image',
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
			'abc-elementor-fearture-img',
			[
				'label' => esc_html__( 'Image Alignment', 'ABCMAFTH' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		//Alignment
		$this->add_responsive_control(
			'abc_elementor_feat_img_align',
			[
				'label' => esc_html__( 'Alignment', 'ABCMAFTH'),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'center',
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
					'{{WRAPPER}} .abc-elementor-feat-img-area' => 'text-align: {{VALUE}}',
				],
			]
		);
		

		$this->end_controls_section();

		//Style Section
		$this->start_controls_section(
            'abc-elementor-fearture-img-style',
            [
                'label' => esc_html__('Style', 'ABCMAFTH'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

		//image Width
		$this->add_responsive_control(
            'abc-elementor-fearture-img-size',
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
					'{{WRAPPER}} .abc-elementor-feat-img-area img' => 'width: {{SIZE}}{{UNIT}};',
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