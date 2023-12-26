<?php
/**
 * ABC Section Title Widget Render View
 */
 if (!defined('ABSPATH')) exit; // Exit if accessed directly

$abcbiz_settings = $this->get_settings_for_display();
$abcbiz_sec_divider_visible = $abcbiz_settings['abcbiz_elementor_sec_title_div'] === 'yes';
?>

<div class="abcbiz-elementor-title-align">

    <<?php echo esc_html($abcbiz_settings['abcbiz_elementor_sec_title_tag']); ?> class="abcbiz-elementor-sec-title">
        <span class="abcbiz-elementor-sec-title-one"><?php echo esc_html($abcbiz_settings['abcbiz_elementor_sec_title_one']); ?></span> <span class="abcbiz-elementor-sec-title-two"><?php echo esc_html($abcbiz_settings['abcbiz_elementor_sec_title_two']); ?></span>
    </<?php echo esc_html($abcbiz_settings['abcbiz_elementor_sec_title_tag']); ?>>

    <?php if ($abcbiz_sec_divider_visible) : ?>
        <div class="abcbiz-elementor-sec-title-divider"></div>
    <?php endif; ?>

</div><!-- section title area -->