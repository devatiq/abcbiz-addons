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
			'abcbiz_modern_post_grid_setting',
			[
				'label' => esc_html__( 'Settings', 'abcbiz-addons' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'abcbiz_modern_post_grid_style',
			[
				'label' => esc_html__( 'Grid Style', 'abcbiz-addons' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [
					'style1' => esc_html__( 'Style 1', 'abcbiz-addons' ),
					'style2' => esc_html__( 'Style 2', 'abcbiz-addons' ),
					'style3' => esc_html__( 'Style 3', 'abcbiz-addons' ),
				],
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