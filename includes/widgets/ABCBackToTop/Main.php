<?php 
namespace ABCBiz\Includes\Widgets\ABCBackToTop;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

/**
 * Elementor List Widget.
 */
class Main extends BaseWidget {

	    // define protected variables...
		protected $name = 'abcbiz-back-top-top';
		protected $title = 'ABC Back To Top';
		protected $icon = 'eicon-arrow-up abcbiz-addons-icon';
		protected $categories = [
			'abcbiz-category'
		];		
		protected $keywords = [
			'abc', 'back', 'top', 'button'
		];

		public function get_script_depends()
    {
        return ['abcbiz-back-to-top']; 
    }

	/**
	 * Register list widget controls.
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'abcbiz_elementor_back_to_top_setting',
			[
				'label' => esc_html__( 'Settings', 'abcbiz-addons' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		//Button type
		$this->add_control(
			'abcbiz_elementor_back_to_top_type',
			[
				'label' => esc_html__( 'Button Type', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'icon',
				'options' => [
					'icon' => esc_html__( 'Icon', 'abcbiz-addons' ),
					'text'  => esc_html__( 'Text', 'abcbiz-addons' ),
				],
				'selectors' => [
					'{{WRAPPER}} .your-class' => 'border-style: {{VALUE}};',
				],
			]
		);

		//Button text
		$this->add_control(
			'abcbiz_elementor_back_to_top_text',
			[
				'label' => esc_html__( 'Button Text', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Top', 'abcbiz-addons' ),
				'condition' => [
					'abcbiz_elementor_back_to_top_type' => 'text'
				],
			]
		);

		//display switch
		$this->add_control(
			'abcbiz_elementor_back_to_top_display_switch',
			[
				'label' => esc_html__( 'Show Always?', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'always_on' => esc_html__( 'Yes', 'abcbiz-addons' ),
				'always_off' => esc_html__( 'No', 'abcbiz-addons' ),
				'return_value' => 'yes',
				'default' => 'always_off',
			]
		);

		//Button Position
		$this->add_control(
			'abcbiz_elementor_back_to_top_position',
			[
				'label' => esc_html__( 'Position', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'fixed',
				'options' => [
					'relative' => esc_html__( 'Relative', 'abcbiz-addons' ),
					'fixed'  => esc_html__( 'Fixed', 'abcbiz-addons' ),
				],
				'selectors' => [
					'{{WRAPPER}} #abcbiz-back-to-top' => 'position: {{VALUE}};',
				],
			]
		);

		//Bottom position
		$this->add_responsive_control(
			'abcbiz_elementor_back_to_top_bottom_pos',
			[
				'label' => esc_html__( 'Position from bottom', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%'],
				'range' => [
					'px' => [
						'min' => 5,
						'max' => 500,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} #abcbiz-back-to-top' => 'bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'abcbiz_elementor_back_to_top_position' => 'fixed',
				],
			]
		);

		//Right position
		$this->add_responsive_control(
			'abcbiz_elementor_back_to_top_right_pos',
			[
				'label' => esc_html__( 'Position from right', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%'],
				'range' => [
					'px' => [
						'min' => 5,
						'max' => 500,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 30,
				],
				'selectors' => [
					'{{WRAPPER}} #abcbiz-back-to-top' => 'right: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'abcbiz_elementor_back_to_top_position' => 'fixed',
				],
			]
		);
		
        $this->end_controls_section();//end setting section

		//Style Section
		$this->start_controls_section(
			'abcbiz_elementor_back_to_top_style',
			[
				'label' => esc_html__( 'Button Style', 'abcbiz-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		//Background Color
		$this->add_control(
			'abcbiz_elementor_back_to_top_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#0349e7',
				'selectors' => [
					'{{WRAPPER}} #abcbiz-back-to-top' => 'background-color: {{VALUE}}',
				],
			]
		);

		//Background Hover Color
		$this->add_control(
			'abcbiz_elementor_back_to_top_bg_hov_color',
			[
				'label' => esc_html__( 'Hover Background Color', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#a03bf4',
				'selectors' => [
					'{{WRAPPER}} #abcbiz-back-to-top:hover' => 'background-color: {{VALUE}}',
				],
			]
		);

		//Icon Color
		$this->add_control(
			'abcbiz_elementor_back_to_top_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} #abcbiz-back-to-top svg' => 'fill: {{VALUE}}',
				],
				'condition' => [
					'abcbiz_elementor_back_to_top_type' => 'icon'
				],
			]
		);

		//Icon Hover Color
		$this->add_control(
			'abcbiz_elementor_back_to_top_icon_hov_color',
			[
				'label' => esc_html__( 'Icon Hover Color', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} #abcbiz-back-to-top:hover svg' => 'fill: {{VALUE}}',
				],
				'condition' => [
					'abcbiz_elementor_back_to_top_type' => 'icon'
				],
			]
		);

		//Text Color
		$this->add_control(
			'abcbiz_elementor_back_to_top_text_color',
			[
				'label' => esc_html__( 'Text Color', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} #abcbiz-back-to-top' => 'color: {{VALUE}}',
				],
				'condition' => [
					'abcbiz_elementor_back_to_top_type' => 'text'
				],
			]
		);

		//Text Color
		$this->add_control(
			'abcbiz_elementor_back_to_top_text_hov_color',
			[
				'label' => esc_html__( 'Text Hover Color', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} #abcbiz-back-to-top:hover' => 'color: {{VALUE}}',
				],
				'condition' => [
					'abcbiz_elementor_back_to_top_type' => 'text'
				],
			]
		);

		//Text Typograghy
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Typography', 'abcbiz-addons' ),
				'name' => 'abcbiz_elementor_back_to_top_text_typography',
				'selector' => '{{WRAPPER}} #abcbiz-back-to-top',
				'condition' => [
					'abcbiz_elementor_back_to_top_type' => 'text'
				],
			]
		);

		//Icon Size
		$this->add_responsive_control(
			'abcbiz_elementor_back_to_top_icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'abcbiz-addons' ),
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
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} #abcbiz-back-to-top svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'abcbiz_elementor_back_to_top_type' => 'icon',
				],
			]
		);

		//Button Spacing
		$this->add_responsive_control(
			'abcbiz_elementor_back_to_top_spacing',
			[
				'label' => esc_html__( 'Button Spacing', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px'],
				'default' => [
					'top' => 10,
					'right' => 20,
					'bottom' => 10,
					'left' => 20,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} #abcbiz-back-to-top' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		//Button Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'abcbiz_elementor_back_to_top_border',
				'selector' => '{{WRAPPER}} #abcbiz-back-to-top',
			]
		);

		//Button Border Radius
		$this->add_responsive_control(
			'abcbiz_elementor_back_to_top_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'abcbiz-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'default' => [
					'top' => 6,
					'right' => 6,
					'bottom' => 6,
					'left' => 6, 
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} #abcbiz-back-to-top' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();//end style section

    }

    /**
     * Render the widget output on the frontend.
     */
    protected function render()
    {
        include 'renderview.php';
    }
}