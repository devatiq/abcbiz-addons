<?php
namespace ABCBizAddons\includes\admin\inc\Templates;

if (!defined('ABSPATH')) {
    exit;
}

class TemplatesAdminMenu {
    /**
     * Constructor to initialize the hook.
     */
    public function __construct() {
        add_action('admin_menu', [$this, 'addSubMenu']);
        add_action('admin_enqueue_scripts', [$this, 'enqueueAdminStyles']);
    }

    /**
     * Adds a submenu under the specified parent menu.
     */
    public function addSubMenu() {
        $hook_suffix = add_submenu_page(
            'abcbiz_home',          // Parent slug
            esc_html__('Templates', 'abcbiz-addons'), // Page title
            esc_html__('Templates', 'abcbiz-addons'), // Menu title
            'manage_options',       // Capability
            'abcbiz_templates',     // Menu slug
            [$this, 'templatesPage'] // Callback function
        );

        // Now hook the style enqueue function to this specific page load.
        add_action('admin_print_styles-' . $hook_suffix, [$this, 'enqueueAdminStyles']);
    }

    /**
     * Callback function to display the submenu page content.
     */
    public function templatesPage() {
        require_once plugin_dir_path(__FILE__) . 'markup.php';
        $markup = new TemplateMarkup();
        $markup->DisplayMarkup();
    }

    /**
     * Enqueue styles specifically for this page.
     */
    public function enqueueAdminStyles() {
        wp_enqueue_style('abcbiz-templates-admin-css', ABCBIZ_Admin_CSS . '/admin-templates.css');
    }
}
