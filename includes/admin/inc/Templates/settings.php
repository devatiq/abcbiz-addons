<?php
namespace ABCBizAddons\includes\admin\inc\Templates;

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
        echo '<div class="wrap"><h1>' . esc_html__('Templates', 'abcbiz-addons') . '</h1>';
        echo '<p>' . esc_html__('Manage your templates here.', 'abcbiz-addons') . '</p>';
        echo '</div>';
    }
}