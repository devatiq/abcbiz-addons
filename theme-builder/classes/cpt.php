<?php
namespace ABCBIZ\ThemeBuilder\Classes;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class CPT {
    public function __construct()
    {
        add_action('init', array($this, 'create_themebuilder_cpt'));
    }

    public function create_themebuilder_cpt()
    {
        $labels = array(
            'name' => _x('Theme Builder', 'Post Type General Name', 'abcbiz-addons'),
            'singular_name' => _x('Theme Builder', 'Post Type Singular Name', 'abcbiz-addons'),
            'menu_name' => _x('Theme Builder', 'Admin Menu text', 'abcbiz-addons'),
            'name_admin_bar' => _x('Theme Builder', 'Add New on Toolbar', 'abcbiz-addons'),
            'archives' => __('Theme Builder Archives', 'abcbiz-addons'),
            'attributes' => __('Theme Builder Attributes', 'abcbiz-addons'),
            'parent_item_colon' => __('Parent Theme Builder:', 'abcbiz-addons'),
            'all_items' => __('All Theme Builders', 'abcbiz-addons'),
            'add_new_item' => __('Add New Theme Builder', 'abcbiz-addons'),
            'add_new' => __('Add New', 'abcbiz-addons'),
            'new_item' => __('New Theme Builder', 'abcbiz-addons'),
            'edit_item' => __('Edit Theme Builder', 'abcbiz-addons'),
            'update_item' => __('Update Theme Builder', 'abcbiz-addons'),
            'view_item' => __('View Theme Builder', 'abcbiz-addons'),
            'view_items' => __('View Theme Builders', 'abcbiz-addons'),
            'search_items' => __('Search Theme Builders', 'abcbiz-addons'),
            'not_found' => __('Not found', 'abcbiz-addons'),
            'not_found_in_trash' => __('Not found in Trash', 'abcbiz-addons'),
            'featured_image' => __('Featured Image', 'abcbiz-addons'),
            'set_featured_image' => __('Set featured image', 'abcbiz-addons'),
            'remove_featured_image' => __('Remove featured image', 'abcbiz-addons'),
            'use_featured_image' => __('Use as featured image', 'abcbiz-addons'),
            'insert_into_item' => __('Insert into Theme Builder', 'abcbiz-addons'),
            'uploaded_to_this_item' => __('Uploaded to this Theme Builder', 'abcbiz-addons'),
            'items_list' => __('Theme Builder list', 'abcbiz-addons'),
            'items_list_navigation' => __('Theme Builder list navigation', 'abcbiz-addons'),
            'filter_items_list' => __('Filter Theme Builder list', 'abcbiz-addons'),
        );
        $args = array(
            'label' => __('Theme Builder', 'abcbiz-addons'),
            'description' => __('Custom Post Type for Theme Builder', 'abcbiz-addons'),
            'labels' => $labels,
            'supports' => array('title', 'elementor'),
            'taxonomies' => array(),
            'public' => true,
            'show_ui' => true,
            //'show_in_menu' => 'admin.php?page=abcbiz_home',
            'show_in_admin_bar' => false,
            'show_in_nav_menus' => false,
            'can_export' => true,
            'has_archive' => false,
            'hierarchical' => false,
            'exclude_from_search' => true,
            'capability_type' => 'page',
            'menu_icon' => 'dashicons-layout', // Set an icon for your CPT
        );
        register_post_type('abcbiz_library', $args);
    }
}