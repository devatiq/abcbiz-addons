<?php
namespace Inc\Widgets\ABCRecentPost;

use Inc\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;

class Main extends BaseWidget
{
    // define protected variables...
    protected $name = 'abc-recent-post';
    protected $title = 'ABC Recent Posts';
    protected $icon = 'eicon-bullet-list';
    protected $categories = [
        'abc-category'
    ];

    protected $keywords = [
        'abc', 'recent', 'list', 'post'
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
            'abc_elementor_recent_posts_setting',
            [
                'label' => __('Post Setting', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        //category selection
    $this->add_control(
        'abc_elementor_recent_posts_post_category',
        [
            'label' => esc_html__( 'Select Category', 'abcbiz-multi' ),
            'type' => \Elementor\Controls_Manager::SELECT2,
            'options' => $this->get_recent_post_categories(),
            'default' => 'all',
            'label_block' => true,
            'multiple' => false,
        ]
    );

        //number of post
        $this->add_control(
			'abc_elementor_recent_posts_post_number',
			[
				'label' => esc_html__( 'Number of Posts', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['number'],
				'range' => [
					'number' => [
						'min' => 3,
						'max' => 30,
						'step' => 1,
					]
				],
				'default' => [
					'size' => 5,
				],
			]
		);


        //post date on/off switch
        $this->add_control(
            'abc_elementor_recent_posts_date_switch',
            [
                'label' => __('Post Date', 'abcbiz-multi'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'abcbiz-multi'),
                'label_off' => __('Hide', 'abcbiz-multi'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        //post comment on/off switch
        $this->add_control(
            'abc_elementor_recent_posts_comment_switch',
            [
                'label' => __('Blog Comments', 'abcbiz-multi'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'abcbiz-multi'),
                'label_off' => __('Hide', 'abcbiz-multi'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

         //More Button
         $this->add_control(
            'abc_elementor_recent_posts_read_more_switch',
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
            'abc_elementor_recent_posts_read_more_text',
            [
                'label' => __('More Button Text', 'abcbiz-multi'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Read More',
                'placeholder' => 'Enter read more text',
                'condition' => [
                    'abc_elementor_recent_posts_read_more_switch' => 'yes',
                ],
            ]
        );

        $this->end_controls_section(); //end recent posts setting

        // recent post style
        $this->start_controls_section(
            'abc_elementor_recent_posts_title_style_section',
            [
                'label' => __('Title Style', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

          //Post title typography
          $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abc_elementor_recent_posts_title_typography',
                'label' => __('Title Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abc-ele-recent-post-title',
            ]
        );

        $this->start_controls_tabs(
			'abc_elementor_recent_posts_title_style_tabs'
		);

		$this->start_controls_tab(
			'abc_elementor_recent_posts_title_style_normal_tab',
			[
				'label' => esc_html__( 'Title Color', 'abcbiz-multi' ),
			]
		);

		// post title color
        $this->add_control(
            'abc_elementor_recent_posts_title_color',
            [
                'label' => __('Title Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#333333',
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-recent-post-title a' => 'color: {{VALUE}};',
                ],
            ]
        );

		$this->end_controls_tab();

		$this->start_controls_tab(
			'abc_elementor_recent_posts_title_style_hover_tab',
			[
				'label' => esc_html__( 'Hover Color', 'abcbiz-multi' ),
			]
		);

        // post title hover color
        $this->add_control(
            'abc_elementor_recent_posts_title_hover_color',
            [
                'label' => __('Title Hover Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#59a818',
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-recent-post-title a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section(); // end title style

        // post meta style section
        $this->start_controls_section(
            'abc_elementor_recent_posts_meta_style_section',
            [
                'label' => __('Meta Style', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

          //post meta typography
          $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abc_elementor_recent_posts_meta_typography',
                'label' => __('Meta Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abc-ele-recent-post-meta',
            ]
        );

        // post meta color
        $this->add_control(
            'abc_elementor_recent_posts_meta_color',
            [
                'label' => __('Meta Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#666666',
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-recent-post-meta, .abc-ele-recent-post-meta a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section(); // end meta style

        // button style section
        $this->start_controls_section(
            'abc_elementor_recent_posts_button_style_section',
            [
                'label' => __('Read More Style', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'abc_elementor_recent_posts_read_more_switch' => 'yes'
                ],
            ]
        );

          //button typography
          $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abc_elementor_recent_posts_button_typography',
                'label' => __('Read More Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abc-ele-recent-post-more',
            ]
        );

        $this->start_controls_tabs(
			'abc_elementor_recent_posts_button_style_tabs'
		);

		$this->start_controls_tab(
			'abc_elementor_recent_posts_button_style_normal_tab',
			[
				'label' => esc_html__( 'Color', 'abcbiz-multi' ),
			]
		);

		// Button color
        $this->add_control(
            'abc_elementor_recent_posts_button_color',
            [
                'label' => __('Read More Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#59a818',
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-recent-post-more a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .abc-ele-recent-post-more a:after' => 'border-bottom-color: {{VALUE}};',
                ],
            ]
        );

		$this->end_controls_tab();

		$this->start_controls_tab(
			'abc_elementor_recent_posts_button_style_hover_tab',
			[
				'label' => esc_html__( 'Hover Color', 'abcbiz-multi' ),
			]
		);

        // Button Hover color
        $this->add_control(
            'abc_elementor_recent_posts_button_hover_color',
            [
                'label' => __('Read More Hover Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'default' => '#3d3d3d',
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-recent-post-more a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .abc-ele-recent-post-more a:hover:after' => 'border-bottom-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
		$this->end_controls_tabs();
        $this->end_controls_section(); // end read more style
    }

     //get blog category
     private function get_recent_post_categories() {
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