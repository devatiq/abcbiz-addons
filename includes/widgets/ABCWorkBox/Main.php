<?php
namespace Inc\Widgets\ABCWorkBox;

use Inc\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;

class Main extends BaseWidget
{
    // define protected variables...
    protected $name = 'ABC-Elementor-AbcWorkBox';
    protected $title = 'ABC Portfolio';
    protected $icon = 'eicon-posts-grid';
    protected $categories = [
        'abc-category'
    ];
    protected $keywords = [
        'abc', 'work', 'portfolio',
    ];

    public function get_script_depends()
    {
        return ['abc-portfolio'];
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
            'abc_elementor_portfolio_setting',
            [
                'label' => __('Portfolio Setting', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'abc_elementor_portfolio_number_of_show',
            [
                'label' => __('Number of works to show', 'abcbiz-multi'),
                'type' => Controls_Manager::SELECT,
                'default' => '6',
                'options' => [
                    '3'  => __('3', 'abcbiz-multi'),
                    '6' => __('6', 'abcbiz-multi'),
                    '9' => __('9', 'abcbiz-multi'),
                    '12' => __('12', 'abcbiz-multi'),
                    '15' => __('15', 'abcbiz-multi'),
                    '18' => __('18', 'abcbiz-multi'),
                    '21' => __('21', 'abcbiz-multi'),
                    '24' => __('24', 'abcbiz-multi'),
                    '27' => __('27', 'abcbiz-multi'),
                    '30' => __('30', 'abcbiz-multi')
                ],
            ]
        );

        $this->add_control(
            'abc_elementor_portfolio_display_filter',
            [
                'label' => __('Display Filter?', 'abcbiz-multi'),
                'type' => Controls_Manager::SELECT,
                'default' => 'yes',
                'options' => [
                    'yes'  => __('Yes', 'abcbiz-multi'),
                    'nofilter' => __('No', 'abcbiz-multi')
                ],
            ]
        );
        //no portfolio found message
        $this->add_control(
            'abc_ele_portfolio_no_found_message',
            [
                'label' => __('Empty Message', 'abcbiz-multi'),
                'type' => Controls_Manager::TEXT,
                'default' => __('No Portfolio Found!', 'abcbiz-multi'),
                'label_block' => true,
            ]
        );
        

        $this->end_controls_section();


        // Portfolio style section starts here

        $this->start_controls_section(
            'abc_elementor_portfolio_filter_style',
            [
                'label' => __('Filter Button', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        //portfolio filter alignment
        $this->add_responsive_control(
            'abc_ele_portfolio_filter_alignment',
            [
                'label' => __('Alignment', 'abcbiz-multi'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'abcbiz-multi'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'abcbiz-multi'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'abcbiz-multi'),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'right',
                'selectors' => [
                    '{{WRAPPER}} .abc-elementor-portfolio-filter' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        // portfolio filter margin
        $this->add_responsive_control(
            'abc_ele_portfolio_filter_margin',
            [
                'label' => esc_html__('Margin', 'abcbiz-multi'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} ul#portfolio-filter.abc-elementor-portfolio-filter' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'top' => '-90',
                    'right' => '0',
                    'bottom' => '50',
                    'left' => '0',
                    'unit' => 'px',
                    'isLinked' => false,
                ],
            ]
        );

        // portfolio filter padding
        $this->add_responsive_control(
            'abc_ele_portfolio_filter_padding',
            [
                'label' => esc_html__('Filter Button Padding', 'abcbiz-multi'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} #portfolio-filter .abc-elementor-portfolio-single-filter a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // portfolio filter typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abc_ele_portfolio_filter_typography',
                'label' => __('Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} #portfolio-filter .abc-elementor-portfolio-single-filter a',
            ]
        );

        // portfolio filter normal and hover tab
        $this->start_controls_tabs('abc_ele_portfolio_filter_tabs');
        // portfolio filter normal tab
        $this->start_controls_tab(
            'abc_ele_portfolio_filter_normal_tab',
            [
                'label' => esc_html__('Normal', 'abcbiz-multi'),
            ]
        );

        // Portfolio Filter Button Text Color  
        $this->add_control(
            'abc_ele_portfolio_filter_btn_text_color',
            [
                'label' => __('Text Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#448E08',
                'selectors' => [
                    '{{WRAPPER}} #portfolio-filter .abc-elementor-portfolio-single-filter a' => 'color: {{VALUE}};',
                ],
            ]
        );
        // Portfolio Filter Button Background Color
        $this->add_control(
            'abc_ele_portfolio_filter_btn_bg_color',
            [
                'label' => __('Background Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  #portfolio-filter .abc-elementor-portfolio-single-filter a' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Portfolio Filter Button Border
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'abc_ele_portfolio_filter_btn_border',
                'label' => __('Border', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} #portfolio-filter .abc-elementor-portfolio-single-filter a',
            ]
        );

        $this->end_controls_tab();
        // portfolio filter normal tab ends here

        // portfolio filter hover tab
        $this->start_controls_tab(
            'abc_ele_portfolio_filter_hover_tab',
            [
                'label' => esc_html__('Hover', 'abcbiz-multi'),
            ]
        );
        // Portfolio Filter Button hover Text Color
        $this->add_control(
            'abc_ele_portfolio_filter_btn_hover_text_color',
            [
                'label' => __('Text Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}}  #portfolio-filter .abc-elementor-portfolio-single-filter a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}}  #portfolio-filter .abc-elementor-portfolio-single-filter a.active.current' => 'color: {{VALUE}};',
                ],
            ]
        );
        // Portfolio Filter Button hover Background Color
        $this->add_control(
            'abc_ele_portfolio_filter_btn_hover_bg_color',
            [
                'label' => __('Background Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#448E08',
                'selectors' => [
                    '{{WRAPPER}}  #portfolio-filter .abc-elementor-portfolio-single-filter a:hover' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}}  #portfolio-filter .abc-elementor-portfolio-single-filter a.active.current' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        // Portfolio Filter Button hover Border color
        $this->add_control(
            'abc_ele_portfolio_filter_btn_hover_border_color',
            [
                'label' => __('Border Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#448E08',
                'selectors' => [
                    '{{WRAPPER}}  #portfolio-filter .abc-elementor-portfolio-single-filter a:hover' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}}  #portfolio-filter .abc-elementor-portfolio-single-filter a.active.current' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab(); // portfolio filter hover tab ends here  
        $this->end_controls_tabs(); // portfolio filter tabs ends here
        // portfolio filter normal and hover tab ends here

        // portfolio filter style section ends here
        $this->end_controls_section();

        // Portfolio content style section starts here
        $this->start_controls_section(
            'abc_elementor_portfolio_content_style',
            [
                'label' => __('Content', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Portfolio Content Title Typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abc_ele_portfolio_content_title_typography',
                'label' => __('Title Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abc-elementor-portfolio-left h3 a',
            ]
        );
        // Portfolio Content Title Color
        $this->add_control(
            'abc_ele_portfolio_content_title_color',
            [
                'label' => __('Title Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#181818',
                'selectors' => [
                    '{{WRAPPER}} .abc-elementor-portfolio-left h3 a' => 'color: {{VALUE}};',
                ],
            ]
        );
        // portfolio terms typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abc_ele_portfolio_terms_typography',
                'label' => __('Category Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abc-elementor-portfolio-left p',
            ]
        );
        // portfolio terms color
        $this->add_control(
            'abc_ele_portfolio_terms_color',
            [
                'label' => __('Category Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#448E08',
                'selectors' => [
                    '{{WRAPPER}} .abc-elementor-portfolio-left p' => 'color: {{VALUE}};',
                ],
            ]
        );
        // portfolio link icon color
        $this->add_control(
            'abc_ele_portfolio_link_icon_color',
            [
                'label' => __('Icon Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .abc-elementor-portfolio-link i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .abc-elementor-portfolio-link svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );
        // portfolio link icon background color
        $this->add_control(
            'abc_ele_portfolio_link_icon_background_color',
            [
                'label' => __('Icon Background Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#448E08',
                'selectors' => [
                    '{{WRAPPER}} .abc-elementor-portfolio-link i' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .abc-elementor-portfolio-link svg circle' => 'fill: {{VALUE}};',
                ],
            ]
        );
        // Hover Icon Color
        $this->add_control(
            'abc_ele_portfolio_hover_icon_color',
            [
                'label' => __('Icon Hover Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-elementor-portfolio-link i:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .abc-elementor-portfolio-link svg:hover path' => 'fill: {{VALUE}};',
                ],
            ]
        );

        // Hover Icon Background Color
        $this->add_control(
            'abc_ele_portfolio_hover_icon_background_color',
            [
                'label' => __('Icon Hover Background Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#FE4D05',
                'selectors' => [
                    '{{WRAPPER}} .abc-elementor-portfolio-link i:hover' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .abc-elementor-portfolio-link svg:hover circle' => 'fill: {{VALUE}};',
                ],
            ]
        );
        // portfolio link icon size
        $this->add_control(
            'abc_ele_portfolio_icon_size',
            [
                'label' => __('Icon Size', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 150,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abc-elementor-portfolio-right svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
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
