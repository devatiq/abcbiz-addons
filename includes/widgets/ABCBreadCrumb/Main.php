<?php
namespace Includes\Widgets\ABCBreadCrumb;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;

class Main extends BaseWidget {

	    // define protected variables...
		protected $name = 'abcbiz-bread-crumb';
		protected $title = 'ABC Breadcrumb';
		protected $icon = 'eicon-post-navigation';
		protected $categories = [
			'abcbiz-category'
		];		
		protected $keywords = [
			'abc', 'bread', 'crumb', 'breadcrumb',
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
			'abcbiz-elementor-bread-crumb',
			[
				'label' => esc_html__( 'Alignment', 'abcbiz-multi' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);


		//Alignment
		$this->add_responsive_control(
			'abcbiz_elementor_bread_crumb_align',
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
					'{{WRAPPER}} .abcbiz-elementor-bread-crumb-area' => 'text-align: {{VALUE}}',
				],
			]
		);
		

		$this->end_controls_section();

        //abc section title style
		
        $this->start_controls_section(
            'abcbiz_elementor_bread_crumb_style',
            [
                'label' => esc_html__('Crumb Style', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'abcbiz_elementor_bread_crumb_text_color',
			[
				'label' => esc_html__( 'Text Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-bread-crumb-area' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'abcbiz_elementor_bread_crumb_link_color',
			[
				'label' => esc_html__( 'Link Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-bread-crumb-area a' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'abcbiz_elementor_bread_crumb_link_hover_color',
			[
				'label' => esc_html__( 'Link Hover Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#5D5AED',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-bread-crumb-area a:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz_elementor_bread_crumb_typography',
				'label' => esc_html__( 'Typography', 'abcbiz-multi' ),
				'selector' => '{{WRAPPER}} .abcbiz-elementor-bread-crumb-area',
			]
		);

		//end of breadcrumb style
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