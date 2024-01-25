<?php 
namespace ABCBiz\Includes\Widgets\ABCPageTitle;

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
		protected $name = 'abcbiz-page-title';
		protected $title = 'ABC Page Title';
		protected $icon = 'eicon-archive-title abcbiz-addons-icon';
		protected $categories = [
			'abcbiz-category'
		];		
		protected $keywords = [
			'abc', 'page', 'title', 'page title',
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
			'abcbiz-elementor-page-title',
			[
				'label' => esc_html__( 'Alignment', 'abcbiz-addons' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);


		//Heading tag
        $this->add_control(
            'abcbiz_elementor_page_title_tag',
            [
                'label' => esc_html__('Heading Tag', 'abcbiz-addons'),
                'type' => Controls_Manager::SELECT,
                'default' => 'h1',
                'options' => [
                    'h1' => esc_html__('H1', 'abcbiz-addons'),
                    'h2' => esc_html__('H2', 'abcbiz-addons'),
                    'h3' => esc_html__('H3', 'abcbiz-addons'),
                    'h4' => esc_html__('H4', 'abcbiz-addons'),
                    'h5' => esc_html__('H5', 'abcbiz-addons'),
                    'H6' => esc_html__('H6', 'abcbiz-addons'),
                ],
            
            ]
        );

		//Alignment
		$this->add_responsive_control(
			'abcbiz_elementor_page_title_align',
			[
				'label' => esc_html__( 'Alignment', 'abcbiz-addons'),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'center',
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
					'{{WRAPPER}} .abcbiz-elementor-page-title-area' => 'text-align: {{VALUE}}',
				],
			]
		);
		

		$this->end_controls_section();

        //Abc post title style
		
        $this->start_controls_section(
            'abcbiz_elementor_page_title_style',
            [
                'label' => esc_html__('Style', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'abcbiz_elementor_page_title_color',
			[
				'label' => esc_html__( 'Color', 'abcbiz-addons' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-page-title-tag' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz_elementor_page_title_typography',
				'label' => esc_html__( 'Typography', 'abcbiz-addons' ),
				'selector' => '{{WRAPPER}} .abcbiz-page-title-tag',
			]
		);

		//end of divider bg style
        $this->end_controls_section();

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