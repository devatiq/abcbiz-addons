<?php
/**
 * Render View for ABC WordPress Menu
 */
if (!defined('ABSPATH')) exit; // Exit if accessed directly

$abcbiz_settings = $this->get_settings_for_display();

// Extract the selected menu slug
$abcbiz_selected_menu_slug = !empty($abcbiz_settings['abcbiz_elementor_wp_menu_selection']) ? $abcbiz_settings['abcbiz_elementor_wp_menu_selection'] : '';

?>

<div class="abcbiz-elementor-wp-menu-area">
    <?php
    if (!empty($abcbiz_selected_menu_slug)) {
        wp_nav_menu(array(
            'menu' => $abcbiz_selected_menu_slug,
            'container' => 'nav',
            'container_class' => 'abcbiz-wp-menu-container',
            'walker' => new abcbiz_custom_walker(),
        ));
    } else {
        echo '<p>' . esc_html__('Menu not selected or found.', 'abcbiz-addons') . '</p>';
    }
    ?>
</div><!-- /end abcbiz wp menu area -->


<div class="abcbiz-mob-menu-icon-wrap">
     <div id="abcbiz-responsive-menu"><svg ViewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" id="fi_4543046"><g id="Layer_13" data-name="Layer 13"><path d="m30 7a1 1 0 0 1 -1 1h-26a1 1 0 0 1 0-2h26a1 1 0 0 1 1 1zm-5 8h-22a1 1 0 0 0 0 2h22a1 1 0 0 0 0-2zm-9 9h-13a1 1 0 0 0 0 2h13a1 1 0 0 0 0-2z"></path></g></svg></div>
    <div id="abcbiz-mobilemenu">
    <?php
    if (!empty($abcbiz_selected_menu_slug)) {
        wp_nav_menu(array(
            'menu' => $abcbiz_selected_menu_slug,
            'container' => 'nav',
            'container_class' => 'abcbiz-wp-menu-mobile-container',
        ));
    } else {
        echo '<p>' . esc_html__('Menu not selected or found.', 'abcbiz-addons') . '</p>';
    }
    ?>
    </div><!-- /end mobile menu -->
</div><!-- /end menu icon wrap -->
