<?php 
namespace inc\widgets\ABCIconBox;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


use Inc\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;

/**
 * Elementor List Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Main extends BaseWidget {

	    // define protected variables...
		protected $name = 'abc-icon-box';
		protected $title = 'ABC Icon Box';
		protected $icon = 'eicon-icon-box';
		protected $categories = [
			'abc-category'
		];		
		protected $keywords = [
			'icon','abc'
		];




	/**
	 * Register list widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		//Template
		$this->start_controls_section(
			'abc-elementor-icon-box',
			[
				'label' => esc_html__( 'Content', 'ABCMAFTH' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		//select icon box style 
	
		$this->add_control(
			'abc_elementor_icon_box_style',
			[
				'label' => esc_html__( 'Choose Style', 'ABCMAFTH'),
				'type' => Controls_Manager::SELECT,
				'default' => 'style-one',
				'options' => [
					'style-one'  => esc_html__( 'Style One', 'ABCMAFTH' ),
					'style-two'  => esc_html__( 'Style Two', 'ABCMAFTH' ),
					'style-three'  => esc_html__( 'Style Three', 'ABCMAFTH' ),
				],
			]
		);


		$this->add_control(
			'abc_elementor_icon_box_icon_shape',
			[
				'label' => esc_html__( 'Icon Shape', 'ABCMAFTH' ),
				'type' => Controls_Manager::ICONS,
				'condition' => [
					'abc_elementor_icon_box_style' => 'style-one',
				],

				
			]
		);
		$this->add_control(
			'abc_elementor_icon_box_icon',
			[
				'label' => esc_html__( 'Icon', 'ABCMAFTH' ),
				'type' => Controls_Manager::ICONS,
				
			]
		);
		$this->add_control(
			'abc_elementor_icon_box_title',
			[
				'label' => esc_html__( 'Title', 'ABCMAFTH' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Responsive Design', 'ABCMAFTH' ),
				'placeholder' => esc_html__( 'Type your title here', 'ABCMAFTH' ),
				'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
			]
		);
		$this->add_control(
			'abc_elementor_icon_box_desc',
			[
				'label' => esc_html__( 'Description', 'ABCMAFTH' ),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => esc_html__( 'Duis Aute Irure Dolor Reprehenderit In Voluptate Velit Esse Cillum Dolore Fugiat Nulla Pariatur', 'ABCMAFTH' ),
				'placeholder' => esc_html__( 'Type your description here', 'ABCMAFTH' ),
				'dynamic' => [
					'active' => true,
				],
			]			
		);

		$this->add_control(
			'abc_elementor_icon_box_button_text',
			[
				'label' => esc_html__( 'Button Text', 'ABCMAFTH' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Read More', 'ABCMAFTH' ),
				'placeholder' => esc_html__( 'Type your button text here', 'ABCMAFTH' ),
				'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
				'condition' => [
					'abc_elementor_icon_box_style' => 'style-one',
				],
			]			
		);

		$this->add_control(
			'abc_elementor_icon_box_button_link',
			[
				'label' => esc_html__( 'Button Link', 'ABCMAFTH' ),
				'type' => Controls_Manager::URL,
				'default' => [
					'url' => '#',
				],
				'condition' => [
					'abc_elementor_icon_box_style' => 'style-one',
				],		
			]
		);
		// button alignment
		$this->add_responsive_control(
			'abc_elementor_icon_box_button_align',
			[
				'label' => esc_html__( 'Button Alignment', 'ABCMAFTH'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' => esc_html__( 'Left', 'ABCMAFTH' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'ABCMAFTH' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'ABCMAFTH' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'condition' => [
					'abc_elementor_icon_box_style' => 'style-one',
				],	
				'selectors' => [
					'{{WRAPPER}} .abc-elementor-icon-box-button' => 'text-align: {{VALUE}};',
				],			
			]
		);
		// button size slider
		$this->add_responsive_control(
			'abc_elementor_icon_box_button_size',
			[
				'label' => esc_html__( 'Button Size', 'ABCMAFTH' ),
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
					'{{WRAPPER}} .abc-elementor-icon-box-button a.abc-elementor-button-link' => 'width: {{SIZE}}{{UNIT}};',
				],		
				'condition' => [
					'abc_elementor_icon_box_style' => 'style-one',
				],					
			]
		);



		$this->add_control(
			'abc_elementor_icon_box_button_selected_icon',
			[
				'label' => esc_html__( 'Icon', 'ABCMAFTH' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'skin' => 'inline',
				'label_block' => false,	
				'condition' => [
					'abc_elementor_icon_box_style' => 'style-one',
				],			
			]
		);

		$this->add_control(
			'abc_elementor_icon_box_button_icon_align',
			[
				'label' => esc_html__( 'Icon Position', 'ABCMAFTH' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'right',
				'options' => [
					'left' => esc_html__( 'Before', 'ABCMAFTH' ),
					'right' => esc_html__( 'After', 'ABCMAFTH' ),
				],	
				'condition' => [
					'abc_elementor_icon_box_style' => 'style-one',
				],			
			]
		);



		$this->end_controls_section(); // End the Feature option

		// box style
		$this->start_controls_section(
			'abc_elementor_icon_box_area_style_section',
			[
				'label' => esc_html__( 'Box', 'ABCMAFTH' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'abc_elementor_icon_box_padding',
			[
				'label' => esc_html__( 'Padding', 'ABCMAFTH' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .abc-elementor-icon-box-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .abc-single-icon-box-two-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .abc-single-icon-box-three-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->start_controls_tabs(
			'abc_elementor_icon_box_area_style_tabs', 
			[
				'condition'	=> [
					'abc_elementor_icon_box_style' => ['style-one', 'style-three'],
				],
			]
		);

		$this->start_controls_tab(
			'abc_elementor_icon_box_area_style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'ABCMAFTH' ),
			]
		);
		// box border (style three)
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'abc_elementor_icon_box_area_border',
				'selector' => '{{WRAPPER}} .abc-elementor-icon-box-area, {{WRAPPER}} .abc-single-icon-box-two-area, {{WRAPPER}} .abc-single-icon-box-three-area',
			]
		);
		$this->add_control(
			'abc_elementor_icon_box_area_style_normal_radius',
			[
				'label' => esc_html__( 'Border Radius', 'ABCMAFTH' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],				
				'selectors' => [
					'{{WRAPPER}} .abc-elementor-icon-box-area' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .abc-single-icon-box-two-area' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .abc-single-icon-box-three-area' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],			
			]
	
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'acb_elementor_box_area_bg',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .abc-elementor-icon-box-area, {{WRAPPER}} .abc-single-icon-box-two-area, {{WRAPPER}} .abc-single-icon-box-three-area',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'abc_elementor_icon_box_area_style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'ABCMAFTH' ),
			]
		);
		// box border (style three)
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'abc_elementor_icon_box_area_border_hover',
				'selector' => '{{WRAPPER}} .abc-elementor-icon-box-area:hover, {{WRAPPER}} .abc-single-icon-box-two-area:hover, {{WRAPPER}} .abc-single-icon-box-three-area:hover',
			]
		);
		$this->add_control(
			'abc_elementor_icon_box_area_style_hover_radius',
			[
				'label' => esc_html__( 'Border Radius', 'ABCMAFTH' ),
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
					'{{WRAPPER}} .abc-elementor-icon-box-area:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .abc-single-icon-box-two-area:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .abc-single-icon-box-three-area:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],			
			]
	
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'acb_elementor_box_area_bg_hover',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .abc-elementor-icon-box-area:hover,{{WRAPPER}} .abc-single-icon-box-two-area:hover,{{WRAPPER}} .abc-single-icon-box-three-area:hover',
			]
		);	


		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();

		// icon style 
		$this->start_controls_section(
			'abc_elementor_icon_box_style_section',
			[
				'label' => esc_html__( 'Icon', 'ABCMAFTH' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		//icon size
		$this->add_responsive_control(
			'abc_elementor_icon_box_icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'ABCMAFTH' ),
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
					'{{WRAPPER}} .abc-single-icon-box-two-icon .abc-ele-icon-box2-icon svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .abc-single-icon-box-two-icon .abc-ele-icon-box-hover svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .abc-single-icon-box-three-area .abc-ele-icon-box3-icon svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .abc-elementor-icon-box-icon .abc-ele-icon-box-hover i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .abc-elementor-icon-box-icon .abc-ele-icon-box-hover svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .abc-single-icon-box-two-icon .abc-ele-icon-box2-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .abc-single-icon-box-three-area .abc-ele-icon-box3-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
				],							
			],
		);

		//icon background shape size
		$this->add_responsive_control(
			'abc_elementor_icon_box_icon_bg_shape_size',
			[
				'label' => esc_html__( 'Shape Size', 'ABCMAFTH' ),
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
					'{{WRAPPER}} .abc-elementor-icon-box-icon .abc-ele-icon-box-normal svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .abc-elementor-icon-box-icon .abc-ele-icon-box-normal i' => 'font-size: {{SIZE}}{{UNIT}};',
				],		
				'condition'	=> [
					'abc_elementor_icon_box_style' => 'style-one',
				],					
			],
		);

		$this->add_responsive_control(
			'abc_elementor_icon_box_icon_indent',
			[
				'label' => esc_html__( 'Icon Spacing', 'ABCMAFTH' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'max' => 150,
						'min' => -10,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .abc-elementor-icon-box-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .abc-single-icon-box-two-icon .abc-ele-icon-box2-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .abc-single-icon-box-three-area .abc-single-icon-box-icons' => 'margin-right: {{SIZE}}{{UNIT}};',
				],							
			]
		);
		//icon position indent
		$this->add_responsive_control(
			'abc_elementor_icon_box_icon_positing_indent',
			[
				'label' => esc_html__( 'Icon Position', 'ABCMAFTH' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'max' => 150,
						'min' => -100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .abc-ele-icon-box-hover' => 'top: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .abc-single-icon-box-three-area .abc-single-icon-box-icons' => 'top: {{SIZE}}{{UNIT}};',
				],	
				'condition'	=> [
					'abc_elementor_icon_box_style' => ['style-one','style-three'],
				],							
			]
		);
		// icon padding
		$this->add_control(
			'abc_elementor_icon_box_icon_padding',
			[
				'label' => esc_html__( 'Icon Padding', 'ABCMAFTH' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .abc-single-icon-box-icons .abc-ele-icon-box3-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition'	=> [
					'abc_elementor_icon_box_style' => 'style-three',
				],
			]
		);

		$this->start_controls_tabs(
			'abc_elementor_icon_box_style_tabs'
		);

		$this->start_controls_tab(
			'abc_elementor_icon_box_style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'ABCMAFTH' ),
			]
		);
		$this->add_control(
			'abc_elementor_icon_box_icon_stroke_color',
			[
				'label' => esc_html__( 'Shape Color', 'ABCMAFTH' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abc-ele-icon-box-normal svg path' => 'stroke: {{VALUE}}',
					'{{WRAPPER}} .abc-ele-icon-box-normal i' => 'color: {{VALUE}}',
				],
				'condition'	=> [
					'abc_elementor_icon_box_style' => 'style-one',
				],
			]
		);
		$this->add_control(
			'abc_elementor_icon_box_icon_fill_color',
			[
				'label' => esc_html__( 'Fill Color', 'ABCMAFTH' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abc-ele-icon-box-hover svg path' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .abc-ele-icon-box-hover i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .abc-ele-icon-box2-icon svg path' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .abc-ele-icon-box3-icon svg path' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .abc-ele-icon-box2-icon i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .abc-ele-icon-box3-icon i' => 'color: {{VALUE}}',
				],
			]
		);
		// icon background
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'abc_elementor_icon_box_icon_bg',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .abc-single-icon-box-icons .abc-ele-icon-box3-icon',
				'condition'	=> [
					'abc_elementor_icon_box_style' => 'style-three',
				],
			]
		);
		// icon border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'abc_elementor_icon_box_icon_border',
				'selector' => '{{WRAPPER}} .abc-single-icon-box-icons .abc-ele-icon-box3-icon',
				'condition'	=> [
					'abc_elementor_icon_box_style' => 'style-three',
				],
			]
		);
		// icon border radius
		$this->add_control(
			'abc_elementor_icon_box_icon_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'ABCMAFTH' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],				
				'selectors' => [
					'{{WRAPPER}} .abc-single-icon-box-icons .abc-ele-icon-box3-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],			
				'condition'	=> [
					'abc_elementor_icon_box_style' => 'style-three',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'abc_elementor_icon_box_style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'ABCMAFTH' ),
			]
		);

		$this->add_control(
			'abc_elementor_icon_box_icon_stroke_hover_color',
			[
				'label' => esc_html__( 'Shape Color', 'ABCMAFTH' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abc-elementor-icon-box-area:hover .abc-ele-icon-box-normal svg path' => 'stroke: {{VALUE}}',
					'{{WRAPPER}} .abc-elementor-icon-box-area:hover .abc-ele-icon-box-normal i' => 'color: {{VALUE}}',
				],
				'condition'	=> [
					'abc_elementor_icon_box_style' => 'style-one',
				],
			]
		);		
		$this->add_control(
			'abc_elementor_icon_box_icon_fill_hover_color',
			[
				'label' => esc_html__( 'Fill Color', 'ABCMAFTH' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abc-elementor-icon-box-area:hover .abc-ele-icon-box-hover svg path' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .abc-single-icon-box-two-area:hover .abc-ele-icon-box2-icon svg path' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .abc-single-icon-box-three-area:hover .abc-ele-icon-box3-icon svg path' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .abc-single-icon-box-two-area:hover .abc-ele-icon-box2-icon i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .abc-elementor-icon-box-area:hover .abc-ele-icon-box-hover i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .abc-single-icon-box-three-area:hover .abc-ele-icon-box3-icon i' => 'color: {{VALUE}}',
				],
			]
		);
		// icon background
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'abc_elementor_icon_box_icon_bg_hover',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .abc-single-icon-box-three-area:hover .abc-single-icon-box-icons .abc-ele-icon-box3-icon',
				'condition'	=> [
					'abc_elementor_icon_box_style' => 'style-three',
				],
			]
		);
		// icon border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'abc_elementor_icon_box_icon_border_hover',
				'selector' => '{{WRAPPER}} .abc-single-icon-box-three-area:hover .abc-single-icon-box-icons .abc-ele-icon-box3-icon',
				'condition'	=> [
					'abc_elementor_icon_box_style' => 'style-three',
				],
			]
		);
		// icon border radius
		$this->add_control(
			'abc_elementor_icon_box_icon_border_radius_hover',
			[
				'label' => esc_html__( 'Border Radius', 'ABCMAFTH' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],				
				'selectors' => [
					'{{WRAPPER}} .abc-single-icon-box-three-area:hover .abc-single-icon-box-icons .abc-ele-icon-box3-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],			
				'condition'	=> [
					'abc_elementor_icon_box_style' => 'style-three',
				],
			]
		);
		

		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section(); // end icon style

		// content style 
		$this->start_controls_section(
			'abc_elementor_icon_box_content_style_section',
			[
				'label' => esc_html__( 'Content', 'ABCMAFTH' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'abc_elementor_icon_box_button_heading_indent',
			[
				'label' => esc_html__( 'Heading Spacing', 'ABCMAFTH' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .abc-elementor-icon-box-title' => 'margin-top: {{SIZE}}{{UNIT}};',
				],							
			]
		);		
		$this->add_responsive_control(
			'abc_elementor_icon_box_button_content_indent',
			[
				'label' => esc_html__( 'Content Spacing', 'ABCMAFTH' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .abc-elementor-icon-box-desc' => 'margin-top: {{SIZE}}{{UNIT}};',
				],							
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'abc_elementor_icon_box_title_typography',
				'label' => esc_html__( 'Title', 'ABCMAFTH' ),
				'selector' => '{{WRAPPER}} .abc-elementor-icon-box-title',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'abc_elementor_icon_box_text_typography',
				'selector' => '{{WRAPPER}} .abc-elementor-icon-box-desc',
				'label' => esc_html__( 'Content', 'ABCMAFTH' ),
			]
		);


		$this->start_controls_tabs(
			'abc_elementor_icon_box_content_style_tabs'
		);

		$this->start_controls_tab(
			'abc_elementor_icon_box_content_style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'ABCMAFTH' ),
			]
		);
		$this->add_control(
			'abc_elementor_icon_box_icon_title_color',
			[
				'label' => esc_html__( 'Title Color', 'ABCMAFTH' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abc-elementor-icon-box-title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'abc_elementor_icon_box_icon_text_color',
			[
				'label' => esc_html__( 'Text Color', 'ABCMAFTH' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abc-elementor-icon-box-desc' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'abc_elementor_icon_box_content_style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'ABCMAFTH' ),
			]
		);
		$this->add_control(
			'abc_elementor_icon_box_icon_title_hover_color',
			[
				'label' => esc_html__( 'Title Color', 'ABCMAFTH' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abc-elementor-icon-box-area:hover .abc-elementor-icon-box-title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .abc-single-icon-box-two-area:hover .abc-elementor-icon-box-title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .abc-single-icon-box-three-area:hover .abc-elementor-icon-box-title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'abc_elementor_icon_box_icon_text_hover_color',
			[
				'label' => esc_html__( 'Text Color', 'ABCMAFTH' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abc-elementor-icon-box-area:hover .abc-elementor-icon-box-desc' => 'color: {{VALUE}}',
					'{{WRAPPER}} .abc-single-icon-box-two-area:hover .abc-elementor-icon-box-desc' => 'color: {{VALUE}}',
					'{{WRAPPER}} .abc-single-icon-box-three-area:hover .abc-elementor-icon-box-desc' => 'color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section(); // end content style

		// button style 
		$this->start_controls_section(
			'abc_elementor_icon_box_button_style_section',
			[
				'label' => esc_html__( 'Button', 'ABCMAFTH' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'abc_elementor_icon_box_style' => 'style-one',
				],	
			]
		);
		$this->add_control(
			'abc_elementor_icon_box_button_indent',
			[
				'label' => esc_html__( 'Spacing', 'ABCMAFTH' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .abc-elementor-icon-box-button a' => 'margin-top: {{SIZE}}{{UNIT}};',
				],							
			]
		);		
		$this->add_control(
			'abc_elementor_icon_box_button_icon_indent',
			[
				'label' => esc_html__( 'Icon Spacing', 'ABCMAFTH' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .abc-elementor-icon-box-button a i' => 'margin-left: {{SIZE}}{{UNIT}};',
				],							
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'abc_elementor_icon_box_button_typography',
				'label' => esc_html__( 'Text', 'ABCMAFTH' ),
				'selector' => '{{WRAPPER}} .abc-elementor-icon-box-button a',
			]
		);
		$this->add_control(
			'abc_elementor_icon_box_button_padding',
			[
				'label' => esc_html__( 'Padding', 'textdomain' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .abc-elementor-icon-box-button a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);		
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'abc_elementor_icon_box_button_order',
				'selector' => '{{WRAPPER}} .abc-elementor-icon-box-button a',
				'label' => esc_html__( 'Border', 'ABCMAFTH' ),
			]
		);
		$this->add_control(
			'abc_elementor_icon_box_button_radius',
			[
				'label' => esc_html__( 'Border Radius', 'ABCMAFTH' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],				
				'selectors' => [
					'{{WRAPPER}} .abc-elementor-icon-box-button a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],			
			]
		);

		$this->start_controls_tabs(
			'abc_elementor_icon_box_button_style_tabs'
		);

		$this->start_controls_tab(
			'abc_elementor_icon_box_button_style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'ABCMAFTH' ),
			]
		);

		$this->add_control(
			'abc_elementor_icon_box_button_color',
			[
				'label' => esc_html__( 'Color', 'ABCMAFTH' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abc-elementor-icon-box-button a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'abc_elementor_icon_box_button_bg_color',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .abc-elementor-icon-box-button a',
				'label' => esc_html__( 'Background', 'ABCMAFTH' ),
			]
		);	

		$this->end_controls_tab();

		$this->start_controls_tab(
			'abc_elementor_icon_box_button_style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'ABCMAFTH' ),
			]
		);
	
		$this->add_control(
			'abc_elementor_icon_box_btn_hover_color',
			[
				'label' => esc_html__( 'Color', 'ABCMAFTH' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abc-elementor-icon-box-area:hover .abc-elementor-icon-box-button a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'abc_elementor_icon_box_btn_bg_hover',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .abc-elementor-icon-box-area:hover .abc-elementor-icon-box-button a',
				'label' => esc_html__( 'Background', 'ABCMAFTH' ),
			]
		);	

		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section(); // end content style


	}

	/**
	 * Render list widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		//load render view to show widget output on frontend/website.

		if($settings['abc_elementor_icon_box_style'] == 'style-one') {
			include( ABCELEMENTOR_PATH . '/inc/widgets/ABCIconBox/RenderView.php' );
		}elseif($settings['abc_elementor_icon_box_style'] == 'style-two') {
			include( ABCELEMENTOR_PATH . '/inc/widgets/ABCIconBox/RenderView2.php' );
		}elseif($settings['abc_elementor_icon_box_style'] == 'style-three') {
			include( ABCELEMENTOR_PATH . '/inc/widgets/ABCIconBox/RenderView3.php' );
		}
		
		

	}


}
