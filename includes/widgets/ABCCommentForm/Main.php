<?php
namespace Includes\Widgets\ABCCommentForm;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Background;

class Main extends BaseWidget
{
    // define protected variables...
    protected $name = 'abcbiz-comment-form';
    protected $title = 'ABC Comment Form';
    protected $icon = 'eicon-commenting-o';
    protected $categories = [
        'abcbiz-category'
    ];

    protected $keywords = [
        'abc', 'comment', 'form'
    ];


    /**
     * Register the widget controls.
     * @since 1.0.0
     *
     * @access protected
     */
    protected function register_controls()
    {

        // Comment form style section
        $this->start_controls_section(
            'abcbiz_elementor_comment_form_style_section',
            [
                'label' => esc_html__('Form Content Style', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
            );

        // Title color
        $this->add_control(
            'abcbiz_elementor_comment_form_title_color',
            [
                'label' => esc_html__('Title Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#3d3d3d',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-comment-form h3.comments-title, .abcbiz-ele-comment-form h3#reply-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        //Title Typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_comment_form_title_typography',
                'label' => esc_html__('Title Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-ele-comment-form h3.comments-title, .abcbiz-ele-comment-form h3#reply-title',
            ]
        );


        // User name color
        $this->add_control(
            'abcbiz_elementor_comment_form_user_name_color',
            [
                'label' => esc_html__('User Name Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#3d3d3d',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-comment-form .fn a' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        //User name Typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_comment_user_name_typography',
                'label' => esc_html__('User Name Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-ele-comment-form .fn',
            ]
        );

         // Meta Data color
         $this->add_control(
            'abcbiz_elementor_comment_form_meta_data_color',
            [
                'label' => esc_html__('Meta Data Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#3d3d3d',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-comment-form .comment-metadata a' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

          //Meta Typography
          $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_comment_meta_data_typography',
                'label' => esc_html__('Meta Data Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-ele-comment-form .comment-metadata a',
            ]
        );

        // text color
                $this->add_control(
                    'abcbiz_elementor_comment_form_text_color',
                    [
                        'label' => esc_html__('Text Color', 'abcbiz-multi'),
                        'type' => Controls_Manager::COLOR,
                        'default' => '#444444',
                        'selectors' => [
                            '{{WRAPPER}} .abcbiz-ele-comment-form .comment-content, .abcbiz-ele-comment-form .comment-content a, .abcbiz-ele-comment-form .comment-notes, .abcbiz-ele-comment-form .logged-in-as, .abcbiz-ele-comment-form .logged-in-as a, .abcbiz-ele-comment-form label' => 'color: {{VALUE}} !important;',
                        ],
                    ]
                );

         //Text Typography
          $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_comment_text_typography',
                'label' => esc_html__('Text Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-ele-comment-form .comment-content',
            ]
        );
       
        $this->end_controls_section();

// reply button style 
		$this->start_controls_section(
			'abcbiz_elementor_comment_form_reply_button_style_section',
			[
				'label' => esc_html__( 'Reply Button', 'abcbiz-multi' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

        //Typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_form_reply_button_typography',
                'label' => esc_html__('Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-ele-comment-form .reply a',
            ]
        );

        $this->start_controls_tabs(
			'abcbiz_elementor_comment_form_reply_button_style_tabs'
		);

		$this->start_controls_tab(
			'abcbiz_elementor_comment_form_reply_button_style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'abcbiz-multi' ),
			]
		);

		$this->add_control(
			'abcbiz_elementor_comment_form_reply_button_color',
			[
				'label' => esc_html__( 'Color', 'abcbiz-multi' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abcbiz-ele-comment-form .reply a' => 'color: {{VALUE}} !important;',
				],
			]
		);
		$this->add_control(
			'abcbiz_elementor_comment_form_reply_button_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'abcbiz-multi' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abcbiz-ele-comment-form .reply a' => 'background-color: {{VALUE}} !important;',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'abcbiz_elementor_comment_form_reply_button_style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'abcbiz-multi' ),
			]
		);
	
		$this->add_control(
			'abcbiz_elementor_comment_form_reply_btn_hover_color',
			[
				'label' => esc_html__( 'Color', 'abcbiz-multi' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abcbiz-ele-comment-form .reply a:hover' => 'color: {{VALUE}}!important;',
				],
			]
		);
		$this->add_control(
			'abcbiz_elementor_comment_form_reply_btn_hover_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'abcbiz-multi' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abcbiz-ele-comment-form .reply a:hover' => 'background-color: {{VALUE}}!important;',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();
        
        // Comment button style 
		$this->start_controls_section(
			'abcbiz_elementor_comment_form_button_style_section',
			[
				'label' => esc_html__( 'Comment Button', 'abcbiz-multi' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

        //Typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_form_button_typography',
                'label' => esc_html__('Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-ele-comment-form .form-submit input[type="submit"]',
            ]
        );


        $this->start_controls_tabs(
			'abcbiz_elementor_comment_form_button_style_tabs'
		);

		$this->start_controls_tab(
			'abcbiz_elementor_comment_form_button_style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'abcbiz-multi' ),
			]
		);

		$this->add_control(
			'abcbiz_elementor_comment_form_button_color',
			[
				'label' => esc_html__( 'Color', 'abcbiz-multi' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abcbiz-ele-comment-form .form-submit input[type="submit"]' => 'color: {{VALUE}} !important;',
				],
			]
		);

        $this->add_control(
			'abcbiz_elementor_comment_form_button_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'abcbiz-multi' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abcbiz-ele-comment-form .form-submit input[type="submit"]' => 'background-color: {{VALUE}} !important;',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'abcbiz_elementor_comment_form_button_style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'abcbiz-multi' ),
			]
		);
	
		$this->add_control(
			'abcbiz_elementor_comment_form_btn_hover_color',
			[
				'label' => esc_html__( 'Color', 'abcbiz-multi' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abcbiz-ele-comment-form .form-submit input[type="submit"]:hover' => 'color: {{VALUE}} !important;',
				],
			]
		);

        $this->add_control(
			'abcbiz_elementor_comment_form_btn_hover_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'abcbiz-multi' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .abcbiz-ele-comment-form .form-submit input[type="submit"]:hover' => 'background-color: {{VALUE}} !important;',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section(); // end content style

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

