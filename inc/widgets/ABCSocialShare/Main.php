<?php 
namespace inc\widgets\ABCSocialShare;

use Inc\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;

/**
 * Elementor List Widget.
 * @since 1.0.0
 */
class Main extends BaseWidget {

	    // define protected variables...
		protected $name = 'abc-social-share';
		protected $title = 'ABC Social Share';
		protected $icon = 'eicon-share';
		protected $categories = [
			'abc-category'
		];		
		protected $keywords = [
			'abc', 'social', 'share', 'icon',
		];

	/**
	 * Register list widget controls.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		//Template
		$this->start_controls_section(
			'abc-elementor-social-share-content',
			[
				'label' => esc_html__( 'Social Share', 'ABCMAFTH' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		//Icon Alignment
		$this->add_responsive_control(
			'abc_elementor_social_share_align',
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
					'{{WRAPPER}} .abc-elementor-social-share-area' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->add_control(
            'abc_elementor_single_share_icon_show',
            [
                'label' => __('Share icon at the beginning', 'ABCMAFTH'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'ABCMAFTH'),
                'label_off' => __('Hide', 'ABCMAFTH'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
		

		$this->end_controls_section();

        //abc social icon style

		
        $this->start_controls_section(
            'abc_elementor_social_share_style',
            [
                'label' => esc_html__('Social Icon Style', 'ABCMAFTH'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'abc_elementor_social_share_single_icon_color',
			[
				'label' => esc_html__( 'Share Icon Color', 'ABCMAFTH' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#3d3d3d',
				'selectors' => [
					'{{WRAPPER}} .abc-elementor-social-share-area li.abc-single-share' => 'color: {{VALUE}}',
				],

				'condition' => [
					'abc_elementor_single_share_icon_show' => 'yes'
				]
			]
		);

		$this->add_control(
			'abc_elementor_social_share_icon_size',
			[
				'label' => esc_html__( 'Social Icons Size', 'ABCMAFTH' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 50,
						'step' => 2,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .abc-elementor-social-share-area ul li' => 'font-size: {{SIZE}}{{UNIT}}; line-height: calc({{SIZE}}{{UNIT}} + 20px);',
					'{{WRAPPER}} .abc-elementor-social-share-area ul li a' => 'height: calc({{SIZE}}{{UNIT}} + 20px); width: calc({{SIZE}}{{UNIT}} + 20px);',
				],
			]
		);


		$this->start_controls_tabs(
			'abc_elementor_social_share_icon_color_tabs'
		);

		$this->start_controls_tab(
			'abc_elementor_social_share_icon_color_tab_normal',
			[
				'label' => esc_html__( 'Normal', 'ABCMAFTH' ),
			]
		);

		$this->add_control(
			'abc_elementor_social_share_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'ABCMAFTH' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .abc-elementor-social-share-area ul li a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'abc_elementor_social_share_icon_bg_color',
			[
				'label' => esc_html__( 'Icon Background Color', 'ABCMAFTH' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#59a818',
				'selectors' => [
					'{{WRAPPER}} .abc-elementor-social-share-area ul li a' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'abc_elementor_social_share_icon_color_tab_hover',
			[
				'label' => esc_html__( 'Hover', 'ABCMAFTH' ),
			]
		);

		$this->add_control(
			'abc_elementor_social_share_icon_color_hover',
			[
				'label' => esc_html__( 'Icon Hover Color', 'ABCMAFTH' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .abc-elementor-social-share-area ul li a:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'abc_elementor_social_share_icon_bg_color_hover',
			[
				'label' => esc_html__( 'Icon Hover Background Color', 'ABCMAFTH' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#3d3d3d',
				'selectors' => [
					'{{WRAPPER}} .abc-elementor-social-share-area ul li a:hover' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();
        $this->end_controls_section();

    }

    /**
     * Render the widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function render()
    {
        //load render view to show widget output on frontend/website.
        include 'RenderView.php';
    }
}