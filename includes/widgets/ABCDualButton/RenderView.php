<?php
/**
 * Render View file for ABC Dual Button widget
 */
if (!defined('ABSPATH')) exit; // Exit if accessed directly

$abc_settings = $this->get_settings_for_display();

$abc_btn1_txt = $abc_settings['abc_elementor_dual_button_text_left'];
$abc_btn1_is = $abc_settings['abc_elementor_dual_button_icon_left_switch'];
$abc_mid_sw = $abc_settings['abc_elementor_dual_button_middle_text_switch'];
$abc_left_icon_position = $abc_settings['abc_elementor_dual_button_left_icon_position'] ? $abc_settings['abc_elementor_dual_button_left_icon_position'] : 'right';
$abc_right_icon_position = $abc_settings['abc_elementor_dual_button_right_icon_position'] ? $abc_settings['abc_elementor_dual_button_right_icon_position'] : 'right';
$abc_mid_txt = $abc_settings['abc_elementor_dual_button_text_middle'] ? $abc_settings['abc_elementor_dual_button_text_middle'] : 'OR';
$abc_btn2_txt = $abc_settings['abc_elementor_dual_button_text_right'];
$abc_btn2_is = $abc_settings['abc_elementor_dual_button_icon_right_switch'];


if ( ! empty( $abc_settings['abc_elementor_dual_button_url_left']['url'] ) ) {
    $this->add_link_attributes( 'abc_elementor_dual_button_url_left', $abc_settings['abc_elementor_dual_button_url_left'] );
}

if ( ! empty( $abc_settings['abc_elementor_dual_button_url_right']['url'] ) ) {
    $this->add_link_attributes( 'abc_elementor_dual_button_url_right', $abc_settings['abc_elementor_dual_button_url_right'] );
}
?>

<!-- Dual Button Area -->
<div class="abc-dual-button-area">

    <!--Single Button-->
    <div class="abc-dual-button abc-dual-button-one">
        <a <?php echo $this->get_render_attribute_string('abc_elementor_dual_button_url_left'); ?>>
        
            <?php 
                if('right' == $abc_left_icon_position) {
                    echo esc_html($abc_btn1_txt);  
                }    
            
                if('yes' == $abc_btn1_is) {
                \Elementor\Icons_Manager::render_icon( $abc_settings['abc_elementor_dual_button_icon_left'], [ 'aria-hidden' => 'true' ] );  
                
                }

                if('left' == $abc_left_icon_position) {
                    echo esc_html($abc_btn1_txt);  
                }        
            ?> 
        </a>
        <?php if('yes' == $abc_mid_sw) : ?>
            <span class="abc-dual-button-middle-text"><?php echo esc_html($abc_mid_txt); ?></span>
        <?php endif; ?>
    </div><!--/ Single Button-->

    <!--Single Button-->
    <div class="abc-dual-button abc-dual-button-two">
        <a <?php echo $this->get_render_attribute_string('abc_elementor_dual_button_url_right'); ?>>
            
        <?php
            if('right' == $abc_right_icon_position) {
                echo esc_html($abc_btn2_txt);  
            }           

            if('yes' == $abc_btn2_is) {
                 \Elementor\Icons_Manager::render_icon( $abc_settings['abc_elementor_dual_button_icon_right'], [ 'aria-hidden' => 'true' ] ); 
            }

            if('left' == $abc_right_icon_position) {
                echo esc_html($abc_btn2_txt);
            }
                 
        ?>
        </a>
    </div><!--/ Single Button-->

 
</div><!-- Dual Button Area -->