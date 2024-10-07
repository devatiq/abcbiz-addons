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

        // Add control for selecting popular based on
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
	private function generate_random_color() {
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
