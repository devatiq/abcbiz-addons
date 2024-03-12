<?php 
namespace ABCBiz\Includes\Widgets\ABCSingleImgScroll;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

/**
 * Elementor List Widget.
 */
class Main extends BaseWidget {

	    // define protected variables...
		protected $name = 'abcbiz-single-image-scroll';
		protected $title = 'ABC Single Image Scroll';
		protected $icon = 'eicon-scroll abcbiz-addons-icon';
		protected $categories = [
			'abcbiz-category'
		];		
		protected $keywords = [
			'abc', 'image', 'scroll', 'single'
		];

	/**
	 * Register list widget controls.
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'abcbiz_elementor_single_img_scroll_contents',
			[
				'label' => esc_html__( 'Contents', 'abcbiz-addons' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		//image
		$this->add_control(
			'abcbiz_elementor_single_img_scroll_image',
			[
				'label' => esc_html__( 'Choose Image', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		//size
		$this->add_group_control(
			\Elementor\Group_Control_Image_Size::get_type(),
			[
				'name' => 'thumbnail',
				'exclude' => [ 'custom' ],
				'include' => [],
				'default' => 'full',
			]
		);

		//Alt text
		$this->add_control(
			'abcbiz_elementor_single_img_scroll_alt_text',
			[
				'label' => esc_html__( 'Image Alt Text', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Abcbiz Addons', 'textdomain' ),
			]
		);

		//badge switch
		$this->add_control(
			'abcbiz_elementor_single_img_scroll_badge_switch',
			[
				'label' => esc_html__( 'Badge', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'textdomain' ),
				'label_off' => esc_html__( 'Hide', 'textdomain' ),
				'return_value' => 'yes',
				'default' => 'label_off',
			]
		);

		//Badge text
		$this->add_control(
			'abcbiz_elementor_single_img_scroll_badge_text',
			[
				'label' => esc_html__( 'Badge Text', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Abcbiz Addons', 'textdomain' ),
				'condition' => [
					'abcbiz_elementor_single_img_scroll_badge_switch' => 'yes'
				],
			]
		);

		$this->end_controls_section(); //end contents


		$this->start_controls_section(
			'abcbiz_elementor_single_img_scroll_settings',
			[
				'label' => esc_html__( 'Settings', 'abcbiz-addons' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		//image height
		$this->add_control(
			'abcbiz_elementor_single_img_scroll_image_height',
			[
				'label' => esc_html__( 'Image Height', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 100,
						'max' => 1000,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 400,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-single-img-scroll-area .abcbiz-img-scroller-container' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		//Scroll Time
		$this->add_control(
			'abcbiz_elementor_single_img_scroll_time',
			[
				'label' => esc_html__( 'Scroll Time (seconds)', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 's'],
				'range' => [
					's' => [
						'min' => 0.5,
						'max' => 100,
						'step' => 0.5,
					],
				],
				'default' => [
					'unit' => 's',
					'size' => 2,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-single-img-scroll-area .abcbiz-img-scroller-container' => 'transition-duration: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section(); //end settings

		//Image Style
		$this->start_controls_section(
			'abcbiz_elementor_single_img_scroll_style',
			[
				'label' => esc_html__( 'Image Style', 'abcbiz-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		//Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'abcbiz_elementor_single_img_scroll_border',
				'selector' => '{{WRAPPER}} .abcbiz-elementor-single-img-scroll-wrap',
			]
		);

		//Border Radius
		$this->add_control(
			'abcbiz_elementor_single_img_scroll_border_radius',
			[
				'label' => esc_html__( 'Image Border Radius', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'default' => [
					'top' => 0,
					'right' => 0,
					'bottom' => 0,
					'left' => 0,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-single-img-scroll-wrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		//Box Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'abcbiz_elementor_single_img_scroll_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'textdomain' ),
				'selector' => '{{WRAPPER}} .abcbiz-elementor-single-img-scroll-wrap',
			]
		);

		$this->end_controls_section(); //end image style

		//Badge Style
		$this->start_controls_section(
			'abcbiz_elementor_single_img_scroll_badge_style',
			[
				'label' => esc_html__( 'Badge Style', 'abcbiz-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'abcbiz_elementor_single_img_scroll_badge_switch' => 'yes'
				],
			]
		);

		//Horizontal pos
		$this->add_control(
			'abcbiz_elementor_single_img_scroll_badge_hor_pos',
			[
				'label' => esc_html__( 'Horizontal Position', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%'],
				'range' => [
					's' => [
						'min' => 10,
						'max' => 1000,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 15,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-single-img-scroll-area .abcbiz-img-scroller-badge' => 'left: {{SIZE}}{{UNIT}};',
				],
			]
		);

		//Vertical pos
		$this->add_control(
			'abcbiz_elementor_single_img_scroll_badge_ver_pos',
			[
				'label' => esc_html__( 'Vertical Position', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%'],
				'range' => [
					's' => [
						'min' => 10,
						'max' => 1000,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 15,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-single-img-scroll-area .abcbiz-img-scroller-badge' => 'top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		//Bg Color
		$this->add_control(
			'abcbiz_elementor_single_img_scroll_badge_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'rgba(0, 0, 0, 0.5)',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-single-img-scroll-area .abcbiz-img-scroller-badge' => 'background-color: {{VALUE}}',
				],
			]
		);

		//Text Color
		$this->add_control(
			'abcbiz_elementor_single_img_scroll_badge_Text_color',
			[
				'label' => esc_html__( 'Text Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-single-img-scroll-area .abcbiz-img-scroller-badge' => 'color: {{VALUE}}',
				],
			]
		);

		//Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz_elementor_single_img_scroll_badge_typography',
				'selector' => '{{WRAPPER}} .abcbiz-elementor-single-img-scroll-area .abcbiz-img-scroller-badge',
			]
		);

		//Spacing
		$this->add_control(
			'abcbiz_elementor_single_img_scroll_badge_spacing',
			[
				'label' => esc_html__( 'Spacing', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px'],
				'default' => [
					'top' => 7,
					'right' => 10,
					'bottom' => 7,
					'left' => 10,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-single-img-scroll-area .abcbiz-img-scroller-badge' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		//Border Radius
		$this->add_control(
			'abcbiz_elementor_single_img_scroll_badge__border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'default' => [
					'top' => 5,
					'right' => 5,
					'bottom' => 5,
					'left' => 5,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-single-img-scroll-area .abcbiz-img-scroller-badge' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section(); //end badge style

    }

    /**
     * Render the widget output on the frontend.
     */
    protected function render()
    {
        include 'renderview.php';
    }
}