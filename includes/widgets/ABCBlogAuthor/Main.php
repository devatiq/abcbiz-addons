<?php
namespace ABCBiz\Includes\Widgets\ABCBlogAuthor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
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
                'label' => esc_html__('Setting', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        //Author bio text
        $this->add_control(
            'abcbiz_elementor_author_bio_text',
            [
                'label' => esc_html__('Author Bio Text', 'abcbiz-multi'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('About Author', 'abcbiz-multi'),
            ]
        );

         //Author bio link
         $this->add_control(
            'abcbiz_elementor_author_bio_link_switch',
            [
                'label' => esc_html__('View All Posts Link', 'abcbiz-multi'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'abcbiz-multi'),
                'label_off' => esc_html__('Hide', 'abcbiz-multi'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );


        $this->end_controls_section();

        // blog info style section
        $this->start_controls_section(
            'abcbiz_elementor_author_bio_style_section',
            [
                'label' => esc_html__('Author Style', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
            );


            // Background color
          $this->add_control(
            'abcbiz_elementor_author_bio_bg_color',
            [
                'label' => esc_html__('Background Color', 'abcbiz-multi'),
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
                'label' => esc_html__('Title Color', 'abcbiz-multi'),
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
                'label' => esc_html__('Title Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abc-author-bio-title',
            ]
        );

        // text color
                $this->add_control(
                    'abcbiz_elementor_author_bio_text_color',
                    [
                        'label' => esc_html__('Text Color', 'abcbiz-multi'),
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
                'label' => esc_html__('Text Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-ele-authorright',
            ]
        );

        // link color
        $this->add_control(
            'abcbiz_elementor_author_bio_link_color',
            [
                'label' => esc_html__('Link Color', 'abcbiz-multi'),
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
                'label' => esc_html__('Link Hover Color', 'abcbiz-multi'),
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
     */
    protected function render()
    {

        include 'RenderView.php';
    }

}