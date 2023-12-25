<?php
/**
 * Render View file for ABC Iconbox 2.
 */
if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\Icons_Manager;
$abcbiz_settings = $this->get_settings_for_display();
?>

<!--Single Icon Box-->
<div class="abcbiz-single-icon-box-two-area">
    <div class="abcbiz-single-icon-box-two">
        <div class="abcbiz-single-icon-box-two-icon">
            <!--Icon-->
            <div class="abcbiz-ele-icon-box2-icon">
                <?php Icons_Manager::render_icon($abcbiz_settings['abcbiz_elementor_icon_box_icon'], ['aria-hidden' => 'true']); ?>
            </div><!--/ Icon-->
        </div>
        <div class="abcbiz-elementor-icon-box-content">
            <h4 class="abcbiz-elementor-icon-box-title">
                <?php echo esc_html($abcbiz_settings['abcbiz_elementor_icon_box_title']); ?>
            </h4>
            <p class="abcbiz-elementor-icon-box-desc">
                <?php echo esc_html($abcbiz_settings['abcbiz_elementor_icon_box_desc']); ?>
            </p>
        </div>
    </div>
</div><!--/ Single Icon Box-->