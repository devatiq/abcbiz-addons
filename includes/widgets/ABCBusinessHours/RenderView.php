<?php
/**
 * Render View file for ABC Business Hours widget
 */
if (!defined('ABSPATH')) exit; // Exit if accessed directly

$abcbiz_settings = $this->get_settings_for_display();

$abcbiz_title = $abcbiz_settings['abcbiz_elementor_business_hours_section_title'];
$abcbiz_repeater = $abcbiz_settings['abcbiz_elementor_business_hours_repeater'];

?>

<!--Business Hours Area-->
<div class="abcbiz-business-hours-area">
    <div class="abcbiz-business-hours">
        <ul>
            <?php if(!empty($abcbiz_title)) : ?>
                <!--Working Hour Title-->
                <li class="abcbiz-business-hour-title"><?php echo esc_html($abcbiz_title); ?></li><!--/ Working Hour Title-->
            <?php endif; ?>
            <?php if(!empty($abcbiz_repeater)) : foreach($abcbiz_repeater as $business_item) : ?>
                <!-- Working Hour Single Item -->
                <li class="abcbiz-business-hour-item elementor-repeater-item-<?php echo esc_attr( $business_item['_id'] ); ?>">
                    <span class="abcbiz-business-hour-day"><?php echo esc_html($business_item['abcbiz_elementor_business_hours_days']); ?></span>
                    <span class="abcbiz-business-hour-time"><?php echo esc_html($business_item['abcbiz_elementor_business_hours_time']); ?></span>
                </li><!--/ Working Hour Single Item -->
            <?php endforeach; endif; ?>
        </ul>
    </div>
</div>