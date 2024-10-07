<?php
namespace ABCBiz\Includes\Lib;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class PostViewTracker {

    // Hook the necessary actions
    public function __construct() {
        add_action('wp_head', [$this, 'track_views']);
    }

    // Method to track post views
    public function track_views() {
        if (is_single()) {
            $post_id = get_the_ID();
            if ($post_id) {
                $this->increment_views($post_id);
            }
        }
    }

    // Increment the post view count
    private function increment_views($post_id) {
        $views = get_post_meta($post_id, 'abcbiz_post_views', true);
        $views = $views ? (int) $views : 0;
        $views++;
        update_post_meta($post_id, 'abcbiz_post_views', $views);
    }

    // Method to get post views (for use in templates or other logic)
    public static function get_views($post_id) {
        $views = get_post_meta($post_id, 'abcbiz_post_views', true);
        return $views ? (int) $views : 0;
    }
}