<?php
/**
 * Render View file for ABC Iconbox one.
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
use Elementor\Icons_Manager;
$settings = $this->get_settings_for_display();

if ( ! empty( $settings['abc_elementor_icon_box_button_link']['url'] ) ) {
    $this->add_link_attributes( 'abc_elementor_icon_box_button_link', $settings['abc_elementor_icon_box_button_link'] );
}

?>

<!--Single Icon Box-->
<div class="abc-elementor-icon-box-area">
    <div class="abc-elementor-icon-box">
        <div class="abc-elementor-icon-box-icon">
            <!--Icon BG shape-->
            <div class="abc-ele-icon-box-normal">
                <?php Icons_Manager::render_icon( $settings['abc_elementor_icon_box_icon_shape'], [ 'aria-hidden' => 'true' ] ); ?>
            </div><!--/ Icon BG shape-->  

            <!--Icon-->
            <div class="abc-ele-icon-box-hover">
                <?php Icons_Manager::render_icon( $settings['abc_elementor_icon_box_icon'], [ 'aria-hidden' => 'true' ] ); ?>
            </div>  <!--Icon-->       
        </div>
        <div class="abc-elementor-icon-box-content">
            <h4 class="abc-elementor-icon-box-title"><?php echo esc_html($settings['abc_elementor_icon_box_title']); ?></h4>
            <p class="abc-elementor-icon-box-desc"><?php echo esc_html($settings['abc_elementor_icon_box_desc']); ?></p>
        </div>
        <div class="abc-elementor-icon-box-button">
            <a <?php echo $this->get_render_attribute_string( 'abc_elementor_icon_box_button_link' ); ?> class="abc-elementor-button-link"><?php echo esc_html($settings['abc_elementor_icon_box_button_text']); ?> <i class="eicon-arrow-right"></i></a>
        </div>
    </div>
</div><!--/ Single Icon Box-->