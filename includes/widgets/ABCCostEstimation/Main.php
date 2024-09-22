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

        $this->start_controls_section(
            'abcbiz_cost_estimation_setting',
            [
                'label' => esc_html__('Contents', 'abcbiz-addons'),
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