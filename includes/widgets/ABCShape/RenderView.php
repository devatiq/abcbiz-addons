<?php

/**
 * Render View file for ABC Shape Widget.
 */

$settings = $this->get_settings_for_display();
$id = $this->get_id(); //unique id for this widget

$shape_type = $settings['abc_elementor_shape_type'] ?? 'default'; 
$image_shape = isset($settings['abc_elementor_shape_image']['url']) ? $settings['abc_elementor_shape_image']['url'] : '';

$animation = 'none';
if (isset($settings['abc_elementor_shape_animation']) && 'yes' == $settings['abc_elementor_shape_animation']) {
    $animation = $settings['abc_elementor_shape_animation_effect'] ?? 'default_animation_effect';
}

?>

<div class="abc-shape-area">
    <div class="abc-shape-<?php echo esc_attr($shape_type); if('image' != $shape_type) { echo ' abc-ele-shape'; } ?> <?php echo esc_attr($animation); ?>">
        <?php 
            if('image' == $shape_type) {
                echo '<img src="'.esc_url($image_shape).'" alt="abc shape"/>';
            }
        ?>
    </div>
</div>