<?php
/**
 * Render View for ABC Before After Image
 */
if (!defined('ABSPATH')) exit; // Exit if accessed directly
$abcbiz_settings = $this->get_settings_for_display();
$id = $this->get_id(); 

$abcbiz_before_label = !empty($abcbiz_settings['abcbiz_elementor_before_label_text']) ? $abcbiz_settings['abcbiz_elementor_before_label_text'] : 'Before';
$abcbiz_after_label = !empty($abcbiz_settings['abcbiz_elementor_after_label_text']) ? $abcbiz_settings['abcbiz_elementor_after_label_text'] : 'After';
$abcbiz_before_img_vis = isset($abcbiz_settings['abcbiz_elementor_before_img_visibility']['size']) ? $abcbiz_settings['abcbiz_elementor_before_img_visibility']['size'] : '0.5';
$abcbiz_bef_af_orientaion = !empty($abcbiz_settings['abcbiz_elementor_before_after_orientation']) ? $abcbiz_settings['abcbiz_elementor_before_after_orientation'] : 'horizontal';

$show_overlay = !empty($abcbiz_settings['abcbiz_elementor_before_after_switch']) && $abcbiz_settings['abcbiz_elementor_before_after_switch'] === 'true';
$no_overlay = $show_overlay;
$handle_move_type = !empty($abcbiz_settings['abcbiz_elementor_before_after_handle_move']) ? $abcbiz_settings['abcbiz_elementor_before_after_handle_move'] : 'on_swipe';
$move_slider_on_hover = $handle_move_type === 'on_hover' ? 'true' : 'false';
$move_with_handle_only = $handle_move_type === 'on_swipe' ? 'true' : 'false';
$click_to_move = $handle_move_type === 'on_click' ? 'true' : 'false';
?>

<div class="abcbiz-elementor-before-after-image">
    <div id="abcbiz-before-after-container" class="abcbiz-before-after-container-<?php echo esc_attr($id); ?>">
        <!-- The before image is first -->
        <img src="<?php echo esc_url($abcbiz_settings['abcbiz_elementor_before_img_upload']['url']); ?>" alt="<?php echo esc_attr($abcbiz_settings['abcbiz_elementor_before_img_alt']); ?>">
        <!-- The after image is last -->
        <img src="<?php echo esc_url($abcbiz_settings['abcbiz_elementor_after_img_upload']['url']); ?>" alt="<?php echo esc_attr($abcbiz_settings['abcbiz_elementor_after_img_alt']); ?>">
    </div>
</div><!-- end before after image  -->

<script>
  jQuery(document).ready(function($) {
    $(".abcbiz-before-after-container-<?php echo esc_attr($id); ?>").twentytwenty({
      default_offset_pct: <?php echo esc_attr($abcbiz_before_img_vis); ?>,
      before_label: '<?php echo esc_html($abcbiz_before_label); ?>',
      after_label: '<?php echo esc_html($abcbiz_after_label); ?>',
      orientation: '<?php echo esc_html($abcbiz_bef_af_orientaion); ?>',
      no_overlay: <?php echo esc_attr($no_overlay) ? 'true' : 'false'; ?>,
      move_slider_on_hover: <?php echo esc_attr($move_slider_on_hover); ?>,
      move_with_handle_only: <?php echo esc_attr($move_with_handle_only); ?>,
      click_to_move: <?php echo esc_attr($click_to_move); ?>,
    });
  });
</script>
