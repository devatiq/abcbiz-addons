<?php
namespace Inc\Widgets\ABCSkillBar;

use Inc\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

class Main extends BaseWidget
{
    // define protected variables...
    protected $name = 'ABC-Elementor-ABCSkillBar';
    protected $title = 'ABC Skill Bar';
    protected $icon = 'eicon-skill-bar';
    protected $categories = [
        'abc-category'
    ];

    protected $keywords = [
        'abc', 'skill',  'bar'
    ];

    public function get_script_depends()
    {
        return ['abc-jquery-appear']; 
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
            'abc_elementor_skill_bar_settings',
            [
                'label' => __('Skill Settings', 'ABCMAFTH'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        //tooltip switch
        $this->add_control(
            'abc_elementor_skill_bar_tooltip_switch',
            [
                'label' => esc_html__('Enable Tooltip', 'ABCMAFTH'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'ABCMAFTH'),
                'label_off' => esc_html__('No', 'ABCMAFTH'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        //tooltip right value
        $this->add_control(
            'abc_elementor_skill_bar_percent_value_right',
            [
                'label' => esc_html__('Show Value on Right?', 'ABCMAFTH'),
                'description' => esc_html__('Show percentage value on right side.', 'ABCMAFTH'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'ABCMAFTH'),
                'label_off' => esc_html__('No', 'ABCMAFTH'),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        //skill bar repeater
        $repeater = new \Elementor\Repeater();
        //circle skill text
        $repeater->add_control(
            'abc_elementor_skill_bar_text',
            [
                'label' => __('Heading', 'ABCMAFTH'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __('Skill Heading', 'ABCMAFTH'),
            ]
        );
        //circle skill percentage
        $repeater->add_control(
            'abc_elementor_skill_bar_value',
            [
                'label' => __('Value', 'ABCMAFTH'),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => 80,
            ]
        );
        $repeater->add_control(
            'abc_elementor_skill_bar_color',
            [
                'label' => esc_html__('Progress Color', 'ABCMAFTH'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-skill-bar-area {{CURRENT_ITEM}}.abc-ele-progress-bar-row .abc-ele-progress-bar > span' => 'background-color: {{VALUE}}',
                ],
            ]
        );        
        $repeater->add_control(
            'abc_elementor_skill_bar_tooltip_color',
            [
                'label' => esc_html__('Tooltip BG Color', 'ABCMAFTH'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-skill-bar-area {{CURRENT_ITEM}}.abc-ele-progress-bar-row .abc-ele-progress-bar .abc_skills_bar_percent_tooltip' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .abc-ele-skill-bar-area {{CURRENT_ITEM}}.abc-ele-progress-bar-row .abc-ele-progress-bar .abc_skills_bar_percent_tooltip:after' => 'border-top-color: {{VALUE}}',
                ],
            ]
        );        
        $repeater->add_control(
            'abc_elementor_skill_bar_tooltip_text_color',
            [
                'label' => esc_html__('Tooltip Text Color', 'ABCMAFTH'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-skill-bar-area {{CURRENT_ITEM}}.abc-ele-progress-bar-row .abc-ele-progress-bar .abc_skills_bar_percent_tooltip' => 'color: {{VALUE}}',
                ],
            ]
        );        
        $this->add_control(
            'abc_skills_bar_list',
            [
                'label' => esc_html__('Skill Bar', 'ABCMAFTH'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'abc_elementor_skill_bar_text' => esc_html__('Title #1', 'ABCMAFTH'),
                        'abc_elementor_skill_bar_value' => esc_html__('80', 'ABCMAFTH'),
                    ],
                    [
                        'abc_elementor_skill_bar_text' => esc_html__('Title #2', 'ABCMAFTH'),
                        'abc_elementor_skill_bar_value' => esc_html__('75', 'ABCMAFTH'),
                    ],
                ],
                'title_field' => '{{{ abc_elementor_skill_bar_text }}}',
            ]
        );
        $this->end_controls_section();

        //skill bar style
        $this->start_controls_section(
            'abc_elementor_skill_bar_style_setting',
            [
                'label' => __('Skill Style', 'ABCMAFTH'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        //skill bar spacing
        $this->add_responsive_control(
            'abc_elementor_skill_bar_spacing',
            [
                'label' => __('Item Spacing', 'ABCMAFTH'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-skill-bar-area .abc-ele-progress-bar-row' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        //skill height
        $this->add_responsive_control(
            'abc_elementor_skill_bar_height',
            [
                'label' => __('Bar Height', 'ABCMAFTH'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-skill-bar-area .abc-ele-progress-bar-row .abc-ele-progress-bar' => 'height: {{SIZE}}{{UNIT}};',
                ]

            ]
        );
        // skill bar heading typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abc_elementor_skill_bar_heading_typography',
                'label' => __('Heading Typography', 'ABCMAFTH'),
                'selector' => '{{WRAPPER}} .abc-ele-skill-bar-area .abc-ele-progress-bar-row p.abc-ele-progress-bar-text',
            ]
        );
        // skill bar heading color
        $this->add_control(
            'abc_elementor_skill_bar_heading_color',
            [
                'label' => __('Heading Color', 'ABCMAFTH'),
                'type' => Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-skill-bar-area .abc-ele-progress-bar-row p.abc-ele-progress-bar-text' => 'color: {{VALUE}}',
                ],
            ]
        );
        // skill bar value typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abc_elementor_skill_bar_value_typography',
                'label' => __('Value Typography', 'ABCMAFTH'),
                'selector' => '{{WRAPPER}} .abc-ele-skill-bar-area .abc-ele-progress-bar-row p.abc-ele-progress-bar-text span',
                'condition' => [
                    'abc_elementor_skill_bar_tooltip_switch!' => 'yes',
                    'abc_elementor_skill_bar_percent_value_right' => 'yes',
                ]
            ]
        );
        // skill bar value color
        $this->add_control(
            'abc_elementor_skill_bar_value_color',
            [
                'label' => __('Value Color', 'ABCMAFTH'),
                'type' => Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-skill-bar-area .abc-ele-progress-bar-row p.abc-ele-progress-bar-text span' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'abc_elementor_skill_bar_tooltip_switch!' => 'yes',
                    'abc_elementor_skill_bar_percent_value_right' => 'yes',
                ]
            ]
        );
        // skill bar empty fill color
        $this->add_control(
            'abc_elementor_skill_bar_empty_fill_color',
            [
                'label' => __('Empty Prograss Color', 'ABCMAFTH'),
                'type' => Controls_Manager::COLOR,
                'default' => '#f5f5f5',
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-skill-bar-area .abc-ele-progress-bar-row .abc-ele-progress-bar' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        // skill bar progress color
        $this->add_control(
            'abc_elementor_skill_bar_progress_color',
            [
                'label' => __('Progress Color', 'ABCMAFTH'),
                'type' => Controls_Manager::COLOR,
                'default' => '#59a818',
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-skill-bar-area .abc-ele-progress-bar-row .abc-ele-progress-bar > span' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

        //start control section for tooltip
        $this->start_controls_section(
            'abc_elementor_skill_bar_tooltip',
            [
                'label' => __('Tooltip', 'ABCMAFTH'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'abc_elementor_skill_bar_tooltip_switch' => 'yes',
                ],
            ]
        );
        //tooltip background color
        $this->add_control(
            'abc_elementor_skill_bar_tooltip_background_color',
            [
                'label' => __('Background Color', 'ABCMAFTH'),
                'type' => Controls_Manager::COLOR,
                'default' => '#2B35FF',
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-skill-bar-area .abc-ele-progress-bar-row .abc-ele-progress-bar .abc_skills_bar_percent_tooltip' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .abc-ele-skill-bar-area .abc-ele-progress-bar-row .abc-ele-progress-bar .abc_skills_bar_percent_tooltip:after' => 'border-top-color: {{VALUE}}',
                ]
            ]
        );
        //tooltip text color
        $this->add_control(
            'abc_elementor_skill_bar_tooltip_text_color',
            [
                'label' => __('Text Color', 'ABCMAFTH'),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-skill-bar-area .abc-ele-progress-bar-row .abc-ele-progress-bar .abc_skills_bar_percent_tooltip' => 'color: {{VALUE}}',
                ]
            ]
        );
        //tooltip typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abc_elementor_skill_bar_tooltip_typography',
                'label' => __('Typography', 'ABCMAFTH'),
                'selector' => '{{WRAPPER}} .abc-ele-skill-bar-area .abc-ele-progress-bar-row .abc-ele-progress-bar .abc_skills_bar_percent_tooltip',
            ]
        );
        //tooltip offset
        $this->add_responsive_control(
            'abc_elementor_skill_bar_tooltip_offset_top',
            [
                'label' => __('Offset Top', 'ABCMAFTH'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-skill-bar-area .abc-ele-progress-bar-row .abc-ele-progress-bar .abc_skills_bar_percent_tooltip' => 'top: {{SIZE}}{{UNIT}}',
                ]
            ]
        );

        //tooltip offset right
        $this->add_responsive_control(
            'abc_elementor_skill_bar_tooltip_offset_right',
            [
                'label' => __('Offset Right', 'ABCMAFTH'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-skill-bar-area .abc-ele-progress-bar-row .abc-ele-progress-bar .abc_skills_bar_percent_tooltip' => 'right: {{SIZE}}{{UNIT}}',
                ]
            ],
        );


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