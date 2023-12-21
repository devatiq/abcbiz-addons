<?php

/**
 * Render View file for ABC Counter.
 */

$settings   = $this->get_settings_for_display();
use Elementor\Icons_Manager;
?>

<div class="abc-ele-countdown-area">
    <div class="abc-ele-countdown-wrap">

       <div class="abc-ele-countdown-icon">
         <!--icon-->
            <span class="abc-counter-icon">
    <?php Icons_Manager::render_icon( $settings['abc_elementor_counter_icon'], [ 'aria-hidden' => 'true' ] ); ?>
</span>
<!--/ icon-->
       </div>

     <div class="abc-ele-counter">
        <span class="abccounter"><?php echo esc_html($settings['abc_elementor_counter_number']);?> </span> <span class="abc-ele-counter-suffix"><?php echo  $settings['abc_elementor_counter_suffix']?></span>
     </div>

     <div class="abc-ele-count-title">
        <h3><?php echo esc_html($settings['abc_elementor_counter_title']); ?></h3>
      </div>

    </div>
</div><!-- end counter area -->