<?php

/**
 * Render View file for ABC Contact form 7 Widget.
 */

 $settings   = $this->get_settings_for_display();


 $this->add_render_attribute( 'abc_ele_contact_form_attr', 'id', 'abc-ele-contact-form-wrapper' );

 $this->add_render_attribute( 'shortcode', 'id', $settings['abc_ele_contact_form_shortcode'] );
 $shortcode = sprintf( '[contact-form-7 %s]', $this->get_render_attribute_string( 'shortcode' ) );

?>
     <div <?php echo $this->get_render_attribute_string('abc_ele_contact_form_attr'); ?>>
         <?php
             if( !empty( $settings['abc_ele_contact_form_shortcode'] ) ){
                 echo do_shortcode( $shortcode ); 
             }else{
                 echo '<div class="form_no_select">' .__('Please Select contact form.', 'ABCMAFTH'). '</div>';
             }
         ?>
     </div>