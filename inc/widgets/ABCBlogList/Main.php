<?php
namespace Inc\Widgets\ABCBlogList;

use Inc\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;

class Main extends BaseWidget
{
    // define protected variables...
    protected $name = 'abc-blog-list';
    protected $title = 'ABC Blog Posts List';
    protected $icon = 'eicon-post-list';
    protected $categories = [
        'abc-category'
    ];

    protected $keywords = [
        'abc', 'blog', 'list', 'post'
    ];

    /**
     * Register the widget controls.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'abc_elementor_blog_list_setting',
            [
                'label' => __('Blog Setting', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

         //category selection
    $this->add_control(
        'abc_elementor_blog_list_category',
        [
            'label' => esc_html__( 'Select Category', 'abcbiz-multi' ),
            'type' => \Elementor\Controls_Manager::SELECT2,
            'options' => $this->get_blog_list_categories(),
            'default' => 'all',
            'label_block' => true,
            'multiple' => false,
        ]
    );

        //number of post
        $this->add_control(
			'abc_elementor_blog_list_post_number',
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
            'abc_elementor_blog_list_img_switch',
            [
                'label' => __('Featured Image', 'abcbiz-multi'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'abcbiz-multi'),
                'label_off' => __('Hide', 'abcbiz-multi'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        //blog date on/off switch
        $this->add_control(
            'abc_elementor_blog_list_date_switch',
            [
                'label' => __('Blog Date', 'abcbiz-multi'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'abcbiz-multi'),
                'label_off' => __('Hide', 'abcbiz-multi'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        //blog comment on/off switch
        $this->add_control(
            'abc_elementor_blog_list_comment_switch',
            [
                'label' => __('Blog Comments', 'abcbiz-multi'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'abcbiz-multi'),
                'label_off' => __('Hide', 'abcbiz-multi'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        //Excerpt
        $this->add_control(
            'abc_elementor_blog_list_excerpt_switch',
            [
                'label' => __('Blog Excerpt', 'abcbiz-multi'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'abcbiz-multi'),
                'label_off' => __('Hide', 'abcbiz-multi'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

         //More Button
         $this->add_control(
            'abc_elementor_blog_list_read_more_switch',
            [
                'label' => __('More Button', 'abcbiz-multi'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'abcbiz-multi'),
                'label_off' => __('Hide', 'abcbiz-multi'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        //More Button Text
        $this->add_control(
            'abc_elementor_blog_list_read_more_text',
            [
                'label' => __('More Button Text', 'abcbiz-multi'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Read More',
                'placeholder' => 'Enter read more text',
                'condition' => [
                    'abc_elementor_blog_list_read_more_switch' => 'yes',
                ],
            ]
        );

        //Pagination
        $this->add_control(
            'abc_elementor_blog_list_pagination',
            [
                'label' => __('Pagination', 'abcbiz-multi'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'abcbiz-multi'),
                'label_off' => __('Hide', 'abcbiz-multi'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->end_controls_section(); //end blog grid setting control

        // blog grid style section
        $this->start_controls_section(
            'abc_elementor_blog_list_title_style_section',
            [
                'label' => __('Title Style', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

          //blog title typography
          $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abc_elementor_blog_list_title_typography',
                'label' => __('Title Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abc-ele-blog-list-title',
            ]
        );

        $this->start_controls_tabs(
			'abc_elementor_blog_list_title_style_tabs'
		);

		$this->start_controls_tab(
			'abc_elementor_blog_list_title_style_normal_tab',
			[
				'label' => esc_html__( 'Title Color', 'abcbiz-multi' ),
			]
		);

		// blog title color
        $this->add_control(
            'abc_elementor_blog_list_title_color',
            [
                'label' => __('Title Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#333333',
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-blog-list-title a' => 'color: {{VALUE}};',
                ],
            ]
        );

		$this->end_controls_tab();

		$this->start_controls_tab(
			'abc_elementor_blog_list_title_style_hover_tab',
			[
				'label' => esc_html__( 'Hover Color', 'abcbiz-multi' ),
			]
		);

        // blog title hover color
        $this->add_control(
            'abc_elementor_blog_list_title_hover_color',
            [
                'label' => __('Title Hover Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#59a818',
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-blog-list-title a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section(); // end title style

        // blog grid meta style section
        $this->start_controls_section(
            'abc_elementor_blog_list_meta_style_section',
            [
                'label' => __('Meta Style', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

          //blog meta typography
          $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abc_elementor_blog_list_meta_typography',
                'label' => __('Meta Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abc-ele-blog-list-meta',
            ]
        );

        // blog meta color
        $this->add_control(
            'abc_elementor_blog_list_meta_color',
            [
                'label' => __('Meta Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#666666',
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-blog-list-meta, .abc-ele-blog-list-meta a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section(); // end meta style

        // blog grid excerpt style section
        $this->start_controls_section(
            'abc_elementor_blog_list_excerpt_style_section',
            [
                'label' => __('Excerpt Style', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'abc_elementor_blog_list_excerpt_switch' => 'yes'
                ],
            ]
        );

          //blog excerpt typography
          $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abc_elementor_blog_list_excerpt_typography',
                'label' => __('Excerpt Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abc-ele-blog-list-excerpt',
            ]
        );

        // blog excerpt color
        $this->add_control(
            'abc_elementor_blog_list_excerpt_color',
            [
                'label' => __('Excerpt Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#3d3d3d',
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-blog-list-excerpt, .abc-ele-blog-list-excerpt a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section(); // end excerpt style

        // button style section
        $this->start_controls_section(
            'abc_elementor_blog_list_button_style_section',
            [
                'label' => __('Button Style', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'abc_elementor_blog_list_read_more_switch' => 'yes'
                ],
            ]
        );

          //button typography
          $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abc_elementor_blog_list_button_typography',
                'label' => __('Button Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abc-ele-blog-list-more',
            ]
        );

        $this->start_controls_tabs(
			'abc_elementor_blog_list_button_style_tabs'
		);

		$this->start_controls_tab(
			'abc_elementor_blog_list_button_style_normal_tab',
			[
				'label' => esc_html__( 'Button Color', 'abcbiz-multi' ),
			]
		);

		// Button color
        $this->add_control(
            'abc_elementor_blog_list_button_color',
            [
                'label' => __('Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#59a818',
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-blog-list-more a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .abc-ele-blog-list-more a:after' => 'border-bottom-color: {{VALUE}};',
                ],
            ]
        );

		$this->end_controls_tab();

		$this->start_controls_tab(
			'abc_elementor_blog_list_button_style_hover_tab',
			[
				'label' => esc_html__( 'Hover Color', 'abcbiz-multi' ),
			]
		);

        // Button Hover color
        $this->add_control(
            'abc_elementor_blog_list_button_hover_color',
            [
                'label' => __('Hover Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#3d3d3d',
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-blog-list-more a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .abc-ele-blog-list-more a:hover:after' => 'border-bottom-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
		$this->end_controls_tabs();
        $this->end_controls_section(); // end button style

         // Pagination style section
         $this->start_controls_section(
            'abc_elementor_blog_list_pagination_style_section',
            [
                'label' => __('Pagination Style', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'abc_elementor_blog_list_pagination' => 'yes'
                ],
            ]
        );

          //Pagination typography
          $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abc_elementor_blog_list_pagination_typography',
                'label' => __('Pagination Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abc-ele-blog-list-pagi-container',
            ]
        );

        $this->start_controls_tabs(
			'abc_elementor_blog_list_pagination_style_tabs'
		);

		$this->start_controls_tab(
			'abc_elementor_blog_list_pagination_style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'abcbiz-multi' ),
			]
		);

		// Text color
        $this->add_control(
            'abc_elementor_blog_list_pagi_text_color',
            [
                'label' => __('Text Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#333333',
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-blog-list-pagi-container a' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Text Bg color
        $this->add_control(
            'abc_elementor_blog_list_pagi_text_bg_color',
            [
                'label' => __('Background Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#eeeeee',
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-blog-list-pagi-container a' => 'background-color: {{VALUE}};',
                ],
            ]
        );

		$this->end_controls_tab();

		$this->start_controls_tab(
			'abc_elementor_blog_list_pagination_style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'abcbiz-multi' ),
			]
		);

        // Hover color
        $this->add_control(
            'abc_elementor_blog_list_pagi_text_hover_color',
            [
                'label' => __('Hover Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-blog-list-pagi-container a:hover, .abc-ele-blog-list-pagi-container .current' => 'color: {{VALUE}};',
                ],
            ]
        );

         // Hover bg color
         $this->add_control(
            'abc_elementor_blog_list_pagi_text_hover_bg_color',
            [
                'label' => __('Hover Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#59a818',
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-blog-list-pagi-container a:hover, .abc-ele-blog-list-pagi-container .current' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
		$this->end_controls_tabs();
        $this->end_controls_section(); // end pagination style

    }

     //get blog category
     private function get_blog_list_categories() {
        $categories = get_categories();
        $options = [ 'all' => 'All Categories' ];
    
        foreach ( $categories as $category ) {
            $options[ $category->term_id ] = $category->name;
        }
    
        return $options;
    }

    /**
     * Render the widget output on the frontend.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function render()
    {
        include 'RenderView.php';
    }


}