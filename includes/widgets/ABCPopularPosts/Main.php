<?php
namespace ABCBiz\Includes\Widgets\ABCPopularPosts;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;

class Main extends BaseWidget
{
    // define protected variables...
    protected $name = 'abcbiz-ABCPopularPosts';
    protected $title = 'ABC Popular Posts';
    protected $icon = 'eicon-posts-group abcbiz-addons-icon';
    protected $categories = [
        'abcbiz-category'
    ];

    /**
     * Register the widget controls.
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'abcbiz_popular_posts_setting',
            [
                'label' => esc_html__('Setting', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        // Add control for selecting popular based on (Comments or Views)
        $this->add_control(
            'abcbiz_popular_posts_views',
            [
                'label' => esc_html__('Popular Based on', 'abcbiz-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'comments' => esc_html__('Comments', 'abcbiz-addons'),
                    'views' => esc_html__('Views', 'abcbiz-addons'),
                ],
                'default' => 'comments',
                'description' => esc_html__('Select Popular Based on', 'abcbiz-addons'),
            ]
        );


        // Add control for selecting post limit
        $this->add_control(
            'abcbiz_popular_posts_limit',
            [
                'label' => esc_html__('Post Limit', 'abcbiz-addons'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 12,
                'step' => 1,
                'default' => 6,
                'description' => esc_html__('Select the number of posts to show', 'abcbiz-addons'),
            ]
        );

        // Add control for category display switch
        $this->add_control(
            'category_display_switch',
            [
                'label' => esc_html__('Display Category', 'abcbiz-addons'),
                'description' => esc_html__('Choose to display or hide category labels.', 'abcbiz-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'abcbiz-addons'),
                'label_off' => esc_html__('Hide', 'abcbiz-addons'),
                'return_value' => 'true',
                'default' => 'true',
            ]
        );

        // Add control for selecting random color switch
        $this->add_control(
            'category_random_color_switch',
            [
                'label' => esc_html__('Random Color?', 'abcbiz-addons'),
                'description' => esc_html__('display random background color for category?', 'abcbiz-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'abcbiz-addons'),
                'label_off' => esc_html__('No', 'abcbiz-addons'),
                'return_value' => 'true',
                'default' => 'false',
                'condition' => [
                    'category_display_switch' => 'true',
                ],
            ]
        );
        // Add control for selecting comments or views to display
        $this->add_control(
            'display_fields',
            [
                'label' => esc_html__('Display Fields', 'abcbiz-addons'),
                'description' => esc_html__('Select whether to display comments or views.', 'abcbiz-addons'),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => [
                    'comments' => esc_html__('Comments', 'abcbiz-addons'),
                    'views' => esc_html__('Views', 'abcbiz-addons'),
                ],
                'default' => ['comments', 'views'],
            ]
        );

        // End section
        $this->end_controls_section();

        //start style section
        $this->start_controls_section(
            'section_style',
            [
                'label' => esc_html__('Style', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        // Add control for alignment
        $this->add_responsive_control(
            'popular_posts_alignment',
            [
                'label' => esc_html__('Alignment', 'abcbiz-addons'),
                'type' => Controls_Manager::CHOOSE,
                'default' => 'column',
                'options' => [
                    'column' => [
                        'title' => esc_html__('Column', 'abcbiz-addons'),
                        'icon' => 'eicon-arrow-down',
                    ],
                    'row' => [
                        'title' => esc_html__('Row', 'abcbiz-addons'),
                        'icon' => 'eicon-arrow-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-popular-posts-wrapper' => 'flex-direction: {{VALUE}};',
                ],
            ]
        );

        // Add control for gap
        $this->add_responsive_control(
            'popular_posts_gap',
            [
                'label' => esc_html__('Gap', 'abcbiz-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 10,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 15,
                ],
                'selectors' => [
                    '{{WRAPPER}}  .abcbiz-popular-posts-wrapper' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Add control for thumbnail alignment
        $this->add_responsive_control(
            'popular_posts_thumbnail_alignment',
            [
                'label' => esc_html__('Thumbnail Alignment', 'abcbiz-addons'),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'row' => [
                        'title' => esc_html__('Left', 'abcbiz-addons'),
                        'icon' => 'eicon-arrow-left',
                    ],
                    'row-reverse' => [
                        'title' => esc_html__('Right', 'abcbiz-addons'),
                        'icon' => 'eicon-arrow-right',
                    ],
                    'column' => [
                        'title' => esc_html__('Top', 'abcbiz-addons'),
                        'icon' => 'eicon-arrow-up',
                    ],
                    'column-reverse' => [
                        'title' => esc_html__('Bottom', 'abcbiz-addons'),
                        'icon' => 'eicon-arrow-down',
                    ],
                ],
                'default' => 'row',
                'selectors' => [
                    '{{WRAPPER}}  .abcbiz-popular-posts-wrapper .abcbiz-popular-posts-single-post' => 'flex-direction: {{VALUE}};',
                ],
            ]
        );

        // Add control for contents alignment
        $this->add_responsive_control(
            'popular_posts_contents_alignment',
            [
                'label' => esc_html__('Contents Alignment', 'abcbiz-addons'),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'flex-start' => [
                        'title' => esc_html__('Left', 'abcbiz-addons'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'abcbiz-addons'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'flex-end' => [
                        'title' => esc_html__('Right', 'abcbiz-addons'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'condition' => [
                    'popular_posts_thumbnail_alignment' => ['column', 'column-reverse'],
                ],
                'default' => 'flex-start',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-popular-posts-wrapper .abcbiz-popular-posts-single-post' => 'align-items: {{VALUE}};',
                ],
            ]
        );

        // Add control for text alignment
        $this->add_responsive_control(
            'popular_posts_text_alignment',
            [
                'label' => esc_html__('Text Alignment', 'abcbiz-addons'),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'flex-start' => [
                        'title' => esc_html__('Left', 'abcbiz-addons'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'abcbiz-addons'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'flex-end' => [
                        'title' => esc_html__('Right', 'abcbiz-addons'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'flex-start',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-popular-posts-wrapper .abcbiz-popular-post-contents' => 'align-items: {{VALUE}};',
                ],
                'condition' => [
                    'popular_posts_thumbnail_alignment' => ['column', 'column-reverse'],
                ],
            ]
        );

        $this->end_controls_section(); // End style section


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
    private function generate_random_color()
    {
        return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
    }

    /**
     * Render the widget output on the frontend.
     */
    protected function render()
    {
        include 'RenderView.php';
    }
}
