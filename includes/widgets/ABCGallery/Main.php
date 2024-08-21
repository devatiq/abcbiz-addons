<?php
namespace ABCBiz\Includes\Widgets\ABCGallery;

if (!defined('ABSPATH'))
	exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

/**
 * Elementor List Widget.
 */
class Main extends BaseWidget
{

	// define protected variables...
	protected $name = 'abcbiz-ABCGallery';
	protected $title = 'ABC Gallery';
	protected $icon = 'eicon-animation-text abcbiz-addons-icon';
	protected $categories = [
		'abcbiz-category'
	];
	protected $keywords = [
		'abc',
		'gallery',
		'image'
	];

	public function get_style_depends()
	{
		return ['abcbiz-ABCGallery'];
	}

	public function get_script_depends()
	{
		return ['abcbiz-ABCGallery-main'];
	}

	/**
	 * Register list widget controls.
	 */
	protected function register_controls()
	{

		$this->start_controls_section(
			'abcbiz_elementor_anim_text_setting',
			[
				'label' => esc_html__('Contents', 'abcbiz-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		//Notice
		$this->add_control(
			'abcbiz_elementor_anim_text_notice',
			[
				'type' => \Elementor\Controls_Manager::NOTICE,
				'notice_type' => 'warning',
				'dismissible' => false,
				'heading' => esc_html__('Notice:', 'abcbiz-addons'),
				'content' => esc_html__('To view the full animation, please check in the front end', 'abcbiz-addons'),
			]
		);

		//Heading tag
		$this->add_control(
			'abcbiz_elementor_anim_text_tag',
			[
				'label' => esc_html__('Heading Tag', 'abcbiz-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'h2',
				'options' => [
					'h1' => esc_html__('H1', 'abcbiz-addons'),
					'h2' => esc_html__('H2', 'abcbiz-addons'),
					'h3' => esc_html__('H3', 'abcbiz-addons'),
					'h4' => esc_html__('H4', 'abcbiz-addons'),
					'h5' => esc_html__('H5', 'abcbiz-addons'),
					'H6' => esc_html__('H6', 'abcbiz-addons'),
				],

			]
		);

		//Alignment
		$this->add_responsive_control(
			'abcbiz_elementor_anim_text_align',
			[
				'label' => esc_html__('Alignment', 'abcbiz-addons'),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'center',
				'options' => [
					'left' => [
						'title' => esc_html__('Left', 'abcbiz-addons'),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__('Center', 'abcbiz-addons'),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__('Right', 'abcbiz-addons'),
						'icon' => 'eicon-text-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-anim-text-area' => 'text-align: {{VALUE}}',
				],
			]
		);

		//before text
		$this->add_control(
			'abcbiz_elementor_anim_text_before',
			[
				'label' => esc_html__('Before Text', 'abcbiz-addons'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 3,
				'default' => esc_html__('ABCBiz Multi Addons is', 'abcbiz-addons'),
			]
		);

		//after text
		$this->add_control(
			'abcbiz_elementor_anim_text_after',
			[
				'label' => esc_html__('After Text', 'abcbiz-addons'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 3,
			]
		);

		//animated text
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'abcbiz_elementor_anim_text',
			[
				'label' => esc_html__('Text', 'abcbiz-addons'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Animated Text', 'abcbiz-addons'),
				'label_block' => true,
			]
		);

		$this->add_control(
			'abcbiz_elementor_anim_text_list',
			[
				'label' => esc_html__('Animated Text', 'abcbiz-addons'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'abcbiz_elementor_anim_text' => esc_html__('Awesome', 'abcbiz-addons'),
					],
					[
						'abcbiz_elementor_anim_text' => esc_html__('Creative', 'abcbiz-addons'),
					],
					[
						'abcbiz_elementor_anim_text' => esc_html__('Powerful', 'abcbiz-addons'),
					],
					[
						'abcbiz_elementor_anim_text' => esc_html__('Flexible', 'abcbiz-addons'),
					],
				],
				'title_field' => '{{{ abcbiz_elementor_anim_text }}}',
			]
		);

		//Animation Type
		$this->add_control(
			'abcbiz_elementor_anim_text_type',
			[
				'label' => esc_html__('Animation Type', 'abcbiz-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'rotate-1',
				'options' => [
					'rotate-1' => esc_html__('Rotate 1', 'abcbiz-addons'),
					'letters rotate-2' => esc_html__('Rotate 2', 'abcbiz-addons'),
					'letters rotate-3' => esc_html__('Rotate 3', 'abcbiz-addons'),
					'letters type' => esc_html__('Typing', 'abcbiz-addons'),
					'loading-bar' => esc_html__('Loading Bar', 'abcbiz-addons'),
					'slide' => esc_html__('Slide', 'abcbiz-addons'),
					'clip' => esc_html__('Clip', 'abcbiz-addons'),
					'zoom' => esc_html__('Zoom', 'abcbiz-addons'),
					'letters scale' => esc_html__('Scale', 'abcbiz-addons'),
					'push' => esc_html__('Push', 'abcbiz-addons'),
				],

			]
		);

		$this->end_controls_section();//end Anim Text contents

		//Before Text Style 
		$this->start_controls_section(
			'abcbiz_elementor_anim_text_before_style',
			[
				'label' => esc_html__('Before Text Style', 'abcbiz-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		//Color
		$this->add_control(
			'abcbiz_elementor_anim_text_before_color',
			[
				'label' => esc_html__('Before Text Color', 'abcbiz-addons'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#333333',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-anim-before-text' => 'color: {{VALUE}}',
				],
			]
		);

		//Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz_elementor_anim_text_before_typography',
				'label' => esc_html__('Before Text Typography', 'abcbiz-addons'),
				'selector' => '{{WRAPPER}} .abcbiz-anim-before-text',
			]
		);

		$this->end_controls_section();//end before text style

		//Anim Text Style 
		$this->start_controls_section(
			'abcbiz_elementor_anim_text_anim_style',
			[
				'label' => esc_html__('Animated Text Style', 'abcbiz-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		//Color
		$this->add_control(
			'abcbiz_elementor_anim_text_anim_color',
			[
				'label' => esc_html__('Animated Text Color', 'abcbiz-addons'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#b238f6',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-anim-texts b' => 'color: {{VALUE}}',
				],
			]
		);

		//Bar Color
		$this->add_control(
			'abcbiz_elementor_anim_text_anim_bar_color',
			[
				'label' => esc_html__('Animated Bar Color', 'abcbiz-addons'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#1a47e9',
				'selectors' => [
					'{{WRAPPER}} .cd-headline.loading-bar .cd-words-wrapper::after' => 'background-color: {{VALUE}}',
				],
				'condition' => [
					'abcbiz_elementor_anim_text_type' => 'loading-bar',
				],
			]
		);

		//Clip Color
		$this->add_control(
			'abcbiz_elementor_anim_text_anim_clip_color',
			[
				'label' => esc_html__('Cursor Color', 'abcbiz-addons'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#1a47e9',
				'selectors' => [
					'{{WRAPPER}} .cd-headline.clip .cd-words-wrapper::after' => 'background-color: {{VALUE}}',
				],
				'condition' => [
					'abcbiz_elementor_anim_text_type' => 'clip',
				],
			]
		);

		//Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz_elementor_anim_text_anim_typography',
				'label' => esc_html__('Animated Text Typography', 'abcbiz-addons'),
				'selector' => '{{WRAPPER}} .abcbiz-anim-texts b',
			]
		);

		//Space
		$this->add_responsive_control(
			'abcbiz_elementor_anim_text_anim_space',
			[
				'label' => esc_html__('Animated Text Gap', 'abcbiz-addons'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-anim-before-text' => 'padding-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .abcbiz-anim-after-text' => 'padding-left: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();//end anim text style

		//After Text Style 
		$this->start_controls_section(
			'abcbiz_elementor_anim_text_after_style',
			[
				'label' => esc_html__('After Text Style', 'abcbiz-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		//Color
		$this->add_control(
			'abcbiz_elementor_anim_text_after_color',
			[
				'label' => esc_html__('After Text Color', 'abcbiz-addons'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#333333',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-anim-after-text' => 'color: {{VALUE}}',
				],
			]
		);

		//Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz_elementor_anim_text_after_typography',
				'label' => esc_html__('After Text Typography', 'abcbiz-addons'),
				'selector' => '{{WRAPPER}} .abcbiz-anim-after-text',
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