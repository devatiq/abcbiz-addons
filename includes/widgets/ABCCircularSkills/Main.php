<?php
namespace ABCBiz\Includes\Widgets\ABCCircularSkills;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

class Main extends BaseWidget
{
    // define protected variables...
    protected $name = 'abcbiz-elementor-circular-skill';
    protected $title = 'ABC Circular Skill';
    protected $icon = 'eicon-counter-circle  abcbiz-addons-icon';
    protected $categories = [
        'abcbiz-category'
    ];

    protected $keywords = [
        'abc', 'skill',  'circular'
    ];

    public function get_script_depends()
    {
        return ['abcbiz-jquery-appear', 'abcbiz-circular-progress']; 
    }

    /**
     * Register the widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'abcbiz_elementor_circl_skill_setting',
            [
                'label' => esc_html__('Circle Setting', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        //circle skill text
        $this->add_control(
            'abcbiz_elementor_circl_skill_text',
            [
                'label' => esc_html__('Heading', 'abcbiz-addons'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Web Design', 'abcbiz-addons'),
                'label_block' => true,
            ]
        );
        //circle skill percentage
        $this->add_control(
            'abcbiz_elementor_circl_skill_value',
            [
                'label' => esc_html__('Value', 'abcbiz-addons'),
                'type' => Controls_Manager::NUMBER,
                'default' => 50,
                'min' => 0,
                'max' => 100,
                'step' => 1,
            ]
        );


        $this->end_controls_section();

        //circle skill style
        $this->start_controls_section(
            'abcbiz_elementor_circl_skill_style_setting',
            [
                'label' => esc_html__('Circle Style', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // circle size
        $this->add_control(
			'abcbiz_elementor_circl_skill_size',
			[
				'label' => esc_html__( 'Circle Size', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 100,
						'max' => 500,
						'step' => 10,
					],
				],
				'default' => [
					'size' => 180,
				],

			]
		);

        // circle heading typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_circl_skill_heading_typography',
                'label' => esc_html__('Heading Typography', 'abcbiz-addons'),
                'selector' => '{{WRAPPER}} .abcbiz-ele-skill-circle span',
            ]
        ); 
        // circle heading color
        $this->add_control(
            'abcbiz_elementor_circl_skill_heading_color',
            [
                'label' => esc_html__('Heading Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-skill-circle span' => 'color: {{VALUE}}',
                ],
            ]
        );

        //Value Position
        // circle size
        $this->add_control(
			'abcbiz_elementor_circl_skill_value_position',
			[
				'label' => esc_html__( 'Value Position Adjustment', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['%'],
				'range' => [
					'%' => [
						'min' => 5,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
                    'unit' => '%',
					'size' => 35,
				],

                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-skill-circle strong' => 'top: {{SIZE}}{{UNIT}}',
                ],

			]
		);

        // circle value typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_circl_skill_value_typography',
                'label' => esc_html__('Value Typography', 'abcbiz-addons'),
                'selector' => '{{WRAPPER}} .abcbiz-ele-skill-circle strong',
            ]
        );
        // circle value color
        $this->add_control(
            'abcbiz_elementor_circl_skill_value_color',
            [
                'label' => esc_html__('Value Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-skill-circle strong' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .abcbiz-ele-skill-circle strong i' => 'color: {{VALUE}}',
                ],
            ]
        );
        // circle empty fill color
        $this->add_control(
            'abcbiz_elementor_circl_skill_empty_fill_color',
            [
                'label' => esc_html__('Empty Fill Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => 'rgba(0, 0, 0, .3)',               
            ]
        );
        // circle fill gradient color one
        $this->add_control(
            'abcbiz_elementor_circl_skill_fill_gradient_color_one',
            [
                'label' => esc_html__('Gradient Color One', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#e60a0a',               
            ]
        );
        // circle fill gradient color two
        $this->add_control(
            'abcbiz_elementor_circl_skill_fill_gradient_color_two',
            [
                'label' => esc_html__('Gradient Color Two', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#d1de04',               
            ]
        );
        // circle style section end
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