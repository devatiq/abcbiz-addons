<?php
namespace ABCBiz\Includes\Widgets\ABCCostEstimation;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;

class Main extends BaseWidget
{
    // define protected variables...
    protected $name = 'abcbiz-cost-estimation';
    protected $title = 'Cost Estimation';
    protected $icon = 'eicon-call-to-action abcbiz-addons-icon';
    protected $categories = [
        'abcbiz-category'
    ];

    protected $keywords = [
        'cost',
        'estimation',
        'cost calculator',
        'calculator'
    ];

    public function get_style_depends()
    {
        return ['abcbiz-cta-style'];
    }

    /**
     * Register the widget controls.
     */
    protected function register_controls()
    {

        // Content Tab Start
        $this->start_controls_section(
            'abcbiz_cost_calculator_content_section',
            [
                'label' => esc_html__('Pages', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'abcbiz_cost_calculator_currency',
            [
                'label' => esc_html__('Currency', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('$', 'textdomain'),
                'placeholder' => esc_html__('Input your Currency Symbol', 'textdomain'),
            ]
        );

        $this->add_control(
            'abcbiz_cost_cal_pages_list',
            [
                'label' => esc_html__('Pages List', 'textdomain'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'page_list',
                        'label' => esc_html__('Title', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('Page #1', 'textdomain'),
                    ],
                    [
                        'name' => 'abcbiz_cost_calculator_pack_1',
                        'label' => esc_html__('Package', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'abcbiz_c_p_low',
                        'options' => [
                            'abcbiz_c_p_low' => esc_html__('Low', 'textdomain'),
                            'abcbiz_c_p_medium' => esc_html__('Medium', 'textdomain'),
                            'abcbiz_c_p_high' => esc_html__('High', 'textdomain'),
                        ],
                    ],
                    [
                        'name' => 'abcbiz_cost_calculator_price_1',
                        'label' => esc_html__('Price', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::NUMBER,
                        'min' => 0,
                        'step' => 5,
                        'default' => 100,
                    ],
                    [
                        'name' => 'abcbiz_cost_calculator_pack_2',
                        'label' => esc_html__('Package', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'abcbiz_c_p_medium',
                        'options' => [
                            'abcbiz_c_p_low' => esc_html__('Low', 'textdomain'),
                            'abcbiz_c_p_medium' => esc_html__('Medium', 'textdomain'),
                            'abcbiz_c_p_high' => esc_html__('High', 'textdomain'),
                        ],
                    ],
                    [
                        'name' => 'abcbiz_cost_calculator_price_2',
                        'label' => esc_html__('Price', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::NUMBER,
                        'min' => 0,
                        'step' => 5,
                        'default' => 200,
                    ],
                    [
                        'name' => 'abcbiz_cost_calculator_pack_3',
                        'label' => esc_html__('Package', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'abcbiz_c_p_high',
                        'options' => [
                            'abcbiz_c_p_low' => esc_html__('Low', 'textdomain'),
                            'abcbiz_c_p_medium' => esc_html__('Medium', 'textdomain'),
                            'abcbiz_c_p_high' => esc_html__('High', 'textdomain'),
                        ],
                    ],
                    [
                        'name' => 'abcbiz_cost_calculator_price_3',
                        'label' => esc_html__('Price', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::NUMBER,
                        'min' => 0,
                        'step' => 5,
                        'default' => 400,
                    ],
                ],
                'default' => [
                    [
                        'page_list' => esc_html__('Page #1', 'textdomain'),
                    ],
                ],
                'title_field' => '{{{ page_list }}}',
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