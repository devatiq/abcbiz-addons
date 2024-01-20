<?php
namespace ABCBiz\Includes\Widgets\ABCBlogGrid;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;

class Main extends BaseWidget
{
    // define protected variables...
    protected $name = 'abcbiz-blog-grid';
    protected $title = 'ABC Blog Posts Grid';
    protected $icon = 'eicon-posts-grid  abcbiz-multi-icon';
    protected $categories = [
        'abcbiz-category'
    ];

    protected $keywords = [
        'abc', 'blog', 'grid', 'post'
    ];

    /**
     * Register the widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'abcbiz_elementor_blog_grid_setting',
            [
                'label' => esc_html__('Blog Setting', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

         //blog layout
         $this->add_control(
            'abcbiz_elementor_blog_grid_layout',
            [
                'label' => esc_html__('Blog Layout', 'abcbiz-multi'),
                'type' => Controls_Manager::SELECT,
                'default' => 'three-column',
                'options' => [
                'two-column' => esc_html__('Two Colum', 'abcbiz-multi'),
                'three-column' => esc_html__('Three Colum', 'abcbiz-multi'),
                'four-column' => esc_html__('Four Colum', 'abcbiz-multi'),
                ],
            ]
        );

         //category selection
    $this->add_control(
        'abcbiz_elementor_blog_grid_category',
        [
            'label' => esc_html__( 'Select Category', 'abcbiz-multi' ),
            'type' => \Elementor\Controls_Manager::SELECT2,
            'options' => $this->abcbiz_get_blog_categories(),
            'default' => 'all',
            'label_block' => true,
            'multiple' => false,
        ]
    );

        //number of post
        $this->add_control(
			'abcbiz_elementor_blog_grid_post_number',
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
            'abcbiz_elementor_blog_grid_img_switch',
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
            'abcbiz_elementor_blog_grid_date_switch',
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
            'abcbiz_elementor_blog_grid_comment_switch',
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
            'abcbiz_elementor_blog_grid_excerpt_switch',
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
			'abcbiz_elementor_blog_grid_excerpt_length',
			[
				'label' => esc_html__( 'Excerpt Length', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 5,
				'max' => 500,
				'step' => 5,
				'default' => 25,
                'condition' => [
                    'abcbiz_elementor_blog_grid_excerpt_switch' => 'yes'
                ],
			]
		);

         //More Button
         $this->add_control(
            'abcbiz_elementor_blog_grid_read_more_switch',
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
            'abcbiz_elementor_blog_grid_read_more_text',
            [
                'label' => esc_html__('More Button Text', 'abcbiz-multi'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Read More',
                'placeholder' => 'Enter read more text',
                'condition' => [
                    'abcbiz_elementor_blog_grid_read_more_switch' => 'yes',
                ],
            ]
        );

        //Pagination
        $this->add_control(
            'abcbiz_elementor_blog_grid_pagination',
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
            'abcbiz_elementor_blog_grid_title_style_section',
            [
                'label' => esc_html__('Title Style', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

          //blog title typography
          $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_blog_grid_title_typography',
                'label' => esc_html__('Title Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-ele-blog-title, {{WRAPPER}} .abcbiz-ele-blog-title a',
            ]
        );

        $this->start_controls_tabs(
			'abcbiz_elementor_blog_grid_title_style_tabs'
		);

		$this->start_controls_tab(
			'abcbiz_elementor_blog_grid_title_style_normal_tab',
			[
				'label' => esc_html__( 'Title Color', 'abcbiz-multi' ),
			]
		);

		// blog title color
        $this->add_control(
            'abcbiz_elementor_blog_grid_title_color',
            [
                'label' => esc_html__('Title Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#333333',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-blog-title a' => 'color: {{VALUE}};',
                ],
            ]
        );

		$this->end_controls_tab();

		$this->start_controls_tab(
			'abcbiz_elementor_blog_grid_title_style_hover_tab',
			[
				'label' => esc_html__( 'Hover Color', 'abcbiz-multi' ),
			]
		);

        // blog title hover color
        $this->add_control(
            'abcbiz_elementor_blog_grid_title_hover_color',
            [
                'label' => esc_html__('Title Hover Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#59a818',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-blog-title a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section(); // end title style

        // blog grid meta style section
        $this->start_controls_section(
            'abcbiz_elementor_blog_grid_meta_style_section',
            [
                'label' => esc_html__('Meta Style', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

          //blog meta typography
          $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_blog_grid_meta_typography',
                'label' => esc_html__('Meta Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-ele-blog-meta',
            ]
        );

        // blog meta color
        $this->add_control(
            'abcbiz_elementor_blog_grid_meta_color',
            [
                'label' => esc_html__('Meta Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#666666',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-blog-meta, .abcbiz-ele-blog-meta a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section(); // end meta style

        // blog grid excerpt style section
        $this->start_controls_section(
            'abcbiz_elementor_blog_grid_excerpt_style_section',
            [
                'label' => esc_html__('Excerpt Style', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'abcbiz_elementor_blog_grid_excerpt_switch' => 'yes'
                ],
            ]
        );

          //blog excerpt typography
          $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_blog_grid_excerpt_typography',
                'label' => esc_html__('Excerpt Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-ele-blog-excerpt',
            ]
        );

        // blog excerpt color
        $this->add_control(
            'abcbiz_elementor_blog_grid_excerpt_color',
            [
                'label' => esc_html__('Excerpt Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#3d3d3d',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-blog-excerpt, .abcbiz-ele-blog-excerpt a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section(); // end excerpt style

        // button style section
        $this->start_controls_section(
            'abcbiz_elementor_blog_grid_button_style_section',
            [
                'label' => esc_html__('Button Style', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'abcbiz_elementor_blog_grid_read_more_switch' => 'yes'
                ],
            ]
        );

          //button typography
          $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_blog_grid_button_typography',
                'label' => esc_html__('Button Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-ele-blog-more',
            ]
        );

        $this->start_controls_tabs(
			'abcbiz_elementor_blog_grid_button_style_tabs'
		);

		$this->start_controls_tab(
			'abcbiz_elementor_blog_grid_button_style_normal_tab',
			[
				'label' => esc_html__( 'Button Color', 'abcbiz-multi' ),
			]
		);

		// Button color
        $this->add_control(
            'abcbiz_elementor_blog_grid_button_color',
            [
                'label' => esc_html__('Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#59a818',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-blog-more a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .abcbiz-ele-blog-more a:after' => 'border-bottom-color: {{VALUE}};',
                ],
            ]
        );

		$this->end_controls_tab();

		$this->start_controls_tab(
			'abcbiz_elementor_blog_grid_button_style_hover_tab',
			[
				'label' => esc_html__( 'Hover Color', 'abcbiz-multi' ),
			]
		);

        // Button Hover color
        $this->add_control(
            'abcbiz_elementor_blog_grid_button_hover_color',
            [
                'label' => esc_html__('Hover Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#3d3d3d',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-blog-more a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .abcbiz-ele-blog-more a:hover:after' => 'border-bottom-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
		$this->end_controls_tabs();
        $this->end_controls_section(); // end button style

         // Pagination style section
         $this->start_controls_section(
            'abcbiz_elementor_blog_grid_pagination_style_section',
            [
                'label' => esc_html__('Pagination Style', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'abcbiz_elementor_blog_grid_pagination' => 'yes'
                ],
            ]
        );
        //Pagination alignment
        $this->add_responsive_control(
            'abcbiz_elementor_blog_grid_pagination_alignment',
            [
                'label' => esc_html__('Alignment', 'abcbiz-multi'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'abcbiz-multi'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'abcbiz-multi'),
                        'icon' => 'eicon-align-center-h',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'abcbiz-multi'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-blog-grid .abcbiz-ele-pagination-container' => 'text-align: {{VALUE}};',
                ],
            ]
        );

          //Pagination typography
          $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abcbiz_elementor_blog_grid_pagination_typography',
                'label' => esc_html__('Pagination Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abcbiz-ele-pagination-container',
            ]
        );

        $this->start_controls_tabs(
			'abcbiz_elementor_blog_grid_pagination_style_tabs'
		);

		$this->start_controls_tab(
			'abcbiz_elementor_blog_grid_pagination_style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'abcbiz-multi' ),
			]
		);

		// Text color
        $this->add_control(
            'abcbiz_elementor_blog_grid_pagi_text_color',
            [
                'label' => esc_html__('Text Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#333333',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pagination-container a' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Text Bg color
        $this->add_control(
            'abcbiz_elementor_blog_grid_pagi_text_bg_color',
            [
                'label' => esc_html__('Background Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#eeeeee',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pagination-container a' => 'background-color: {{VALUE}};',
                ],
            ]
        );

		$this->end_controls_tab();

		$this->start_controls_tab(
			'abcbiz_elementor_blog_grid_pagination_style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'abcbiz-multi' ),
			]
		);

        // Hover color
        $this->add_control(
            'abcbiz_elementor_blog_grid_pagi_text_hover_color',
            [
                'label' => esc_html__('Hover Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pagination-container a:hover, .abcbiz-ele-pagination-container .current' => 'color: {{VALUE}};',
                ],
            ]
        );

         // Hover bg color
         $this->add_control(
            'abcbiz_elementor_blog_grid_pagi_text_hover_bg_color',
            [
                'label' => esc_html__('Hover Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#59a818',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-ele-pagination-container a:hover, .abcbiz-ele-pagination-container .current' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
		$this->end_controls_tabs();
        $this->end_controls_section(); // end pagination style

    }

    //get blog category
    private function abcbiz_get_blog_categories() {
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