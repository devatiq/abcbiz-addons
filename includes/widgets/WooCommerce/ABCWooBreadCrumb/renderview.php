<?php
/**
 * Render View for ABC Product Breadcrumb Widget
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

if (!function_exists('abcbiz_wc_multi_breadcrumb')) {
    function abcbiz_wc_multi_breadcrumb() {
        // Initialize an output variable
        $output = '';
        
        // Define the home text and URL
        $home_text = 'Home';
        $home_url = home_url('/');
    
        // Define the separator
        $separator = ' &raquo; ';
    
        // Start building the breadcrumbs
        $output .= '<div class="breadcrumbs">';
    
        // Home link
        $output .= '<a href="' . esc_url($home_url) . '">' . esc_html($home_text) . '</a>';
        $output .= '<span class="separator">' . esc_html($separator) . '</span>';
    
        // Shop link for single product page
        if (is_product()) {
            $shop_page_url = wc_get_page_permalink('shop');
            $output .= '<a href="' . esc_url($shop_page_url) . '">' . esc_html__('Shop', 'abcbiz-addons') . '</a>';
            $output .= '<span class="separator">' . esc_html($separator) . '</span>';
        }

        // Additional breadcrumb elements based on the page type
        if (is_single()) {
            $categories = get_the_category();
            if ($categories) {
                $category = $categories[0];
                $output .= '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
                $output .= '<span class="separator">' . esc_html($separator) . '</span>';
            }
    
            // Post title
            $output .= '<span class="current">' . esc_html(get_the_title()) . '</span>';
        } elseif (is_category()) {
            $output .= '<span class="current">' . esc_html(single_cat_title('', false)) . '</span>';
        } elseif (is_page()) {
            $output .= '<span class="current">' . esc_html(get_the_title()) . '</span>';
        } elseif (is_search()) {
            $output .= '<span class="current">' . esc_html__('Search Results', 'abcbiz-addons') . '</span>';
        } elseif (is_404()) {
            $output .= '<span class="current">' . esc_html__('404 Not Found', 'abcbiz-addons') . '</span>';
        }
    
        $output .= '</div>';
        return $output;
    } 
}

?>

<div class="abcbiz-elementor-product-bread-crumb-area">
    <?php 
    echo wp_kses(abcbiz_wc_multi_breadcrumb(), wp_kses_allowed_html('post')); ?>
</div><!-- end breadcrumb area -->

