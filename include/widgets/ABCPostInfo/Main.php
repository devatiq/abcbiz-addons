<?php
namespace Inc\Widgets\ABCPostInfo;

use Inc\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;

class Main extends BaseWidget
{
    // define protected variables...
    protected $name = 'abc-post-info';
    protected $title = 'ABC Post Info';
    protected $icon = 'eicon-post-info';
    protected $categories = [
        'abc-category'
    ];

    protected $keywords = [
        'abc', 'post', 'info',
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
                'label' => __('Post Info Setting', 'ABCMAFTH'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        //blog date on/off switch
        $this->add_control(
            'abc_elementor_post_info_date_switch',
            [
                'label' => __('Date', 'ABCMAFTH'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'ABCMAFTH'),
                'label_off' => __('Hide', 'ABCMAFTH'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        //blog date on/off switch
        $this->add_control(
            'abc_elementor_post_info_author_switch',
            [
                'label' => __('Author', 'ABCMAFTH'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'ABCMAFTH'),
                'label_off' => __('Hide', 'ABCMAFTH'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        //blog comment on/off switch
        $this->add_control(
            'abc_elementor_post_info_comment_switch',
            [
                'label' => __('Comments', 'ABCMAFTH'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'ABCMAFTH'),
                'label_off' => __('Hide', 'ABCMAFTH'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        //Alignment
		$this->add_responsive_control(
			'abc_elementor_post_info_align',
			[
				'label' => esc_html__( 'Alignment', 'ABCMAFTH'),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'center',
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
				'selectors' => [
					'{{WRAPPER}} .abc-ele-post-info' => 'text-align: {{VALUE}}',
				],
			]
		);


        $this->end_controls_section();

        // blog info style section
        $this->start_controls_section(
            'abc_elementor_post_info_content_style_section',
            [
                'label' => __('Blog Info Style', 'ABCMAFTH'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        //blog info typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abc_elementor_post_info_info_typography',
                'label' => __('Typography', 'ABCMAFTH'),
                'selector' => '{{WRAPPER}} .abc-ele-post-info',
            ]
        );
        // blog info text color
        $this->add_control(
            'abc_elementor_post_info_info_color',
            [
                'label' => __('Info Color', 'ABCMAFTH'),
                'type' => Controls_Manager::COLOR,
                'default' => '#d6d6d6',
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-post-info, .abc-ele-post-info a' => 'color: {{VALUE}};',
                ],
            ]
        );
        // blog info icon color
        $this->add_control(
            'abc_elementor_post_info_info_icon_color',
            [
                'label' => __('Icon Color', 'ABCMAFTH'),
                'type' => Controls_Manager::COLOR,
                'default' => '#d6d6d6',
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-post-info i' => 'color: {{VALUE}};',
                ],
            ]
        );
        // blog info icon size
        $this->add_responsive_control(
            'abc_elementor_post_info_info_icon_size',
            [
                'label' => __('Icon Size', 'ABCMAFTH'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-post-info i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
       
        $this->end_controls_section();


    }

    /**
     * Render the widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
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