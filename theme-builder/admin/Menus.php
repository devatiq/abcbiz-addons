<?php
namespace ABCBIZ\ThemeBuilder\Admin;

if (!defined('ABSPATH'))
    exit;

class ThemeBuilderMenus
{

    public function __construct()
    {
        add_action('admin_menu', array($this, 'modify_theme_builder_menu'), 11);
    }


    public function modify_theme_builder_menu()
    {
        global $submenu;


        remove_menu_page('edit.php?post_type=abcbiz_library');

        add_submenu_page(
            'abcbiz_home',
            __('Theme Builder', 'abcbiz-addons'),
            __('Theme Builder', 'abcbiz-addons'),
            'manage_options',
            'edit.php?post_type=abcbiz_library'
        );


        if (isset($submenu['abcbiz_home'])) {
            foreach ($submenu['abcbiz_home'] as $key => $menu_item) {
                if ($menu_item[2] === 'edit.php?post_type=abcbiz_library') {
                    $current_file = basename($_SERVER['PHP_SELF']);
                    if ($current_file === 'post-new.php' && isset($_GET['post_type']) === 'abcbiz_library') {
                        // Highlight the new submenu as active when adding a new post
                        $submenu['abcbiz_home'][$key][4] = 'current';
                    } elseif ($current_file === 'edit.php' && isset($_GET['post_type']) && $_GET['post_type'] === 'abcbiz_library') {
                        // Highlight the new submenu as active when on the edit posts screen
                        $submenu['abcbiz_home'][$key][4] = 'current';
                    }
                }
            }
        }
    }
}