<?php 
namespace ABCBiz\Includes\Widgets\ABCWpMenu;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;

/**
 * Elementor List Widget.
 */
class Main extends BaseWidget {

	    // define protected variables...
		protected $name = 'abcbiz-wp-menu';
		protected $title = 'ABC WordPress Menu';
		protected $icon = 'eicon-nav-menu';
		protected $categories = [
			'abcbiz-category'
		];		
		protected $keywords = [
			'abc', 'menu', 'nav',
		];

		public function get_style_depends()
		{
			return ['abcbiz-wp-menu'];
		}

	/**
	 * Register list widget controls.
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'abcbiz_elementor_wp_menu_settings',
			[
				'label' => esc_html__( 'Settings', 'abcbiz-multi' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		// Retrieve available menus
        $abcbiz_available_menus = $this->abcbiz_get_available_menus();
        if (!empty($abcbiz_available_menus)) {
            $this->add_control(
                'abcbiz_elementor_wp_menu_selection',
                [
                    'label' => esc_html__('Select Menu', 'abcbiz-multi'),
                    'type' => Controls_Manager::SELECT,
                    'options' => $abcbiz_available_menus,
                    'default' => array_key_first($abcbiz_available_menus),
                ]
            );
        } else {
            $this->add_control(
                'no_menus_message',
                [
                    'label' => esc_html__( 'No menus found', 'abcbiz-multi' ),
                    'type' => Controls_Manager::RAW_HTML,
                    'raw' => esc_html__( 'There are no menus currently available. Please create a menu in WordPress.', 'abcbiz-multi' ),
                    'separator' => 'after',
                ]
            );
        }

        $this->end_controls_section();
	}



     /**
     * Get the available menus in WordPress.
     */
    public function abcbiz_get_available_menus() {
        $menus = wp_get_nav_menus();
        $options = [];
        foreach ($menus as $menu) {
            $options[$menu->slug] = $menu->name;
        }
        return $options;
    }


    /**
     * Render the widget output on the frontend.
     */
    protected function render()
    {
        include 'renderview.php';
    }
}