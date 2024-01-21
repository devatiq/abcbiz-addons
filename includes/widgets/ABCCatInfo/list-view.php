<?php
/**
 * Render View file for ABC Post Category Info list view
 */
if (!defined('ABSPATH')) exit; // Exit if accessed directly

$abcbiz_settings = $this->get_settings_for_display();
$abcbiz_display_icon = $abcbiz_settings['abcbiz_elementor_post_cat_icon'] === 'yes';
?>

<!-- Post Category Area -->
<div class="abcbiz-ele-post-cat-area">
    <div class="abcbiz-ele-post-cat cat-list-view">
    
    <?php 
    $categories = get_the_category();
    $output = '';

    if (!empty($categories)) {
        foreach ($categories as $category) {
            $output .= '<div class="abcbiz-ele-category-item">';
            if ($abcbiz_display_icon) {
                $output .= '<i class="eicon-chevron-double-right"></i>';
            }
            $output .= '<a href="' . esc_url(get_category_link($category->term_id)) . '" title="' . esc_attr(sprintf(__('View all posts in %s', 'abcbiz-multi'), $category->name)) . '">' . esc_html($category->name) . '</a>';
            $output .= '</div>';
        }
        echo $output;
    }
    ?>
    </div>
</div><!--/ Post Category Area -->
