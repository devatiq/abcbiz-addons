<?php
namespace ABCBIZ\ThemeBuilder\Classes;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

use ABCBIZ\ThemeBuilder\ABCBizThemeBuilder; // Import the main class

class TemplateOverride
{

    public function __construct()
    {
        $this->register_hooks();
    }

    /**
     * Register the hooks for different template types.
     */
    public function register_hooks()
    {
        // Override different template types
        add_filter('template_include', array($this, 'override_single_template'));
        add_filter('page_template', array($this, 'override_page_template'));
        add_filter('404_template', array($this, 'override_404_template'));
        add_filter('search_template', array($this, 'override_search_template'));
        add_filter('archive_template', array($this, 'override_archive_template'));
    }


    // Override the single.php template for single posts
    public function override_single_template($template)
    {
        global $post;
        // Ensure this only affects single posts (not pages)
        if (is_single() && 'post' === $post->post_type) {
            $template_id = ABCBizThemeBuilder::get_template_id('single_post'); 

            if ($template_id) {
                // Check if the custom template is built with Elementor
                if (\Elementor\Plugin::$instance->documents->get($template_id)->is_built_with_elementor()) {
                    return ABCBIZ_TB_Path . '/inc/templates/abcbiz-single.php'; 
                } else {
                    $custom_single_template = ABCBIZ_TB_Path . '/inc/templates/default-template.php';
                    if (file_exists($custom_single_template)) {
                        return $custom_single_template;
                    }
                }
            }
        }
        // Return the original template if no custom template is found
        return $template;
    }


    // Override the page.php template for single pages
    public function override_page_template($page_template)
    {
        global $post;
        if (is_page() && 'page' === $post->post_type) {
            $template_id = ABCBizThemeBuilder::get_template_id('single_page'); 

            if ($template_id) {
                if (\Elementor\Plugin::$instance->documents->get($template_id)->is_built_with_elementor()) {
                    return ABCBIZ_TB_Path . '/inc/templates/abcbiz-page.php'; 
                } else {
                    $custom_single_template = ABCBIZ_TB_Path . '/inc/templates/default-template.php';
                    if (file_exists($custom_single_template)) {
                        return $custom_single_template;
                    }
                }
            }
        }

        return $page_template;
    }

    // Override the 404.php template
    public function override_404_template($template)
    {
        // Ensure this only affects the 404 page
        if (is_404()) {
            // Check if there's a custom template in `abcbiz_library` for '404_page'
            $template_id = ABCBizThemeBuilder::get_template_id('404_page'); 

            if ($template_id) {
                // Check if the custom template is built with Elementor
                if (\Elementor\Plugin::$instance->documents->get($template_id)->is_built_with_elementor()) {
                    return ABCBIZ_TB_Path . '/inc/templates/abcbiz-404.php'; 
                } else {
                    $custom_404_template = ABCBIZ_TB_Path . '/inc/templates/default-template.php';
                    if (file_exists($custom_404_template)) {
                        return $custom_404_template;
                    }
                }
            }
        }

        return $template;
    }


    // Override the search results template (search.php)
    public function override_search_template($template)
    {
        // Ensure this only affects the search results page
        if (is_search()) {
            // Check if there's a custom template in `abcbiz_library` for 'search_page'
            $template_id = ABCBizThemeBuilder::get_template_id('search_page'); 

            if ($template_id) {
                // Check if the custom template is built with Elementor
                if (\Elementor\Plugin::$instance->documents->get($template_id)->is_built_with_elementor()) {
                    // Load a blank template to allow Elementor to render its content
                    return ABCBIZ_TB_Path . '/inc/templates/abcbiz-search.php';
                } else {
                    // Fallback: Use a custom template if not built with Elementor
                    $custom_search_template = ABCBIZ_TB_Path . '/inc/templates/default-template.php';
                    if (file_exists($custom_search_template)) {
                        return $custom_search_template;
                    }
                }
            }
        }
        return $template;
    }


    // Override the archive template (archive.php)
    public function override_archive_template($template)
    {
        global $post;

        // Ensure this only affects archive pages and skip the product archive
        if (is_archive() && !is_post_type_archive('product')) {
            $template_id = ABCBizThemeBuilder::get_template_id('archive_page'); 

            if ($template_id) {
                // Check if the custom template is built with Elementor
                if (\Elementor\Plugin::$instance->documents->get($template_id)->is_built_with_elementor()) {
                    return ABCBIZ_TB_Path . '/inc/templates/abcbiz-archive.php'; 
                } else {
                    $custom_archive_template = ABCBIZ_TB_Path . '/inc/templates/default-template.php';
                    if (file_exists($custom_archive_template)) {
                        return $custom_archive_template;
                    }
                }
            }
        }

        return $template;
    }


}