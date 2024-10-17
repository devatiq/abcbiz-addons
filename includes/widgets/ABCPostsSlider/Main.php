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
        return ['swiper', 'abcbiz-posts-sliders'];
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

    private function post_date_icon()
    {
        ?>

        <svg id="fi_2948088" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512"
            xmlns="http://www.w3.org/2000/svg">
            <g>
                <path
                    d="m446 40h-46v-24c0-8.836-7.163-16-16-16s-16 7.164-16 16v24h-224v-24c0-8.836-7.163-16-16-16s-16 7.164-16 16v24h-46c-36.393 0-66 29.607-66 66v340c0 36.393 29.607 66 66 66h380c36.393 0 66-29.607 66-66v-340c0-36.393-29.607-66-66-66zm-380 32h46v16c0 8.836 7.163 16 16 16s16-7.164 16-16v-16h224v16c0 8.836 7.163 16 16 16s16-7.164 16-16v-16h46c18.748 0 34 15.252 34 34v38h-448v-38c0-18.748 15.252-34 34-34zm380 408h-380c-18.748 0-34-15.252-34-34v-270h448v270c0 18.748-15.252 34-34 34z">
                </path>
            </g>
        </svg>
        <?php
    }

    /**
     * Render the widget output on the frontend.
     */
    protected function render()
    {
        include 'renderview.php';
    }
}