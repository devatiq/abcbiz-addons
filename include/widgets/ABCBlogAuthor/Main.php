<?php
namespace Inc\Widgets\ABCBlogAuthor;

use Inc\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;

class Main extends BaseWidget
{
    // define protected variables...
    protected $name = 'abc-blog-author';
    protected $title = 'ABC Author Bio';
    protected $icon = 'eicon-user-circle-o';
    protected $categories = [
        'abc-category'
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
            'abc_elementor_author_bio_setting',
            [
                'label' => __('Setting', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

         //Author bio link
         $this->add_control(
            'abc_elementor_author_bio_link_switch',
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
            'abc_elementor_author_bio_style_section',
            [
                'label' => __('Author Style', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
            );


            // Background color
          $this->add_control(
            'abc_elementor_author_bio_bg_color',
            [
                'label' => __('Background Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ececec',
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-author-bio-area' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Title color
        $this->add_control(
            'abc_elementor_author_bio_title_color',
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
                'name' => 'abc_elementor_author_bio_typography',
                'label' => __('Title Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abc-author-bio-title',
            ]
        );

        // text color
                $this->add_control(
                    'abc_elementor_author_bio_text_color',
                    [
                        'label' => __('Text Color', 'abcbiz-multi'),
                        'type' => Controls_Manager::COLOR,
                        'default' => '#444444',
                        'selectors' => [
                            '{{WRAPPER}} .abc-ele-authorright' => 'color: {{VALUE}};',
                        ],
                    ]
                );

                 //Author Text Typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abc_elementor_author_bio_text_typography',
                'label' => __('Text Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abc-ele-authorright',
            ]
        );

        // link color
        $this->add_control(
            'abc_elementor_author_bio_link_color',
            [
                'label' => __('Link Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#0dbad1',
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-authorright a' => 'color: {{VALUE}};',
                ],
            ]
        );

        // link hover color
        $this->add_control(
            'abc_elementor_author_bio_link_hover_color',
            [
                'label' => __('Link Hover Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#02363d',
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-authorright a:hover' => 'color: {{VALUE}};',
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