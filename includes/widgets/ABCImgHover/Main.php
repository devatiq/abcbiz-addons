<?php
namespace ABCBiz\Includes\Widgets\ABCImgHover;
if (!defined('ABSPATH')) exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;

class Main extends BaseWidget
{
    // define protected variables...
    protected $name = 'abcbiz-elementor-imghover';
    protected $title = 'ABC Image Hover';
    protected $icon = 'eicon-image-rollover abcbiz-multi-icon';
    protected $categories = [
        'abcbiz-category'
    ];
    protected $keywords = [
        'abc', 'image', 'hover',
    ];

    /**
     * Register the widget controls.
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'abcbiz_elementor_imghover_setting',
            [
                'label' => esc_html__('Image Setting', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

         //Img Hover Image
         $this->add_control(
			'abcbiz_elementor_imghover_image',
			[
				'label' => esc_html__( 'Choose Image', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

        //Image dimension
        $this->add_control(
			'abcbiz_elementor_imghover_image_dimension',
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
			'abcbiz_elementor_imghover_title_text',
			[
				'label' => esc_html__( 'Title Text', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Business Website Development', 'abcbiz-multi' ),
			]
		);

      
        //Sub Title text
        $this->add_control(
			'abcbiz_elementor_imghover_sub_title_text',
			[
				'label' => esc_html__( 'Sub Title Text', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Website Design', 'abcbiz-multi' ),
			]
		);

        //Img Hover Link
        $this->add_control(
			'abcbiz_elementor_imghover_link',
			[
				'label' => esc_html__( 'Img Hover Link', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => 'https://abcbizaddons.com/widgets/image-hover-elementor-widget/',
					'is_external' => true,
					'nofollow' => false,
				],
			]
		);
      
        $this->end_controls_section();//end setting


          // start of team member style section
          $this->start_controls_section(
            'abcbiz_elementor_imghover_style_section',
            [
                'label' => esc_html__('Style', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        
         //Image Width
         $this->add_responsive_control(
			'abcbiz_elementor_imghover_width',
			[
				'label' => esc_html__( 'Image Width', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px','%' ],
				'range' => [
					'px' => [
						'min' => 100,
						'max' => 1200,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 1000,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-img-hover-item img, {{WRAPPER}} .abcbiz-elementor-img-hover-item' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

         //Title top/bottom Position
         $this->add_responsive_control(
			'abcbiz_elementor_imghover_title_top_post',
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
					'{{WRAPPER}} h3.abcbiz-img-hover-title' => 'top: {{SIZE}}{{UNIT}};',
				],
			]
		);

         //Title left/right Position
         $this->add_responsive_control(
			'abcbiz_elementor_imghover_title_left_post',
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
					'{{WRAPPER}} h3.abcbiz-img-hover-title' => 'left: {{SIZE}}{{UNIT}};',
				],
			]
		);

         //Sub Title top/bottom Position
         $this->add_responsive_control(
			'abcbiz_elementor_imghover_sub_title_top_post',
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
					'{{WRAPPER}} p.abcbiz-img-hover-subtitle' => 'top: {{SIZE}}{{UNIT}};',
				],
			]
		);

         //Sub Title left/right Position
         $this->add_responsive_control(
			'abcbiz_elementor_imghover_sub_title_left_post',
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
					'{{WRAPPER}} p.abcbiz-img-hover-subtitle' => 'left: {{SIZE}}{{UNIT}};',
				],
			]
		);

         // Title typography 
         $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_imghover_title_typography',
                'label' => esc_html__('Title Typography', 'abcbiz-multi'),
                'selector' =>  '{{WRAPPER}} h3.abcbiz-img-hover-title',
            ]
        );

         // Sub Title typography 
         $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_imghover_sub_title_typography',
                'label' => esc_html__('Sub Title Typography', 'abcbiz-multi'),
                'selector' =>  '{{WRAPPER}} p.abcbiz-img-hover-subtitle',
            ]
        );

        // Title color
        $this->add_control(
            'abcbiz_elementor_imghover_title_color',
            [
                'label' => esc_html__('Title Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} h3.abcbiz-img-hover-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Sub Title color
        $this->add_control(
            'abcbiz_elementor_imghover_sub_title_color',
            [
                'label' => esc_html__('Sub Title Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#cccccc',
                'selectors' => [
                    '{{WRAPPER}} p.abcbiz-img-hover-subtitle' => 'color: {{VALUE}};',
                ],
            ]
        ); 

        // Overflow color
        $this->add_control(
            'abcbiz_elementor_imghover_overflow_color',
            [
                'label' => esc_html__('Overflow Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => 'rgba(0, 0, 0, 0.5)',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-img-hover-overlay' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Image Border
        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'abcbiz_elementor_imghover_img_border',
				'selector' => '{{WRAPPER}} .abcbiz-elementor-img-hover-item img',
			]
		);

        // Image Border Radius
        $this->add_control(
			'abcbiz_elementor_imghover_img_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'default' => [
					'top' => 0,
					'right' => 0,
					'bottom' => 0,
					'left' => 0,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-elementor-img-hover-item img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .abcbiz-img-hover-overlay' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .abcbiz-elementor-img-hover-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
