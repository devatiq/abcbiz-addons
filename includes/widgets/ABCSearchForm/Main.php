<?php
namespace Inc\Widgets\ABCSearchForm;

use Inc\Widgets\BaseWidget;
use Elementor\Controls_Manager;

class Main extends BaseWidget
{
    // define protected variables...
    protected $name = 'abc-search-form';
    protected $title = 'ABC Search Form';
    protected $icon = 'eicon-search-bold';
    protected $categories = [
        'abc-category'
    ];

    protected $keywords = [
        'abc', 'search', 'form'
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
            'abc_elementor_search_form_setting',
            [
                'label' => __('Setting', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
			'abc_elementor_search_form_placeholder_text',
			[
				'label' => esc_html__( 'Placeholder Text', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Search...', 'abcbiz-multi' ),
			]
		);

        $this->add_control(
			'abc_elementor_search_form_btn_text',
			[
				'label' => esc_html__( 'Button Text', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Search', 'abcbiz-multi' ),
			]
		);

        $this->end_controls_section();

        // blog info style section
        $this->start_controls_section(
            'abc_elementor_search_form_style_section',
            [
                'label' => __('Style', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
            );

            // Border color
          $this->add_control(
            'abc_elementor_search_form_border_color',
            [
                'label' => __('Border Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#053D58',
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-search-form input[type=text]' => 'border-color: {{VALUE}};',
                ],
            ]
        );
		$this->add_control(
			'abc_elementor_search_form_btn_style',
			[
				'label' => esc_html__( 'Button Style', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->start_controls_tabs(
			'abc_elementor_search_form_style_tabs'
		);

		$this->start_controls_tab(
			'abc_elementor_search_form_style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'abcbiz-multi' ),
			]
		);

		$this->add_control(
			'abc_elementor_search_form_color',
			[
				'label' => esc_html__( 'Color', 'abcbiz-multi' ),
                'default' => '#ffffff',
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abc-ele-search-form input[type="submit"]' => 'color: {{VALUE}} !important;',
				],
			]
		);
		
        // Button Background color
        $this->add_control(
            'abc_elementor_search_form_btn_bg_color',
            [
                'label' => __('Background Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#053D58',
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-search-form input[type="submit"]' => 'background-color: {{VALUE}};',
                ],
            ]
        );

		$this->end_controls_tab();

		$this->start_controls_tab(
			'abc_elementor_search_form_style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'abcbiz-multi' ),
			]
		);
	
		$this->add_control(
			'abc_elementor_comment_form_reply_btn_hover_color',
			[
				'label' => esc_html__( 'Color', 'abcbiz-multi' ),
                'default' => '#ffffff',
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abc-ele-search-form input[type="submit"]:hover' => 'color: {{VALUE}}!important;',
				],
			]
		);
		
         $this->add_control(
            'abc_elementor_search_form_btn_bg_hover_color',
            [
                'label' => __('Background Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#053D58',
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-search-form input[type="submit"]:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        ); 

		$this->end_controls_tab();
		$this->end_controls_tabs();
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