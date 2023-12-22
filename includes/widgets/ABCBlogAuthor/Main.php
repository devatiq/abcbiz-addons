<?php
namespace Includes\Widgets\ABCBlogAuthor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;

class Main extends BaseWidget
{
    // define protected variables...
    protected $name = 'abcbiz-blog-author';
    protected $title = 'ABC Author Bio';
    protected $icon = 'eicon-user-circle-o';
    protected $categories = [
        'abcbiz-category'
    ];

    protected $keywords = [
        'abc', 'author', 'bio'
    ];


    /**
     * Register the widget controls.
     * @since 1.0.0
     *
     * @access protected
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'abcbiz_elementor_author_bio_setting',
            [
                'label' => __('Setting', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

         //Author bio link
         $this->add_control(
            'abcbiz_elementor_author_bio_link_switch',
            [
                'label' => __('View All Posts Link', 'abcbiz-multi'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'abcbiz-multi'),
                'label_off' => __('Hide', 'abcbiz-multi'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );


        $this->end_controls_section();

        // blog info style section
        $this->start_controls_section(
            'abcbiz_elementor_author_bio_style_section',
            [
                'label' => __('Author Style', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
            );


            // Background color
          $this->add_control(
            'abcbiz_elementor_author_bio_bg_color',
            [
                'label' => __('Background Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ececec',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-author-bio-area' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Title color
        $this->add_control(
            'abcbiz_elementor_author_bio_title_color',
            [
                'label' => __('Title Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#444444',
                'selectors' => [
                    '{{WRAPPER}} .abc-author-bio-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        //Author Title Typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_author_bio_typography',
                'label' => __('Title Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abc-author-bio-title',
            ]
        );

        // text color
                $this->add_control(
                    'abcbiz_elementor_author_bio_text_color',
                    [
                        'label' => __('Text Color', 'abcbiz-multi'),
                        'type' => Controls_Manager::COLOR,
                        'default' => '#444444',
                        'selectors' => [
                            '{{WRAPPER}} .abcbiz-ele-authorright' => 'color: {{VALUE}};',
                        ],
                    ]
                );

                 //Author Text Typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_author_bio_text_typography',
                'label' => __('Text Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-ele-authorright',
            ]
        );

        // link color
        $this->add_control(
            'abcbiz_elementor_author_bio_link_color',
            [
                'label' => __('Link Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#0dbad1',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-authorright a' => 'color: {{VALUE}};',
                ],
            ]
        );

        // link hover color
        $this->add_control(
            'abcbiz_elementor_author_bio_link_hover_color',
            [
                'label' => __('Link Hover Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#02363d',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-authorright a:hover' => 'color: {{VALUE}};',
                ],
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