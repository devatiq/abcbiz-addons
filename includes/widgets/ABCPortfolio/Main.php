<?php
namespace Includes\Widgets\ABCPortfolio;
if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;

class Main extends BaseWidget
{
    // define protected variables...
    protected $name = 'abcbiz-elementor-portfolio';
    protected $title = 'ABC Portfolio';
    protected $icon = 'eicon-posts-grid';
    protected $categories = [
        'abcbiz-category'
    ];
    protected $keywords = [
        'abc', 'work', 'portfolio',
    ];

    /**
     * Register the widget controls.
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'abcbiz_elementor_portfolio_setting',
            [
                'label' => esc_html__('Portfolio Setting', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

         //Portfolio Image
         $this->add_control(
			'abcbiz_elementor_portfolio_image',
			[
				'label' => esc_html__( 'Choose Image', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

        //Image dimension
        $this->add_control(
			'abcbiz_elementor_portfolio_image_dimension',
			[
				'label' => esc_html__( 'Image Dimension', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::IMAGE_DIMENSIONS,
				'description' => esc_html__( 'Crop the original image size to any custom size. Set custom width or height to keep the original size ratio.', 'abcbiz-multi' ),
				'default' => [
					'width' => '1000',
					'height' => '1000',
				],
			]
		);

        //Title text
        $this->add_control(
			'abcbiz_elementor_portfolio_title_text',
			[
				'label' => esc_html__( 'Title Text', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Business Website Development', 'abcbiz-multi' ),
			]
		);

      
        //Sub Title text
        $this->add_control(
			'abcbiz_elementor_portfolio_sub_title_text',
			[
				'label' => esc_html__( 'Sub Title Text', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Website Design', 'abcbiz-multi' ),
			]
		);

        //Portfolio Link
        $this->add_control(
			'abcbiz_elementor_portfolio_link',
			[
				'label' => esc_html__( 'Portfolio Link', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => 'https://abcplugin.com/abcbiz-multi-addons-for-elementor/',
					'is_external' => true,
					'nofollow' => false,
				],
			]
		);
      
        $this->end_controls_section();//end setting


          // start of team member style section
          $this->start_controls_section(
            'abcbiz_elementor_portfolio_style_section',
            [
                'label' => esc_html__('Style', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        
         //Title top/bottom Position
         $this->add_responsive_control(
			'abcbiz_elementor_portfolio_title_top_post',
			[
				'label' => esc_html__( 'Title Top Position', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => -500,
						'max' => 500,
						'step' => 2,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} h3.abcbiz-portfolio-title' => 'top: {{SIZE}}{{UNIT}};',
				],
			]
		);

         //Title left/right Position
         $this->add_responsive_control(
			'abcbiz_elementor_portfolio_title_left_post',
			[
				'label' => esc_html__( 'Title Left Position', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => -500,
						'max' => 500,
						'step' => 2,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} h3.abcbiz-portfolio-title' => 'left: {{SIZE}}{{UNIT}};',
				],
			]
		);

         //Sub Title top/bottom Position
         $this->add_responsive_control(
			'abcbiz_elementor_portfolio_sub_title_top_post',
			[
				'label' => esc_html__( 'Sub Title Top Position', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => -500,
						'max' => 500,
						'step' => 2,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} p.abcbiz-portfolio-subtitle' => 'top: {{SIZE}}{{UNIT}};',
				],
			]
		);

         //Sub Title left/right Position
         $this->add_responsive_control(
			'abcbiz_elementor_portfolio_sub_title_left_post',
			[
				'label' => esc_html__( 'Sub Title Left Position', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => -500,
						'max' => 500,
						'step' => 2,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} p.abcbiz-portfolio-subtitle' => 'left: {{SIZE}}{{UNIT}};',
				],
			]
		);

         // Title typography 
         $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_portfolio_title_typography',
                'label' => esc_html__('Title Typography', 'abcbiz-multi'),
                'selector' =>  '{{WRAPPER}} h3.abcbiz-portfolio-title',
            ]
        );

         // Sub Title typography 
         $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_portfolio_sub_title_typography',
                'label' => esc_html__('Sub Title Typography', 'abcbiz-multi'),
                'selector' =>  '{{WRAPPER}} p.abcbiz-portfolio-subtitle',
            ]
        );

        // Title color
        $this->add_control(
            'abcbiz_elementor_portfolio_title_color',
            [
                'label' => esc_html__('Title Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} h3.abcbiz-portfolio-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Sub Title color
        $this->add_control(
            'abcbiz_elementor_portfolio_sub_title_color',
            [
                'label' => esc_html__('Sub Title Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#cccccc',
                'selectors' => [
                    '{{WRAPPER}} p.abcbiz-portfolio-subtitle' => 'color: {{VALUE}};',
                ],
            ]
        ); 

        // Overflow color
        $this->add_control(
            'abcbiz_elementor_portfolio_overflow_color',
            [
                'label' => esc_html__('Overflow Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => 'rgba(0, 0, 0, 0.5)',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-portfolio-overlay' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Image Border
        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'abcbiz_elementor_portfolio_img_border',
				'selector' => '{{WRAPPER}} .abcbiz-elementor-portfolio-item img',
			]
		);

        // Image Border Radius
        $this->add_control(
			'abcbiz_elementor_portfolio_img_border',
			[
				'label' => esc_html__( 'Border Radius', 'textdomain' ),
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
					'{{WRAPPER}} .abcbiz-elementor-portfolio-item img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .abcbiz-portfolio-overlay' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .abcbiz-elementor-portfolio-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        include 'RenderView.php';
    }

}