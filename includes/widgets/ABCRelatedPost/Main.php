<?php
namespace Inc\Widgets\ABCRelatedPost;

use Inc\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;

class Main extends BaseWidget
{
    // define protected variables...
    protected $name = 'abc-related-post';
    protected $title = 'ABC Related Post';
    protected $icon = 'eicon-product-related';
    protected $categories = [
        'abc-category'
    ];

    protected $keywords = [
        'abc', 'related', 'post'
    ];


    /**
     * Register the widget controls.
     * @since 1.0.0
     *
     * @access protected
     */
    protected function register_controls()
    {

        // Related post style section
        $this->start_controls_section(
            'abc_elementor_related_post_style_section',
            [
                'label' => __('Related Post Style', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
            );


            // Heading color
          $this->add_control(
            'abc_elementor_related_post_heading_color',
            [
                'label' => __('Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#444444',
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-related-post-heading a' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Heading Hover color
        $this->add_control(
            'abc_elementor_related_post_heading_hover_color',
            [
                'label' => __('Hover Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#04801d',
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-related-post-heading a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        //Heading Typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abc_elementor_related_post_heading_typography',
                'label' => __('Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abc-ele-related-post-heading',
            ]
        );
       
        $this->end_controls_section();


    }

    /**
     * Render the widget output on the frontend.
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