<?php
namespace ABCBizAddons\includes\admin\inc\Templates;

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
class TemplatesAdminMenu  {
    /**
     * Constructor to initialize the hook.
     */
    public function __construct() {
        add_action('admin_menu', array($this, 'addSubMenu'));
    }

    /**
     * Adds a submenu under the specified parent menu.
     */
    public function addSubMenu() {
        add_submenu_page(
            'abcbiz_home',          // Parent slug
            esc_html__('Templates', 'abcbiz-addons'), // Page title
            esc_html__('Templates', 'abcbiz-addons'), // Menu title
            'manage_options',       // Capability
            'abcbiz_templates',     // Menu slug
            array($this, 'templatesPage') // Callback function
        );
    }

    /**
     * Callback function to display the submenu page content.
     */
    public function templatesPage() {
        require_once plugin_dir_path(__FILE__) . 'markup.php';
        $markup = new TemplateMarkup();
        $markup->DisplayMarkup();
    }
}