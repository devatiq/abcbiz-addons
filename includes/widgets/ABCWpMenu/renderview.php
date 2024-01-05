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
        echo '<p>' . esc_html__('Menu not selected or found.', 'abcbiz-multi') . '</p>';
    }
    ?>
    <div class="clearfix"></div>
</div><!-- /end abcbiz wp menu area -->
