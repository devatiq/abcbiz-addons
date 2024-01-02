<?php
namespace ABCBiz\Includes\Widgets\ABCTagInfo;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;

class Main extends BaseWidget
{
    // define protected variables...
    protected $name = 'abcbiz-tag-info';
    protected $title = 'ABC Post Tags';
    protected $icon = 'eicon-tags';
    protected $categories = [
        'abcbiz-category'
    ];

    protected $keywords = [
        'abc', 'tag', 'post'
    ];

    /**
     * Register the widget controls.
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'abcbiz_elementor_post_tag_setting',
            [
                'label' => esc_html__('Setting', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        //Alignment
		$this->add_responsive_control(
			'abcbiz_elementor_post_tag_align',
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
					'{{WRAPPER}} .abcbiz-ele-post-tag' => 'text-align: {{VALUE}}',
				],
			]
		);

        $this->end_controls_section();

        // blog info style section
        $this->start_controls_section(
            'abcbiz_elementor_post_tag_style_section',
            [
                'label' => esc_html__('Category Style', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        //Tag Padding
        $this->add_responsive_control(
			'abcbiz_elementor_post_tag_padding',
			[
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'label' => esc_html__( 'Tags Padding', 'abcbiz-multi' ),
				'size_units' => ['px'],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-ele-post-tag ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        //Tag margin
        $this->add_responsive_control(
			'abcbiz_elementor_post_tag_margin',
			[
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'label' => esc_html__( 'Tags Margin', 'abcbiz-multi' ),
				'size_units' => ['px'],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-ele-post-tag ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        //Tag border radius
        $this->add_responsive_control(
			'abcbiz_elementor_post_tag_border_radius',
			[
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'label' => esc_html__( 'Border Radius', 'abcbiz-multi' ),
				'size_units' => ['px'],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-ele-post-tag ul li a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        //blog info typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_post_tag_typography',
                'label' => esc_html__('Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-ele-post-tag',
            ]
        );

        // text color
        $this->add_control(
            'abcbiz_elementor_post_tag_color',
            [
                'label' => esc_html__('Text Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#444444',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-post-tag ul li a' => 'color: {{VALUE}};',
                ],
            ]
        );

         // text bg color
         $this->add_control(
            'abcbiz_elementor_post_tag_bg_color',
            [
                'label' => esc_html__('Text Background Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#e3e3e3',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-post-tag ul li a' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // hover color
        $this->add_control(
            'abcbiz_elementor_post_tag_hover_color',
            [
                'label' => esc_html__('Hover Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#e3e3e3',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-post-tag ul li a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        // hover bg color
        $this->add_control(
            'abcbiz_elementor_post_tag_hover_bg_color',
            [
                'label' => esc_html__('Hover Background Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#444444',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-post-tag ul li a:hover' => 'background-color: {{VALUE}};',
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