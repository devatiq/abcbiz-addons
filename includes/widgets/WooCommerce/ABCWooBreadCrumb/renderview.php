<?php
/**
 * Render View for ABC Product Breadcrumb Widget
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

if (!function_exists('abcbiz_wc_multi_breadcrumb')) {
    function abcbiz_wc_multi_breadcrumb() {
        // Define the home text and URL
        $home_text = 'Home';
        $home_url = home_url('/');
    
        // Define the separator
        $separator = ' &raquo; ';
    
        // Output the breadcrumbs
        echo '<div class="breadcrumbs">';
    
        // Home link
        echo '<a href="' . esc_url($home_url) . '">' . esc_html($home_text) . '</a>';
        echo '<span class="separator">' . esc_html($separator) . '</span>';
    
        // Shop link for single product page
        if (is_product()) {
            $shop_page_url = wc_get_page_permalink('shop');
            echo '<a href="' . esc_url($shop_page_url) . '">' . esc_html__('Shop', 'abcbiz-addons') . '</a>';
            echo '<span class="separator">' . esc_html($separator) . '</span>';
        }

        // Check if it's a single post
        if (is_single()) {
            // Get the category
            $categories = get_the_category();
            if ($categories) {
                $category = $categories[0];
                echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
                echo '<span class="separator">' . esc_html($separator) . '</span>';
            }
    
            // Post title
            echo '<span class="current">' . esc_html(get_the_title()) . '</span>';
        } elseif (is_category()) {
            // Category archive
            echo '<span class="current">' . esc_html(single_cat_title('', false)) . '</span>';
        } elseif (is_page()) {
            // Standard page
            echo '<span class="current">' . esc_html(get_the_title()) . '</span>';
        } elseif (is_search()) {
            // Search results
            echo '<span class="current">' . esc_html__('Search Results', 'abcbiz-addons') . '</span>';
        } elseif (is_404()) {
            // 404 page
            echo '<span class="current">' . esc_html__('404 Not Found', 'abcbiz-addons') . '</span>';
        }
    
        echo '</div>';
    } 
}

?>

<div class="abcbiz-elementor-product-bread-crumb-area">
    <?php 
    // Get the breadcrumb trail
    echo abcbiz_wc_multi_breadcrumb(); ?>
</div><!-- end breadcrumb area -->
