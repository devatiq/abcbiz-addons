<?php 
namespace ABCBiz\Includes\Widgets\ABCAnimText;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

/**
 * Elementor List Widget.
 */
class Main extends BaseWidget {

	    // define protected variables...
		protected $name = 'abcbiz-anim-text';
		protected $title = 'ABC Animated Text';
		protected $icon = 'eicon-animation-text abcbiz-addons-icon';
		protected $categories = [
			'abcbiz-category'
		];		
		protected $keywords = [
			'abc', 'animated', 'text'
		];

		public function get_style_depends()
    {
        return ['abcbiz-anim-text'];
    }

		public function get_script_depends()
    {
        return ['abcbiz-anim-text-main', 'abcbiz-modernizr']; 
    }

	/**
	 * Register list widget controls.
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'abcbiz_elementor_anim_text_setting',
			[
				'label' => esc_html__( 'Settings', 'abcbiz-addons' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		

		$this->end_controls_section();//end Anim Text Setting

    }

    /**
     * Render the widget output on the frontend.
     */
    protected function render()
    {
        include 'renderview.php';
    }
}