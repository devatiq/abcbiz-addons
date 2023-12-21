<?php
/**
 * Render View file for ABC Iconbox 3.
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
use Elementor\Icons_Manager;

$settings = $this->get_settings_for_display();
?>

<!--Single Icon Box-->
<div class="abc-single-icon-box-three-area">
    <div class="abc-single-icon-box-icons">
        <!--Icon-->
        <div class="abc-ele-icon-box3-icon">
            <?php Icons_Manager::render_icon($settings['abc_elementor_icon_box_icon'], ['aria-hidden' => 'true']); ?>
        </div><!--/ Icon-->
    </div>
    <div class="abc-elementor-icon-box-contents">
        <h4 class="abc-elementor-icon-box-title">
            <?php echo esc_html($settings['abc_elementor_icon_box_title']); ?>
        </h4>
        <p class="abc-elementor-icon-box-desc">
            <?php echo esc_html($settings['abc_elementor_icon_box_desc']); ?>
        </p>
    </div>

</div><!--/ Single Icon Box-->