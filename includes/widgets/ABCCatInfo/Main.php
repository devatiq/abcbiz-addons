<?php
namespace ABCBiz\Includes\Widgets\ABCCatInfo;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

class Main extends BaseWidget
{
    // define protected variables...
    protected $name = 'abcbiz-cat-info';
    protected $title = 'ABC Post Category';
    protected $icon = 'eicon-apps';
    protected $categories = [
        'abcbiz-category'
    ];

    protected $keywords = [
        'abc', 'category', 'post'
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
            'abcbiz_elementor_post_cat_setting',
            [
                'label' => esc_html__('Setting', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        //Alignment
		$this->add_responsive_control(
			'abcbiz_elementor_post_cat_align',
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
					'{{WRAPPER}} .abcbiz-ele-post-cat' => 'text-align: {{VALUE}}',
				],
			]
		);

        $this->end_controls_section();

        // blog info style section
        $this->start_controls_section(
            'abcbiz_elementor_post_cat_style_section',
            [
                'label' => esc_html__('Category Style', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        //blog info typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_post_cat_typography',
                'label' => esc_html__('Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-ele-post-cat',
            ]
        );

        // text color
        $this->add_control(
            'abcbiz_elementor_post_cat_color',
            [
                'label' => esc_html__('Text Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#444444',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-post-cat a' => 'color: {{VALUE}};',
                ],
            ]
        );

        // hover color
        $this->add_control(
            'abcbiz_elementor_post_cat_hover_color',
            [
                'label' => esc_html__('Hover Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#444444',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-post-cat a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        // text color
        $this->add_control(
            'abcbiz_elementor_post_cat_sep_color',
            [
                'label' => esc_html__('Separator Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#444444',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-category-separator' => 'color: {{VALUE}};',
                ],
            ]
        );
       
        $this->end_controls_section();
    }

    /**
     * Render the widget output on the frontend.
     * @since 1.0.0
     *
     * @access protected
     */
    protected function render()
    {
        //load render view to show widget output on frontend/website.
        include 'RenderView.php';
    }

}