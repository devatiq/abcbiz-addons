<?php
namespace ABCBiz\Includes\Widgets\ABCRelatedPost;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;

class Main extends BaseWidget
{
    // define protected variables...
    protected $name = 'abcbiz-related-post';
    protected $title = 'ABC Related Post';
    protected $icon = 'eicon-product-related abcbiz-addons-icon';
    protected $categories = [
        'abcbiz-category'
    ];

    protected $keywords = [
        'abc', 'related', 'post'
    ];


    /**
     * Register the widget controls.
     */
    protected function register_controls()
    {

        // Related post style section
        $this->start_controls_section(
            'abcbiz_elementor_related_post_style_section',
            [
                'label' => esc_html__('Related Post Style', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
            );


            // Heading color
          $this->add_control(
            'abcbiz_elementor_related_post_heading_color',
            [
                'label' => esc_html__('Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#444444',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-related-post-heading a' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Heading Hover color
        $this->add_control(
            'abcbiz_elementor_related_post_heading_hover_color',
            [
                'label' => esc_html__('Hover Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#04801d',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-related-post-heading a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        //Heading Typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_related_post_heading_typography',
                'label' => esc_html__('Typography', 'abcbiz-addons'),
                'selector' => '{{WRAPPER}} .abcbiz-ele-related-post-heading',
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