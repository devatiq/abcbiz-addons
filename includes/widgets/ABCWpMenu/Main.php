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
		protected $icon = 'eicon-nav-menu abcbiz-multi-icon';
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

		public function get_script_depends()
    {
        return ['abcbiz-wp-menu-js'];
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
		$this->add_responsive_control(
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
		$this->add_responsive_control(
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
		$this->add_responsive_control(
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
		$this->add_responsive_control(
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

		//Drop Down Style
		$this->start_controls_section(
			'abcbiz_elementor_wp_menu_sub_menu_style',
			[
				'label' => esc_html__( 'Sub Menu Style', 'abcbiz-multi' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		//typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz_elementor_wp_sub_menu_typography',
				'label' => esc_html__( 'Sub Menu Typography', 'abcbiz-multi' ),
				'selector' => '{{WRAPPER}} .abcbiz-wp-menu-container ul ul li a',
			]
		);

		//Sub Menu Width
		$this->add_responsive_control(
			'abcbiz_elementor_wp_menu_sub_menu_width',
			[
				'label' => esc_html__( 'Sub Menu Width', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 100,
						'max' => 500,
						'step' => 5,
					],

				],
				'default' => [
					'unit' => 'px',
					'size' => 220,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-wp-menu-container ul ul' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		//Sub Menu Item Spacing
		$this->add_responsive_control(
			'abcbiz_elementor_wp_menu_sub_menu_item_spacing',
			[
				'label' => esc_html__( 'Sub Menu Item Spacing', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 25,
						'step' => 1,
					],

				],
				'default' => [
					'unit' => 'px',
					'size' => 5,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-wp-menu-container ul ul li a' => 'padding-top: {{SIZE}}{{UNIT}}; padding-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		//Border Top Color
		$this->add_control(
			'abcbiz_elementor_wp_menu_sub_menu_top_border_color',
			[
				'label' => esc_html__( 'Top Border Color', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#813eee',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-wp-menu-container ul ul' => 'border-color: {{VALUE}}',
				],
			]
		);

		//Background Color
		$this->add_control(
			'abcbiz_elementor_wp_menu_drop_down_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#efeeef',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-wp-menu-container ul ul li' => 'background-color: {{VALUE}}',
				],
			]
		);

		//Text Color
		$this->add_control(
			'abcbiz_elementor_wp_menu_drop_down_text_color',
			[
				'label' => esc_html__( 'Text Color', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#222222',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-wp-menu-container ul ul li a' => 'color: {{VALUE}}',
				],
			]
		);


		//Background Hover Color
		$this->add_control(
			'abcbiz_elementor_wp_menu_drop_down_bg_hover_color',
			[
				'label' => esc_html__( 'Hover Background Color', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ede4ed',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-wp-menu-container ul ul li:hover' => 'background-color: {{VALUE}}',
				],
			]
		);

		//Text Color
		$this->add_control(
			'abcbiz_elementor_wp_menu_drop_down_text_hov_color',
			[
				'label' => esc_html__( 'Hover Text Color', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#222222',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-wp-menu-container ul ul li:hover a' => 'color: {{VALUE}}',
				],
			]
		);

		//Sub Menu Item Spacing
		$this->add_responsive_control(
			'abcbiz_elementor_wp_menu_sub_menu_icon_size',
			[
				'label' => esc_html__( 'Sub Menu Icon Size', 'abcbiz-multi' ),
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
					'size' => 16,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-wp-menu-container ul ul li .abcbiz-submenu-icon svg' => 'width: {{SIZE}}{{UNIT}} !important; height: {{SIZE}}{{UNIT}} !important;',
				],
			]
		);

		//Icon Color
		$this->add_control(
			'abcbiz_elementor_wp_menu_sub_menu_icon_color',
			[
				'label' => esc_html__( 'Sub Menu Icon Color', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#222222',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-wp-menu-container ul ul li .abcbiz-submenu-icon svg' => 'fill: {{VALUE}}',
				],
			]
		);

		//Icon Hover Color
		$this->add_control(
			'abcbiz_elementor_wp_menu_sub_menu_icon_hov_color',
			[
				'label' => esc_html__( 'Icon Hover Color', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#222222',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-wp-menu-container ul ul li:hover .abcbiz-submenu-icon svg' => 'fill: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();//end sub menu

		//Mobile Menu Style
		$this->start_controls_section(
			'abcbiz_elementor_wp_menu_mob_style',
			[
				'label' => esc_html__( 'Mobile Menu Style', 'abcbiz-multi' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		//Alignment
		$this->add_responsive_control(
			'abcbiz_elementor_wp_menu_ham_icon_align',
			[
				'label' => esc_html__( 'Icon Alignment', 'abcbiz-multi'),
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
					'{{WRAPPER}} .abcbiz-mob-menu-icon-wrap' => 'justify-content: {{VALUE}}',
				],
			]
		);


		//Mob nav icon size
		$this->add_responsive_control(
			'abcbiz_elementor_wp_menu_mob_nav_icon_size',
			[
				'label' => esc_html__( 'Nav Icon Size', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 100,
						'step' => 1,
					],

				],
				'default' => [
					'unit' => 'px',
					'size' => 32,
				],
				'selectors' => [
					'{{WRAPPER}} #abcbiz-responsive-menu svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		//mob nav icon position
		$this->add_responsive_control(
			'abcbiz_elementor_wp_menu_mob_nav_icon_position',
			[
				'label' => esc_html__( 'Icon Spacing', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px'],
				'default' => [
					'top' => 0,
					'right' => 0,
					'bottom' => 0,
					'left' => 0,
					'unit' => 'px',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} #abcbiz-responsive-menu' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		//Icon Color
		$this->add_control(
			'abcbiz_elementor_wp_menu_mob_nav_icon_color',
			[
				'label' => esc_html__( 'Nav Icon Color', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#6146ec',
				'selectors' => [
					'{{WRAPPER}} #abcbiz-responsive-menu svg' => 'fill: {{VALUE}}',
				],
			]
		);

		//Top Border Color
		$this->add_control(
			'abcbiz_elementor_wp_menu_mob_top_border_color',
			[
				'label' => esc_html__( 'Menu Top Border Color', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#6146ec',
				'selectors' => [
					'{{WRAPPER}} #abcbiz-mobilemenu' => 'border-top-color: {{VALUE}}',
				],
			]
		);

		//Menu BG Color
		$this->add_control(
			'abcbiz_elementor_wp_menu_mob_menu_bg_color',
			[
				'label' => esc_html__( 'Mobile Menu BG Color', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} #abcbiz-mobilemenu' => 'background-color: {{VALUE}}',
				],
			]
		);

		//mob menu typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz_elementor_wp_menu_mob_typography',
				'label' => esc_html__( 'Mob Menu Typography', 'abcbiz-multi' ),
				'selector' => '{{WRAPPER}} #abcbiz-mobilemenu ul li a',
			]
		);

		//Top Border Color
		$this->add_control(
			'abcbiz_elementor_wp_menu_mob_text_color',
			[
				'label' => esc_html__( 'Menu Text Color', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#333333',
				'selectors' => [
					'{{WRAPPER}} #abcbiz-mobilemenu ul li a' => 'color: {{VALUE}}',
				],
			]
		);

		//mob menu item spacing
		$this->add_responsive_control(
			'abcbiz_elementor_wp_menu_mob_item_spacing',
			[
				'label' => esc_html__( 'Menu Item Spacing', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px'],
				'default' => [
					'top' => 6,
					'right' => 15,
					'bottom' => 6,
					'left' => 15,
					'unit' => 'px',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} #abcbiz-mobilemenu ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		//Top Border Color
		$this->add_control(
			'abcbiz_elementor_wp_menu_mob_item_border_color',
			[
				'label' => esc_html__( 'Item Separator Color', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ededed',
				'selectors' => [
					'{{WRAPPER}} #abcbiz-mobilemenu ul li' => 'border-bottom-color: {{VALUE}}',
				],
			]
		);

		//Sub Toggle Bg Color
		$this->add_control(
			'abcbiz_elementor_wp_menu_mob_sub_toggle_color',
			[
				'label' => esc_html__( 'Sub Toggle BG Color', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#6146ec',
				'selectors' => [
					'{{WRAPPER}} #abcbiz-mobilemenu .sub-toggle' => 'background-color: {{VALUE}}',
				],
			]
		);

		//Sub Toggle Size
		$this->add_responsive_control(
			'abcbiz_elementor_wp_menu_mob_sub_toggle_size',
			[
				'label' => esc_html__( 'Sub Toggle Size', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 100,
						'step' => 1,
					],

				],
				'default' => [
					'unit' => 'px',
					'size' => 30,
				],
				'selectors' => [
					'{{WRAPPER}} #abcbiz-mobilemenu .sub-toggle' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		//Sub Toggle Position
		$this->add_responsive_control(
			'abcbiz_elementor_wp_menu_mob_sub_toggle_position',
			[
				'label' => esc_html__( 'Sub Toggle Position', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 30,
						'step' => 1,
					],

				],
				'default' => [
					'unit' => 'px',
					'size' => 3,
				],
				'selectors' => [
					'{{WRAPPER}} #abcbiz-mobilemenu .sub-toggle' => 'top: {{SIZE}}{{UNIT}};',
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