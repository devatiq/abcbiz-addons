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
				'description' => esc_html__('Select the title option for the gallery.', 'abcbiz-addons'),
				'options' => [
					'caption' => esc_html__('Caption', 'abcbiz-addons'),
					'title' => esc_html__('Title', 'abcbiz-addons'),
					'alt' => esc_html__('Alt', 'abcbiz-addons'),
					'description' => esc_html__('Description', 'abcbiz-addons'),
					'none' => esc_html__('None', 'abcbiz-addons'),
				],
				'default' => 'none',
			]
		);

		//close button
		$this->add_control(
			'abcbiz_elementor_gallery_close_button',
			[
				'label' => esc_html__('Close Button', 'abcbiz-addons'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Yes', 'abcbiz-addons'),
				'label_off' => esc_html__('No', 'abcbiz-addons'),
				'return_value' => 'true',
				'default' => 'true',
			]
		);

		$this->end_controls_section();

		//style for the gallary
		$this->start_controls_section(
			'abcbiz_elementor_gallery_style',
			[
				'label' => esc_html__('Style', 'abcbiz-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		//image width
		$this->add_responsive_control(
			'abcbiz_elementor_gallery_image_width',
			[
				'label' => esc_html__('Image Width', 'abcbiz-addons'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-photos-gallery span img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		//image height
		$this->add_responsive_control(
			'abcbiz_elementor_gallery_image_height',
			[
				'label' => esc_html__('Image Height', 'abcbiz-addons'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-photos-gallery span img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		//gap
		$this->add_responsive_control(
			'abcbiz_elementor_gallery_gap',
			[
				'label' => esc_html__('Gap', 'abcbiz-addons'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-photos-gallery' => 'gap: {{SIZE}}{{UNIT}};',
				],
			]
		);

		//image border radius
		$this->add_responsive_control(
			'abcbiz_elementor_gallery_image_border_radius',
			[
				'label' => esc_html__('Border Radius', 'abcbiz-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-photos-gallery span img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		//image border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'abcbiz_elementor_gallery_image_border',
				'label' => esc_html__('Border', 'abcbiz-addons'),
				'selector' => '{{WRAPPER}} .abcbiz-photos-gallery span img',
			]
		);

		$this->end_controls_section();

		//add style for popup
		$this->start_controls_section(
			'abcbiz_elementor_gallery_popup_style',
			[
				'label' => esc_html__('Popup', 'abcbiz-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		//popup image width
		$this->add_responsive_control(
			'abcbiz_elementor_gallery_popup_image_width',
			[
				'label' => esc_html__('Image Width', 'abcbiz-addons'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 2000,
					],
				],
				'selectors' => [
					'.abcbiz-photos-gallery-popup .mfp-content img.mfp-img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		//popup image height
		$this->add_responsive_control(
			'abcbiz_elementor_gallery_popup_image_height',
			[
				'label' => esc_html__('Image Height', 'abcbiz-addons'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 2000,
					],
				],
				'selectors' => [
					'.abcbiz-photos-gallery-popup .mfp-content img.mfp-img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		//popup image border radius
		$this->add_responsive_control(
			'abcbiz_elementor_gallery_popup_image_border_radius',
			[
				'label' => esc_html__('Border Radius', 'abcbiz-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'.abcbiz-photos-gallery-popup .mfp-content img.mfp-img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		//popup image border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'abcbiz_elementor_gallery_popup_image_border',
				'label' => esc_html__('Border', 'abcbiz-addons'),
				'selector' => '.abcbiz-photos-gallery-popup .mfp-content img.mfp-img',
			]
		);

		//close button color
		$this->add_control(
			'abcbiz_elementor_gallery_popup_close_button_color',
			[
				'label' => esc_html__('Close Button Color', 'abcbiz-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'.abcbiz-photos-gallery-popup button.mfp-close' => 'color: {{VALUE}};',
				],
			]
		);

		//close button size
		$this->add_responsive_control(
			'abcbiz_elementor_gallery_popup_close_button_size',
			[
				'label' => esc_html__('Close Button Size', 'abcbiz-addons'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'selectors' => [
					'.abcbiz-photos-gallery-popup button.mfp-close' => 'font-size: {{SIZE}}{{UNIT}};',
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