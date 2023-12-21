<?php
namespace inc\widgets\ABCBreadCrumb;

use Inc\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;

class Main extends BaseWidget {

	    // define protected variables...
		protected $name = 'abc-bread-crumb';
		protected $title = 'ABC Breadcrumb';
		protected $icon = 'eicon-post-navigation';
		protected $categories = [
			'abc-category'
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
			'abc-elementor-bread-crumb',
			[
				'label' => esc_html__( 'Alignment', 'abcbiz-multi' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);


		//Alignment
		$this->add_responsive_control(
			'abc_elementor_bread_crumb_align',
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
					'{{WRAPPER}} .abc-elementor-bread-crumb-area' => 'text-align: {{VALUE}}',
				],
			]
		);
		

		$this->end_controls_section();

        //abc section title style
		
        $this->start_controls_section(
            'abc_elementor_bread_crumb_style',
            [
                'label' => esc_html__('Crumb Style', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'abc_elementor_bread_crumb_text_color',
			[
				'label' => esc_html__( 'Text Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .abc-elementor-bread-crumb-area' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'abc_elementor_bread_crumb_link_color',
			[
				'label' => esc_html__( 'Link Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .abc-elementor-bread-crumb-area a' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'abc_elementor_bread_crumb_link_hover_color',
			[
				'label' => esc_html__( 'Link Hover Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#5D5AED',
				'selectors' => [
					'{{WRAPPER}} .abc-elementor-bread-crumb-area a:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'abc_elementor_bread_crumb_typography',
				'label' => esc_html__( 'Typography', 'abcbiz-multi' ),
				'selector' => '{{WRAPPER}} .abc-elementor-bread-crumb-area',
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