<?php 
namespace ABCBiz\Includes\Widgets\ABCCountDown;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

/**
 * Elementor List Widget.
 */
class Main extends BaseWidget {

	    // define protected variables...
		protected $name = 'abcbiz-count-down';
		protected $title = 'ABC Count Down';
		protected $icon = 'eicon-countdown abcbiz-addons-icon';
		protected $categories = [
			'abcbiz-category'
		];		
		protected $keywords = [
			'abc', 'count', 'down'
		];

		public function get_script_depends()
    {
        return ['abcbiz-count-down']; 
    }

	/**
	 * Register list widget controls.
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'abcbiz_elementor_count_down_setting',
			[
				'label' => esc_html__( 'Settings', 'abcbiz-addons' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		//Date/time
		$this->add_control(
			'abcbiz_elementor_count_down_timer',
			[
				'label' => esc_html__( 'Set Time', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::DATE_TIME,
			]
		);

		//Days switch
		$this->add_control(
			'abcbiz_elementor_count_down_days_switch',
			[
				'label' => esc_html__( 'Display Days', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'days_on' => esc_html__( 'Show', 'abcbiz-addons' ),
				'days_off' => esc_html__( 'Hide', 'abcbiz-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		//Hours switch
		$this->add_control(
			'abcbiz_elementor_count_down_hours_switch',
			[
				'label' => esc_html__( 'Display Hours', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'days_on' => esc_html__( 'Show', 'abcbiz-addons' ),
				'days_off' => esc_html__( 'Hide', 'abcbiz-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		//Minute switch
		$this->add_control(
			'abcbiz_elementor_count_down_mins_switch',
			[
				'label' => esc_html__( 'Display Minutes', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'days_on' => esc_html__( 'Show', 'abcbiz-addons' ),
				'days_off' => esc_html__( 'Hide', 'abcbiz-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		//Second switch
		$this->add_control(
			'abcbiz_elementor_count_down_secs_switch',
			[
				'label' => esc_html__( 'Display Seconds', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'days_on' => esc_html__( 'Show', 'abcbiz-addons' ),
				'days_off' => esc_html__( 'Hide', 'abcbiz-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		//Days label text
		$this->add_control(
			'abcbiz_elementor_count_down_days_label',
			[
				'label' => esc_html__( 'Days Label', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Days', 'abcbiz-addons' ),
				'condition' => [
					'abcbiz_elementor_count_down_days_switch' => 'yes',
				],
			]
		);

		//Hours label text
		$this->add_control(
			'abcbiz_elementor_count_down_hours_label',
			[
				'label' => esc_html__( 'Hours Label', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Hours', 'abcbiz-addons' ),
				'condition' => [
					'abcbiz_elementor_count_down_hours_switch' => 'yes',
				],
			]
		);

		//Minutes label text
		$this->add_control(
			'abcbiz_elementor_count_down_mins_label',
			[
				'label' => esc_html__( 'Minutes Label', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Minutes', 'abcbiz-addons' ),
				'condition' => [
					'abcbiz_elementor_count_down_mins_switch' => 'yes',
				],
			]
		);

		//Second label text
		$this->add_control(
			'abcbiz_elementor_count_down_secs_label',
			[
				'label' => esc_html__( 'Seconds Label', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Seconds', 'abcbiz-addons' ),
				'condition' => [
					'abcbiz_elementor_count_down_secs_switch' => 'yes',
				],
			]
		);

		//Expired text
		$this->add_control(
			'abcbiz_elementor_count_down_expired_text',
			[
				'label' => esc_html__( 'Expired Text', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Expired', 'abcbiz-addons' ),
			]
		);

		//Expired Button
		$this->add_control(
			'abcbiz_elementor_count_down_exp_btn',
			[
				'label' => esc_html__( 'Display button when expired?', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'btn_on' => esc_html__( 'Show', 'abcbiz-addons' ),
				'btn_off' => esc_html__( 'Hide', 'abcbiz-addons' ),
				'return_value' => 'yes',
				'default' => 'btn_off',
			]
		);

		//Expired btn text
		$this->add_control(
			'abcbiz_elementor_count_down_expired_btn_text',
			[
				'label' => esc_html__( 'Expired Text', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'View Now', 'abcbiz-addons' ),
				'condition' => [
					'abcbiz_elementor_count_down_exp_btn' => 'yes',
				],
			]
		);

		//Expired Btn URL
		$this->add_control(
			'abcbiz_elementor_count_down_expired_btn_link',
			[
				'label' => esc_html__( 'Button Link', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '#',
					'is_external' => false,
					'nofollow' => false,
				],
				'condition' => [
					'abcbiz_elementor_count_down_exp_btn' => 'yes',
				],
				'label_block' => true,
			]
		);

		$this->end_controls_section();//end setting section

		//Box style
		$this->start_controls_section(
			'abcbiz_elementor_count_down_setting_style',
			[
				'label' => esc_html__( 'Timer Style', 'abcbiz-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		//Direction
		$this->add_responsive_control(
            'abcbiz_elementor_count_down_direction',
            [
                'label' => esc_html__( 'Timer Direction', 'abcbiz-addons'),
                'type' => Controls_Manager::CHOOSE,
                'default' => 'row',
                'options' => [
                    'row'    => [
                        'title' => esc_html__( 'Row', 'abcbiz-addons' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                    'column' => [
                        'title' => esc_html__( 'Column', 'abcbiz-addons' ),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} #abcbizcounttime' => 'flex-direction: {{VALUE}}',
                ],
            ]
        );

		//Row Alignment
		$this->add_responsive_control(
            'abcbiz_elementor_count_down_align',
            [
                'label' => esc_html__( 'Alignment', 'abcbiz-addons'),
                'type' => Controls_Manager::CHOOSE,
                'default' => 'center',
                'options' => [
                    'start'    => [
                        'title' => esc_html__( 'Left', 'abcbiz-addons' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center'    => [
                        'title' => esc_html__( 'Center', 'abcbiz-addons' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'end' => [
                        'title' => esc_html__( 'Right', 'abcbiz-addons' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} #abcbizcounttime' => 'justify-content: {{VALUE}}',
                ],
				'condition' => [
					'abcbiz_elementor_count_down_direction' => 'row',
				]
            ]
        );

		//Column Alignment
		$this->add_responsive_control(
            'abcbiz_elementor_count_down_align_column',
            [
                'label' => esc_html__( 'Alignment', 'abcbiz-addons'),
                'type' => Controls_Manager::CHOOSE,
                'default' => 'center',
                'options' => [
                    'flex-start'    => [
                        'title' => esc_html__( 'Left', 'abcbiz-addons' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center'    => [
                        'title' => esc_html__( 'Center', 'abcbiz-addons' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'flex-end' => [
                        'title' => esc_html__( 'Right', 'abcbiz-addons' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} #abcbizcounttime' => 'align-items: {{VALUE}}',
                ],
				'condition' => [
					'abcbiz_elementor_count_down_direction' => 'column',
				]
            ]
        );

		//timer gap
		$this->add_responsive_control(
			'abcbiz_elementor_count_down_timer_gap',
			[
				'label' => esc_html__( 'Item Gap', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 300,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 30,
				],
				'selectors' => [
					'{{WRAPPER}} #abcbizcounttime' => 'gap: {{SIZE}}{{UNIT}};',
				],
			]
		);

		//Label Position
		$this->add_responsive_control(
            'abcbiz_elementor_count_down_label_pos',
            [
                'label' => esc_html__( 'Label Position', 'abcbiz-addons'),
                'type' => Controls_Manager::CHOOSE,
                'default' => 'column',
                'options' => [
                    'row'    => [
                        'title' => esc_html__( 'Inline', 'abcbiz-addons' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                    'column' => [
                        'title' => esc_html__( 'Bottom', 'abcbiz-addons' ),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-count-down-single' => 'flex-direction: {{VALUE}}',
                ],
            ]
        );

		//label gap
		$this->add_responsive_control(
			'abcbiz_elementor_count_down_timer_label_gap',
			[
				'label' => esc_html__( 'Label Gap', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 5,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-count-down-single' => 'gap: {{SIZE}}{{UNIT}};',
				],
			]
		);

		//Number typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz_elementor_count_down_timer_num_typography',
				'label' => esc_html__( 'Number Typography', 'abcbiz-addons' ),
				'selector' => '{{WRAPPER}} .abcbiz-count-num-days, {{WRAPPER}} .abcbiz-count-num-hours, {{WRAPPER}} .abcbiz-count-num-minutes, {{WRAPPER}} .abcbiz-count-num-seconds',
			]
		);

		//Label typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz_elementor_count_down_timer_label_typography',
				'label' => esc_html__( 'Label Typography', 'abcbiz-addons' ),
				'selector' => '{{WRAPPER}} .abcbiz-count-down-label',
			]
		);

		//Item inside space
		$this->add_responsive_control(
			'abcbiz_elementor_count_down_timer_item_inside_gap',
			[
				'label' => esc_html__( 'Item Inside Space', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'default' => [
					'top' => 12,
					'right' => 20,
					'bottom' => 12,
					'left' => 20,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-count-down-single' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		//Item inside space
		$this->add_responsive_control(
			'abcbiz_elementor_count_down_timer_item_radius',
			[
				'label' => esc_html__( 'Item Border Radius', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'default' => [
					'top' => 6,
					'right' => 6,
					'bottom' => 6,
					'left' => 6,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-count-down-single' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		//item box shadow
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'abcbiz_elementor_count_down_timer_item_box_shadow',
				'label' => esc_html__( 'Item Box Shadow', 'abcbiz-addons' ),
				'selector' => '{{WRAPPER}} .abcbiz-count-down-single',
			]
		);
		$this->end_controls_section();//end setting style

		//Days style
		$this->start_controls_section(
			'abcbiz_elementor_count_down_days_style',
			[
				'label' => esc_html__( 'Days Style', 'abcbiz-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'abcbiz_elementor_count_down_days_switch' => 'yes',
				],
			]
		);

		//Background
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'abcbiz_elementor_count_down_days_bg_color',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .abcbiz-count-days',
			]
		);

		//Number Color
		$this->add_control(
			'abcbiz_elementor_count_down_days_num_color',
			[
				'label' => esc_html__( 'Number Color', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-count-num-days' => 'color: {{VALUE}}',
				],
			]
		);

		//Label Color
		$this->add_control(
			'abcbiz_elementor_count_down_days_label_color',
			[
				'label' => esc_html__( 'Label Color', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-count-days-label' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();//end days style

		//Hours style
		$this->start_controls_section(
			'abcbiz_elementor_count_down_hours_style',
			[
				'label' => esc_html__( 'Hours Style', 'abcbiz-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'abcbiz_elementor_count_down_hours_switch' => 'yes',
				],
			]
		);

		//Background
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'abcbiz_elementor_count_down_hours_bg_color',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .abcbiz-count-hours',
			]
		);

		//Number Color
		$this->add_control(
			'abcbiz_elementor_count_down_hours_num_color',
			[
				'label' => esc_html__( 'Number Color', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-count-num-hours' => 'color: {{VALUE}}',
				],
			]
		);

		//Label Color
		$this->add_control(
			'abcbiz_elementor_count_down_hours_label_color',
			[
				'label' => esc_html__( 'Label Color', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-count-hours-label' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();//end hours style

		//Minutes style
		$this->start_controls_section(
			'abcbiz_elementor_count_down_mins_style',
			[
				'label' => esc_html__( 'Minutes Style', 'abcbiz-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'abcbiz_elementor_count_down_mins_switch' => 'yes',
				],
			]
		);

		//Background
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'abcbiz_elementor_count_down_mins_bg_color',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .abcbiz-count-minutes',
			]
		);

		//Number Color
		$this->add_control(
			'abcbiz_elementor_count_down_mins_num_color',
			[
				'label' => esc_html__( 'Number Color', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-count-num-minutes' => 'color: {{VALUE}}',
				],
			]
		);

		//Label Color
		$this->add_control(
			'abcbiz_elementor_count_down_mins_label_color',
			[
				'label' => esc_html__( 'Label Color', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-count-mins-label' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();//end minutes style

		//Seconds style
		$this->start_controls_section(
			'abcbiz_elementor_count_down_secs_style',
			[
				'label' => esc_html__( 'Seconds Style', 'abcbiz-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'abcbiz_elementor_count_down_secs_switch' => 'yes',
				],
			]
		);

		//Background
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'abcbiz_elementor_count_down_secs_bg_color',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .abcbiz-count-seconds',
			]
		);

		//Number Color
		$this->add_control(
			'abcbiz_elementor_count_down_secs_num_color',
			[
				'label' => esc_html__( 'Number Color', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-count-num-seconds' => 'color: {{VALUE}}',
				],
			]
		);

		//Label Color
		$this->add_control(
			'abcbiz_elementor_count_down_secs_label_color',
			[
				'label' => esc_html__( 'Label Color', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-count-secs-label' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section(); //end seconds style

		//Expired style
		$this->start_controls_section(
			'abcbiz_elementor_count_down_expire_style',
			[
				'label' => esc_html__( 'Expired Style', 'abcbiz-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		//Tex Color
		$this->add_control(
			'abcbiz_elementor_count_down_exp_text_color',
			[
				'label' => esc_html__( 'Expired Text Color', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} #abcbizcountexpired' => 'color: {{VALUE}}',
				],
			]
		);

		//typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz_elementor_count_down_exp_text_typography',
				'label' => esc_html__( 'Expired Typography', 'abcbiz-addons' ),
				'selector' => '{{WRAPPER}} #abcbizcountexpired',
			]
		);

		//Button Text Color
		$this->add_control(
			'abcbiz_elementor_count_down_exp_btn_text_color',
			[
				'label' => esc_html__( 'Button Text Color', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-expired-btn a' => 'color: {{VALUE}}',
				],
				'condition' => [
					'abcbiz_elementor_count_down_exp_btn' => 'yes',
				],
			]
		);

		//Button Background Color
		$this->add_control(
			'abcbiz_elementor_count_down_exp_btn_text_bg_color',
			[
				'label' => esc_html__( 'Button Background Color', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#0149e7',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-expired-btn a' => 'background-color: {{VALUE}}',
				],
				'condition' => [
					'abcbiz_elementor_count_down_exp_btn' => 'yes',
				],
			]
		);

		//Button Hov Text Color
		$this->add_control(
			'abcbiz_elementor_count_down_exp_btn_hov_text_color',
			[
				'label' => esc_html__( 'Button Hover Text Color', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-expired-btn a:hover' => 'color: {{VALUE}}',
				],
				'condition' => [
					'abcbiz_elementor_count_down_exp_btn' => 'yes',
				],
			]
		);

		//Button Hover Background Color
		$this->add_control(
			'abcbiz_elementor_count_down_exp_btn_text_hov_bg_color',
			[
				'label' => esc_html__( 'Button Hover Background Color', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#a038f5',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-expired-btn a:hover' => 'background-color: {{VALUE}}',
				],
				'condition' => [
					'abcbiz_elementor_count_down_exp_btn' => 'yes',
				],
			]
		);

		//typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz_elementor_count_down_exp_btn_typography',
				'label' => esc_html__( 'Button Typography', 'abcbiz-addons' ),
				'selector' => '{{WRAPPER}} .abcbiz-expired-btn a',
				'condition' => [
					'abcbiz_elementor_count_down_exp_btn' => 'yes',
				],
			]
		);

		//button spacing
		$this->add_responsive_control(
			'abcbiz_elementor_count_down_exp_btn_space',
			[
				'label' => esc_html__( 'Button Spacing', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px'],
				'default' => [
					'top' => 6,
					'right' => 12,
					'bottom' => 6,
					'left' => 12,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-expired-btn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'abcbiz_elementor_count_down_exp_btn' => 'yes',
				],
			]
		);

		//button border radius
		$this->add_responsive_control(
			'abcbiz_elementor_count_down_exp_btn_radius',
			[
				'label' => esc_html__( 'Button Border Radius', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'default' => [
					'top' => 4,
					'right' => 4,
					'bottom' => 4,
					'left' => 4,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-expired-btn a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'abcbiz_elementor_count_down_exp_btn' => 'yes',
				],
			]
		);

		$this->end_controls_section(); //end expired style

    }

    /**
     * Render the widget output on the frontend.
     */
    protected function render()
    {
        include 'renderview.php';
    }
}