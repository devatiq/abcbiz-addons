<?php

/**
 * Render View file for ABC Contact form 7 Widget.
 */

 if (!defined('ABSPATH')) exit; // Exit if accessed directly

 $settings   = $this->get_settings_for_display();

 $this->add_render_attribute( 'abcbiz_ele_contact_form_attr', 'id', 'abcbiz-ele-contact-form-wrapper' );
 $this->add_render_attribute( 'shortcode', 'id', $settings['abcbiz_ele_contact_form_shortcode'] );
 $shortcode = sprintf( '[contact-form-7 %s]', $this->get_render_attribute_string( 'shortcode' ) );

?>

<div class="abcbiz-ele-contact-form-7-area">
     <div <?php echo $this->get_render_attribute_string('abcbiz_ele_contact_form_attr'); ?>>
         <?php
             if( !empty( $settings['abcbiz_ele_contact_form_shortcode'] ) ){
                 echo do_shortcode( $shortcode ); 
             }else{
                 echo '<div class="form_no_select">' .esc_html__('Please Select contact form.', 'abcbiz-multi'). '</div>';
             }
         ?>
     </div>
</div><!-- end contact form 7 -->