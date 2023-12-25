<?php 
namespace Includes\widgets\ABCIconBox;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


use Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;

/**
 * Elementor List Widget.
 */
class Main extends BaseWidget {

	    // define protected variables...
		protected $name = 'abcbiz-icon-box';
		protected $title = 'ABC Icon Box';
		protected $icon = 'eicon-icon-box';
		protected $categories = [
			'abcbiz-category'
		];		
		protected $keywords = [
			'icon','abc', 'box'
		];

	/**
	 * Register list widget controls.
	 */
	protected function register_controls() {
		//Template
		$this->start_controls_section(
			'abcbiz-elementor-icon-box',
			[
				'label' => esc_html__( 'Content', 'abcbiz-multi' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		//select icon box style 
	
		$this->add_control(
			'abcbiz_elementor_icon_box_style',
			[
				'label' => esc_html__( 'Choose Style', 'abcbiz-multi'),
				'type' => Controls_Manager::SELECT,
				'default' => 'style-one',
				'options' => [
					'style-one'  => esc_html__( 'Style One', 'abcbiz-multi' ),
					'style-two'  => esc_html__( 'Style Two', 'abcbiz-multi' ),
					'style-three'  => esc_html__( 'Style Three', 'abcbiz-multi' ),
				],
			]
		);


		$this->add_control(
			'abcbiz_elementor_icon_box_icon_shape',
			[
				'label' => esc_html__( 'Icon Shape', 'abcbiz-multi' ),
				'type' => Controls_Manager::ICONS,
				'condition' => [
					'abcbiz_elementor_icon_box_style' => 'style-one',
				],

				
			]
		);
		$this->add_control(
			'abcbiz_elementor_icon_box_icon',
			[
				'label' => esc_html__( 'Icon', 'abcbiz-multi' ),
				'type' => Controls_Manager::ICONS,
				
			]
		);
		$this->add_control(
			'abcbiz_elementor_icon_box_title',
			[
				'label' => esc_html__( 'Title', 'abcbiz-multi' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Responsive Design', 'abcbiz-multi' ),
				'placeholder' => esc_html__( 'Type your title here', 'abcbiz-multi' ),
				'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
			]
		);
		$this->add_control(
			'abcbiz_elementor_icon_box_desc',
			[
				'label' => esc_html__( 'Description', 'abcbiz-multi' ),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => esc_html__( 'Duis Aute Irure Dolor Reprehenderit In Voluptate Velit Esse Cillum Dolore Fugiat Nulla Pariatur', 'abcbiz-multi' ),
				'placeholder' => esc_html__( 'Type your description here', 'abcbiz-multi' ),
				'dynamic' => [
					'active' => true,
				],
			]			
		);

		$this->add_control(
			'abcbiz_elementor_icon_box_button_text',
			[
				'label' => esc_html__( 'Button Text', 'abcbiz-multi' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Read More', 'abcbiz-multi' ),
				'placeholder' => esc_html__( 'Type your button text here', 'abcbiz-multi' ),
				'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
				'condition' => [
					'abcbiz_elementor_icon_box_style' => 'style-one',
				],
			]			
		);

		$this->add_control(
			'abcbiz_elementor_icon_box_button_link',
			[
				'label' => esc_html__( 'Button Link', 'abcbiz-multi' ),
				'type' => Controls_Manager::URL,
				'default' => [
					'url' => '#',
				],
				'condition' => [
					'abcbiz_elementor_icon_box_style' => 'style-one',
				],		
			]
		);
		// button alignment
		$this->add_responsive_control(
			'abcbiz_elementor_icon_box_button_align',
			[
				'label' => esc_html__( 'Button Alignment', 'abcbiz-multi'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' => esc_html__( 'Left', 'abcbiz-multi' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'abcbiz-multi' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'abcbiz-multi' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'condition' => [
					'abcbiz_elementor_icon_box_style' => 'style-one',
				],	
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-icon-box-button' => 'text-align: {{VALUE}};',
				],			
			]
		);
		// button size slider
		$this->add_responsive_control(
			'abcbiz_elementor_icon_box_button_size',
			[
				'label' => esc_html__( 'Button Size', 'abcbiz-multi' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 30,
						'max' => 400,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-icon-box-button a.abcbiz-elementor-button-link' => 'width: {{SIZE}}{{UNIT}};',
				],		
				'condition' => [
					'abcbiz_elementor_icon_box_style' => 'style-one',
				],					
			]
		);

		$this->end_controls_section(); // End the Feature option

		// box style
		$this->start_controls_section(
			'abcbiz_elementor_icon_box_area_style_section',
			[
				'label' => esc_html__( 'Box', 'abcbiz-multi' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'abcbiz_elementor_icon_box_padding',
			[
				'label' => esc_html__( 'Padding', 'abcbiz-multi' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-icon-box-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .abcbiz-single-icon-box-two-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .abcbiz-single-icon-box-three-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->start_controls_tabs(
			'abcbiz_elementor_icon_box_area_style_tabs', 
			[
				'condition'	=> [
					'abcbiz_elementor_icon_box_style' => ['style-one', 'style-three'],
				],
			]
		);

		$this->start_controls_tab(
			'abcbiz_elementor_icon_box_area_style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'abcbiz-multi' ),
			]
		);
		// box border (style three)
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'abcbiz_elementor_icon_box_area_border',
				'selector' => '{{WRAPPER}} .abcbiz-elementor-icon-box-area, {{WRAPPER}} .abcbiz-single-icon-box-two-area, {{WRAPPER}} .abcbiz-single-icon-box-three-area',
			]
		);
		$this->add_control(
			'abcbiz_elementor_icon_box_area_style_normal_radius',
			[
				'label' => esc_html__( 'Border Radius', 'abcbiz-multi' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],				
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-icon-box-area' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .abcbiz-single-icon-box-two-area' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .abcbiz-single-icon-box-three-area' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],			
			]
	
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'acb_elementor_box_area_bg',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .abcbiz-elementor-icon-box-area, {{WRAPPER}} .abcbiz-single-icon-box-two-area, {{WRAPPER}} .abcbiz-single-icon-box-three-area',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'abcbiz_elementor_icon_box_area_style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'abcbiz-multi' ),
			]
		);
		// box border (style three)
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'abcbiz_elementor_icon_box_area_border_hover',
				'selector' => '{{WRAPPER}} .abcbiz-elementor-icon-box-area:hover, {{WRAPPER}} .abcbiz-single-icon-box-two-area:hover, {{WRAPPER}} .abcbiz-single-icon-box-three-area:hover',
			]
		);
		$this->add_control(
			'abcbiz_elementor_icon_box_area_style_hover_radius',
			[
				'label' => esc_html__( 'Border Radius', 'abcbiz-multi' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],	
				'default'	=> [
					'top' => '100',
					'right' => '0',
					'bottom' => '100',
					'left' => '0',
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-icon-box-area:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .abcbiz-single-icon-box-two-area:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .abcbiz-single-icon-box-three-area:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],			
			]
	
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'acb_elementor_box_area_bg_hover',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .abcbiz-elementor-icon-box-area:hover,{{WRAPPER}} .abcbiz-single-icon-box-two-area:hover,{{WRAPPER}} .abcbiz-single-icon-box-three-area:hover',
			]
		);	


		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();

		// icon style 
		$this->start_controls_section(
			'abcbiz_elementor_icon_box_style_section',
			[
				'label' => esc_html__( 'Icon', 'abcbiz-multi' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		//icon size
		$this->add_responsive_control(
			'abcbiz_elementor_icon_box_icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'abcbiz-multi' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'range' => [
					'px' => [
						'max' => 150,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-single-icon-box-two-icon .abcbiz-ele-icon-box2-icon svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .abcbiz-single-icon-box-two-icon .abcbiz-ele-icon-box-hover svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .abcbiz-single-icon-box-three-area .abcbiz-ele-icon-box3-icon svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .abcbiz-elementor-icon-box-icon .abcbiz-ele-icon-box-hover i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .abcbiz-elementor-icon-box-icon .abcbiz-ele-icon-box-hover svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .abcbiz-single-icon-box-two-icon .abcbiz-ele-icon-box2-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .abcbiz-single-icon-box-three-area .abcbiz-ele-icon-box3-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
				],							
			],
		);

		//icon background shape size
		$this->add_responsive_control(
			'abcbiz_elementor_icon_box_icon_bg_shape_size',
			[
				'label' => esc_html__( 'Shape Size', 'abcbiz-multi' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'default' => [
					'unit' => 'px',
					'size' => 100,
				],
				'range' => [
					'px' => [
						'max' => 150,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-icon-box-icon .abcbiz-ele-icon-box-normal svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .abcbiz-elementor-icon-box-icon .abcbiz-ele-icon-box-normal i' => 'font-size: {{SIZE}}{{UNIT}};',
				],		
				'condition'	=> [
					'abcbiz_elementor_icon_box_style' => 'style-one',
				],					
			],
		);

		$this->add_responsive_control(
			'abcbiz_elementor_icon_box_icon_indent',
			[
				'label' => esc_html__( 'Icon Spacing', 'abcbiz-multi' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'max' => 150,
						'min' => -10,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-icon-box-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .abcbiz-single-icon-box-two-icon .abcbiz-ele-icon-box2-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .abcbiz-single-icon-box-three-area .abcbiz-single-icon-box-icons' => 'margin-right: {{SIZE}}{{UNIT}};',
				],							
			]
		);
		//icon position indent
		$this->add_responsive_control(
			'abcbiz_elementor_icon_box_icon_positing_indent',
			[
				'label' => esc_html__( 'Icon Position', 'abcbiz-multi' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'max' => 150,
						'min' => -100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-ele-icon-box-hover' => 'top: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .abcbiz-single-icon-box-three-area .abcbiz-single-icon-box-icons' => 'top: {{SIZE}}{{UNIT}};',
				],	
				'condition'	=> [
					'abcbiz_elementor_icon_box_style' => ['style-one','style-three'],
				],							
			]
		);
		// icon padding
		$this->add_control(
			'abcbiz_elementor_icon_box_icon_padding',
			[
				'label' => esc_html__( 'Icon Padding', 'abcbiz-multi' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-single-icon-box-icons .abcbiz-ele-icon-box3-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition'	=> [
					'abcbiz_elementor_icon_box_style' => 'style-three',
				],
			]
		);

		$this->start_controls_tabs(
			'abcbiz_elementor_icon_box_style_tabs'
		);

		$this->start_controls_tab(
			'abcbiz_elementor_icon_box_style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'abcbiz-multi' ),
			]
		);
		$this->add_control(
			'abcbiz_elementor_icon_box_icon_stroke_color',
			[
				'label' => esc_html__( 'Shape Color', 'abcbiz-multi' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abcbiz-ele-icon-box-normal svg path' => 'stroke: {{VALUE}}',
					'{{WRAPPER}} .abcbiz-ele-icon-box-normal svg' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .abcbiz-ele-icon-box-normal i' => 'color: {{VALUE}}',
				],
				'condition'	=> [
					'abcbiz_elementor_icon_box_style' => 'style-one',
				],
			]
		);
		$this->add_control(
			'abcbiz_elementor_icon_box_icon_fill_color',
			[
				'label' => esc_html__( 'Icon Color', 'abcbiz-multi' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abcbiz-ele-icon-box-hover svg path' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .abcbiz-ele-icon-box-hover i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .abcbiz-ele-icon-box2-icon svg path' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .abcbiz-ele-icon-box3-icon svg path' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .abcbiz-ele-icon-box2-icon i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .abcbiz-ele-icon-box3-icon i' => 'color: {{VALUE}}',
				],
			]
		);
		// icon background
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'abcbiz_elementor_icon_box_icon_bg',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .abcbiz-single-icon-box-icons .abcbiz-ele-icon-box3-icon',
				'condition'	=> [
					'abcbiz_elementor_icon_box_style' => 'style-three',
				],
			]
		);
		// icon border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'abcbiz_elementor_icon_box_icon_border',
				'selector' => '{{WRAPPER}} .abcbiz-single-icon-box-icons .abcbiz-ele-icon-box3-icon',
				'condition'	=> [
					'abcbiz_elementor_icon_box_style' => 'style-three',
				],
			]
		);
		// icon border radius
		$this->add_control(
			'abcbiz_elementor_icon_box_icon_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'abcbiz-multi' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],				
				'selectors' => [
					'{{WRAPPER}} .abcbiz-single-icon-box-icons .abcbiz-ele-icon-box3-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],			
				'condition'	=> [
					'abcbiz_elementor_icon_box_style' => 'style-three',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'abcbiz_elementor_icon_box_style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'abcbiz-multi' ),
			]
		);

		$this->add_control(
			'abcbiz_elementor_icon_box_icon_stroke_hover_color',
			[
				'label' => esc_html__( 'Shape Hover Color', 'abcbiz-multi' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-icon-box-area:hover .abcbiz-ele-icon-box-normal svg path' => 'stroke: {{VALUE}}',
					'{{WRAPPER}} .abcbiz-elementor-icon-box-area:hover .abcbiz-ele-icon-box-normal svg' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .abcbiz-elementor-icon-box-area:hover .abcbiz-ele-icon-box-normal i' => 'color: {{VALUE}}',
				],
				'condition'	=> [
					'abcbiz_elementor_icon_box_style' => 'style-one',
				],
			]
		);		
		$this->add_control(
			'abcbiz_elementor_icon_box_icon_fill_hover_color',
			[
				'label' => esc_html__( 'Icon Hover Color', 'abcbiz-multi' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-icon-box-area:hover .abcbiz-ele-icon-box-hover svg path' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .abcbiz-single-icon-box-two-area:hover .abcbiz-ele-icon-box2-icon svg path' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .abcbiz-single-icon-box-three-area:hover .abcbiz-ele-icon-box3-icon svg path' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .abcbiz-single-icon-box-two-area:hover .abcbiz-ele-icon-box2-icon i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .abcbiz-elementor-icon-box-area:hover .abcbiz-ele-icon-box-hover i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .abcbiz-single-icon-box-three-area:hover .abcbiz-ele-icon-box3-icon i' => 'color: {{VALUE}}',
				],
			]
		);
		// icon background
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'abcbiz_elementor_icon_box_icon_bg_hover',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .abcbiz-single-icon-box-three-area:hover .abcbiz-single-icon-box-icons .abcbiz-ele-icon-box3-icon',
				'condition'	=> [
					'abcbiz_elementor_icon_box_style' => 'style-three',
				],
			]
		);
		// icon border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'abcbiz_elementor_icon_box_icon_border_hover',
				'selector' => '{{WRAPPER}} .abcbiz-single-icon-box-three-area:hover .abcbiz-single-icon-box-icons .abcbiz-ele-icon-box3-icon',
				'condition'	=> [
					'abcbiz_elementor_icon_box_style' => 'style-three',
				],
			]
		);
		// icon border radius
		$this->add_control(
			'abcbiz_elementor_icon_box_icon_border_radius_hover',
			[
				'label' => esc_html__( 'Border Radius', 'abcbiz-multi' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],				
				'selectors' => [
					'{{WRAPPER}} .abcbiz-single-icon-box-three-area:hover .abcbiz-single-icon-box-icons .abcbiz-ele-icon-box3-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],			
				'condition'	=> [
					'abcbiz_elementor_icon_box_style' => 'style-three',
				],
			]
		);
		

		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section(); // end icon style

		// content style 
		$this->start_controls_section(
			'abcbiz_elementor_icon_box_content_style_section',
			[
				'label' => esc_html__( 'Content', 'abcbiz-multi' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'abcbiz_elementor_icon_box_button_heading_indent',
			[
				'label' => esc_html__( 'Heading Spacing', 'abcbiz-multi' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-icon-box-title' => 'margin-top: {{SIZE}}{{UNIT}};',
				],							
			]
		);		
		$this->add_responsive_control(
			'abcbiz_elementor_icon_box_button_content_indent',
			[
				'label' => esc_html__( 'Content Spacing', 'abcbiz-multi' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-icon-box-desc' => 'margin-top: {{SIZE}}{{UNIT}};',
				],							
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz_elementor_icon_box_title_typography',
				'label' => esc_html__( 'Title Typography', 'abcbiz-multi' ),
				'selector' => '{{WRAPPER}} .abcbiz-elementor-icon-box-title',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz_elementor_icon_box_text_typography',
				'selector' => '{{WRAPPER}} .abcbiz-elementor-icon-box-desc',
				'label' => esc_html__( 'Content Typography', 'abcbiz-multi' ),
			]
		);


		$this->start_controls_tabs(
			'abcbiz_elementor_icon_box_content_style_tabs'
		);

		$this->start_controls_tab(
			'abcbiz_elementor_icon_box_content_style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'abcbiz-multi' ),
			]
		);
		$this->add_control(
			'abcbiz_elementor_icon_box_icon_title_color',
			[
				'label' => esc_html__( 'Title Color', 'abcbiz-multi' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-icon-box-title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'abcbiz_elementor_icon_box_icon_text_color',
			[
				'label' => esc_html__( 'Text Color', 'abcbiz-multi' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-icon-box-desc' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'abcbiz_elementor_icon_box_content_style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'abcbiz-multi' ),
			]
		);
		$this->add_control(
			'abcbiz_elementor_icon_box_icon_title_hover_color',
			[
				'label' => esc_html__( 'Title Color', 'abcbiz-multi' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-icon-box-area:hover .abcbiz-elementor-icon-box-title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .abcbiz-single-icon-box-two-area:hover .abcbiz-elementor-icon-box-title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .abcbiz-single-icon-box-three-area:hover .abcbiz-elementor-icon-box-title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'abcbiz_elementor_icon_box_icon_text_hover_color',
			[
				'label' => esc_html__( 'Text Color', 'abcbiz-multi' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-icon-box-area:hover .abcbiz-elementor-icon-box-desc' => 'color: {{VALUE}}',
					'{{WRAPPER}} .abcbiz-single-icon-box-two-area:hover .abcbiz-elementor-icon-box-desc' => 'color: {{VALUE}}',
					'{{WRAPPER}} .abcbiz-single-icon-box-three-area:hover .abcbiz-elementor-icon-box-desc' => 'color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section(); // end content style

		// button style 
		$this->start_controls_section(
			'abcbiz_elementor_icon_box_button_style_section',
			[
				'label' => esc_html__( 'Button', 'abcbiz-multi' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'abcbiz_elementor_icon_box_style' => 'style-one',
				],	
			]
		);
		$this->add_control(
			'abcbiz_elementor_icon_box_button_indent',
			[
				'label' => esc_html__( 'Spacing', 'abcbiz-multi' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-icon-box-button a' => 'margin-top: {{SIZE}}{{UNIT}};',
				],							
			]
		);		
		$this->add_control(
			'abcbiz_elementor_icon_box_button_icon_indent',
			[
				'label' => esc_html__( 'Icon Spacing', 'abcbiz-multi' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-icon-box-button a i' => 'margin-left: {{SIZE}}{{UNIT}};',
				],							
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz_elementor_icon_box_button_typography',
				'label' => esc_html__( 'Text Typography', 'abcbiz-multi' ),
				'selector' => '{{WRAPPER}} .abcbiz-elementor-icon-box-button a',
			]
		);
		$this->add_control(
			'abcbiz_elementor_icon_box_button_padding',
			[
				'label' => esc_html__( 'Padding', 'textdomain' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-icon-box-button a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);		
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'abcbiz_elementor_icon_box_button_order',
				'selector' => '{{WRAPPER}} .abcbiz-elementor-icon-box-button a',
				'label' => esc_html__( 'Border', 'abcbiz-multi' ),
			]
		);
		$this->add_control(
			'abcbiz_elementor_icon_box_button_radius',
			[
				'label' => esc_html__( 'Border Radius', 'abcbiz-multi' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],				
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-icon-box-button a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],			
			]
		);

		$this->start_controls_tabs(
			'abcbiz_elementor_icon_box_button_style_tabs'
		);

		$this->start_controls_tab(
			'abcbiz_elementor_icon_box_button_style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'abcbiz-multi' ),
			]
		);

		$this->add_control(
			'abcbiz_elementor_icon_box_button_color',
			[
				'label' => esc_html__( 'Color', 'abcbiz-multi' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-icon-box-button a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'abcbiz_elementor_icon_box_button_bg_color',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .abcbiz-elementor-icon-box-button a',
				'label' => esc_html__( 'Background', 'abcbiz-multi' ),
			]
		);	

		$this->end_controls_tab();

		$this->start_controls_tab(
			'abcbiz_elementor_icon_box_button_style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'abcbiz-multi' ),
			]
		);
	
		$this->add_control(
			'abcbiz_elementor_icon_box_btn_hover_color',
			[
				'label' => esc_html__( 'Color', 'abcbiz-multi' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-icon-box-area:hover .abcbiz-elementor-icon-box-button a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'abcbiz_elementor_icon_box_btn_bg_hover',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .abcbiz-elementor-icon-box-area:hover .abcbiz-elementor-icon-box-button a',
				'label' => esc_html__( 'Background', 'abcbiz-multi' ),
			]
		);	

		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section(); // end content style

	}

	/**
	 * Render list widget output on the frontend.
	 */
	protected function render() {
		$abcbiz_settings = $this->get_settings_for_display();

		if($abcbiz_settings['abcbiz_elementor_icon_box_style'] == 'style-one') {
			include( AbcBizElementor_Path . '/includes/widgets/ABCIconBox/RenderView.php' );
		}elseif($abcbiz_settings['abcbiz_elementor_icon_box_style'] == 'style-two') {
			include( AbcBizElementor_Path . '/includes/widgets/ABCIconBox/RenderView2.php' );
		}elseif($abcbiz_settings['abcbiz_elementor_icon_box_style'] == 'style-three') {
			include( AbcBizElementor_Path . '/includes/widgets/ABCIconBox/RenderView3.php' );
		}

	}

}
