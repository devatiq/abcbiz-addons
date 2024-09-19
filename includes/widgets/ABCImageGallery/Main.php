<?php
namespace ABCBiz\Includes\Widgets\ABCImageGallery;

if (!defined('ABSPATH'))
	exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;

/**
 * Elementor List Widget.
 */
class Main extends BaseWidget
{

	// define protected variables...
	protected $name = 'abcbiz-ABCImageGallery';
	protected $title = 'ABC Image Gallery';
	protected $icon = 'eicon-gallery-grid abcbiz-addons-icon';
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
				'label' => esc_html__('Add Images', 'abcbiz-addons'),
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

		$this->add_group_control(
			\Elementor\Group_Control_Image_Size::get_type(),
			[
				'name' => 'gallery_image', // Unique name for the control
				'default' => 'full', // Set a default image size, e.g., 'full'
				'exclude' => [], // You can exclude some image sizes if needed
				'include' => [], // You can specify which sizes to include
				'description' => esc_html__('Choose the image size or set custom dimensions.', 'abcbiz-addons'),
			]
		);
		

		$this->end_controls_section();//end options setting


		$this->start_controls_section(
			'abcbiz_elementor_gallery_popup_setting',
			[
				'label' => esc_html__('Popup Settings', 'abcbiz-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		//show title select options
		$this->add_responsive_control(
			'abcbiz_elementor_gallery_title',
			[
				'label' => esc_html__('Show Title', 'abcbiz-addons'),
				'type' => Controls_Manager::SELECT,
				'description' => esc_html__('Choose which text to show in the popup.', 'abcbiz-addons'),
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

		//close Icon
		$this->add_control(
			'abcbiz_elementor_gallery_close_button',
			[
				'label' => esc_html__('Display Close Icon?', 'abcbiz-addons'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Yes', 'abcbiz-addons'),
				'label_off' => esc_html__('No', 'abcbiz-addons'),
				'description' => esc_html__('Enable or disable the close icon for the popup.', 'abcbiz-addons'),
				'return_value' => 'true',
				'default' => 'true',
			]
		);

		$this->add_control(
			'abcbiz_elementor_gallery_btn_inside',
			[
				'label' => esc_html__('Button Inside', 'abcbiz-addons'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Yes', 'abcbiz-addons'),
				'label_off' => esc_html__('No', 'abcbiz-addons'),
				'description' => esc_html__('Choose whether the button will be inside or outside in the popup. if yes the close button will be inside', 'abcbiz-addons'),
				'return_value' => 'true',
				'default' => 'true',
				'condition' => [
					'abcbiz_elementor_gallery_close_button' => 'true',
				],
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
				'label' => esc_html__('Close Icon Color', 'abcbiz-addons'),
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
				'label' => esc_html__('Close Icon Size', 'abcbiz-addons'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'selectors' => [
					'.abcbiz-photos-gallery-popup button.mfp-close' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section(); // end: Section


		//add style for navigation
		$this->start_controls_section(
			'abcbiz_elementor_gallery_popup_navigation_style',
			[
				'label' => esc_html__('Popup Navigation', 'abcbiz-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'abcbiz_elementor_gallery_popup_navigation_size',
			[
				'label' => esc_html__('Size', 'abcbiz-addons'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'selectors' => [
					'.abcbiz-photos-gallery-popup .mfp-arrow svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'abcbiz_elementor_gallery_popup_navigation_color',
			[
				'label' => esc_html__('Color', 'abcbiz-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'.abcbiz-photos-gallery-popup .mfp-arrow svg' => 'fill: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section(); // end: Section
	}

	/**
	 * Render the widget output on the frontend.
	 */
	protected function render()
	{
		include 'renderview.php';
	}
}