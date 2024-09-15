<?php
namespace ABCBiz\Includes\Widgets\ABCSlider;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Utils;


class Main extends BaseWidget
{

    // define protected variables...
    protected $name = 'abcbiz-ABCSlider';
    protected $title = 'ABC Slider';
    protected $icon = 'eicon-testimonial-carousel abcbiz-addons-icon';
    protected $categories = [
        'abcbiz-category'
    ];
    protected $keywords = [
        'abc', 'carousel', 'slider',
    ];

    public function get_script_depends()
    {
        return ['swiper', 'abcbiz-testimonial'];
    }

    public function get_style_depends()
    {
        return ['swiper'];
    }

    /**
     * Register the widget controls.
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'abcbiz_slider_setting',
            [
                'label' => esc_html__('Slider Setting', 'abcbiz-addons'),
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
        include 'RenderView.php';
    }
}