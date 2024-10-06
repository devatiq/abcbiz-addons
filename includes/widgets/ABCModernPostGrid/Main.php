<?php
namespace ABCBiz\Includes\Widgets\ABCModernPostGrid;

if (!defined('ABSPATH'))
	exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Background;

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
			'post_meta_switch',
			[
				'label' => esc_html__('Display Post Meta', 'abcbiz-addons'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Yes', 'abcbiz-addons'),
				'label_off' => esc_html__('No', 'abcbiz-addons'),				
				'return_value' => 'true',
				'default' => 'true',
				'description' => esc_html__('Enable this option to display post meta such as date, author, category and comments.', 'abcbiz-addons'),
				'condition' => [
					'post_types' => 'post',
				],
			]
		);
		// Add control for selecting post info to display
		$this->add_control(
			'post_meta_display',
			[
				'label' => esc_html__('Select meta to Display', 'abcbiz-addons'),
				'type' => Controls_Manager::SELECT2,
				'description' => esc_html__('Select which post meta (date, author, comments) should be displayed in the post card.', 'abcbiz-addons'),
				'multiple' => true,
				'options' => [
					'date' => esc_html__('Date', 'abcbiz-addons'),
					'author' => esc_html__('Author', 'abcbiz-addons'),
					'comments' => esc_html__('Comments', 'abcbiz-addons'),
				],
				'default' => ['date', 'author'],
				'label_block' => true,
				'condition' => [
					'post_meta_switch' => 'true',
					'post_types' => 'post',
				],
			]
		);

		// Add control for displaying category
		$this->add_control(
			'display_category',
			[
				'label' => esc_html__('Display Category', 'abcbiz-addons'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Yes', 'abcbiz-addons'),
				'label_off' => esc_html__('No', 'abcbiz-addons'),
				'condition' => [
					'post_types' => 'post',
				],
				'return_value' => 'true',
				'default' => 'true',
				'description' => esc_html__('Enable this option to display the category in the post card.', 'abcbiz-addons'),
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
				'selector' => '{{WRAPPER}} .abcbiz-modren-single-post-title h3, {{WRAPPER}} .abcbiz-modren-style2-post-title h3',
			]
		);
		// Color control for title
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__('Title Color', 'abcbiz-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abcbiz-modren-single-post-title h3 a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .abcbiz-modren-style2-post-title a' => 'color: {{VALUE}};',
				],
			]
		);
		// Control for icon size
		$this->add_control(
			'meta_icon_size',
			[
				'label' => esc_html__('Meta Icon Size', 'abcbiz-addons'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 15,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-modren-single-post-info li span' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .abcbiz-modren-style2-post-info span' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'post_meta_switch' => 'true',
				],
			]
		);
		// Color control for icon
		$this->add_control(
			'meta_icon_color',
			[
				'label' => esc_html__('Meta Icon Color', 'abcbiz-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abcbiz-modren-single-post-info li span' => 'color: {{VALUE}};',
					'{{WRAPPER}} .abcbiz-modren-style2-post-info span' => 'color: {{VALUE}};',
				],
				'condition' => [
					'post_meta_switch' => 'true',
				],
			]
		);
		// Color control for info text
		$this->add_control(
			'meta_text_color',
			[
				'label' => esc_html__('Meta Text Color', 'abcbiz-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abcbiz-modren-single-post-info li a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .abcbiz-modren-style2-post-info a' => 'color: {{VALUE}};',
				],
				'condition' => [
					'post_meta_switch' => 'true',
				],
			]
		);
		// Typography control for info text
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'meta_typography',
				'label' => esc_html__('Meta Typography', 'abcbiz-addons'),
				'selector' => '{{WRAPPER}} .abcbiz-modren-single-post-info li a, {{WRAPPER}} .abcbiz-modren-style2-post-info a',
				'condition' => [
					'post_meta_switch' => 'true',
				],
			]
		);

		$this->end_controls_section();//end  style section


		// Start category style
		$this->start_controls_section(
			'category_style_section',
			[
				'label' => esc_html__('Category', 'abcbiz-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'display_category' => 'true',
					'post_types' => 'post',
				],
			]
		);

		$this->add_control(
			'category_random_color_switch',
			[
				'label' => esc_html__('Use Random Color?', 'abcbiz-addons'),
				'description' => esc_html__('Use Random Color for Category Background color', 'abcbiz-addons'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Yes', 'abcbiz-addons'),
				'label_off' => esc_html__('No', 'abcbiz-addons'),
				'return_value' => 'true',
				'default' => 'false',
			]
		);

		// Typography control for info text
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'category_typography',
				'label' => esc_html__('Typography', 'abcbiz-addons'),
				'selector' => '{{WRAPPER}} .abcbiz-modren-style2-post-cat a, {{WRAPPER}} .abcbiz-modern-sps4-category a',
			]
		);

		$this->add_control(
			'category_padding',
			[
				'label' => esc_html__('Padding', 'abcbiz-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-modren-style2-post-cat a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .abcbiz-modern-sps4-category a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'category_border',
				'label' => esc_html__('Border', 'abcbiz-addons'),
				'selector' => '{{WRAPPER}} .abcbiz-modren-style2-post-cat a, {{WRAPPER}} .abcbiz-modern-sps4-category a',
			]
		);

		$this->add_control(
			'category_border_radius',
			[
				'label' => esc_html__('Border Radius', 'abcbiz-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-modren-style2-post-cat a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .abcbiz-modern-sps4-category a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Margin control
		$this->add_responsive_control(
			'category_margin',
			[
				'label' => esc_html__('Margin', 'abcbiz-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-modren-style2-post-cat' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .abcbiz-modern-sps4-category' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Start category style tabs
		$this->start_controls_tabs('style_tabs');

		// Start normal tab
		$this->start_controls_tab(
			'style_normal_tab',
			[
				'label' => esc_html__('Normal', 'abcbiz-addons'),
			]
		);

		// Text color control
		$this->add_control(
			'category_text_color',
			[
				'label' => esc_html__('Text Color', 'abcbiz-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abcbiz-modren-style2-post-cat a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .abcbiz-modern-sps4-category a' => 'color: {{VALUE}};',
				],
			]
		);
		// Background color control
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'category_background',
				'label' => esc_html__('Background', 'abcbiz-addons'),
				'types' => ['classic', 'gradient'],
				'exclude' => ['image'],
				'selector' => '{{WRAPPER}} .abcbiz-modren-style2-post-cat a, {{WRAPPER}} .abcbiz-modern-sps4-category a',
				'condition' => [
					'category_random_color_switch!' => 'true',
				],
			]
		);


		$this->end_controls_tab(); //end normal tab

		// Start hover tab
		$this->start_controls_tab(
			'style_hover_tab',
			[
				'label' => esc_html__('Hover', 'abcbiz-addons'),
			]
		);

		// Text color control
		$this->add_control(
			'category_text_color_hover',
			[
				'label' => esc_html__('Text Color', 'abcbiz-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abcbiz-modren-style2-post-cat a:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .abcbiz-modern-sps4-category a:hover' => 'color: {{VALUE}};',
				],
			]
		);
		// Background color control
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'category_background_hover',
				'label' => esc_html__('Background', 'abcbiz-addons'),
				'types' => ['classic', 'gradient'],
				'exclude' => ['image'],
				'selector' => '{{WRAPPER}} .abcbiz-modren-style2-post-cat a:hover, {{WRAPPER}} .abcbiz-modern-sps4-category a:hover',
				'condition' => [
					'category_random_color_switch!' => 'true',
				],
			]
		);
		$this->end_controls_tab(); //end hover tab

		$this->end_controls_tabs(); //end tabs

		$this->end_controls_section();//end style section

		
		// Start thumbnail style
		$this->start_controls_section(
			'thumbnail_style_section',
			[
				'label' => esc_html__('Thumbnail', 'abcbiz-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);	
		// Thumbnail border radius
		$this->add_responsive_control(
			'thumbnail_border_radius',
			[
				'label' => esc_html__('Border Radius', 'abcbiz-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-modren-single-post .abcbiz-modren-single-post-thumbnail img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} 0 0;',
					'{{WRAPPER}} .abcbiz-modren-single-post-contents' => 'border-radius: 0 0 {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .abcbiz-modren-single-post' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .abcbiz-modren-posts-styl2-wrapper > .abcbiz-modren-style2-single-post' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .abcbiz-modren-style2-post-thumbnail img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
					'{{WRAPPER}} .abcbiz-modern-post-style4-wrapper .abcbiz-modren-sps4-thumbnail img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
					'{{WRAPPER}} .abcbiz-modern-post-style5-wrapper .abcbiz-modren-sps4-thumbnail img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section(); //end thumbnail style section

	}
	private function generate_random_color() {
		return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
	}

	/**
	 * Render the widget output on the frontend.
	 */
	protected function render()
	{
		include 'renderview.php';
	}
}