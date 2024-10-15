<?php
namespace ABCBiz\Includes\Widgets\ABCFetchPosts;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

use ABCBiz\Includes\Widgets\BaseWidget;
use Elementor\Controls_Manager;

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


    // Register widget controls
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

        $this->end_controls_section();
    }

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