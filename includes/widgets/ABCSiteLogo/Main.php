<?php
namespace ABCBiz\Includes\widgets\ABCSiteLogo;

// If this file is called directly, abort!!!
defined('ABSPATH') or die('This is not the place you deserve!');

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

class Main extends BaseWidget {

    protected $name = 'abcbiz-site-logo';
    protected $title = 'ABC Site Logo';
    protected $icon = 'eicon-logo abcbiz-addons-icon';
    protected $categories = [
        'abcbiz-category'
    ];
    protected $keywords = [
        'abc', 'logo', 'site'
    ];

    protected function register_controls() {
        $this->start_controls_section(
            'abcbiz-elementor-site-logo-content',
            [
                'label' => esc_html__( 'Contents', 'abcbiz-addons' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->end_controls_section();//end content
    }

    protected function render() {      
		include 'renderview.php';
    }
}