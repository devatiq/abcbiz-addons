<?php
/**
 * Render View file for ABC Counter.
 */
if (!defined('ABSPATH')) exit; // Exit if accessed directly

$abcbiz_settings   = $this->get_settings_for_display();
use Elementor\Icons_Manager;
?>

<div class="abcbiz-ele-countdown-area">
    <div class="abcbiz-ele-countdown-wrap">

       <div class="abcbiz-ele-countdown-icon">
         <!--icon-->
            <span class="abcbiz-counter-icon">
    <?php Icons_Manager::render_icon( $abcbiz_settings['abcbiz_elementor_counter_icon'], [ 'aria-hidden' => 'true' ] ); ?>
</span>
<!--/ icon-->
       </div>

     <div class="abcbiz-ele-counter">
    <span class="abcbiz-counter"><?php echo esc_html($abcbiz_settings['abcbiz_elementor_counter_number']); ?></span> <span class="abcbiz-ele-counter-suffix"><?php echo esc_html($abcbiz_settings['abcbiz_elementor_counter_suffix']); ?></span>
     </div>

     <div class="abcbiz-ele-count-title">
        <h3><?php echo esc_html($abcbiz_settings['abcbiz_elementor_counter_title']); ?></h3>
      </div>

    </div>
</div><!-- end counter area -->