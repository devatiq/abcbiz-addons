<?php 
namespace ABCBiz\Includes\Widgets\ABCStickerText;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

/**
 * Elementor List Widget.
 */
class Main extends BaseWidget {

	    // define protected variables...
		protected $name = 'abcbiz-sticker-text';
		protected $title = 'ABC Sticker Text';
		protected $icon = 'eicon-text-area abcbiz-addons-icon';
		protected $categories = [
			'abcbiz-category'
		];		
		protected $keywords = [
			'abc', 'sticker', 'text'
		];

		public function get_script_depends()
    {
        return ['abcbiz-sticker-text']; 
    }

	/**
	 * Register list widget controls.
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'abcbiz_elementor_sticker_text_setting',
			[
				'label' => esc_html__( 'Contents', 'abcbiz-addons' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		//Text
		$this->add_control(
			'abcbiz_elementor_sticker_text',
			[
				'label' => esc_html__( 'Text', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 3,
				'default' => esc_html__( 'ABCBiz Multi Addons for Elementor', 'abcbiz-addons' ),
			]
		);

		//Button Switch
		$this->add_control(
			'abcbiz_elementor_sticker_btn_switch',
			[
				'label' => esc_html__( 'Button', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'btn_on' => esc_html__( 'Show', 'abcbiz-addons' ),
				'btn_off' => esc_html__( 'Hide', 'abcbiz-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		//button text
		$this->add_control(
			'abcbiz_elementor_sticker_btn_text',
			[
				'label' => esc_html__( 'Button Text', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Read More', 'abcbiz-addons' ),
				'condition' => [
					'abcbiz_elementor_sticker_btn_switch' => 'yes'
				],
			]
		);

		//button url
		$this->add_control(
			'abcbiz_elementor_sticker_btn_url',
			[
				'label' => esc_html__( 'Button Link', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => 'https://abcbizaddons.com/',
					'is_external' => true,
					'nofollow' => false,
				],
				'label_block' => true,
				'condition' => [
					'abcbiz_elementor_sticker_btn_switch' => 'yes'
				],
			]
		);

		//Button Position
		$this->add_responsive_control(
            'abcbiz_elementor_sticker_button_pos',
            [
                'label' => esc_html__( 'Button Position', 'abcbiz-addons'),
                'type' => Controls_Manager::CHOOSE,
                'default' => 'row',
                'options' => [
                    'row-reverse'    => [
                        'title' => esc_html__( 'Left', 'abcbiz-addons' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'row' => [
                        'title' => esc_html__( 'Right', 'abcbiz-addons' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                    'column-reverse' => [
                        'title' => esc_html__( 'Top', 'abcbiz-addons' ),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'column' => [
                        'title' => esc_html__( 'Bottom', 'abcbiz-addons' ),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-sticker-contents-area' => 'flex-direction: {{VALUE}}',
                ],
				'condition' => [
					'abcbiz_elementor_sticker_btn_switch' => 'yes'
				],
            ]
        );

		//Text and Button position
		$this->add_responsive_control(
            'abcbiz_elementor_sticker_button_text_pos',
            [
                'label' => esc_html__( 'Button & Text Combination', 'abcbiz-addons'),
                'type' => Controls_Manager::CHOOSE,
                'default' => 'left',
                'options' => [
                    'left'    => [
                        'title' => esc_html__( 'Inline', 'abcbiz-addons' ),
                        'icon' => 'eicon-align-start-v',
                    ],
                    'space-between' => [
                        'title' => esc_html__( 'Space Between', 'abcbiz-addons' ),
                        'icon' => 'eicon-justify-space-between-h',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-sticker-contents-area' => 'justify-content: {{VALUE}}',
                ],
				'condition' => [
					'abcbiz_elementor_sticker_button_pos' => 'row'
				],
            ]
        );

		//Text Gap
		$this->add_control(
			'abcbiz_elementor_sticker_button_gap',
			[
				'label' => esc_html__( 'Button & Text Gap', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-sticker-contents-area' => 'gap: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'abcbiz_elementor_sticker_btn_switch' => 'yes'
				],
			]
		);

		//close icon
		$this->add_control(
			'abcbiz_elementor_sticker_close_icon_switch',
			[
				'label' => esc_html__( 'Close Icon', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'btn_on' => esc_html__( 'Show', 'abcbiz-addons' ),
				'btn_off' => esc_html__( 'Hide', 'abcbiz-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);


		$this->end_controls_section();//end Anim Text contents

		//Box Style 
		$this->start_controls_section(
			'abcbiz_elementor_sticker_box_style',
			[
				'label' => esc_html__( 'Box Style', 'abcbiz-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		//BG Color
		$this->add_control(
			'abcbiz_elementor_sticker_box_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#f5f5f5',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-sticker-text-area' => 'background-color: {{VALUE}}',
				],
			]
		);

		//spacing
		$this->add_control(
			'abcbiz_elementor_sticker_box_spacing',
			[
				'label' => esc_html__( 'Spacing', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px'],
				'default' => [
					'top' => 20,
					'right' => 20,
					'bottom' => 20,
					'left' => 20,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-sticker-text-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		//Border Radius
		$this->add_control(
			'abcbiz_elementor_sticker_box_radius',
			[
				'label' => esc_html__( 'Border Radius', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px'],
				'default' => [
					'top' => 3,
					'right' => 3,
					'bottom' => 3,
					'left' => 3,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-sticker-text-area' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
	   $this->end_controls_section();//end box style

	   //Text Style 
		$this->start_controls_section(
			'abcbiz_elementor_sticker_text_style',
			[
				'label' => esc_html__( 'Text Style', 'abcbiz-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			//Alignment
			$this->add_responsive_control(
				'abcbiz_elementor_sticker_text_align',
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
						'{{WRAPPER}} .abcbiz-sticker-text' => 'text-align: {{VALUE}}',
					],
				]
			);

		//Color
		$this->add_control(
			'abcbiz_elementor_sticker_text_color',
			[
				'label' => esc_html__( 'Color', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#333333',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-sticker-text' => 'color: {{VALUE}}',
				],
			]
		);

		//Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz_elementor_sticker_text_typography',
				'label' => esc_html__( 'Typography', 'abcbiz-addons' ),
				'selector' => '{{WRAPPER}} .abcbiz-sticker-text',
			]
		);

		$this->end_controls_section();//end text style

		 //Button Style 
		 $this->start_controls_section(
			'abcbiz_elementor_sticker_btn_style',
			[
				'label' => esc_html__( 'Button Style', 'abcbiz-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'abcbiz_elementor_sticker_btn_switch' => 'yes'
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz_elementor_sticker_btn_typography',
				'label' => esc_html__( 'Typography', 'abcbiz-addons' ),
				'selector' => '{{WRAPPER}} .abcbiz-sticker-btn',
			]
		);

		$this->start_controls_tabs(
			'abcbiz_elementor_sticker_btn_style_tabs'
		);

		$this->start_controls_tab(
			'abcbiz_elementor_sticker_btn_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'abcbiz-addons' ),
			]
		);

		//Color
		$this->add_control(
			'abcbiz_elementor_sticker_btn_color',
			[
				'label' => esc_html__( 'Color', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#3544ec',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-sticker-btn a' => 'color: {{VALUE}}',
				],
			]
		);

		//BG Color
		$this->add_control(
			'abcbiz_elementor_sticker_btn_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-sticker-btn a' => 'background-color: {{VALUE}}',
				],
			]
		);

		//border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'abcbiz_elementor_sticker_btn_border',
				'selector' => '{{WRAPPER}} .abcbiz-sticker-btn a',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'abcbiz_elementor_sticker_btn_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'abcbiz-addons' ),
			]
		);

		//Hover Color
		$this->add_control(
			'abcbiz_elementor_sticker_btn_hov_color',
			[
				'label' => esc_html__( 'Color', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-sticker-btn a:hover' => 'color: {{VALUE}}',
				],
			]
		);

		//Hover BG Color
		$this->add_control(
			'abcbiz_elementor_sticker_btn_bg_hov_color',
			[
				'label' => esc_html__( 'Background Color', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#3544ec',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-sticker-btn a:hover' => 'background-color: {{VALUE}}',
				],
			]
		);

		//hover border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'abcbiz_elementor_sticker_btn_hov_border',
				'selector' => '{{WRAPPER}} .abcbiz-sticker-btn a:hover',
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		//Border radius
		$this->add_control(
			'abcbiz_elementor_sticker_btn_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px'],
				'default' => [
					'top' => 3,
					'right' => 3,
					'bottom' => 3,
					'left' => 3,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-sticker-btn a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		//Spacing
		$this->add_control(
			'abcbiz_elementor_sticker_btn_spacing',
			[
				'label' => esc_html__( 'Button Spacing', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px'],
				'default' => [
					'top' => 7,
					'right' => 15,
					'bottom' => 7,
					'left' => 15,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-sticker-btn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();//end button style

		 //Close Icon Style 
		 $this->start_controls_section(
			'abcbiz_elementor_sticker_close_icon_style',
			[
				'label' => esc_html__( 'Close Icon Style', 'abcbiz-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'abcbiz_elementor_sticker_close_icon_switch' => 'yes'
				],
			]
		);

		//Icon Size
		$this->add_control(
			'abcbiz_elementor_sticker_close_icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 30,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-sticker-close-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		//Color
		$this->add_control(
			'abcbiz_elementor_sticker_close_icon_color',
			[
				'label' => esc_html__( 'Color', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#3544ec',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-sticker-close-icon' => 'color: {{VALUE}}',
				],
			]
		);

		//Icon top position
		$this->add_control(
			'abcbiz_elementor_sticker_close_icon_top_post',
			[
				'label' => esc_html__( 'Icon Top Position', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => -100,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-sticker-close-icon' => 'top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		//Icon right position
		$this->add_control(
			'abcbiz_elementor_sticker_close_icon_right_post',
			[
				'label' => esc_html__( 'Icon Right Position', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => -100,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-sticker-close-icon' => 'right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();//end close icon style
    }

    /**
     * Render the widget output on the frontend.
     */
    protected function render()
    {
        include 'renderview.php';
    }
}