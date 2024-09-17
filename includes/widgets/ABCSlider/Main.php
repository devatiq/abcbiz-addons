<?php
namespace ABCBiz\Includes\Widgets\ABCSlider;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Plugin;


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
        'abc',
        'carousel',
        'slider',
    ];

    public function get_script_depends()
    {
        return ['swiper'];
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

        // Fetch Elementor templates
        $templates = Plugin::instance()->templates_manager->get_source('local')->get_items();

        $template_options = [];
        if (!empty($templates)) {
            foreach ($templates as $template) {
                $template_options[$template['template_id']] = $template['title'];
            }
        }

        // Add a select control for Elementor templates
        $this->add_control(
            'template_select',
            [
                'label' => esc_html__('Choose Elementor Template', 'abcbiz-addons'),
                'type' => Controls_Manager::SELECT2,
                'options' => $template_options,
                'default' => '',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'slides_per_view',
            [
                'label' => esc_html__('Slides Per View', 'abcbiz-addons'),
                'type' => Controls_Manager::NUMBER,
                'default' => 3,
            ]
        );

        $this->add_control(
            'loop',
            [
                'label' => esc_html__('Loop', 'abcbiz-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'abcbiz-addons'),
                'label_off' => esc_html__('No', 'abcbiz-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'label' => esc_html__('Autoplay', 'abcbiz-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'abcbiz-addons'),
                'label_off' => esc_html__('No', 'abcbiz-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
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