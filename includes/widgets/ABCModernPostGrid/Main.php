<?php 
namespace ABCBiz\Includes\Widgets\ABCModernPostGrid;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

/**
 * Elementor List Widget.
 */
class Main extends BaseWidget {

	    // define protected variables...
		protected $name = 'abcbiz-modern-post-grid';
		protected $title = 'Modern Post Grid';		
		protected $icon = 'eicon-posts-grid abcbiz-addons-icon';
		protected $categories = [
			'abcbiz-category'
		];		
		protected $keywords = [
			'abc', 'post', 'grid', 'modern', 'post grid', 'modern post grid'
		];

	/**
	 * Register list widget controls.
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'abcbiz_elementor_anim_text_setting',
			[
				'label' => esc_html__( 'Contents', 'abcbiz-addons' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		

	   $this->end_controls_section();//end after text style

    }

    /**
     * Render the widget output on the frontend.
     */
    protected function render()
    {
        include 'renderview.php';
    }
}