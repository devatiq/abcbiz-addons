<?php 
namespace ABCBiz\Includes\Widgets\ABCFlipBox;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;

/**
 * Elementor List Widget.
 */
class Main extends BaseWidget {

	    // define protected variables...
		protected $name = 'abcbiz-flip-box';
		protected $title = 'ABC Flip Box';
		protected $icon = 'eicon-flip-box';
		protected $categories = [
			'abcbiz-category'
		];		
		protected $keywords = [
			'abc', 'flip', 'box',
		];

		public function get_style_depends()
    {
        return ['abcbiz-flip-box'];
    }


	/**
	 * Register list widget controls.
	 */
	protected function register_controls() {

		//front content
		$this->start_controls_section(
			'abcbiz_elementor_flip_box_front_contents',
			[
				'label' => esc_html__( 'Front Contents', 'abcbiz-multi' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		//front icon
		$this->add_control(
			'abcbiz_elementor_flip_box_front_icon',
			[
				'label' => esc_html__( 'Choose Icon', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::ICONS,
			]
		);

		//front heading
		$this->add_control(
			'abcbiz_elementor_flip_box_front_title',
			[
				'label' => esc_html__( 'Front Title', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Box front heading', 'abcbiz-multi' ),
			]
		);

		//Fron paragraph
		$this->add_control(
			'abcbiz_elementor_flip_box_front_desc',
			[
				'label' => esc_html__( 'Front Description', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 6,
				'default' => esc_html__( 'Front paragraph content goes here.', 'abcbiz-multi' ),
			]
		);

		//end of flip front
        $this->end_controls_section();

		//back content
		$this->start_controls_section(
			'abcbiz_elementor_flip_box_back_contents',
			[
				'label' => esc_html__( 'Back Contents', 'abcbiz-multi' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		//front heading
		$this->add_control(
			'abcbiz_elementor_flip_box_back_title',
			[
				'label' => esc_html__( 'Back Title', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Box back heading', 'abcbiz-multi' ),
			]
		);

		//Fron paragraph
		$this->add_control(
			'abcbiz_elementor_flip_box_back_desc',
			[
				'label' => esc_html__( 'Back Description', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 6,
				'default' => esc_html__( 'Back paragraph content goes here.', 'abcbiz-multi' ),
			]
		);

		//back button
		$this->add_control(
			'abcbiz_elementor_flip_box_back_btn',
			[
				'label' => esc_html__( 'Back Button Text', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Click Here', 'abcbiz-multi' ),
			]
		);

		//button link
		$this->add_control(
			'abcbiz_elementor_flip_box_back_btn_link',
			[
				'label' => esc_html__( 'Button Link', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => false,
					'nofollow' => false,
				],
				'label_block' => true,
			]
		);

		//end of flip back
        $this->end_controls_section();

		//back content
		$this->start_controls_section(
			'abcbiz_elementor_flip_box_settings',
			[
				'label' => esc_html__( 'Settings', 'abcbiz-multi' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		//Flipping Direction
		$this->add_responsive_control(
			'abcbiz_elementor_page_title_align',
			[
				'label' => esc_html__( 'Flipping Direction', 'abcbiz-multi'),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'abcbiz-right-flip',
				'options' => [
					'abcbiz-left-flip'    => [
						'title' => esc_html__( 'Left', 'abcbiz-multi' ),
						'icon' => 'eicon-h-align-left',
					],
					'abcbiz-right-flip' => [
						'title' => esc_html__( 'Right', 'abcbiz-multi' ),
						'icon' => 'eicon-h-align-right',
					],
					'abcbiz-top-flip' => [
						'title' => esc_html__( 'Top', 'abcbiz-multi' ),
						'icon' => 'eicon-v-align-top',
					],
					'abcbiz-bottom-flip' => [
						'title' => esc_html__( 'Bottom', 'abcbiz-multi' ),
						'icon' => 'eicon-v-align-bottom',
					],
				],				
			]
		);

		//Box Width
		$this->add_responsive_control(
			'abcbiz_elementor_flip_box_width',
			[
				'label' => esc_html__( 'Box Width', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%'],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 100,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-flip-box' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		//Box height
		$this->add_responsive_control(
			'abcbiz_elementor_flip_box_height',
			[
				'label' => esc_html__( 'Box Height', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%'],
				'range' => [
					'px' => [
						'min' => 50,
						'max' => 1000,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 200,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-flip-box' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		//Box Background
		$this->add_control(
			'abcbiz_elementor_flip_box_bg_color',
			[
				'label' => esc_html__( 'Box Background Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abcbiz-flip-box' => 'background-color: {{VALUE}}',
				],
			]
		);

		//Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'abcbiz_elementor_flip_box_border',
				'selector' => '{{WRAPPER}} .abcbiz-flip-box',
			]
		);

		//Border radius
		$this->add_control(
			'abcbiz_elementor_flip_box_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'default' => [
					'top' => 0,
					'right' => 0,
					'bottom' => 0,
					'left' => 0,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-flip-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		//end of flip box setting
        $this->end_controls_section();

		//front Style
		$this->start_controls_section(
			'abcbiz_elementor_flip_box_front_style',
			[
				'label' => esc_html__( 'Front Style', 'abcbiz-multi' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		//front background color
		$this->add_control(
			'abcbiz_elementor_flip_box_front_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#ededed',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-flip-box-front' => 'background-color: {{VALUE}}',
				],
			]
		);

		//front icon size
		$this->add_responsive_control(
			'abcbiz_elementor_flip_box_front_icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 200,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-flip-box-icon svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		//Icon Color
		$this->add_control(
				'abcbiz_elementor_flip_box_front_icon_color',
				[
					'label' => esc_html__( 'Icon Color', 'abcbiz-multi' ),
					'type'  => Controls_Manager::COLOR,
					'default' => '#2f3093',
					'selectors' => [
						'{{WRAPPER}} .abcbiz-flip-box-icon svg, {{WRAPPER}} .abcbiz-flip-box-icon svg path' => 'fill: {{VALUE}}',
					],
				]
			);

			//front icon spacing
		$this->add_responsive_control(
			'abcbiz_elementor_flip_box_front_icon_spacing',
			[
				'label' => esc_html__( 'Icon Bottom Space', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => -20,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 6,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-flip-box-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		//Heading typography
		$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'abcbiz_elementor_flip_box_front_heading_typography',
					'label' => esc_html__( 'Heading Typography', 'abcbiz-multi' ),
					'selector' => '{{WRAPPER}} .abcbiz-flip-box-front h2',
				]
			);

			//Heading Color
		$this->add_control(
			'abcbiz_elementor_flip_box_front_heading_color',
			[
				'label' => esc_html__( 'Heading Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#2f3093',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-flip-box-front h2' => 'color: {{VALUE}}',
				],
			]
		);

		//front heading spacing
		$this->add_responsive_control(
			'abcbiz_elementor_flip_box_front_heading_spacing',
			[
				'label' => esc_html__( 'Heading Bottom Space', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => -20,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-flip-box-front h2' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		//Desc typography
		$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'abcbiz_elementor_flip_box_front_desc_typography',
					'label' => esc_html__( 'Description Typography', 'abcbiz-multi' ),
					'selector' => '{{WRAPPER}} p.abcbiz-front-description',
				]
			);

			//Desc Color
		$this->add_control(
			'abcbiz_elementor_flip_box_front_desc_color',
			[
				'label' => esc_html__( 'Description Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#333333',
				'selectors' => [
					'{{WRAPPER}} p.abcbiz-front-description' => 'color: {{VALUE}}',
				],
			]
		);

		//Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'abcbiz_elementor_flip_box_front_border',
				'selector' => '{{WRAPPER}} .abcbiz-flip-box-front',
			]
		);

		//Border radius
		$this->add_control(
			'abcbiz_elementor_flip_box_front_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'default' => [
					'top' => 0,
					'right' => 0,
					'bottom' => 0,
					'left' => 0,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-flip-box-front' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
	
		//end of flip front style
        $this->end_controls_section();

		//Back Style
		$this->start_controls_section(
			'abcbiz_elementor_flip_box_back_style',
			[
				'label' => esc_html__( 'Back Style', 'abcbiz-multi' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		//back background color
		$this->add_control(
			'abcbiz_elementor_flip_box_back_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#2f3093',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-flip-box-back' => 'background-color: {{VALUE}}',
				],
			]
		);

		//Heading typography
		$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'abcbiz_elementor_flip_box_back_heading_typography',
					'label' => esc_html__( 'Heading Typography', 'abcbiz-multi' ),
					'selector' => '{{WRAPPER}} .abcbiz-flip-box-back h3',
				]
			);

			//Heading Color
		$this->add_control(
			'abcbiz_elementor_flip_box_back_heading_color',
			[
				'label' => esc_html__( 'Heading Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-flip-box-back h3' => 'color: {{VALUE}}',
				],
			]
		);

		//back heading spacing
		$this->add_responsive_control(
			'abcbiz_elementor_flip_box_back_heading_spacing',
			[
				'label' => esc_html__( 'Heading Bottom Space', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => -20,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-flip-box-back h3' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		//Desc typography
		$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'abcbiz_elementor_flip_box_back_desc_typography',
					'label' => esc_html__( 'Description Typography', 'abcbiz-multi' ),
					'selector' => '{{WRAPPER}} p.abcbiz-back-description',
				]
			);

			//Desc Color
		$this->add_control(
			'abcbiz_elementor_flip_box_back_desc_color',
			[
				'label' => esc_html__( 'Description Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} p.abcbiz-back-description' => 'color: {{VALUE}}',
				],
			]
		);

		//back description spacing
		$this->add_responsive_control(
			'abcbiz_elementor_flip_box_back_desc_spacing',
			[
				'label' => esc_html__( 'Description Bottom Space', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => -20,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} p.abcbiz-back-description' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		//Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'abcbiz_elementor_flip_box_back_border',
				'selector' => '{{WRAPPER}} .abcbiz-flip-box-back',
			]
		);

		//Border radius
		$this->add_control(
			'abcbiz_elementor_flip_box_back_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'default' => [
					'top' => 0,
					'right' => 0,
					'bottom' => 0,
					'left' => 0,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-flip-box-back' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
	
		//end of flip back style
        $this->end_controls_section();

		//front Style
		$this->start_controls_section(
				'abcbiz_elementor_flip_box_back_btn_style',
				[
					'label' => esc_html__( 'Back Button Style', 'abcbiz-multi' ),
					'tab' => Controls_Manager::TAB_STYLE,
				]
			);

			//button typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz_elementor_flip_box_back_btn_typography',
				'label' => esc_html__( 'Button Typography', 'abcbiz-multi' ),
				'selector' => '{{WRAPPER}} .abcbiz-flip-back-btn a',
			]
		);

			//Text Color
		$this->add_control(
			'abcbiz_elementor_flip_box_back_btn_text_color',
			[
				'label' => esc_html__( 'Text Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-flip-back-btn a' => 'color: {{VALUE}}',
				],
			]
		);

		//Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'abcbiz_elementor_flip_box_back_btn_border',
				'selector' => '{{WRAPPER}} .abcbiz-flip-back-btn a',
			]
		);

		//Border radius
		$this->add_control(
			'abcbiz_elementor_flip_box_back_btn_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'default' => [
					'top' => 0,
					'right' => 0,
					'bottom' => 0,
					'left' => 0,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-flip-back-btn a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		//Spacing
		$this->add_control(
			'abcbiz_elementor_flip_box_back_btn_spacing',
			[
				'label' => esc_html__( 'Button Spacing', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'default' => [
					'top' => 10,
					'right' => 20,
					'bottom' => 10,
					'left' => 20,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-flip-back-btn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		//Text Hover Color
		$this->add_control(
			'abcbiz_elementor_flip_box_back_btn_text_hov_color',
			[
				'label' => esc_html__( 'Hover Text Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-flip-back-btn a:hover' => 'color: {{VALUE}}',
				],
			]
		);

		// Hover BG Color
		$this->add_control(
			'abcbiz_elementor_flip_box_back_btn_bg_hov_color',
			[
				'label' => esc_html__( 'Hover Background Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#633396',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-flip-back-btn a:hover' => 'background-color: {{VALUE}}',
				],
			]
		);

		//Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'abcbiz_elementor_flip_box_back_btn_hov_border',
				'selector' => '{{WRAPPER}} .abcbiz-flip-back-btn a:hover',
			]
		);

			//end of flip back button style
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