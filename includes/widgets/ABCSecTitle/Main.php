<?php 
namespace ABCBiz\Includes\Widgets\ABCSecTitle;
if (!defined('ABSPATH')) exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;

/**
 * Elementor List Widget.
 */
class Main extends BaseWidget {

	    // define protected variables...
		protected $name = 'abcbiz-sec-title';
		protected $title = 'ABC Section Title';
		protected $icon = 'eicon-post-title abcbiz-multi-icon';
		protected $categories = [
			'abcbiz-category'
		];		
		protected $keywords = [
			'section','abc', 'title', 'dual title', 'section title', 'abc section title', 'abc dual title',
		];


	/**
	 * Register list widget controls.
	 */
	protected function register_controls() {
		//Template
		$this->start_controls_section(
			'abcbiz-elementor-section-title-box',
			[
				'label' => esc_html__( 'Title Content', 'abcbiz-multi' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		//Heading tag

        $this->add_control(
            'abcbiz_elementor_sec_title_tag',
            [
                'label' => esc_html__('Heading Tag', 'abcbiz-multi'),
                'type' => Controls_Manager::SELECT,
                'default' => 'h3',
                'options' => [
                    'h1' => esc_html__('H1', 'abcbiz-multi'),
                    'h2' => esc_html__('H2', 'abcbiz-multi'),
                    'h3' => esc_html__('H3', 'abcbiz-multi'),
                    'h4' => esc_html__('H4', 'abcbiz-multi'),
                    'h5' => esc_html__('H5', 'abcbiz-multi'),
                    'H6' => esc_html__('H6', 'abcbiz-multi'),
                ],
            
            ]
        );

		//Title part one
		$this->add_control(
			'abcbiz_elementor_sec_title_one',
			[
				'label' => esc_html__( 'Title Part 1', 'abcbiz-multi' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Responsive', 'abcbiz-multi' ),
				'placeholder' => esc_html__( 'Type your section Title Firt Part', 'abcbiz-multi' ),
				'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
			]
		);
        
		//Title part two
		$this->add_control(
			'abcbiz_elementor_sec_title_two',
			[
				'label' => esc_html__( 'Title Part 2', 'abcbiz-multi' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Design', 'abcbiz-multi' ),
				'placeholder' => esc_html__( 'Type your section Title Second Part', 'abcbiz-multi' ),
				'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
			]
		);
        
		//Divider show/hide
        $this->add_control(
            'abcbiz_elementor_sec_title_div',
            [
                'label' => esc_html__('Bottom Divider', 'abcbiz-multi'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'abcbiz-multi'),
                'label_off' => esc_html__('Hide', 'abcbiz-multi'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

         
		//Divider Width
		$this->add_responsive_control(
            'abcbiz_elementor_sec_title_div_size',
            [
                'label' => esc_html__('Divider Width', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
                'range' => [
					'px' => [
						'min' => 20,
						'max' => 500,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 120,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-sec-title-divider' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'abcbiz_elementor_sec_title_div' => 'yes',
				],
            
            ]
        );

		//Divider height
		$this->add_responsive_control(
            'abcbiz_elementor_sec_title_div_height',
            [
                'label' => esc_html__('Divider Height', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
                'range' => [
					'px' => [
						'min' => 1,
						'max' => 20,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 3,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-sec-title-divider' => 'height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'abcbiz_elementor_sec_title_div' => 'yes',
				],
            
            ]
        );

		//Divider Gap
		$this->add_responsive_control(
            'abcbiz_elementor_sec_title_div_gap',
            [
                'label' => esc_html__('Divider Gap', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
                'range' => [
					'px' => [
						'min' => -50,
						'max' => 50,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => -5,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-sec-title-divider' => 'top: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'abcbiz_elementor_sec_title_div' => 'yes',
				],
            
            ]
        );

		//Title Alignment

		$this->add_responsive_control(
			'abcbiz_elementor_sec_title_align',
			[
				'label' => esc_html__( 'Alignment', 'abcbiz-multi'),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'center',
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
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-title-align' => 'text-align: {{VALUE}}',
				],
			]
		);
		

		$this->end_controls_section();

        //abc section title style
		
        $this->start_controls_section(
            'abcbiz_elementor_sec_title_style',
            [
                'label' => esc_html__('Title Style', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'abcbiz_elementor_sec_title_one_color',
			[
				'label' => esc_html__( 'Title Part 1 Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-sec-title-one' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz_elementor_sec_title_one_typography',
				'label' => esc_html__( 'Title Part 1 Typography', 'abcbiz-multi' ),
				'selector' => '{{WRAPPER}} .abcbiz-elementor-sec-title-one',
			]
		);

		$this->add_control(
			'abcbiz_elementor_sec_title_two_color',
			[
				'label' => esc_html__( 'Title Part 2 Color', 'abcbiz-multi' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '#458f0c',
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-sec-title-two' => 'color: {{VALUE}}',
				],
			]
		);
        
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'abcbiz_elementor_sec_title_two_typography',
				'label' => esc_html__( 'Title Part 2 Typography', 'abcbiz-multi' ),
				'selector' => '{{WRAPPER}} .abcbiz-elementor-sec-title-two',
			]
		);

        //end of title style
        $this->end_controls_section();


		$this->start_controls_section(
            'abcbiz_elementor_sec_title_div_bg_styly',
            [
                'label' => esc_html__('Divider Background', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'abcbiz_elementor_sec_title_div' => 'yes',
				],
            ]
        );

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'abcbiz_elementor_sec_div_bg_color',
				'label' => esc_html__( 'Divider Color', 'abcbiz-multi' ),
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .abcbiz-elementor-sec-title-divider',
			]
		);

		//end of divider bg style
        $this->end_controls_section();

    }

    /**
     * Render the widget output on the frontend.
     */
    protected function render()
    {
        include 'RenderView.php';
    }
}