<?php
namespace ABCBiz\Includes\Widgets\ABCBlog;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;

class Main extends BaseWidget
{
    // define protected variables...
    protected $name = 'abcbiz-elementor-blogpost';
    protected $title = 'ABC Blog Posts Fancy';
    protected $icon = 'eicon-posts-group abcbiz-multi-icon';
    protected $categories = [
        'abcbiz-category'
    ];

    /**
     * Register the widget controls.
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'abcbiz_elementor_blog_setting',
            [
                'label' => esc_html__('Blog Setting', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        //category selection
        $this->add_control(
            'abcbiz_elementor_blog_category_fancy',
            [
                'label' => esc_html__('Select Category', 'abcbiz-multi'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => $this->abcbiz_blog_fancy_categories(),
                'default' => 'all',
                'label_block' => true,
                'multiple' => false,
            ]
        );

        //blog date on/off switch
        $this->add_control(
            'abcbiz_elementor_blog_date_switch',
            [
                'label' => esc_html__('Date', 'abcbiz-multi'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'abcbiz-multi'),
                'label_off' => esc_html__('Hide', 'abcbiz-multi'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        //blog comment on/off switch
        $this->add_control(
            'abcbiz_elementor_blog_comment_switch',
            [
                'label' => esc_html__('Comments', 'abcbiz-multi'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'abcbiz-multi'),
                'label_off' => esc_html__('Hide', 'abcbiz-multi'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        // blog read more button on/off switch
        $this->add_control(
            'abcbiz_elementor_blog_read_more_switch',
            [
                'label' => esc_html__('Read More', 'abcbiz-multi'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'abcbiz-multi'),
                'label_off' => esc_html__('Hide', 'abcbiz-multi'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        //Read more text
        $this->add_control(
            'abcbiz_elementor_blog_read_more_text',
            [
                'label' => esc_html__('Read More Text', 'abcbiz-multi'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Read More', 'abcbiz-multi'),
                'placeholder' => esc_html__('Type read more text', 'abcbiz-multi'),
                'condition' => [
                    'abcbiz_elementor_blog_read_more_switch' => 'yes',
                ],
            ]

        );

        $this->end_controls_section(); //end blog setting control

        // blog content style section
        $this->start_controls_section(
            'abcbiz_elementor_blog_content_style_section',
            [
                'label' => esc_html__('Blog Style', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        //blog gap
        $this->add_responsive_control(
            'abcbiz_elementor_fancy_blog_gap',
            [
                'label' => esc_html__('Gap', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 150,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 20,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-blogs' => 'gap: {{SIZE}}{{UNIT}};',
                ]
            ],
        );

        //flex direction choose
        $this->add_responsive_control(
            'abcbiz_elementor_blog_flex_direction',
            [
                'label' => esc_html__('Layout Direction', 'abcbiz-multi'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'row' => [
                        'title' => esc_html__('Row', 'abcbiz-multi'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'row-reverse' => [
                        'title' => esc_html__('Row Reverse', 'abcbiz-multi'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-blogs' => 'flex-direction: {{VALUE}};',
                ],
            ]
        );


        //blog info typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_blog_info_typography',
                'label' => esc_html__('Meta Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-ele-single-blog-info a',
            ]
        );
        // blog info color
        $this->add_control(
            'abcbiz_elementor_blog_info_color',
            [
                'label' => esc_html__('Meta Text Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-single-blog-info a' => 'color: {{VALUE}};',
                ],
            ]
        );
        // blog info icon color
        $this->add_control(
            'abcbiz_elementor_blog_info_icon_color',
            [
                'label' => esc_html__('Meta Icon Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-single-blog-info i' => 'color: {{VALUE}};',
                ],
            ]
        );
        // blog info icon size
        $this->add_responsive_control(
            'abcbiz_elementor_blog_info_icon_size',
            [
                'label' => esc_html__('Meta Icon Size', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-single-blog-info i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        // blog title typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_blog_title_typography',
                'label' => esc_html__('Title Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-ele-single-blog-title h2 a',
            ]
        );
        // blog title color
        $this->add_control(
            'abcbiz_elementor_blog_title_color',
            [
                'label' => esc_html__('Title Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-single-blog-title h2 a' => 'color: {{VALUE}};',
                ],
            ]
        );
        // blog read more button typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_blog_read_more_typography',
                'label' => esc_html__('Button Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-ele-single-blog-button a',
            ]
        );
        // blog read more button color
        $this->add_control(
            'abcbiz_elementor_blog_read_more_color',
            [
                'label' => esc_html__('Button Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-single-blog-button a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section(); // end: Section


        // Start section for featured post
        $this->start_controls_section(
            'abcbiz_elementor_fancy_featured_post_section',
            [
                'label' => esc_html__('Featured Post', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Content width control
        $this->add_responsive_control(
            'abcbiz_elementor_fancy_blog_content_width',
            [
                'label' => esc_html__('Content Width', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 2000,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-single-first .abcbiz-ele-single-blog-content-area' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Content padding control
        $this->add_responsive_control(
            'abcbiz_elementor_fancy_blog_content_padding',
            [
                'label' => esc_html__('Content Padding', 'abcbiz-multi'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-single-first .abcbiz-ele-single-blog-content-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Content background control
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'abcbiz_elementor_fancy_blog_content_background',
                'label' => esc_html__('Content Background', 'abcbiz-multi'),
                'types' => ['classic', 'gradient'],
                'exclude' => ['image'],
                'selector' => '{{WRAPPER}} .abcbiz-ele-single-first .abcbiz-ele-single-blog-content-area',
            ]
        );

        //content border radius
        $this->add_responsive_control(
            'abcbiz_elementor_fancy_blog_content_border_radius',
            [
                'label' => esc_html__('Border Radius', 'abcbiz-multi'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-single-first .abcbiz-ele-single-blog-content-area' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Content margin-top control
        $this->add_responsive_control(
            'abcbiz_elementor_fancy_blog_content_margin_top',
            [
                'label' => esc_html__('Content Margin Top', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range' => [
                    'px' => [
                        'min' => -500,
                        'max' => 500,
                    ],
                    'em' => [
                        'min' => -50,
                        'max' => 50,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-single-first .abcbiz-ele-single-blog-content-area' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Image Height control
        $this->add_responsive_control(
            'abcbiz_elementor_fancy_blog_image_height',
            [
                'label' => esc_html__('Image Height', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'vh'],
                'range' => [
                    'px' => [
                        'min' => 30,
                        'max' => 1000,
                    ],
                    'vh' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-single-blog-area.abcbiz-ele-single-first .abcbiz-ele-single-blog-thumbnail img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        //image border radius
        $this->add_responsive_control(
            'abcbiz_elementor_fancy_blog_image_border_radius',
            [
                'label' => esc_html__('Image Border Radius', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 300,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-single-blog-area.abcbiz-ele-single-first .abcbiz-ele-single-blog-thumbnail img' => 'border-radius: {{SIZE}}{{UNIT}} !important;',
                ],
            ],
        );

        // Image Width control
        $this->add_responsive_control(
            'abcbiz_elementor_fancy_blog_image_width',
            [
                'label' => esc_html__('Image Width', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-single-blog-area.abcbiz-ele-single-first .abcbiz-ele-single-blog-thumbnail img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        // End section for featured post
        $this->end_controls_section();

        // Start new section for Blog List Style settings
        $this->start_controls_section(
            'abcbiz_elementor_fancy_blog_list_style',
            [
                'label' => esc_html__('Blog List', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'abcbiz_elementor_fancy_blog_blog_post_count',
            [
                'label' => esc_html__('Post Count', 'abcbiz-multi'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 3,
                'default' => 3,
                'description' => esc_html__('Set the number of posts to show', 'abcbiz-multi'),
            ]
        );

        // Padding control
        $this->add_responsive_control(
            'abcbiz_elementor_fancy_blog_list_padding',
            [
                'label' => esc_html__('Padding', 'abcbiz-multi'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-single-blog-rem-posts .abcbiz-ele-single-blog-content-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        //content background
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'abcbiz_elementor_fancy_blog_list_background',
                'label' => esc_html__('Content Background', 'abcbiz-multi'),
                'types' => ['classic', 'gradient'],
                'exclude' => ['image'],
                'selector' => '{{WRAPPER}} .abcbiz-ele-single-blog-rem-posts .abcbiz-ele-single-blog-content-area',
            ]
        );

        $this->add_responsive_control(
            'abcbiz_elementor_fancy_blog_list_gap',
            [
                'label' => esc_html__('Gap Between Posts', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 10,
                        'step' => 0.1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-single-blog-rem-posts' => 'gap: {{SIZE}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        //fancy blog list content radius
        $this->add_responsive_control(
            'abcbiz_elementor_fancy_blog_list_radius',
            [
                'label' => esc_html__('Border Radius', 'abcbiz-multi'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-single-blog-rem-posts .abcbiz-ele-single-blog-content-area' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        // Width control
        $this->add_responsive_control(
            'abcbiz_elementor_fancy_blog_list_width',
            [
                'label' => esc_html__('Width', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['%', 'px', 'vw'],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => 0,
                        'max' => 2000,
                    ],
                    'vw' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-single-blog-rem-posts .abcbiz-ele-single-blog-content-area' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Top control
        $this->add_responsive_control(
            'abcbiz_elementor_fancy_blog_list_top',
            [
                'label' => esc_html__('Top Position', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'vh'],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'vh' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-single-blog-rem-posts .abcbiz-ele-single-blog-content-area' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Left control
        $this->add_responsive_control(
            'abcbiz_elementor_fancy_blog_list_left',
            [
                'label' => esc_html__('Left Position', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'vw'],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'vw' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-single-blog-rem-posts .abcbiz-ele-single-blog-content-area' => 'left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Image width control
        $this->add_responsive_control(
            'abcbiz_elementor_fancy_blog_list_image_width',
            [
                'label' => esc_html__('Thumbnail Width', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-single-blog-rem-posts .abcbiz-ele-single-blog-thumbnail img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Image height control
        $this->add_responsive_control(
            'abcbiz_elementor_fancy_blog_list_image_height',
            [
                'label' => esc_html__('Thumbnail Height', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'vh'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                    ],
                    'vh' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-single-blog-rem-posts .abcbiz-ele-single-blog-thumbnail img' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .abcbiz-ele-single-blog-rem-posts .abcbiz-ele-single-blog-thumbnail' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        //thumbnail radius
        $this->add_responsive_control(
            'abcbiz_elementor_fancy_blog_list_thumbnail_radius',
            [
                'label' => esc_html__('Thumbnail Radius', 'abcbiz-multi'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-single-blog-rem-posts .abcbiz-ele-single-blog-thumbnail img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );

        // End section
        $this->end_controls_section();


    }

    //get blog category
    private function abcbiz_blog_fancy_categories()
    {
        $categories = get_categories();
        $options = ['all' => 'All Categories'];

        foreach ($categories as $category) {
            $options[$category->term_id] = $category->name;
        }

        return $options;
    }

    /**
     * Render the widget output on the frontend.
     */
    protected function render()
    {
        include 'RenderView.php';
    }
}
