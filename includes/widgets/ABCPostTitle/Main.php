<?php 
namespace Includes\widgets\ABCPostTitle;

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
		protected $name = 'abcbiz-post-title';
		protected $title = 'ABC Post Title';
		protected $icon = 'eicon-post-title';
		protected $categories = [
			'abcbiz-category'
		];		
		protected $keywords = [
			'abc', 'post', 'title', 'post title',
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
			'abcbiz-elementor-post_title',
			[
				'label' => esc_html__( 'Alignment', 'abcbiz-multi' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);


		//Heading tag
        $this->add_control(
            'abcbiz_elementor_post_title_tag',
            [
                'label' => esc_html__('Heading Tag', 'abcbiz-multi'),
                'type' => Controls_Manager::SELECT,
                'default' => 'h1',
                'options' => [
                    'h1' => esc_html__('H1', 'abcbiz-multi'),
                    'h2' => esc_html__('H2', 'abcbiz-multi'),
                    'h3' => esc_html__('H3', 'abcbiz-multi'),
                    'h4' => esc_html__('H4', 'abcbiz-multi'),
                    'h5' => esc_html__('H5', 'abcbiz-multi'),
                    'H6' => esc_html__('H6', 'abcbiz-multi'),
                ],
            
            ]
        );

		//Alignment
		$this->add_responsive_control(
			'abcbiz_elementor_post_title_align',
			[
				'label' => esc_html__( 'Alignment', 'abcbiz-multi'),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'center',
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
					'{{WRAPPER}} .abcbiz-elementor-post-title-area' => 'text-align: {{VALUE}}',
				],
			]
		);
		

		$this->end_controls_section();

        //Abc post title style
		
        $this->start_controls_section(
            'abcbiz_elementor_post_title_style',
            [
                'label' => esc_html__('Style', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'abcbiz_elementor_post_title_color',
			[
				'label' => esc_html__( 'Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-post-title-tag' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz_elementor_post_title_typography',
				'label' => esc_html__( 'Typography', 'abcbiz-multi' ),
				'selector' => '{{WRAPPER}} .abcbiz-post-title-tag',
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