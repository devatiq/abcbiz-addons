<?php
namespace ABCBiz\Includes\Widgets\ABCPostsSlider;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Background;

class Main extends BaseWidget
{

    // define protected variables...
    protected $name = 'abcbiz-posts-slider';
    protected $title = 'ABC Posts Slider';
    protected $icon = 'eicon-posts-grid abcbiz-addons-icon';
    protected $categories = [
        'abcbiz-category'
    ];
    protected $keywords = [
        'slider',
        'posts',
    ];

    //dependency scripts
    public function get_script_depends()
    {
        return ['swiper','abcbiz-posts-sliders'];
    }


    public function get_style_depends()
    {
        return ['swiper'];
    }


    /**
     * Register the widget controls.
     *
     * Add input fields to allow the user to customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {
        // Add a control for the number of posts to fetch
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Settings', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

      

        $this->end_controls_section();

    }


    /**
     * Render the widget output on the frontend.
     */
    protected function render()
    {
        include 'renderview.php';
    }
}