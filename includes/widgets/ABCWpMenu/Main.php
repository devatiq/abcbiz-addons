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


		//Alignment
		$this->add_responsive_control(
			'abcbiz_elementor_wp_menu_align',
			[
				'label' => esc_html__( 'Alignment', 'abcbiz-multi'),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'flex-end',
				'options' => [
					'flex-start'    => [
						'title' => esc_html__( 'Left', 'abcbiz-multi' ),
						'icon' => 'eicon-text-align-left',
					],
					'center'    => [
						'title' => esc_html__( 'Center', 'abcbiz-multi' ),
						'icon' => 'eicon-text-align-center',
					],
				
					'flex-end' => [
						'title' => esc_html__( 'Right', 'abcbiz-multi' ),
						'icon' => 'eicon-text-align-right',
					],
				],				
				'selectors' => [
					'{{WRAPPER}} .abcbiz-wp-menu-container' => 'justify-content: {{VALUE}}',
				],
			]
		);

		//Menu Height
		$this->add_control(
			'abcbiz_elementor_wp_menu_height',
			[
				'label' => esc_html__( 'Menu Height', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 20,
						'max' => 200,
						'step' => 5,
					],

				],
				'default' => [
					'unit' => 'px',
					'size' => 60,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-wp-menu-container' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();

		//Style
		$this->start_controls_section(
			'abcbiz_elementor_wp_menu_style',
			[
				'label' => esc_html__( 'Menu Style', 'abcbiz-multi' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		//typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz_elementor_wp_menu_typography',
				'selector' => '{{WRAPPER}} .abcbiz-wp-menu-container > ul > li > a',
			]
		);

		//Text Color
		$this->add_control(
			'abcbiz_elementor_wp_menu_color',
			[
				'label' => esc_html__( 'Text Color', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#222222',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-wp-menu-container > ul > li > a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .abcbiz-wp-menu-container ul li .abcbiz-submenu-icon svg' => 'fill: {{VALUE}}',
				],
			]
		);

		//Text Hover Color
		$this->add_control(
			'abcbiz_elementor_wp_menu_hov_color',
			[
				'label' => esc_html__( 'Text Hover Color', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#0a78d1',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-wp-menu-container > ul > li > a:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .abcbiz-wp-menu-container ul li:hover .abcbiz-submenu-icon svg' => 'fill: {{VALUE}}',
				],
			]
		);

		//Text Active Color
		$this->add_control(
			'abcbiz_elementor_wp_menu_active_color',
			[
				'label' => esc_html__( 'Text Active Color', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#6C36DF',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-wp-menu-container > ul > li.current-menu-item > a, {{WRAPPER}} .abcbiz-wp-menu-container > ul > li.current_page_item > a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .abcbiz-wp-menu-container > ul > li.current-menu-item > a, {{WRAPPER}} .abcbiz-wp-menu-container > ul > li.current_page_ancestor > a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .abcbiz-wp-menu-container ul li.current_page_item .abcbiz-submenu-icon svg' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .abcbiz-wp-menu-container ul li.current_page_ancestor .abcbiz-submenu-icon svg' => 'fill: {{VALUE}}',
				],
			]
		);

		//Menu Spacing
		$this->add_control(
			'abcbiz_elementor_wp_menu_item_spacing',
			[
				'label' => esc_html__( 'Menu Item Spacing', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 50,
						'step' => 1,
					],

				],
				'default' => [
					'unit' => 'px',
					'size' => 17,
				],
				'selectors' => [
					'.abcbiz-wp-menu-container > ul > li > a ' => 'padding-left: {{SIZE}}{{UNIT}}!important; padding-right: {{SIZE}}{{UNIT}}!important;',
				],
			]
		);

		//DropDown Icon Size
		$this->add_control(
			'abcbiz_elementor_wp_menu_drop_down_icon_size',
			[
				'label' => esc_html__( 'Dropdown Icon Size', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 50,
						'step' => 1,
					],

				],
				'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-wp-menu-container ul li .abcbiz-submenu-icon svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		//DropDown Icon Position
		$this->add_control(
			'abcbiz_elementor_wp_menu_drop_down_icon_position',
			[
				'label' => esc_html__( 'Icon Position', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => -50,
						'max' => 50,
						'step' => 1,
					],

				],
				'default' => [
					'unit' => 'px',
					'size' => -10,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-wp-menu-container ul li .abcbiz-submenu-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);

		//Separator Color
		$this->add_control(
			'abcbiz_elementor_wp_menu_separator_color',
			[
				'label' => esc_html__( 'Separator Color', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#c4c4c1',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-wp-menu-container ul li:after' => 'border-color: {{VALUE}}',
				],
			]
		);


	

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