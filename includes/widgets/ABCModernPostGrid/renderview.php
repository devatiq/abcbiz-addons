<?php
/**
 * Render View for ABC Modern Post Grid
 */
if (!defined('ABSPATH')) exit; // Exit if accessed directly

$settings = $this->get_settings_for_display();
$post_type = isset($settings['post_types']) ? $settings['post_types'] : 'post';


if('style1' == $settings['abcbiz_modern_post_grid_style']) {
    include ABCBIZ_Inc . '/widgets/ABCModernPostGrid/templates/style1.php';
}elseif('style2' == $settings['abcbiz_modern_post_grid_style']) {
    include ABCBIZ_Inc . '/widgets/ABCModernPostGrid/templates/style2.php';
}