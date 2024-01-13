<?php
/**
 * Render View file for ABC Dual Button widget
 */
if (!defined('ABSPATH')) exit; // Exit if accessed directly

$abcbiz_settings = $this->get_settings_for_display();

$abcbiz_btn1_txt = $abcbiz_settings['abcbiz_elementor_dual_button_text_left'];
$abcbiz_btn1_is = $abcbiz_settings['abcbiz_elementor_dual_button_icon_left_switch'];
$abcbiz_mid_sw = $abcbiz_settings['abcbiz_elementor_dual_button_middle_text_switch'];
$abcbiz_left_icon_position = $abcbiz_settings['abcbiz_elementor_dual_button_left_icon_position'] ? $abcbiz_settings['abcbiz_elementor_dual_button_left_icon_position'] : 'right';
$abcbiz_right_icon_position = $abcbiz_settings['abcbiz_elementor_dual_button_right_icon_position'] ? $abcbiz_settings['abcbiz_elementor_dual_button_right_icon_position'] : 'right';
$abcbiz_mid_txt = $abcbiz_settings['abcbiz_elementor_dual_button_text_middle'] ? $abcbiz_settings['abcbiz_elementor_dual_button_text_middle'] : 'OR';
$abcbiz_btn2_txt = $abcbiz_settings['abcbiz_elementor_dual_button_text_right'];
$abcbiz_btn2_is = $abcbiz_settings['abcbiz_elementor_dual_button_icon_right_switch'];


if ( ! empty( $abcbiz_settings['abcbiz_elementor_dual_button_url_left']['url'] ) ) {
    $this->add_link_attributes( 'abcbiz_elementor_dual_button_url_left', $abcbiz_settings['abcbiz_elementor_dual_button_url_left'] );
}

if ( ! empty( $abcbiz_settings['abcbiz_elementor_dual_button_url_right']['url'] ) ) {
    $this->add_link_attributes( 'abcbiz_elementor_dual_button_url_right', $abcbiz_settings['abcbiz_elementor_dual_button_url_right'] );
}
?>

<!-- Dual Button Area -->
<div class="abcbiz-dual-button-area">

    <!--Single Button-->
    <div class="abcbiz-dual-button abcbiz-dual-button-one">
        <a <?php echo $this->get_render_attribute_string('abcbiz_elementor_dual_button_url_left'); ?>>
        
            <?php 
                if('right' == $abcbiz_left_icon_position) {
                    echo esc_html($abcbiz_btn1_txt);  
                }    
            
                if('yes' == $abcbiz_btn1_is) {
                \Elementor\Icons_Manager::render_icon( $abcbiz_settings['abcbiz_elementor_dual_button_icon_left'], [ 'aria-hidden' => 'true' ] );  
                
                }

                if('left' == $abcbiz_left_icon_position) {
                    echo esc_html($abcbiz_btn1_txt);  
                }        
            ?> 
        </a>
        <?php if('yes' == $abcbiz_mid_sw) : ?>
            <span class="abcbiz-dual-button-middle-text"><?php echo esc_html($abcbiz_mid_txt); ?></span>
        <?php endif; ?>
    </div><!--/ Single Button-->

    <!--Single Button-->
    <div class="abcbiz-dual-button abcbiz-dual-button-two">
        <a <?php echo $this->get_render_attribute_string('abcbiz_elementor_dual_button_url_right'); ?>>
            
        <?php
            if('right' == $abcbiz_right_icon_position) {
                echo esc_html($abcbiz_btn2_txt);  
            }           

            if('yes' == $abcbiz_btn2_is) {
                 \Elementor\Icons_Manager::render_icon( $abcbiz_settings['abcbiz_elementor_dual_button_icon_right'], [ 'aria-hidden' => 'true' ] ); 
            }

            if('left' == $abcbiz_right_icon_position) {
                echo esc_html($abcbiz_btn2_txt);
            }
                 
        ?>
        </a>
    </div><!--/ Single Button-->

 
</div><!-- Dual Button Area -->