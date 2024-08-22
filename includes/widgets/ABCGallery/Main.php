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
		return ['abcbiz-magnific-popup'];
	}

	public function get_script_depends()
	{
		return ['abcbiz-magnific-popup'];
	}

	/**
	 * Register list widget controls.
	 */
	protected function register_controls()
	{

		$this->start_controls_section(
			'abcbiz_elementor_gallery_contents',
			[
				'label' => esc_html__('Contents', 'abcbiz-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'abcbiz_elementor_gallery',
			[
				'label' => esc_html__( 'Add Images', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'show_label' => true,
				'default' => [],
			]
		);

		$this->end_controls_section();//end after text style

		$this->start_controls_section(
			'abcbiz_elementor_gallery_setting',
			[
				'label' => esc_html__('Options', 'abcbiz-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		//column
		$this->add_responsive_control(
			'abcbiz_elementor_gallery_column',
			[
				'label' => esc_html__('Column', 'abcbiz-addons'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'1' => esc_html__('1', 'abcbiz-addons'),
					'2' => esc_html__('2', 'abcbiz-addons'),
					'3' => esc_html__('3', 'abcbiz-addons'),
					'4' => esc_html__('4', 'abcbiz-addons'),
					'5' => esc_html__('5', 'abcbiz-addons'),
					'6' => esc_html__('6', 'abcbiz-addons'),
				],
				'default' => '3',
				'tablet_default' => '2',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-photos-gallery' => 'grid-template-columns: repeat({{VALUE}}, 1fr);',
				],
			]
		);

		//show title select options
		$this->add_responsive_control(
			'abcbiz_elementor_gallery_title',
			[
				'label' => esc_html__('Show Title', 'abcbiz-addons'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'caption' => esc_html__('Caption', 'abcbiz-addons'),
					'title' => esc_html__('Title', 'abcbiz-addons'),
					'alt' => esc_html__('Alt', 'abcbiz-addons'),
					'description' => esc_html__('Description', 'abcbiz-addons'),
					'none' => esc_html__('None', 'abcbiz-addons'),
				],
				'default' => 'caption',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-photos-gallery' => 'grid-template-columns: repeat({{VALUE}}, 1fr);',
				],
			]
		);
	


		$this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 */
	protected function render()
	{
		include 'renderview.php';
	}
}