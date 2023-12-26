<?php
namespace Inc\Widgets\ABCTagInfo;

use Inc\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;

class Main extends BaseWidget
{
    // define protected variables...
    protected $name = 'abc-tag-info';
    protected $title = 'ABC Post Tags';
    protected $icon = 'eicon-tags';
    protected $categories = [
        'abc-category'
    ];

    protected $keywords = [
        'abc', 'tag', 'post'
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
            'abc_elementor_post_tag_setting',
            [
                'label' => __('Setting', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        //Alignment
		$this->add_responsive_control(
			'abc_elementor_post_tag_align',
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
					'{{WRAPPER}} .abc-ele-post-tag' => 'text-align: {{VALUE}}',
				],
			]
		);


        $this->end_controls_section();

        // blog info style section
        $this->start_controls_section(
            'abc_elementor_post_tag_style_section',
            [
                'label' => __('Category Style', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        //blog info typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abc_elementor_post_tag_typography',
                'label' => __('Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abc-ele-post-tag',
            ]
        );

        // text color
        $this->add_control(
            'abc_elementor_post_tag_color',
            [
                'label' => __('Text Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#444444',
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-post-tag ul li a' => 'color: {{VALUE}};',
                ],
            ]
        );

         // text bg color
         $this->add_control(
            'abc_elementor_post_tag_bg_color',
            [
                'label' => __('Text Background Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#e3e3e3',
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-post-tag ul li a' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // hover color
        $this->add_control(
            'abc_elementor_post_tag_hover_color',
            [
                'label' => __('Hover Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#e3e3e3',
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-post-tag ul li a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        // hover bg color
        $this->add_control(
            'abc_elementor_post_tag_hover_bg_color',
            [
                'label' => __('Hover Background Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#444444',
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-post-tag ul li a:hover' => 'background-color: {{VALUE}};',
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