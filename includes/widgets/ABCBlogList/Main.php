<?php
namespace ABCBiz\Includes\Widgets\ABCBlogList;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;

class Main extends BaseWidget
{
    // define protected variables...
    protected $name = 'abcbiz-blog-list';
    protected $title = 'ABC Blog Posts List';
    protected $icon = 'eicon-post-list  abcbiz-multi-icon';
    protected $categories = [
        'abcbiz-category'
    ];

    protected $keywords = [
        'abc', 'blog', 'list', 'post'
    ];

    /**
     * Register the widget controls.
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'abcbiz_elementor_blog_list_setting',
            [
                'label' => esc_html__('Blog Setting', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

         //category selection
    $this->add_control(
        'abcbiz_elementor_blog_list_category',
        [
            'label' => esc_html__( 'Select Category', 'abcbiz-multi' ),
            'type' => \Elementor\Controls_Manager::SELECT2,
            'options' => $this->abcbiz_blog_list_categories(),
            'default' => 'all',
            'label_block' => true,
            'multiple' => false,
        ]
    );

        //number of post
        $this->add_control(
			'abcbiz_elementor_blog_list_post_number',
			[
				'label' => esc_html__( 'Number of Post', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['custom'],
				'range' => [
					'custom' => [
						'min' => 3,
						'max' => 30,
						'step' => 5,
					]
				],
				'default' => [
					'size' => 6,
				],
			]
		);

        //Featured Image
        $this->add_control(
            'abcbiz_elementor_blog_list_img_switch',
            [
                'label' => esc_html__('Featured Image', 'abcbiz-multi'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'abcbiz-multi'),
                'label_off' => esc_html__('Hide', 'abcbiz-multi'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        //blog date on/off switch
        $this->add_control(
            'abcbiz_elementor_blog_list_date_switch',
            [
                'label' => esc_html__('Blog Date', 'abcbiz-multi'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'abcbiz-multi'),
                'label_off' => esc_html__('Hide', 'abcbiz-multi'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        //blog comment on/off switch
        $this->add_control(
            'abcbiz_elementor_blog_list_comment_switch',
            [
                'label' => esc_html__('Blog Comments', 'abcbiz-multi'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'abcbiz-multi'),
                'label_off' => esc_html__('Hide', 'abcbiz-multi'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        //Excerpt
        $this->add_control(
            'abcbiz_elementor_blog_list_excerpt_switch',
            [
                'label' => esc_html__('Blog Excerpt', 'abcbiz-multi'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'abcbiz-multi'),
                'label_off' => esc_html__('Hide', 'abcbiz-multi'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        //Excerpt leangth
        $this->add_control(
			'abcbiz_elementor_blog_list_excerpt_length',
			[
				'label' => esc_html__( 'Excerpt Length', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 5,
				'max' => 500,
				'step' => 5,
				'default' => 25,
                'condition' => [
                    'abcbiz_elementor_blog_list_excerpt_switch' => 'yes'
                ],
			]
		);

         //More Button
         $this->add_control(
            'abcbiz_elementor_blog_list_read_more_switch',
            [
                'label' => esc_html__('More Button', 'abcbiz-multi'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'abcbiz-multi'),
                'label_off' => esc_html__('Hide', 'abcbiz-multi'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        //More Button Text
        $this->add_control(
            'abcbiz_elementor_blog_list_read_more_text',
            [
                'label' => esc_html__('More Button Text', 'abcbiz-multi'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Read More',
                'placeholder' => 'Enter read more text',
                'condition' => [
                    'abcbiz_elementor_blog_list_read_more_switch' => 'yes',
                ],
            ]
        );

        //Pagination
        $this->add_control(
            'abcbiz_elementor_blog_list_pagination',
            [
                'label' => esc_html__('Pagination', 'abcbiz-multi'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'abcbiz-multi'),
                'label_off' => esc_html__('Hide', 'abcbiz-multi'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->end_controls_section(); //end blog grid setting control

        // blog grid style section
        $this->start_controls_section(
            'abcbiz_elementor_blog_list_title_style_section',
            [
                'label' => esc_html__('Title Style', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

          //blog title typography
          $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_blog_list_title_typography',
                'label' => esc_html__('Title Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-ele-blog-list-title, {{WRAPPER}} .abcbiz-ele-blog-list-title a',
            ]
        );

        $this->start_controls_tabs(
			'abcbiz_elementor_blog_list_title_style_tabs'
		);

		$this->start_controls_tab(
			'abcbiz_elementor_blog_list_title_style_normal_tab',
			[
				'label' => esc_html__( 'Title Color', 'abcbiz-multi' ),
			]
		);

		// blog title color
        $this->add_control(
            'abcbiz_elementor_blog_list_title_color',
            [
                'label' => esc_html__('Title Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#333333',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-blog-list-title a' => 'color: {{VALUE}};',
                ],
            ]
        );

		$this->end_controls_tab();

		$this->start_controls_tab(
			'abcbiz_elementor_blog_list_title_style_hover_tab',
			[
				'label' => esc_html__( 'Hover Color', 'abcbiz-multi' ),
			]
		);

        // blog title hover color
        $this->add_control(
            'abcbiz_elementor_blog_list_title_hover_color',
            [
                'label' => esc_html__('Title Hover Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#59a818',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-blog-list-title a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section(); // end title style

        // blog grid meta style section
        $this->start_controls_section(
            'abcbiz_elementor_blog_list_meta_style_section',
            [
                'label' => esc_html__('Meta Style', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

          //blog meta typography
          $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_blog_list_meta_typography',
                'label' => esc_html__('Meta Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-ele-blog-list-meta',
            ]
        );

        // blog meta color
        $this->add_control(
            'abcbiz_elementor_blog_list_meta_color',
            [
                'label' => esc_html__('Meta Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#666666',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-blog-list-meta, .abcbiz-ele-blog-list-meta a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section(); // end meta style

        // blog grid excerpt style section
        $this->start_controls_section(
            'abcbiz_elementor_blog_list_excerpt_style_section',
            [
                'label' => esc_html__('Excerpt Style', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'abcbiz_elementor_blog_list_excerpt_switch' => 'yes'
                ],
            ]
        );

          //blog excerpt typography
          $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_blog_list_excerpt_typography',
                'label' => esc_html__('Excerpt Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-ele-blog-list-excerpt',
            ]
        );

        // blog excerpt color
        $this->add_control(
            'abcbiz_elementor_blog_list_excerpt_color',
            [
                'label' => esc_html__('Excerpt Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#3d3d3d',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-blog-list-excerpt, .abcbiz-ele-blog-list-excerpt a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section(); // end excerpt style

        // button style section
        $this->start_controls_section(
            'abcbiz_elementor_blog_list_button_style_section',
            [
                'label' => esc_html__('Button Style', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'abcbiz_elementor_blog_list_read_more_switch' => 'yes'
                ],
            ]
        );

          //button typography
          $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_blog_list_button_typography',
                'label' => esc_html__('Button Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-ele-blog-list-more',
            ]
        );

        $this->start_controls_tabs(
			'abcbiz_elementor_blog_list_button_style_tabs'
		);

		$this->start_controls_tab(
			'abcbiz_elementor_blog_list_button_style_normal_tab',
			[
				'label' => esc_html__( 'Button Color', 'abcbiz-multi' ),
			]
		);

		// Button color
        $this->add_control(
            'abcbiz_elementor_blog_list_button_color',
            [
                'label' => esc_html__('Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#59a818',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-blog-list-more a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .abcbiz-ele-blog-list-more a:after' => 'border-bottom-color: {{VALUE}};',
                ],
            ]
        );

		$this->end_controls_tab();

		$this->start_controls_tab(
			'abcbiz_elementor_blog_list_button_style_hover_tab',
			[
				'label' => esc_html__( 'Hover Color', 'abcbiz-multi' ),
			]
		);

        // Button Hover color
        $this->add_control(
            'abcbiz_elementor_blog_list_button_hover_color',
            [
                'label' => esc_html__('Hover Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#3d3d3d',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-blog-list-more a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .abcbiz-ele-blog-list-more a:hover:after' => 'border-bottom-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
		$this->end_controls_tabs();
        $this->end_controls_section(); // end button style

         // Image style section
         $this->start_controls_section(
            'abcbiz_elementor_blog_list_image_style_section',
            [
                'label' => esc_html__('Image Style', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'abcbiz_elementor_blog_list_img_switch' => 'yes'
                ],
            ]
        );

        	//Image Width
		$this->add_responsive_control(
            'abcbiz_elementor_blog_list_image_width',
            [
                'label' => esc_html__( 'Image Width', 'abcbiz-multi' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px'],
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 500,
                        'step' => 5,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 200,
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-blog-list-thumb' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        //Image Border
        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'abcbiz_elementor_blog_list_image_width_border',
				'selector' => '{{WRAPPER}} .abcbiz-ele-blog-list-thumb figure img',
			]
		);

        //Image Border Radius
        $this->add_control(
			'abcbiz_elementor_blog_list_image_width_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px'],
				'default' => [
					'top' => 3,
					'right' => 3,
					'bottom' => 3,
					'left' => 3,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .abcbiz-ele-blog-list-thumb figure img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section(); // end image style

         // Pagination style section
         $this->start_controls_section(
            'abcbiz_elementor_blog_list_pagination_style_section',
            [
                'label' => esc_html__('Pagination Style', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'abcbiz_elementor_blog_list_pagination' => 'yes'
                ],
            ]
        );

          //Pagination typography
          $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_blog_list_pagination_typography',
                'label' => esc_html__('Pagination Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-ele-blog-list-pagi-container',
            ]
        );

        // Spacing
        $this->add_responsive_control(
            'abcbiz_elementor_blog_list_pagination_spacing',
            [
                'label' => esc_html__('Spacing', 'abcbiz-multi'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 250,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-blog-list-pagi-container' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Padding fields
        $this->add_responsive_control(
            'abcbiz_elementor_blog_list_pagination_padding',
            [
                'label' => esc_html__('Padding', 'abcbiz-multi'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px'],
                'default' => [
                    'top' => 5,
                    'right' => 10,
                    'bottom' => 5,
                    'left' => 10,
                    'unit' => 'px',
                    'isLinked' => true,
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-blog-list-pagi-container a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .abcbiz-ele-blog-list-pagi-container .current' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Border fields
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'abcbiz_elementor_blog_list_pagination_border',
                'label' => esc_html__('Border', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-ele-blog-list-pagi-container a,{{WRAPPER}} .abcbiz-ele-blog-list-pagi-container .current',
            ]
        );

        // Border Radius fields
        $this->add_responsive_control(
            'abcbiz_elementor_blog_list_pagination_border_radius',
            [
                'label' => esc_html__('Border Radius', 'abcbiz-multi'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'default' => [
                    'top' => 5,
                    'right' => 5,
                    'bottom' => 5,
                    'left' => 5,
                    'unit' => 'px',
                    'isLinked' => true,
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-blog-list-pagi-container a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .abcbiz-ele-blog-list-pagi-container .current' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs(
			'abcbiz_elementor_blog_list_pagination_style_tabs'
		);

		$this->start_controls_tab(
			'abcbiz_elementor_blog_list_pagination_style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'abcbiz-multi' ),
			]
		);

		// Text color
        $this->add_control(
            'abcbiz_elementor_blog_list_pagi_text_color',
            [
                'label' => esc_html__('Text Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#333333',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-blog-list-pagi-container a' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Text Bg color
        $this->add_control(
            'abcbiz_elementor_blog_list_pagi_text_bg_color',
            [
                'label' => esc_html__('Background Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#eeeeee',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-blog-list-pagi-container a' => 'background-color: {{VALUE}};',
                ],
            ]
        );
		$this->end_controls_tab();

		$this->start_controls_tab(
			'abcbiz_elementor_blog_list_pagination_style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'abcbiz-multi' ),
			]
		);

        // Hover color
        $this->add_control(
            'abcbiz_elementor_blog_list_pagi_text_hover_color',
            [
                'label' => esc_html__('Hover Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-blog-list-pagi-container a:hover,{{WRAPPER}} .abcbiz-ele-blog-list-pagi-container .current' => 'color: {{VALUE}};',
                ],
            ]
        );

         // Hover bg color
         $this->add_control(
            'abcbiz_elementor_blog_list_pagi_text_hover_bg_color',
            [
                'label' => esc_html__('Hover Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#59a818',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-blog-list-pagi-container a:hover,{{WRAPPER}} .abcbiz-ele-blog-list-pagi-container .current' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        // Hover border color
        $this->add_control(
            'abcbiz_elementor_blog_list_pagi_border_hover_color',
            [
                'label' => esc_html__('Border Hover Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#333333',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-blog-list-pagi-container a:hover, {{WRAPPER}} .abcbiz-ele-blog-list-pagi-container .current' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_tab();
		$this->end_controls_tabs();
        $this->end_controls_section(); // end pagination style

    }

     //get blog category
     private function abcbiz_blog_list_categories() {
        $categories = get_categories();
        $options = [ 'all' => 'All Categories' ];
    
        foreach ( $categories as $category ) {
            $options[ $category->term_id ] = $category->name;
        }
    
        return $options;
    }

    /**
     * Render the widget output on the frontend.
     */
    protected function render()
    {
        include 'RenderView.php';
    }


}