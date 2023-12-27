<?php
namespace Includes\Widgets\ABCPostInfo;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;

class Main extends BaseWidget
{
    // define protected variables...
    protected $name = 'abcbiz-post-info';
    protected $title = 'ABC Post Meta Info';
    protected $icon = 'eicon-post-info';
    protected $categories = [
        'abcbiz-category'
    ];

    protected $keywords = [
        'abc', 'post', 'info', 'meta'
    ];


    /**
     * Register the widget controls.
     * @since 1.0.0
     *
     * @access protected
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'abc_elementor_post_info_setting',
            [
                'label' => esc_html__('Post Info Setting', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        //blog date on/off switch
        $this->add_control(
            'abc_elementor_post_info_date_switch',
            [
                'label' => esc_html__('Date', 'abcbiz-multi'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'abcbiz-multi'),
                'label_off' => esc_html__('Hide', 'abcbiz-multi'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        //blog date on/off switch
        $this->add_control(
            'abc_elementor_post_info_author_switch',
            [
                'label' => esc_html__('Author', 'abcbiz-multi'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'abcbiz-multi'),
                'label_off' => esc_html__('Hide', 'abcbiz-multi'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        //blog comment on/off switch
        $this->add_control(
            'abc_elementor_post_info_comment_switch',
            [
                'label' => esc_html__('Comments', 'abcbiz-multi'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'abcbiz-multi'),
                'label_off' => esc_html__('Hide', 'abcbiz-multi'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        //Alignment
		$this->add_responsive_control(
			'abc_elementor_post_info_align',
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
					'{{WRAPPER}} .abcbiz-ele-post-info' => 'text-align: {{VALUE}}',
				],
			]
		);


        $this->end_controls_section();

        // blog info style section
        $this->start_controls_section(
            'abc_elementor_post_info_content_style_section',
            [
                'label' => esc_html__('Blog Info Style', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        //blog info typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abc_elementor_post_info_info_typography',
                'label' => esc_html__('Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-ele-post-info',
            ]
        );
        // blog info text color
        $this->add_control(
            'abc_elementor_post_info_info_color',
            [
                'label' => esc_html__('Info Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#d6d6d6',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-post-info, .abcbiz-ele-post-info a' => 'color: {{VALUE}};',
                ],
            ]
        );
        // blog info icon color
        $this->add_control(
            'abc_elementor_post_info_info_icon_color',
            [
                'label' => esc_html__('Icon Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#d6d6d6',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-post-info i' => 'color: {{VALUE}};',
                ],
            ]
        );
        // blog info icon size
        $this->add_responsive_control(
            'abc_elementor_post_info_info_icon_size',
            [
                'label' => esc_html__('Icon Size', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-post-info i' => 'font-size: {{SIZE}}{{UNIT}};',
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