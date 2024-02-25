<?php
/**
 * Render View for ABC Count Down
 */
if (!defined('ABSPATH')) exit; // Exit if accessed directly

$abcbiz_settings = $this->get_settings_for_display();
$abcbiz_count_down_expired_text = isset($abcbiz_settings['abcbiz_elementor_count_down_expired_text']) ? $abcbiz_settings['abcbiz_elementor_count_down_expired_text'] : 'Expired';
$abcbiz_count_down_exp_btn = isset($abcbiz_settings['abcbiz_elementor_count_down_exp_btn']) ? $abcbiz_settings['abcbiz_elementor_count_down_exp_btn'] : 'no';
$abcbiz_count_down_expired_btn_text = isset($abcbiz_settings['abcbiz_elementor_count_down_expired_btn_text']) ? $abcbiz_settings['abcbiz_elementor_count_down_expired_btn_text'] : 'View Now';
$abcbiz_count_down_expired_btn_link = isset($abcbiz_settings['abcbiz_elementor_count_down_expired_btn_link']['url']) ? $abcbiz_settings['abcbiz_elementor_count_down_expired_btn_link']['url'] : '#';
$abcbiz_count_down_expired_btn_link_is_external = isset($abcbiz_settings['abcbiz_elementor_count_down_expired_btn_link']['is_external']) && $abcbiz_settings['abcbiz_elementor_count_down_expired_btn_link']['is_external'] ? ' target="_blank"' : '';
$abcbiz_count_down_expired_btn_link_nofollow = isset($abcbiz_settings['abcbiz_elementor_count_down_expired_btn_link']['nofollow']) && $abcbiz_settings['abcbiz_elementor_count_down_expired_btn_link']['nofollow'] ? ' rel="nofollow"' : '';

?>

<div class="abcbiz-elementor-count-down-area" data-countdown="<?php echo esc_attr($abcbiz_settings['abcbiz_elementor_count_down_timer']); ?>">
  <div id="abcbizcountdisplay">
    <div id="abcbizcounttime">
    <?php if ( 'yes' === $abcbiz_settings['abcbiz_elementor_count_down_days_switch'] ) : ?>
      <div class='abcbiz-count-down-single abcbiz-count-days'><span class="abcbiz-count-num-days">00</span><span class="abcbiz-count-down-label abcbiz-count-days-label"><?php echo esc_html($abcbiz_settings['abcbiz_elementor_count_down_days_label'] ?? 'Days'); ?></span></div>
      <?php endif; ?>

      <?php if ( 'yes' === $abcbiz_settings['abcbiz_elementor_count_down_hours_switch'] ) : ?>
      <div class='abcbiz-count-down-single abcbiz-count-hours'><span class="abcbiz-count-num-hours">00</span><span class="abcbiz-count-down-label abcbiz-count-hours-label"><?php echo esc_html($abcbiz_settings['abcbiz_elementor_count_down_hours_label'] ?? 'Hours'); ?></span></div>
      <?php endif; ?>

      <?php if ( 'yes' === $abcbiz_settings['abcbiz_elementor_count_down_mins_switch'] ) : ?>
      <div class='abcbiz-count-down-single abcbiz-count-minutes'><span class="abcbiz-count-num-minutes">00</span><span class="abcbiz-count-down-label abcbiz-count-mins-label"><?php echo esc_html($abcbiz_settings['abcbiz_elementor_count_down_mins_label'] ?? 'Minutes'); ?></span></div>
      <?php endif; ?>

      <?php if ( 'yes' === $abcbiz_settings['abcbiz_elementor_count_down_secs_switch'] ) : ?>
      <div class='abcbiz-count-down-single abcbiz-count-seconds'><span class="abcbiz-count-num-seconds">00</span><span class="abcbiz-count-down-label abcbiz-count-secs-label"><?php echo esc_html($abcbiz_settings['abcbiz_elementor_count_down_secs_label'] ?? 'Seconds'); ?></span></div>
      <?php endif; ?>
    </div>
    <div id="abcbizcountexpired">
      <?php echo esc_html($abcbiz_count_down_expired_text); ?>
      <?php if ('yes' === $abcbiz_count_down_exp_btn): ?>
        <div class="abcbiz-expired-btn">
        <a href="<?php echo esc_url($abcbiz_count_down_expired_btn_link); ?>"<?php echo esc_attr($abcbiz_count_down_expired_btn_link_is_external . $abcbiz_count_down_expired_btn_link_nofollow); ?> class=""><?php echo esc_html($abcbiz_count_down_expired_btn_text); ?></a>
      </div>
      <?php endif; ?>
    </div>
  </div>
</div><!-- end count down area -->

