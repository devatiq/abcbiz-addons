<?php
namespace Inc\Widgets\ABCTeamMember;

use Inc\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;

class Main extends BaseWidget
{
    // define protected variables...
    protected $name = 'ABC-Elementor-ABCTeamMember';
    protected $title = 'ABC Team Member';
    protected $icon = 'eicon-theme-builder';
    protected $categories = [
        'abc-category'
    ];

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
            'abc_elementor_teammember_setting',
            [
                'label' => __('Team Setting', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        // select team member style
        $this->add_control(
            'abc_ele_teammember_style',
            [
                'label' => __('Team Member Style', 'abcbiz-multi'),
                'type' => Controls_Manager::SELECT,
                'default' => 'style-one',
                'options' => [
                    'style-one' => __('Style One', 'abcbiz-multi'),
                    'style-two' => __('Style Two', 'abcbiz-multi'),
                ],
            ]
        );
        // select team member per page
        $this->add_control(
            'abc_ele_teammember_per_page',
            [
                'label' => __('Item Per Page', 'abcbiz-multi'),
                'type' => Controls_Manager::NUMBER,
                'default' => 4,
            ]
        );

        //social profile on/off switch
        $this->add_control(
            'abc_elementor_teammember_display_social',
            [
                'label' => __('Display Social Profile', 'abcbiz-multi'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'abcbiz-multi'),
                'label_off' => __('No', 'abcbiz-multi'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        // end of team member section
        $this->end_controls_section();

        // start of team member style section
        $this->start_controls_section(
            'abc_elementor_teammember_style_setting',
            [
                'label' => __('Style', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        // team member border
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'abc_ele_teammember_border',
                'label' => __('Border', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abc-elementor-teammember-single-item-area, {{WRAPPER}} #abc-elementor-team-style-two-img.abc-elementor-team-img img',
            ]
        );
        // team member border radius
        $this->add_responsive_control(
            'abc_ele_teammember_border_radius',
            [
                'label' => __('Border Radius', 'abcbiz-multi'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abc-elementor-teammember-single-item-area' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',                   
                    '{{WRAPPER}} .abc-ele-team-image img.wp-post-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} #abc-elementor-team-style-two-img.abc-elementor-team-img img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // team member name typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abc_ele_teammember_name_typography',
                'label' => __('Name Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} h4.abc-ele-team-name a,  {{WRAPPER}}  #abc-elementor-team-name.abc-elementor-team-name h2',
            ]
        );
        // team member name color
        $this->add_control(
            'abc_ele_teammember_name_color',
            [
                'label' => __('Name Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} h4.abc-ele-team-name a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} #abc-elementor-team-name.abc-elementor-team-name h2 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        // team member designation typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abc_ele_teammember_designation_typography',
                'label' => __('Designation Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} p.abc-ele-team-designation, {{WRAPPER}} .abc-elementor-team-designation p',
            ]
        );
        // team member designation color
        $this->add_control(
            'abc_ele_teammember_designation_color',
            [
                'label' => __('Designation Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} p.abc-ele-team-designation' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .abc-elementor-team-designation p' => 'color: {{VALUE}};',
                ],
            ]
        );

        // end of team member style section
        $this->end_controls_section();

        // start of social style section
        $this->start_controls_section(
            'abc_elementor_teammember_social_style',
            [
                'label' => __('Social Profile', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'abc_elementor_teammember_display_social' => 'yes',
                ]
            ]
        );
        // social circle background color
        $this->add_control(
            'abc_ele_teammember_social_circle_bg_color',
            [
                'label' => __('Circle BG Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-team-social svg circle' => 'fill: {{VALUE}};',
                ],
                'condition' => [
                    'abc_ele_teammember_style' => 'style-one',
                ],
            ]
        );
        // social circle icon color
        $this->add_control(
            'abc_ele_teammember_social_circle_icon_color',
            [
                'label' => __('Circle Icon Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-team-social svg path' => 'fill: {{VALUE}};',
                ],
                'condition' => [
                    'abc_ele_teammember_style' => 'style-one',
                ],
            ]
        );

        // social icons background color
        $this->add_control(
            'abc_ele_teammember_social_icons_bg_color',
            [
                'label' => __('Icons BG Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-team-social-overlay' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .abc-ele-team-social-overlay:before' => 'border-bottom-color: {{VALUE}};',
                ],
                'condition' => [
                    'abc_ele_teammember_style' => 'style-one',
                ],
            ]
        );
        // social icon color
        $this->add_control(
            'abc_ele_teammember_social_icon_color',
            [
                'label' => __('Icon Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-team-social-overlay ul li a i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .abc-ele-team-social-overlay ul li a svg' => 'fill: {{VALUE}};',
                    '{{WRAPPER}} .abc-team-style-two-social.abc-ele-team-social-overlay ul li a i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .abc-team-style-two-social.abc-ele-team-social-overlay ul li a svg path' => 'fill: {{VALUE}};',
                ]
            ]
        );
        // end of social style section
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