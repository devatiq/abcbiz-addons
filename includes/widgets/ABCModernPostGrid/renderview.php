<?php
/**
 * Render View for ABC Modern Post Grid
 */
if (!defined('ABSPATH')) exit; // Exit if accessed directly

$settings = $this->get_settings_for_display();
// Placeholder image as fallback
$fallback_image = ABCBIZ_Assets . '/img/img-hover-placeholder.jpg';
// Get the values from Elementor controls
$post_type = $settings['post_types']; // Get selected post types
$customized_posts_selection = $settings['customized_posts_selection']; // Get the customization option
$selected_categories = $settings['get_categories']; // Get selected categories
$selected_posts = $settings['get_posts_list']; // Get selected posts
$ignore_sticky_posts = $settings['ignore_sticky_posts'] === 'true'; // Get ignore sticky posts

$post_info_switch = !empty($settings['post_meta_switch']) ? $settings['post_meta_switch'] : 'false';
$post_info_display = !empty($settings['post_meta_display']) ? $settings['post_meta_display'] : [];
$categories_switch = isset($settings['display_category']) ? $settings['display_category'] : 'true';
$random_color_switch = isset($settings['category_random_color_switch']) ? $settings['category_random_color_switch'] : 'false';

// Get post limit
if('style2' == $settings['abcbiz_modern_post_grid_style']) {
    $post_limit = $settings['post_limit_for_style2']; // Get the post limit for style 2
}else{
    $post_limit = $settings['post_limit']; // Get the post limit
}


// Determine if a single post should be displayed as a full-width container
$fullWidth_class = (1 === $post_limit) ? ' abcbiz-modern-one-post' : '';

// Initialize WP_Query arguments based on the user selection
$args = [
    'post_type' => $post_type,
    'posts_per_page' => $post_limit,
    'ignore_sticky_posts' => $ignore_sticky_posts,
];

// Modify WP_Query based on the user selection
if ($customized_posts_selection === 'categories' && !empty($selected_categories)) {
    // If the user selected to display posts by categories
    $args['category__in'] = $selected_categories;
} elseif ($customized_posts_selection === 'specific_posts' && !empty($selected_posts)) {
    // If the user selected to display specific posts
    $args['post__in'] = $selected_posts;
}


if('style1' == $settings['abcbiz_modern_post_grid_style']) {
    include ABCBIZ_Inc . '/widgets/ABCModernPostGrid/templates/style1.php';
}elseif('style2' == $settings['abcbiz_modern_post_grid_style']) {
    include ABCBIZ_Inc . '/widgets/ABCModernPostGrid/templates/style2.php';
}elseif('style3' == $settings['abcbiz_modern_post_grid_style']) {
    include ABCBIZ_Inc . '/widgets/ABCModernPostGrid/templates/style3.php';
}elseif('style4' == $settings['abcbiz_modern_post_grid_style']) {
    include ABCBIZ_Inc . '/widgets/ABCModernPostGrid/templates/style4.php';
}elseif('style5' == $settings['abcbiz_modern_post_grid_style']) {
    include ABCBIZ_Inc . '/widgets/ABCModernPostGrid/templates/style5.php';
}elseif('style6' == $settings['abcbiz_modern_post_grid_style']) {
    include ABCBIZ_Inc . '/widgets/ABCModernPostGrid/templates/style6.php';
}elseif('style7' == $settings['abcbiz_modern_post_grid_style']) {
    include ABCBIZ_Inc . '/widgets/ABCModernPostGrid/templates/style7.php';
}elseif('style8' == $settings['abcbiz_modern_post_grid_style']) {
    include ABCBIZ_Inc . '/widgets/ABCModernPostGrid/templates/style8.php';
}
else{
    include ABCBIZ_Inc . '/widgets/ABCModernPostGrid/templates/style1.php';
}