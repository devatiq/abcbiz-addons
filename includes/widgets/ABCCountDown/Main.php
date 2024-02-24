<?php 
namespace ABCBiz\Includes\Widgets\ABCCountDown;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

/**
 * Elementor List Widget.
 */
class Main extends BaseWidget {

	    // define protected variables...
		protected $name = 'abcbiz-count-down';
		protected $title = 'ABC Count Down';
		protected $icon = 'eicon-countdown abcbiz-addons-icon';
		protected $categories = [
			'abcbiz-category'
		];		
		protected $keywords = [
			'abc', 'count', 'down'
		];

		public function get_script_depends()
    {
        return ['']; 
    }

	/**
	 * Register list widget controls.
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'abcbiz_elementor_count_down_setting',
			[
				'label' => esc_html__( 'Settings', 'abcbiz-addons' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		//Date/time
		$this->add_control(
			'abcbiz_elementor_count_down_timer',
			[
				'label' => esc_html__( 'Due Date', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DATE_TIME,
			]
		);

		$this->end_controls_section();//end style section

    }

    /**
     * Render the widget output on the frontend.
     */
    protected function render()
    {
        include 'renderview.php';
    }
}