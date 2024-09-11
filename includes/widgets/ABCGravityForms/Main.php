<?php

namespace ABCBiz\Includes\Widgets\ABCGravityForms;

use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class Main extends \Elementor\Widget_Base
{

    private $settings;

    public function get_name()
    {
        return 'abcbiz-ABCGravityForms';
    }

    public function get_title()
    {
        return __('ABC Gravity Forms', 'abcbiz-addons');
    }

    public function get_icon()
    {
        return 'eicon-mail';
    }

    public function get_categories()
    {
        return ['abcbiz-category'];
    }


    protected function register_controls()
    {
        
        $this->start_controls_section(
            'abcbiz_gravity_form_section',
            [
                'label' => __('Gravity Form', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $options = array();
    
        $this->add_control(
            'abcbiz_gf_form_id',
            [
                'label' => esc_html__('Select Form', 'abcbiz-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => $options,
                'default' => 0,
                'description' => esc_html__('Select the Gravity Form you want to use', 'abcbiz-addons')
            ]
        );



        $this->end_controls_section();

    }

  
    protected function render()
    {
      include 'renderview.php';
    }
}