<?php 
namespace ABCBiz\Includes\Widgets\ABCSocialShare;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;

/**
 * Elementor List Widget.
 */
class Main extends BaseWidget {

	    // define protected variables...
		protected $name = 'abcbiz-social-share';
		protected $title = 'ABC Social Share';
		protected $icon = 'eicon-share abcbiz-addons-icon';
		protected $categories = [
			'abcbiz-category'
		];		
		protected $keywords = [
			'abc', 'social', 'share', 'icon',
		];

	/**
	 * Register list widget controls.
	 */
	protected function register_controls() {
		//Template
		$this->start_controls_section(
			'abcbiz-elementor-social-share-content',
			[
				'label' => esc_html__( 'Social Share', 'abcbiz-addons' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		//Icon Alignment
		$this->add_responsive_control(
			'abcbiz_elementor_social_share_align',
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
					'{{WRAPPER}} .abcbiz-elementor-social-share-area' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->add_control(
            'abcbiz_elementor_single_share_icon_show',
            [
                'label' => esc_html__('Share icon at the beginning', 'abcbiz-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'abcbiz-addons'),
                'label_off' => esc_html__('Hide', 'abcbiz-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

		$this->add_control(
            'abcbiz_elementor_single_share_icon_mob_show',
            [
                'label' => esc_html__('Hide Share icon on mobile?', 'abcbiz-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'abcbiz-addons'),
                'label_off' => esc_html__('Hide', 'abcbiz-addons'),
                'return_value' => 'yes',
                'default' => 'label_off',
				'condition' => [
					'abcbiz_elementor_single_share_icon_show' => 'yes'
				],
            ]
        );
		

		$this->end_controls_section();

        //abc social icon style

		
        $this->start_controls_section(
            'abcbiz_elementor_social_share_style',
            [
                'label' => esc_html__('Social Icon Style', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'abcbiz_elementor_social_share_single_icon_color',
			[
				'label' => esc_html__( 'Share Icon Color', 'abcbiz-addons' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#3d3d3d',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-social-share-area li.abcbiz-single-share svg, .abcbiz-elementor-social-share-area li:hover.abcbiz-single-share svg' => 'fill: {{VALUE}} !important',
				],

				'condition' => [
					'abcbiz_elementor_single_share_icon_show' => 'yes'
				]
			]
		);

		$this->add_responsive_control(
			'abcbiz_elementor_single_share_icon_size',
			[
				'label' => esc_html__( 'Share Icon Size', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 100,
						'step' => 2,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-social-share-area li.abcbiz-single-share svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}} !important;',
				],

				'condition' => [
					'abcbiz_elementor_single_share_icon_show' => 'yes'
				],
			]
		);

		$this->add_responsive_control(
			'abcbiz_elementor_single_share_icon_position',
			[
				'label' => esc_html__( 'Share Icon Position', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => -100,
						'max' => 100,
						'step' => 2,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-social-share-area li.abcbiz-single-share svg' => 'top: {{SIZE}}{{UNIT}} !important;',
				],

				'condition' => [
					'abcbiz_elementor_single_share_icon_show' => 'yes'
				],
			]
		);

		$this->add_responsive_control(
			'abcbiz_elementor_single_share_icon_gap',
			[
				'label' => esc_html__( 'Share Icon Gap', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 7,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-social-share-area li.abcbiz-single-share' => 'margin-right: {{SIZE}}{{UNIT}} !important;',
				],

				'condition' => [
					'abcbiz_elementor_single_share_icon_show' => 'yes'
				],
			]
		);

		$this->add_responsive_control(
			'abcbiz_elementor_social_share_icon_size',
			[
				'label' => esc_html__( 'Social Icons Size', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 100,
						'step' => 2,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-social-share-area ul li svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'abcbiz_elementor_social_share_icon_position',
			[
				'label' => esc_html__( 'Social Icons Position', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => -100,
						'max' => 100,
						'step' => 2,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-social-share-area li svg' => 'top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'abcbiz_elementor_social_icons_gap',
			[
				'label' => esc_html__( 'Social Icons Gap', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 5,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-social-share-area li' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'abcbiz_elementor_social_share_icon_bg_size',
			[
				'label' => esc_html__( 'Icons background Size', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 20,
						'max' => 150,
						'step' => 2,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 40,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-social-share-area ul li a' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
			]
		);


		$this->start_controls_tabs(
			'abcbiz_elementor_social_share_icon_color_tabs'
		);

		$this->start_controls_tab(
			'abcbiz_elementor_social_share_icon_color_tab_normal',
			[
				'label' => esc_html__( 'Normal', 'abcbiz-addons' ),
			]
		);

		$this->add_control(
			'abcbiz_elementor_social_share_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'abcbiz-addons' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-social-share-area ul li svg' => 'fill: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'abcbiz_elementor_social_share_icon_bg_color',
			[
				'label' => esc_html__( 'Icon Background Color', 'abcbiz-addons' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#59a818',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-social-share-area ul li a' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'abcbiz_elementor_social_share_icon_color_tab_hover',
			[
				'label' => esc_html__( 'Hover', 'abcbiz-addons' ),
			]
		);

		$this->add_control(
			'abcbiz_elementor_social_share_icon_color_hover',
			[
				'label' => esc_html__( 'Icon Hover Color', 'abcbiz-addons' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-social-share-area ul li:hover svg' => 'fill: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'abcbiz_elementor_social_share_icon_bg_color_hover',
			[
				'label' => esc_html__( 'Icon Hover Background Color', 'abcbiz-addons' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#3d3d3d',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-social-share-area ul li a:hover' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();
        $this->end_controls_section();

    }

    /**
     * Render the widget output on the frontend.
     */
    protected function render()
    {
        include 'RenderView.php';
    }
}