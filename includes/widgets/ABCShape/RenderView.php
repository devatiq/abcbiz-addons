<?php
/**
 * Render View file for ABC Shape Widget.
 */
 if (!defined('ABSPATH')) exit; // Exit if accessed directly

$settings = $this->get_settings_for_display();
$abcbiz_anim_id = $this->get_id(); //unique id for this widget

$abcbiz_shape_type = $settings['abcbiz_elementor_shape_type'] ?? 'default'; 
$abcbiz_image_shape = isset($settings['abcbiz_elementor_shape_image']['url']) ? $settings['abcbiz_elementor_shape_image']['url'] : '';
$abcbiz_shape_alt = $settings['abcbiz_elementor_shape_image_alt']; 

$abcbiz_animation = 'none';
if (isset($settings['abcbiz_elementor_shape_animation']) && 'yes' == $settings['abcbiz_elementor_shape_animation']) {
    $abcbiz_animation = $settings['abcbiz_elementor_shape_animation_effect'] ?? 'default_animation_effect';
}

?>

<div class="abcbiz-shape-area">
    <div class="abcbiz-shape-<?php echo esc_attr($abcbiz_shape_type); if('image' != $abcbiz_shape_type) { echo ' abcbiz-ele-shape'; } ?> <?php echo esc_attr($abcbiz_animation); ?>">
        <?php 
            if('image' == $abcbiz_shape_type) {
                echo '<img src="'.esc_url($abcbiz_image_shape).'" alt="'.esc_attr($abcbiz_shape_alt).'"/>';
            }
        ?>
    </div>
</div>