<?php
namespace Inc\Widgets\ABCCatInfo;

use Inc\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;

class Main extends BaseWidget
{
    // define protected variables...
    protected $name = 'abc-cat-info';
    protected $title = 'ABC Post Category';
    protected $icon = 'eicon-apps';
    protected $categories = [
        'abc-category'
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
            'abc_elementor_post_cat_setting',
            [
                'label' => __('Setting', 'ABCMAFTH'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        //Alignment
		$this->add_responsive_control(
			'abc_elementor_post_cat_align',
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
					'{{WRAPPER}} .abc-ele-post-cat' => 'text-align: {{VALUE}}',
				],
			]
		);


        $this->end_controls_section();

        // blog info style section
        $this->start_controls_section(
            'abc_elementor_post_cat_style_section',
            [
                'label' => __('Category Style', 'ABCMAFTH'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        //blog info typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abc_elementor_post_cat_typography',
                'label' => __('Typography', 'ABCMAFTH'),
                'selector' => '{{WRAPPER}} .abc-ele-post-cat',
            ]
        );

        // text color
        $this->add_control(
            'abc_elementor_post_cat_color',
            [
                'label' => __('Text Color', 'ABCMAFTH'),
                'type' => Controls_Manager::COLOR,
                'default' => '#444444',
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-post-cat a' => 'color: {{VALUE}};',
                ],
            ]
        );

        // hover color
        $this->add_control(
            'abc_elementor_post_cat_hover_color',
            [
                'label' => __('Hover Color', 'ABCMAFTH'),
                'type' => Controls_Manager::COLOR,
                'default' => '#444444',
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-post-cat a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );


        // text color
        $this->add_control(
            'abc_elementor_post_cat_sep_color',
            [
                'label' => __('Separator Color', 'ABCMAFTH'),
                'type' => Controls_Manager::COLOR,
                'default' => '#444444',
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-category-separator' => 'color: {{VALUE}};',
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