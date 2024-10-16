<?php
namespace ABCBiz\Includes\Widgets\ABCFetchPosts;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Background;

class Main extends BaseWidget
{

    // define protected variables...
    protected $name = 'abcbiz-fetch-posts';
    protected $title = 'ABC Fetch Posts';
    protected $icon = 'eicon-posts-grid abcbiz-addons-icon';
    protected $categories = [
        'abcbiz-category'
    ];
    protected $keywords = [
        'api',
        'posts',
        'fetch posts',
        'api posts',
    ];

   
    /**
     * Register the widget controls.
     *
     * Add input fields to allow the user to customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {
        // Add a control for the number of posts to fetch
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Settings', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        // Add control for selecting layout type (list or grid)
        $this->add_control(
            'layout_type',
            [
                'label' => __('Layout Type', 'abcbiz-addons'),
                'type' => Controls_Manager::SELECT,
                'default' => 'list',
                'options' => [
                    'list' => __('List', 'abcbiz-addons'),
                    'grid' => __('Grid', 'abcbiz-addons'),
                ],
            ]
        );

        // Add control for selecting number of columns
        $this->add_responsive_control(
            'grid_columns',
            [
                'label' => __('Columns', 'abcbiz-addons'),
                'type' => Controls_Manager::SELECT,
                'desktop_default' => 3,
                'tablet_default' => 2,
                'mobile_default' => 1,
                'options' => [
                    1 => __('1 Column', 'abcbiz-addons'),
                    2 => __('2 Columns', 'abcbiz-addons'),
                    3 => __('3 Columns', 'abcbiz-addons'),
                    4 => __('4 Columns', 'abcbiz-addons'),
                    5 => __('5 Columns', 'abcbiz-addons'),
                ],
                'condition' => [
                    'layout_type' => 'grid',
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-fetch-posts-grid.abcbiz-fetch-posts-list' => 'grid-template-columns: repeat({{VALUE}}, 1fr);',
                ],
            ]
        );

        $this->add_control(
            'fetch_posts_count',
            [
                'label' => __('Number of Posts', 'abcbiz-addons'),
                'type' => Controls_Manager::NUMBER,
                'default' => 5,
            ]
        );
        // Add control for website URL
        $this->add_control(
            'website_url',
            [
                'label' => __('External Website URL', 'abcbiz-addons'),
                'type' => Controls_Manager::TEXT,
                'input_type' => 'url',
                'placeholder' => __('https://example.com', 'abcbiz-addons'),
                'description' => __( 'Enter the full URL of the external WordPress website you want to fetch posts from. Make sure the site uses the default WordPress REST API and includes a valid URL with HTTP/HTTPS protocol. Example: https://example.com. Do not include any query parameters, as the plugin will handle them automatically.', 'abcbiz-addons' ),
                'label_block' => true
            ]
        );

        $this->end_controls_section(); // End content section

        

        // General Style Section
        $this->start_controls_section(
            'general_style_section',
            [
                'label' => __('General', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'general_background',
                'label' => __('Background', 'abcbiz-addons'),
                'types' => ['classic', 'gradient'],
                'exclude' => ['image'],
                'selector' => '{{WRAPPER}} .abcbiz-fetch-single-post',
            ]
        );

        $this->add_control(
            'general_padding',
            [
                'label' => __('Padding', 'abcbiz-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-fetch-single-post' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'general_border',
                'label' => __('Border', 'abcbiz-addons'),
                'selector' => '{{WRAPPER}} .abcbiz-fetch-single-post',
            ]
        );

        $this->add_control(
            'general_border_radius',
            [
                'label' => __('Border Radius', 'abcbiz-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-fetch-single-post' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        
        $this->add_responsive_control(
            'general_gap',
            [
                'label' => __('Gap', 'abcbiz-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-fetch-posts-list' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section(); // End general style section

        
        // Thumbnail Style Section
        $this->start_controls_section(
            'thumbnail_style_section',
            [
                'label' => __('Thumbnail', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'thumbnail_alignment',
            [
                'label' => __('Image Alignment', 'abcbiz-addons'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'row-reverse' => [
                        'title' => __('Right', 'abcbiz-addons'),
                        'icon' => 'eicon-arrow-right',
                    ],
                    'row' => [
                        'title' => __('Left', 'abcbiz-addons'),
                        'icon' => 'eicon-arrow-left',
                    ],
                    'column' => [
                        'title' => __('Top', 'abcbiz-addons'),
                        'icon' => 'eicon-arrow-up',
                    ],
                    'column-reverse' => [
                        'title' => __('Bottom', 'abcbiz-addons'),
                        'icon' => 'eicon-arrow-down',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-fetch-single-post' => 'flex-direction: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'thumbnail_width',
            [
                'label' => __('Width', 'abcbiz-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 2000,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 100,
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-fetch-single-post-thumb img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'thumbnail_height',
            [
                'label' => __('Height', 'abcbiz-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 1000,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-fetch-single-post-thumb img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'thumbnail_border',
                'label' => __('Border', 'abcbiz-addons'),
                'selector' => '{{WRAPPER}} .abcbiz-fetch-single-post-thumb img',
            ]
        );

        $this->add_responsive_control(
            'thumbnail_margin',
            [
                'label' => __('Margin', 'abcbiz-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-fetch-single-post-thumb' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'thumbnail_padding',
            [
                'label' => __('Padding', 'abcbiz-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-fetch-single-post-thumb img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'thumbnail_border_radius',
            [
                'label' => __('Border Radius', 'abcbiz-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-fetch-single-post-thumb img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section(); // End thumbnail style section

        // Style Section
        $this->start_controls_section(
            'content_style_section',
            [
                'label' => __('Content', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'category_color',
            [
                'label' => __('Category Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-fetch-single-post-cat > p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'category_background',
                'label' => __('Background', 'abcbiz-addons'),
                'types' => ['classic', 'gradient'],
                'exclude' => ['image'],
                'selector' => '{{WRAPPER}} .abcbiz-fetch-single-post-cat > p',
                'fields_options' => [
                    'background' => [
                        'label' => __('Category Background', 'abcbiz-addons'),
                    ],
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'category_typography',
                'label' => __('Category Typography', 'abcbiz-addons'),
                'selector' => '{{WRAPPER}} .abcbiz-fetch-single-post-cat > p',
            ]
        );

        $this->add_control(
            'category_padding',
            [
                'label' => __('Category Padding', 'abcbiz-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-fetch-single-post-cat > p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'post_title_color',
            [
                'label' => __('Post Title Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#333',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-fetch-single-post-title h2 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'post_title_typography',
                'label' => __('Post Title Typography', 'abcbiz-addons'),
                'selector' => '{{WRAPPER}} .abcbiz-fetch-single-post-title h2',
            ]
        );

        $this->add_control(
            'post_date_color',
            [
                'label' => __('Post Date Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#888',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-fetch-single-post-info p' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .abcbiz-fetch-single-post-info svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'post_excerpt_color',
            [
                'label' => __('Post Excerpt Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#666',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-fetch-single-post-content p' => 'color: {{VALUE}};',
                ],
            ]
        );
  
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'post_excerpt_typography',
                'label' => __('Post Excerpt Typography', 'abcbiz-addons'),
                'selector' => '{{WRAPPER}} .abcbiz-fetch-single-post-content p',
            ]
        );

        $this->end_controls_section(); // End style section


        // Button Style Section
        $this->start_controls_section(
            'button_style_section',
            [
                'label' => __('Button', 'abcbiz-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'label' => __('Typography', 'abcbiz-addons'),
                'selector' => '{{WRAPPER}} .abcbiz-fetch-single-post-btn a',
            ]
        );

        $this->add_responsive_control(
            'button_padding',
            [
                'label' => __('Padding', 'abcbiz-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-fetch-single-post-btn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_width',
            [
                'label' => __('Width', 'abcbiz-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-fetch-single-post-btn a' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'label' => __('Border', 'abcbiz-addons'),
                'selector' => '{{WRAPPER}} .abcbiz-fetch-single-post-btn a',
            ]
        );

        $this->add_control(
            'button_border_radius',
            [
                'label' => __('Border Radius', 'abcbiz-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-fetch-single-post-btn a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs('button_tabs');
        $this->start_controls_tab(
            'button_normal_tab',
            [
                'label' => __('Normal', 'abcbiz-addons'),
            ]
        );
        $this->add_control(
            'button_text_color',
            [
                'label' => __('Text Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-fetch-single-post-btn a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'button_background',
                'label' => __('Background', 'abcbiz-addons'),
                'types' => ['classic', 'gradient'],
                'exclude' => ['image'],
                'selector' => '{{WRAPPER}} .abcbiz-fetch-single-post-btn a',
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'button_hover_tab',
            [
                'label' => __('Hover', 'abcbiz-addons'),
            ]
        );

        $this->add_control(
            'button_hover_text_color',
            [
                'label' => __('Text Color', 'abcbiz-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .abcbiz-fetch-single-post-btn a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'button_hover_background',
                'label' => __('Background', 'abcbiz-addons'),
                'types' => ['classic', 'gradient'],
                'exclude' => ['image'],
                'selector' => '{{WRAPPER}} .abcbiz-fetch-single-post-btn a:hover',
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();
        $this->end_controls_section(); // End button style section

    }

    

    /**
     * Retrieve category names from the embedded data based on category IDs.
     *
     * This function checks the provided embedded data for category terms and
     * returns an array of category names that match the given category IDs.
     *
     * @param array $category_ids An array of category IDs to match against.
     * @param object $embedded_data The embedded data object containing category terms.
     * @return array An array of category names corresponding to the provided IDs.
     */
    private function get_category_names( $category_ids, $embedded_data ) {
        $category_names = [];
    
        // Check if categories are available in the _embedded data
        if ( isset( $embedded_data->{'wp:term'}[0] ) && is_array( $embedded_data->{'wp:term'}[0] ) ) {
            foreach ( $embedded_data->{'wp:term'}[0] as $term ) {
                if ( in_array( $term->id, $category_ids ) ) {
                    $category_names[] = $term->name; // Get category name from _embedded data
                }
            }
        }
    
        return $category_names;
    }
      
    /**
     * Render the widget output on the frontend.
     */
    protected function render()
    {
        include 'renderview.php';
    }
}