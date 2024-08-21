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
			'abcbiz_elementor_gallery_setting',
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

	}

	/**
	 * Render the widget output on the frontend.
	 */
	protected function render()
	{
		include 'renderview.php';
	}
}