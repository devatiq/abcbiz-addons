<?php
namespace Includes\Widgets\ABCWorkBox;
if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;

class Main extends BaseWidget
{
    // define protected variables...
    protected $name = 'abcbiz-elementor-portfolio';
    protected $title = 'ABC Portfolio';
    protected $icon = 'eicon-posts-grid';
    protected $categories = [
        'abcbiz-category'
    ];
    protected $keywords = [
        'abc', 'work', 'portfolio',
    ];

    public function get_script_depends()
    {
        return ['abcbiz-portfolio'];
    }

    /**
     * Register the widget controls.
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'abcbiz_elementor_portfolio_setting',
            [
                'label' => esc_html__('Portfolio Setting', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'abcbiz_elementor_portfolio_number_of_show',
            [
                'label' => esc_html__('Number of works to show', 'abcbiz-multi'),
                'type' => Controls_Manager::SELECT,
                'default' => '6',
                'options' => [
                    '3'  => esc_html__('3', 'abcbiz-multi'),
                    '6' => esc_html__('6', 'abcbiz-multi'),
                    '9' => esc_html__('9', 'abcbiz-multi'),
                    '12' => esc_html__('12', 'abcbiz-multi'),
                    '15' => esc_html__('15', 'abcbiz-multi'),
                    '18' => esc_html__('18', 'abcbiz-multi'),
                    '21' => esc_html__('21', 'abcbiz-multi'),
                    '24' => esc_html__('24', 'abcbiz-multi'),
                    '27' => esc_html__('27', 'abcbiz-multi'),
                    '30' => esc_html__('30', 'abcbiz-multi')
                ],
            ]
        );

        $this->add_control(
            'abcbiz_elementor_portfolio_display_filter',
            [
                'label' => esc_html__('Display Filter?', 'abcbiz-multi'),
                'type' => Controls_Manager::SELECT,
                'default' => 'yes',
                'options' => [
                    'yes'  => esc_html__('Yes', 'abcbiz-multi'),
                    'nofilter' => esc_html__('No', 'abcbiz-multi')
                ],
            ]
        );
        //no portfolio found message
        $this->add_control(
            'abcbiz_ele_portfolio_no_found_message',
            [
                'label' => esc_html__('Empty Message', 'abcbiz-multi'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('No Portfolio Found!', 'abcbiz-multi'),
                'label_block' => true,
            ]
        );
        

        $this->end_controls_section();


        // Portfolio style section starts here

        $this->start_controls_section(
            'abcbiz_elementor_portfolio_filter_style',
            [
                'label' => esc_html__('Filter Button', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        //portfolio filter alignment
        $this->add_responsive_control(
            'abcbiz_ele_portfolio_filter_alignment',
            [
                'label' => esc_html__('Alignment', 'abcbiz-multi'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'abcbiz-multi'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'abcbiz-multi'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'abcbiz-multi'),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'right',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-elementor-portfolio-filter' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        // portfolio filter margin
        $this->add_responsive_control(
            'abcbiz_ele_portfolio_filter_margin',
            [
                'label' => esc_html__('Margin', 'abcbiz-multi'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} ul#portfolio-filter.abcbiz-elementor-portfolio-filter' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            'abcbiz_ele_portfolio_filter_padding',
            [
                'label' => esc_html__('Filter Button Padding', 'abcbiz-multi'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} #portfolio-filter .abcbiz-elementor-portfolio-single-filter a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // portfolio filter typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_ele_portfolio_filter_typography',
                'label' => esc_html__('Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} #portfolio-filter .abcbiz-elementor-portfolio-single-filter a',
            ]
        );

        // portfolio filter normal and hover tab
        $this->start_controls_tabs('abcbiz_ele_portfolio_filter_tabs');
        // portfolio filter normal tab
        $this->start_controls_tab(
            'abcbiz_ele_portfolio_filter_normal_tab',
            [
                'label' => esc_html__('Normal', 'abcbiz-multi'),
            ]
        );

        // Portfolio Filter Button Text Color  
        $this->add_control(
            'abcbiz_ele_portfolio_filter_btn_text_color',
            [
                'label' => esc_html__('Text Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#448E08',
                'selectors' => [
                    '{{WRAPPER}} #portfolio-filter .abcbiz-elementor-portfolio-single-filter a' => 'color: {{VALUE}};',
                ],
            ]
        );
        // Portfolio Filter Button Background Color
        $this->add_control(
            'abcbiz_ele_portfolio_filter_btn_bg_color',
            [
                'label' => esc_html__('Background Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  #portfolio-filter .abcbiz-elementor-portfolio-single-filter a' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Portfolio Filter Button Border
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'abcbiz_ele_portfolio_filter_btn_border',
                'label' => esc_html__('Border', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} #portfolio-filter .abcbiz-elementor-portfolio-single-filter a',
            ]
        );

        $this->end_controls_tab();
        // portfolio filter normal tab ends here

        // portfolio filter hover tab
        $this->start_controls_tab(
            'abcbiz_ele_portfolio_filter_hover_tab',
            [
                'label' => esc_html__('Hover', 'abcbiz-multi'),
            ]
        );
        // Portfolio Filter Button hover Text Color
        $this->add_control(
            'abcbiz_ele_portfolio_filter_btn_hover_text_color',
            [
                'label' => esc_html__('Text Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}}  #portfolio-filter .abcbiz-elementor-portfolio-single-filter a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}}  #portfolio-filter .abcbiz-elementor-portfolio-single-filter a.active.current' => 'color: {{VALUE}};',
                ],
            ]
        );
        // Portfolio Filter Button hover Background Color
        $this->add_control(
            'abcbiz_ele_portfolio_filter_btn_hover_bg_color',
            [
                'label' => esc_html__('Background Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#448E08',
                'selectors' => [
                    '{{WRAPPER}}  #portfolio-filter .abcbiz-elementor-portfolio-single-filter a:hover' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}}  #portfolio-filter .abcbiz-elementor-portfolio-single-filter a.active.current' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        // Portfolio Filter Button hover Border color
        $this->add_control(
            'abcbiz_ele_portfolio_filter_btn_hover_border_color',
            [
                'label' => esc_html__('Border Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#448E08',
                'selectors' => [
                    '{{WRAPPER}}  #portfolio-filter .abcbiz-elementor-portfolio-single-filter a:hover' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}}  #portfolio-filter .abcbiz-elementor-portfolio-single-filter a.active.current' => 'border-color: {{VALUE}};',
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
            'abcbiz_elementor_portfolio_content_style',
            [
                'label' => esc_html__('Content', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Portfolio Content Title Typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_ele_portfolio_content_title_typography',
                'label' => esc_html__('Title Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-elementor-portfolio-left h3 a',
            ]
        );
        // Portfolio Content Title Color
        $this->add_control(
            'abcbiz_ele_portfolio_content_title_color',
            [
                'label' => esc_html__('Title Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#181818',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-elementor-portfolio-left h3 a' => 'color: {{VALUE}};',
                ],
            ]
        );
        // portfolio terms typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_ele_portfolio_terms_typography',
                'label' => esc_html__('Category Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-elementor-portfolio-left p',
            ]
        );
        // portfolio terms color
        $this->add_control(
            'abcbiz_ele_portfolio_terms_color',
            [
                'label' => esc_html__('Category Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#448E08',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-elementor-portfolio-left p' => 'color: {{VALUE}};',
                ],
            ]
        );
        // portfolio link icon color
        $this->add_control(
            'abcbiz_ele_portfolio_link_icon_color',
            [
                'label' => esc_html__('Icon Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-elementor-portfolio-link i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .abcbiz-elementor-portfolio-link svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );
        // portfolio link icon background color
        $this->add_control(
            'abcbiz_ele_portfolio_link_icon_background_color',
            [
                'label' => esc_html__('Icon Background Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#448E08',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-elementor-portfolio-link i' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .abcbiz-elementor-portfolio-link svg circle' => 'fill: {{VALUE}};',
                ],
            ]
        );
        // Hover Icon Color
        $this->add_control(
            'abcbiz_ele_portfolio_hover_icon_color',
            [
                'label' => esc_html__('Icon Hover Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-elementor-portfolio-link i:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .abcbiz-elementor-portfolio-link svg:hover path' => 'fill: {{VALUE}};',
                ],
            ]
        );

        // Hover Icon Background Color
        $this->add_control(
            'abcbiz_ele_portfolio_hover_icon_background_color',
            [
                'label' => esc_html__('Icon Hover Background Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#FE4D05',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-elementor-portfolio-link i:hover' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .abcbiz-elementor-portfolio-link svg:hover circle' => 'fill: {{VALUE}};',
                ],
            ]
        );
        // portfolio link icon size
        $this->add_control(
            'abcbiz_ele_portfolio_icon_size',
            [
                'label' => esc_html__('Icon Size', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 150,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-elementor-portfolio-right svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


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
