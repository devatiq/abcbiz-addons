<?php
namespace ABCBiz\Includes\Widgets\ABCModernPostGrid;

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
	protected $name = 'abcbiz-modern-post-grid';
	protected $title = 'Modern Post Grid';
	protected $icon = 'eicon-posts-grid abcbiz-addons-icon';
	protected $categories = [
		'abcbiz-category'
	];
	protected $keywords = [
		'abc',
		'post',
		'grid',
		'modern',
		'post grid',
		'modern post grid'
	];

	/**
	 * Get all available post types.
	 */
	protected function get_post_types()
	{
		$post_types = get_post_types(
			[
				'public' => true,
			],
			'objects'
		);
		$exclude = ['attachment']; // Post types to exclude

		$options = [];
		foreach ($post_types as $post_type) {
			if (!in_array($post_type->name, $exclude)) {
				$options[$post_type->name] = $post_type->label;
			}
		}
		return $options;
	}

	/**
	 * Get all available categories.
	 */
	protected function get_categories_list()
	{
		$categories = get_categories();
		$options = [];
		foreach ($categories as $category) {
			$options[$category->term_id] = $category->name;
		}
		return $options;
	}

	/**
	 * Get all available posts.
	 */
	protected function get_posts()
	{
		$posts = get_posts([
			'post_type' => 'post',
			'posts_per_page' => -1
		]);
		$options = [];
		foreach ($posts as $post) {
			$options[$post->ID] = $post->post_title;
		}
		return $options;
	}
	/**
	 * Register list widget controls.
	 */
	protected function register_controls()
	{

		$this->start_controls_section(
			'abcbiz_modern_post_grid_setting',
			[
				'label' => esc_html__('Settings', 'abcbiz-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		// Add control for selecting grid style
		$this->add_control(
			'abcbiz_modern_post_grid_style',
			[
				'label' => esc_html__('Grid Style', 'abcbiz-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [
					'style1' => esc_html__('Style 1', 'abcbiz-addons'),
					'style2' => esc_html__('Style 2', 'abcbiz-addons'),
					'style3' => esc_html__('Style 3', 'abcbiz-addons'),
					'style4' => esc_html__('Style 4', 'abcbiz-addons'),
					'style5' => esc_html__('Style 5', 'abcbiz-addons'),
				],
			]
		);

		// Add control for selecting post types
		$this->add_control(
			'post_types',
			[
				'label' => esc_html__('Post Types', 'abcbiz-addons'),
				'type' => Controls_Manager::SELECT,
				'options' => $this->get_post_types(),
				'default' => ['post'], // Default to 'post' type
				'description' => esc_html__('Select specific post types to display', 'abcbiz-addons'),
				//'label_block' => true,				
			]
		);

		// Add control for customizing the post display based on categories or specific posts
		$this->add_control(
			'customized_posts_selection',
			[
				'label' => esc_html__('Customize Post Display', 'abcbiz-addons'),
				'description' => esc_html__('Choose how to customize the posts displayed on your grid. You can select to display posts by categories or specific posts.', 'abcbiz-addons'),
				'type' => Controls_Manager::SELECT,
				'multiple' => false,
				'options' => [
					'' => esc_html__('None', 'abcbiz-addons'), // Default to no selection
					'categories' => esc_html__('Display by Categories', 'abcbiz-addons'),
					'specific_posts' => esc_html__('Display Specific Posts', 'abcbiz-addons'),
				],
				'condition' => [
					'post_types' => 'post',
				],
			]
		);

		// Add control for selecting categories
		$this->add_control(
			'get_categories',
			[
				'label' => esc_html__('Categories', 'abcbiz-addons'),
				'type' => Controls_Manager::SELECT2,
				'description' => esc_html__('Select specific categories to display', 'abcbiz-addons'),
				'multiple' => true,
				'options' => $this->get_categories_list(),
				'label_block' => true,
				'condition' => [
					'customized_posts_selection' => 'categories',
				],
			]
		);

		// Add control for selecting specific posts
		$this->add_control(
			'get_posts_list',
			[
				'label' => esc_html__('Display Specific Posts', 'abcbiz-addons'),
				'description' => esc_html__('Select specific posts to display', 'abcbiz-addons'),
				'type' => Controls_Manager::SELECT2,
				'multiple' => true,
				'options' => $this->get_posts(),
				'label_block' => true,
				'condition' => [
					'customized_posts_selection' => 'specific_posts',
				],
			]
		);

		// Add control for ignoring sticky posts
		$this->add_control(
			'ignore_sticky_posts',
			[
				'label' => esc_html__('Ignore Sticky Posts', 'abcbiz-addons'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Yes', 'abcbiz-addons'),
				'label_off' => esc_html__('No', 'abcbiz-addons'),
				'return_value' => 'true',
				'default' => 'true',
				'description' => esc_html__('Enable this option to ignore sticky posts in the post query.', 'abcbiz-addons'),
			]
		);
		// Add control for limiting the number of posts (max 4)
		$this->add_control(
			'post_limit_for_style2',
			[
				'label' => esc_html__('Number of Posts to Display', 'abcbiz-addons'),
				'type' => Controls_Manager::NUMBER,
				'default' => 4,
				'min' => 2,
				'max' => 4,
				'description' => esc_html__('Set the number of posts to display, maximum is 4.', 'abcbiz-addons'),
				'condition' => [
					'abcbiz_modern_post_grid_style' => 'style2',
				],
			]
		);
		// Add control for limiting the number of posts (max 4)
		$this->add_control(
			'post_limit',
			[
				'label' => esc_html__('Number of Posts to Display', 'abcbiz-addons'),
				'type' => Controls_Manager::NUMBER,
				'default' => 4,
				'min' => 2,
				'description' => esc_html__('Set the number of posts to display', 'abcbiz-addons'),
				'condition' => [
					'abcbiz_modern_post_grid_style!' => 'style2',
				]
			]
		);
		// Add control for displaying post info
		$this->add_control(
			'post_info_switch',
			[
				'label' => esc_html__('Display Post Info', 'abcbiz-addons'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Yes', 'abcbiz-addons'),
				'label_off' => esc_html__('No', 'abcbiz-addons'),
				'return_value' => 'true',
				'default' => 'true',
				'description' => esc_html__('Enable this option to display post info such as date, author, category and comments.', 'abcbiz-addons'),
			]
		);
		// Add control for selecting post info to display
		$this->add_control(
			'post_info_display',
			[
				'label' => esc_html__('Select Post Info to Display', 'abcbiz-addons'),
				'type' => Controls_Manager::SELECT2,
				'description' => esc_html__('Select which post info (date, author, comments) should be displayed in the post card.', 'abcbiz-addons'),
				'multiple' => true,
				'options' => [
					'date' => esc_html__('Date', 'abcbiz-addons'),
					'author' => esc_html__('Author', 'abcbiz-addons'),
					'comments' => esc_html__('Comments', 'abcbiz-addons'),
				],
				'default' => ['date', 'author'],
				'label_block' => true,
				'condition' => [
					'post_info_switch' => 'true',
				],
			]
		);

		$this->end_controls_section();//end after text style

		// Start style section
		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__('Style', 'abcbiz-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		// Typography control for title
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__('Title Typography', 'abcbiz-addons'),
				'selector' => '{{WRAPPER}} .abcbiz-modern-sps4-title h3',
				'condition' => [
					'abcbiz_modern_post_grid_style!' => 'style2',
				]
			]
		);
		// Color control for title
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__('Title Color', 'abcbiz-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abcbiz-modern-sps4-title h3' => 'color: {{VALUE}};',
				],
				'condition' => [
					'abcbiz_modern_post_grid_style!' => 'style2',
				]
			]
		);
		// Control for icon size
		$this->add_control(
			'icon_size',
			[
				'label' => esc_html__('Icon Size', 'abcbiz-addons'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 50,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-modern-sps4-category a' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		// Color control for icon
		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__('Icon Color', 'abcbiz-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abcbiz-modern-sps4-category a' => 'color: {{VALUE}};',
				],
			]
		);
		// Color control for info text
		$this->add_control(
			'info_text_color',
			[
				'label' => esc_html__('Info Text Color', 'abcbiz-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abcbiz-modern-sps4-info' => 'color: {{VALUE}};',
				],
			]
		);
		// Typography control for info text
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'info_typography',
				'label' => esc_html__('Info Typography', 'abcbiz-addons'),
				'selector' => '{{WRAPPER}} .abcbiz-modern-sps4-info',
			]
		);
		// Color control for info background
		$this->add_control(
			'info_background_color',
			[
				'label' => esc_html__('Info Background Color', 'abcbiz-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abcbiz-modern-sps4-info' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();//end  style section

	}

	/**
	 * Render the widget output on the frontend.
	 */
	protected function render()
	{
		include 'renderview.php';
	}
}