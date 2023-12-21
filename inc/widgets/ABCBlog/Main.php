<?php
namespace Inc\Widgets\ABCBlog;

use Inc\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

class Main extends BaseWidget
{
    // define protected variables...
    protected $name = 'ABC-Elementor-ABCBlog';
    protected $title = 'ABC Blog Posts Fancy';
    protected $icon = 'eicon-posts-group';
    protected $categories = [
        'abc-category'
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
            'abc_elementor_blog_setting',
            [
                'label' => __('Blog Setting', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        //category selection
    $this->add_control(
        'abc_elementor_blog_category_fancy',
        [
            'label' => esc_html__( 'Select Category', 'abcbiz-multi' ),
            'type' => \Elementor\Controls_Manager::SELECT2,
            'options' => $this->get_blog_fancy_categories(),
            'default' => 'all',
            'label_block' => true,
            'multiple' => false,
        ]
    );

        //blog date on/off switch
        $this->add_control(
            'abc_elementor_blog_date_switch',
            [
                'label' => __('Date', 'abcbiz-multi'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'abcbiz-multi'),
                'label_off' => __('Hide', 'abcbiz-multi'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        //blog comment on/off switch
        $this->add_control(
            'abc_elementor_blog_comment_switch',
            [
                'label' => __('Comments', 'abcbiz-multi'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'abcbiz-multi'),
                'label_off' => __('Hide', 'abcbiz-multi'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        // blog read more button on/off switch
        $this->add_control(
            'abc_elementor_blog_read_more_switch',
            [
                'label' => __('Read More', 'abcbiz-multi'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'abcbiz-multi'),
                'label_off' => __('Hide', 'abcbiz-multi'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        //Read more text
        $this->add_control(
			'abc_elementor_blog_read_more_text',
			[
				'label' => esc_html__( 'Read More Text', 'abcbiz-multi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Read More', 'abcbiz-multi' ),
				'placeholder' => esc_html__( 'Type read more text', 'abcbiz-multi' ),
                'condition' => [
                    'abc_elementor_blog_read_more_switch' => 'yes',
                ],
			]

		);

        $this->end_controls_section(); //end blog setting control

        // blog content style section
        $this->start_controls_section(
            'abc_elementor_blog_content_style_section',
            [
                'label' => __('Blog Style', 'abcbiz-multi'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        //blog info typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abc_elementor_blog_info_typography',
                'label' => __('Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abc-ele-single-blog-info a',
            ]
        );
        // blog info color
        $this->add_control(
            'abc_elementor_blog_info_color',
            [
                'label' => __('Info Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-single-blog-info a' => 'color: {{VALUE}};',
                ],
            ]
        );
        // blog info icon color
        $this->add_control(
            'abc_elementor_blog_info_icon_color',
            [
                'label' => __('Icon Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-single-blog-info i' => 'color: {{VALUE}};',
                ],
            ]
        );
        // blog info icon size
        $this->add_responsive_control(
            'abc_elementor_blog_info_icon_size',
            [
                'label' => __('Icon Size', 'abcbiz-multi'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-single-blog-info i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        // blog title typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abc_elementor_blog_title_typography',
                'label' => __('Title Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abc-ele-single-blog-title h2 a',
            ]
        );
        // blog title color
        $this->add_control(
            'abc_elementor_blog_title_color',
            [
                'label' => __('Title Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-single-blog-title h2 a' => 'color: {{VALUE}};',
                ],
            ]
        );
        // blog read more button typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abc_elementor_blog_read_more_typography',
                'label' => __('Button Typography', 'abcbiz-multi'),
                'selector' => '{{WRAPPER}} .abc-ele-single-blog-button a',
            ]
        );
        // blog read more button color
        $this->add_control(
            'abc_elementor_blog_read_more_color',
            [
                'label' => __('Button Color', 'abcbiz-multi'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-single-blog-button a' => 'color: {{VALUE}};',
                ],
            ]
        );

    }

    //get blog category
    private function get_blog_fancy_categories() {
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
        //load render view to show widget output on frontend/website.
        include 'RenderView.php';
    }


}
