<?php
/**
 * Render View file for ABC Iconbox one.
 */
 if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\Icons_Manager;
$abcbiz_settings = $this->get_settings_for_display();

if ( ! empty( $abcbiz_settings['abcbiz_elementor_icon_box_button_link']['url'] ) ) {
    $this->add_link_attributes( 'abcbiz_elementor_icon_box_button_link', $abcbiz_settings['abcbiz_elementor_icon_box_button_link'] );
}

?>

<!--Single Icon Box-->
<div class="abcbiz-elementor-icon-box-area">
    <div class="abcbiz-elementor-icon-box">
        <div class="abcbiz-elementor-icon-box-icon">
            <!--Icon BG shape-->
            <div class="abcbiz-ele-icon-box-normal">
                <?php Icons_Manager::render_icon( $abcbiz_settings['abcbiz_elementor_icon_box_icon_shape'], [ 'aria-hidden' => 'true' ] ); ?>
            </div><!--/ Icon BG shape-->  

            <!--Icon-->
            <div class="abcbiz-ele-icon-box-hover">
                <?php Icons_Manager::render_icon( $abcbiz_settings['abcbiz_elementor_icon_box_icon'], [ 'aria-hidden' => 'true' ] ); ?>
            </div>  <!--Icon-->       
        </div>
        <div class="abcbiz-elementor-icon-box-content">
            <h4 class="abcbiz-elementor-icon-box-title"><?php echo esc_html($abcbiz_settings['abcbiz_elementor_icon_box_title']); ?></h4>
            <p class="abcbiz-elementor-icon-box-desc"><?php echo esc_html($abcbiz_settings['abcbiz_elementor_icon_box_desc']); ?></p>
        </div>
        <div class="abcbiz-elementor-icon-box-button">
            <a <?php echo $this->get_render_attribute_string( 'abcbiz_elementor_icon_box_button_link' ); ?> class="abcbiz-elementor-button-link"><?php echo esc_html($abcbiz_settings['abcbiz_elementor_icon_box_button_text']); ?> <i class="eicon-arrow-right"></i></a>
        </div>
    </div>
</div><!--/ Single Icon Box-->